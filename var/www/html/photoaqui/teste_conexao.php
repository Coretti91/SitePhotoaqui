<?php
// Mostrar todos os erros
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Informações de conexão
$servername = "localhost";
$username = "photoaqui_user"; // altere para seu usuário
$password = "90211136"; // altere para sua senha
$dbname = "photoaqui"; // altere para o nome do seu banco

// Criar conexão
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurar o PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão estabelecida com sucesso!<br>";
    
    // Teste: listar tabelas
    $stmt = $conn->query("SHOW TABLES");
    echo "<br>Tabelas no banco de dados:<br>";
    while ($row = $stmt->fetch()) {
        echo "- " . $row[0] . "<br>";
    }
    
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
