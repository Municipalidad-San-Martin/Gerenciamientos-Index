<?php
// Varios destinatarios
//$para  = 'aidan@example.com' . ', '; // atención a la coma
//$para .= 'wez@example.com';
//$para='fjvelazco@gmail.com';
$para='barquin-directo@gerenciamientosgb.com.ar,seguimientosycontroles@gerenciamientosgb.com.ar,administracion@gerenciamientosgb.com.ar';
$smsnom=$_POST['name'];
$smsmail=$_POST['email'];
$sms=$_POST['mesage'];

// título
$titulo = 'Mensaje web gerenciamientosgb';

// mensaje
$mensaje = '
<html>
<head>
  <title>Mensaje web gernciamientosgb.com </title>
</head>
<body>
  <p>Estos son los datos de la persona que desea contactarse con usted.</p>

  <p>
	Nombre:' .$smsnom.'
	<br/>Email: ' .$smsmail. '
	<br/>Mensaje: ' .$sms. '
  </p>
</body>
</html>
';

/*Lo primero es añadir al script la clase phpmailer desde la ubicación en que esté*/
require 'js/class.phpmailer.php';
require_once("email.php");

//Crear una instancia de PHPMailer
$mail = new PHPMailer();
//Definir que vamos a usar SMTP
$mail->IsSMTP();
//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
// 0 = off (producción)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 0;
//Ahora definimos gmail como servidor que aloja nuestro SMTP
//$mail->Host       = 'smtp.gmail.com';
$mail->Host  ='mail.gerenciamientosgb.com';
//El puerto será el 587 ya que usamos encriptación TLS
$mail->Port       = 587;
//Definmos la seguridad como TLS
$mail->SMTPSecure = 'TLS';
//Tenemos que usar gmail autenticados, así que esto a TRUE
$mail->SMTPAuth   = true;
//Definimos la cuenta que vamos a usar. Dirección completa de la misma
//$mail->Username   = "noreply.gerenciamientosgb@gmail.com";
$mail->Username   ="no-reply@gerenciamientosgb.com";
//Introducimos nuestra contraseña de gmail
//$mail->Password   = "*123456789";
$mail->Password   = "RUZ@*rm1cS";
//Definimos el remitente (dirección y, opcionalmente, nombre)
$mail->SetFrom('no-reply@gerenciamientosgb.com', 'web gerenciamientosgb');
//Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
$mail->AddReplyTo($lista_emails1);
$mail->AddBcc($lista_emails2);
$mail->AddCc($lista_emails0);
//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
//$mail->AddAddress('destinatario@sucorreo.com', 'El Destinatario');
$mail->AddAddress($lista_emails1);
//Definimos el tema del email
$mail->Subject = $titulo; //'Esto es un correo de prueba';
//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
//$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
$mail->MsgHTML($mensaje);
//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
$mail->AltBody = 'This is a plain-text message body';
//Enviamos el correo
if(!$mail->Send()) {
	/*echo '<img src="http://www.gerenciamientosgb.com/img/logolateralgerenciamiento1.png" alt="Gerenciamientos G.B." style="width: 245px;"/>';
	echo '<h1>Estamos trabajando para darle mejor servicio </h1>';
	echo '<h1>por favor espere, disculpe las molestias ocacionadas</h1>';
	echo '<br/>';
  echo "Error: " . $mail->ErrorInfo;
  echo '<br/>';
  echo "<h1><b>Intente mas tarde</b></h1>";
  echo '<br/>';*/
 // echo '';
 echo'<meta http-equiv="refresh" content="0;url=mailerror.html">';
} else {
	
	/*echo '<h1><img src="http://www.gerenciamientosgb.com/img/logolateralgerenciamiento1.png" alt="Gerenciamientos G.B." style="width: 245px;"/></h1>';
	
  echo "<h2> Mensaje Enviado Con Exito!</h2>";
  echo '<br/>';
  echo '<h2>Agradecemos mucho su interés
  y su contacto con nuestra Empresa.</h2>';
  echo '<br/>';
  echo '<h2>Su consulta, solicitud, sugerencia, reclamo
  o comentario, siempre serán 
  Bienvenidos y Agradecidos.</h2>';
  echo '<br/>';
  echo '<h2>Responderemos a la brevedad posible.</h2>';
  echo '<br/>';
  echo '<h2>Cordialmente</h2>';
  echo '<br/>';
  echo '<h2>El equipo de Gerenciamientos GB</h2>';*/
  //echo '</header>';
  echo'<meta http-equiv="refresh" content="0;url=mailexito.html">';
}
echo '<br/>';
//echo ' Mensaje Enviado Con Exito';

echo '<br/>';
//echo '<a href=”'.$_SERVER['HTTP_REFERER'].'”>Ejemplo de Botón Regresar en PHP</a>';
//echo '<a href="http://www.gerenciamientosgb.com">volver</a>';
?>