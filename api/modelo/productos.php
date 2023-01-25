<?php
    include '../modelo/conexion.php';

    class productos{

        private $con="";

        public function __construct(){
            
            $obj=new coneccion();
            $this->con=$obj->getConeccion();

        }

        //select->get
        public function selectProd(){
            
            $query = "SELECT *FROM tbl_producto;";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }

        public function selectProdId($id){
            
            $idUsuario = $id;
            
            $query = "SELECT *FROM tbl_producto WHERE prod_id='".$id."';";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }

        //insert->post
        public function insertProd($nombre, $precio, $stock, $descripcion, $imagen){
            
            $query = "INSERT INTO tbl_producto (prod_nombre, prod_precio, prod_stock
            , prod_descripcion, prod_imagen) VALUES ('".$nombre."', '".$precio."', '".$stock."', '".$descripcion."', '".$imagen."');";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }

        //update->put
        public function updateProd($id, $nombre, $precio, $stock, $descripcion, $imagen){
            
            $query = "UPDATE tbl_producto SET prod_nombre='".$nombre."', prod_precio='".$precio."', prod_stock='".$stock."', prod_descripcion='".$descripcion."', prod_imagen='".$imagen."' WHERE prod_id='".$id."';";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }

        //delete->delete
        public function deleteProd($id){
            
            $query = "DELETE FROM tbl_producto WHERE prod_id='".$id."';";
            $resultado=$this->con->prepare($query);
            $resultado->execute();

            return $resultado;
        }
    }
