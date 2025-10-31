<?php
/**
 * Verificar Total de Ícones em Cada Categoria
 */

echo "=== Verificação de Ícones - ClashDecks ===\n\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

echo "1. PERSONAGENS\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT COUNT(*) as total FROM personagens";
$result = executeAdminQuery($pdo, $query);
$totalPersonagens = $result[0]['total'];

echo "  Total no banco: $totalPersonagens personagens\n";

// Verificar ícones existentes
$iconesPersonagens = 0;
$personagens = executeAdminQuery($pdo, "SELECT icone FROM personagens");
foreach ($personagens as $p) {
    if (file_exists("assets/img/{$p['icone']}")) {
        $iconesPersonagens++;
    }
}
echo "  Ícones SVG existentes: $iconesPersonagens\n";

echo "\n2. BAÚS\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT COUNT(*) as total FROM baus";
$result = executeAdminQuery($pdo, $query);
$totalBaus = $result[0]['total'];

echo "  Total no banco: $totalBaus baús\n";

$iconesBaus = 0;
$baus = executeAdminQuery($pdo, "SELECT icone FROM baus");
foreach ($baus as $b) {
    if (file_exists("assets/img/{$b['icone']}")) {
        $iconesBaus++;
    }
}
echo "  Ícones SVG existentes: $iconesBaus\n";

echo "\n3. BANDEIRAS\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT COUNT(*) as total FROM bandeiras";
$result = executeAdminQuery($pdo, $query);
$totalBandeiras = $result[0]['total'];

echo "  Total no banco: $totalBandeiras bandeiras\n";

$iconesBandeiras = 0;
$bandeiras = executeAdminQuery($pdo, "SELECT icone FROM bandeiras");
foreach ($bandeiras as $b) {
    if (file_exists("assets/img/{$b['icone']}")) {
        $iconesBandeiras++;
    }
}
echo "  Ícones SVG existentes: $iconesBandeiras\n";

echo "\n4. EMOTES\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT COUNT(*) as total FROM emotes";
$result = executeAdminQuery($pdo, $query);
$totalEmotes = $result[0]['total'];

echo "  Total no banco: $totalEmotes emotes\n";

$iconesEmotes = 0;
$emotes = executeAdminQuery($pdo, "SELECT icone FROM emotes");
foreach ($emotes as $e) {
    if (file_exists("assets/img/{$e['icone']}")) {
        $iconesEmotes++;
    }
}
echo "  Ícones SVG existentes: $iconesEmotes\n";

echo "\n5. ARENAS\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT COUNT(*) as total FROM arenas";
$result = executeAdminQuery($pdo, $query);
$totalArenas = $result[0]['total'];

echo "  Total no banco: $totalArenas arenas\n";

$iconesArenas = 0;
$arenas = executeAdminQuery($pdo, "SELECT icone FROM arenas");
foreach ($arenas as $a) {
    if (file_exists("assets/img/{$a['icone']}")) {
        $iconesArenas++;
    }
}
echo "  Ícones SVG existentes: $iconesArenas\n";

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO TOTAL\n";
echo str_repeat('=', 70) . "\n";

$totalIcones = $iconesPersonagens + $iconesBaus + $iconesBandeiras + $iconesEmotes + $iconesArenas;

echo sprintf("  Personagens:  %3d ícones\n", $iconesPersonagens);
echo sprintf("  Baús:         %3d ícones\n", $iconesBaus);
echo sprintf("  Bandeiras:    %3d ícones\n", $iconesBandeiras);
echo sprintf("  Emotes:       %3d ícones\n", $iconesEmotes);
echo sprintf("  Arenas:       %3d ícones\n", $iconesArenas);
echo sprintf("  ─────────────────────────\n");
echo sprintf("  TOTAL:        %3d ícones SVG\n", $totalIcones);

echo "\n" . str_repeat('=', 70) . "\n";
echo "ESCOPO PARA MELHORIAS\n";
echo str_repeat('=', 70) . "\n";

echo "\nSugestão de abordagem:\n";
echo "  1. Criar versões melhoradas de 5-10 ícones de exemplo\n";
echo "  2. Revisar e aprovar o estilo\n";
echo "  3. Aplicar melhorias a todos os $totalIcones ícones\n\n";

echo "Melhorias planejadas:\n";
echo "  - Adicionar gradientes e sombras\n";
echo "  - Aumentar detalhes e profundidade\n";
echo "  - Melhorar paleta de cores\n";
echo "  - Adicionar bordas e destaques\n";
echo "  - Aumentar tamanho dos ícones (se necessário)\n";

echo "\n" . str_repeat('=', 70) . "\n";
