var table;

init();

function init()
{
    LlenarTablaComandas();
}

function LlenarTablaComandas() {
    table = $('#table_comandas').DataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: "../controller/ComandaController.php?operador=GetComandas",
        columns: [
            {data: 'op'},
            {data: 'id'},
            {data: 'alimento'},
            {data: 'cantidad'},
            {data: 'mesa'},
            {data: 'estado_pedido'},
            {data: 'usuario'},
            {data: 'hora'}
        ]
    });
}

function RegistrarComanda() {
    id_alimento = $('#id_alimento').val();
    cantidad = $('#cantidad').val();
    id_mesa = $('#id_mesa').val();
    id_usuario = $('#id_usuario').val();
    parametros = {
        "id_alimento":id_alimento,"cantidad":cantidad,"id_mesa":id_mesa,"id_usuario":id_usuario
    }
    $.ajax({
        data:parametros,
        url:"../controller/ComandaController.php?operador=AddComanda",
        type:'POST',
        beforeSend:function(){},
        success:function(response){
            if(response == "success"){
                table.ajax.reload();
                LimpiarControles();
                $('#create_comanda').modal('hide');
            }
        }
    })
}

function LimpiarControles(){
    $('#id_alimento').val('');
    $('#cantidad').val('');
    $('#id_mesa').val('');
    $('#id_usuario').val('');
}