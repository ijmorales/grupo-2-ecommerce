<?php

class CookieHelper{
    public static function setCookieRecordarme($id)
    {
        return setcookie("usuarioLogueado", $id, time() + 60*60*24*30);
    }

    public static function borrarCookies()
    {
        return setcookie("usuarioLogueado", "", -1);
    }
}
?>