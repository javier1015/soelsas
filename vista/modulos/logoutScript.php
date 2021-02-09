<script type="text/javascript">
	$(document).ready(function(){
		$('.btn-exit').on('click', function(){
	    	swal({
			  	title: '¿Quieres salir del sistema?',
			 	text: "La sesión actual se cerrará y abandonará el sistema.",
			  	type: 'warning',
			  	showCancelButton: true,
			  	confirmButtonText: 'Salir',
			  	closeOnConfirm: false
			},
			function(isConfirm) {
			  	if (isConfirm) {
			  		$.ajax({
			  			url: 'http://localhost:2001/vis/controlador/controladorPrincipal.php?accion=salir',
			  			success:function(d){
			  				if(d=='si'){
			  					window.location='http://localhost:2001/vis';
			  				}else{
			  					window.location='http://localhost:2001/vis';
			  				
			  				}
			  			}
			  		});
			    	
			  	}
			});
	    });
	});
</script>