<?php
/**
 * Teste das 6 Novas Bandeiras
 */

echo "=== Teste das 6 Novas Bandeiras ===\n\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

$bandeiras6 = [
    'laranja-xadrez',
    'verde-xadrez',
    'roxo-xadrez',
    'flechas',
    'rock-psicodelico',
    'crl-2025'
];

echo "1. VERIFICAÇÃO NO BANCO DE DADOS\n";
echo str_repeat('-', 70) . "\n";

$encontrados = 0;
foreach ($bandeiras6 as $id) {
    $query = "SELECT id, nome, categoria, raridade FROM bandeiras WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $bandeira = $stmt->fetch();

    if ($bandeira) {
        echo sprintf("  ✓ %-30s %s (%s)\n",
            $bandeira['nome'],
            $bandeira['categoria'],
            $bandeira['raridade']
        );
        $encontrados++;
    } else {
        echo sprintf("  ✗ %-30s NÃO ENCONTRADO\n", $id);
    }
}

echo "\n2. VERIFICAÇÃO DOS ÍCONES SVG\n";
echo str_repeat('-', 70) . "\n";

$iconesEncontrados = 0;
foreach ($bandeiras6 as $id) {
    $icone = "assets/img/$id.svg";
    if (file_exists($icone)) {
        $tamanho = filesize($icone);
        echo sprintf("  ✓ %-35s %d bytes\n", "$id.svg:", $tamanho);
        $iconesEncontrados++;
    } else {
        echo sprintf("  ✗ %-35s NÃO ENCONTRADO\n", "$id.svg:");
    }
}

echo "\n3. CONTAGEM TOTAL DE BANDEIRAS\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT COUNT(*) as total FROM bandeiras";
$result = executeAdminQuery($pdo, $query);
$total = $result[0]['total'];

echo "  Total de bandeiras no banco: $total\n";
echo "  Esperado: 25 (19 anteriores + 6 novas)\n";

if ($total == 25) {
    echo "  ✓ Contagem correta!\n";
} else {
    echo "  ⚠ Contagem: $total (esperado: 25)\n";
}

echo "\n4. DISTRIBUIÇÃO POR CATEGORIA\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT categoria, COUNT(*) as qtd FROM bandeiras WHERE id IN ('" . implode("','", $bandeiras6) . "') GROUP BY categoria";
$result = executeAdminQuery($pdo, $query);

foreach ($result as $row) {
    echo sprintf("  %-20s %d\n", $row['categoria'] . ':', $row['qtd']);
}

echo "\n5. DISTRIBUIÇÃO POR RARIDADE\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT raridade, COUNT(*) as qtd FROM bandeiras WHERE id IN ('" . implode("','", $bandeiras6) . "') GROUP BY raridade ORDER BY
    CASE raridade
        WHEN 'Comum' THEN 1
        WHEN 'Raro' THEN 2
        WHEN 'Épico' THEN 3
        WHEN 'Lendário' THEN 4
    END";
$result = executeAdminQuery($pdo, $query);

foreach ($result as $row) {
    echo sprintf("  %-20s %d\n", $row['raridade'] . ':', $row['qtd']);
}

echo "\n6. BANDEIRAS DESTACADAS\n";
echo str_repeat('-', 70) . "\n";

$destaques = ['rock-psicodelico', 'crl-2025'];

foreach ($destaques as $id) {
    $query = "SELECT nome, categoria, raridade, descricao FROM bandeiras WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $bandeira = $stmt->fetch();

    if ($bandeira) {
        echo sprintf("  %-30s\n", $bandeira['nome']);
        echo sprintf("    Categoria: %s | Raridade: %s\n",
            $bandeira['categoria'],
            $bandeira['raridade']
        );
        echo sprintf("    %s\n", $bandeira['descricao']);
        echo "\n";
    }
}

echo "7. BANDEIRAS XADREZ\n";
echo str_repeat('-', 70) . "\n";

$xadrez = ['laranja-xadrez', 'verde-xadrez', 'roxo-xadrez'];

echo "  Série de bandeiras com padrão xadrez:\n";
foreach ($xadrez as $id) {
    $query = "SELECT nome, raridade FROM bandeiras WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $bandeira = $stmt->fetch();

    if ($bandeira) {
        echo sprintf("    ✓ %-25s (%s)\n",
            $bandeira['nome'],
            $bandeira['raridade']
        );
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";
echo "Bandeiras encontradas no banco: $encontrados / 6\n";
echo "Ícones SVG encontrados: $iconesEncontrados / 6\n";
echo "Total de bandeiras no banco: $total\n";

if ($encontrados == 6 && $iconesEncontrados == 6 && $total == 25) {
    echo "\n✓ TODAS AS 6 BANDEIRAS FORAM ADICIONADAS COM SUCESSO!\n";
    echo "✓ BANCO DE DADOS AGORA TEM 25 BANDEIRAS!\n";
} else {
    echo "\n⚠ Algumas bandeiras ou ícones não foram encontrados.\n";
}

echo str_repeat('=', 70) . "\n";
