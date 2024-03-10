<?php
require_once('conexao.php');

try {
    // Prepara a consulta SQL
    $stmt = $bd->prepare("SELECT id_diocese, nome_diocese FROM tb_diocese");

    $stmt->execute();

    // Obtém todas as dioceses como um array associativo
    $dioceses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($dioceses);
} catch(PDOException $e) {
    // Se houver algum erro na consulta, retorna uma mensagem de erro
    echo "Erro ao buscar dioceses: " . $e->getMessage();
}
?>