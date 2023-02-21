<?php

// isset — Determina si una variable está definida y no es null
// empty — Determina si una variable está vacía
// trim — Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena

if($_POST){
    $usuario = "";
    $email = "";
    $mensaje = "";

    if(isset($_POST['usuario'])){
        $usuario = filter_var(trim($_POST['usuario']), FILTER_SANITIZE_STRING);
    }
    if(isset($_POST['email'])){
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    }
    if(isset($_POST['mensaje'])){
        $mensaje = filter_var(trim($_POST['mensaje']), FILTER_SANITIZE_STRING);
    }

    if(empty($usuario)){
        echo json_encode(array(
            'error' => true,
            'campo' => 'usuario'
        ));
        return;
    }

    if(empty($email)){
        echo json_encode(array(
            'error' => true,
            'campo' => 'email'
        ));
        return;
    }

    if(empty($mensaje)){
        echo json_encode(array(
            'error' => true,
            'campo' => 'mensaje'
        ));
        return;
    }

    // Cuerpo del mensaje
    $cuerpo = 'Usuario: ' . $usuario . '<br>';
    $cuerpo .= 'Email: ' . $email . '<br>';
    $cuerpo .= 'Mensaje: ' . $mensaje . '<br>';

    // Direccion
    $destinatario = 'cicerofernandessilva@gmail.com'; //reemplazar por su email
    $asunto = 'Mensaje de mi sitio web';
    $headers  = 'MIME-Version: 1.0' . "\r\n" .'Content-type: text/html; charset=utf-8' . "\r\n" .'From: ' . $correo . "\r\n";

    if(mail($destinatario, $asunto, $cuerpo, $headers)){
        echo json_encode(array(
            'error' => false,
            'campo' => 'exito'
        ));
    } else {
        echo json_encode(array(
            'error' => true,
            'campo' => 'mail'
        ));
    }


} else {
    echo json_encode(array(
        'error' => true,
        'campo' => 'post'
    ));
}

