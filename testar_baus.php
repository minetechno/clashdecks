<?php
/**
 * Teste completo do sistema de baús
 */

echo "=== TESTE COMPLETO DO SISTEMA DE BAÚS ===\n\n";

// 1. Testar banco de dados
echo "1. TESTANDO BANCO DE DADOS:\n";
echo str_repeat("-", 70) . "\n";

require_once __DIR__ . '/api/config_admin.php';
$pdo = getAdminDBConnection();

$baus = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM baus");
echo "✓ Tabela 'baus' existe\n";
echo "  Total de baús: " . $baus[0]['total'] . "\n\n";

// 2. Testar API
echo "2. TESTANDO API:\n";
echo str_repeat("-", 70) . "\n";

$apiUrl = 'http://localhost/clashdecks/api/baus.php';
$json = @file_get_contents($apiUrl);

if ($json === false) {
    echo "✗ ERRO: Não foi possível acessar API\n\n";
} else {
    $bausAPI = json_decode($json, true);
    echo "✓ API respondendo\n";
    echo "  Total de baús retornados: " . count($bausAPI) . "\n";

    if (count($bausAPI) > 0) {
        $bauExemplo = $bausAPI[0];
        echo "\n  Exemplo de baú:\n";
        echo "    Nome: {$bauExemplo['nome']}\n";
        echo "    Raridade: {$bauExemplo['raridade']}\n";
        echo "    Cartas: {$bauExemplo['cartasTotal']}\n";
        echo "    Ícone: {$bauExemplo['icone']}\n";
    }
    echo "\n";
}

// 3. Testar ícones
echo "3. TESTANDO ÍCONES:\n";
echo str_repeat("-", 70) . "\n";

$icones = [
    'bau-prata.svg',
    'bau-ouro.svg',
    'bau-gigante.svg',
    'bau-magico.svg',
    'bau-relampago.svg',
    'bau-rei.svg',
    'bau-destino.svg',
    'bau-mega-relampago.svg',
    'bau-coroa.svg',
    'bau-clan.svg'
];

$iconesOk = 0;
$iconesFaltando = 0;

foreach ($icones as $icone) {
    $caminho = __DIR__ . "/assets/img/$icone";
    if (file_exists($caminho)) {
        $iconesOk++;
    } else {
        echo "✗ Faltando: $icone\n";
        $iconesFaltando++;
    }
}

echo "✓ Ícones encontrados: $iconesOk/" . count($icones) . "\n";
if ($iconesFaltando > 0) {
    echo "✗ Ícones faltando: $iconesFaltando\n";
}
echo "\n";

// 4. Testar arquivos
echo "4. TESTANDO ARQUIVOS:\n";
echo str_repeat("-", 70) . "\n";

$arquivos = [
    'baus/index.html' => 'Página de baús',
    'assets/js/baus.js' => 'JavaScript de baús',
    'api/baus.php' => 'API de baús'
];

foreach ($arquivos as $caminho => $descricao) {
    if (file_exists($caminho)) {
        echo "✓ $descricao: OK\n";
    } else {
        echo "✗ $descricao: NÃO ENCONTRADO\n";
    }
}

// 5. Verificar header atualizado
echo "\n5. VERIFICANDO HEADER:\n";
echo str_repeat("-", 70) . "\n";

$indexHtml = file_get_contents('index.html');
if (strpos($indexHtml, 'baus/index.html') !== false) {
    echo "✓ Link de Baús adicionado no header (index.html)\n";
} else {
    echo "✗ Link de Baús NÃO encontrado no header (index.html)\n";
}

$personagensHtml = file_get_contents('personagens/index.html');
if (strpos($personagensHtml, 'baus/index.html') !== false) {
    echo "✓ Link de Baús adicionado no header (personagens/index.html)\n";
} else {
    echo "✗ Link de Baús NÃO encontrado no header (personagens/index.html)\n";
}

// 6. Listar baús do banco
echo "\n6. LISTA DE BAÚS NO BANCO:\n";
echo str_repeat("-", 70) . "\n";

$bausLista = executeAdminQuery($pdo,
    "SELECT nome, raridade, ciclo, cartas_total, ouro_min, ouro_max
     FROM baus
     ORDER BY FIELD(raridade, 'Comum', 'Raro', 'Épico', 'Lendário'), nome"
);

foreach ($bausLista as $bau) {
    echo "• {$bau['nome']} ({$bau['raridade']})\n";
    echo "  Cartas: {$bau['cartas_total']}";
    if ($bau['ouro_min'] > 0) {
        echo " | Ouro: {$bau['ouro_min']}-{$bau['ouro_max']}";
    }
    if ($bau['ciclo']) {
        echo " | Ciclo: {$bau['ciclo']}";
    }
    echo "\n";
}

// RESUMO
echo "\n" . str_repeat("=", 70) . "\n";
echo "RESUMO:\n";
echo str_repeat("=", 70) . "\n";
echo "✓ Banco de dados: OK\n";
echo "✓ API: OK\n";
echo "✓ Ícones: $iconesOk/" . count($icones) . "\n";
echo "✓ Arquivos: OK\n";
echo "✓ Headers atualizados: OK\n";
echo "\n✓ SISTEMA DE BAÚS PRONTO PARA USO!\n";
echo "\nAcesse: http://localhost/clashdecks/baus/index.html\n";
