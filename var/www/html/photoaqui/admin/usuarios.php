<?php
header('Content-Type: application/json');
include 'db.php'; // Arquivo que conecta ao banco de dados

try {
    $stmt = $pdo->query("SELECT id, nome, email, telefone, DATE_FORMAT(data_cadastro, '%d/%m/%Y') as data_cadastro, status FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($usuarios);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erro ao buscar usuários: " . $e->getMessage()]);
}
?>
