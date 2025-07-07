<?php
include("conexaoBD.php");

if(isset($_POST['idTarefa']) && isset($_POST['nomeTarefa']) && isset($_POST['nomeColab']) && isset($_POST['descTarefa']))
{
    $idTarefa = intval($_POST['idTarefa']);
    $nomeTarefa = trim($_POST['nomeTarefa']);
    $nomeColab = trim($_POST['nomeColab']);
    $descTarefa = trim($_POST['descTarefa']);

    $edit = "UPDATE tarefas SET nomeTarefa = '$nomeTarefa', nomeColab = '$nomeColab', descTarefa = '$descTarefa' WHERE idTarefa = $idTarefa";

    if(mysqli_query($conn, $edit))
    {
        echo "<div class='alert alert-danger text-center'> Atualizado!</div>";
        header("Location: listagemTarefas.php");
    }
    else
    {
        echo "<div class='alert alert-danger text-center'> Erro</div>";
    }

    mysqli_close($conn);
}
else
{
    echo "<div class='alert alert-danger text-center'>Dados incompletos.</div>";
}
?>