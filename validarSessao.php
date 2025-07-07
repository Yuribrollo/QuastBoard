<?php
    session_start();
    if(!isset($_SESSION['logado']) || $_SESSION['logado'] === false){ 
        header('location:login.php?pagina=formLogin&erroLogin=naoLogado');
    }
    else{
        $tipoUsuario = $_SESSION['funcaoColab'];
        if($_SESSION['funcaoColab'] != 'Administrador'){
            header('location:login.php?pagina=login&erroLogin=acessoProibido');
            exit();
        }
    }
?>