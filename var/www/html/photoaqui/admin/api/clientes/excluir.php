<?php
// Cabeçalhos necessários
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Para solicitações OPTIONS do CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Incluir arquivos de conexão
include_once '../config/database.php';

// Obter ID do cliente
$id = isset($_GET['id']) ? $_GET['id'] : die(json_encode(array("mensagem" => "ID não fornecido")));

// Conectar ao banco de dados
$database = new Database();
$db = $database->getConnection();

try {
    // Preparar a consulta SQL
    $query = "DELETE FROM clientes WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id);
    
    // Executar consulta
    if($stmt->execute()) {
        echo json_encode(array("mensagem" => "Cliente excluído com sucesso"));
    } else {
        http_response_code(503);
        echo json_encode(array("mensagem" => "Não foi possível excluir o cliente"));
    }
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(array("mensagem" => "Erro: " . $e->getMessage()));
}
?>
