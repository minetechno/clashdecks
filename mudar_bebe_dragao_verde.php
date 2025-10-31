<?php
/**
 * Mudar todos os Bebês Dragões de Roxo para Verde
 */

echo "=== Mudando Bebês Dragões de Roxo para Verde ===\n\n";

$arquivos = [
    'assets/img/bebe-dragao.svg' => 'Bebê Dragão (Personagem)',
    'assets/img/danca-bebe-dragao.svg' => 'Dança do Bebê Dragão (Emote)'
];

// Mapeamento de cores: Roxo → Verde
$substituicoes = [
    '#9370DB' => '#3CB371',  // MediumPurple → MediumSeaGreen
    '#BA55D3' => '#90EE90',  // MediumOrchid → LightGreen
    '#8B008B' => '#228B22',  // DarkMagenta → ForestGreen
    '#4B0082' => '#006400'   // Indigo → DarkGreen
];

$alterados = 0;
$erros = 0;

foreach ($arquivos as $arquivo => $descricao) {
    echo "Processando: $descricao\n";
    echo "Arquivo: $arquivo\n";

    if (!file_exists($arquivo)) {
        echo "  ✗ Arquivo não encontrado!\n\n";
        $erros++;
        continue;
    }

    // Ler conteúdo original
    $conteudoOriginal = file_get_contents($arquivo);
    $tamanhoOriginal = strlen($conteudoOriginal);

    echo "  Tamanho original: $tamanhoOriginal bytes\n";

    // Fazer as substituições
    $conteudoNovo = $conteudoOriginal;
    $substituicoesFeitas = [];

    foreach ($substituicoes as $roxo => $verde) {
        $ocorrencias = substr_count($conteudoNovo, $roxo);
        if ($ocorrencias > 0) {
            $conteudoNovo = str_replace($roxo, $verde, $conteudoNovo);
            $substituicoesFeitas[$roxo] = $ocorrencias;
        }
    }

    if (count($substituicoesFeitas) > 0) {
        echo "  Substituições realizadas:\n";
        foreach ($substituicoesFeitas as $cor => $qtd) {
            $corNova = $substituicoes[$cor];
            echo "    $cor → $corNova ($qtd ocorrências)\n";
        }

        // Salvar arquivo
        if (file_put_contents($arquivo, $conteudoNovo)) {
            $tamanhoNovo = strlen($conteudoNovo);
            echo "  ✓ Arquivo atualizado! ($tamanhoNovo bytes)\n";
            $alterados++;
        } else {
            echo "  ✗ Erro ao salvar arquivo!\n";
            $erros++;
        }
    } else {
        echo "  ⊘ Nenhuma cor roxa encontrada\n";
    }

    echo "\n";
}

echo str_repeat('=', 70) . "\n";
echo "RESUMO:\n";
echo str_repeat('=', 70) . "\n";
echo "Arquivos alterados: $alterados\n";
echo "Erros: $erros\n";

if ($alterados == 2) {
    echo "\n✓ TODOS OS BEBÊS DRAGÕES FORAM MUDADOS DE ROXO PARA VERDE!\n\n";
    echo "Cores alteradas:\n";
    foreach ($substituicoes as $roxo => $verde) {
        echo "  $roxo (Roxo) → $verde (Verde)\n";
    }
}

echo str_repeat('=', 70) . "\n";
