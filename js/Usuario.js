function ValidarUsuario() {
    email = $('#user_email').val();
    contrasena = $('#user_contrasena').val();
    parametros = {
        "email":email,"contrasena":contrasena
    }
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'controller/UsuarioController.php?operador=validar_usuario',
        beforeSend:function(){},
        success:function(response){
            if(response == "success"){
                location.href="pages/comandas.php";
            } else if(response == "notfound"){
                msg = '<div>Credenciales incorrectas. Verifique la información y vuelva a intentarlo</div>';
            } else if(response == "requireid") {
                msg = '<div>Complete todos los campos y vuelva a intentarlo</div>';
            }
            $('#login_status').html(msg);
            LimpiarController();
        }
    });
}

function LimpiarController(){
    $('#user_email').val("");
    $('#user_contrasena').val("");
}