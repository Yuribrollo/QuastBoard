<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listar Tarefas</title>

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

                    <h3 class='text-center'>Listar Tarefas</h3>

                    <?php
                    $listarTarefas = "SELECT * FROM tarefas";

                    include("conexaoBD.php");

                    $res = mysqli_query($conn, $listarTarefas) or die ("Erro ao tentar listar tarefas");

                    $totalTarefas = mysqli_num_rows($res);

                    echo "<div class='alert alert-info text-center'>Há <strong>$totalTarefas</strong> tarefas a fazer!</div>";

                    if ($totalTarefas > 0) {
                        echo "<div class='row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4'>";

                        while ($tarefa = mysqli_fetch_assoc($res)) {
                            $idTarefa = $tarefa['idTarefa'];
                            $nomeTarefa = htmlspecialchars($tarefa['nomeTarefa']);
                            $descTarefa = htmlspecialchars($tarefa['descTarefa']);
                            $nomeColab = htmlspecialchars($tarefa['nomeColab']);

                            echo "
                            <div class='col-md-4'>
                                <div class='card border-left-primary shadow h-100 py-2'>
                                    <div class='card-body'>
                                        <div class='row no-gutters align-items-center'>
                                            <div class='col mr-2'>
                                                <div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>
                                                    $nomeColab
                                                </div>
                                                <div class='h6 mb-0 font-weight-bold text-gray-800'>
                                                    $nomeTarefa
                                                </div>
                                                <div class='text-gray-600'>
                                                    $descTarefa
                                                </div>
                                                <div class='mt-3 d-flex justify-content-between'>
                                                    <a href='editarTarefa.php?idTarefa=$idTarefa' class='btn btn-sm btn-warning'>
                                                        <i class='fas fa-edit'></i> Editar
                                                    </a>
                                                    <a href='checkTarefa.php?idTarefa=$idTarefa' class='btn btn-sm btn-danger' onclick='return confirm(\"Tem certeza que deseja marcar como concluída?\");'>
                                                        <i class='fas fa-check'></i> Check
                                                    </a>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <i class='fas fa-check fa-3x text-gray-300'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                        }

                        echo "</div>"; 
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