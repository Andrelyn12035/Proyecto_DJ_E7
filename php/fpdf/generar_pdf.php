<?php
    require('./fpdf.php');
    class PDF extends FPDF{
        function header(){
            $this->Image('logo_n.png', 170, 12, 26);
            $this->Ln(7);
            $this->SetFont('Arial', 'B', 15);
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 10, utf8_decode('RhythmMakers'), 0, 1, 'C', 0);
            $this->SetFont('Arial', 'I', 13);
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

        
        $pdf = new PDF();
        $pdf->AliasNBPages();
        $pdf->AddPage();

        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(45, 8, utf8_decode('Nombre: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, $evento[7], 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(45, 8, utf8_decode('Apellido Paterno: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, $evento[8], 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(45, 8, utf8_decode('Apellido Materno: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, $evento[9], 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(45, 8, utf8_decode('CURP: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, $evento[10], 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(45, 8, utf8_decode('Correo Electrónico: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, $evento[11], 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(45, 8, utf8_decode('Dirección'), 0, 1, 'L', 0);
        $pdf->Cell(45, 8, utf8_decode('Calle: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(60, 8, $evento[12], 0, 0, 'L', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(45, 8, utf8_decode('Número: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, $evento[13], 0, 1, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(45, 8, utf8_decode('Colonia: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(60, 8, $evento[14], 0, 0, '', 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(45, 8, utf8_decode('Código Postal: '), 0, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, $evento[15], 0, 1, '', 0);
        $pdf->Output();
        
     }

    

?>