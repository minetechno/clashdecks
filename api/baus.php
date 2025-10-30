<?php
/**
 * API de Baús - ClashDecks
 * Retorna informações sobre os baús do Clash Royale
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once __DIR__ . '/config.php';

try {
    $pdo = getDBConnection();

    // Buscar todos os baús
    $query = "SELECT
                id,
                nome,
                raridade,
                ciclo,
                icone,
                descricao,
                ouro_min as ouroMin,
                ouro_max as ouroMax,
                cartas_total as cartasTotal,
                recompensas
              FROM baus
              ORDER BY
                FIELD(raridade, 'Comum', 'Raro', 'Épico', 'Lendário'),
                nome ASC";

    $baus = executeQuery($pdo, $query);

    // Decodificar JSON de recompensas
    foreach ($baus as &$bau) {
        $bau['recompensas'] = json_decode($bau['recompensas'], true) ?: [];
    }

    // Retornar JSON
    echo json_encode($baus, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'erro' => 'Erro ao buscar baús',
        'mensagem' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
