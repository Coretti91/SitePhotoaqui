<?php
// database.php
class Database {
    // Credenciais do banco de dados
    private $host = "localhost";
    private $db_name = "photoaqui";
    private $username = "root";  // Usuário MySQL
    private $password = "";      // Senha MySQL (vazia por padrão para instalações locais)
    public $conn;

    // Método para obter a conexão
    public function getConnection() {
        $this->conn = null;

        try {
            // Tentar conexão simples primeiro
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                  $this->username, 
                                  $this->password);
            
            // Definir atributos para melhor tratamento de erros
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->exec("set names utf8");
            
            return $this->conn;
        } catch(PDOException $exception) {
            // Gravar erro em log em vez de exibi-lo ao usuário
            error_log("Erro de conexão: " . $exception->getMessage());
            
            // Se falhou com senha vazia, tentar com senha null (para alguns sistemas)
            if ($this->password === "") {
                try {
                    $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                          $this->username, 
                                          null);
                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $this->conn->exec("set names utf8");
                    
                    return $this->conn;
                } catch(PDOException $e) {
                    error_log("Segundo erro de conexão: " . $e->getMessage());
                }
            }
            
            // Retornar nulo para tratamento no código chamador
            return null;
        }
    }
}
?>
