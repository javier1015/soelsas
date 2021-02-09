function registraMovimiento(dato){
    var xmlhttp = new XMLHttpRequest();
    
    //condicional para validar confirmacion de movimiento
    if(dato.trim() === "v"){
        $('#tipo').val(0);
        $('#codPT').val("");
        $('#cantidad').val("");
        $('#cod').val("");
        document.getElementById("tipo").style.display = "block";
    }

    var a = document.getElementById("tipo").value;
    var b = document.getElementById("codPT").value;
    var c = document.getElementById("cantidad").value;
    var d = document.getElementById("cod").value;

    var datos = "tipo="+a+"&codPT="+b+"&cantidad="+c+"&codM="+d+"&accion=registraMovimiento";

    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
            var respuesta = xmlhttp.responseText;
            if(respuesta.trim() === "<div class='alert alert-danger'>Todos los campos de este formulario son obligatorios</div>" 
                || respuesta.trim() === "<div class='alert alert-danger'>* Selecciona un tipo de movimiento</div>" 
                || respuesta.trim() === "<div class='alert alert-danger'>Ocurrio un error tecnico intente nuevamente mas tarde</div>" 
                || respuesta.trim() === "<div class='alert alert-danger'>El producto ingresado no esta registrado en el sistema</div>"){
                document.getElementById("respuestaFomulario").innerHTML = respuesta;
            }else{
                document.getElementById("respuestaFomulario").innerHTML = "<div class='alert alert-primary'>Movimiento agregado exitosamente</div>";
                var codigo = respuesta;
                $('#cod').val(codigo);
                document.getElementById("tipo").style.display = "none";
                
            }
            listaDetaMovimiento();
        }
    }

    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}

function listaDetaMovimiento(){ 
    var xmlhttp = new XMLHttpRequest();
    var dato = document.getElementById("cod").value;
    var accion = "id="+dato+"&accion=listaDetaMovimiento";
    

    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("lista").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(accion);   
}

function actualizaMovimiento(pt,cantidad, idmovimiento){
    $('#pt').val(pt);
    $('#can').val(cantidad); 
    $('#idmovimiento').val(idmovimiento);   
}

function modificarDetaMovimiento(){
    var xmlhttp = new XMLHttpRequest();
    var pt = document.getElementById("pt").value;
    var can = document.getElementById("can").value;
    var idmovimiento = document.getElementById("idmovimiento").value;
    var datos = "pt="+pt+"&cantidad="+can+"&idmovimiento="+idmovimiento+"&accion=actualizaMovimiento";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaDetaMovimiento();
            document.getElementById("respuestaFomulario").innerHTML = xmlhttp.responseText;
           
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}


function eliminaMovimiento(id){
    var xmlhttp = new XMLHttpRequest();
    var datos = "idmovimiento="+id+"&accion=eliminaMovimiento";
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            listaDetaMovimiento();
            document.getElementById("respuestaFomulario").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("POST", "../controlador/controladorPrincipal.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);      
}