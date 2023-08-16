<?php
    include "../config/Conexion.php";
    $cnx = Conexion::ConectarDB();

    $alimentosQuery = $cnx->prepare("SELECT * FROM alimentos");
    $alimentosQuery->execute();
    $alimentosData = $alimentosQuery->fetchAll();

    $mesasQuery = $cnx->prepare("SELECT * FROM mesas");
    $mesasQuery->execute();
    $mesasData = $mesasQuery->fetchAll();

    $usuariosQuery = $cnx->prepare("SELECT id, CONCAT(usuarios.nombre, ' ', usuarios.apellido) AS usuario FROM usuarios");
    $usuariosQuery->execute();
    $usuariosData = $usuariosQuery->fetchAll();
?>