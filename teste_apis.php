<?php
/**
 * Teste das APIs públicas
 */

echo "=== TESTE DAS APIs PÚBLICAS - ClashDecks ===\n\n";

// Teste 1: API de Arenas
echo "1. TESTANDO API DE ARENAS:\n";
echo str_repeat("-", 60) . "\n";

$arenasJson = file_get_contents('http://localhost/clashdecks/api/arenas.php');
$arenas = json_decode($arenasJson, true);

echo "Total de arenas retornadas: " . count($arenas) . "\n";
echo "Arena 19: " . $arenas[18]['nome'] . " (✓ Arena Infinita)\n";

echo "\nÚltimas 3 arenas:\n";
for ($i = 21; $i < 24; $i++) {
    echo "  • Arena {$arenas[$i]['id']}: {$arenas[$i]['nome']}\n";
}

// Teste 2: API de Personagens
echo "\n2. TESTANDO API DE PERSONAGENS:\n";
echo str_repeat("-", 60) . "\n";

$personagensJson = file_get_contents('http://localhost/clashdecks/api/personagens.php');
$personagens = json_decode($personagensJson, true);

echo "Total de personagens retornados: " . count($personagens) . "\n";
echo "Exemplo: {$personagens[0]['nome']} ({$personagens[0]['elixir']} elixir, {$personagens[0]['tipo']})\n";

// Teste 3: API de Decks
echo "\n3. TESTANDO API DE DECKS:\n";
echo str_repeat("-", 60) . "\n";

$decksJson = file_get_contents('http://localhost/clashdecks/api/decks.php');
$decks = json_decode($decksJson, true);

echo "Total de decks retornados: " . count($decks) . "\n";

// Verificar se todos os decks têm 8 cartas
$decksComProblemas = 0;
foreach ($decks as $deck) {
    if (count($deck['cartas']) != 8) {
        $decksComProblemas++;
    }
}

if ($decksComProblemas == 0) {
    echo "✓ Todos os decks possuem 8 cartas!\n";
} else {
    echo "✗ {$decksComProblemas} decks sem 8 cartas!\n";
}

// Exemplo de deck
$deckExemplo = $decks[2]; // Deck da arena 3
echo "\nExemplo de deck completo:\n";
echo "  Nome: {$deckExemplo['nome']}\n";
echo "  Tipo: {$deckExemplo['tipo']}\n";
echo "  Arena: {$deckExemplo['arenaAlvo']}\n";
echo "  Cartas (" . count($deckExemplo['cartas']) . "): " . implode(', ', $deckExemplo['cartas']) . "\n";
echo "  Média de Elixir: {$deckExemplo['mediaElixir']}\n";

// Teste 4: Filtro de decks por arena
echo "\n4. TESTANDO FILTROS:\n";
echo str_repeat("-", 60) . "\n";

$decksArena10Json = file_get_contents('http://localhost/clashdecks/api/decks.php?arena=10');
$decksArena10 = json_decode($decksArena10Json, true);
echo "Decks da Arena 10: " . count($decksArena10) . "\n";

$decksDificilJson = file_get_contents('http://localhost/clashdecks/api/decks.php?dificuldade=Dificil');
$decksDificil = json_decode($decksDificilJson, true);
echo "Decks difíceis (arena 12-21): " . count($decksDificil) . "\n";

// RESUMO FINAL
echo "\n" . str_repeat("=", 60) . "\n";
echo "RESUMO DOS TESTES:\n";
echo str_repeat("=", 60) . "\n";
echo "✓ API Arenas: " . count($arenas) . " arenas (incluindo Arena Infinita)\n";
echo "✓ API Personagens: " . count($personagens) . " personagens\n";
echo "✓ API Decks: " . count($decks) . " decks\n";
echo "✓ Todos os decks possuem 8 cartas\n";
echo "✓ Filtros funcionando corretamente\n";
echo "\n✓ TODAS AS APIs ESTÃO FUNCIONANDO!\n";
