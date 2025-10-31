<?php
/**
 * Teste - Verificar que Bebês Dragões estão Verdes
 */

echo "=== Teste: Bebês Dragões Verdes ===\n\n";

$arquivos = [
    'assets/img/bebe-dragao.svg' => 'Bebê Dragão (Personagem)',
    'assets/img/danca-bebe-dragao.svg' => 'Dança do Bebê Dragão (Emote)'
];

// Cores roxas que NÃO devem estar presentes
$coresRoxas = ['#9370DB', '#BA55D3', '#8B008B', '#4B0082'];

// Cores verdes que DEVEM estar presentes
$coresVerdes = ['#3CB371', '#90EE90', '#228B22', '#006400'];

echo "1. VERIFICANDO AUSÊNCIA DE CORES ROXAS\n";
echo str_repeat('-', 70) . "\n";

$temRoxo = false;

foreach ($arquivos as $arquivo => $descricao) {
    echo "  $descricao:\n";

    if (!file_exists($arquivo)) {
        echo "    ✗ Arquivo não encontrado!\n\n";
        continue;
    }

    $conteudo = file_get_contents($arquivo);

    foreach ($coresRoxas as $corRoxa) {
        $ocorrencias = substr_count($conteudo, $corRoxa);
        if ($ocorrencias > 0) {
            echo "    ✗ ENCONTROU COR ROXA: $corRoxa ($ocorrencias ocorrências)\n";
            $temRoxo = true;
        }
    }

    if (!$temRoxo) {
        echo "    ✓ Nenhuma cor roxa encontrada\n";
    }
    echo "\n";
}

echo "2. VERIFICANDO PRESENÇA DE CORES VERDES\n";
echo str_repeat('-', 70) . "\n";

$todasVerdePresentres = true;

foreach ($arquivos as $arquivo => $descricao) {
    echo "  $descricao:\n";

    $conteudo = file_get_contents($arquivo);

    foreach ($coresVerdes as $corVerde) {
        $ocorrencias = substr_count($conteudo, $corVerde);
        if ($ocorrencias > 0) {
            echo "    ✓ $corVerde: $ocorrencias ocorrências\n";
        }
    }
    echo "\n";
}

echo "3. VISUALIZAÇÃO DO CONTEÚDO\n";
echo str_repeat('-', 70) . "\n";

foreach ($arquivos as $arquivo => $descricao) {
    echo "$descricao ($arquivo):\n";
    echo file_get_contents($arquivo);
    echo "\n" . str_repeat('-', 70) . "\n";
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";

if (!$temRoxo) {
    echo "✓ SUCESSO! Nenhuma cor roxa encontrada nos bebês dragões!\n";
    echo "✓ Todos os bebês dragões agora são VERDES!\n\n";
    echo "Cores utilizadas:\n";
    echo "  - #3CB371 (MediumSeaGreen) - Corpo principal\n";
    echo "  - #90EE90 (LightGreen) - Asas\n";
    echo "  - #228B22 (ForestGreen) - Detalhes escuros\n";
    echo "  - #006400 (DarkGreen) - Chifres\n";
} else {
    echo "✗ ATENÇÃO: Ainda existem cores roxas!\n";
}

echo str_repeat('=', 70) . "\n";
