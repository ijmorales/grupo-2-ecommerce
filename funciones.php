<?php
// Constantes de la ubicacion de los archivos.
//define("USUARIOS_JSON", "usuarios.json");


session_start();
cookieToSession();

// COOKIES

//

// ACCESO A LA DB


//

// HELPERS

function validarCampoBlanco($campo){
  return !($campo == "" || ctype_space($campo));
}

//

// LEGACY

// function generarId(){
//   $usuarios = traerUsuarios();
//   if($usuarios === null){
//     return 1;
//   }
//   // Obtengo el id del ultimo usuario del array. Asumo que esta ordenado.
//   $lastId = end($usuarios)["id"];
//   return $lastId + 1;
// }

?>
