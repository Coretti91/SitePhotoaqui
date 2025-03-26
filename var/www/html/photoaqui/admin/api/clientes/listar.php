<?php
// /var/www/html/photoaqui/admin/api/clientes/listar.php

// Cabeçalhos necessários
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Para depuração temporária
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir arquivos de conexão
include_once '../config/database.php';

// Inicializar banco de dados
$database = new Database();
$db = $database->getConnection();

// Verificar se a conexão foi estabelecida
if(!$db) {
    // Retornar erro em vez de dados de exemplo
    http_response_code(500);
    echo json_encode(array(
        "erro" => true,
        "mensagem" => "Falha na conexão com o banco de dados",
        "data" => array()
    ));
    exit;
}

// Obter parâmetros da requisição
$data = json_decode(file_get_contents("php://input"));
$status = isset($data->status) ? $data->status : null;
$busca = isset($data->busca) ? $data->busca : null;
$pagina = isset($data->pagina) ? $data->pagina : 1;
$itensPorPagina = 10;

try {
    // Preparar consulta SQL base
    $sql = "SELECT * FROM clientes WHERE 1=1";
    $params = array();
    
    // Adicionar filtros se fornecidos
    if($status) {
        $ativo = ($status == 'ativo') ? 1 : 0;
        $sql .= " AND ativo = ?";
        $params[] = $ativo;
    }
    
    if($busca) {
        $sql .= " AND (nome LIKE ? OR email LIKE ? OR telefone LIKE ?)";
        $termoBusca = "%{$busca}%";
        $params[] = $termoBusca;
        $params[] = $termoBusca;
        $params[] = $termoBusca;
    }
    
    // Depuração: Mostrar a consulta SQL
    // echo "SQL: " . $sql . "\n";
    
    // Contar total de registros para paginação
    $sqlCount = str_replace("SELECT *", "SELECT COUNT(*) as total", $sql);
    $stmtCount = $db->prepare($sqlCount);
    
    // Vincular parâmetros
    for($i = 0; $i < count($params); $i++) {
        $stmtCount->bindValue($i+1, $params[$i]);
    }
    
    $stmtCount->execute();
    $row = $stmtCount->fetch(PDO::FETCH_ASSOC);
    $totalRegistros = $row['total'];
    
    // Calcular número total de páginas
    $totalPaginas = ceil($totalRegistros / $itensPorPagina);
    
    // Adicionar paginação à consulta
    $inicio = ($pagina - 1) * $itensPorPagina;
    $sql .= " ORDER BY id DESC LIMIT {$inicio}, {$itensPorPagina}";
    
    // Preparar e executar a consulta principal
    $stmt = $db->prepare($sql);
    
    // Vincular parâmetros
    for($i = 0; $i < count($params); $i++) {
        $stmt->bindValue($i+1, $params[$i]);
    }
    
    $stmt->execute();
    
    // Array de clientes
    $clientes_arr = array();
    $clientes_arr["data"] = array();
    
    // Verificar se encontrou registros
    if($stmt->rowCount() > 0) {
        // Obter registros
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Garantir que todas as chaves existam
            $id = isset($row['id']) ? $row['id'] : '';
            $nome = isset($row['nome']) ? $row['nome'] : '';
            $email = isset($row['email']) ? $row['email'] : '';
            $telefone = isset($row['telefone']) ? $row['telefone'] : '';
            $endereco = isset($row['endereco']) ? $row['endereco'] : '';
            $cidade = isset($row['cidade']) ? $row['cidade'] : '';
            $estado = isset($row['estado']) ? $row['estado'] : '';
            $cep = isset($row['cep']) ? $row['cep'] : '';
            $ativo = isset($row['ativo']) ? (bool)$row['ativo'] : false;
            $data_cadastro = isset($row['data_cadastro']) ? $row['data_cadastro'] : date('Y-m-d H:i:s');
            
            $cliente_item = array(
                "id" => $id,
                "nome" => $nome,
                "email" => $email,
                "telefone" => $telefone,
                "endereco" => $endereco,
                "cidade" => $cidade,
                "estado" => $estado,
                "cep" => $cep,
                "ativo" => $ativo,
                "created_at" => $data_cadastro
            );
            
            array_push($clientes_arr["data"], $cliente_item);
        }
    }
    
    // Adicionar informações de paginação
    $clientes_arr["total"] = $totalRegistros;
    $clientes_arr["pagina_atual"] = (int)$pagina;
    $clientes_arr["ultima_pagina"] = $totalPaginas;
    
    // Definir código de resposta - 200 OK
    http_response_code(200);
    
    // Enviar resposta em formato json
    echo json_encode($clientes_arr);
    
} catch(Exception $e) {
    // Retornar erro em vez de dados de exemplo
    http_response_code(500);
    echo json_encode(array(
        "erro" => true,
        "mensagem" => "Erro ao processar requisição: " . $e->getMessage(),
        "data" => array()
    ));
}
?>
