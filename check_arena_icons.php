<?php
require_once __DIR__ . '/api/config_admin.php';
$pdo = getAdminDBConnection();
$arenas = executeAdminQuery($pdo, 'SELECT id, nome, icone FROM arenas WHERE id <= 5 ORDER BY id');
foreach($arenas as $a) {
    echo "Arena {$a['id']}: {$a['icone']}\n";
}
