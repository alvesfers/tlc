<?php

include_once 'conexao.php';

$response = array();
$id_usuario = $_GET['id_usuario'];
$id_usuario_logado = $_GET['usuario_logado'];

// Consulta para obter os dados do usuário logado
$stmt1 = $bd->query("SELECT * FROM tb_usuario u JOIN tb_nucleo n ON u.id_nucleo = n.id_nucleo WHERE id_usuario = {$id_usuario_logado}");
if ($stmt1->rowCount() > 0) {
    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    $response['ul'] = $row;
}else{
    $response['ul'] = 'erro ao encontrar usuario logado';
}

// Consulta para obter os dados do outro usuário
$stmt2 = $bd->query("SELECT * FROM tb_usuario u JOIN tb_nucleo n ON u.id_nucleo = n.id_nucleo WHERE id_usuario = {$id_usuario}");
if ($stmt2->rowCount() > 0) {
    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
    $response['um'] = $row;

    $stmt3 = $bd->query("SELECT s.id_secretaria, s.nome_secretaria FROM tb_secretaria s JOIN tb_usuario_secretaria us ON s.id_secretaria = us.id_secretaria WHERE us.id_usuario = {$id_usuario}");
    $secretarias = array();
    while ($row_secretaria = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        $secretarias[] = $row_secretaria;
    }
    $response['secretarias'] = $secretarias;
}else{
    $response['um'] = 'erro ao encontrar usuario';
}

// Retorna os dados como JSON
echo json_encode($response);