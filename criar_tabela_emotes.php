<?php
/**
 * Criar Tabela de Emotes no Banco de Dados
 */

require_once 'api/config_admin.php';

echo "=== Criando Tabela de Emotes ===\n\n";

$pdo = getAdminDBConnection();

try {
    // Criar tabela emotes
    $sql = "CREATE TABLE IF NOT EXISTS emotes (
        id VARCHAR(50) PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        categoria VARCHAR(50) NOT NULL,
        raridade ENUM('Comum', 'Raro', 'Épico', 'Lendário') NOT NULL,
        icone VARCHAR(100) NOT NULL,
        descricao TEXT,
        animacao TEXT,
        desbloqueio VARCHAR(255),
        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

    $pdo->exec($sql);
    echo "✓ Tabela 'emotes' criada com sucesso!\n\n";

    // Verificar estrutura
    echo "Estrutura da tabela 'emotes':\n";
    echo str_repeat('-', 70) . "\n";

    $query = "SHOW COLUMNS FROM emotes";
    $stmt = $pdo->query($query);

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo sprintf("%-20s %s\n", $row['Field'], $row['Type']);
    }

    echo "\n✓ Tabela de emotes criada e verificada com sucesso!\n";

} catch (PDOException $e) {
    echo "✗ Erro ao criar tabela: " . $e->getMessage() . "\n";
}
