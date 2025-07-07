<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QuestBoard - Criação de Conta</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    
                    <div class="col-12 col-md-8 col-lg-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cadastro de Tarefa:</h1>
                            </div>

                            <form class="user" method = "POST" action = "actionTarefa.php">

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control form-control-user" name = 'nomeTarefa' id="nomeTarefa"
                                            placeholder="Nome da Tarefa">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control form-control-user" name = 'descTarefa' id="descTarefa"
                                            placeholder="Descrição da Tarefa">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-12 ">
                                        <select name ='nomeColab' class="form-control form-control-user">                                    
                                            <?php
                                                include("conexaoBD.php");
                                                $listarColabs = "SELECT * FROM  colaboradores";
                                                $res = mysqli_query($conn, $listarColabs) or die("<div class='alert alert-danger text-center'>Erro ao tentar carregar <strong>Colaboradores</strong></div>");
                                                while($registro = mysqli_fetch_assoc($res))
                                                {
                                                    $idColab = $registro['idColab'];
                                                    $nomeColab = $registro['nomeColab'];
                                                    echo "<option value='$nomeColab'>$nomeColab</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <button href = "index.php" type = "submit" class="btn btn-primary btn-user btn-block">
                                    Cadastrar Tarefa
</button>
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