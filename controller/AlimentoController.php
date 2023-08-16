<?php
require "../model/Alimento.php";

$alim = new Alimento();

switch($_REQUEST["operador"]){
    case "GetAlimentos":
        $datos = $alim->GetAlimentos();
        if($datos){
            for($i=0; $i<count($datos); i++){
                $list[] = array(
                    "id"=>$datos[$i]['id'],
                    "nombre"=>$datos[$i]['nombre']
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
}
?>