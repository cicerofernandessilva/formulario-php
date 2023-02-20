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
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        //echo json_encode($email);
    };
    if(isset($_POST['mensaje'])){
        $mensaje = filter_var(trim($_POST['mensaje']), FILTER_SANITIZE_STRING);
        echo json_encode($mensaje);
    };
}
