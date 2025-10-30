<?php
/**
 * Atualiza nomes das arenas para a última atualização do Clash Royale
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Atualizando Nomes das Arenas - Clash Royale ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // Nomes oficiais da última atualização do Clash Royale
    $arenasAtualizadas = [
        1 => 'Estádio Goblin',
        2 => 'Fosso dos Ossos',
        3 => 'Campo de Batalha dos Bárbaros',
        4 => 'P.E.K.K.A\'s Playhouse',
        5 => 'Vale dos Feitiços',
        6 => 'Oficina do Construtor',
        7 => 'Arena Real',
        8 => 'Pico Congelado',
        9 => 'Selva',
        10 => 'Montanha Hog',
        11 => 'Vale Elétrico',
        12 => 'Cidade Assustadora',
        13 => 'Esconderijo dos Malvados',
        14 => 'Pico da Serenidade',
        15 => 'Arena Lendária',
        16 => 'Caminho do Lendário',
        17 => 'Arena de Desafiante I',
        18 => 'Arena de Desafiante II',
        19 => 'Arena de Desafiante III',
        20 => 'Arena de Mestre I',
        21 => 'Arena de Mestre II',
        // Arenas 22-24 são customizadas, mantemos os nomes
        22 => 'Reino Celestial',
        23 => 'Dimensão Cósmica',
        24 => 'Trono Supremo'
    ];

    echo "Atualizando nomes das arenas:\n";
    echo str_repeat("-", 70) . "\n\n";

    $totalAtualizados = 0;

    foreach ($arenasAtualizadas as $id => $novoNome) {
        // Buscar nome atual
        $arenaAtual = executeAdminQuery($pdo,
            "SELECT id, nome FROM arenas WHERE id = :id",
            [':id' => $id]
        );

        if (empty($arenaAtual)) {
            echo "Arena $id: NÃO ENCONTRADA no banco\n";
            continue;
        }

        $nomeAtual = $arenaAtual[0]['nome'];

        // Atualizar nome
        executeAdminQuery($pdo,
            "UPDATE arenas SET nome = :nome WHERE id = :id",
            [':nome' => $novoNome, ':id' => $id]
        );

        echo "Arena $id:\n";
        echo "  ANTES: $nomeAtual\n";
        echo "  DEPOIS: $novoNome\n";
        echo "  ✓ Atualizado\n\n";

        $totalAtualizados++;
    }

    // Verificação final
    echo str_repeat("=", 70) . "\n";
    echo "VERIFICAÇÃO FINAL:\n";
    echo str_repeat("=", 70) . "\n\n";

    $arenas = executeAdminQuery($pdo, "SELECT id, nome FROM arenas ORDER BY id");

    echo "Arenas atualizadas:\n";
    foreach ($arenas as $arena) {
        echo sprintf("  Arena %2d: %s\n", $arena['id'], $arena['nome']);
    }

    echo "\n" . str_repeat("=", 70) . "\n";
    echo "✓ Total de arenas atualizadas: $totalAtualizados\n";
    echo "✓ Nomes sincronizados com a última atualização do Clash Royale!\n";

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
