<?php
// Constantes de la ubicacion de los archivos.
//define("USUARIOS_JSON", "usuarios.json");
define("UPLOADS_DIR", "uploads");

session_start();
cookieToSession();

// VALIDACIONES
function validarRegistracion($datos, $archivos, $db){
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
    if(validarCampoBlanco($value) == false){
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
  // Tambien valido que no este repetido.
  if(filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false && empty($errores["email"])){
    $errores["email"] = "El email es incorrecto.";
  }elseif(traerUsuarioPorEmail($datos["email"], $db) != ""){
    $errores["email"] = "El email ya se encuentra registrado.";
  }

  // Chequea que haya archivos
  if($archivos){
    $avatar = $archivos["avatar"];
    // Chequea que se haya subido bien.
    // Agregado soporte para que no tire error cuando el usuario no sube archivo.
    // Valido la extension y el peso del avatar.
    // Chequea que no pese mas de 5mb.
    if($avatar["error"] === UPLOAD_ERR_OK){
      $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);
      if($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
        $errores["avatar"] = "La extensión del archivo no es correcta.";
      }elseif($avatar["size"] > (5 * 1024 * 1024)){
        $errores["avatar"] = "El archivo es demasiado pesado.";
      }
    }elseif($avatar["error"] !== UPLOAD_ERR_NO_FILE){
      $errores["avatar"] = "Hubo un error en la carga del archivo. Codigo: " . $avatar["error"] . ".";
    }
  }

  return $errores;
}

function validarLogin($datos, $db){
  $errores = [];
  $errorGeneral = "Los datos ingresados no son correctos.";
  $usuario = traerUsuarioPorEmail($datos["email"], $db);

  // Chequea que el email exista. Si existe valida los campos, sino directamente retorna error.
  if($datos["email"] == ""){
    $errores["email"] = "El email no puede estar vacio.";
  }elseif($usuario == null){
    $errores["general"] = $errorGeneral;
  }else{
    // Valida que los campos no esten vacios.
    if($datos["psw"] == ""){
      $errores["psw"] = "La contraseña no debe estar vacia.";
    }elseif(password_verify($datos["psw"], $usuario["pw"]) == false){
      $errores["general"] = $errorGeneral;
    }
  }
  return $errores;
}
//

// PROCESAMIENTO DE USUARIOS

function armarUsuario($datos, $archivos){
  // La info ya llega validada, por lo que el avatar deberia estar OK.
  // Puede ser que en $archivos llegue algo con codigo ERR_OK o ERR_NO_FILE.
  // Si llega OK, generamos un nombre unico para el archivo y lo guardamos.
  // Si llega NO_FILE, linkeamos al avatar por defecto.
  if(isset($archivos["avatar"]) && $archivos["avatar"]["error"] === UPLOAD_ERR_OK){
    $avatar = procesarAvatar($archivos['avatar'], uniqid());
  }else{
    $avatar = 'default_avatar.jpg';
  }

  return [
    "id" => "default",
    "nombre" => trim($datos["nombre"]),
    "apellido" => trim($datos["apellido"]),
    "password" => password_hash($datos["psw"], PASSWORD_DEFAULT),
    "email" => trim($datos["email"]),
    "avatar" => $avatar
  ];
}

function crearUsuario($usuario, $db){
  $q = $db->prepare("INSERT INTO usuarios VALUES(default, :nombre, :apellido, :email, :pw, null, :avatar, null, null)");
  $q->bindValue(":nombre", $usuario["nombre"], PDO::PARAM_STR);
  $q->bindValue(":apellido", $usuario["apellido"], PDO::PARAM_STR);
  $q->bindValue(":email", $usuario["email"], PDO::PARAM_STR);
  $q->bindValue(":pw", $usuario["password"], PDO::PARAM_STR);
  $q->bindValue(":avatar", $usuario["avatar"], PDO::PARAM_STR);

  try{
    $q->execute();
    return true;
  }catch(\Exception $e){
    return $e;
  }
}

function procesarAvatar($avatar, $nombreArchivo){
  $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);
  $archivoTemporal = $avatar["tmp_name"];
  $archivoFinal = UPLOADS_DIR . "/" . "avatars" . "/" . $nombreArchivo . "." . $ext;
  // echo "<pre>";
  move_uploaded_file($archivoTemporal, $archivoFinal);

  // Retorna la ubicacion del archivo final, para poder usarlo.
  return $nombreArchivo . "." . $ext;
}

//

// LOGIN DE USUARIOS

function loguear($id){
  $_SESSION["usuarioLogueado"] = $id;
}

function estaLogueado(){
  return isset($_SESSION["usuarioLogueado"]);
}

function traerUsuarioLogueado($db){
  return traerUsuarioPorId($_SESSION["usuarioLogueado"], $db);
}

//

// COOKIES

function cookieRecordarme($id){
  return setcookie("usuarioLogueado", $id, time() + 60*60*24*30);
}

function cookieToSession(){
  if(isset($_COOKIE["usuarioLogueado"]) && !(isset($_SESSION["usuarioLogueado"]))){
    $_SESSION["usuarioLogueado"] = $_COOKIE["usuarioLogueado"];
  }
}

function borrarCookies(){
  setcookie("usuarioLogueado", "", -1);
}

//

// ACCESO A LA DB

function conectarDB(){
  $user = 'root';
  $pw = '';
  $dsn = 'mysql:host=localhost;dbname=grupo_2_ecommerce;port=3306';
  $db = new PDO($dsn, $user, $pw);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $db;
}
function traerUsuarios($db, $fetchMode = PDO::FETCH_ASSOC){
  $q = $db->prepare("SELECT * FROM usuarios");
  try {
    $q->execute();
  } catch (\Exception $e) {
    return $e;
  }
  return $q->fetchAll($fetchMode);
}

function traerUsuarioPorEmail($email, $db, $fetchMode = PDO::FETCH_ASSOC){
  $q = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
  $q->bindValue(":email", $email, PDO::PARAM_STR);
  try {
    $q->execute();
  } catch (\Exception $e) {
    return $e;
  }
  return $q->fetch($fetchMode);
}

function traerUsuarioPorId($id, $db, $fetchMode = PDO::FETCH_ASSOC){
  $q = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
  $q->bindValue(":id", $id, PDO::PARAM_INT);
  try {
    $q->execute();
  } catch (\Exception $e) {
    return $e;
  }
  return $q->fetch($fetchMode);
}

function eliminarUsuario($id, $db){
  $q = $db->prepare("DELETE FROM usuarios WHERE id = :id");
  $q->bindValue(":id", $id, PDO::PARAM_INT);
  try{
    $q->execute();
    return true;
  }catch(\Exception $e){
    return $e;
  }
}
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
