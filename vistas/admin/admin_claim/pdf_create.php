<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->AddLink();
        // $this->Image('./publico/img/menorca.png', 10, 10, 20, 0, '', '');
        $this->Ln();
        $this->Ln();
    }
    function Footer()
    {
        $this->setY(-18);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . ' de {nb}', 0, 0, 'C');
    }
    function RoundedRect($x, $y, $w, $h, $r, $corners = '1234', $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if ($style == 'F')
            $op = 'f';
        elseif ($style == 'FD' || $style == 'DF')
            $op = 'B';
        else
            $op = 'S';
        $MyArc = 4 / 3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m', ($x + $r) * $k, ($hp - $y) * $k));

        $xc = $x + $w - $r;
        $yc = $y + $r;
        $this->_out(sprintf('%.2F %.2F l', $xc * $k, ($hp - $y) * $k));
        if (strpos($corners, '2') === false)
            $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - $y) * $k));
        else
            $this->_Arc($xc + $r * $MyArc, $yc - $r, $xc + $r, $yc - $r * $MyArc, $xc + $r, $yc);

        $xc = $x + $w - $r;
        $yc = $y + $h - $r;
        $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - $yc) * $k));
        if (strpos($corners, '3') === false)
            $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - ($y + $h)) * $k));
        else
            $this->_Arc($xc + $r, $yc + $r * $MyArc, $xc + $r * $MyArc, $yc + $r, $xc, $yc + $r);

        $xc = $x + $r;
        $yc = $y + $h - $r;
        $this->_out(sprintf('%.2F %.2F l', $xc * $k, ($hp - ($y + $h)) * $k));
        if (strpos($corners, '4') === false)
            $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - ($y + $h)) * $k));
        else
            $this->_Arc($xc - $r * $MyArc, $yc + $r, $xc - $r, $yc + $r * $MyArc, $xc - $r, $yc);

        $xc = $x + $r;
        $yc = $y + $r;
        $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - $yc) * $k));
        if (strpos($corners, '1') === false) {
            $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - $y) * $k));
            $this->_out(sprintf('%.2F %.2F l', ($x + $r) * $k, ($hp - $y) * $k));
        } else
            $this->_Arc($xc - $r, $yc - $r * $MyArc, $xc - $r * $MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf(
            '%.2F %.2F %.2F %.2F %.2F %.2F c ',
            $x1 * $this->k,
            ($h - $y1) * $this->k,
            $x2 * $this->k,
            ($h - $y2) * $this->k,
            $x3 * $this->k,
            ($h - $y3) * $this->k
        ));
    }

    protected $col = 0;

    function SetCol($col)
    {
        // Set position on top of a column
        $this->col = $col;
        $this->SetLeftMargin(10 + $col * 40);
        $this->SetY(25);
    }

    function DumpFont($FontName)
    {
        $this->AddPage();
        // Title
        $this->SetFont('Arial', '', 16);
        $this->Cell(0, 6, $FontName, 0, 1, 'C');
        // Print all characters in columns
        $this->SetCol(0);
        for ($i = 32; $i <= 255; $i++) {
            $this->SetFont('Arial', '', 14);
            $this->Cell(12, 5.5, "$i : ");
            $this->SetFont($FontName);
            $this->Cell(0, 5.5, chr($i), 0, 1);
        }
        $this->SetCol(0);
    }
}

