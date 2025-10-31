<?php
/**
 * Adicionar Personagens Extras - ClashDecks
 * Espírito Elétrico, Servos, Goblin com Dardos, Três Mosqueteiras,
 * Curadora Guerreira, Morteiro, Recrutas Reais, Exército de Esqueletos
 */

require_once 'api/config_admin.php';

echo "=== Adicionando Personagens Extras - ClashDecks ===\n\n";

try {
    $pdo = getAdminDBConnection();

    $novosPersonagens = [
        // TROPAS
        [
            'id' => 'espirito-eletrico',
            'nome' => 'Espírito Elétrico',
            'tipo' => 'Tropa',
            'raridade' => 'Comum',
            'elixir' => 1,
            'arena_desbloqueio' => 11,
            'icone' => 'espirito-eletrico.svg',
            'descricao' => 'Espírito pequeno e rápido que causa dano elétrico em área ao colidir.',
            'sinergias' => ['eletrocutadores', 'dragao-eletrico', 'mago-eletrico'],
            'counters' => ['zap', 'flechas', 'o-tronco']
        ],
        [
            'id' => 'servos',
            'nome' => 'Servos',
            'tipo' => 'Tropa',
            'raridade' => 'Comum',
            'elixir' => 1,
            'arena_desbloqueio' => 9,
            'icone' => 'servos.svg',
            'descricao' => 'Três servos pequenos, rápidos e fracos, mas muito baratos.',
            'sinergias' => ['gigante', 'golem', 'corredor'],
            'counters' => ['valquiria', 'bola-de-fogo', 'zap']
        ],
        [
            'id' => 'goblin-com-dardos',
            'nome' => 'Goblin com Dardos',
            'tipo' => 'Tropa',
            'raridade' => 'Comum',
            'elixir' => 3,
            'arena_desbloqueio' => 1,
            'icone' => 'goblin-com-dardos.svg',
            'descricao' => 'Goblins que atiram dardos de longa distância.',
            'sinergias' => ['gangue-de-goblins', 'barril-de-goblins', 'cabana-de-goblins'],
            'counters' => ['flechas', 'bola-de-fogo', 'valquiria']
        ],
        [
            'id' => 'tres-mosqueteiras',
            'nome' => 'Três Mosqueteiras',
            'tipo' => 'Tropa',
            'raridade' => 'Raro',
            'elixir' => 9,
            'arena_desbloqueio' => 7,
            'icone' => 'tres-mosqueteiras.svg',
            'descricao' => 'Três Mosqueteiras poderosas, versão premium de uma carta por vez.',
            'sinergias' => ['gigante', 'cavaleiro', 'golem'],
            'counters' => ['bola-de-fogo', 'raio', 'foguete']
        ],
        [
            'id' => 'curadora-guerreira',
            'nome' => 'Curadora Guerreira',
            'tipo' => 'Tropa',
            'raridade' => 'Raro',
            'elixir' => 4,
            'arena_desbloqueio' => 7,
            'icone' => 'curadora-guerreira.svg',
            'descricao' => 'Guerreira que cura tropas aliadas próximas enquanto ataca.',
            'sinergias' => ['golem', 'gigante', 'pekka'],
            'counters' => ['mini-pekka', 'raio', 'foguete']
        ],
        [
            'id' => 'recrutas-reais',
            'nome' => 'Recrutas Reais',
            'tipo' => 'Tropa',
            'raridade' => 'Comum',
            'elixir' => 7,
            'arena_desbloqueio' => 7,
            'icone' => 'recrutas-reais.svg',
            'descricao' => 'Seis recrutas com escudos que absorvem muito dano.',
            'sinergias' => ['corredor', 'mineiro', 'cavaleiro'],
            'counters' => ['bola-de-fogo', 'veneno', 'valquiria']
        ],
        [
            'id' => 'exercito-de-esqueletos',
            'nome' => 'Exército de Esqueletos',
            'tipo' => 'Tropa',
            'raridade' => 'Épico',
            'elixir' => 3,
            'arena_desbloqueio' => 0,
            'icone' => 'exercito-de-esqueletos.svg',
            'descricao' => 'Invoca um exército de 15 esqueletos para sobrecarregar o inimigo.',
            'sinergias' => ['gigante', 'balao', 'golem'],
            'counters' => ['zap', 'flechas', 'o-tronco', 'bola-de-fogo', 'valquiria']
        ],

        // CONSTRUÇÃO
        [
            'id' => 'morteiro',
            'nome' => 'Morteiro',
            'tipo' => 'Construção',
            'raridade' => 'Comum',
            'elixir' => 4,
            'arena_desbloqueio' => 6,
            'icone' => 'morteiro.svg',
            'descricao' => 'Construção de longo alcance que dispara projéteis explosivos.',
            'sinergias' => ['cavaleiro', 'arqueiras', 'tesla'],
            'counters' => ['terremoto', 'raio', 'foguete']
        ]
    ];

    $totalAdicionados = 0;
    $totalErros = 0;

    foreach ($novosPersonagens as $personagem) {
        echo "Adicionando: {$personagem['nome']} ({$personagem['tipo']}, {$personagem['raridade']})...\n";

        try {
            // Verifica se já existe
            $checkQuery = "SELECT COUNT(*) as count FROM personagens WHERE id = :id";
            $checkStmt = $pdo->prepare($checkQuery);
            $checkStmt->execute([':id' => $personagem['id']]);
            $exists = $checkStmt->fetch()['count'] > 0;

            if ($exists) {
                echo "  ⚠ Personagem já existe, pulando...\n";
                continue;
            }

            inserirPersonagem($pdo, $personagem);
            echo "  ✓ Personagem adicionado com sucesso!\n";
            $totalAdicionados++;
        } catch (Exception $e) {
            echo "  ✗ ERRO: " . $e->getMessage() . "\n";
            $totalErros++;
        }

        echo "\n";
    }

    // Verificação final
    $queryTotal = "SELECT COUNT(*) as total FROM personagens";
    $totalPersonagens = executeAdminQuery($pdo, $queryTotal)[0]['total'];

    echo "======================================================================\n";
    echo "RESUMO:\n";
    echo "======================================================================\n";
    echo "Personagens adicionados: $totalAdicionados\n";
    echo "Erros: $totalErros\n";
    echo "Total de personagens no banco: $totalPersonagens\n";
    echo "\n✓ Novos personagens adicionados com sucesso!\n";

} catch (Exception $e) {
    echo "ERRO FATAL: " . $e->getMessage() . "\n";
    exit(1);
}
