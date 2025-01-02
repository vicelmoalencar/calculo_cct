<?php
require 'config.php';

// Conectar ao banco de dados
$conn = connectDB();

// Criar tabela de testes
$sql = "CREATE TABLE IF NOT EXISTS calculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    num1 FLOAT NOT NULL,
    num2 FLOAT NOT NULL,
    operacao VARCHAR(20) NOT NULL,
    resultado FLOAT NOT NULL,
    data_calculo TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela 'calculos' criada com sucesso!\n";
} else {
    die("Erro ao criar tabela: " . $conn->error);
}

// Inserir dados de teste
$testes = [
    [10, 5, 'soma', 15],
    [20, 4, 'subtracao', 16],
    [6, 7, 'multiplicacao', 42],
    [100, 25, 'divisao', 4]
];

foreach ($testes as $teste) {
    $stmt = $conn->prepare("INSERT INTO calculos (num1, num2, operacao, resultado) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddss", $teste[0], $teste[1], $teste[2], $teste[3]);
    
    if ($stmt->execute()) {
        echo "Registro inserido: {$teste[0]} {$teste[2]} {$teste[1]} = {$teste[3]}\n";
    } else {
        echo "Erro ao inserir registro: " . $stmt->error . "\n";
    }
    $stmt->close();
}

// Consultar dados
$result = $conn->query("SELECT * FROM calculos ORDER BY data_calculo DESC");

if ($result->num_rows > 0) {
    echo "\nRegistros na tabela 'calculos':\n";
    while($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']} | {$row['num1']} {$row['operacao']} {$row['num2']} = {$row['resultado']} | {$row['data_calculo']}\n";
    }
} else {
    echo "Nenhum registro encontrado na tabela 'calculos'.\n";
}

$conn->close();
?>
