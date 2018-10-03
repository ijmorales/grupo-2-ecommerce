<?php
// Constantes de la ubicacion de los archivos.
define("USUARIOS_JSON", "usuarios.json");
define("UPLOADS_DIR", "uploads");
if (isset($_COOKIE["email"]) && !isset($_SESSION["usuarioLogueado"])){
  cookieToSession();
}

session_start();

function validar_registracion($datos, $archivos){
  $errores = [];
  // Remueve espacios de más en todos los campos excepto en las contraseñas.
  foreach($datos as $key => $value){
    if($key == "psw" || $key == "psw-repetir"){
      continue;
    }
    $datos[$key]= trim($value);
  }

  // Valido espacios en blanco.
  foreach($datos as $campo => $value){
    if(validar_campo_blanco($value) == false){
      $errores[$campo] = "El campo no debe estar vacio.";
    }
  }

  // Valido nombre y apellido. Solo si ya chequeamos que no esten en blanco.
  // - Longitud entre 3 y 50 caracteres.
  // - Solo letras.
  $nombre = $datos["nombre"];
  $apellido = $datos["apellido"];

  // Chequeo que no hayan dado error por estar en blanco. Si no estan en blanco, sigo.
  if(empty($erorres["nombre"]) && empty($errores["apellido"])){
    // Valido el Nombre
    if(strlen($nombre) < 3 || strlen($nombre) > 50){
      $errores["nombre"] = "El nombre debe contener entre 3 y 50 caracteres.";
    }elseif(!ctype_alpha($nombre)){
      $errores["nombre"] = "El nombre debe contener solo letras.";
    }

    // Valido el Apellido
    if(!ctype_alpha($apellido)){
      $errores["apellido"] = "El apellido debe contener solo letras.";
    }elseif(strlen($apellido) < 3 || strlen($nombre) > 50){
      $errores["apellido"] = "El apellido debe contener entre 3 y 50 caracteres.";
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
  $pswError = "La contraseña debe contener entre 8 y 14 caracteres y al menos una miniscula, una mayuscula y un numero.";
  if(!empty($errores["psw"])){
    // Si la contraseña esta en blanco, va a estar marcada en $errores.
  }elseif(strlen($pw) < 8 || strlen($pw) > 14){
    $errores["psw"] = $pswError;
  }elseif (!preg_match("#[0-9]+#", $pw)) {
    $errores["psw"] = $pswError;
  }elseif (!preg_match("#[A-Z]+#", $pw)){
    $errores["psw"] = $pswError;
  }elseif (!preg_match("#[a-z]+#", $pw)){
    $errores["psw"] = $pswError;
  }

  // Valido la confirmacion del Password. Si esta vacia, omito agregar otro error.
  if($pwRepeat == "" && empty($errores["psw-repeat"])){
    $errores["psw-repeat"] = "La confirmación de contraseña no debe estar vacia.";
  }elseif($pw != $pwRepeat){
    $errores["psw-repeat"] = "Las contraseñas no coinciden.";
  }

  // Valido si el email es correcto. Solo si no detectamos que esta en blanco.
  // Tambien valido que no este repetido.
  if(filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false && empty($errores["email"])){
    $errores["email"] = "El email es incorrecto.";
  }elseif(buscar_por_email($datos["email"]) != NULL){
    $errores["email"] = "El email ya se encuentra registrado.";
  }

  // Chequea que haya archivos
  if($archivos){
    $avatar = $archivos["avatar"];
    // Chequea que se haya subido bien.
    if($avatar["error"] === UPLOAD_ERR_OK){
      $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);
      if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
        $errores["avatar"] = "La extensión del archivo no es correcta.";
      }elseif($avatar["size"] > (5 * 1024 * 1024)){
        $errores["avatar"] = "El archivo es demasiado pesado.";
      }
    }else{
      $errores["avatar"] = "Hubo un error en la carga del archivo. Codigo: " . $avatar["error"] . ".";
    }
  }
  // Valido la extension y el peso del avatar.
  // Chequea que no pese mas de 5mb.

  return $errores;
}

function validar_campo_blanco($campo){
  return !($campo == "" || ctype_space($campo));
}

function armar_usuario($datos, $archivos){
   return [
    "id" => generar_id(),
    "nombre" => trim($datos["nombre"]),
    "apellido" => trim($datos["apellido"]),
    "password" => password_hash($datos["psw"], PASSWORD_DEFAULT),
    "email" => trim($datos["email"]),
    "avatar" => procesar_avatar($archivos["avatar"], $datos["email"])
  ];
}

function crear_usuario($usuario){
  $usuarios = traer_usuarios();

  if($usuarios === NULL){
    $usuarios = [];
  }

  $usuarios[] = $usuario;
  $usuarios = json_encode($usuarios);

  file_put_contents(USUARIOS_JSON, $usuarios);
}

// Recibe un array con los datos del avatar y un string con el nombre final del archivo (sin extension).
function procesar_avatar($avatar, $nombreArchivo){
  $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);
  $archivoTemporal = $avatar["tmp_name"];
  $archivoFinal = UPLOADS_DIR . "/" . "avatars" . "/" . $nombreArchivo . "." . $ext;
  // echo "<pre>";
  move_uploaded_file($archivoTemporal, $archivoFinal);

  // Retorna la ubicacion del archivo final, para poder usarlo.
  return $nombreArchivo . "." . $ext;
}

function traer_usuarios(){
  $json = file_get_contents(USUARIOS_JSON);
  if($json == ""){
    return null;
  }
  return json_decode($json, true);
}

function buscar_por_email($email){
  $usuarios = traer_usuarios();
  foreach($usuarios as $usuario){
    if($usuario["email"] == $email){
      return $usuario;
    }
  }
  return null;
}

function buscar_por_id($id){
  $usuarios = traer_usuarios();
  foreach($usuarios as $usuario){
    if($usuario["id"] == $id){
      return $usuario;
    }
  }
  return null;
}

function generar_id(){
  $usuarios = traer_usuarios();
  if($usuarios === null){
    return 1;
  }
  // Obtengo el id del ultimo usuario del array. Asumo que esta ordenado.
  $lastId = end($usuarios)["id"];
  return $lastId + 1;
}

function verificarLogin($datos){
  $errores = [];
  $errorGeneral = "Los datos ingresados no son correctos.";
  $usuario = buscar_por_email($datos["email"]);

  // Chequea que el email exista. Si existe valida los campos, sino directamente retorna error.
  if($datos["email"] == ""){
    $errores["email"] = "El email no puede estar vacio.";
  }elseif($usuario == null){
    $errores["general"] = $errorGeneral;
  }else{
    // Valida que los campos no esten vacios.
    if($datos["psw"] == ""){
      $errores["psw"] = "La contraseña no debe estar vacia.";
    }elseif(password_verify($datos["psw"], $usuario["password"]) == false){
      $errores["general"] = $errorGeneral;
    }
  }
  return $errores;
}

function loguear($email){
  $_SESSION["usuarioLogueado"] = $email;
}

function estaLogueado(){
  return isset($_SESSION["usuarioLogueado"]);
}

function traerUsuarioLogueado(){
  return buscar_por_email($_SESSION["usuarioLogueado"]);
}

function cookieEmail(){
  return setcookie("email",$_POST["email"], time() + 60*60*24*30);
}

function cookieToSession(){
  return $_SESSION["usuarioLogueado"] = $_COOKIE["email"];
}
?>
