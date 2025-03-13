<?php
// Inclua o arquivo de conexão
include 'conexao.php';

try {
    // Conta o total de usuários cadastrados
    $sql = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetch();

    // Exibe a quantidade de usuários cadastrados
    echo "<p>Total de usuários cadastrados: " . $resultado['total_usuarios'] . "</p>";
} catch (PDOException $e) {
    echo "Erro ao contar os cadastros: " . $e->getMessage();
}
?>
