
<?php
require_once 'conexao.php';

$id_usuario = $_GET['id_usuario'];
$id_tipo_usuario = 3; // Defina o valor desejado para id_tipo_usuario

// Atualize o registro existente com o novo valor de id_tipo_usuario
$stmt = $bd->prepare('UPDATE tb_usuario SET id_tipo_usuario = :id_tipo_usuario WHERE id_usuario = :id_usuario');

$stmt->bindParam(':id_tipo_usuario', $id_tipo_usuario);
$stmt->bindParam(':id_usuario', $id_usuario);

if ($stmt->execute()) {
    echo true;
} else {
    echo false;
}
?>