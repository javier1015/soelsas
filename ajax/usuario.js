
function cargarVista(con, archivo) {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && this.status == 200) {
                document.getElementById(con).innerHTML = this.responseText;
                if(archivo=="contenido/adminList.php"){
                    listaUsuario('');                   
                }else if(archivo=="contenido/inventario.php"){
                    consultaMovimiento('');
                }
            }else{
                console.log("cargando");
            }
        };
        xhttp.open("GET", archivo, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
}


function registraUsuario(){
    var xmlhttp = new XMLHttpRequest();

    var a = document.getElementById("tipodoc").value;
    var b = document.getElementById("documentoUsuario").value;
    var c = document.getElementById("nombreUsuario").value;
    var d = document.getElementById("apellidoUsuario").value;
    var e = document.getElementById("direccionUsuario").value;
    var f = document.getElementById("telefonoUsuario").value;
    var g = document.getElementById("nombreUser").value;
    var h = document.getElementById("clave1").value;
    var i = document.getElementById("clave2").value;
    var j = document.getElementById("rol").value;
    var datos = "tipodoc="+a+"&doc="+b+"&nombre="+c+"&apellido="+d+"&dir="+e+"&tel="+f+"&user="+
    g+"&clave1="+h+"&clave2="+i+"&rol="+j+"&accion=registraUsuario";

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


function listaUsuario(dato){ 
    var xmlhttp = new XMLHttpRequest();
    var accion = "accion=listaUsuarioU";
    if(dato==""){
        accion = "accion=listaUsuarioU";
    }else{
        accion = "doc="+dato+"&accion=listaUsuarioU";
    }

    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("lista").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(accion);   
}

function actualizaUsuario(doc, nombre, apellido, dir, tel){
    $('#docu').val(doc);
    $('#nombreu').val(nombre);
    $('#apellidou').val(apellido);
    $('#direccionu').val(dir);
    $('#telu').val(tel);
}

function modificarUsuario(){
    var xmlhttp = new XMLHttpRequest();
    var doc = document.getElementById("docu").value;
    var nombre = document.getElementById("nombreu").value;
    var apellido = document.getElementById("apellidou").value;
    var direccion = document.getElementById("direccionu").value;
    var tel = document.getElementById("telu").value;
    var datos = "doc="+doc+"&nombre="+nombre+"&apellido="+apellido+"&dir="+direccion+"&tel="+tel+"&accion=actualizaUsuario";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaUsuario('');
            document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
           
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}

function eliminaUsuario(doc){
    var xmlhttp = new XMLHttpRequest();
    var datos = "doc="+doc+"&accion=eliminaUsuario";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaUsuario('');
            document.getElementById("respuesta").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);      
}
//Modifica datos usuario logueado
function modificarDatos(){
    var xmlhttp = new XMLHttpRequest();
    var doc = document.getElementById("doc").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var direccion = document.getElementById("direccion").value;
    var tel = document.getElementById("tel").value;
    var datos = "doc="+doc+"&nombre="+nombre+"&apellido="+apellido+"&dir="+direccion+"&tel="+tel+"&accion=modificarDatos";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("respuesta").innerHTML = xmlhttp.responseText;  
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}

//Actualiza cuenta

function actualizarCuenta(){
    var xmlhttp = new XMLHttpRequest();
    var doc = document.getElementById("doc").value;
    var user = document.getElementById("nameUser").value;
    var claveOriginal = document.getElementById("Clave").value;
    var claveNueva = document.getElementById("NewClave").value;
    var claveVerificada = document.getElementById("VerifClave").value;
    var datos = "doc="+doc+"&user="+user+"&claveOriginal="+claveOriginal+"&claveNueva="+claveNueva+"&claveVerifica="+claveVerificada+"&accion=actualizaCuenta";

    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("respuestaForm").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}


