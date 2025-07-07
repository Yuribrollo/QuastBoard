<?php include "validarSessao.php" ?>

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

        $nomeColab = "";
        $emailColab = "";
        $funcaoColab = "";
        $status = "";

        if(isset($_GET['idColab']))
        {
            $idColab = $_GET['idColab'];

            include("conexaoBD.php");
            $buscarColab = "SELECT * FROM colaboradores WHERE idColab = $idColab";
            $res = mysqli_query($conn, $buscarColab);
            $totalColab = mysqli_num_rows($res);

            if($totalColab > 0)
            {
                if($registro = mysqli_fetch_assoc($res))
                {
                    $idColab = $registro['idColab'];
                    $nomeColab = $registro['nomeColab'];
                    $emailColab = $registro['emailColab'];
                    $funcaoColab = $registro['funcaoColab'];
                    $status = $registro['status'];
                }
            }
            else
            {
                echo "<div class='alert alert-danger text-center'> Não foi possivel carregar colaborador </div>";
            }

        }
        else
        {
            echo "<div class='alert alert-danger text-center'> Não foi possivel carregar colaborador </div>";
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
                                <h1 class="h4 text-gray-900 mb-4">Colaborador ID: "<?php echo $idColab?>" </h1>
                            </div>

                            <form class="user" method = "POST" action = "salvarAltColab.php">

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control form-control-user" name = 'nomeColab' id="nomeExemplo"
                                            value = "<?php echo $nomeColab ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name= 'emailColab' id="exampleInputEmail"
                                        value ="<?php echo $emailColab?>">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 ">
                                        <select name ='funcaoColab' class="form-control form-control-user">                                    
                                            <option value="Artista" <?php if($funcaoColab == 'Artista') echo 'selected'; ?>>Artista</option>
                                            <option value="Programador" <?php if($funcaoColab == 'Programador') echo 'selected'; ?>>Programador</option>
                                            <option value="Game Designer" <?php if($funcaoColab == 'Game Designer') echo 'selected'; ?>>Game Designer</option>
                                            <option value="Administrador" <?php if($funcaoColab == 'Administrador') echo 'selected'; ?>>Administrador</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-sm-12 ">
                                        <select name ='status' class="form-control form-control-user">                                    
                                            <option value="ativo" <?php if($status == 'ativo') echo 'selected'; ?>>ativo</option>
                                            <option value="inativo" <?php if($status == 'inativo') echo 'selected'; ?>>inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="idColab" value="<?php echo $idColab; ?>">
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