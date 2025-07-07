<?php
include("conexaoBD.php");

if(isset($_GET['idTarefa']))
{
    $idTarefa  = $_GET['idTarefa'];

    $del = "DELETE FROM tarefas WHERE idTarefa = $idTarefa";

    if(mysqli_query($conn, $del))
    {
        header("Location: listagemTarefas.php");
        exit();
    }
    else 
    {
        echo "<div class='alert alert-danger'>Erro!!!</div>";
    }
}
else 
{
    echo "<div class='alert alert-danger'>ID da tarefa não informada";
}
?>