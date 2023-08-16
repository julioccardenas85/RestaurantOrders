

<!DOCTYPE html>
<html lang="en">
<?php
        session_start();
        if(isset($_SESSION["user"]))
        {
    ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Comandas Pizzeria</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="../css/main.css" rel="stylesheet">
    
</head>
<body>

<div class="card-block">
<?php 
    if(isset($_SESSION["user"])){
            echo 'Bienvenido '.$_SESSION["user"]["nombre"].' '.$_SESSION["user"]["apellido"];
        }
    ?>
    <form action="../controller/UsuarioController.php?operador=cerrar_sesion" method="POST">
        <button type="submit" class="" >Cerrar sesión</button>
    </form>
    <div class="logo_div"><img src="../img/logo.jpg" class="comandas_logo"></div>
    <h1 class="table_title">Comandas Activas</h1>
    <div class="table-responsive">
        <table id="table_comandas" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th width="10%">OPCIONES</th>
                                <th width="10%">ID</th>
                                <th width="10%">ALIMENTO</th>
                                <th width="10%">CANTIDAD</th>
                                <th width="10%">MESA</th>
                                <th width="10%">ESTADO PEDIDO</th>
                                <th width="20%">USUARIO</th>
                                <th width="20%">FECHA/HORA</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
        </table>
    </div>
    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#create_comanda">Nueva comanda</button>
</div>
    <!-- modal nueva comanda -->
    <?php
        include "queries.php";
    ?>
    <div class="modal fade text-xs-left" id="create_comanda" tabindex="-1" role="dialog" aria-labelledby="myModallabel2" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModallabel2"><i class="icon-road2"></i>Nueva comanda</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Alimento</label>
                        <div class="position-relative has-icon-left">
                            <select id="id_alimento">
                                <?php
                                    foreach ($alimentosData as $valores):
                                        echo '<option value="'.$valores["id"].'">'.$valores["nombre"].'</option>';
                                        endforeach;
                                ?>
                            </select>
                            <div class="form-control-position"><i class="icon-bag"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <div class="position-relative has-icon-left">
                            <input type="number" placeholder="Ingrese cantidad del alimento" class="form-control" id="cantidad" autofocus>
                            <div class="form-control-position"><i class="icon-bag"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mesa</label>
                        <div class="position-relative has-icon-left">
                            <select id="id_mesa">
                                <?php
                                    foreach ($mesasData as $valores):
                                        echo '<option value="'.$valores["id"].'">'.$valores["mesa"].'</option>';
                                        endforeach;
                                ?>
                            </select>
                            <div class="form-control-position"><i class="icon-bag"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Usuario</label>
                        <div class="position-relative has-icon-left">
                            <select id="id_usuario">
                                <?php
                                    foreach ($usuariosData as $valores):
                                        echo '<option value="'.$valores["id"].'">'.$valores["usuario"].'</option>';
                                        endforeach;
                                ?>
                            </select>
                            <div class="form-control-position"><i class="icon-bag"></i></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-primary" onclick="RegistrarComanda();">Registrar</button>
                </div>
            </div>
        </div>
    </div> 

    <script src="../js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../assets/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <script src="../assets/DataTables/datatables.min.js"></script>
    <script src="../assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/Comanda.js" type="text/javascript"></script>
</body>
<?php
        }
        else {
            header("location:../");
        }
?>
</html>