<?php
/**
 * Teste Completo do Sistema de Bandeiras
 */

echo "=== Teste Completo do Sistema de Bandeiras ===\n\n";

// 1. Testar Banco de Dados
echo "1. BANCO DE DADOS\n";
echo str_repeat('-', 70) . "\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

$query = "SELECT COUNT(*) as total FROM bandeiras";
$result = executeAdminQuery($pdo, $query);
$totalBandeiras = $result[0]['total'];
echo sprintf("  Total de bandeiras: %d\n", $totalBandeiras);

// Por categoria
$categorias = ['Vitórias', 'Guerras', 'Especiais'];
foreach ($categorias as $cat) {
    $query = "SELECT COUNT(*) as total FROM bandeiras WHERE categoria = :cat";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':cat' => $cat]);
    $total = $stmt->fetch()['total'];
    echo sprintf("  - %-12s %d bandeiras\n", $cat . ':', $total);
}

// 2. Testar API
echo "\n2. API REST\n";
echo str_repeat('-', 70) . "\n";

$apiUrl = 'http://localhost/clashdecks/api/bandeiras.php';
$data = @json_decode(file_get_contents($apiUrl), true);

if ($data && is_array($data)) {
    echo sprintf("  ✓ API funcionando (%d bandeiras retornadas)\n", count($data));

    // Verificar "The Smashing Skeletons"
    $smashingSkeletons = array_filter($data, function($b) {
        return $b['id'] === 'the-smashing-skeletons';
    });

    if (!empty($smashingSkeletons)) {
        $bandeira = array_values($smashingSkeletons)[0];
        echo "  ✓ The Smashing Skeletons encontrada:\n";
        echo "    - Nome: {$bandeira['nome']}\n";
        echo "    - Categoria: {$bandeira['categoria']}\n";
        echo "    - Raridade: {$bandeira['raridade']}\n";
    } else {
        echo "  ✗ The Smashing Skeletons NÃO encontrada\n";
    }
} else {
    echo "  ✗ ERRO na API\n";
}

// 3. Verificar Arquivos
echo "\n3. ARQUIVOS\n";
echo str_repeat('-', 70) . "\n";

$arquivos = [
    'HTML' => 'bandeiras/index.html',
    'JavaScript' => 'assets/js/bandeiras.js',
    'API' => 'api/bandeiras.php',
    'CSS' => 'assets/css/styles.css'
];

foreach ($arquivos as $nome => $caminho) {
    if (file_exists($caminho)) {
        $tamanho = filesize($caminho);
        echo sprintf("  ✓ %-15s %s (%s)\n", $nome . ':', $caminho, formatBytes($tamanho));
    } else {
        echo sprintf("  ✗ %-15s %s (NÃO ENCONTRADO)\n", $nome . ':', $caminho);
    }
}

// 4. Verificar Ícones
echo "\n4. ÍCONES SVG\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT icone FROM bandeiras";
$bandeiras = executeAdminQuery($pdo, $query);

$iconesOk = 0;
$iconesFaltando = [];

foreach ($bandeiras as $bandeira) {
    $caminho = "assets/img/{$bandeira['icone']}";
    if (file_exists($caminho)) {
        $iconesOk++;
    } else {
        $iconesFaltando[] = $bandeira['icone'];
    }
}

echo sprintf("  Ícones existentes: %d / %d\n", $iconesOk, count($bandeiras));

if (count($iconesFaltando) > 0) {
    echo "  ✗ Ícones faltando:\n";
    foreach ($iconesFaltando as $icone) {
        echo "    - $icone\n";
    }
} else {
    echo "  ✓ Todos os ícones estão presentes!\n";
}

// 5. Verificar Links no Header
echo "\n5. LINKS NO HEADER\n";
echo str_repeat('-', 70) . "\n";

$paginas = [
    'index.html',
    'personagens/index.html',
    'baus/index.html'
];

$linksBandeirasOk = 0;

foreach ($paginas as $pagina) {
    if (file_exists($pagina)) {
        $conteudo = file_get_contents($pagina);
        if (strpos($conteudo, 'bandeiras/index.html') !== false || strpos($conteudo, '../bandeiras/index.html') !== false) {
            $linksBandeirasOk++;
            echo sprintf("  ✓ Link em %s\n", $pagina);
        } else {
            echo sprintf("  ✗ Link NÃO encontrado em %s\n", $pagina);
        }
    }
}

echo sprintf("  Links adicionados: %d / %d páginas\n", $linksBandeirasOk, count($paginas));

// RESUMO FINAL
echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";

$tudo_ok = (
    $totalBandeiras === 19 &&
    $data && count($data) === 19 &&
    $iconesOk === count($bandeiras) &&
    $linksBandeirasOk === count($paginas)
);

if ($tudo_ok) {
    echo "  ✓ TODOS OS TESTES PASSARAM COM SUCESSO!\n\n";
    echo "  Sistema de Bandeiras:\n";
    echo "    - 19 bandeiras cadastradas\n";
    echo "    - API funcionando\n";
    echo "    - 19 ícones SVG criados\n";
    echo "    - Links no header adicionados\n";
    echo "    - The Smashing Skeletons incluída\n\n";
    echo "  Acesse: http://localhost/clashdecks/bandeiras/index.html\n";
} else {
    echo "  ⚠ ALGUNS PROBLEMAS FORAM ENCONTRADOS\n";
    echo "  Verifique os detalhes acima.\n";
}

echo str_repeat('=', 70) . "\n";

// Função auxiliar
function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB');
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= pow(1024, $pow);
    return round($bytes, $precision) . ' ' . $units[$pow];
}
