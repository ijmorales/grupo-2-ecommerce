<?php

function validar_registracion($datos){
  $errores = [];
  // Remueve espacios de más en todos los campos excepto en las contraseñas.
  foreach($datos as $key => $value){
    if($key == "psw" || $key == "psw-repetir"){
      continue;
    }
    $data["$key"]= trim($value);
  }

  // Valido espacios en blanco.
  foreach($datos as $campo => $value){
    if(validar_campo_blanco($value) == false){
      $errores["$campo"] = "El campo no debe estar vacio.";
    }
  }

  // Valido nombre y apellido. Solo si ya chequeamos que no esten en blanco.
  // - Longitud entre 3 y 50 caracteres.
  // - Solo letras.
  $nombre = $datos["nombre"];
  $apellido = $datos["apellido"];

  // Chequeo que no hayan dado error por estar en blanco. Si no estan en blanco, sigo.
  if(empty($erorres["nombre"]) && empty($errores["apellido"])){
    // Chequeo la longitud de los 2 campos.
    if(strlen($nombre) < 3 || strlen($nombre) > 50){
      $errores["nombre"] = "El nombre debe contener entre 3 y 50 caracteres.";
    }elseif(strlen($apellido) < 3 || strlen($nombre) > 50){
      $errores["apellido"] = "El apellido debe contener entre 3 y 50 caracteres.";
    }elseif(!ctype_alpha($nombre)){
      $errores["nombre"] = "El nombre debe contener solo letras.";
    }elseif(!ctype_alpha($apellido)){
      $errores["apellido"] = "El apellido debe contener solo letras.";
    }
  }

  // Valido password. Los criterios son:
  // - Una mayuscula como minimo.
  // - Una minuscula como minimo.
  // - Longitud entre 8 y 14 caracteres.
  // - Un numero como minimo.
  $pw = $datos["psw"];
  $pwRepeat = $datos["psw-repeat"];
  // Primero me aseguro de que la contraseña no este vacia.
  if(!empty($errores["psw"])){
    // Si la contraseña esta en blanco, va a estar marcada en $errores.
  }elseif(strlen($pw) < 8 || strlen($pw) > 14){
    $errores["psw"] = "La contraseña debe contener entre 8 y 14 caracteres.";
  }elseif (!preg_match("#[0-9]+#", $pw)) {
    $errores["psw"] = "La contraseña debe contener al menos un numero.";
  }elseif (!preg_match("#[A-Z]+#", $pw)){
    $errores["psw"] = "La contraseña debe contener al menos una mayuscula.";
  }elseif (!preg_match("#[a-z]+#", $pw)){
    $errores["psw"] = "La contraseña debe contener al menos una minuscula.";
  }

  // Valido la confirmacion del Password. Si esta vacia, omito agregar otro error.
  if($pwRepeat == "" && empty($errores["psw-repeat"])){
    $errores["psw-repeat"] = "La confirmación de contraseña no debe estar vacia.";
  }elseif($pw != $pwRepeat){
    $errores["psw-repeat"] = "Las contraseñas no coinciden.";
  }

  // Valido si el email es correcto. Solo si no detectamos que esta en blanco.
  if(filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false && empty($errores["email"])){
    $errores["email"] = "El email es incorrecto.";
  }


  return $errores;
}

function validar_campo_blanco($campo){
  return !($campo == "" || ctype_space($campo));
}

?>
