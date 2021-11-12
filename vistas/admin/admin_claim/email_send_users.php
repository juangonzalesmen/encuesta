<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

while (file_exists("./publico/pdf/" . $nombre_archivo . ".pdf")) {

    sleep(2);
    $users= user_model::getUsers();
    foreach ($users as $user ) {
        $mail = new PHPMailer(true);
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
    
            $mail->addAddress($user['EMAIL']);     // Add a recipient
            
    
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
                    <h4>Estimado: <b>' . $user['USER'] . '</b></h4>
                    <p>El cliente ' . strip_tags($nombre) . ' ' . strip_tags($paterno) . ' ' . strip_tags($materno) . ' ha registrado un reclamo '.$reclamo.' con la siguiente información:  </p>
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
            echo "Message could not be sent to user ".$user['USER'].". Mailer Error: {$mail->ErrorInfo}";
        }
    }
    

    break;
}
unlink("./publico/pdf/" . $nombre_archivo . ".pdf"); 
die();

 ?>

