<?php
/**
 * Adicionar Novos Baús - ClashDecks
 */

require_once 'api/config_admin.php';

echo "=== Adicionando Novos Baús - ClashDecks ===\n\n";

try {
    $pdo = getAdminDBConnection();

    $novosBaus = [
        [
            'id' => 'bau-lendario',
            'nome' => 'Baú Lendário',
            'raridade' => 'Lendário',
            'ciclo' => null,
            'icone' => 'bau-lendario.svg',
            'descricao' => 'Baú especial que sempre contém pelo menos uma carta Lendária!',
            'ouro_min' => 800,
            'ouro_max' => 1200,
            'cartas_total' => 8,
            'recompensas' => [
                'cartas' => [
                    'Lendária' => '100% (1 garantida)',
                    'Épica' => '40%',
                    'Rara' => '30%',
                    'Comum' => '30%'
                ],
                'ouro' => '800-1200',
                'gemas' => '10-30'
            ]
        ],
        [
            'id' => 'bau-real',
            'nome' => 'Baú Real',
            'raridade' => 'Épico',
            'ciclo' => null,
            'icone' => 'bau-real.svg',
            'descricao' => 'Baú exclusivo para jogadores com Passe Royale.',
            'ouro_min' => 500,
            'ouro_max' => 800,
            'cartas_total' => 60,
            'recompensas' => [
                'cartas' => [
                    'Comum' => '60%',
                    'Rara' => '30%',
                    'Épica' => '8%',
                    'Lendária' => '2%'
                ],
                'ouro' => '500-800',
                'gemas' => '5-15'
            ]
        ],
        [
            'id' => 'bau-epico',
            'nome' => 'Baú Épico',
            'raridade' => 'Épico',
            'ciclo' => null,
            'icone' => 'bau-epico.svg',
            'descricao' => 'Baú que garante cartas Épicas.',
            'ouro_min' => 400,
            'ouro_max' => 700,
            'cartas_total' => 12,
            'recompensas' => [
                'cartas' => [
                    'Épica' => '100% (1 garantida)',
                    'Rara' => '50%',
                    'Comum' => '50%'
                ],
                'ouro' => '400-700',
                'gemas' => '3-10'
            ]
        ],
        [
            'id' => 'bau-de-temporada',
            'nome' => 'Baú de Temporada',
            'raridade' => 'Lendário',
            'ciclo' => null,
            'icone' => 'bau-de-temporada.svg',
            'descricao' => 'Baú especial disponível durante eventos de temporada.',
            'ouro_min' => 1000,
            'ouro_max' => 1500,
            'cartas_total' => 80,
            'recompensas' => [
                'cartas' => [
                    'Comum' => '55%',
                    'Rara' => '30%',
                    'Épica' => '12%',
                    'Lendária' => '3%'
                ],
                'ouro' => '1000-1500',
                'gemas' => '15-40',
                'extras' => 'Tokens de Troca, Cartas Selvagens'
            ]
        ],
        [
            'id' => 'bau-de-desafio',
            'nome' => 'Baú de Desafio',
            'raridade' => 'Épico',
            'ciclo' => null,
            'icone' => 'bau-de-desafio.svg',
            'descricao' => 'Recompensa ao completar desafios especiais.',
            'ouro_min' => 300,
            'ouro_max' => 600,
            'cartas_total' => 40,
            'recompensas' => [
                'cartas' => [
                    'Comum' => '60%',
                    'Rara' => '30%',
                    'Épica' => '8%',
                    'Lendária' => '2%'
                ],
                'ouro' => '300-600',
                'gemas' => '5-10'
            ]
        ],
        [
            'id' => 'bau-de-vitoria',
            'nome' => 'Baú de Vitória',
            'raridade' => 'Raro',
            'ciclo' => null,
            'icone' => 'bau-de-vitoria.svg',
            'descricao' => 'Baú conquistado ao vencer batalhas em série.',
            'ouro_min' => 200,
            'ouro_max' => 400,
            'cartas_total' => 25,
            'recompensas' => [
                'cartas' => [
                    'Comum' => '70%',
                    'Rara' => '25%',
                    'Épica' => '5%'
                ],
                'ouro' => '200-400',
                'gemas' => '0-5'
            ]
        ],
        [
            'id' => 'bau-de-guerra',
            'nome' => 'Baú de Guerra',
            'raridade' => 'Épico',
            'ciclo' => null,
            'icone' => 'bau-de-guerra.svg',
            'descricao' => 'Baú ganho ao participar de Guerras de Clãs.',
            'ouro_min' => 600,
            'ouro_max' => 900,
            'cartas_total' => 50,
            'recompensas' => [
                'cartas' => [
                    'Comum' => '55%',
                    'Rara' => '30%',
                    'Épica' => '12%',
                    'Lendária' => '3%'
                ],
                'ouro' => '600-900',
                'gemas' => '5-15'
            ]
        ],
        [
            'id' => 'bau-de-torneio',
            'nome' => 'Baú de Torneio',
            'raridade' => 'Lendário',
            'ciclo' => null,
            'icone' => 'bau-de-torneio.svg',
            'descricao' => 'Prêmio para vencedores de torneios.',
            'ouro_min' => 1500,
            'ouro_max' => 2000,
            'cartas_total' => 100,
            'recompensas' => [
                'cartas' => [
                    'Comum' => '50%',
                    'Rara' => '30%',
                    'Épica' => '15%',
                    'Lendária' => '5%'
                ],
                'ouro' => '1500-2000',
                'gemas' => '20-50'
            ]
        ]
    ];

    $totalAdicionados = 0;
    $totalErros = 0;

    foreach ($novosBaus as $bau) {
        echo "Adicionando: {$bau['nome']} ({$bau['raridade']})...\n";

        try {
            // Verifica se já existe
            $checkQuery = "SELECT COUNT(*) as count FROM baus WHERE id = :id";
            $checkStmt = $pdo->prepare($checkQuery);
            $checkStmt->execute([':id' => $bau['id']]);
            $exists = $checkStmt->fetch()['count'] > 0;

            if ($exists) {
                echo "  ⚠ Baú já existe, pulando...\n";
                continue;
            }

            $query = "INSERT INTO baus (id, nome, raridade, ciclo, icone, descricao, ouro_min, ouro_max, cartas_total, recompensas)
                      VALUES (:id, :nome, :raridade, :ciclo, :icone, :descricao, :ouro_min, :ouro_max, :cartas_total, :recompensas)";

            $params = [
                ':id' => $bau['id'],
                ':nome' => $bau['nome'],
                ':raridade' => $bau['raridade'],
                ':ciclo' => $bau['ciclo'],
                ':icone' => $bau['icone'],
                ':descricao' => $bau['descricao'],
                ':ouro_min' => $bau['ouro_min'],
                ':ouro_max' => $bau['ouro_max'],
                ':cartas_total' => $bau['cartas_total'],
                ':recompensas' => json_encode($bau['recompensas'])
            ];

            executeAdminQuery($pdo, $query, $params);
            echo "  ✓ Baú adicionado com sucesso!\n";
            $totalAdicionados++;
        } catch (Exception $e) {
            echo "  ✗ ERRO: " . $e->getMessage() . "\n";
            $totalErros++;
        }

        echo "\n";
    }

    // Verificação final
    $queryTotal = "SELECT COUNT(*) as total FROM baus";
    $totalBaus = executeAdminQuery($pdo, $queryTotal)[0]['total'];

    echo "======================================================================\n";
    echo "RESUMO:\n";
    echo "======================================================================\n";
    echo "Baús adicionados: $totalAdicionados\n";
    echo "Erros: $totalErros\n";
    echo "Total de baús no banco: $totalBaus\n";
    echo "\n✓ Novos baús adicionados com sucesso!\n";

} catch (Exception $e) {
    echo "ERRO FATAL: " . $e->getMessage() . "\n";
    exit(1);
}
