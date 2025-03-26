<?php
// Script para configuração do banco de dados
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Teste de conexão ao banco de dados</h2>";

try {
    $conn = new PDO("mysql:host=localhost", "root", "");
    echo "<p style='color:green'>Conexão bem-sucedida!</p>";
    
    // Tentar criar o banco de dados
    $conn->exec("CREATE DATABASE IF NOT EXISTS photoaqui");
    echo "<p>Banco de dados 'photoaqui' verificado/criado.</p>";
    
    // Configurar permissões
    $conn->exec("GRANT ALL PRIVILEGES ON photoaqui.* TO 'root'@'localhost'");
    $conn->exec("FLUSH PRIVILEGES");
    echo "<p>Permissões configuradas.</p>";
    
} catch(PDOException $e) {
    echo "<p style='color:red'>Erro: " . $e->getMessage() . "</p>";
}
?>
