<?php include "validarSessao.php" ?>
<?php
include("conexaoBD.php");

if(isset($_GET['idColab']))
{
    $idColab  = $_GET['idColab'];

    $del = "DELETE FROM colaboradores WHERE idColab = $idColab";

    if(mysqli_query($conn, $del))
    {
        header("Location: listagemColab.php");
        exit();
    }
    else 
    {
        echo "<div class='alert alert-danger'>Erro!!!</div>";
    }
}
else 
{
    echo "<div class='alert alert-danger'>ID do colaborador não informado";
}
?>