#=======
#Variables
$fecha = substr($claim['DATE'], 0, 25);
$reclamo = substr($claim['CLAIMSHEET'], 0, 25);
$tipo_servicio=$claim['SERVICETYPE'];
$servicio = substr($claim['SERVICETYPE_DESCRIPTION'], 0, 40);
$doc_doctype=claim_model::getdocTypeById($claim['IMR_DOCTYPE_ID']);
$tipo_identificacion = substr($doc_doctype['NAME'], 0, 25);
$numero_identificacion = substr($claim['NUMIDENTITY'], 0, 25);
$email = substr($claim['EMAIL'], 0, 40);
$nombre = substr($claim['NAME'], 0, 25);
$paterno = substr($claim['FLASTNAME'], 0, 25);
$materno = substr($claim['MLASTNAME'], 0, 25);
$celular = substr($claim['PHONE'], 0, 25);
$grado_academico = substr($claim['STUDENT_LEVEL'], 0, 25);
$nivel = substr($claim['ACADEMIC_DEGREE'], 0, 25);
$Edad = substr($claim['CLAIMANT'], 0, 25);
$r_nombre = substr($claim['R_NAME'], 0, 25);
$r_paterno = substr($claim['R_FLASTNAME'], 0, 25);
$r_materno = substr($claim['R_MLASTNAME'], 0, 25);
$r_celular = substr($claim['R_PHONE'], 0, 25);
$r_correo = substr($claim['R_EMAIL'], 0, 25);
$tipo_reclamo = substr($claim['CLAIMTYPE'], 0, 60);
$descripcion = $claim['CLAIMDESC'];
$reclamo_des = $claim['ORDERCLAIM'];

#=========
$pdf = new PDF();

$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 18, 'LIBRO DE RECLAMACIONES', 0, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(0, 5, utf8_decode('Conforme a lo establecido con el código de protección y defensa del consumidor, esta institución cuenta con un Libro de Reclamaciones a su disposición'), 0, "C");
#=======================================
$pdf->SetFillColor(192);
$pdf->RoundedRect(11, 43, 80, 10, 1, '1234', 'DF');
$pdf->Cell(100, 5, utf8_decode('Fecha:'), 0, 0, 'L');
$pdf->SetFillColor(192);
$pdf->RoundedRect(111, 43, 80, 10, 1, '1234', 'DF');
$pdf->Cell(0, 5, utf8_decode('Hoja de reclamación:'), 0, 1, 'L');
#===
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 10, utf8_decode('  ' . $fecha), 0, 0, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 10, utf8_decode('  ' . $reclamo), 0, 1, 'L');

$pdf->ln();
#=============================================
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 5, utf8_decode('Tipo servicio:'), 0, 0, 'L');
$pdf->Cell(0, 5, utf8_decode('Servicio:'), 0, 1, 'L');
#==
$pdf->SetFont('Arial', '', 12);
$pdf->RoundedRect(11, 68, 40, 10, 1, '1234', 'DF');
$pdf->Cell(50, 10, utf8_decode('  ' . $tipo_servicio), 0, 0, 'L');
$pdf->RoundedRect(61, 68, 130, 10, 1, '1234', 'DF');
$pdf->Cell(130, 10, utf8_decode('  ' . $servicio), 0, 1, 'L');

#==================================================
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 18, utf8_decode('DATOS DEL ALUMNO'), 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode('Tipo de identificación:'), 0, 0, 'L');
$pdf->Cell(40, 5, utf8_decode('Número de identificaión:'), 0, 0, 'L');
$pdf->Cell(80, 5, utf8_decode('Email:'), 0, 1, 'L');
#==
$pdf->RoundedRect(11, 101, 55, 10, 1, '1234', 'DF');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 10, utf8_decode('  ' . $tipo_identificacion), 0, 0, 'L');
$pdf->RoundedRect(71, 101, 35, 10, 1, '1234', 'DF');
$pdf->Cell(40, 10, utf8_decode('  ' . $numero_identificacion), 0, 0, 'L');
$pdf->RoundedRect(111, 101, 80, 10, 1, '1234', 'DF');
$pdf->Cell(80, 10, utf8_decode('  ' . $email), 0, 1, 'L'); #24 CARACTERES

$pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode('Nombre:'), 0, 0, 'L');
$pdf->Cell(60, 5, utf8_decode('Apellidos:'), 0, 1, 'L');
#==
$pdf->RoundedRect(11, 121, 55, 10, 1, '1234', 'DF');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 10, utf8_decode('  ' . $nombre), 0, 0, 'L');
$pdf->RoundedRect(71, 121, 120, 10, 1, '1234', 'DF');
$pdf->Cell(60, 10, utf8_decode('  ' . $paterno ." ".$materno), 0, 1, 'L');

$pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode('Celular/Teléfono:'), 0, 0, 'L');
$pdf->Cell(60, 5, utf8_decode('Grado académico:'), 0, 0, 'L');
$pdf->Cell(60, 5, utf8_decode('Nivel:'), 0, 1, 'L');
#==
$pdf->RoundedRect(11, 141, 55, 10, 1, '1234', 'DF');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 10, utf8_decode('  +' . $celular), 0, 0, 'L');
$pdf->RoundedRect(71, 141, 55, 10, 1, '1234', 'DF');
$pdf->Cell(60, 10, utf8_decode('  ' . $grado_academico), 0, 0, 'L');
$pdf->RoundedRect(131, 141, 60, 10, 1, '1234', 'DF');
$pdf->Cell(60, 10, utf8_decode('  ' . $nivel), 0, 1, 'L');

$pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode('Apoderado:'), 0, 1, 'L');
#==
$pdf->RoundedRect(11, 161, 55, 10, 1, '1234', 'DF');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 10, utf8_decode(' Mayor de edad'), 0, 1, 'L');

$pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');
if($Edad =="menor"){
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(60, 5, utf8_decode('PADRE O APODERADO    '), 0, 1, 'L');

    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(60, 5, utf8_decode('Nombre:'), 0, 0, 'L');
    $pdf->Cell(60, 5, utf8_decode('Apellidos:'), 0, 1, 'L');

    $pdf->RoundedRect(11, 186, 55, 10, 1, '1234', 'DF');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(60, 10, utf8_decode('  ' . $r_nombre), 0, 0, 'L');
    $pdf->RoundedRect(71, 186, 120, 10, 1, '1234', 'DF');
    $pdf->Cell(60, 10, utf8_decode('  ' . $r_paterno ." ".$r_materno), 0, 1, 'L');

    $pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');

    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(60, 5, utf8_decode('Teléfono:'), 0, 0, 'L');
    $pdf->Cell(60, 5, utf8_decode('Correo electrónico:'), 0, 1, 'L');

    $pdf->RoundedRect(11, 206, 55, 10, 1, '1234', 'DF');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(60, 10, utf8_decode('  ' . $r_celular), 0, 0, 'L');
    $pdf->RoundedRect(71, 206, 120, 10, 1, '1234', 'DF');
    $pdf->Cell(60, 10, utf8_decode('  ' . $r_correo), 0, 1, 'L');

    

}

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 18, utf8_decode('INFORMACIÓN DEL RECLAMO'), 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode('Tipo de servicio:'), 0, 0, 'L');
$pdf->Cell(40, 5, utf8_decode('Descripcion del servicio:'), 0, 1, 'L');
#==
$espacio1=239;
if($Edad !="menor"){ $espacio1=199;}
$pdf->RoundedRect(11, $espacio1 , 55, 10, 1, '1234', 'DF');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 10, utf8_decode('  ' . $tipo_servicio), 0, 0, 'L');

$pdf->RoundedRect(71, $espacio1, 120, 10, 1, '1234', 'DF');
$pdf->Cell(40, 10, utf8_decode('  ' . $servicio), 0, 1, 'L');

$pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode('Tipo de reclamo:'), 0,  1, 'L');

$pdf->RoundedRect(11, ($espacio1 + 20), 55, 10, 1, '1234', 'DF');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 10, utf8_decode('  ' . $tipo_reclamo), 0, 1, 'L');


$pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 18, utf8_decode('IDENTIFICACIÓN DE LA RECLAMACIÓN'), 0, 1, 'L');

    

#== Descripción
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, utf8_decode('Descripción del reclamo:'), 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(180, 5, utf8_decode($descripcion), 1, 'L', true);

$pdf->Cell(0, 15, utf8_decode(''), 0, 1, 'L');

#== Pedido del consumidor
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, utf8_decode('Pedido del reclamo:'), 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(180, 5, utf8_decode($reclamo_des), 1, 'L', true);

