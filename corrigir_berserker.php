<?php
/**
 * Corrige o custo de elixir do Berserker
 */

require_once 'api/config_admin.php';

echo "=== Corrigindo Berserker ===\n\n";

$pdo = getAdminDBConnection();

try {
    // Atualizar o elixir do Berserker de 4 para 2
    $query = "UPDATE personagens SET elixir = 2 WHERE id = 'berserker'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    echo "✓ Berserker atualizado: elixir 4 -> 2\n";

    // Verificar a mudança
    $query = "SELECT id, nome, elixir FROM personagens WHERE id = 'berserker'";
    $result = executeAdminQuery($pdo, $query);

    if (!empty($result)) {
        echo "\nVerificação:\n";
        echo "ID: {$result[0]['id']}\n";
        echo "Nome: {$result[0]['nome']}\n";
        echo "Elixir: {$result[0]['elixir']}\n";
    }

    echo "\n✓ Correção concluída com sucesso!\n";

} catch (Exception $e) {
    echo "✗ Erro: " . $e->getMessage() . "\n";
}
