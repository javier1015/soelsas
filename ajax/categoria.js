//catrgoria
function registraCategoria(){
    var xmlhttp = new XMLHttpRequest();

    var a = document.getElementById("NomCate").value;
    var b = document.getElementById("DEsCate").value;
    var datos = "NomCate="+a+"&DEsCate="+b+"&accion=registraCategoria";
    


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


function listaCategoria(dato){ 
    var xmlhttp = new XMLHttpRequest();
    var accion = "nom="+dato+"&accion=listaCategoria";

    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("lista").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(accion);   
}

function actualizaCategoria(id,nom,des){
    $('#id').val(id);
    $('#nom').val(nom);
    $('#des').val(des);
    
}

function modificarCategoria(){
    var xmlhttp = new XMLHttpRequest();
    var id = document.getElementById("id").value;
    var nom = document.getElementById("nom").value;
    var des = document.getElementById("des").value;
    var datos = "id="+id+"&nom="+nom+"&des="+des+"&accion=actualizaCategoria";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaCategoria('');
            document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
           
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}

function eliminaCategoria(id){
    var xmlhttp = new XMLHttpRequest();
    var datos = "id="+id+"&accion=eliminaCategoria";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaCategoria('');
            document.getElementById("respuesta").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);      
}
