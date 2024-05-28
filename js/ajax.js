// JavaScript Document
 
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosCalzado(s){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resul');
  //recogemos los valores de los inputs
  //s=document.bus_calza.busca.value;
 
  //instanciamos el objetoAjax
  ajax=objetoAjax();
  var pagina;
   if (s == 1) {
		pagina="microfibra.html";
	}
	 else if (s==2) {
		pagina="codai.html";
	}
	else if (s==3) {
		pagina="cristalfa.html";
	}
	else if (s==4) {
		pagina="vidriotemita.html";
	}
	 else {
		pagina="#";
	}
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", pagina,true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		//LimpiarCampos();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	//ajax.send("s="+s)
}
 
//función para limpiar los campos
function LimpiarCampos(){
  document.bus_calza.busca.value="";
  document.bus_calza.busca.focus();
}
