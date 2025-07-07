<div class='container mt-3 mb-3'>

<?php

    include "conexaoBD.php";

    function testar_entrada($dado){
        $dado = trim($dado); 
        $dado = stripslashes($dado); 
        $dado = htmlspecialchars($dado); 

        return($dado);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $nomeTarefa = $nomeColab = $descTarefa = "";
        $erroPreenchimento = false;

        if(empty($_POST["nomeTarefa"]))
        {
            echo "<div class='alert alert-warning text-center'> O campo <strong> NOME </strong> é obrigatório! </div>";
            $erroPreenchimento = true;
        }
        else
        {
            $nomeTarefa = testar_entrada($_POST["nomeTarefa"]);
        }

        if(empty($_POST["nomeColab"]))
        {
            echo "<div class='alert alert-warning text-center'> O campo <strong>Responsável</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        }
        else
        {
            $nomeColabResp = testar_entrada($_POST["nomeColab"]);
        }

        if(empty($_POST["descTarefa"]))
        {
            echo "<div class='alert alert-warning text-center'> O campo <strong>Descrição</strong> é obrigatório! </div>";
            $erroPreenchimento = true;
        }
        else
        {
            $descTarefa = testar_entrada($_POST["descTarefa"]);
        }

        
    }

    if(!$erroPreenchimento)
    {
        $inserirTarefa = "INSERT INTO tarefas (nomeTarefa, nomeColab, descTarefa) VALUES ('$nomeTarefa', '$nomeColabResp', '$descTarefa')";
    
        if(mysqli_query($conn, $inserirTarefa))
        {
            header("location: listagemTarefas.php");
            exit();
        }
        else
        {

            echo "<div class='alert alert-danger text-center'>Erro ao inserir no banco: " . mysqli_error($conn) . "</div>";

        }
    
    }


 





?>