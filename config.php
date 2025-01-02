<?php
// Configurações do banco de dados
define('DB_HOST', 'srv1601.hstgr.io');
define('DB_PORT', '3306');
define('DB_NAME', 'u890821488_calculo');
define('DB_USER', 'u890821488_calculo');
define('DB_PASS', 'Calculo-vic-1968');
define('DB_URL', 'mysql://calculo:calculo-vic-1968@painel.ensinoplus.com.br:33060/calculo');

// Função para conectar ao banco de dados
function connectDB() {
    try {
        $dsn = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;
        $conn = new PDO($dsn, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
}
?>
