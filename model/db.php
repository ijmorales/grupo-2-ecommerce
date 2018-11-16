<?php
    abstract class DB{
        public abstract function crearUsuario(Usuario $usuario);
        public abstract function getAllUsuarios();
        public abstract function getUsuarioById(Int $id);
        public abstract function getUsuarioByEmail(String $email);
        // public abstract function deleteUsuario(Int $id);
        public abstract function conectarDB();
    }
?>