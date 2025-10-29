<?php
/**
 * API Arenas - ClashDecks
 * Retorna todas as arenas disponíveis (1-21)
 *
 * Agora usando MySQL ao invés de JSON
 */

// Headers CORS para acesso local
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Inclui configuração do banco
require_once __DIR__ . '/config.php';

// Conecta ao banco
$pdo = getDBConnection();

// Query para buscar todas as arenas
$query = "SELECT id, nome, icone FROM arenas ORDER BY id ASC";

// Executa query
$arenas = executeQuery($pdo, $query);

// Retorna os dados
http_response_code(200);
echo json_encode($arenas, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
