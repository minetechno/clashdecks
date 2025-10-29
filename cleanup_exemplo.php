<?php
require_once __DIR__ . '/api/config_admin.php';
$pdo = getAdminDBConnection();
executeAdminQuery($pdo, 'DELETE FROM deck_cartas WHERE deck_id = :id', [':id' => 'deck_a7_mega_control']);
executeAdminQuery($pdo, 'DELETE FROM decks WHERE id = :id', [':id' => 'deck_a7_mega_control']);
executeAdminQuery($pdo, 'DELETE FROM personagens WHERE id = :id', [':id' => 'mega-cavaleiro']);
executeAdminQuery($pdo, 'DELETE FROM arenas WHERE id = :id', [':id' => 22]);
echo "Dados de exemplo removidos com sucesso!\n";
