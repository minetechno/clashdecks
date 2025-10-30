<?php
/**
 * Testa se os novos nomes das arenas estão na API
 */

echo "=== Teste dos Novos Nomes das Arenas ===\n\n";

// 1. Testar API de Arenas
echo "1. TESTANDO API DE ARENAS:\n";
echo str_repeat("-", 70) . "\n";

$arenasJson = @file_get_contents('http://localhost/clashdecks/api/arenas.php');

if ($arenasJson === false) {
    echo "✗ ERRO: Não foi possível acessar API\n\n";
    exit(1);
}

$arenas = json_decode($arenasJson, true);

echo "✓ API respondendo\n";
echo "Total de arenas: " . count($arenas) . "\n\n";

// Verificar primeiras 10 arenas
echo "Primeiras 10 arenas:\n";
for ($i = 0; $i < 10 && $i < count($arenas); $i++) {
    $arena = $arenas[$i];
    echo sprintf("  Arena %2d: %s\n", $arena['id'], $arena['nome']);
}

echo "\nÚltimas 5 arenas:\n";
$ultimas = array_slice($arenas, -5);
foreach ($ultimas as $arena) {
    echo sprintf("  Arena %2d: %s\n", $arena['id'], $arena['nome']);
}

// 2. Verificar arenas específicas mencionadas pelo usuário
echo "\n" . str_repeat("=", 70) . "\n";
echo "2. VERIFICAÇÃO DAS ARENAS MENCIONADAS:\n";
echo str_repeat("=", 70) . "\n\n";

$arenasVerificar = [
    1 => 'Estádio Goblin',
    2 => 'Fosso dos Ossos'
];

foreach ($arenasVerificar as $id => $nomeEsperado) {
    $arena = array_filter($arenas, function($a) use ($id) {
        return $a['id'] == $id;
    });

    $arena = reset($arena);

    if ($arena) {
        $match = $arena['nome'] === $nomeEsperado ? '✓' : '✗';
        echo "$match Arena $id:\n";
        echo "   Esperado: $nomeEsperado\n";
        echo "   Atual: {$arena['nome']}\n";

        if ($arena['nome'] === $nomeEsperado) {
            echo "   ✓ CORRETO\n";
        } else {
            echo "   ✗ DIFERENTE\n";
        }
        echo "\n";
    }
}

// 3. Comparação completa
echo str_repeat("=", 70) . "\n";
echo "3. LISTA COMPLETA DE ARENAS ATUALIZADAS:\n";
echo str_repeat("=", 70) . "\n\n";

$nomesOficiais = [
    1 => 'Estádio Goblin',
    2 => 'Fosso dos Ossos',
    3 => 'Campo de Batalha dos Bárbaros',
    4 => 'P.E.K.K.A\'s Playhouse',
    5 => 'Vale dos Feitiços',
    6 => 'Oficina do Construtor',
    7 => 'Arena Real',
    8 => 'Pico Congelado',
    9 => 'Selva',
    10 => 'Montanha Hog',
    11 => 'Vale Elétrico',
    12 => 'Cidade Assustadora',
    13 => 'Esconderijo dos Malvados',
    14 => 'Pico da Serenidade',
    15 => 'Arena Lendária',
    16 => 'Caminho do Lendário',
    17 => 'Arena de Desafiante I',
    18 => 'Arena de Desafiante II',
    19 => 'Arena de Desafiante III',
    20 => 'Arena de Mestre I',
    21 => 'Arena de Mestre II'
];

$erros = 0;
$corretos = 0;

foreach ($nomesOficiais as $id => $nomeEsperado) {
    $arena = array_filter($arenas, function($a) use ($id) {
        return $a['id'] == $id;
    });

    $arena = reset($arena);

    if (!$arena) {
        echo "✗ Arena $id: NÃO ENCONTRADA\n";
        $erros++;
        continue;
    }

    $status = $arena['nome'] === $nomeEsperado ? '✓' : '✗';

    if ($arena['nome'] === $nomeEsperado) {
        $corretos++;
    } else {
        $erros++;
        echo "$status Arena $id: {$arena['nome']} (esperado: $nomeEsperado)\n";
    }
}

// 4. Resumo
echo "\n" . str_repeat("=", 70) . "\n";
echo "RESUMO:\n";
echo str_repeat("=", 70) . "\n";
echo "Arenas corretas: $corretos/21\n";
echo "Arenas com erro: $erros\n";

if ($erros === 0) {
    echo "\n✓ TODOS OS NOMES ESTÃO CORRETOS!\n";
    echo "✓ Arenas sincronizadas com a última atualização do Clash Royale!\n";
} else {
    echo "\n✗ Alguns nomes ainda precisam de correção\n";
}
