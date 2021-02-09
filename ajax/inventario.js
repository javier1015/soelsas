function consultaMovimiento(id){
	var xmlhttp = new XMLHttpRequest();
	var datos = "idmovimiento="+id+"&accion=consultaMovimiento";
	xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("lista").innerHTML = xmlhttp.responseText;
        }
    }
	xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}