<?php

require_once('usuario.php');
require_once('db.php');

class DBMySql extends DB
{
    protected $dbConnection;
    protected $credenciales;
    protected $fetchMode = PDO::FETCH_ASSOC;

    public function __construct()
    {
        $this->credenciales = json_decode(file_get_contents("credenciales.json"),true);
        $this->conectarDB();
    }

    public function crearUsuario(Usuario $usuario)
    {
        $q = $this->dbConnection->prepare("INSERT INTO usuarios VALUES(default, :nombre, :apellido, :email, :pw, null, :avatar, null, null)");
        $q->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
        $q->bindValue(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
        $q->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
        $q->bindValue(":pw", $usuario->getPassword(), PDO::PARAM_STR);
        $q->bindValue(":avatar", $usuario->getAvatar(), PDO::PARAM_STR);
        
        try{
            $q->execute();
            return true;
        }catch(\Exception $e){
            return $e;
        }
    }
    
    public function getAllUsuarios()
    {
        $q = $this->dbConnection->prepare("SELECT * FROM usuarios");
        try {
            $q->execute();
        } catch (\Exception $e) {
            return $e;
        }
        $rawUsuarios = $q->fetchAll($this->fetchMode);

        $usuarios = [];
        foreach($rawUsuarios as $rawUsuario){
            $usuarios[] = new Usuario($rawUsuario);
        }

        return $usuarios;
    }
    
    public function getUsuarioById(Int $id)
    {
        $q = $this->dbConnection->prepare("SELECT * FROM usuarios WHERE id = :id");
        $q->bindValue(":id", $id, PDO::PARAM_INT);
        try {
            $q->execute();
        } catch (\Exception $e) {
            return $e;
        }
        return new Usuario($q->fetch($this->fetchMode));
    }

    public function getUsuarioByEmail(String $email)
    {
        $q = $this->dbConnection->prepare("SELECT * FROM usuarios WHERE email = :email");
        $q->bindValue(":email", $email, PDO::PARAM_STR);
        try {
            $q->execute();
        } catch (\Exception $e) {
            return $e;
        }
        $datosUsuario = $q->fetch($this->fetchMode);
        if (!$datosUsuario)
        {
            return false;
        }
        else
        {
            return new Usuario($datosUsuario);
        }
    }

    public function eliminarUsuario(Int $id)
    {
        $q = $this->dbConnection->prepare("DELETE FROM usuarios WHERE id = :id");
        $q->bindValue(":id", $id, PDO::PARAM_INT);
        try{
            $q->execute();
            return true;
        }catch(\Exception $e){
            return $e;
        } 
    }

    public function conectarDB()
    {
        $dsn = 'mysql:host=localhost;dbname=grupo_2_ecommerce;port=3306';
        $credenciales = $this->credenciales;
        $db = new PDO($dsn, $credenciales['user'], $credenciales['pw']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->dbConnection = $db;
    }
}
?>