<?php
/**
 * Teste dos 9 Personagens (8 novos + 1 já existente)
 */

echo "=== Teste dos 9 Personagens ===\n\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

$personagens9 = [
    'pescador',
    'bola-de-neve',
    'goblin-gigante',
    'esqueleto-gigante',
    'megasservo',
    'bebe-dragao',
    'dragoes-esqueletos',
    'maquina-voadora',
    'gelo'
];

echo "1. VERIFICAÇÃO NO BANCO DE DADOS\n";
echo str_repeat('-', 70) . "\n";

$encontrados = 0;
foreach ($personagens9 as $id) {
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
foreach ($personagens9 as $id) {
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
echo "  Esperado: 87 (79 anteriores + 8 novos)\n";

if ($total == 87) {
    echo "  ✓ Contagem correta!\n";
} else {
    echo "  ⚠ Contagem: $total (esperado: 87)\n";
}

echo "\n4. DISTRIBUIÇÃO POR TIPO\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT tipo, COUNT(*) as qtd FROM personagens WHERE id IN ('" . implode("','", $personagens9) . "') GROUP BY tipo";
$result = executeAdminQuery($pdo, $query);

foreach ($result as $row) {
    echo sprintf("  %-20s %d\n", $row['tipo'] . ':', $row['qtd']);
}

echo "\n5. DISTRIBUIÇÃO POR RARIDADE\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT raridade, COUNT(*) as qtd FROM personagens WHERE id IN ('" . implode("','", $personagens9) . "') GROUP BY raridade ORDER BY
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
$destaques = ['pescador', 'bebe-dragao', 'esqueleto-gigante', 'goblin-gigante'];

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

echo "\n7. TESTE DE FEITIÇOS\n";
echo str_repeat('-', 70) . "\n";

$feiticos = ['bola-de-neve', 'gelo'];
echo "  Feitiços adicionados nesta atualização:\n";
foreach ($feiticos as $id) {
    $query = "SELECT nome, elixir, raridade FROM personagens WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $personagem = $stmt->fetch();

    if ($personagem) {
        echo sprintf("    ✓ %-20s (%d elixir, %s)\n",
            $personagem['nome'],
            $personagem['elixir'],
            $personagem['raridade']
        );
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";
echo "Personagens encontrados no banco: $encontrados / 9\n";
echo "Ícones SVG encontrados: $iconesEncontrados / 9\n";
echo "Total de personagens no banco: $total\n";

if ($encontrados == 9 && $iconesEncontrados == 9) {
    echo "\n✓ TODOS OS 9 PERSONAGENS ESTÃO DISPONÍVEIS!\n";
    echo "  (1 já existia + 8 novos adicionados)\n";
} else {
    echo "\n⚠ Alguns personagens ou ícones não foram encontrados.\n";
}

echo str_repeat('=', 70) . "\n";
