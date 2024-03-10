<?php
require_once 'conexao.php';

$usuario            = $_POST['usuario']; //Dado inseguro
$nome_usuario       = $_POST['nome']; //Dado inseguro
$senha              = $_POST['senha']; //Dado inseguro
$id_nucleo          = $_POST['nucleo'];
$senha = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $bd->prepare('  INSERT INTO tb_usuario
                            (nome_usuario, login_usuario, senha, id_nucleo) 
                        VALUES 
                            (:nome_usuario, :usuario, :senha, :id_nucleo)'); 
 
$stmt->bindParam(':nome_usuario', $nome_usuario);
$stmt->bindParam(':usuario', $usuario); 
$stmt->bindParam(':senha', $senha); 
$stmt->bindParam(':id_nucleo', $id_nucleo); 
$stmt->execute();

header('location: login.php');

