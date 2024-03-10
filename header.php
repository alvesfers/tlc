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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body>
    <!-- Barra lateral -->
    <div class="sidebar" id="sidebar">
        <div class="expand-button">
            <button onclick="expandMenu()">
                <i class='bx bx-menu'></i>
            </button>
        </div>
        <hr class="text-white" />
        <ul>
            <li class="sidebar-item">
                <a href="index.php" style="text-decoration: none;">
                    <i class='bx bx-objects-vertical-bottom'></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item" hidden>
                <a href="index.php" style="text-decoration: none;">
                    <i class='bx bx-objects-vertical-bottom'></i>
                    <span>Eventos</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="diocese.php" style="text-decoration: none;">
                    <i class='bx bx-church'></i>
                    <span>Dioceses</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="nucleo.php" style="text-decoration: none;">
                    <i class='bx bx-church'></i>
                    <span>Núcleos</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="usuario.php" style="text-decoration: none;">
                    <i class='bx bxs-party'></i>
                    <span>Secretarias</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="meu_nucleo.php" style="text-decoration: none;">
                    <i class='bx bx-cog'></i>
                    <span>Configurações do Sistema</span>
                </a>
            </li>
        </ul>
        <hr class="text-white" />
        <div class="sidebar-footer">
            <div id="userIcon" onclick="toggleOptions()">
                <i class='bx bxs-user-circle'></i>
                <span class="nome-user"><?php echo $usuario['nome_usuario'] ?></span>
            </div>
            <hr class="text-white" />
            <div class="user-option" id="userOption" style="display:none">
                <a href="logout.php"><i class='bx bx-exit'></i> <span>Logout</span> </a>
                <a href="#"><i class='bx bxs-log-out'></i></i> <span>Configurações</span></a>
            </div>
        </div>
    </div>

    <!-- Lista de opções do usuário -->
    <div class="user-options" id="userOptions">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <a href="#"><i class="fas fa-cog"></i> Configurações</a>
    </div>
    <input name="usuario_logado" id="usuario_logado" value="<?php echo $user_id ?>" hidden>