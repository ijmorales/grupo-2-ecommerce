<?php
include_once('db.php');
class Validator{
    protected $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function validarLogin($datos)
    {
        $errores = [];
        $errorGeneral = "Los datos ingresados no son correctos.";
        $usuario = $this->db->getUsuarioByEmail($datos['email']);
        $hash = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);
      
        // Chequea que el email exista. Si existe valida los campos, sino directamente retorna error.
        if($datos["email"] == ""){
          $errores["email"] = "El email no puede estar vacio.";
        }elseif($usuario == null){
          $errores["general"] = $errorGeneral;
        }else{
          // Valida que los campos no esten vacios.
          if($datos["pw"] == ""){
            $errores["pw"] = "La contraseña no debe estar vacia.";
          }elseif(password_verify($datos["pw"], $usuario->getPassword()) == false){
            $errores["general"] = $errorGeneral;
          }
        }
        return $errores;
    }

    public function validarRegistracion($datos, $archivos)
    {
        $errores = [];
        // Remueve espacios de más en todos los campos excepto en las contraseñas.
        foreach($datos as $key => $value){
            if($key == "pw" || $key == "pw-repetir")
            {
                continue;
            }
          $data["$key"]= trim($value);
        }
      
        // Valido espacios en blanco.
        foreach($datos as $campo => $value){
            if($this->validarCampoBlanco($value) == false)
            {
                $errores["$campo"] = "El campo no debe estar vacio.";
            }
        }
      
        // Valido nombre y apellido. Solo si ya chequeamos que no esten en blanco.
        // - Longitud entre 3 y 50 caracteres.
        // - Solo letras.
        $nombre = $datos["nombre"];
        $apellido = $datos["apellido"];
      
        // Chequeo que no hayan dado error por estar en blanco. Si no estan en blanco, sigo.
        if (empty($erorres["nombre"]) && empty($errores["apellido"]))
        {
          // Chequeo la longitud de los 2 campos.
            if (strlen($nombre) < 3 || strlen($nombre) > 50)
            {
                $errores["nombre"] = "El nombre debe contener entre 3 y 50 caracteres.";
            }
            elseif (strlen($apellido) < 3 || strlen($nombre) > 50)
            {
                $errores["apellido"] = "El apellido debe contener entre 3 y 50 caracteres.";
            }
            elseif (!ctype_alpha($nombre))
            {
                $errores["nombre"] = "El nombre debe contener solo letras.";
            }
            elseif (!ctype_alpha($apellido))
            {
                $errores["apellido"] = "El apellido debe contener solo letras.";
            }
        }
      
        // Valido password. Los criterios son:
        // - Una mayuscula como minimo.
        // - Una minuscula como minimo.
        // - Longitud entre 8 y 14 caracteres.
        // - Un numero como minimo.
        $pw = $datos["pw"];
        $pwRepeat = $datos["pw-repeat"];
        // Primero me aseguro de que la contraseña no este vacia.
        if (!empty($errores["pw"]))
        {
          // Si la contraseña esta en blanco, va a estar marcada en $errores.
        }
        elseif (strlen($pw) < 8 || strlen($pw) > 14)
        {
            $errores["pw"] = "La contraseña debe contener entre 8 y 14 caracteres.";
        }
        elseif (!preg_match("#[0-9]+#", $pw))
        {
            $errores["pw"] = "La contraseña debe contener al menos un numero.";
        }
        elseif (!preg_match("#[A-Z]+#", $pw))
        {
            $errores["pw"] = "La contraseña debe contener al menos una mayuscula.";
        }
        elseif (!preg_match("#[a-z]+#", $pw))
        {
            $errores["pw"] = "La contraseña debe contener al menos una minuscula.";
        }
      
        // Valido la confirmacion del Password. Si esta vacia, omito agregar otro error.
        if ($pwRepeat == "" && empty($errores["pw-repeat"]))
        {
            $errores["pw-repeat"] = "La confirmación de contraseña no debe estar vacia.";
        }
        elseif ($pw != $pwRepeat)
        {
            $errores["pw-repeat"] = "Las contraseñas no coinciden.";
        }
      
        // Valido si el email es correcto. Solo si no detectamos que esta en blanco.
        // Tambien valido que no este repetido.
        if (filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false && empty($errores["email"]))
        {
            $errores["email"] = "El email es incorrecto.";
        }elseif ($this->db->getUsuarioByEmail($datos["email"]) != ""){
            $errores["email"] = "El email ya se encuentra registrado.";
        }
      
        // Chequea que haya archivos
        if ($archivos)
        {
            $avatar = $archivos["avatar"];
            // Chequea que se haya subido bien.
            // Agregado soporte para que no tire error cuando el usuario no sube archivo.
            // Valido la extension y el peso del avatar.
            // Chequea que no pese mas de 5mb.
            if ($avatar["error"] === UPLOAD_ERR_OK)
            {
                $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);
                if ($ext != "jpg" && $ext != "jpeg" && $ext != "png")
                {
                    $errores["avatar"] = "La extensión del archivo no es correcta.";
                }
                elseif ($avatar["size"] > (5 * 1024 * 1024))
                {
                    $errores["avatar"] = "El archivo es demasiado pesado.";
                }
            }
            elseif ($avatar["error"] !== UPLOAD_ERR_NO_FILE)
            {
                $errores["avatar"] = "Hubo un error en la carga del archivo. Codigo: " . $avatar["error"] . ".";
            }
        }
      
        return $errores;
    }

    public function validarCampoBlanco($campo)
    {
        return !($campo == "" || ctype_space($campo));
    }
}
?>