<?php
// /var/www/html/photoaqui/admin/api/index.php

// Cabeçalhos necessários
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Resposta básica
$response = array(
    "nome" => "API PhotoAqui",
    "versao" => "1.0",
    "status" => "online",
    "endpoints" => array(
        "clientes" => array(
            "listar" => "/api/clientes/listar.php",
            "obter" => "/api/clientes/obter.php?id={id}",
            "criar" => "/api/clientes/criar.php",
            "atualizar" => "/api/clientes/atualizar.php",
            "excluir" => "/api/clientes/excluir.php"
        )
    )
);

// Retornar resposta
echo json_encode($response);
?>