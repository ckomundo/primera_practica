 $(document).ready(function(){

$("#nombre").focus();

$("button#accion").click(function(){

 const nombre = $("#nombre").val();
 const apellido = $("#apellido").val();
 const edad = $("#edad").val();
 const extra = $("#extra").val();
 const grupo = $("#grupo").val();
 
 if(nombre == ""){
  $('.mensaje_validacion').html("Escribe tu nombre");
  return;
 }

 if(!isNaN(parseInt(nombre))){
  $('.mensaje_validacion').html("Sin numeros pofabo");
  return;
 }

 if(apellido == ""){
  $('.mensaje_validacion').html("Escribe tu apellido");
  return;
 }

 if(!isNaN(parseInt(apellido))){
  $('.mensaje_validacion').html("Sin numeros pofabo");
  return;
 }

 if(isNaN(parseInt(edad))){
  $('.mensaje_validacion').html("pon tu edad");
  return;
 }

 fetch("sevidor.php", {
  method: "POST",
  headers: new Headers({
         'Content-Type': 'application/x-www-form-urlencoded', // <-- Specifying the Content-Type
     }),
  body: "nombre=" + nombre + "&apellido=" + apellido + "&edad=" + edad + "&grupo=" + grupo + "&extra=" + extra
 })
 .then(function(response){
  return response.json();
 })
 .catch(error => console.error('Error:', error))
 .then(function(data){

  if(data.estatus == "error"){
   $('.mensaje_validacion').html(data.respuesta);
   return;
  }

  $('.mensaje_envio').html(data.respuesta);
  //aqui se maneja la respuesta de servidor
 });

});

});
