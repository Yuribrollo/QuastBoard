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
<body>

<div class="container text-center mt-5 mb-5">

<?php 

    if(isset($_GET['idColab']))
    {
        $idColab = $_GET['idColab'];

        include("conexaoBD.php");

        $exibirColab = "SELECT * FROM Colaboradores WHERE idColab = $idColab";
        $res = mysqli_query($conn, $exibirColab);
        $totalColab = mysqli_num_rows($res);

        if($totalColab > 0)
        {
            echo "<div class = 'row text-center'>";

                if($registro = mysqli_fetch_assoc($res))
                {
                    $idColab = $registro["idColab"];
                    $nomeColab = $registro["nomeColab"];
                    $funcaoColab = $registro["funcaoColab"];
                    $emailColab = $registro["emailColab"];
                    $status = $registro["status"];
                    ?>
                     
                    <div class="row justify-content-center">
                        <div class="col-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <?php echo $nomeColab; ?>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $funcaoColab; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php

                }

                echo "</div>";
            } 
            else
            {
                echo "<div class='alert alert-danger'>Colaborador não encontrado!</div>";
            }
        }
   ?>
   
</div>

</body>
</html>



