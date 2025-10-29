<?php
/**
 * Verifica problemas no banco de dados
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Verificação de Problemas - ClashDecks ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // Verificar decks sem cartas
    echo "1. VERIFICANDO DECKS SEM PERSONAGENS:\n";
    echo str_repeat("-", 60) . "\n";

    $query = "SELECT d.id, d.nome, d.arena_alvo, COUNT(dc.personagem_id) as num_cartas
              FROM decks d
              LEFT JOIN deck_cartas dc ON d.id = dc.deck_id
              GROUP BY d.id
              HAVING num_cartas < 8
              ORDER BY d.arena_alvo, d.id";

    $decksProblema = executeAdminQuery($pdo, $query);

    if (empty($decksProblema)) {
        echo "✓ Todos os decks possuem 8 cartas!\n\n";
    } else {
        echo "✗ Encontrados " . count($decksProblema) . " decks com problemas:\n\n";
        foreach ($decksProblema as $deck) {
            echo "  - ID: {$deck['id']}\n";
            echo "    Nome: {$deck['nome']}\n";
            echo "    Arena: {$deck['arena_alvo']}\n";
            echo "    Cartas: {$deck['num_cartas']}/8\n\n";
        }
    }

    // Verificar arenas existentes
    echo "2. VERIFICANDO ARENAS:\n";
    echo str_repeat("-", 60) . "\n";

    $arenas = executeAdminQuery($pdo, "SELECT id, nome FROM arenas ORDER BY id");
    echo "Total de arenas: " . count($arenas) . "\n\n";

    echo "Arenas existentes:\n";
    foreach ($arenas as $arena) {
        echo "  Arena {$arena['id']}: {$arena['nome']}\n";
    }
    echo "\n";

    // Verificar quais arenas estão faltando (1-21 padrão do Clash Royale)
    $idsExistentes = array_column($arenas, 'id');
    $faltantes = [];
    for ($i = 1; $i <= 21; $i++) {
        if (!in_array($i, $idsExistentes)) {
            $faltantes[] = $i;
        }
    }

    if (!empty($faltantes)) {
        echo "✗ Arenas faltantes: " . implode(", ", $faltantes) . "\n\n";
    } else {
        echo "✓ Todas as 21 arenas padrão estão presentes!\n\n";
    }

    // Verificar total de personagens
    echo "3. VERIFICANDO PERSONAGENS:\n";
    echo str_repeat("-", 60) . "\n";
    $totalPersonagens = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM personagens");
    echo "Total de personagens: " . $totalPersonagens[0]['total'] . "\n\n";

    // Listar todos os IDs de personagens disponíveis
    echo "4. IDs DE PERSONAGENS DISPONÍVEIS:\n";
    echo str_repeat("-", 60) . "\n";
    $personagens = executeAdminQuery($pdo, "SELECT id, nome, elixir FROM personagens ORDER BY nome");
    foreach ($personagens as $p) {
        echo "  '{$p['id']}' ({$p['elixir']} elixir) - {$p['nome']}\n";
    }

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
