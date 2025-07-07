<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listar Colaboradores</title>

    <!-- FontAwesome e CSS do template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <?php require 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid mt-4">

                    <h3 class='text-center'>Listar Colaboradores</h3>

                    <?php
                    $listarColabs = "SELECT * FROM colaboradores";

                    include("conexaoBD.php");

                    $res = mysqli_query($conn, $listarColabs) or die ("Erro ao tentar listar colaboradores");

                    $totalColabs = mysqli_num_rows($res);

                    echo "<div class='alert alert-info text-center'>Há <strong>$totalColabs</strong> colaboradores no seu estúdio!</div>";

                    if ($totalColabs > 0) {
                        echo "<div class='row'>";

                        while ($colab = mysqli_fetch_assoc($res)) {
                            $idColab = $colab['idColab'];
                            $nomeColab = htmlspecialchars($colab['nomeColab']);
                            $funcaoColab = htmlspecialchars($colab['funcaoColab']);
                            $emailColab = htmlspecialchars($colab['emailColab']);
                            $status = htmlspecialchars($colab['status']);

                            $badgeClass = ($status == 'ativo') ? 'success' : 'secondary';

                            echo "
                            <div class='col-md-4 mb-4'>
                                <div class='card border-left-primary shadow h-100 py-2'>
                                    <div class='card-body'>
                                        <div class='row no-gutters align-items-center'>
                                            <div class='col mr-2'>
                                                <div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>
                                                    $nomeColab
                                                </div>
                                                <div class='h6 mb-0 font-weight-bold text-gray-800'>
                                                    $funcaoColab
                                                </div>
                                                <div class='text-gray-600'>
                                                    $emailColab
                                                </div>
                                                <div class='mt-2'>
                                                    <span class='badge badge-$badgeClass'>
                                                        $status
                                                    </span>
                                                </div>
                                                <div class='mt-3 d-flex justify-content-between'>
                                                    <a href='editarColab.php?idColab=$idColab' class='btn btn-sm btn-warning'>
                                                        <i class='fas fa-edit'></i> Editar
                                                    </a>
                                                    <a href='deletarColab.php?idColab=$idColab' class='btn btn-sm btn-danger' onclick='return confirm(\"Tem certeza que deseja deletar este colaborador?\");'>
                                                        <i class='fas fa-trash-alt'></i> Deletar
                                                    </a>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <i class='fas fa-user fa-3x text-gray-300'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                        }

                        echo "</div>"; // fecha row
                    } else {
                        echo "<div class='alert alert-warning text-center'>Nenhum colaborador encontrado.</div>";
                    }

                    mysqli_close($conn);
                    ?>

                </div>
            </div>

        </div>

    </div>

    <!-- Scripts JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>