<?php
include_once 'conexao.php';

$nome_nucleo        = $_POST['nome-nucleo'];
$paroquia_nucleo    = $_POST['paroquia-nucleo'];
$endereco_nucleo    = $_POST['endereco-nucleo'];
$nucleo_ativo       = $_POST['nucleo-ativo'];
$id_nucleo          = $_POST['id-nucleo'];

$stmt = $bd->prepare('UPDATE tb_nucleo SET 
                        nome_nucleo     = :nome_nucleo,
                        nome_paroquia = :paroquia_nucleo,
                        endereco_paroquia = :endereco_nucleo,
                        nucleo_ativo    = :nucleo_ativo
                        WHERE id_nucleo = :id_nucleo');

$stmt->bindParam(':nome_nucleo'     , $nome_nucleo);
$stmt->bindParam(':paroquia_nucleo' , $paroquia_nucleo);
$stmt->bindParam(':endereco_nucleo' , $endereco_nucleo);
$stmt->bindParam(':nucleo_ativo'    , $nucleo_ativo);
$stmt->bindParam(':id_nucleo'       , $id_nucleo);

if ($stmt->execute()) {
    echo true;
} else {
    echo false;
}
?>