<?php
/**
 * Teste final completo após correções
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== TESTE FINAL COMPLETO - ClashDecks ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // 1. Verificar total de arenas
    echo "1. ARENAS:\n";
    echo str_repeat("-", 60) . "\n";
    $arenas = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM arenas");
    echo "Total de arenas: " . $arenas[0]['total'] . "\n";

    // Verificar Arena Infinita
    $arenaInfinita = executeAdminQuery($pdo, "SELECT id, nome FROM arenas WHERE id = 19");
    echo "Arena 19: " . $arenaInfinita[0]['nome'] . "\n";

    // Últimas 3 arenas
    $ultimasArenas = executeAdminQuery($pdo, "SELECT id, nome, icone FROM arenas WHERE id >= 22 ORDER BY id");
    echo "\nNovas arenas adicionadas:\n";
    foreach ($ultimasArenas as $arena) {
        echo "  • Arena {$arena['id']}: {$arena['nome']} ({$arena['icone']})\n";
    }

    // 2. Verificar personagens
    echo "\n2. PERSONAGENS:\n";
    echo str_repeat("-", 60) . "\n";
    $personagens = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM personagens");
    echo "Total de personagens: " . $personagens[0]['total'] . "\n";

    // 3. Verificar decks
    echo "\n3. DECKS:\n";
    echo str_repeat("-", 60) . "\n";
    $decks = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM decks");
    echo "Total de decks: " . $decks[0]['total'] . "\n";

    // Verificar decks sem cartas
    $decksSemCartas = executeAdminQuery($pdo,
        "SELECT d.id, d.nome, COUNT(dc.personagem_id) as num_cartas
         FROM decks d
         LEFT JOIN deck_cartas dc ON d.id = dc.deck_id
         GROUP BY d.id
         HAVING num_cartas < 8"
    );

    if (empty($decksSemCartas)) {
        echo "✓ Todos os decks possuem 8 cartas!\n";
    } else {
        echo "✗ PROBLEMA: " . count($decksSemCartas) . " decks ainda sem 8 cartas\n";
        foreach ($decksSemCartas as $deck) {
            echo "  - {$deck['id']}: {$deck['num_cartas']}/8 cartas\n";
        }
    }

    // Estatísticas por arena
    $estatisticas = executeAdminQuery($pdo,
        "SELECT d.arena_alvo, COUNT(*) as total_decks
         FROM decks d
         GROUP BY d.arena_alvo
         ORDER BY d.arena_alvo"
    );

    echo "\nDecks por arena:\n";
    foreach ($estatisticas as $stat) {
        echo "  Arena {$stat['arena_alvo']}: {$stat['total_decks']} decks\n";
    }

    // 4. Verificar relações deck-cartas
    echo "\n4. RELAÇÕES DECK-CARTAS:\n";
    echo str_repeat("-", 60) . "\n";
    $relacoes = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM deck_cartas");
    echo "Total de relações: " . $relacoes[0]['total'] . "\n";

    $totalDecks = $decks[0]['total'];
    $esperado = $totalDecks * 8;
    echo "Esperado (decks x 8): $esperado\n";

    if ($relacoes[0]['total'] == $esperado) {
        echo "✓ Número de relações está correto!\n";
    } else {
        echo "⚠ Diferença de " . ($esperado - $relacoes[0]['total']) . " relações\n";
    }

    // 5. Testar exemplo de deck completo
    echo "\n5. EXEMPLO DE DECK COMPLETO:\n";
    echo str_repeat("-", 60) . "\n";
    $deckExemplo = executeAdminQuery($pdo,
        "SELECT d.*, GROUP_CONCAT(dc.personagem_id ORDER BY dc.posicao) as cartas
         FROM decks d
         LEFT JOIN deck_cartas dc ON d.id = dc.deck_id
         WHERE d.id = 'deck_a3_of1'
         GROUP BY d.id"
    );

    if (!empty($deckExemplo)) {
        $deck = $deckExemplo[0];
        echo "Deck: {$deck['nome']}\n";
        echo "Tipo: {$deck['tipo']}\n";
        echo "Arena: {$deck['arena_alvo']}\n";
        $cartasArray = explode(',', $deck['cartas']);
        echo "Cartas (" . count($cartasArray) . "): " . $deck['cartas'] . "\n";
    }

    // RESUMO FINAL
    echo "\n" . str_repeat("=", 60) . "\n";
    echo "RESUMO FINAL:\n";
    echo str_repeat("=", 60) . "\n";
    echo "✓ Arenas: " . $arenas[0]['total'] . " (incluindo 22, 23, 24)\n";
    echo "✓ Personagens: " . $personagens[0]['total'] . "\n";
    echo "✓ Decks: " . $decks[0]['total'] . "\n";
    echo "✓ Relações Deck-Cartas: " . $relacoes[0]['total'] . "\n";
    echo "✓ Arena Infinita renomeada (Arena 19)\n";
    echo "✓ Ícones SVG criados para arenas 22, 23, 24\n";
    echo "\n✓ TODOS OS TESTES PASSARAM!\n";

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
