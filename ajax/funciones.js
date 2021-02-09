// function fo(d){
// 	$.ajax({
// 		url: '../controlador/controladorPrincipal.php',
// 		type: 'POST',
// 		data: {d},
// 		success:function(res){
// 			if(res!=0){
// 				document.getElementById("lista").innerHTML=res;
// 			}
// 		},
// 		error:function(){
// 			swal(
// 				"Ocurrio un error",
// 				"Ocurrio un error en el servidor intente nuevamente",
// 				"error"
// 			);
// 		}

// 	});
// }
// <form method="POST" action="/submit.php" onsubmit="funcionSubmit(event)">
//     <input type="text">
//     <input type="submit">
// </form>

// function funcionSubmit(event){
//     // esta linea detiene la ejecucion del submit
//     event.preventDefault();

//     // tu funcion ajax
//     $.ajax({
//                 url: '/Desarrollo/admin/users/validar',
//                 data: parametros,
//                 type: 'post',
//                 dataType: "json",
//                 success: function (response) {
//                     if(response.error==true){
//                         // si error es true no hacemos nada porque ya detuvimos el submit
//                     } else {
//                         // si no hubo error volvemos a llamar el submit
//                         // aquí no se si lo que quieres es hacer el submit nativo o uno tuyo propio
//                         // submit nativo
//                         event.target.submit();
//                         // un submit propio seria con una llamada ajax o algo por el estilo
//                     }
//                 },
//                 error: function (jqXHR, textStatus, errorThrown) {
//                     console.log(jqXHR);
//                 }
//             });
// }