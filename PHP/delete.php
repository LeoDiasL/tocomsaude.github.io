<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE idusuario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$id]);

    header('Location: read.php');
} else {
    echo "ID não fornecido.";
}
?>
