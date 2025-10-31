<?php
/**
 * Script para adicionar Arenas 22, 23 e 24 ao banco de dados
 */

$conn = new mysqli('localhost', 'root', '', 'clashdecks', 3307);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

echo "=== ADICIONANDO ARENAS 22, 23 E 24 ===\n\n";

// Arenas a serem adicionadas
$arenas = [
    [
        'id' => 22,
        'nome' => 'Domínio Supremo',
        'icone' => 'arena-22.svg'
    ],
    [
        'id' => 23,
        'nome' => 'Fortaleza Eterna',
        'icone' => 'arena-23.svg'
    ],
    [
        'id' => 24,
        'nome' => 'Trono dos Deuses',
        'icone' => 'arena-24.svg'
    ]
];

$stmt = $conn->prepare("INSERT INTO arenas (id, nome, icone) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE nome = VALUES(nome), icone = VALUES(icone)");

foreach ($arenas as $arena) {
    $stmt->bind_param('iss', $arena['id'], $arena['nome'], $arena['icone']);

    if ($stmt->execute()) {
        echo "✓ Arena {$arena['id']} - {$arena['nome']} adicionada/atualizada com sucesso!\n";
    } else {
        echo "✗ Erro ao adicionar Arena {$arena['id']}: " . $stmt->error . "\n";
    }
}

echo "\n=== VERIFICANDO ARENAS ===\n";
$result = $conn->query("SELECT id, nome, icone FROM arenas WHERE id >= 22 ORDER BY id");
while ($row = $result->fetch_assoc()) {
    echo "Arena {$row['id']}: {$row['nome']} - {$row['icone']}\n";
}

echo "\n=== TOTAL DE ARENAS ===\n";
$result = $conn->query("SELECT COUNT(*) as total FROM arenas");
$total = $result->fetch_assoc()['total'];
echo "Total de arenas cadastradas: $total\n";

$stmt->close();
$conn->close();

echo "\n✓ Script concluído com sucesso!\n";
