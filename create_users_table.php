<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';

// Conectar ao banco de dados
echo "Conectando ao banco de dados...\n";
try {
    $conn = connectDB();
    echo "Conexão estabelecida.\n";
} catch (Exception $e) {
    echo "Detalhes do erro:\n";
    echo "Host: " . DB_HOST . "\n";
    echo "Porta: " . DB_PORT . "\n";
    echo "Usuário: " . DB_USER . "\n";
    echo "Banco de dados: " . DB_NAME . "\n";
    die("Erro de conexão: " . $e->getMessage() . "\n");
}

// Criar tabela de usuários
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql);
    echo "Tabela 'usuarios' criada com sucesso!\n";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
    echo "SQL: " . $sql . "\n";
}

$conn = null;
?>
