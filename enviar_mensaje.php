<?php

require_once("email.php");

if(isset($_POST["btnenviar"])) {
	$destinatario=  $lista_emails; //
	$nombre = $_POST["txtnombre"]; //
	$asunto = "Mensaje enviado desde Sistema de Consulta de Saldos";
	$email =  $_POST["txtemail"]; //
	$mensaje= $_POST["txtmensaje"];
	$contenido = "\nMensaje:".$mensaje;
	$envio = mail($destinatario, $asunto , $contenido,"FROM: noreply <noreply@gerencia,iemtosgb.com>") ;
	if ($envio==true) {
		$bien = true ;
	}
	else {
		$bien = false ;
		} //if ($envio==true) {
} //if ($_POST[]) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sistema de consulta de saldo para asociados Country Club Barquisimeto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="textos.css" rel="stylesheet" type="text/css">

</head>

<body>
<table width="100%"  border="0">
  <tr>
    <td align="right"><div align="left"><img src="images/logo-country.jpg" alt="Asociacion Civil Country Club de Barquisimeto. RIF: J-08512777-1" width="300" height="104"></div></td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#3F18A1"><div class="encabezados">Enviar mensaje al Club</div></td>
  </tr>
  <tr>
    <td>
	  <div align="center">
	    <?php if(isset($_POST["btnenviar"])){?>
	    <table width="500" border="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
			<?php if($bien){?>
			<div align="center"><span class="titulos">Su mensaje ha sido enviado</span></div>
			<?php } else { ?>
			<div align="center"><span class="titulos">Hubo problemas para enviar el mensaje, por favor, intentelo m&aacute;s tarde</span></div>
		  <?php }?>          </td></tr>
          <tr>
            <td><div align="center"><a href="index.php">Ir a la p&aacute;gina principal </a></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
	    <?php } else { ?>
      </div>
	  <form name="form1" method="post" action="enviar_mensaje.php">
      <table width="650"  border="0" align="center" cellpadding="5" cellspacing="2">
        <tr>
          <td colspan="2" class="titulos">Enviar mensaje al Club</td>
        </tr>
        <tr>
          <td colspan="2" align="center" >		  </td>
          </tr>
		<tr>
			<td valign="top" bgcolor="#EEFFFF" class="secion"><div align="right">Nombre:</div></td>
			<td bgcolor="#EEFFFF">
				 <input type="text" id ="txtnombre" name="txtnombre" size="16" required class="form-control"
								   data-validation-required-message="Por favor ingrese el nombre" >
			</td>			
		</tr>
        <tr>
          <td valign="top" bgcolor="#EEFFFF" class="secion"><div align="right">Su correo es:</div></td>
          <td bgcolor="#EEFFFF">
			<input type="text" id ="txtemail" name="txtemail" size="16" required class="form-control"
								   data-validation-required-message="Por favor ingrese el mail">
		  &nbsp;&nbsp;<a href="modificar_datos.php">Cambiar mi información</a></td>
        </tr>
        <tr>
          <td bgcolor="#EEFFFF" class="secion"><div align="right">Dirigido a:</div> </td>
          <td bgcolor="#EEFFFF"><select name="dirigido" id="dirigido">
            <option value="fjvelazco@gmail.com">Administración </option>
            <option value="fjvelazco@gmail.com">Dpto. De Créditos y Cobranzas</option>
            <option value="fjvelazco@gmail.com">Community Manager </option>
            <option value="fjvelazco@gmail.com">Gerencia</option>
            </select>
            </td>
        </tr>
        <tr>
          <td width="29%" bgcolor="#EEFFFF" class="secion"><div align="right">Asunto:</div></td>
          <td width="71%" bgcolor="#EEFFFF"><input name="txtasunto" type="text" id="txtasunto" size="50" maxlength="50"></td>
          </tr>
        <tr>
          <td valign="top" bgcolor="#EEFFFF" class="secion"><div align="right">Mensaje:</div></td>
          <td bgcolor="#EEFFFF"><label>
            <textarea name="txtmensaje" cols="50" rows="8" id="txtmensaje"></textarea>
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td bgcolor="#EEFFFF"><input type="submit" name="btnenviar" value="Enviar Mensaje">&nbsp;&nbsp;<a href="index.html">Cancelar</a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><a href="#"></a></td>
        </tr>
      </table>
    </form>
	<?php } ?>
	</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#3F18A1" class="infocopy">&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><a href="iniciar_admin.php">Administrar Sistema </a></td>
  </tr>
</table>
	
</body>
</html>
