<?php
/**
 * Adiciona arenas 22, 23, 24 e corrige Arena Infinita
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Adicionando Novas Arenas - ClashDecks ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // Corrigir Arena 19 para "Arena Infinita"
    echo "1. Corrigindo Arena 19 para 'Arena Infinita'...\n";
    executeAdminQuery($pdo,
        "UPDATE arenas SET nome = :nome WHERE id = :id",
        [':nome' => 'Arena Infinita', ':id' => 19]
    );
    echo "  ✓ Arena 19 renomeada para 'Arena Infinita'\n\n";

    // Adicionar Arena 22
    echo "2. Adicionando Arena 22 - Reino Celestial...\n";
    try {
        inserirArena($pdo, [
            'id' => 22,
            'nome' => 'Arena 22 - Reino Celestial',
            'icone' => 'arena-22.svg'
        ]);
        echo "  ✓ Arena 22 adicionada com sucesso!\n\n";
    } catch (Exception $e) {
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "  ⚠ Arena 22 já existe\n\n";
        } else {
            throw $e;
        }
    }

    // Adicionar Arena 23
    echo "3. Adicionando Arena 23 - Dimensão Cósmica...\n";
    try {
        inserirArena($pdo, [
            'id' => 23,
            'nome' => 'Arena 23 - Dimensão Cósmica',
            'icone' => 'arena-23.svg'
        ]);
        echo "  ✓ Arena 23 adicionada com sucesso!\n\n";
    } catch (Exception $e) {
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "  ⚠ Arena 23 já existe\n\n";
        } else {
            throw $e;
        }
    }

    // Adicionar Arena 24
    echo "4. Adicionando Arena 24 - Trono Supremo...\n";
    try {
        inserirArena($pdo, [
            'id' => 24,
            'nome' => 'Arena 24 - Trono Supremo',
            'icone' => 'arena-24.svg'
        ]);
        echo "  ✓ Arena 24 adicionada com sucesso!\n\n";
    } catch (Exception $e) {
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "  ⚠ Arena 24 já existe\n\n";
        } else {
            throw $e;
        }
    }

    // Verificação final
    echo str_repeat("=", 60) . "\n";
    echo "VERIFICAÇÃO FINAL:\n";
    echo str_repeat("=", 60) . "\n";

    $arenas = executeAdminQuery($pdo, "SELECT id, nome FROM arenas ORDER BY id");
    echo "Total de arenas: " . count($arenas) . "\n\n";

    echo "Últimas 5 arenas:\n";
    $ultimasArenas = array_slice($arenas, -5);
    foreach ($ultimasArenas as $arena) {
        echo "  Arena {$arena['id']}: {$arena['nome']}\n";
    }

    echo "\n✓ Correção de arenas concluída!\n";

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