$pdf->Cell(0, 5, utf8_decode(''), 0, 1, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(180, 5, utf8_decode('La respuesta a la presente queja o reclamo será brindada mediante comunicación electrónica enviada a la dirección que usted ha consignado en la presente Hoja de Reclamación. En caso de que usted desee que la respuesta le sea enviada a su domicilio deberá expresar ello en el detalle del reclamo o queja.'), 0, 'L');

$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(180, 5, utf8_decode('declaro ser el titular del servicio y acepto el contenido del presente formulario manifestanto bajo declaración jurada la veracidad de los hechos descritos.'), 0, 'L');

$nombre_archivo = time();
$pdf->Output('F', "./publico/pdf/" . $nombre_archivo . ".pdf");



while (file_exists("./publico/pdf/" . $nombre_archivo . ".pdf")) {

    sleep(3);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'Libroreclamaciones@marcelinochampagnat.edu.pe';                     // SMTP username
        $mail->Password   = 'reclamaciones2021';                               // SMTP password
        $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Encoding = 'base64';

        //Recipients
        $mail->setFrom('meniannavarro@upeu.edu.pe', 'Libro de reclamaciones MARCELINO');
        $mail->addReplyTo('meniannavarro@upeu.edu.pe', 'Libro de reclamaciones MARCELINO');

        // Attachments
        $mail->addAttachment("./publico/pdf/" . $nombre_archivo . ".pdf");         // Add attachments

        $mail->addAddress($email, 'MARCELINO');     // Add a recipient
        $mail->addCC($email);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'INDECOPI - LR: ' . strip_tags($reclamo) . ' Servicio: ' . $servicio;
        $temp_repre="";
        if($Edad=="menor"){
            $temp_repre='
                <tr>
                    <td><b>NOMBRES Y APELLIDOS APODERADO:</b></td>
                    <td>' . strip_tags($r_nombre) . ' ' . strip_tags($r_paterno) . ' ' . strip_tags($r_materno) . '</td>
                </tr>
                <tr>
                    <td><b>CORREO ELECTRÓNICO APODERADO:</b></td> 
                    <td>' . $r_correo . '</td>
                </tr>
                <tr>
                    <td><b>NÚMERO TELEFÓNICO APODERADO:</b></td>
                    <td>' . $r_celular . '</td>
                </tr>
            ';
        }
        $mail->Body    = '
        <html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #024fc1;
            color: white;
            }
        </style>
        </head>
        <body>

        <div class="card">
            <!--<img src="' . $GLOBALS['BASE_URL'] . '" alt="Avatar"
            style="width:30%;display:block;
            margin:auto;">-->
            <div class="container">
                <h4>Estimado: <b>' . strip_tags($nombre) . ' ' . strip_tags($paterno) . ' ' . strip_tags($materno) . '</b></h4>
                <p>Estamos en proceso de resolver el reclamo formulado</p>
                <table id="customers">
                    <tr>
                        <th>Información</th>
                        <th>Descripción</th>
                    </tr>
                    <tr>
                        <td><b>FECHA:</b></td>
                        <td>' . $fecha . '</td>
                    </tr>
                    <tr>
                        <td><b>N°:</b></td>
                        <td>' . $reclamo . '</td>
                    </tr>
                    <tr>
                        <td><b>NOMBRES Y APELLIDOS:</b></td>
                        <td>' . strip_tags($nombre) . ' ' . strip_tags($paterno) . ' ' . strip_tags($materno) . '</td>
                    </tr>
                    <tr>
                        <td><b>DNI/CE:</b></td>
                        <td>' . $numero_identificacion . '</td>
                    </tr>
                    <tr>
                        <td><b>CORREO ELECTRÓNICO:</b></td>
                        <td>' . $email . '</td>
                    </tr>
                    <tr>
                        <td><b>NÚMERO TELEFÓNICO:</b></td>
                        <td>' . $celular . '</td>
                    </tr>'.
                    $temp_repre.'
                    <tr>
                        <td><b>DESCRIPCION:</b></td>
                        <td>' . nl2br($descripcion) . '</td>
                    </tr>
                    <tr>
                        <td><b>RECLAMO:</b></td>
                        <td>' . nl2br($reclamo_des) . '</td>
                    </tr>
                    
                </table>
            </div>
        </div>

        </body>
        </html>
        ';

        $mail->CharSet = 'utf-8';
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent to the client. Mailer Error: {$mail->ErrorInfo}";
    }

    break;
}

 ?>

