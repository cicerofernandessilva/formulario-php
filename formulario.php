<?php

// echo json_encode('Hola PHP!');

// isset — Informa se a variável foi iniciada
// empty — Determina se a variável é vazia,
// trim — Retira espaço no início e final de uma string

if($_POST){
    $usuario = "";
    $email = "";
    $mensaje = "";
    
    if(isset($_POST['usuario'])){
        $usuario = filter_var(trim($_POST['usuario']), FILTER_SANITIZE_STRING);
        // echo json_encode($usuario);
    };
    if(isset($_POST['email'])){
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        //echo json_encode($email);
    };
    if(isset($_POST['mensaje'])){
        $mensaje = filter_var(trim($_POST['mensaje']), FILTER_SANITIZE_STRING);
        // echo json_encode($mensaje);
    };

    if(empty($usuario)){
        echo json_encode(array(
            'erro' => true,
            'campo' => 'usuario' 
        ));
        return;
    }
    if(empty($email)){
        echo json_encode(array(
            'erro' => true,
            'campo' => 'email' 
        ));
        return;
    }
    if(empty($mensaje)){
        echo json_encode(array(
            'erro' => true,
            'campo' => 'mensaje' 
        ));
        return;
    }
    //cuerpo del mensaje
    $cuerpo = 'Usuario: ' . $usuario . '<br>';
    $cuerpo = 'Email: ' . $email . '<br>';
    $cuerpo = 'Mensaje: ' . $mensaje . '<br>';

    //direccion

    $destinatario = 'cicerofernandessilva@gmail.com';
    $asunto = 'Mensaje de mi sitio web';
    $headers  = 'MIME-Version: 1.0' . "\r\n" .'Content-type: text/html; charset=utf-8' . "\r\n" .'From: ' . $correo . "\r\n";

    if(mail($destinatario, $asunto, $cuerpo, $headers)){
        echo json_encode(array(
            'erro' => false,
            'campo' => 'exito'
        ));
    } else {
        echo json_encode(array(
            'erro' => true,
            'campo' => 'mail'
        ));
    }
} else {
    echo json_encode(array(
        'erro' => true,
        'campo' => 'POST'
    ));
}

?>