<?php

 // Modo PDO

    class coneccion{
        private $servidor;
        private $usuario;
        private $password;
        private $bd;

        private $conexion;

        public function __construct()
        {
            $this->servidor="localhost";
            $this->usuario="root";
            $this->password="";
            $this->bd="xamarinapp1";
            $this->conexion="";
        
        }

        public function getConeccion()
        {
            try{

            // PDO
            $this->conexion = new PDO("mysql:host=".$this->servidor.";dbname=".$this->bd, $this->usuario, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
            echo "<h1>Conectado a la base de datos</h1>";
         
            }catch(PDOException $e){
                echo "Error: ".$e->getMessage();
            }

        }
    }


?>