function registraPago(){
    var xmlhttp = new XMLHttpRequest();

    var a = document.getElementById("usuario").value;
    var b = document.getElementById("actividad").value;
    var c = document.getElementById("cantidad").value;
    var datos = "usuario="+a+"&actividad="+b+"&cantidad="+c+"&accion=registraCarga";
    


    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
            document.getElementById("respuestaFomulario").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}