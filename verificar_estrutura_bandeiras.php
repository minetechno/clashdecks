<?php
require_once 'api/config_admin.php';

$pdo = getAdminDBConnection();
$query = "SHOW COLUMNS FROM bandeiras";
$stmt = $pdo->query($query);

echo "Estrutura da tabela 'bandeiras':\n";
echo str_repeat('-', 70) . "\n";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo sprintf("%-20s %s\n", $row['Field'], $row['Type']);
}

echo "\nBandeiras existentes:\n";
echo str_repeat('-', 70) . "\n";

$query = "SELECT id, nome, categoria, raridade FROM bandeiras LIMIT 5";
$result = executeAdminQuery($pdo, $query);

foreach ($result as $row) {
    echo sprintf("%-30s %-15s %s\n", $row['nome'], $row['categoria'], $row['raridade']);
}

$query = "SELECT COUNT(*) as total FROM bandeiras";
$result = executeAdminQuery($pdo, $query);
echo "\nTotal de bandeiras: " . $result[0]['total'] . "\n";
