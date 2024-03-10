<?php

include 'controle_de_acesso.php';
require_once('conexao.php');
$user_id = $_SESSION['id_usuario'];
$id_diocese = $_POST['id_diocese'];

if ($id_diocese == 0) {
    $qr_busca_diocese = $bd->prepare("SELECT id_diocese FROM tb_nucleo n LEFT JOIN tb_usuario u ON n.id_nucleo = u.id_nucleo WHERE id_usuario = {$user_id}");
    $qr_busca_diocese->execute();
    $busca_diocese = $qr_busca_diocese->fetch(PDO::FETCH_ASSOC);
    $id_diocese = $busca_diocese['id_diocese'];
}
try {
    // Prepara a consulta SQL
    $stmt = $bd->prepare("SELECT * FROM tb_nucleo n JOIN tb_diocese d on n.id_diocese = d.id_diocese JOIN tb_setor s on n.id_setor = s.id_setor WHERE d.id_diocese = {$id_diocese}");

    $stmt->execute();

    // Obtém todas as dioceses como um array associativo
    $nucleos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($nucleos);
} catch (PDOException $e) {
    // Se houver algum erro na consulta, retorna uma mensagem de erro
    echo "Erro ao buscar nucleos: " . $e->getMessage();
}
