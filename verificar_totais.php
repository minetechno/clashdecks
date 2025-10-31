<?php
// Verificar totais no banco de dados
$conn = new mysqli('localhost', 'root', '', 'clashdecks', 3307);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Contar personagens
$result = $conn->query('SELECT COUNT(*) as total FROM personagens');
$personagens = $result->fetch_assoc()['total'];

// Contar baús
$result = $conn->query('SELECT COUNT(*) as total FROM baus');
$baus = $result->fetch_assoc()['total'];

// Contar bandeiras
$result = $conn->query('SELECT COUNT(*) as total FROM bandeiras');
$bandeiras = $result->fetch_assoc()['total'];

// Contar emotes
$result = $conn->query('SELECT COUNT(*) as total FROM emotes');
$emotes = $result->fetch_assoc()['total'];

// Última arena
$result = $conn->query('SELECT MAX(id) as max_id FROM arenas');
$ultima_arena = $result->fetch_assoc()['max_id'];

// Listar todos os personagens
echo "=== TOTAIS ATUAIS ===\n";
echo "Personagens: $personagens\n";
echo "Baús: $baus\n";
echo "Bandeiras: $bandeiras\n";
echo "Emotes: $emotes\n";
echo "Última Arena: $ultima_arena\n\n";

// Listar personagens
echo "=== PERSONAGENS CADASTRADOS ===\n";
$result = $conn->query('SELECT id, nome FROM personagens ORDER BY id');
while ($row = $result->fetch_assoc()) {
    echo "- {$row['id']}: {$row['nome']}\n";
}

echo "\n=== BAÚS CADASTRADOS ===\n";
$result = $conn->query('SELECT id, nome FROM baus ORDER BY id');
while ($row = $result->fetch_assoc()) {
    echo "- {$row['id']}: {$row['nome']}\n";
}

echo "\n=== BANDEIRAS CADASTRADAS ===\n";
$result = $conn->query('SELECT id, nome FROM bandeiras ORDER BY id');
while ($row = $result->fetch_assoc()) {
    echo "- {$row['id']}: {$row['nome']}\n";
}

echo "\n=== ARENAS CADASTRADAS ===\n";
$result = $conn->query('SELECT id, nome FROM arenas ORDER BY id');
while ($row = $result->fetch_assoc()) {
    echo "- Arena {$row['id']}: {$row['nome']}\n";
}

$conn->close();
