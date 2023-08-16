<?php
require "../model/Comanda.php";

$com = new Comanda();

switch($_REQUEST["operador"]){
    case "GetComandas":
    
        $datos = $com->GetComandas();
        if($datos){
            for($i=0; $i<count($datos); $i++){
                $list[] = array(
                    "op"=>"Editar/Eliminar",
                    "id"=>$datos[$i]['id'],
                    "alimento"=>$datos[$i]['alimento'],
                    "cantidad"=>$datos[$i]['cantidad'],
                    "mesa"=>$datos[$i]['mesa'],
                    "estado_pedido"=>$datos[$i]['estado_pedido'],
                    "usuario"=>$datos[$i]['usuario'],
                    "hora"=>$datos[$i]['hora']
                );
            }
            $resultados = array(
                "sEcho" => 1,
                "iTotalRecords" => count($list),
                "iTotalDisplayRecords" => count($list),
                "aaData" => $list
            );
        }
        echo json_encode($resultados);
        
    break;

    case "AddComanda":
        if(isset($_POST["id_alimento"],$_POST["cantidad"],$_POST["id_mesa"],$_POST["id_usuario"]) && !empty($_POST["id_alimento"]) && 
        !empty($_POST["cantidad"]) && !empty($_POST["id_mesa"]) && !empty($_POST["id_usuario"])) {
            $id_alimento = $_POST["id_alimento"];
            $cantidad = $_POST["cantidad"];
            $id_mesa = $_POST["id_mesa"];
            $id_usuario = $_POST["id_usuario"];
            if($com->AddComanda($id_alimento,$cantidad,$id_mesa,$id_usuario)) {
                $response = "success";
            } else {
                $response = "error";
            }
        } else {
            $response = "requireid";
        }
        echo $response;
        
    break;
}
?>