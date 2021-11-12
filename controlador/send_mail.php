<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
require_once 'vendor/autoload.php';
function send_mail($name, $emailto, $gender, $result_zero, $other_result, $products, $stored, $idperson)
{
    
    $img1;
    $img2;

    if ($gender == 'Hombre') {
        $img1 = "'https://tratamientoblog.com/wp-content/uploads/tratamientos-capilares-hombres.jpg'";
        $img2 = "'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4Ux-OIxAHhST9QeLmdsmraYrlkmQmBZgSfYNSHvygjzjnvGTtYBQglNZ34J3lNlpnuFQ&usqp=CAU'";
    } elseif ($gender == 'Mujer') {
        $img1 = "'https://vanitasespai.es/wp-content/uploads/2016/06/Tratamiento-de-colageno.jpg'";
        $img2 = "'https://static.ella-hoy.es/r/845X0/www.ellahoy.es/img/Mitos-sobre-el-acondicionador.jpg'";
    }

    //PHPMailer Object
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 2;
        $mail->Host = 'mail.capilezza.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'encuesta@capilezza.com';
        $mail->Password = 'LvKu.Q5rRtcO';
        $mail->SMTPSecure = 'TLS';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );

        $mail->Port = 587;
        $mail->Encoding = 'base64';

        //Recipients
        $mail->setFrom('encuesta@capilezza.com', 'Capilezza | Resultados de encuesta');
        $mail->addReplyTo('encuesta@capilezza.com', 'Capilezza | Resultados de encuesta');

        //Recipients
        $mail->addAddress($emailto);

        //Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = 'Capilezza | Resultados';
        $mail->Body = "
        <p>&nbsp;</p>
        <table class='tableContent' style='font-family: Helvetica, sans-serif;' border='0' width='100%' cellspacing='0' cellpadding='0' align='center' bgcolor='ffedf1'>
        <tbody>
        <tr>
        <td height='15'>&nbsp;</td>
        </tr>
        <tr>
        <td class='movableContentContainer'>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        <table border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td height='20'>&nbsp;</td>
        </tr>
        <tr>
        <td align='center'>
        <table class='MainContainer' border='0' width='600' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td align='center'>
        <div class='contentEditableContainer contentImageEditable'>
        <div class='contentEditable' style='text-align: center;'><img class='banner' src='https://encuesta.capilezza.com/publico/img/img/Capilleza2.png' alt='Capilezza' width='600' border='0' data-default='placeholder' data-max-width='600' /></div>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        <table style='font-family: Helvetica, sans-serif;' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td height='20'>&nbsp;</td>
        </tr>
        <tr>
        <td>
        <table class='MainContainer' style='border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px;' border='0' width='600' cellspacing='0' cellpadding='0' align='center' bgcolor='#ffffff'>
        <tbody>
        <tr>
        <td align='center'>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td valign='top' width='20'>&nbsp;</td>
        <td>
        <table border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td colspan='3' height='20'>&nbsp;</td>
        </tr>
        <tr>
        <td align='center'>
        <table style='border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px;' border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td colspan='3' height='20'>&nbsp;</td>
        </tr>
        <tr>
        <td width='35'>&nbsp;</td>
        <td>
        <div class='contentEditableContainer contentTextEditable'>
        <div class='contentEditable' style='text-align: center;'>
        <h2 style='font-size: 20px;'> $name <br />Tus resultados</h2>
        <br />
        <p>Las recomendaciones que veras a continuaci&oacute;n fueron analizadas de acuerdo a tus respuestas en la encuesta. Para mayor informaci&oacute;n <strong> <a href='https://capilezza.com/'> Contactanos </a></strong></p>
        </div>
        </div>
        </td>
        <td width='35'>&nbsp;</td>
        </tr>
        <tr>
        <td colspan='3' height='20'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        <tr>
        <td colspan='3' height='20'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        <td valign='top' width='20'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        <table style='font-family: Helvetica, sans-serif;' border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td height='20'>&nbsp;</td>
        </tr>
        <tr>
        <td>
        <table class='MainContainer' style='border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px;' border='0' width='600' cellspacing='0' cellpadding='0' align='center' bgcolor='#ffffff'>
        <tbody>
        <tr>
        <td align='center'>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td valign='top' width='40'>&nbsp;</td>
        <td>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td>
        <table border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td colspan='3' height='35'>&nbsp;</td>
        </tr>
        <tr>
        <td class='specbundle2' align='center' width='310'>
        <table width='310' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td align='center'>
        <div class='contentEditableContainer contentTextEditable'>
        <div class='contentEditable' style='text-align: left;'>
        <h2 style='font-size: 16px;'>Te recomendamos estos productos</h2>
        <br/>
        <li> ". utf8_decode($products). "</li>
        <div class='col' >
            <div style=' text-align: -webkit-center; margin-top:20px !important;'> 
                <div class='codigo' style='padding: 0px !important; margin-bottom: 10px; border-style: solid; border-color: #fddae199; width: 8vw; border-radius: 15%; height:12vh;'> 
                    <h6 style='font-size: 15px; margin-top: 10px !important; margin-bottom: 20px !important;'>Codigo</h6> 
                    <h2 style='font-size: 15px'>". utf8_decode($stored). "</h2> 
                </div>
            </div>
            <h6 style='font-size: 1rem;'>*Recuerda tu codigo para realizar la compra</h6>
        </div>
        <br /><a class='link4' href='https://capilezza.com/' target='_blank' rel='noopener'>Mas beneficios.</a></div>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        <td class='specbundle2' width='35'>&nbsp;</td>
        <td class='specbundle2' align='center' width='150'>
        <div class='contentEditableContainer contentImageEditable'>
        <div class='contentEditable'><img src='https://www.ecestaticos.com/imagestatic/clipping/c88/7e1/c887e10380740a0b5c775a878f40c221/redken-brews-la-revolucio-n-del-cuidado-capilar-para-hombres.jpg?mtime=1579565836' alt='side image' width='150' data-default='placeholder' data-max-width='150' /></div>
        </div>
        </td>
        </tr>
        <tr>
        <td colspan='3' height='35'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        <td width='40'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        <table style='font-family: Helvetica, sans-serif;' border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td height='20'>&nbsp;</td>
        </tr>
        <tr>
        <td>
        <table class='MainContainer' style='border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px;' border='0' width='600' cellspacing='0' cellpadding='0' align='center' bgcolor='#ffffff'>
        <tbody>
        <tr>
        <td align='center'>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td valign='top' width='40'>&nbsp;</td>
        <td>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td>
        <table border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td colspan='3' height='35'>&nbsp;</td>
        </tr>
        <tr>
        <td class='specbundle2' align='center' width='150'>
        <div class='contentEditableContainer contentImageEditable'>
        <div class='contentEditable'><img src=$img2 alt='side image' width='150' data-default='placeholder' data-max-width='150' /></div>
        </div>
        </td>
        <td class='specbundle2' width='30'>&nbsp;</td>
        <td class='specbundle2' width='310'>
        <table width='310' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td align='center'>
        <div class='contentEditableContainer contentTextEditable'>
        <div class='contentEditable' style='text-align: left;'>
        <h2 style='font-size: 16px;'>Tu tratamiento recomendado</h2>
        <br />
        <p>$other_result </p>
        <br /><a class='link4' href='https://capilezza.com/' target='_blank' rel='noopener'>Mas tratamientos...</a></div>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        <tr>
        <td colspan='3' height='35'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        <td width='40'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        <table style='font-family: Helvetica, sans-serif;' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td height='20'>&nbsp;</td>
        </tr>
        <tr>
        <td>
        <table class='MainContainer' style='border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px;' border='0' width='600' cellspacing='0' cellpadding='0' align='center' bgcolor='#ffffff'>
        <tbody>
        <tr>
        <td align='center'>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td valign='top' width='20'>&nbsp;</td>
        <td>
        <table border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
        <tbody>
        <tr>
        <td colspan='3' height='20'>&nbsp;</td>
        </tr>
        <tr>
        <td align='center'>
        <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td colspan='3' height='20'>&nbsp;</td>
        </tr>
        <tr>
        <td width='35'>&nbsp;</td>
        <td>
        <div class='contentEditableContainer contentTextEditable'>
        <div class='contentEditable' style='text-align: center;'>
        <h2 style='font-size: 20px;'>Visita nuestra tienda online</h2>
        <br />
        <p>Te Brindamos las mejores cremas de belleza que enriquecen tu piel y tu cuerpo sin cualquier toxina da&ntilde;ina. Brindamos comodidad para que su vida sea m&aacute;s rica.</p>
        <br /><br /><a class='link2' style='color: #ffffff;' href='https://capilezza.com/tienda/' target='_blank' rel='noopener'>Visitanos</a></div>
        </div>
        </td>
        <td width='35'>&nbsp;</td>
        </tr>
        <tr>
        <td colspan='3' height='20'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        <tr>
        <td colspan='3' height='20'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        <td width='20'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        <table style='font-family: Helvetica, sans-serif;' border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
        <td height='40'>&nbsp;</td>
        </tr>
        </tbody>
        </table>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        ";
        $mail->AltBody = "Resultados Capilezza";

        $mail->send();
        $sendmailadmin = send_mail_admin($name, $products, $result_zero, $other_result,$emailto, $stored, $idperson);
        if($sendmailadmin === true){
            return true;
        }else{
            return false;
        }

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

