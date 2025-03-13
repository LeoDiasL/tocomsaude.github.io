<?php
// Incluir o arquivo de conexão ao banco de dados
include 'conexao.php';

// Verificar se todos os campos obrigatórios foram enviados pelo formulário
if (
    isset($_POST['nome'], $_POST['nascimento'], $_POST['rg'], 
          $_POST['telefone'], $_POST['email'], $_POST['senha'])
) {
    // Receber os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $rg = $_POST['rg'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Validar e limpar os dados (para evitar SQL Injection)
    $nome = filter_var($nome, FILTER_SANITIZE_STRING);
    $nascimento = filter_var($nascimento, FILTER_SANITIZE_STRING);
    $rg = filter_var($rg, FILTER_SANITIZE_STRING);
    $telefone = filter_var($telefone, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $senha = filter_var($senha, FILTER_SANITIZE_STRING);

    // Criptografar a senha antes de armazenar no banco
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    try {
        // Inserir os dados no banco de dados usando prepared statement com PDO
        $sql = "INSERT INTO usuarios (nome, nascimento, rg, telefone, email, senha) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$nome, $nascimento, $rg, $telefone, $email, $senha_criptografada]);

        // Redirecionar para a página inicial (ou qualquer outra página desejada)
        header('Location: ../HTML/home.html');
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar o usuário: " . $e->getMessage();
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
?>
