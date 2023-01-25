<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json charset=utf8');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    
    $varMetodo=$_SERVER['REQUEST_METHOD'];
    

    include '../modelo/productos.php';
    $objProductos=new productos();

    //echo($varMetodo); para ver el tipo de peticion que el cliente pida
    //switchcase es el mas usado
    switch($varMetodo){
        case 'GET':
            //si es get consultar y mostrar los datos del estudiante
            //para determinar el id y acorde a eso ejecutar el select
            if(isset($_GET['prod_id'])){
                
                $id=$_GET['prod_id'];
                $datos=$objProductos->selectProdId($id);
                $numTotal=$datos->rowCount();

            }else{

                $datos=$objProductos->selectProd();
                $numTotal=$datos->rowCount();
            }

            if($numTotal>0){
                //se crea un array para guardar la info y luego transformar a json
                $vectorProductos=array();

                while($fila=$datos->fetch(PDO::FETCH_ASSOC)){
                    extract($fila);

                    $item=array(
                        "prod_id" => $fila["prod_id"],
                        "prod_nombre"=> $fila["prod_nombre"],
                        "prod_descrip"=> $fila["prod_descrip"],
                        "prod_pvp"=> $fila["prod_pvp"],
                    );
                    array_push($vectorProductos, $item);
                }
                //trasnformamos a json
                echo json_encode($vectorProductos, JSON_PRETTY_PRINT);
            }else{
                echo("No hay registro");
            }

            break;
    
        case 'POST':
            //insertar elementos a la tabla 
            
            break;
        
        case 'PUT':
            //actualizar la info  
            
            break;

        case 'DELETE':
            //eliminar

            break;
        
        default:
            echo('Opcion no valida');
            break;
    }

?>
