<?php
try {
    $host = 'localhost';
    $dbname = 'tocomsaude';
    $username = 'root';
    $password = '';

    // Cria a conexão usando PDO
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configura o PDO para lançar exceções em caso de erro
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
    exit(); // Encerra o script caso não consiga conectar
}
?>
