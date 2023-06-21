<?php
    require('./fpdf.php');
    class PDF extends FPDF{
        function header(){
            $this->Image('logo_n.png', 170, 12, 26);
            $this->Ln(7);
            $this->SetFont('Arial', 'B', 15);
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 10, utf8_decode('RhythmMakers'), 0, 1, 'C', 0);
            $this->SetFont('Arial', '', 13);
            $this->Cell(0, 10, utf8_decode('Contratación de servicio de DJ'), 0, 1, 'C', 0);
            $this->Ln(3);
            $this->Cell(0, 1, '', 0, 1, 'C', 1);
            $this->Ln(3);
            $this->SetFont('Arial', '', 14);
            $this->Cell(0, 10, utf8_decode('COMPROBANTE DE RESERVACIÓN DE EVENTO'), 0, 1, 'C', 0);
        }

        //Pie de página
        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, utf8_decode("RHM"), 0, 1, 'L', 0);
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 1, 'C', 0);
            $hoy = date('d/m/Y');
            $this->SetTextColor(0, 0, 0);
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, utf8_decode($hoy), 0, 0, 'R', 0);
        }
    }

    include('../db.php');

    if (isset($_POST['generar'])) {
        $folio = $_POST['folio'];
        $sql = "SELECT * FROM evento WHERE folio = '$folio'";
        $tabla = mysqli_query($conexion, $sql);
        $evento = mysqli_fetch_array($tabla);
        if (!$tabla) {
            die("Error en query");
         }
        if(mysqli_num_rows($tabla) > 0) {
        

        

        $pdf = new PDF();
        $pdf->AliasNBPages();
        $pdf->AddPage();

        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(114, 8, utf8_decode('FOLIO: '), 0, 0, 'R', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[1]), 0, 1, 'L', 0);
        $pdf->Ln(2);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(35, 8, utf8_decode('CONTACTO'), 0, 1, 'R', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Nombre: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[7]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Apellido Paterno: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[8]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Apellido Materno: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[9]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('CURP: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[10]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Correo Electrónico: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[11]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Dirección'), 0, 1, 'L', 0);
        $pdf->Cell(50, 8, utf8_decode('Calle: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(60, 8, utf8_decode($evento[12]), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(52, 8, utf8_decode('Número: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[13]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Colonia: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(60, 8, utf8_decode($evento[14]), 0, 0, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Código Postal: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[15]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Alcaldía o Municipio: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[16]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Entidad Federativa: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[17]), 0, 1, '', 0);

        $n_lugar = "";
        if ($evento[2] == "S1") {
            $n_lugar = "Gran Salón del Valle";
        }elseif ($evento[2] == "S2"){
            $n_lugar = "Lion's Palace";
        }else{
            $n_lugar = "Jardín Santa Fe";
        }

        $hora_i=$evento[18];
        if($hora_i == 12){
            $hora_f='17';
         }  
         else if($hora_i == 19){
            $hora_f='00';
         }  
         else if($hora_i == 14){
            $hora_f='19';
         }
         else if($hora_i == 21){
            $hora_f='02';
         }
         else if($hora_i == 9){
            $hora_i='09';
            $hora_f='14';
         }
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(35, 8, utf8_decode('EVENTO'), 0, 1, 'R', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Sede del Evento: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($n_lugar), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Fecha: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(60, 8, utf8_decode($evento[3]), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Hora: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($hora_i.' - '.$hora_f).' hrs', 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Tipo de Evento: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[4]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Menú: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[5]), 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(50, 8, utf8_decode('Número de Personas: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, utf8_decode($evento[6]), 0, 1, '', 0);
 
        $pdf->Output();

        } else {
            session_start();
            // Handle exception or error here.
            $_SESSION['comp'] = 'No se encontró ningún registro con los datos proporcionados. Inténtelo de nuevo.';
            header("Location: ../comprobante.php");
        }

     }
?>