function send_mail_admin($name, $products, $result_zero, $other_result,$to_email,$stored, $idperson)
{
    //PHPMailer Object
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 2;
        $mail->Host = 'mail.capilezza.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'encuesta@capilezza.com';
        $mail->Password = 'LvKu.Q5rRtcO';
        $mail->SMTPSecure = 'TLS';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );

        $mail->Port = 587;
        $mail->Encoding = 'base64';

        //Recipients
        $mail->setFrom('encuesta@capilezza.com', 'Nueva encuesta');

        //Recipients
        $mail->addAddress('encuesta@capilezza.com');

        //Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = "Capilezza | Resultados";
        $mail->Body = " <p>&nbsp;</p>
        <!-- [if !mso]><!-->
        <p>&nbsp;</p>
        <!--<![endif]-->
        <p><span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'>Template created by Designmodo.com using Postcards.</span></p>
        <table class='pc-email-body' style='background-color: #f4f4f4; table-layout: fixed;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' bgcolor='#f4f4f4'>
            <tbody>
                <tr>
                    <td align='center' valign='top'>
                        <table class='pc-email-container' style='margin: 0 auto; max-width: 620px;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
                            <tbody>
                                <tr>
                                    <td style='padding: 0 10px;' align='left' valign='top'>
                                        <table role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
                                            <tbody>
                                                <tr>
                                                    <td style='font-size: 1px; line-height: 1px;' height='20'>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style='width: 100%;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
                                            <tbody>
                                                <tr>
                                                    <td class='pc-sm-p-40-30 pc-xs-p-30-20' style='vertical-align: top; padding: 40px; background-color: #ffffff;' valign='top' bgcolor='#ffffff'>
                                                        <table style='width: 100%;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
                                                            <tbody>
                                                                <tr>
                                                                    <td style='vertical-align: top; background-color: #1b1b1b; background-position: center; background-size: cover; border-radius: 6px; width: 520px; background-image: url(' images/resources-qxt.jpg ');' valign='top' bgcolor='#1B1B1B' width='520'>
                                                                        <table role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style='padding: 39px 40px 41px; vertical-align: top;' valign='top'>
                                                                                        <table style='width: 100%;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style='vertical-align: top; text-align: center;' align='center' valign='top'><img style='max-width: 100%; height: auto; border: 0; line-height: 100%; outline: 0; -ms-interpolation-mode: bicubic; display: block; margin: 0 auto; color: #ffffff;'
                                                                                                            alt='' width='24' height='' /></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style='height: 12px; font-size: 1px; line-height: 1px;' height='12'>&nbsp;</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class='pc-fb-font' style='vertical-align: top;color: #ffffff; font-family: "."Fira Sans ".", Helvetica, Arial, sans-serif; text-align: center; font-size: 18px; font-weight: 500; line-height: 1.33; letter-spacing: -0.2px; color: #ffffff;' align='center'
                                                                                                        valign='top'>NUEVA PERSONA TERMIN&Oacute; EL TEST</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style='height: 7px; font-size: 1px; line-height: 1px;' height='7'>&nbsp;</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class='pc-fb-font' style='vertical-align: top; color: #ffffff;font-family:  "."Fira Sans ".", Helvetica, Arial, sans-serif; text-align: center; font-size: 14px; font-weight: 300; line-height: 1.43; letter-spacing: -0.2px; color: #ffffff;' align='center'
                                                                                                        valign='top'>
                                                                                                        <div style='color: #ffffff; text-align: left;'>NOMBRE: $name </div>
                                                                                                        <div style='color: #ffffff; text-align: left;'>EMAIL: $to_email </div>
                                                                                                        <div style='text-align: left;'><a style='font-weight: bold; color: #ffffff;' href='https://encuesta.capilezza.com/question/claim_ver/".$idperson."' target='_blank' rel='noopener'>Registro en tu administrador</a> <br> <a style='font-weight: bold; color: #ffffff;' href='".$stored."' target='_blank' rel='noopener'>Registro en la web</a></div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
                            <tbody>
                                <tr>
                                    <td style='font-size: 1px; line-height: 1px;' height='20'>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class='pc-gmail-fix' style='white-space: nowrap; font: 15px courier; line-height: 0;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>";
        $mail->AltBody = 'Resultados Capilezza';

        $mail->send();

        return true;
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
