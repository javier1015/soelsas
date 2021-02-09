
function registraProducto(){
    var xmlhttp = new XMLHttpRequest();

    var a = document.getElementById("Pt").value;
    var b = document.getElementById("Nombre").value;
    var c = document.getElementById("cate").value;
    var datos = "Pt="+a+"&Nombre="+b+"&cate="+c+"&accion=registraProducto";
    


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

function listaProducto(dato){ 
    var xmlhttp = new XMLHttpRequest();
    var accion = "pt="+dato+"&accion=listaProducto";

    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("lista").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(accion);   
}


function actualizaProducto(id,nom,idCate, nomCate){
    $('#idpro').val(id);
    $('#nompro').val(nom);
    $('#e').val(idCate);
    $('#er').val(nomCate);
    
}

function modificarProducto(){
    var xmlhttp = new XMLHttpRequest();
    var id = document.getElementById("idpro").value;
    var nom = document.getElementById("nompro").value;
    var cate = document.getElementById("catepro").value;
    var datos = "id="+id+"&nom="+nom+"&cate="+cate+"&accion=actualizaProducto";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaProducto('');
            document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
           
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}


function eliminaProducto(id){
    var xmlhttp = new XMLHttpRequest();
    var datos = "id="+id+"&accion=eliminaProducto";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaProducto('');
            document.getElementById("respuesta").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);      
}







