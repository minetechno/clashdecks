<?php
/**
 * Script de teste para conexão administrativa
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Teste de Conexão Administrativa ===\n\n";

try {
    // Testa conexão
    $pdo = getAdminDBConnection();
    echo "✓ Conexão administrativa estabelecida com sucesso!\n\n";

    // Verifica dados nas tabelas
    echo "Verificando dados no banco:\n";
    echo str_repeat("-", 40) . "\n";

    $result = executeAdminQuery($pdo, 'SELECT COUNT(*) as total FROM arenas');
    echo "Arenas: " . $result[0]['total'] . "\n";

    $result = executeAdminQuery($pdo, 'SELECT COUNT(*) as total FROM personagens');
    echo "Personagens: " . $result[0]['total'] . "\n";

    $result = executeAdminQuery($pdo, 'SELECT COUNT(*) as total FROM decks');
    echo "Decks: " . $result[0]['total'] . "\n";

    $result = executeAdminQuery($pdo, 'SELECT COUNT(*) as total FROM deck_cartas');
    echo "Relações Deck-Cartas: " . $result[0]['total'] . "\n";

    echo str_repeat("-", 40) . "\n";
    echo "\n✓ Todas as tabelas acessíveis!\n";
    echo "✓ Sistema pronto para operações administrativas.\n\n";

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
