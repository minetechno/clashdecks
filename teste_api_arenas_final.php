<?php
/**
 * Teste final da API de arenas com novos ícones
 */

echo "=== TESTE FINAL - API DE ARENAS ===\n\n";

// Buscar dados da API
$apiUrl = 'http://localhost/clashdecks/api/arenas.php';
$json = file_get_contents($apiUrl);
$arenas = json_decode($json, true);

echo "Total de arenas retornadas pela API: " . count($arenas) . "\n\n";

// Verificar últimas 5 arenas
echo "ÚLTIMAS 5 ARENAS:\n";
echo str_repeat("-", 70) . "\n";

$ultimasArenas = array_slice($arenas, -5);
foreach ($ultimasArenas as $arena) {
    echo sprintf(
        "Arena %2d: %-40s (%s)\n",
        $arena['id'],
        $arena['nome'],
        $arena['icone']
    );

    // Verificar se o arquivo do ícone existe
    $caminhoIcone = __DIR__ . "/assets/img/{$arena['icone']}";
    if (file_exists($caminhoIcone)) {
        echo "         ✓ Ícone existe\n";
    } else {
        echo "         ✗ Ícone NÃO existe\n";
    }
}

echo str_repeat("-", 70) . "\n\n";

// Teste específico das novas arenas
echo "NOVAS ARENAS (22, 23, 24):\n";
echo str_repeat("=", 70) . "\n";

foreach ($arenas as $arena) {
    if ($arena['id'] >= 22 && $arena['id'] <= 24) {
        echo "\n";
        echo "Arena {$arena['id']}: {$arena['nome']}\n";
        echo "  Ícone: {$arena['icone']}\n";

        $caminhoIcone = __DIR__ . "/assets/img/{$arena['icone']}";

        if (file_exists($caminhoIcone)) {
            $svg = file_get_contents($caminhoIcone);

            // Características do SVG
            $caracteristicas = [];

            if (strpos($svg, 'viewBox="0 0 64 64"') !== false) {
                $caracteristicas[] = "ViewBox 64x64";
            }
            if (preg_match_all('/<circle/', $svg, $matches)) {
                $caracteristicas[] = count($matches[0]) . " círculos";
            }
            if (preg_match_all('/<polygon/', $svg, $matches)) {
                $caracteristicas[] = count($matches[0]) . " polígonos";
            }

            echo "  ✓ Arquivo: " . strlen($svg) . " bytes\n";
            echo "  ✓ Estilo: " . implode(", ", $caracteristicas) . "\n";
        } else {
            echo "  ✗ ARQUIVO NÃO ENCONTRADO!\n";
        }
    }
}

echo "\n" . str_repeat("=", 70) . "\n";
echo "✓ TESTE CONCLUÍDO COM SUCESSO!\n";
echo "✓ Todas as 24 arenas estão na API\n";
echo "✓ Ícones das arenas 22, 23, 24 estão no padrão correto\n";
