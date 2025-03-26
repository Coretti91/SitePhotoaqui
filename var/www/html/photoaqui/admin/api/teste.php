<?php
// Arquivo: api/teste.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Simular dados para o painel admin enquanto corrigimos a conexão com o banco
$dadosSimulados = [
    "success" => true,
    "message" => "Dados de teste carregados com sucesso",
    "clientes" => [
        [
            "id" => "001",
            "nome" => "Maria Silva",
            "email" => "maria@exemplo.com",
            "telefone" => "(11) 98765-4321",
            "data_cadastro" => "2025-02-28",
            "ativo" => true
        ],
        [
            "id" => "002",
            "nome" => "João Santos",
            "email" => "joao@exemplo.com",
            "telefone" => "(11) 91234-5678",
            "data_cadastro" => "2025-02-26",
            "ativo" => true
        ],
        [
            "id" => "003",
            "nome" => "Ana Oliveira",
            "email" => "ana@exemplo.com",
            "telefone" => "(11) 99876-5432",
            "data_cadastro" => "2025-02-20",
            "ativo" => false
        ],
        [
            "id" => "004",
            "nome" => "Carlos Pereira",
            "email" => "carlos@exemplo.com",
            "telefone" => "(11) 95555-1234",
            "data_cadastro" => "2025-02-15",
            "ativo" => true
        ]
    ],
    "total" => 4,
    "pagina_atual" => 1,
    "ultima_pagina" => 1
];

// Retornar dados em formato JSON
echo json_encode($dadosSimulados);
?>
