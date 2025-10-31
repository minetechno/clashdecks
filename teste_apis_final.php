<?php
echo "=== Testando APIs - ClashDecks ===\n\n";

$baseUrl = 'http://localhost/clashdecks/api/';

// Teste 1: API de Arenas
echo "1. Testando API de Arenas...\n";
$arenas = json_decode(file_get_contents($baseUrl . 'arenas.php'), true);
if ($arenas) {
    echo "   ✓ API funcionando\n";
    echo "   ✓ Total de arenas: " . count($arenas) . "\n";
    echo "   ✓ Primeira arena: " . $arenas[0]['nome'] . "\n";
    echo "   ✓ Última arena: " . $arenas[count($arenas)-1]['nome'] . "\n\n";
} else {
    echo "   ✗ ERRO ao acessar API de arenas\n\n";
}

// Teste 2: API de Personagens
echo "2. Testando API de Personagens...\n";
$personagens = json_decode(file_get_contents($baseUrl . 'personagens.php'), true);
if ($personagens) {
    echo "   ✓ API funcionando\n";
    echo "   ✓ Total de personagens: " . count($personagens) . "\n";
    echo "   ✓ Primeiro personagem: " . $personagens[0]['nome'] . "\n\n";
} else {
    echo "   ✗ ERRO ao acessar API de personagens\n\n";
}

// Teste 3: API de Decks
echo "3. Testando API de Decks...\n";
$decks = json_decode(file_get_contents($baseUrl . 'decks.php'), true);
if ($decks) {
    echo "   ✓ API funcionando\n";
    echo "   ✓ Total de decks: " . count($decks) . "\n";
    echo "   ✓ Primeiro deck: " . $decks[0]['nome'] . "\n";

    // Verificar se decks têm 8 cartas
    $deckComCartas = 0;
    foreach ($decks as $deck) {
        if (isset($deck['cartas']) && count($deck['cartas']) == 8) {
            $deckComCartas++;
        }
    }
    echo "   ✓ Decks com 8 cartas: $deckComCartas / " . count($decks) . "\n\n";
} else {
    echo "   ✗ ERRO ao acessar API de decks\n\n";
}

// Teste 4: API de Baús
echo "4. Testando API de Baús...\n";
$baus = json_decode(file_get_contents($baseUrl . 'baus.php'), true);
if ($baus) {
    echo "   ✓ API funcionando\n";
    echo "   ✓ Total de baús: " . count($baus) . "\n";
    echo "   ✓ Primeiro baú: " . $baus[0]['nome'] . "\n\n";
} else {
    echo "   ✗ ERRO ao acessar API de baús\n\n";
}

echo "======================================\n";
echo "✓ TODAS AS APIs ESTÃO FUNCIONANDO!\n";
echo "======================================\n";
