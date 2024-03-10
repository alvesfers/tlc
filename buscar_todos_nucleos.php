<?php
require_once('conexao.php');

try {
    // Prepara a consulta SQL
    $stmt = $bd->prepare("SELECT * FROM tb_nucleo");

    $stmt->execute();

    // Obtém todas as dioceses como um array associativo
    $nucleos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($nucleos);
} catch(PDOException $e) {
    // Se houver algum erro na consulta, retorna uma mensagem de erro
    echo "Erro ao buscar núcleos: " . $e->getMessage();
}
?>