<?php
/**
 * Atualiza nomes dos ícones das arenas 22, 23, 24 no banco
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Atualizando Ícones das Arenas 22, 23, 24 ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // Atualizar Arena 22
    echo "1. Atualizando ícone da Arena 22...\n";
    executeAdminQuery($pdo,
        "UPDATE arenas SET icone = :icone WHERE id = :id",
        [':icone' => 'arena22.svg', ':id' => 22]
    );
    echo "  ✓ Arena 22: arena-22.svg → arena22.svg\n\n";

    // Atualizar Arena 23
    echo "2. Atualizando ícone da Arena 23...\n";
    executeAdminQuery($pdo,
        "UPDATE arenas SET icone = :icone WHERE id = :id",
        [':icone' => 'arena23.svg', ':id' => 23]
    );
    echo "  ✓ Arena 23: arena-23.svg → arena23.svg\n\n";

    // Atualizar Arena 24
    echo "3. Atualizando ícone da Arena 24...\n";
    executeAdminQuery($pdo,
        "UPDATE arenas SET icone = :icone WHERE id = :id",
        [':icone' => 'arena24.svg', ':id' => 24]
    );
    echo "  ✓ Arena 24: arena-24.svg → arena24.svg\n\n";

    // Verificação
    echo str_repeat("=", 60) . "\n";
    echo "VERIFICAÇÃO:\n";
    echo str_repeat("=", 60) . "\n";

    $arenas = executeAdminQuery($pdo,
        "SELECT id, nome, icone FROM arenas WHERE id >= 22 ORDER BY id"
    );

    foreach ($arenas as $arena) {
        echo "Arena {$arena['id']}: {$arena['nome']}\n";
        echo "  Ícone: {$arena['icone']}\n";

        // Verificar se arquivo existe
        $caminhoIcone = __DIR__ . "/assets/img/{$arena['icone']}";
        if (file_exists($caminhoIcone)) {
            echo "  ✓ Arquivo existe\n";
        } else {
            echo "  ✗ Arquivo NÃO existe\n";
        }
        echo "\n";
    }

    echo "✓ Ícones atualizados com sucesso!\n";

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
