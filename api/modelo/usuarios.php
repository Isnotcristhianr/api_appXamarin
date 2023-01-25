<?php
    include '../modelo/conexion.php';

    class usuarios{

        private $con="";

        public function __construct(){
            
            $obj=new coneccion();
            $this->con=$obj->getConeccion();

        }

        //select->get
        public function selectUsu(){
            
            $query = "SELECT *FROM tbl_usuarios;";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }

        public function selectUsuId($id){
            
            $idUsuario = $id;
            
            $query = "SELECT *FROM usuarios WHERE idUsuario='".$id."';";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }

        //insert->post
        public function insertUsu($user, $pass, $nombre, $email){
            
            $query = "INSERT INTO tbl_usuarios (usu_user, usu_pass, usu_nombre
            , usu_email) VALUES ('".$user."', '".$pass."', '".$nombre."', '".$email."');";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }

        //update->put
        public function updateUsu($id, $user, $pass, $nombre, $email){
            
            $query = "UPDATE tbl_usuarios SET usu_user='".$user."', usu_pass='".$pass."', usu_nombre='".$nombre."', usu_email='".$email."' WHERE usu_id='".$id."';";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }

        //delete->delete
        public function deleteUsu($id){
            
            $query = "DELETE FROM tbl_usuarios WHERE usu_id='".$id."';";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }
        

    }
