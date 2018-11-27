<?php
require_once('model/auth.php');
require_once('model/usuario.php');
require_once('model/dbmysql.php');
require_once('model/helpers/cookieHelper.php');
define("UPLOADS_DIR", "uploads");
$db = new DBMYSQL();
Usuario::$db = $db;
$auth = Auth::singleton($db);
?>