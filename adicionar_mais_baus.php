<?php
/**
 * Script para adicionar mais baús ao banco de dados
 * Adicionando 14 novos baús (de 16 para 30 total)
 */

$conn = new mysqli('localhost', 'root', '', 'clashdecks', 3307);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

echo "=== ADICIONANDO MAIS BAÚS ===\n\n";

// Novos baús a serem adicionados
$baus = [
    [
        'id' => 'bau-platina',
        'nome' => 'Baú de Platina',
        'raridade' => 'Raro',
        'ciclo' => 5,
        'icone' => 'bau-platina.svg',
        'descricao' => 'Baú raro com ótimas recompensas',
        'ouro_min' => 300,
        'ouro_max' => 800,
        'cartas_total' => 75,
        'recompensas' => json_encode(['ouro', 'cartas', 'gemas'])
    ],
    [
        'id' => 'bau-diamante',
        'nome' => 'Baú de Diamante',
        'raridade' => 'Lendário',
        'ciclo' => 0,
        'icone' => 'bau-diamante.svg',
        'descricao' => 'Baú lendário com recompensas incríveis',
        'ouro_min' => 2000,
        'ouro_max' => 4000,
        'cartas_total' => 150,
        'recompensas' => json_encode(['ouro', 'cartas', 'gemas', 'lendaria'])
    ],
    [
        'id' => 'bau-fortune',
        'nome' => 'Baú da Fortuna',
        'raridade' => 'Lendário',
        'ciclo' => 0,
        'icone' => 'bau-fortune.svg',
        'descricao' => 'Baú especial com recompensas aleatórias premium',
        'ouro_min' => 5000,
        'ouro_max' => 10000,
        'cartas_total' => 200,
        'recompensas' => json_encode(['ouro', 'gemas', 'lendarias', 'tokens'])
    ],
    [
        'id' => 'bau-campeao',
        'nome' => 'Baú do Campeão',
        'raridade' => 'Lendário',
        'ciclo' => 0,
        'icone' => 'bau-campeao.svg',
        'descricao' => 'Baú exclusivo com campeões garantidos',
        'ouro_min' => 3000,
        'ouro_max' => 6000,
        'cartas_total' => 100,
        'recompensas' => json_encode(['campeao', 'ouro', 'cartas'])
    ],
    [
        'id' => 'bau-super-magico',
        'nome' => 'Baú Super Mágico',
        'raridade' => 'Lendário',
        'ciclo' => 0,
        'icone' => 'bau-super-magico.svg',
        'descricao' => 'Versão melhorada do Baú Mágico',
        'ouro_min' => 1000,
        'ouro_max' => 3000,
        'cartas_total' => 300,
        'recompensas' => json_encode(['ouro', 'cartas', 'epicas', 'lendaria'])
    ],
    [
        'id' => 'bau-titanico',
        'nome' => 'Baú Titânico',
        'raridade' => 'Lendário',
        'ciclo' => 0,
        'icone' => 'bau-titanico.svg',
        'descricao' => 'Baú gigante com muitas recompensas',
        'ouro_min' => 800,
        'ouro_max' => 2000,
        'cartas_total' => 400,
        'recompensas' => json_encode(['ouro', 'cartas', 'tokens'])
    ],
    [
        'id' => 'bau-boost',
        'nome' => 'Baú Boost',
        'raridade' => 'Épico',
        'ciclo' => 0,
        'icone' => 'bau-boost.svg',
        'descricao' => 'Baú com itens de boost e aceleração',
        'ouro_min' => 400,
        'ouro_max' => 900,
        'cartas_total' => 60,
        'recompensas' => json_encode(['boost', 'ouro', 'cartas'])
    ],
    [
        'id' => 'bau-presente',
        'nome' => 'Baú Presente',
        'raridade' => 'Raro',
        'ciclo' => 0,
        'icone' => 'bau-presente.svg',
        'descricao' => 'Baú especial de eventos e datas comemorativas',
        'ouro_min' => 500,
        'ouro_max' => 1500,
        'cartas_total' => 80,
        'recompensas' => json_encode(['ouro', 'gemas', 'cartas'])
    ],
    [
        'id' => 'bau-livre',
        'nome' => 'Baú Livre',
        'raridade' => 'Comum',
        'ciclo' => 0,
        'icone' => 'bau-livre.svg',
        'descricao' => 'Baú grátis disponível a cada 4 horas',
        'ouro_min' => 10,
        'ouro_max' => 50,
        'cartas_total' => 10,
        'recompensas' => json_encode(['ouro', 'cartas'])
    ],
    [
        'id' => 'bau-quest',
        'nome' => 'Baú de Missão',
        'raridade' => 'Raro',
        'ciclo' => 0,
        'icone' => 'bau-quest.svg',
        'descricao' => 'Baú obtido ao completar missões diárias',
        'ouro_min' => 200,
        'ouro_max' => 600,
        'cartas_total' => 40,
        'recompensas' => json_encode(['ouro', 'cartas', 'tokens'])
    ],
    [
        'id' => 'bau-arcoiris',
        'nome' => 'Baú Arco-Íris',
        'raridade' => 'Lendário',
        'ciclo' => 0,
        'icone' => 'bau-arcoiris.svg',
        'descricao' => 'Baú colorido com cartas de todas as raridades',
        'ouro_min' => 1500,
        'ouro_max' => 3500,
        'cartas_total' => 120,
        'recompensas' => json_encode(['ouro', 'cartas', 'todas-raridades'])
    ],
    [
        'id' => 'bau-desafio-grande',
        'nome' => 'Grande Baú de Desafio',
        'raridade' => 'Épico',
        'ciclo' => 0,
        'icone' => 'bau-desafio-grande.svg',
        'descricao' => 'Baú premium obtido em desafios especiais',
        'ouro_min' => 600,
        'ouro_max' => 1200,
        'cartas_total' => 100,
        'recompensas' => json_encode(['ouro', 'cartas', 'tokens'])
    ],
    [
        'id' => 'bau-lendario-rei',
        'nome' => 'Baú Lendário do Rei',
        'raridade' => 'Lendário',
        'ciclo' => 0,
        'icone' => 'bau-lendario-rei.svg',
        'descricao' => 'Baú real com múltiplas lendárias',
        'ouro_min' => 2500,
        'ouro_max' => 5000,
        'cartas_total' => 80,
        'recompensas' => json_encode(['lendarias', 'ouro', 'gemas'])
    ],
    [
        'id' => 'bau-mestre',
        'nome' => 'Baú do Mestre',
        'raridade' => 'Lendário',
        'ciclo' => 0,
        'icone' => 'bau-mestre.svg',
        'descricao' => 'Baú exclusivo para mestres da arena',
        'ouro_min' => 3500,
        'ouro_max' => 7000,
        'cartas_total' => 150,
        'recompensas' => json_encode(['ouro', 'cartas', 'lendarias', 'tokens'])
    ]
];

