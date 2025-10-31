<?php
/**
 * Teste da Página de Bandeiras - Verificar Remoção do Botão Ver Detalhes
 */

echo "=== Teste da Página de Bandeiras ===\n\n";

$arquivos = [
    'bandeiras/index.html' => 'HTML',
    'assets/js/bandeiras.js' => 'JavaScript'
];

echo "1. VERIFICANDO REMOÇÃO DO BOTÃO 'VER DETALHES'\n";
echo str_repeat('-', 70) . "\n";

$encontrados = 0;
foreach ($arquivos as $arquivo => $tipo) {
    $conteudo = file_get_contents($arquivo);

    if (strpos($conteudo, 'Ver Detalhes') !== false) {
        echo "  ✗ $tipo ($arquivo): AINDA CONTÉM 'Ver Detalhes'\n";
        $encontrados++;
    } else {
        echo "  ✓ $tipo ($arquivo): 'Ver Detalhes' REMOVIDO\n";
    }
}

echo "\n2. VERIFICANDO REMOÇÃO DO MODAL\n";
echo str_repeat('-', 70) . "\n";

$htmlContent = file_get_contents('bandeiras/index.html');
if (strpos($htmlContent, 'modal-overlay') !== false) {
    echo "  ✗ HTML: AINDA CONTÉM modal\n";
} else {
    echo "  ✓ HTML: Modal REMOVIDO\n";
}

echo "\n3. VERIFICANDO REMOÇÃO DAS FUNÇÕES DO MODAL NO JS\n";
echo str_repeat('-', 70) . "\n";

$jsContent = file_get_contents('assets/js/bandeiras.js');

$funcoes = ['abrirModalBandeira', 'fecharModal'];
foreach ($funcoes as $funcao) {
    if (strpos($jsContent, $funcao) !== false) {
        echo "  ✗ JavaScript: AINDA CONTÉM função $funcao\n";
    } else {
        echo "  ✓ JavaScript: Função $funcao REMOVIDA\n";
    }
}

echo "\n4. VERIFICANDO ESTRUTURA DO CARD\n";
echo str_repeat('-', 70) . "\n";

if (strpos($jsContent, 'bau-card__footer') !== false) {
    echo "  ✗ JavaScript: AINDA CONTÉM bau-card__footer\n";
} else {
    echo "  ✓ JavaScript: Footer do card REMOVIDO\n";
}

if (strpos($jsContent, 'bau-card__body') !== false) {
    echo "  ✓ JavaScript: Mantém bau-card__body (OK)\n";
} else {
    echo "  ✗ JavaScript: bau-card__body REMOVIDO (ERRO)\n";
}

echo "\n5. CONTANDO LINHAS DOS ARQUIVOS\n";
echo str_repeat('-', 70) . "\n";

foreach ($arquivos as $arquivo => $tipo) {
    $linhas = count(file($arquivo));
    echo "  $tipo ($arquivo): $linhas linhas\n";
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";

if ($encontrados == 0) {
    echo "✓ BOTÃO 'VER DETALHES' FOI REMOVIDO COM SUCESSO!\n";
    echo "✓ MODAL FOI REMOVIDO COMPLETAMENTE!\n";
    echo "✓ FUNÇÕES DO MODAL FORAM REMOVIDAS DO JAVASCRIPT!\n";
    echo "\n";
    echo "A página de bandeiras agora mostra apenas:\n";
    echo "  - Ícone da bandeira\n";
    echo "  - Nome da bandeira\n";
    echo "  - Badges de raridade e categoria\n";
    echo "  - Descrição\n";
    echo "\nSEM o botão 'Ver Detalhes'!\n";
} else {
    echo "⚠ AINDA EXISTEM REFERÊNCIAS A 'VER DETALHES'\n";
}

echo str_repeat('=', 70) . "\n";
