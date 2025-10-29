<?php
/**
 * Configuração do Banco de Dados - ClashDecks
 *
 * CREDENCIAIS DO BANCO:
 * - Host: localhost
 * - Banco: clashdecks_db
 * - Usuário: clashdecks_user
 * - Senha: ClashDecks@2024!
 */

// Configurações do banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'clashdecks_db');
define('DB_USER', 'clashdecks_user');
define('DB_PASS', 'ClashDecks@2024!');
define('DB_CHARSET', 'utf8mb4');

/**
 * Cria e retorna uma conexão PDO com o banco de dados
 *
 * @return PDO Conexão PDO
 * @throws PDOException Se houver erro na conexão
 */
function getDBConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);

        return $pdo;
    } catch (PDOException $e) {
        // Log erro (em produção, usar sistema de log adequado)
        error_log("Erro de conexão com banco de dados: " . $e->getMessage());

        // Retorna erro genérico para o cliente
        http_response_code(500);
        echo json_encode([
            'error' => 'Erro ao conectar com o banco de dados',
            'details' => 'Verifique as configurações em api/config.php'
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
}

/**
 * Executa query e retorna resultados em JSON
 *
 * @param PDO $pdo Conexão PDO
 * @param string $query Query SQL
 * @param array $params Parâmetros para prepared statement
 * @return array Resultados da query
 */
function executeQuery($pdo, $query, $params = []) {
    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Erro na query: " . $e->getMessage());
        http_response_code(500);
        echo json_encode([
            'error' => 'Erro ao executar consulta',
            'details' => $e->getMessage()
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
}
