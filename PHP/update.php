<?php
include 'conexao.php';

if (isset($_POST['email'], $_POST['campo'], $_POST['novo_valor'])) {
    $email = $_POST['email'];
    $campo = $_POST['campo'];
    $novo_valor = $_POST['novo_valor'];

    // Verifica se o campo selecionado é permitido para atualização
    $campos_permitidos = ['nome', 'nascimento', 'rg', 'email', 'senha'];
    
    if (!in_array($campo, $campos_permitidos)) {
        echo "Campo inválido.";
        exit();
    }

    // Gera a consulta SQL dinamicamente com o campo escolhido
    $sql = "UPDATE usuarios SET $campo = ? WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    
    try {
        $stmt->execute([$novo_valor, $email]);
        echo "Atualização realizada com sucesso!";
        // Redireciona para a página de sucesso ou exibe uma mensagem
        header('Location: read.php');
    } catch (PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
} else {
    echo "Dados inválidos.";
}
?>
