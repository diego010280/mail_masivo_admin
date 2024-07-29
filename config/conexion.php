<?php

session_start();

/* Iniciamos clase conectar */
class Conectar{

   
    protected $dbh;
     /* Funcion protegida de la cadena de conexion  */
    protected function conexion(){
        
        try {

            $conectar= $this->dbh =new PDO("mysql:local=localhost;dbname=andercode_masivo","root","");
            return $conectar;
        } catch (Exception $e) {
            /* En caso ubiera error en la cadena de conexion */
            print "Error" . $e->getMessage() . "<br>";
            die();
        }
    }

    /* Para impedir que tengamos problemas con las ñ y las tildes */
    public function set_name(){
        return $this->conexion()->query("SET Names 'utf8'");
    }

    /* Ruta prinicipal de nuestro proyecto */
    public static function ruta(){
        return "http://localhost/mail_masivo_admin/";
    }
}
?>