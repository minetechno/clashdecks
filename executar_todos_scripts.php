<?php
/**
 * Script mestre para executar todos os scripts de adição ao banco
 */

echo "╔════════════════════════════════════════════════════════════════╗\n";
echo "║                  CLASHDECKS - EXPANSÃO DO BANCO                ║\n";
echo "╚════════════════════════════════════════════════════════════════╝\n\n";

$scripts = [
    'adicionar_arenas_22_24.php' => 'Arenas 22, 23 e 24',
    'adicionar_mais_personagens.php' => 'Personagens (45 novos)',
    'adicionar_mais_baus.php' => 'Baús (14 novos)',
    'adicionar_mais_bandeiras.php' => 'Bandeiras (19 novas)'
];

$total_sucesso = 0;
$total_erro = 0;

foreach ($scripts as $script => $descricao) {
    echo "════════════════════════════════════════════════════════════════\n";
    echo "  EXECUTANDO: $descricao\n";
    echo "════════════════════════════════════════════════════════════════\n\n";

    if (file_exists($script)) {
        ob_start();
        include $script;
        $output = ob_get_clean();
        echo $output;

        // Contar sucessos e erros
        $sucessos = substr_count($output, '✓');
        $erros = substr_count($output, '✗');

        echo "\n";
        $total_sucesso += $sucessos;
        $total_erro += $erros;
    } else {
        echo "✗ ERRO: Script $script não encontrado!\n\n";
        $total_erro++;
    }
}

echo "\n╔════════════════════════════════════════════════════════════════╗\n";
echo "║                      RESUMO FINAL GERAL                        ║\n";
echo "╚════════════════════════════════════════════════════════════════╝\n\n";

// Conectar ao banco para verificar totais finais
$conn = new mysqli('localhost', 'root', '', 'clashdecks', 3307);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

echo "=== TOTAIS ATUALIZADOS NO BANCO ===\n\n";

// Arenas
$result = $conn->query("SELECT COUNT(*) as total FROM arenas");
$arenas = $result->fetch_assoc()['total'];
echo "⚔️  Arenas: $arenas\n";

// Personagens
$result = $conn->query("SELECT COUNT(*) as total FROM personagens");
$personagens = $result->fetch_assoc()['total'];
echo "🃏  Personagens: $personagens\n";

// Personagens por tipo
$result = $conn->query("SELECT tipo, COUNT(*) as total FROM personagens GROUP BY tipo ORDER BY tipo");
echo "    ├─ ";
while ($row = $result->fetch_assoc()) {
    echo "{$row['tipo']}: {$row['total']}  ";
}
echo "\n";

// Personagens por raridade
$result = $conn->query("SELECT raridade, COUNT(*) as total FROM personagens GROUP BY raridade ORDER BY FIELD(raridade, 'Comum', 'Raro', 'Épico', 'Lendário', 'Campeão')");
echo "    └─ ";
while ($row = $result->fetch_assoc()) {
    echo "{$row['raridade']}: {$row['total']}  ";
}
echo "\n\n";

// Baús
$result = $conn->query("SELECT COUNT(*) as total FROM baus");
$baus = $result->fetch_assoc()['total'];
echo "📦  Baús: $baus\n";

// Baús por raridade
$result = $conn->query("SELECT raridade, COUNT(*) as total FROM baus GROUP BY raridade ORDER BY FIELD(raridade, 'Comum', 'Raro', 'Épico', 'Lendário')");
echo "    └─ ";
while ($row = $result->fetch_assoc()) {
    echo "{$row['raridade']}: {$row['total']}  ";
}
echo "\n\n";

// Bandeiras
$result = $conn->query("SELECT COUNT(*) as total FROM bandeiras");
$bandeiras = $result->fetch_assoc()['total'];
echo "🚩  Bandeiras: $bandeiras\n";

// Bandeiras por categoria
$result = $conn->query("SELECT categoria, COUNT(*) as total FROM bandeiras GROUP BY categoria ORDER BY categoria");
echo "    └─ ";
while ($row = $result->fetch_assoc()) {
    echo "{$row['categoria']}: {$row['total']}  ";
}
echo "\n\n";

// Emotes
$result = $conn->query("SELECT COUNT(*) as total FROM emotes");
$emotes = $result->fetch_assoc()['total'];
echo "😀  Emotes: $emotes\n\n";

// Decks
$result = $conn->query("SELECT COUNT(*) as total FROM decks");
$decks = $result->fetch_assoc()['total'];
echo "🎴  Decks: $decks\n\n";

echo "════════════════════════════════════════════════════════════════\n\n";

echo "✓ Total de operações bem-sucedidas: $total_sucesso\n";
if ($total_erro > 0) {
    echo "✗ Total de erros: $total_erro\n";
}

echo "\n╔════════════════════════════════════════════════════════════════╗\n";
echo "║                   ✓ EXPANSÃO CONCLUÍDA!                        ║\n";
echo "╚════════════════════════════════════════════════════════════════╝\n";

$conn->close();
