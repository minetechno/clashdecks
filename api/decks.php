<?php
/**
 * API Decks - ClashDecks
 * Retorna decks com filtros opcionais
 *
 * Agora usando MySQL ao invés de JSON
 *
 * Filtros disponíveis:
 * - arena: número da arena alvo (1-21)
 * - tipo: Ofensivo|Defensivo|Híbrido
 * - dificuldade: Facil|Medio|Dificil (calculado baseado na arena)
 *   - Arenas 1-8: Fácil
 *   - Arenas 9-11: Médio
 *   - Arenas 12-21: Difícil
 */

// Headers CORS
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Inclui configuração do banco
require_once __DIR__ . '/config.php';

/**
 * Função para calcular dificuldade baseada na arena
 */
function calcularDificuldade($arenaAlvo) {
    if ($arenaAlvo >= 1 && $arenaAlvo <= 8) {
        return 'Facil';
    } elseif ($arenaAlvo >= 9 && $arenaAlvo <= 11) {
        return 'Medio';
    } elseif ($arenaAlvo >= 12 && $arenaAlvo <= 21) {
        return 'Dificil';
    }
    return 'Desconhecido';
}

// Conecta ao banco
$pdo = getDBConnection();

// Monta query base
$query = "SELECT
    id,
    nome,
    tipo,
    arena_alvo as arenaAlvo,
    notas,
    media_elixir as mediaElixir
FROM decks WHERE 1=1";

$params = [];

// Aplica filtros dinamicamente
if (isset($_GET['arena']) && is_numeric($_GET['arena'])) {
    $query .= " AND arena_alvo = :arena";
    $params[':arena'] = (int)$_GET['arena'];
}

if (isset($_GET['tipo']) && !empty($_GET['tipo'])) {
    $query .= " AND tipo = :tipo";
    $params[':tipo'] = $_GET['tipo'];
}

// Filtro por dificuldade (precisa calcular faixa de arenas)
if (isset($_GET['dificuldade']) && !empty($_GET['dificuldade'])) {
    switch ($_GET['dificuldade']) {
        case 'Facil':
            $query .= " AND arena_alvo BETWEEN 1 AND 8";
            break;
        case 'Medio':
            $query .= " AND arena_alvo BETWEEN 9 AND 11";
            break;
        case 'Dificil':
            $query .= " AND arena_alvo BETWEEN 12 AND 21";
            break;
    }
}

// Ordena por arena
$query .= " ORDER BY arena_alvo ASC, nome ASC";

// Executa query
$decks = executeQuery($pdo, $query, $params);

// Para cada deck, busca as cartas
foreach ($decks as &$deck) {
    // Adiciona dificuldade calculada
    $deck['dificuldade'] = calcularDificuldade($deck['arenaAlvo']);

    // Busca cartas do deck
    $queryCartas = "SELECT personagem_id
        FROM deck_cartas
        WHERE deck_id = :deck_id
        ORDER BY posicao ASC";

    $cartas = executeQuery($pdo, $queryCartas, [':deck_id' => $deck['id']]);

    // Extrai apenas os IDs das cartas em um array simples
    $deck['cartas'] = array_column($cartas, 'personagem_id');
}

// Retorna os dados
http_response_code(200);
echo json_encode($decks, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
