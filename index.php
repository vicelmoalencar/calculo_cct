<?php
require 'config.php';

// Funções de cálculo
function calcularSoma($a, $b) {
    return $a + $b;
}

function calcularSubtracao($a, $b) {
    return $a - $b;
}

function calcularMultiplicacao($a, $b) {
    return $a * $b;
}

function calcularDivisao($a, $b) {
    if ($b == 0) {
        return "Erro: Divisão por zero!";
    }
    return $a / $b;
}

// Processamento do formulário
$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = floatval($_POST['num1']);
    $num2 = floatval($_POST['num2']);
    $operacao = $_POST['operacao'];
    
    switch ($operacao) {
        case 'soma':
            $resultado = calcularSoma($num1, $num2);
            break;
        case 'subtracao':
            $resultado = calcularSubtracao($num1, $num2);
            break;
        case 'multiplicacao':
            $resultado = calcularMultiplicacao($num1, $num2);
            break;
        case 'divisao':
            $resultado = calcularDivisao($num1, $num2);
            break;
        default:
            $resultado = "Operação inválida!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cálculo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 400px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        .resultado { margin-top: 20px; padding: 10px; background-color: #f0f0f0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Cálculo</h1>
        <form method="POST">
            <div class="form-group">
                <label for="num1">Número 1:</label>
                <input type="number" step="any" name="num1" id="num1" required>
            </div>
            <div class="form-group">
                <label for="num2">Número 2:</label>
                <input type="number" step="any" name="num2" id="num2" required>
            </div>
            <div class="form-group">
                <label for="operacao">Operação:</label>
                <select name="operacao" id="operacao" required>
                    <option value="soma">Soma</option>
                    <option value="subtracao">Subtração</option>
                    <option value="multiplicacao">Multiplicação</option>
                    <option value="divisao">Divisão</option>
                </select>
            </div>
            <button type="submit">Calcular</button>
        </form>

        <?php if ($resultado !== null): ?>
            <div class="resultado">
                <strong>Resultado:</strong> <?php echo $resultado; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
