<?php
/**
 * Teste dos 11 Novos Personagens Adicionados
 */

echo "=== Teste dos 11 Novos Personagens ===\n\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

$personagens11 = [
    'porcos-reais',
    'berserker',
    'lapide',
    'bombardeiro',
    'torres-de-bombas',
    'coletor-de-elixir',
    'barril-de-esqueletos',
    'carrinho-de-canhao',
    'gigante-real',
    'goblins-lanceiros',
    'patifes'
];

echo "1. VERIFICAÇÃO NO BANCO DE DADOS\n";
echo str_repeat('-', 70) . "\n";

$encontrados = 0;
foreach ($personagens11 as $id) {
    $query = "SELECT id, nome, tipo, raridade, elixir, arena_desbloqueio FROM personagens WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $personagem = $stmt->fetch();

    if ($personagem) {
        echo sprintf("  ✓ %-30s %s (%s, %d elixir)\n",
            $personagem['nome'],
            $personagem['tipo'],
            $personagem['raridade'],
            $personagem['elixir']
        );
        $encontrados++;
    } else {
        echo sprintf("  ✗ %-30s NÃO ENCONTRADO\n", $id);
    }
}

echo "\n2. VERIFICAÇÃO DOS ÍCONES SVG\n";
echo str_repeat('-', 70) . "\n";

$iconesEncontrados = 0;
foreach ($personagens11 as $id) {
    $icone = "assets/img/$id.svg";
    if (file_exists($icone)) {
        $tamanho = filesize($icone);
        echo sprintf("  ✓ %-35s %d bytes\n", "$id.svg:", $tamanho);
        $iconesEncontrados++;
    } else {
        echo sprintf("  ✗ %-35s NÃO ENCONTRADO\n", "$id.svg:");
    }
}

echo "\n3. CONTAGEM TOTAL DE PERSONAGENS\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT COUNT(*) as total FROM personagens";
$result = executeAdminQuery($pdo, $query);
$total = $result[0]['total'];

echo "  Total de personagens no banco: $total\n";
echo "  Esperado: 79 (68 anteriores + 11 novos)\n";

if ($total == 79) {
    echo "  ✓ Contagem correta!\n";
} else {
    echo "  ⚠ Contagem: $total (esperado: 79)\n";
}

echo "\n4. DISTRIBUIÇÃO POR TIPO\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT tipo, COUNT(*) as qtd FROM personagens WHERE id IN ('" . implode("','", $personagens11) . "') GROUP BY tipo";
$result = executeAdminQuery($pdo, $query);

foreach ($result as $row) {
    echo sprintf("  %-20s %d\n", $row['tipo'] . ':', $row['qtd']);
}

echo "\n5. DISTRIBUIÇÃO POR RARIDADE\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT raridade, COUNT(*) as qtd FROM personagens WHERE id IN ('" . implode("','", $personagens11) . "') GROUP BY raridade ORDER BY
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

echo "\n6. PERSONAGENS DESTACADOS\n";
echo str_repeat('-', 70) . "\n";

// Mostrar alguns personagens interessantes
$destaques = ['porcos-reais', 'berserker', 'coletor-de-elixir', 'gigante-real'];

foreach ($destaques as $id) {
    $query = "SELECT nome, tipo, raridade, elixir, descricao FROM personagens WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $personagem = $stmt->fetch();

    if ($personagem) {
        echo sprintf("  %-25s\n", $personagem['nome']);
        echo sprintf("    Tipo: %s | Raridade: %s | Elixir: %d\n",
            $personagem['tipo'],
            $personagem['raridade'],
            $personagem['elixir']
        );
        echo sprintf("    %s\n", $personagem['descricao']);
        echo "\n";
    }
}

echo str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";
echo "Personagens encontrados no banco: $encontrados / 11\n";
echo "Ícones SVG encontrados: $iconesEncontrados / 11\n";
echo "Total de personagens no banco: $total\n";

if ($encontrados == 11 && $iconesEncontrados == 11) {
    echo "\n✓ TODOS OS 11 PERSONAGENS FORAM ADICIONADOS COM SUCESSO!\n";
} else {
    echo "\n⚠ Alguns personagens ou ícones não foram encontrados.\n";
}

echo str_repeat('=', 70) . "\n";
