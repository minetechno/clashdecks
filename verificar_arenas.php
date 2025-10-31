<?php
require_once 'api/config_admin.php';

$pdo = getAdminDBConnection();

// Primeiro, ver a estrutura da tabela
$query = "SHOW COLUMNS FROM arenas";
$stmt = $pdo->query($query);

echo "Estrutura da tabela arenas:\n";
echo str_repeat('-', 70) . "\n";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['Field'] . " - " . $row['Type'] . "\n";
}

echo "\n\nArenas cadastradas:\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT * FROM arenas ORDER BY id";
$stmt = $pdo->query($query);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo sprintf("%-5s %-30s %s\n", $row['id'], $row['nome'], $row['icone']);
}
