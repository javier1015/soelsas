
function registraActividad(){
    var xmlhttp = new XMLHttpRequest();

    var a = document.getElementById("NomActi").value;
    var b = document.getElementById("Precio").value;
    var datos = "NomActi="+a+"&Precio="+b+"&accion=registraActividad";
    


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


function listaActividad(dato){ 
    var xmlhttp = new XMLHttpRequest();
    var accion = "nom="+dato+"&accion=listaActividad";

    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("lista").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(accion);   
}


function actualizaActividad(id,nom,pre){
    $('#idac').val(id);
    $('#nomac').val(nom);
    $('#preac').val(pre);
    
}

function modificarActividad(){
    var xmlhttp = new XMLHttpRequest();
    var id = document.getElementById("idac").value;
    var nom = document.getElementById("nomac").value;
    var pre= document.getElementById("preac").value;
    var datos = "idac="+id+"&nomac="+nom+"&preac="+pre+"&accion=actualizaActividad";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaActividad('');
            document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
           
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}

function eliminaActividad(id){
    var xmlhttp = new XMLHttpRequest();
    var datos = "id="+id+"&accion=eliminaActividad";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaActividad('');
            document.getElementById("respuesta").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);      
}





