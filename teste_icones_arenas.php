<?php
/**
 * Teste visual dos ícones das arenas
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Teste dos Ícones das Arenas ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // Buscar todas as arenas
    $arenas = executeAdminQuery($pdo, "SELECT id, nome, icone FROM arenas ORDER BY id");

    echo "Total de arenas: " . count($arenas) . "\n\n";

    // Verificar cada ícone
    $iconesOk = 0;
    $iconesFaltando = 0;

    echo "Verificando ícones:\n";
    echo str_repeat("-", 70) . "\n";

    foreach ($arenas as $arena) {
        $caminhoIcone = __DIR__ . "/assets/img/{$arena['icone']}";
        $existe = file_exists($caminhoIcone);

        $status = $existe ? "✓" : "✗";
        $tamanho = $existe ? filesize($caminhoIcone) . " bytes" : "FALTANDO";

        echo sprintf(
            "%s Arena %2d: %-40s %s (%s)\n",
            $status,
            $arena['id'],
            $arena['nome'],
            $arena['icone'],
            $tamanho
        );

        if ($existe) {
            $iconesOk++;
        } else {
            $iconesFaltando++;
        }
    }

    echo str_repeat("-", 70) . "\n";
    echo "Ícones OK: $iconesOk\n";
    echo "Ícones faltando: $iconesFaltando\n\n";

    // Destaque para as novas arenas
    echo "NOVAS ARENAS (22, 23, 24):\n";
    echo str_repeat("=", 70) . "\n";

    $novasArenas = executeAdminQuery($pdo,
        "SELECT id, nome, icone FROM arenas WHERE id >= 22 ORDER BY id"
    );

    foreach ($novasArenas as $arena) {
        echo "\nArena {$arena['id']}: {$arena['nome']}\n";
        echo "  Ícone: {$arena['icone']}\n";

        $caminhoIcone = __DIR__ . "/assets/img/{$arena['icone']}";
        if (file_exists($caminhoIcone)) {
            $conteudo = file_get_contents($caminhoIcone);
            $linhas = substr_count($conteudo, "\n") + 1;
            $tamanho = strlen($conteudo);

            echo "  ✓ Arquivo existe ({$tamanho} bytes, {$linhas} linhas)\n";

            // Verificar características do SVG
            if (strpos($conteudo, 'viewBox="0 0 64 64"') !== false) {
                echo "  ✓ ViewBox correto (64x64)\n";
            }
            if (strpos($conteudo, '<circle') !== false) {
                echo "  ✓ Contém círculos\n";
            }
            if (strpos($conteudo, '<polygon') !== false) {
                echo "  ✓ Contém polígonos\n";
            }
        } else {
            echo "  ✗ Arquivo NÃO existe\n";
        }
    }

    echo "\n" . str_repeat("=", 70) . "\n";

    if ($iconesFaltando == 0) {
        echo "✓ TODOS OS ÍCONES ESTÃO PRESENTES E FUNCIONANDO!\n";
    } else {
        echo "⚠ ATENÇÃO: Faltam $iconesFaltando ícones\n";
    }

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
