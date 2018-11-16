<?php
include_once('usuario.php');
include_once('helpers/cookieHelper.php');

class Auth
{
    protected static $instancia;

    protected function __construct()
    {
        session_start();

        if(isset($_COOKIE["usuarioLogueado"]) && !(isset($_SESSION["usuarioLogueado"])))
        {
            $_SESSION["usuarioLogueado"] = $_COOKIE["usuarioLogueado"];
        }
    }

    public static function singleton(){
        if(isset(self::$instancia)){
            return self::$instancia;
        }else{
            self::$instancia = new Auth();
            return self::$instancia;
        }
    }

    public function loguear($id)
    {
        $_SESSION["usuarioLogueado"] = $id;
    }

    public function estaLogueado()
    {
        return isset($_SESSION["usuarioLogueado"]);
    }

    public function getUsuarioLogueado()
    {
        $usuario = Usuario::$db->getUsuarioById($_SESSION["usuarioLogueado"]);
        return $usuario;
    }

    public function logout()
    {
        session_destroy();
        CookieHelper::borrarCookies();
    }
}


?>