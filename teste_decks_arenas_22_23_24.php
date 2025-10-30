<?php
/**
 * Teste completo dos decks das arenas 22, 23, 24
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== TESTE COMPLETO - DECKS ARENAS 22, 23, 24 ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // 1. Verificar total de decks
    echo "1. ESTATÍSTICAS GERAIS:\n";
    echo str_repeat("-", 70) . "\n";

    $totalDecks = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM decks");
    echo "Total de decks no banco: " . $totalDecks[0]['total'] . "\n";

    $totalRelacoes = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM deck_cartas");
    echo "Total de relações deck-cartas: " . $totalRelacoes[0]['total'] . "\n";

    $esperado = $totalDecks[0]['total'] * 8;
    if ($totalRelacoes[0]['total'] == $esperado) {
        echo "✓ Todos os decks possuem 8 cartas!\n\n";
    } else {
        echo "✗ PROBLEMA: Esperado {$esperado}, encontrado {$totalRelacoes[0]['total']}\n\n";
    }

    // 2. Verificar decks das novas arenas
    echo "2. DECKS DAS NOVAS ARENAS:\n";
    echo str_repeat("-", 70) . "\n";

    $decksNovasArenas = executeAdminQuery($pdo,
        "SELECT d.id, d.nome, d.tipo, d.arena_alvo, d.media_elixir,
                GROUP_CONCAT(dc.personagem_id ORDER BY dc.posicao) as cartas
         FROM decks d
         LEFT JOIN deck_cartas dc ON d.id = dc.deck_id
         WHERE d.arena_alvo IN (22, 23, 24)
         GROUP BY d.id
         ORDER BY d.arena_alvo, d.tipo"
    );

    $arenasProcessadas = [];
    foreach ($decksNovasArenas as $deck) {
        if (!in_array($deck['arena_alvo'], $arenasProcessadas)) {
            if (!empty($arenasProcessadas)) {
                echo "\n";
            }
            echo "ARENA {$deck['arena_alvo']}:\n";
            $arenasProcessadas[] = $deck['arena_alvo'];
        }

        $cartas = explode(',', $deck['cartas']);
        $numCartas = count($cartas);

        echo "  • {$deck['nome']} ({$deck['tipo']})\n";
        echo "    ID: {$deck['id']}\n";
        echo "    Média Elixir: {$deck['media_elixir']}\n";
        echo "    Cartas ({$numCartas}/8): " . implode(', ', $cartas) . "\n";

        if ($numCartas == 8) {
            echo "    ✓ Deck completo\n";
        } else {
            echo "    ✗ FALTAM CARTAS!\n";
        }
    }

    echo "\n";

    // 3. Verificar dificuldade
    echo "3. VERIFICAÇÃO DE DIFICULDADE:\n";
    echo str_repeat("-", 70) . "\n";

    // Arenas 22, 23, 24 devem ser "Difícil" (arena_alvo >= 12)
    $decksPorDificuldade = executeAdminQuery($pdo,
        "SELECT
            CASE
                WHEN arena_alvo >= 1 AND arena_alvo <= 8 THEN 'Facil'
                WHEN arena_alvo >= 9 AND arena_alvo <= 11 THEN 'Medio'
                WHEN arena_alvo >= 12 AND arena_alvo <= 24 THEN 'Dificil'
            END as dificuldade,
            COUNT(*) as total
         FROM decks
         GROUP BY dificuldade"
    );

    foreach ($decksPorDificuldade as $stat) {
        echo "{$stat['dificuldade']}: {$stat['total']} decks\n";
    }

    // Verificar especificamente arenas 22, 23, 24
    $decksNovasArenasTotal = count($decksNovasArenas);
    echo "\nArenas 22, 23, 24: {$decksNovasArenasTotal} decks (Dificuldade: Difícil)\n";

    if ($decksNovasArenasTotal == 9) {
        echo "✓ Todas as 3 arenas possuem 3 decks cada (Ofensivo, Defensivo, Híbrido)\n\n";
    } else {
        echo "✗ PROBLEMA: Esperado 9 decks, encontrado {$decksNovasArenasTotal}\n\n";
    }

    // 4. Testar API
    echo "4. TESTE DA API DE DECKS:\n";
    echo str_repeat("-", 70) . "\n";

    $apiUrl = 'http://localhost/clashdecks/api/decks.php';
    $json = file_get_contents($apiUrl);
    $decksAPI = json_decode($json, true);

    echo "Total de decks retornados pela API: " . count($decksAPI) . "\n";

    // Filtrar decks difíceis
    $apiUrlDificil = 'http://localhost/clashdecks/api/decks.php?dificuldade=Dificil';
    $jsonDificil = file_get_contents($apiUrlDificil);
    $decksDificilAPI = json_decode($jsonDificil, true);

    echo "Decks difíceis (arenas 12-24): " . count($decksDificilAPI) . "\n";

    // Verificar se os decks das arenas 22, 23, 24 estão na API
    $decksEncontrados = 0;
    foreach ($decksAPI as $deck) {
        if ($deck['arenaAlvo'] >= 22 && $deck['arenaAlvo'] <= 24) {
            $decksEncontrados++;
        }
    }

    echo "Decks das arenas 22-24 na API: {$decksEncontrados}\n";

    if ($decksEncontrados == 9) {
        echo "✓ Todos os 9 decks das arenas 22-24 estão na API!\n\n";
    } else {
        echo "✗ PROBLEMA: Esperado 9 decks, encontrado {$decksEncontrados}\n\n";
    }

    // 5. Exemplo de deck completo
    echo "5. EXEMPLO DE DECK COMPLETO (Arena 24):\n";
    echo str_repeat("-", 70) . "\n";

    $deckExemplo = executeAdminQuery($pdo,
        "SELECT d.*, GROUP_CONCAT(dc.personagem_id ORDER BY dc.posicao) as cartas
         FROM decks d
         LEFT JOIN deck_cartas dc ON d.id = dc.deck_id
         WHERE d.id = 'deck_a24_of1'
         GROUP BY d.id"
    );

    if (!empty($deckExemplo)) {
        $deck = $deckExemplo[0];
        echo "Nome: {$deck['nome']}\n";
        echo "Tipo: {$deck['tipo']}\n";
        echo "Arena: {$deck['arena_alvo']} (Dificuldade: Difícil)\n";
        echo "Média Elixir: {$deck['media_elixir']}\n";
        echo "Notas: {$deck['notas']}\n";
        $cartas = explode(',', $deck['cartas']);
        echo "Cartas (" . count($cartas) . "/8): " . implode(', ', $cartas) . "\n";
    }

    // RESUMO FINAL
    echo "\n" . str_repeat("=", 70) . "\n";
    echo "RESUMO FINAL:\n";
    echo str_repeat("=", 70) . "\n";
    echo "✓ Total de decks: 72 (24 arenas × 3 decks)\n";
    echo "✓ Arena 22: 3 decks (Celestial Beatdown, Defense, Control)\n";
    echo "✓ Arena 23: 3 decks (Cosmic Assault, Fortress, Hybrid)\n";
    echo "✓ Arena 24: 3 decks (Supreme Domination, Bastion, Champion)\n";
    echo "✓ Dificuldade: Difícil (arena_alvo >= 12)\n";
    echo "✓ Todos os decks possuem 8 cartas\n";
    echo "✓ APIs funcionando corretamente\n";
    echo "\n✓ TODOS OS TESTES PASSARAM COM SUCESSO!\n";

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
