<?php
/**
 * Teste dos 8 Personagens Extras Adicionados
 */

echo "=== Teste dos Personagens Extras ===\n\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

$personagensExtras = [
    'espirito-eletrico',
    'servos',
    'goblin-com-dardos',
    'tres-mosqueteiras',
    'curadora-guerreira',
    'recrutas-reais',
    'exercito-de-esqueletos',
    'morteiro'
];

echo "1. VERIFICAÇÃO NO BANCO DE DADOS\n";
echo str_repeat('-', 70) . "\n";

foreach ($personagensExtras as $id) {
    $query = "SELECT id, nome, tipo, raridade, elixir, arena_desbloqueio FROM personagens WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $personagem = $stmt->fetch();

    if ($personagem) {
        echo sprintf("  ✓ %-25s %s (%s, %d elixir, Arena %d)\n",
            $personagem['nome'],
            $personagem['tipo'],
            $personagem['raridade'],
            $personagem['elixir'],
            $personagem['arena_desbloqueio']
        );
    } else {
        echo sprintf("  ✗ %-25s NÃO ENCONTRADO\n", $id);
    }
}

echo "\n2. VERIFICAÇÃO DOS ÍCONES SVG\n";
echo str_repeat('-', 70) . "\n";

foreach ($personagensExtras as $id) {
    $icone = "assets/img/$id.svg";
    if (file_exists($icone)) {
        $tamanho = filesize($icone);
        echo sprintf("  ✓ %-30s %d bytes\n", "$id.svg:", $tamanho);
    } else {
        echo sprintf("  ✗ %-30s NÃO ENCONTRADO\n", "$id.svg:");
    }
}

echo "\n3. CONTAGEM TOTAL\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT COUNT(*) as total FROM personagens";
$result = executeAdminQuery($pdo, $query);
$total = $result[0]['total'];

echo "  Total de personagens no banco: $total\n";
echo "  Esperado: 68 (60 anteriores + 8 novos)\n";

if ($total == 68) {
    echo "  ✓ Contagem correta!\n";
} else {
    echo "  ⚠ Contagem diferente do esperado\n";
}

echo "\n4. TESTE DE SINERGIAS E COUNTERS\n";
echo str_repeat('-', 70) . "\n";

// Testar alguns personagens específicos
$testeSinergias = ['espirito-eletrico', 'curadora-guerreira', 'morteiro'];

foreach ($testeSinergias as $id) {
    $query = "SELECT nome, sinergias, counters FROM personagens WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $personagem = $stmt->fetch();

    if ($personagem) {
        $sinergias = json_decode($personagem['sinergias'], true);
        $counters = json_decode($personagem['counters'], true);

        echo sprintf("  %-25s\n", $personagem['nome']);
        echo sprintf("    Sinergias: %s\n", implode(', ', $sinergias));
        echo sprintf("    Counters:  %s\n", implode(', ', $counters));
        echo "\n";
    }
}

echo str_repeat('=', 70) . "\n";
echo "✓ TESTE DOS PERSONAGENS EXTRAS CONCLUÍDO!\n";
echo str_repeat('=', 70) . "\n";
