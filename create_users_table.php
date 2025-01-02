<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';

// Conectar ao banco de dados
echo "Conectando ao banco de dados...\n";
$conn = connectDB();
echo "Conexão estabelecida.\n";

// Criar tabela de usuários
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

try {
    if ($conn->query($sql) === TRUE) {
        echo "Tabela 'usuarios' criada com sucesso!\n";
    } else {
        throw new Exception("Erro ao criar tabela: " . $conn->error);
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
    echo "SQL: " . $sql . "\n";
}

$conn->close();
?>
