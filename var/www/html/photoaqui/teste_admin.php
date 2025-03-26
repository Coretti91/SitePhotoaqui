<?php
// Incluir arquivos necessários
include_once 'api/config/database.php';

// Testar conexão
$database = new Database();
$conn = $database->getConnection();

if($conn) {
    echo "Conexão com banco de dados estabelecida para o painel admin!<br>";
    
    // Testar consulta à tabela de clientes
    $query = "SELECT * FROM clientes LIMIT 5";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    echo "<h3>Clientes encontrados:</h3>";
    echo "<ul>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>ID: " . $row['id'] . " - Nome: " . $row['nome'] . " - Email: " . $row['email'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Falha na conexão com o banco de dados!";
}
?>
