<?php
    /* Llamado a la cadena de conexion */
    require_once("../config/conexion.php");

    /* Llamado a la Clase */
    require_once("../models/Producto.php");

    /* Inicializando la Clase */
    $producto=new Producto();

    /* Opcion de solicitud de controller */
    switch ($_GET['op']) {
        /* Guardar y editar cuando se tiene ID */
        case 'guardaryeditar':
            if (empty($_POST["prod_id"])) {
                $producto->insert_producto($_POST['prod_nombre'],$_POST['prod_precion'],$_POST['prod_preciod'],$_POST['prod_url'],$_POST['prod_img'],$_POST['prod_cupon'],$_POST['prod_descrip']);
            }else {
                $producto->update_producto($_POST['prod_id'],$_POST['prod_nombre'],$_POST['prod_precion'],$_POST['prod_preciod'],$_POST['prod_url'],$_POST['prod_img'],$_POST['prod_cupon'],$_POST['prod_descrip']);
            }
            break;
            
        /* Controller para poder listar */
        case 'listar':
            $datos=$producto->get_producto();
            $data=array();
            foreach ($datos as $row) {
                $sub_array=array();
                
                $sub_array[]=$row["prod_nom"];
                $sub_array[]=$row["prod_precion"];
                $sub_array[]=$row["prod_preciod"];
                $sub_array[]=$row["prod_cupon"];
                $sub_array[]='<button type="button" onClick="editar('.$row["prod_id"].')" id="'.$row["pord_id"].'" class="btn btn-outline-success"><i class="bx bx-edit"></i></button>';
                $sub_array[]='<button type="button" onClick="eliminar('.$row["prod_id"].')" id="'.$row["pord_id"].'" class="btn btn-outline-danger"><i class="bx bx-trash"></i></button>';

                
                                
                $data[] = $sub_array;
            }    
            
            $results = array(
                "sEcho"=>1, /* Información para el datables */
                "iTotalRecords"=>count($datos), /* enviamos el total registros al datable */
                "iTotalDisplayRecords"=>count($datos),/* enviamos el total registros a visualizar */
                "aaData"=>$data);
                 
            
            echo json_encode($results);
            break;

        /* Eliminar segun ID */
        case 'eliminar':
            $producto->delete_producto($_POST["prod_id"]);
            break;

        /* Creando un json segun el ID */
        case 'mostrar':
            $datos=$producto->get_productoxid($_POST["prod_id"]);

            if (is_array($datos)==true and count($datos)<>0) {
                foreach ($datos as $row) {
                    $output["prod_id"] = $row["prod_id"];
                    $output["prod_nom"] = $row["prod_nom"];
                    $output["prod_precion"] = $row["prod_precion"];
                    $output["prod_preciod"] = $row["prod_preciod"];
                    $output["prod_cupon"] = $row["prod_cupon"];
                    $output["prod_url"] = $row["prod_url"];
                    $output["prod_img"] = $row["prod_img"];
                    $output["prod_descrip"] = $row["prod_descrip"];
                   
                }
            }

                

            break;
        
      }


?>