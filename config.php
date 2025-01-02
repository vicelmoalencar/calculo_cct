<?php
// Configurações do banco de dados
define('DB_HOST', 'mysql_banco_mysql');
define('DB_NAME', 'calculo');
define('DB_USER', 'calculo');
define('DB_PASS', 'calculo-vic-1968');
define('DB_PORT', '3306');

// Função para conectar ao banco de dados
function connectDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }
    
    return $conn;
}
?>
