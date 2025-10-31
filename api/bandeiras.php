<?php
/**
 * API de Bandeiras - ClashDecks
 * Retorna lista de bandeiras de guerra do Clash Royale
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Cache-Control: public, max-age=900'); // Cache de 15 minutos

require_once 'config.php';

try {
    $pdo = getDBConnection();

    // Parâmetros de filtro
    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
    $raridade = isset($_GET['raridade']) ? $_GET['raridade'] : '';
    $busca = isset($_GET['busca']) ? $_GET['busca'] : '';

    // Construir query
    $query = "SELECT id, nome, categoria, raridade, icone, descricao, requisito, historia
              FROM bandeiras
              WHERE 1=1";

    $params = [];

    // Filtro de categoria
    if (!empty($categoria) && $categoria !== 'Todas') {
        $query .= " AND categoria = :categoria";
        $params[':categoria'] = $categoria;
    }

    // Filtro de raridade
    if (!empty($raridade) && $raridade !== 'Todas') {
        $query .= " AND raridade = :raridade";
        $params[':raridade'] = $raridade;
    }

    // Filtro de busca
    if (!empty($busca)) {
        $query .= " AND (nome LIKE :busca OR descricao LIKE :busca OR requisito LIKE :busca)";
        $params[':busca'] = "%$busca%";
    }

    // Ordenar por nome
    $query .= " ORDER BY nome ASC";

    // Executar query
    $bandeiras = executeQuery($pdo, $query, $params);

    // Retornar JSON
    echo json_encode($bandeiras, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Erro ao buscar bandeiras',
        'message' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
