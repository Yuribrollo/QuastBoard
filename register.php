<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Criar Conta</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Crie Sua Conta!</h1>
                            </div>

                            <form class="user" method = "POST" action = "preenchimentoRegistro.php">

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control form-control-user" name = 'nomeColab' id="nomeExemplo"
                                            placeholder="Nome">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name= 'emailColab' id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-12 ">
                                        <select name ='funcaoColab' class="form-control form-control-user">                                    
                                            <option>Artista</option>
                                            <option>Programador</option>
                                            <option>Game Designer</option>
                                            <option>Administrador</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 ">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name = 'senhaColab' placeholder="Password">
                                </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" name ='confirmarSenhaColab' placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button href = "index.php" type = "submit" class="btn btn-primary btn-user btn-block">
                                    Registrar
</button>
                                <hr>
                            </form>

                            <div class="text-center">
                                <a class="small" href="login.php">Já tem uma conta? Clique aqui!</a>
                            </div>
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