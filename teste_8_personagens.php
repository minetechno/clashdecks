<?php
/**
 * Teste dos 8 Novos Personagens
 */

echo "=== Teste dos 8 Novos Personagens ===\n\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

$personagens8 = [
    'sparky',
    'destruidores-de-muros',
    'lava-hound',
    'morcegos',
    'espirito-curador',
    'lancador',
    'ariete-de-batalha',
    'arqueiro-magico'
];

echo "1. VERIFICAÇÃO NO BANCO DE DADOS\n";
echo str_repeat('-', 70) . "\n";

$encontrados = 0;
foreach ($personagens8 as $id) {
    $query = "SELECT id, nome, tipo, raridade, elixir, arena_desbloqueio FROM personagens WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $personagem = $stmt->fetch();

    if ($personagem) {
        echo sprintf("  ✓ %-30s %s (%s, %d elixir, Arena %d)\n",
            $personagem['nome'],
            $personagem['tipo'],
            $personagem['raridade'],
            $personagem['elixir'],
            $personagem['arena_desbloqueio']
        );
        $encontrados++;
    } else {
        echo sprintf("  ✗ %-30s NÃO ENCONTRADO\n", $id);
    }
}

echo "\n2. VERIFICAÇÃO DOS ÍCONES SVG\n";
echo str_repeat('-', 70) . "\n";

$iconesEncontrados = 0;
foreach ($personagens8 as $id) {
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
echo "  Esperado: 95 (87 anteriores + 8 novos)\n";

if ($total == 95) {
    echo "  ✓ Contagem correta!\n";
} else {
    echo "  ⚠ Contagem: $total (esperado: 95)\n";
}

echo "\n4. DISTRIBUIÇÃO POR RARIDADE\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT raridade, COUNT(*) as qtd FROM personagens WHERE id IN ('" . implode("','", $personagens8) . "') GROUP BY raridade ORDER BY
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

echo "\n5. PERSONAGENS LENDÁRIOS\n";
echo str_repeat('-', 70) . "\n";

$legendarios = ['sparky', 'lava-hound', 'arqueiro-magico'];

foreach ($legendarios as $id) {
    $query = "SELECT nome, elixir, descricao FROM personagens WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $personagem = $stmt->fetch();

    if ($personagem) {
        echo sprintf("  %-25s (%d elixir)\n", $personagem['nome'], $personagem['elixir']);
        echo sprintf("    %s\n", $personagem['descricao']);
        echo "\n";
    }
}

echo "6. PERSONAGENS DESTACADOS\n";
echo str_repeat('-', 70) . "\n";

$destaques = [
    'destruidores-de-muros' => 'Cinco goblins com bombas',
    'morcegos' => 'Enxame voador',
    'espirito-curador' => 'Cura em área'
];

foreach ($destaques as $id => $nota) {
    $query = "SELECT nome, tipo, raridade, elixir FROM personagens WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $personagem = $stmt->fetch();

    if ($personagem) {
        echo sprintf("  %-30s %s (%s, %d elixir) - %s\n",
            $personagem['nome'],
            $personagem['tipo'],
            $personagem['raridade'],
            $personagem['elixir'],
            $nota
        );
    }
}

echo "\n7. EVOLUÇÃO DO BANCO DE DADOS\n";
echo str_repeat('-', 70) . "\n";

echo "  Início da sessão:              68 personagens\n";
echo "  Após 1ª adição (11):           79 personagens\n";
echo "  Após 2ª adição (8):            87 personagens\n";
echo "  Após 3ª adição (8):            95 personagens ← ATUAL\n";

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";
echo "Personagens encontrados no banco: $encontrados / 8\n";
echo "Ícones SVG encontrados: $iconesEncontrados / 8\n";
echo "Total de personagens no banco: $total\n";

if ($encontrados == 8 && $iconesEncontrados == 8 && $total == 95) {
    echo "\n✓ TODOS OS 8 PERSONAGENS FORAM ADICIONADOS COM SUCESSO!\n";
    echo "✓ BANCO DE DADOS AGORA TEM 95 PERSONAGENS!\n";
} else {
    echo "\n⚠ Alguns personagens ou ícones não foram encontrados.\n";
}

echo str_repeat('=', 70) . "\n";
