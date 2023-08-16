<?php
require "../config/Conexion.php";

class Alimento{
    public $cnx;

    function __construct()
    {
        $this->cnx = Conexion::ConectarDB();
    }

    function GetAlimentos()
    {
        $query = "SELECT * FROM alimentos";
        $result= $this->cnx->prepare($query);
        if($result->execute())
        {
            if($result->rowCount() > 0){
                while($fila = $result->fetch(PDO::FETCH_ASSOC)){
                    $datos[] = $fila;
                }
                return $datos;
            }
        }
        return false;
    }
}
?>