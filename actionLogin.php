
<?php

    session_start();
    include("conexaoBD.php");

    $emailColab = mysqli_real_escape_string($conn, $_POST['emailColab']);
    $senhaColab = mysqli_real_escape_string($conn, $_POST['senhaColab']);

    $buscarLogin = "SELECT * FROM colaboradores WHERE emailColab = '{$emailColab}' AND senhaColab = '{$senhaColab}'; ";

    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    if($registro = mysqli_fetch_assoc($efetuarLogin))
    {

        $idColab = $registro['idColab']; 
        $funcaoColab = $registro['funcaoColab'];
        $emailColab = $registro['emailColab'];  
        $nomeColab = $registro['nomeColab']; 
        $senhaColab = $registro['senhaColab']; 

        $_SESSION['idColab'] = $idColab;
        $_SESSION['funcaoColab'] = $funcaoColab;
        $_SESSION['emailColab'] = $emailColab;
        $_SESSION['nomeColab'] = $nomeColab;

        $_SESSION['logado'] = true;

        header('location:listagemTarefas.php?paginalistagemTarefas');
        exit();
    }
    elseif(empty($_POST['emailColab']) || empty($_POST['senhaColab']) || mysqli_num_rows($efetuarLogin) == 0)
    {
        header('location:login.php?pagina=login&erroLogin=dadosInvalidos');
        exit();
    }
?>