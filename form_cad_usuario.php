<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e80d3685eb.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <style type="text/css">
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
    <form action="cad_usuario.php" method="post">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Por favor, coloque o usuario</p>
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="nome" class="form-control form-control-lg" name="nome" />
                                        <label class="form-label" for="nome">Nome</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="usuario" class="form-control form-control-lg" name="usuario" />
                                        <label class="form-label" for="usuario">Usuario</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="senha" class="form-control form-control-lg" name="senha" />
                                        <label class="form-label" for="senha">Senha</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <select name="nucleo" id="nucleo" class="form-control form-control-lg">
                                            <option value="1">Santa Paulina</option>
                                            <option value="2">Igreja Verde</option>
                                        </select>
                                        <label class="form-label" for="nucleo">Usuario</label>
                                    </div>
                                    <input type="submit" class="btn btn-outline-light btn-lg px-5" value="Entrar">
                                </div>
                                <div>
                                    <p class="mb-0">Já tem uma conta? <a href="login.php" class="text-white-50 fw-bold">Entrar</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>