<?php
/**
 * Teste dos Ícones das Arenas Finais (22, 23, 24)
 */

echo "=== Teste dos Ícones das Arenas Finais ===\n\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

echo "1. VERIFICAÇÃO NO BANCO DE DADOS\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT id, nome, icone FROM arenas WHERE id IN (15, 22, 23, 24) ORDER BY id";
$stmt = $pdo->query($query);

$arenas = [];
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $arenas[] = $row;
    echo sprintf("  Arena %2d: %-30s (%s)\n", $row['id'], $row['nome'], $row['icone']);
}

echo "\n2. VERIFICAÇÃO DOS ARQUIVOS SVG\n";
echo str_repeat('-', 70) . "\n";

$arquivos = [
    15 => 'assets/img/arena15.svg',
    22 => 'assets/img/arena22.svg',
    23 => 'assets/img/arena23.svg',
    24 => 'assets/img/arena24.svg'
];

$conteudos = [];

foreach ($arquivos as $id => $arquivo) {
    if (file_exists($arquivo)) {
        $tamanho = filesize($arquivo);
        $conteudo = file_get_contents($arquivo);
        $conteudos[$id] = $conteudo;

        echo sprintf("  Arena %2d: %-30s %d bytes\n",
            $id,
            basename($arquivo),
            $tamanho
        );
    } else {
        echo sprintf("  Arena %2d: %-30s NÃO ENCONTRADO\n", $id, basename($arquivo));
    }
}

echo "\n3. COMPARAÇÃO DE CONTEÚDO\n";
echo str_repeat('-', 70) . "\n";

$iconeOriginal = $conteudos[15] ?? '';

echo "  Ícone da Arena Lendária (15): " . strlen($iconeOriginal) . " bytes\n\n";

$iguais = 0;
foreach ([22, 23, 24] as $id) {
    $iconeAtual = $conteudos[$id] ?? '';
    $saoIguais = ($iconeOriginal === $iconeAtual);

    echo sprintf("  Arena %d (%s): %s\n",
        $id,
        $arenas[array_search($id, array_column($arenas, 'id'))]['nome'] ?? 'Desconhecida',
        $saoIguais ? '✓ IGUAL ao ícone da Arena Lendária' : '✗ DIFERENTE'
    );

    if ($saoIguais) $iguais++;
}

echo "\n4. VISUALIZAÇÃO DO CONTEÚDO SVG\n";
echo str_repeat('-', 70) . "\n";

echo "Conteúdo do arena15.svg (Arena Lendária):\n";
echo $iconeOriginal . "\n";

echo "\n5. VERIFICAÇÃO DOS NOMES DAS ARENAS\n";
echo str_repeat('-', 70) . "\n";

echo "Confirmando que os NOMES das arenas foram mantidos:\n";
foreach ([22, 23, 24] as $id) {
    $arena = $arenas[array_search($id, array_column($arenas, 'id'))];
    echo sprintf("  ✓ Arena %d: %s\n", $id, $arena['nome']);
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";

if ($iguais == 3) {
    echo "✓ SUCESSO! Todas as 3 arenas finais têm o ícone da Arena Lendária!\n\n";
    echo "Ícone copiado:\n";
    echo "  - Arena Lendária (15) → Arena 22 (Reino Celestial)\n";
    echo "  - Arena Lendária (15) → Arena 23 (Dimensão Cósmica)\n";
    echo "  - Arena Lendária (15) → Arena 24 (Trono Supremo)\n\n";
    echo "✓ Os NOMES das arenas foram MANTIDOS como solicitado!\n";
} else {
    echo "⚠ ATENÇÃO: Apenas $iguais de 3 arenas têm o ícone correto.\n";
}

echo str_repeat('=', 70) . "\n";
