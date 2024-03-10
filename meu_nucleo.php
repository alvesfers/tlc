<?php

include 'controle_de_acesso.php';
require_once 'conexao.php';

$user_id = $_SESSION['id_usuario'];
$qr_usuario = $bd->prepare("SELECT * FROM tb_usuario WHERE id_usuario = {$user_id}");
$qr_usuario->execute();
$usuario = $qr_usuario->fetch(PDO::FETCH_ASSOC);

$qr_nucleo = $bd->prepare("SELECT COUNT(*) AS total_nucleos, SUM(CASE WHEN nucleo_ativo = 1 THEN 1 ELSE 0 END) AS nucleos_ativos, SUM(CASE WHEN nucleo_ativo = 0 THEN 1 ELSE 0 END) AS nucleos_inativos FROM tb_nucleo");
$qr_nucleo->execute();
$qtd_nucleo = $qr_nucleo->fetch(PDO::FETCH_ASSOC);

$qr_dirigente = $bd->prepare("SELECT COUNT(*) AS total_dirigentes, SUM(CASE WHEN usuario_ativo = 1 THEN 1 ELSE 0 END) AS dirigentes_ativos, SUM(CASE WHEN usuario_ativo = 0 THEN 1 ELSE 0 END) AS dirigentes_inativos FROM tb_usuario");
$qr_dirigente->execute();
$qtd_dirigente = $qr_dirigente->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TLC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="sidebar.css">
</head>
<style>
  .card-header{
    align-items: center;
    display: flex;
  }
  .card-header span{
    width: 85%;
  }
  .card-header i {
    cursor: pointer;
    font-size: 20px;
    text-align: right;
    width: 15%;
  }
  .teste{
    display: flex;
  }
</style>
<body>
  <?php include ('sidebar.php');?>
  <!-- Conteúdo principal -->
    <div class="content" id="content">
        <h3>Meu núcleo</h3>
        <hr/>
        <h5>Núcleos</h5>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
            <div class="col">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white" id="ver-todos-nucleos"><span>Todos os núcleos</span><i class="bx bx-low-vision"></i></div>
                    <div class="card-body text-primary">
                        <h5 class="card-title text-center"><?php echo $qtd_nucleo['total_nucleos'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white" id="ver-nucleos-ativos"><span>Núcleos ativos</span><i class="bx bx-low-vision"></i></div>
                    <div class="card-body text-success">
                        <h5 class="card-title text-center"><?php echo $qtd_nucleo['nucleos_ativos'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-danger mb-3">
                    <div class="card-header bg-danger text-white" id="ver-nucleos-inativos"><span>Núcleos inativos</span><i class="bx bx-low-vision"></i></div>
                    <div class="card-body text-danger">
                        <h5 class="card-title text-center"><?php echo $qtd_nucleo['nucleos_inativos'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <h5>Dirigentes</h5>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
            <div class="col">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white" id="ver-todos-dirigentes"><span>Todos os Dirigentes</span><i class="bx bx-low-vision"></i></div>
                    <div class="card-body text-primary">
                        <h5 class="card-title text-center"><?php echo $qtd_dirigente['total_dirigentes'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white" id="ver-dirigentes-ativos"><span>Dirigentes ativos</span><i class="bx bx-low-vision"></i></div>
                    <div class="card-body text-success">
                        <h5 class="card-title text-center"><?php echo $qtd_dirigente['dirigentes_ativos'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-danger mb-3">
                    <div class="card-header bg-danger text-white" id="ver-dirigentes-inativos"><span>Dirigentes inativos</span><i class="bx bx-low-vision"></i></div>
                    <div class="card-body text-danger">
                        <h5 class="card-title text-center"><?php echo $qtd_dirigente['dirigentes_inativos'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Scripts Bootstrap -->
  <script src="sidebar.js"></script>
</body>
</html>