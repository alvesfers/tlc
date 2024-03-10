<?php

include 'controle_de_acesso.php';
require_once('conexao.php');
$user_id = $_SESSION['id_usuario'];
$id_nucleo = $_POST['id_nucleo'];

if ($id_nucleo == 0) {
    $qr_busca_nucleo = $bd->prepare("SELECT u.id_nucleo FROM tb_nucleo n LEFT JOIN tb_usuario u ON n.id_nucleo = u.id_nucleo WHERE u.id_usuario = {$user_id}");
    $qr_busca_nucleo->execute();
    $busca_nucleo = $qr_busca_nucleo->fetch(PDO::FETCH_ASSOC);
    $id_nucleo = $busca_nucleo['id_nucleo'];
}
try {
    // Prepara a consulta SQL
    $stmt = $bd->prepare("SELECT * 
    FROM tb_usuario u 
    JOIN tb_nucleo n ON u.id_nucleo = n.id_nucleo 
    JOIN tb_tipo_usuario tu ON u.id_tipo_usuario = tu.id_tipo_usuario 
    WHERE n.id_nucleo = {$id_nucleo}
    ORDER BY 
        CASE 
            WHEN u.usuario_ativo = 1 AND u.id_tipo_usuario = 1 THEN 0
            WHEN u.usuario_ativo = 1 AND u.id_tipo_usuario = 2 THEN 1
            WHEN u.usuario_ativo = 1 AND u.id_tipo_usuario = 3 THEN 2
            WHEN u.usuario_ativo = 0 THEN 3
            ELSE 4
        END");

    $stmt->execute();

    // Obtém todas as dioceses como um array associativo
    $nucleos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($nucleos);
} catch (PDOException $e) {
    // Se houver algum erro na consulta, retorna uma mensagem de erro
    echo "Erro ao buscar nucleos: " . $e->getMessage();
}
