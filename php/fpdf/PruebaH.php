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
      $this->Image('logo.png', 270, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('NOMBRE EMPRESA'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE HABITACIONES "), 0, 1, 'C', 0);
      $this->Ln(7);

   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA */
$pdf->SetFillColor(230, 100, 0); //colorFondo
$pdf->SetTextColor(0, 0, 0); //colorTexto
$pdf->SetDrawColor(163, 163, 163); //colorBorde
$pdf->Cell(40, 10, utf8_decode('Nombre'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Nombre1'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Apellido Paterno'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Apellido Paterno1'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Apellido Materno'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Apellido Materno1'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('CURP'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('CURP'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Correo'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Correo'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Calle'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Calle'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Número'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Número'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Colonia'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Colonia'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Código Postal'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Código Postal'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Alcaldía'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Alcaldía'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Estado'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Estado'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Lugar'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Lugar'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Fecha'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Fecha'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Hora'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Hora'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Evento'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Evento'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Descripción'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Descripción'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Menú'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Menú'), 1, 1, 'C');
$pdf->Cell(40, 10, utf8_decode('Personas'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Personas'), 1, 1, 'C');


$pdf->Output('Prueba2.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
