<div class='container mt-3 mb-3'>

<?php

    include "conexaoBD.php";

    function testar_entrada($dado){
        $dado = trim($dado); //TRIM - Remove espaços desnecessários
        $dado = stripslashes($dado); //Remove barras invertidas
        $dado = htmlspecialchars($dado); //Converte caracteres especiais

        return($dado);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $nomeColab = $emailColab = $funcaoColab = $senhaColab = $confirmarSenhaColab = "";
        $erroPreenchimento = false;

        if(empty($_POST["nomeColab"]))
        {
            echo "<div class='alert alert-warning text-center'> O campo <strong> NOME </strong> é obrigatório! </div>";
            $erroPreenchimento = true;
        }
        else
        {
            $nomeColab = testar_entrada($_POST["nomeColab"]);
            if(!preg_match('/^[\p{L} ]+$/u', $nomeColab))
            {
                echo "<div class='alert alert-warning text-center'> O campo <strong> NOME </strong> deve conter apenas letras! </div>";
                $erroPreenchimento = true;
            }
        }

        if(empty($_POST["funcaoColab"]))
        {
            echo "<div class='alert alert-warning text-center'> O campo <strong>FUNCAO</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        }
        else
        {
            $funcaoColab = testar_entrada($_POST["funcaoColab"]);
        }

        if(empty($_POST["emailColab"]))
        {
            echo "<div class='alert alert-warning text-center'> O campo <strong>EMAIL</strong> é obrigatório! </div>";
            $erroPreenchimento = true;
        }
        else
        {
            $emailColab = testar_entrada($_POST["emailColab"]);
        }

        if(empty($_POST["senhaColab"]))
        {
            echo "<div class='alert alert-warning text-center'> O campo <strong>SENHA</strong> é obrigatório! </div>";
            $erroPreenchimento = true;
        }
        else
        {
            $senhaColab = testar_entrada($_POST["senhaColab"]);
        }

        if(empty($_POST["confirmarSenhaColab"]))
        {
            echo "<div class='alert alert-warning text-center'> O campo <strong>REPETIR SENHA</strong> é obrigatório! </div>";
            $erroPreenchimento = true;
        }    
        else
        {

            $confirmarSenhaColab = testar_entrada($_POST["confirmarSenhaColab"]);

            if($senhaColab != $confirmarSenhaColab)
            {
                echo "<div class='alert alert-warning text-center'> As <strong>SENHAS</strong> não conferem! </div>";
                $erroPreenchimento = true;
            }
        }
    }

    if(!$erroPreenchimento)
    {
        $inserirUsuario = "INSERT INTO colaboradores (nomeColab, funcaoColab, senhaColab, confirmarSenhaColab, emailColab) VALUES ('$nomeColab', '$funcaoColab', '$senhaColab', '$confirmarSenhaColab', '$emailColab')";
    
        if(mysqli_query($conn, $inserirUsuario))
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