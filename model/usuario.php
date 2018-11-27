<?php

include_once('model.php');

class Usuario extends Model{
    protected $table = "usuarios";
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $pw;
    protected $direccion;
    protected $avatar = 'default_avatar.jpg';
    public static $db;

    public static function create(Array $datos){
        $usuario = new Usuario($datos);
        self::$db->crearUsuario($usuario);
    }

    public function __construct(Array $datos){
        // Si existe la posicion ID suponemos
        // que el usuario ya existe.
        if(isset($datos['id'])){
            $this->id = $datos['id'];
            $this->pw = $datos['pw'];
        }else{
            $this->id = NULL;
            $this->pw = password_hash($datos["pw"], PASSWORD_DEFAULT);
        }
        $this->nombre = $datos['nombre'];
        $this->apellido = $datos['apellido'];
        $this->email = $datos['email'];
        $this->avatar = isset($datos['avatar']) ? $datos['avatar'] : 'default_avatar.jpg';
    }

    public static function procesarAvatar(Array $avatar){
        $nombreArchivo = uniqid();
        $ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);
        $archivoTemporal = $avatar["tmp_name"];
        $archivoFinal = UPLOADS_DIR . "/" . "avatars" . "/" . $nombreArchivo . "." . $ext;
        // echo "<pre>";
        move_uploaded_file($archivoTemporal, $archivoFinal);

        // Retorna la ubicacion del archivo final, para poder usarlo.
        return $nombreArchivo . "." . $ext;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword($pw){
        $this->pw = $pw;
    }

    public function getPassword(){
        return $this->pw;
    }

    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }

    public function getAvatar(){
        return $this->avatar;
    }

    public function getID(){
        return $this->id;
    }
}

?>