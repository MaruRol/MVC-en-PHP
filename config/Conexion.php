<?php

class Conexion {


    private $host = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $bd = "abdk";


    private mysqli $conex;


    public function conectar(){
     
     try{  

        $this->conex=new mysqli($this->host,$this->usuario,$this->pass,$this->bd);
        
        $this->conex->set_charset("utf8");

        return $this->conex;

     }catch(mysqli_sql_exception $e){

         die("Error en la conexion! ".$e->getMessage());
     }
    }

    
}
?>
