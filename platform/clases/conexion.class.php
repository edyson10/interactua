<?php
session_start();

class Conexion{
    
    private static $instancia;
    private $dbh;
    //establecemos la conexión con la bd 
    public function __construct(){
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=trivial', 'root', '');
            $this->dbh->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
 
    public function prepare($sql){
        return $this->dbh->prepare($sql);
    }
 
    // Evita que el objeto se pueda clonar
    public function __clone(){
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}