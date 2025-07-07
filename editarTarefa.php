<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
<div class="container text-center mb-3 mt-3">
    <?php

        $nomeTarefa = "";
        $nomeColab = "";
        $descTarefa = "";

        if(isset($_GET['idTarefa']))
        {
            $idTarefa = $_GET['idTarefa'];

            include("conexaoBD.php");
            $buscarTarefa = "SELECT * FROM tarefas WHERE idTarefa = $idTarefa";
            $res = mysqli_query($conn, $buscarTarefa);
            $totalTarefas = mysqli_num_rows($res);

            if($totalTarefas > 0)
            {
                if($registro = mysqli_fetch_assoc($res))
                {
                    $nomeTarefa = $registro['nomeTarefa'];
                    $nomeColab = $registro['nomeColab'];
                    $descTarefa = $registro['descTarefa'];
                }
            }
            else
            {
                echo "<div class='alert alert-danger text-center'> Não foi possivel carregar tarefa </div>";
            }

        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Não foi possivel carregar tarefa </div>";
        }
    ?>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    
                    <div class="col-12 col-md-8 col-lg-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Editar Tarefa: "<?php echo $idTarefa?>" </h1>
                            </div>

                            <form class="user" method = "POST" action = "salvarAltTarefa.php">

                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <label for="nomeTarefa">Tarefa:</label>
                                            <input type="text" class="form-control form-control-user" name = 'nomeTarefa' id="nomeExemplo"
                                                value = "<?php echo $nomeTarefa ?>">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="nomeColabResp">Responsável:</label>
                                        <select class="form-control form-control-user" name="nomeColab" id="nomeColab" required>
                                            <?php 
                                                include("conexaoBD.php");
                                                $queryColabs = "SELECT nomeColab FROM colaboradores WHERE status = 'ativo'";
                                                $resulColabs = mysqli_query($conn, $queryColabs);
                                                while($colab = mysqli_fetch_assoc($resulColabs)) 
                                                {
                                                    $nome = $colab['nomeColab'];
                                                    $selected = ($nome == $nomeColab) ? "selected" : "";
                                                    echo "<option value='$nome' $selected>$nome</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                <div class="form-group mb-4">
                                    <label for="descTarefa">Descrição:</label>    
                                        <input type="text" class="form-control form-control-user" name= 'descTarefa' id="exampleInput"
                                                value ="<?php echo $descTarefa?>">
                                </div>
                                <input type="hidden" name="idTarefa" value="<?php echo $idTarefa; ?>">
                                <button type = "submit" class="btn btn-primary btn-user btn-block">
                                    Salvar
                                </button>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>