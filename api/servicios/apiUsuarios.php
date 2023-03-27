<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json charset=utf8');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    
    $varMetodo=$_SERVER['REQUEST_METHOD'];
    

    include '../modelo/usuarios.php';
    $objEstudiante=new usuarios();

    //echo($varMetodo); para ver el tipo de peticion que el cliente pida
    //switchcase es el mas usado
    switch($varMetodo){
        case 'GET':
            //si es get consultar y mostrar los datos del estudiante
            //para determinar el id y acorde a eso ejecutar el select
            if(isset($_GET['usu_id'])){
                
                $id=$_GET['usu_id'];
                $datos=$objEstudiante->selectUsuId($id);
                $numTotal=$datos->rowCount();

            }else{

                $datos=$objEstudiante->selectUsu();
                $numTotal=$datos->rowCount();
            }

            if($numTotal>0){
                //se crea un array para guardar la info y luego transformar a json
                $vectorUsuario=array();

                while($fila=$datos->fetch(PDO::FETCH_ASSOC)){
                    extract($fila);

                    $item=array(
                        "usu_id" => $fila["usu_id"],
                        "usu_user"=> $fila["usu_user"],
                        "usu_pass"=> $fila["usu_pass"],
                        "usu_nombre"=> $fila["usu_nombre"],
                        "usu_email"=> $fila["usu_email"],
                    );
                    array_push($vectorUsuario, $item);
                }
                //trasnformamos a json
                echo json_encode($vectorUsuario, JSON_PRETTY_PRINT);
            }else{
                echo("No hay registro");
            }

            break;
    
        case 'POST':
            //insertar elementos

            break;
        
        case 'PUT':
            //actualizar la info 
            
            
            break;

        case 'DELETE':
            //eliminar al estudiante

            break;
        
        default:
            echo('Opcion no valida');
            break;
    }

?>
