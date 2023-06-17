<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo_color.jpg', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('RhythmMakers'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

     
      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(191, 0, 14);
      $this->Cell(40); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(115, 10, utf8_decode("RESERVACIÓN DE EVENTO"), 0, 1, 'C', 0);
      $this->Ln(7);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(-70, 10, utf8_decode("RHM"), 0, 1, 'C', 0);

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->SetTextColor(0, 0, 0);
      $this->Cell(225, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA */

// Establecer el tamaño y la posición de la tabla
// Establecer los márgenes izquierdo y derecho
$anchoPagina = $pdf->GetPageWidth();
$anchoTabla = 40; // Ancho de cada celda de la tabla
$cantidadColumnas = 2; // Cantidad de columnas en la tabla
$espacioTotal = $cantidadColumnas * $anchoTabla;
$espacioEnBlanco = $anchoPagina - $espacioTotal;
$margenIzquierdo = $espacioEnBlanco / 2;
$margenDerecho = $margenIzquierdo;

$pdf->SetLeftMargin($margenIzquierdo);
$pdf->SetRightMargin($margenDerecho);

// Definir los datos de la tabla
$datosTabla = array(
    array('Nombre', 'Nombre1'),
    array('Apellido Paterno', 'Apellido Paterno1'),
    array('Apellido Materno', 'Apellido Materno1'),
    array('CURP', 'CURP1'),
    array('Correo', 'Correo1'),
    array('Calle', 'Calle1'),
    array('Número', 'Número1'),
    array('Colonia', 'Colonia1'),
    array('Código Postal', 'Código Postal1'),
    array('Alcaldía', 'Alcaldía1'),
    array('Estado', 'Estado1'),
    array('Lugar', 'Lugar1'),
    array('Fecha', 'Fecha1'),
    array('Hora', 'Hora1'),
    array('Evento', 'Evento1'),
    array('Descripción', 'Descripción1'),
    array('Menú', 'Menú1'),
    array('Personas', 'Personas1')
);

// Establecer la posición actual del cursor
$pdf->SetXY($margenIzquierdo, $pdf->GetY());

// Establecer el estilo de las celdas
$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(0, 0, 0); // Color de fondo gris
$pdf->SetTextColor(255, 255, 255); // Color de texto blanco
$pdf->SetDrawColor(100, 100, 100);

// Generar las celdas de la tabla
foreach ($datosTabla as $i => $fila) {
    foreach ($fila as $j => $dato) {
        $pdf->Cell($anchoTabla, 10, utf8_decode($dato), 1, 0, 'C', true); // Centrado y con fondo
    }
    $pdf->Ln(); // Salto de línea después de cada fila
}

$pdf->SetTextColor(0, 0, 0);

$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
