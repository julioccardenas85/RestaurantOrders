<?php
require "../config/Conexion.php";

class Comanda{
    public $cnx;

    function __construct()
    {
        $this->cnx = Conexion::ConectarDB();
    }

    function GetComandas()
    {
        $query = "SELECT ordenes.id, alimentos.nombre AS alimento, ordenes.cantidad, mesas.mesa AS mesa, estados_pedidos.estado AS estado_pedido, 
        CONCAT(usuarios.nombre, ' ', usuarios.apellido) AS usuario, ordenes.hora
        FROM ordenes
        INNER JOIN alimentos ON ordenes.id_alimento=alimentos.id 
        INNER JOIN mesas ON ordenes.id_mesa=mesas.id 
        INNER JOIN estados_pedidos ON ordenes.id_estado_pedido=estados_pedidos.id 
        INNER JOIN usuarios ON ordenes.id_usuario=usuarios.id;";
        $result = $this->cnx->prepare($query);
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

    function AddComanda($id_alimento,$cantidad,$id_mesa,$id_usuario)
    {
        $query = "INSERT INTO ordenes(id_alimento, cantidad, id_mesa, id_usuario) VALUES (?, ?, ?, ?)";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1,$id_alimento);
        $result->bindParam(2,$cantidad);
        $result->bindParam(3,$id_mesa);
        $result->bindParam(4,$id_usuario); 
        if($result->execute())
        {
            return true;
        }
        return false;

    }
}
?>