$stmt = $conn->prepare("INSERT INTO baus (id, nome, raridade, ciclo, icone, descricao, ouro_min, ouro_max, cartas_total, recompensas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE nome = VALUES(nome), raridade = VALUES(raridade), ciclo = VALUES(ciclo), icone = VALUES(icone), descricao = VALUES(descricao), ouro_min = VALUES(ouro_min), ouro_max = VALUES(ouro_max), cartas_total = VALUES(cartas_total), recompensas = VALUES(recompensas)");

$sucesso = 0;
$erro = 0;

foreach ($baus as $b) {
    $stmt->bind_param(
        'sssississs',
        $b['id'],
        $b['nome'],
        $b['raridade'],
        $b['ciclo'],
        $b['icone'],
        $b['descricao'],
        $b['ouro_min'],
        $b['ouro_max'],
        $b['cartas_total'],
        $b['recompensas']
    );

    if ($stmt->execute()) {
        echo "✓ {$b['nome']} ({$b['raridade']}) adicionado com sucesso!\n";
        $sucesso++;
    } else {
        echo "✗ Erro ao adicionar {$b['nome']}: " . $stmt->error . "\n";
        $erro++;
    }
}

echo "\n=== RESUMO ===\n";
echo "✓ Sucesso: $sucesso baús\n";
echo "✗ Erros: $erro baús\n";

echo "\n=== TOTAL DE BAÚS ===\n";
$result = $conn->query("SELECT COUNT(*) as total FROM baus");
$total = $result->fetch_assoc()['total'];
echo "Total de baús cadastrados: $total\n";

$stmt->close();
$conn->close();

echo "\n✓ Script concluído!\n";
