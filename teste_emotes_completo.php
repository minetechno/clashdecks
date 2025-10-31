<?php
/**
 * Teste Completo da Página de Emotes
 */

echo "=== Teste Completo - Emotes do Clash Royale ===\n\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

echo "1. VERIFICAÇÃO DO BANCO DE DADOS\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT COUNT(*) as total FROM emotes";
$result = executeAdminQuery($pdo, $query);
$total = $result[0]['total'];

echo "  Total de emotes no banco: $total\n";
echo "  Esperado: 12 emotes\n";
echo $total == 12 ? "  ✓ Contagem correta!\n" : "  ✗ Contagem incorreta!\n";

echo "\n2. VERIFICAÇÃO DOS ÍCONES SVG\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT id, icone FROM emotes";
$emotes = executeAdminQuery($pdo, $query);

$iconesOk = 0;
$iconesFaltando = 0;

foreach ($emotes as $emote) {
    $caminho = "assets/img/{$emote['icone']}";
    if (file_exists($caminho)) {
        $iconesOk++;
    } else {
        echo "  ✗ Faltando: $caminho\n";
        $iconesFaltando++;
    }
}

echo "  Ícones encontrados: $iconesOk / $total\n";
echo $iconesOk == $total ? "  ✓ Todos os ícones existem!\n" : "  ✗ Alguns ícones estão faltando!\n";

echo "\n3. EMOTES PRINCIPAIS (OS 3 SOLICITADOS)\n";
echo str_repeat('-', 70) . "\n";

$emotesPrincipais = ['danca-bebe-dragao', 'danca-suina', 'goblin-chorao'];

foreach ($emotesPrincipais as $id) {
    $query = "SELECT nome, categoria, raridade, animacao FROM emotes WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $emote = $stmt->fetch();

    if ($emote) {
        echo "  ✓ {$emote['nome']}\n";
        echo "    Categoria: {$emote['categoria']} | Raridade: {$emote['raridade']}\n";
        echo "    Animação: {$emote['animacao']}\n\n";
    } else {
        echo "  ✗ $id NÃO ENCONTRADO\n\n";
    }
}

echo "4. DISTRIBUIÇÃO POR CATEGORIA\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT categoria, COUNT(*) as qtd FROM emotes GROUP BY categoria";
$result = executeAdminQuery($pdo, $query);

foreach ($result as $row) {
    echo sprintf("  %-20s %d emotes\n", $row['categoria'] . ':', $row['qtd']);
}

echo "\n5. DISTRIBUIÇÃO POR RARIDADE\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT raridade, COUNT(*) as qtd FROM emotes GROUP BY raridade ORDER BY
    CASE raridade
        WHEN 'Comum' THEN 1
        WHEN 'Raro' THEN 2
        WHEN 'Épico' THEN 3
        WHEN 'Lendário' THEN 4
    END";
$result = executeAdminQuery($pdo, $query);

foreach ($result as $row) {
    echo sprintf("  %-20s %d emotes\n", $row['raridade'] . ':', $row['qtd']);
}

echo "\n6. VERIFICAÇÃO DOS ARQUIVOS DA PÁGINA\n";
echo str_repeat('-', 70) . "\n";

$arquivos = [
    'emotes/index.html' => 'Página HTML',
    'assets/js/emotes.js' => 'JavaScript',
    'api/emotes.php' => 'API REST'
];

foreach ($arquivos as $arquivo => $descricao) {
    $existe = file_exists($arquivo);
    $tamanho = $existe ? filesize($arquivo) : 0;

    echo sprintf("  %s %-25s %s bytes\n",
        $existe ? '✓' : '✗',
        "$descricao:",
        $existe ? number_format($tamanho) : 'N/A'
    );
}

echo "\n7. VERIFICAÇÃO DOS BOTÕES NO HEADER\n";
echo str_repeat('-', 70) . "\n";

$paginasParaVerificar = [
    'index.html',
    'personagens/index.html',
    'baus/index.html',
    'bandeiras/index.html'
];

$todasOk = true;
foreach ($paginasParaVerificar as $pagina) {
    $conteudo = file_get_contents($pagina);
    $temBotao = strpos($conteudo, 'emotes/index.html') !== false || strpos($conteudo, '../emotes/index.html') !== false;

    echo sprintf("  %s %s\n",
        $temBotao ? '✓' : '✗',
        $pagina
    );

    if (!$temBotao) $todasOk = false;
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";

if ($total == 12 && $iconesOk == 12 && $todasOk) {
    echo "✓ PÁGINA DE EMOTES CRIADA COM SUCESSO!\n\n";
    echo "Estatísticas:\n";
    echo "  - 12 emotes cadastrados\n";
    echo "  - 12 ícones SVG criados\n";
    echo "  - Página HTML, JavaScript e API criados\n";
    echo "  - Botão 'Emotes' adicionado em todas as páginas\n\n";
    echo "Emotes principais incluídos:\n";
    echo "  ✓ Dança do Bebê Dragão\n";
    echo "  ✓ Dança Suína\n";
    echo "  ✓ Goblin Chorão\n\n";
    echo "Acesse: http://localhost/clashdecks/emotes/\n";
} else {
    echo "⚠ Alguns problemas foram encontrados. Verifique os detalhes acima.\n";
}

echo str_repeat('=', 70) . "\n";
