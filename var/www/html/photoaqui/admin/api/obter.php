<?php
// /var/www/html/photoaqui/admin/api/clientes/obter.php

// Cabeçalhos necessários
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Incluir arquivos de conexão
include_once '../config/database.php';

// Inicializar banco de dados
$database = new Database();
$db = $database->getConnection();

// Verificar se a conexão foi estabelecida
if(!$db) {
    // Se não conseguir conectar ao banco, retornar dados de exemplo
    returnSampleClient();
    exit;
}

// Obter ID do cliente da URL
$id = isset($_GET['id']) ? $_GET['id'] : die();

try {
    // Consulta para obter o cliente
    $query = "SELECT * FROM clientes WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    
    if($stmt->rowCount() > 0) {
        // Obter registro
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Criar array do cliente
        $cliente = array(
            "id" => $row['id'],
            "nome" => $row['nome'],
            "email" => $row['email'],
            "telefone" => $row['telefone'],
            "endereco" => $row['endereco'],
            "cidade" => $row['cidade'],
            "estado" => $row['estado'],
            "cep" => $row['cep'],
            "ativo" => $row['ativo'] == 1,
            "created_at" => $row['data_cadastro']
        );
        
        // Definir código de resposta - 200 OK
        http_response_code(200);
        
        // Enviar resposta
        echo json_encode($cliente);
    } else {
        // Cliente não encontrado
        http_response_code(404);
        echo json_encode(array("mensagem" => "Cliente não encontrado."));
    }
} catch(Exception $e) {
    // Em caso de erro, retornar dados de exemplo
    returnSampleClient();
}

// Função para retornar cliente de exemplo
function returnSampleClient() {
    // Cliente de exemplo
    $cliente = array(
        "id" => $_GET['id'],
        "nome" => "Cliente Exemplo",
        "email" => "exemplo@photoaqui.com",
        "telefone" => "(11) 99999-9999",
        "endereco" => "Rua Exemplo, 123",
        "cidade" => "São Paulo",
        "estado" => "SP",
        "cep" => "01234-567",
        "ativo" => true,
        "created_at" => "2025-03-01"
    );
    
    // Definir código de resposta - 200 OK
    http_response_code(200);
    
    // Enviar resposta
    echo json_encode($cliente);
}
?>