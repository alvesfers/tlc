<?php

include_once 'conexao.php';

$response = array();
// Obtém o id_nucleo do parâmetro GET
$id_nucleo = $_GET['id_nucleo'];
$id_usuario = $_GET['usuario_logado'];


$stmt1 = $bd->query("SELECT * 
          FROM tb_usuario u JOIN tb_nucleo n on u.id_nucleo = n.id_nucleo WHERE id_usuario = {$id_usuario}");

if ($stmt1->rowCount() > 0) {
    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    $response['id_usuario_session']             = $row['id_usuario'];
    $response['id_nucleo_usuario_session']      = $row['id_nucleo'];
    $response['id_diocese_usuario_session']     = $row['id_diocese'];
    $response['tipo_usuario']                   = $row['id_tipo_usuario'];
}

$query = "SELECT * 
FROM tb_nucleo 
INNER JOIN tb_usuario ON tb_nucleo.id_nucleo = tb_usuario.id_nucleo 
WHERE tb_nucleo.id_nucleo = {$id_nucleo} AND tb_usuario.id_tipo_usuario = 2";
$stmt = $bd->query($query);


if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $response['nome_nucleo']        = $row['nome_nucleo'];
    $response['nome_paroquia']      = $row['nome_paroquia'];
    $response['endereco_paroquia']  = $row['endereco_paroquia'];
    $response['id_usuario']         = $row['id_usuario'];
    $response['id_diocese']         = $row['id_diocese'];
    $response['id_tipo_usuario']    = $row['id_tipo_usuario'];
    $response['nucleo_ativo']       = $row['nucleo_ativo'];
    $coordenadores = array();
    do {
        $coordenadores[] = array(   'nome_usuario' => $row['nome_usuario']);

    } while ($row = $stmt->fetch(PDO::FETCH_ASSOC));
    $response['coordenadores'] = $coordenadores;
}else{
    $response['erro'] = "Erro";
}

header('Content-Type: application/json');
echo json_encode($response);
