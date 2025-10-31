<?php
/**
 * API REST para Emotes do Clash Royale
 * Endpoint: /api/emotes.php
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

// Cache-Control
$cacheTime = 900; // 15 minutos
header("Cache-Control: public, max-age=$cacheTime");
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $cacheTime) . ' GMT');

require_once 'config.php';

try {
    $pdo = getDBConnection();

    // Parâmetros de filtro
    $categoria = $_GET['categoria'] ?? null;
    $raridade = $_GET['raridade'] ?? null;
    $busca = $_GET['busca'] ?? null;

    // Query base
    $query = "SELECT id, nome, categoria, raridade, icone, descricao, animacao, desbloqueio
              FROM emotes WHERE 1=1";

    $params = [];

    // Filtro por categoria
    if ($categoria) {
        $query .= " AND categoria = :categoria";
        $params[':categoria'] = $categoria;
    }

    // Filtro por raridade
    if ($raridade) {
        $query .= " AND raridade = :raridade";
        $params[':raridade'] = $raridade;
    }

    // Filtro por busca
    if ($busca) {
        $query .= " AND (nome LIKE :busca OR descricao LIKE :busca OR animacao LIKE :busca)";
        $params[':busca'] = "%$busca%";
    }

    // Ordenação
    $query .= " ORDER BY
                CASE raridade
                    WHEN 'Lendário' THEN 1
                    WHEN 'Épico' THEN 2
                    WHEN 'Raro' THEN 3
                    WHEN 'Comum' THEN 4
                END,
                nome ASC";

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);

    $emotes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($emotes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Erro ao buscar emotes',
        'message' => $e->getMessage()
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
