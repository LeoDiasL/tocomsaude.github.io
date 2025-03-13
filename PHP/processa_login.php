<?php
include 'conexao.php';

if (isset($_POST['email'], $_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Autenticado com sucesso
        header('Location: home.html');
    } else {
        echo "Email ou senha incorretos.";
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
?>
