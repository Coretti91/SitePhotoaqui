<?php
$host = "localhost";
$dbname = "photoaqui";
$user = "photoaqui_user";
$password = "90211136"; // Troque pela senha correta

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["error" => "Erro na conexão com o banco de dados: " . $e->getMessage()]));
}
?>
