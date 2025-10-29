<?php
/**
 * API Personagens - ClashDecks
 * Retorna cartas/personagens com filtros opcionais
 *
 * Agora usando MySQL ao invés de JSON
 *
 * Filtros disponíveis:
 * - tipo: Tropa|Feitiço|Construção
 * - elixirMax: número máximo de elixir
 * - elixirMin: número mínimo de elixir
 * - arenaMin: arena mínima de desbloqueio
 * - arenaMax: arena máxima de desbloqueio
 * - raridade: Comum|Raro|Épico|Lendário
 */

// Headers CORS
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Inclui configuração do banco
require_once __DIR__ . '/config.php';

// Conecta ao banco
$pdo = getDBConnection();

// Monta query base
$query = "SELECT
    id,
    nome,
    tipo,
    raridade,
    elixir,
    arena_desbloqueio as arenaDesbloqueio,
    icone,
    descricao,
    sinergias,
    counters
FROM personagens WHERE 1=1";

$params = [];

// Aplica filtros dinamicamente
if (isset($_GET['tipo']) && !empty($_GET['tipo'])) {
    $query .= " AND tipo = :tipo";
    $params[':tipo'] = $_GET['tipo'];
}

if (isset($_GET['elixirMax']) && is_numeric($_GET['elixirMax'])) {
    $query .= " AND elixir <= :elixirMax";
    $params[':elixirMax'] = (int)$_GET['elixirMax'];
}

if (isset($_GET['elixirMin']) && is_numeric($_GET['elixirMin'])) {
    $query .= " AND elixir >= :elixirMin";
    $params[':elixirMin'] = (int)$_GET['elixirMin'];
}

if (isset($_GET['arenaMin']) && is_numeric($_GET['arenaMin'])) {
    $query .= " AND arena_desbloqueio >= :arenaMin";
    $params[':arenaMin'] = (int)$_GET['arenaMin'];
}

if (isset($_GET['arenaMax']) && is_numeric($_GET['arenaMax'])) {
    $query .= " AND arena_desbloqueio <= :arenaMax";
    $params[':arenaMax'] = (int)$_GET['arenaMax'];
}

if (isset($_GET['raridade']) && !empty($_GET['raridade'])) {
    $query .= " AND raridade = :raridade";
    $params[':raridade'] = $_GET['raridade'];
}

// Ordena por arena e nome
$query .= " ORDER BY arena_desbloqueio ASC, nome ASC";

// Executa query
$personagens = executeQuery($pdo, $query, $params);

// Decodifica JSON fields (sinergias e counters)
foreach ($personagens as &$personagem) {
    $personagem['sinergias'] = json_decode($personagem['sinergias'], true) ?: [];
    $personagem['counters'] = json_decode($personagem['counters'], true) ?: [];
}

// Retorna os dados
http_response_code(200);
echo json_encode($personagens, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
