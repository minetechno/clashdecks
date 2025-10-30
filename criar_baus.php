<?php
/**
 * Cria tabela de baús e insere dados
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Criando Sistema de Baús - ClashDecks ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // 1. Criar tabela de baús
    echo "1. Criando tabela 'baus'...\n";

    $sqlCreateTable = "
    CREATE TABLE IF NOT EXISTS baus (
        id VARCHAR(50) PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        raridade VARCHAR(20) NOT NULL,
        ciclo INT DEFAULT NULL,
        icone VARCHAR(100) NOT NULL,
        descricao TEXT,
        ouro_min INT DEFAULT 0,
        ouro_max INT DEFAULT 0,
        cartas_total INT DEFAULT 0,
        recompensas JSON,
        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ";

    $pdo->exec($sqlCreateTable);
    echo "  ✓ Tabela 'baus' criada\n\n";

    // 2. Inserir dados dos baús
    echo "2. Inserindo dados dos baús...\n";

    $baus = [
        // Baús do Ciclo
        [
            'id' => 'bau-prata',
            'nome' => 'Baú de Prata',
            'raridade' => 'Comum',
            'ciclo' => 1,
            'icone' => 'bau-prata.svg',
            'descricao' => 'Baú comum que aparece a cada vitória no ciclo de baús.',
            'ouro_min' => 18,
            'ouro_max' => 102,
            'cartas_total' => 19,
            'recompensas' => json_encode([
                'cartas' => [
                    'Comum' => '70%',
                    'Rara' => '27%',
                    'Épica' => '3%'
                ],
                'ouro' => '18-102',
                'gemas' => '0-2'
            ])
        ],
        [
            'id' => 'bau-ouro',
            'nome' => 'Baú de Ouro',
            'raridade' => 'Raro',
            'ciclo' => 2,
            'icone' => 'bau-ouro.svg',
            'descricao' => 'Baú raro com mais cartas e ouro que o Baú de Prata.',
            'ouro_min' => 82,
            'ouro_max' => 470,
            'cartas_total' => 57,
            'recompensas' => json_encode([
                'cartas' => [
                    'Comum' => '68%',
                    'Rara' => '29%',
                    'Épica' => '3%'
                ],
                'ouro' => '82-470',
                'gemas' => '0-5'
            ])
        ],
        [
            'id' => 'bau-gigante',
            'nome' => 'Baú Gigante',
            'raridade' => 'Épico',
            'ciclo' => 3,
            'icone' => 'bau-gigante.svg',
            'descricao' => 'Baú grande que contém muitas cartas e recursos.',
            'ouro_min' => 260,
            'ouro_max' => 1484,
            'cartas_total' => 180,
            'recompensas' => json_encode([
                'cartas' => [
                    'Comum' => '67%',
                    'Rara' => '30%',
                    'Épica' => '3%'
                ],
                'ouro' => '260-1484',
                'gemas' => '0-10'
            ])
        ],
        [
            'id' => 'bau-magico',
            'nome' => 'Baú Mágico',
            'raridade' => 'Épico',
            'ciclo' => 4,
            'icone' => 'bau-magico.svg',
            'descricao' => 'Baú mágico garantido a cada ciclo de baús.',
            'ouro_min' => 416,
            'ouro_max' => 2374,
            'cartas_total' => 114,
            'recompensas' => json_encode([
                'cartas' => [
                    'Comum' => '65%',
                    'Rara' => '30%',
                    'Épica' => '5%'
                ],
                'ouro' => '416-2374',
                'gemas' => '5-15'
            ])
        ],

        // Baús Especiais
        [
            'id' => 'bau-relampago',
            'nome' => 'Baú do Relâmpago',
            'raridade' => 'Lendário',
            'ciclo' => null,
            'icone' => 'bau-relampago.svg',
            'descricao' => 'Baú encontrado ao acaso com recursos incríveis e carta Lendária garantida!',
            'ouro_min' => 3000,
            'ouro_max' => 6000,
            'cartas_total' => 20,
            'recompensas' => json_encode([
                'cartas' => [
                    'Lendária' => '100% (1 carta)',
                    'Épica' => '18 cartas',
                    'Rara' => '1 carta'
                ],
                'ouro' => '3000-6000',
                'gemas' => '10-20'
            ])
        ],
        [
            'id' => 'bau-rei',
            'nome' => 'Baú do Rei',
            'raridade' => 'Lendário',
            'ciclo' => null,
            'icone' => 'bau-rei.svg',
            'descricao' => 'Baú especial ganho ao fazer doações à clan. Contém cartas e ouro generosos.',
            'ouro_min' => 500,
            'ouro_max' => 2500,
            'cartas_total' => 25,
            'recompensas' => json_encode([
                'cartas' => [
                    'Comum' => '60%',
                    'Rara' => '35%',
                    'Épica' => '5%'
                ],
                'ouro' => '500-2500',
                'gemas' => '5-10'
            ])
        ],
        [
            'id' => 'bau-destino',
            'nome' => 'Baú do Destino',
            'raridade' => 'Lendário',
            'ciclo' => null,
            'icone' => 'bau-destino.svg',
            'descricao' => 'Baú especial disponível na loja que permite escolher uma carta Lendária!',
            'ouro_min' => 0,
            'ouro_max' => 0,
            'cartas_total' => 1,
            'recompensas' => json_encode([
                'cartas' => [
                    'Lendária' => '100% (escolha)'
                ],
                'ouro' => '0',
                'gemas' => 'Comprado com gemas'
            ])
        ],
        [
            'id' => 'bau-mega-relampago',
            'nome' => 'Baú Mega Relâmpago',
            'raridade' => 'Lendário',
            'ciclo' => null,
            'icone' => 'bau-mega-relampago.svg',
            'descricao' => 'Versão melhorada do Baú do Relâmpago com 2 cartas Lendárias garantidas!',
            'ouro_min' => 6000,
            'ouro_max' => 10000,
            'cartas_total' => 40,
            'recompensas' => json_encode([
                'cartas' => [
                    'Lendária' => '100% (2 cartas)',
                    'Épica' => '35 cartas',
                    'Rara' => '3 cartas'
                ],
                'ouro' => '6000-10000',
                'gemas' => '20-40'
            ])
        ],
        [
            'id' => 'bau-coroa',
            'nome' => 'Baú da Coroa',
            'raridade' => 'Épico',
            'ciclo' => null,
            'icone' => 'bau-coroa.svg',
            'descricao' => 'Baú obtido ao coletar 10 coroas em batalhas.',
            'ouro_min' => 200,
            'ouro_max' => 1200,
            'cartas_total' => 90,
            'recompensas' => json_encode([
                'cartas' => [
                    'Comum' => '68%',
                    'Rara' => '29%',
                    'Épica' => '3%'
                ],
                'ouro' => '200-1200',
                'gemas' => '0-5'
            ])
        ],
        [
            'id' => 'bau-clan',
            'nome' => 'Baú do Clã',
            'raridade' => 'Épico',
            'ciclo' => null,
            'icone' => 'bau-clan.svg',
            'descricao' => 'Baú obtido através de batalhas e doações no clã.',
            'ouro_min' => 300,
            'ouro_max' => 1800,
            'cartas_total' => 50,
            'recompensas' => json_encode([
                'cartas' => [
                    'Comum' => '65%',
                    'Rara' => '32%',
                    'Épica' => '3%'
                ],
                'ouro' => '300-1800',
                'gemas' => '0-8'
            ])
        ]
    ];

    foreach ($baus as $bau) {
        $query = "INSERT INTO baus (id, nome, raridade, ciclo, icone, descricao, ouro_min, ouro_max, cartas_total, recompensas)
                  VALUES (:id, :nome, :raridade, :ciclo, :icone, :descricao, :ouro_min, :ouro_max, :cartas_total, :recompensas)";

        executeAdminQuery($pdo, $query, [
            ':id' => $bau['id'],
            ':nome' => $bau['nome'],
            ':raridade' => $bau['raridade'],
            ':ciclo' => $bau['ciclo'],
            ':icone' => $bau['icone'],
            ':descricao' => $bau['descricao'],
            ':ouro_min' => $bau['ouro_min'],
            ':ouro_max' => $bau['ouro_max'],
            ':cartas_total' => $bau['cartas_total'],
            ':recompensas' => $bau['recompensas']
        ]);

        echo "  ✓ {$bau['nome']} adicionado\n";
    }

    // 3. Verificação
    echo "\n" . str_repeat("=", 70) . "\n";
    echo "VERIFICAÇÃO:\n";
    echo str_repeat("=", 70) . "\n";

    $total = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM baus");
    echo "Total de baús cadastrados: " . $total[0]['total'] . "\n\n";

    $bausLista = executeAdminQuery($pdo, "SELECT id, nome, raridade FROM baus ORDER BY raridade, nome");
    foreach ($bausLista as $bau) {
        echo "  • {$bau['nome']} ({$bau['raridade']})\n";
    }

    echo "\n✓ Sistema de baús criado com sucesso!\n";

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
