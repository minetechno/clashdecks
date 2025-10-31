<?php
/**
 * Adicionar Novos Personagens - ClashDecks
 * Adiciona personagens importantes que faltam no catálogo
 */

require_once 'api/config_admin.php';

echo "=== Adicionando Novos Personagens - ClashDecks ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // Lista de novos personagens a adicionar
    $novosPersonagens = [
        // FEITIÇOS
        [
            'id' => 'espelho',
            'nome' => 'Espelho',
            'tipo' => 'Feitiço',
            'raridade' => 'Épico',
            'elixir' => 1,
            'arena_desbloqueio' => 7,
            'icone' => 'espelho.svg',
            'descricao' => 'Duplica a última carta jogada, com o custo de elixir da carta duplicada +1.',
            'sinergias' => ['barril-de-goblins', 'bola-de-fogo', 'mineiro'],
            'counters' => []
        ],
        [
            'id' => 'clone',
            'nome' => 'Clone',
            'tipo' => 'Feitiço',
            'raridade' => 'Épico',
            'elixir' => 3,
            'arena_desbloqueio' => 8,
            'icone' => 'clone.svg',
            'descricao' => 'Duplica todas as tropas amigas na área. Clones têm HP reduzido.',
            'sinergias' => ['balao', 'lenhador', 'gigante'],
            'counters' => ['flechas', 'zap', 'bola-de-fogo']
        ],
        [
            'id' => 'congelar',
            'nome' => 'Congelar',
            'tipo' => 'Feitiço',
            'raridade' => 'Épico',
            'elixir' => 4,
            'arena_desbloqueio' => 8,
            'icone' => 'congelar.svg',
            'descricao' => 'Congela todas as tropas e construções inimigas na área por 4 segundos.',
            'sinergias' => ['balao', 'montador-de-javali', 'gigante'],
            'counters' => []
        ],
        [
            'id' => 'terremoto',
            'nome' => 'Terremoto',
            'tipo' => 'Feitiço',
            'raridade' => 'Raro',
            'elixir' => 3,
            'arena_desbloqueio' => 6,
            'icone' => 'terremoto.svg',
            'descricao' => 'Causa dano constante a construções inimigas e torres na área.',
            'sinergias' => ['montador-de-javali', 'mineiro', 'cavaleiro'],
            'counters' => []
        ],
        [
            'id' => 'furia',
            'nome' => 'Fúria',
            'tipo' => 'Feitiço',
            'raridade' => 'Épico',
            'elixir' => 2,
            'arena_desbloqueio' => 8,
            'icone' => 'furia.svg',
            'descricao' => 'Aumenta a velocidade de movimento e ataque das tropas na área.',
            'sinergias' => ['balao', 'mini-pekka', 'gigante'],
            'counters' => ['tornado', 'bola-de-fogo']
        ],
        [
            'id' => 'raiva',
            'nome' => 'Raiva',
            'tipo' => 'Feitiço',
            'raridade' => 'Épico',
            'elixir' => 2,
            'arena_desbloqueio' => 10,
            'icone' => 'raiva.svg',
            'descricao' => 'Aumenta muito o dano das tropas na área mas elas perdem HP gradualmente.',
            'sinergias' => ['pekka', 'gigante', 'golem'],
            'counters' => ['raio', 'foguete']
        ],

        // TROPAS
        [
            'id' => 'megacavaleiro',
            'nome' => 'Megacavaleiro',
            'tipo' => 'Tropa',
            'raridade' => 'Lendário',
            'elixir' => 7,
            'arena_desbloqueio' => 7,
            'icone' => 'megacavaleiro.svg',
            'descricao' => 'Cavaleiro poderoso que salta sobre o rio e causa dano em área ao aterrissar.',
            'sinergias' => ['mago', 'eletrocutadores', 'bruxa'],
            'counters' => ['mini-pekka', 'pekka', 'jaula-do-goblin']
        ],
        [
            'id' => 'executor',
            'nome' => 'Executor',
            'tipo' => 'Tropa',
            'raridade' => 'Épico',
            'elixir' => 5,
            'arena_desbloqueio' => 9,
            'icone' => 'executor.svg',
            'descricao' => 'Guerreiro que arremessa um machado que atinge múltiplos alvos em linha.',
            'sinergias' => ['tornado', 'gigante', 'golem'],
            'counters' => ['mini-pekka', 'cavaleiro', 'valquiria']
        ],
        [
            'id' => 'bandit',
            'nome' => 'Bandit',
            'tipo' => 'Tropa',
            'raridade' => 'Lendário',
            'elixir' => 3,
            'arena_desbloqueio' => 9,
            'icone' => 'bandit.svg',
            'descricao' => 'Ladina rápida que dá uma investida contra o alvo, ficando invencível.',
            'sinergias' => ['barril-de-goblins', 'mineiro', 'corredor'],
            'counters' => ['valquiria', 'eletrocutadores', 'o-tronco']
        ],
        [
            'id' => 'pescador',
            'nome' => 'Pescador',
            'tipo' => 'Tropa',
            'raridade' => 'Lendário',
            'elixir' => 3,
            'arena_desbloqueio' => 8,
            'icone' => 'pescador.svg',
            'descricao' => 'Puxa tropas inimigas para perto de si com sua vara de pescar.',
            'sinergias' => ['torre-inferno', 'tesla', 'valquiria'],
            'counters' => ['mini-pekka', 'cavaleiro']
        ],
        [
            'id' => 'mae-bruxa',
            'nome' => 'Mãe Bruxa',
            'tipo' => 'Tropa',
            'raridade' => 'Lendário',
            'elixir' => 4,
            'arena_desbloqueio' => 9,
            'icone' => 'mae-bruxa.svg',
            'descricao' => 'Bruxa poderosa que amaldiçoa tropas, transformando-as em porcos ao morrerem.',
            'sinergias' => ['gigante', 'golem', 'cavaleiro'],
            'counters' => ['raio', 'foguete', 'mini-pekka']
        ],
        [
            'id' => 'bruxa-noturna',
            'nome' => 'Bruxa Noturna',
            'tipo' => 'Tropa',
            'raridade' => 'Lendário',
            'elixir' => 4,
            'arena_desbloqueio' => 8,
            'icone' => 'bruxa-noturna.svg',
            'descricao' => 'Bruxa voadora que invoca morcegos e cura tropas aliadas próximas.',
            'sinergias' => ['golem', 'gigante', 'balao'],
            'counters' => ['eletrocutadores', 'mago', 'flechas']
        ],
        [
            'id' => 'eletrogigante',
            'nome' => 'Eletrogigante',
            'tipo' => 'Tropa',
            'raridade' => 'Épico',
            'elixir' => 8,
            'arena_desbloqueio' => 11,
            'icone' => 'eletrogigante.svg',
            'descricao' => 'Gigante que reflete dano elétrico para tropas próximas que o atacam.',
            'sinergias' => ['tornado', 'bruxa', 'dragao-eletrico'],
            'counters' => ['mini-pekka', 'pekka', 'jaula-do-goblin']
        ],
        [
            'id' => 'guardas',
            'nome' => 'Guardas',
            'tipo' => 'Tropa',
            'raridade' => 'Épico',
            'elixir' => 3,
            'arena_desbloqueio' => 7,
            'icone' => 'guardas.svg',
            'descricao' => 'Três guerreiros com escudos que absorvem dano antes do HP.',
            'sinergias' => ['barril-de-goblins', 'princesa', 'mineiro'],
            'counters' => ['valquiria', 'bola-de-fogo', 'veneno']
        ],

        // CONSTRUÇÕES
        [
            'id' => 'fornalha',
            'nome' => 'Fornalha',
            'tipo' => 'Construção',
            'raridade' => 'Raro',
            'elixir' => 4,
            'arena_desbloqueio' => 5,
            'icone' => 'fornalha.svg',
            'descricao' => 'Construção que gera Espíritos de Fogo periodicamente.',
            'sinergias' => ['gigante', 'golem', 'montador-de-javali'],
            'counters' => ['terremoto', 'raio', 'foguete']
        ],
        [
            'id' => 'bomba-gigante',
            'nome' => 'Bomba Gigante',
            'tipo' => 'Construção',
            'raridade' => 'Épico',
            'elixir' => 4,
            'arena_desbloqueio' => 8,
            'icone' => 'bomba-gigante.svg',
            'descricao' => 'Bomba que rola até a torre inimiga e explode causando dano massivo.',
            'sinergias' => ['tornado', 'goblins', 'esqueletos'],
            'counters' => ['bola-de-fogo', 'eletrocutadores', 'valquiria']
        ],
        [
            'id' => 'cabana-de-goblins',
            'nome' => 'Cabana de Goblins',
            'tipo' => 'Construção',
            'raridade' => 'Raro',
            'elixir' => 5,
            'arena_desbloqueio' => 1,
            'icone' => 'cabana-de-goblins.svg',
            'descricao' => 'Construção que gera Goblins com Lanças periodicamente.',
            'sinergias' => ['gigante', 'golem', 'corredor'],
            'counters' => ['terremoto', 'bola-de-fogo', 'raio']
        ],
        [
            'id' => 'tumulo',
            'nome' => 'Túmulo',
            'tipo' => 'Construção',
            'raridade' => 'Raro',
            'elixir' => 3,
            'arena_desbloqueio' => 2,
            'icone' => 'tumulo.svg',
            'descricao' => 'Construção que gera Esqueletos periodicamente.',
            'sinergias' => ['gigante', 'golem', 'balao'],
            'counters' => ['terremoto', 'bola-de-fogo', 'zap']
        ],
        [
            'id' => 'xbesta',
            'nome' => 'X-Besta',
            'tipo' => 'Construção',
            'raridade' => 'Épico',
            'elixir' => 6,
            'arena_desbloqueio' => 3,
            'icone' => 'xbesta.svg',
            'descricao' => 'Besta poderosa que atira flechas poderosas a longa distância.',
            'sinergias' => ['tesla', 'torre-inferno', 'canhao'],
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
