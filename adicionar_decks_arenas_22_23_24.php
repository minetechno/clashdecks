<?php
/**
 * Adiciona decks para as arenas 22, 23 e 24 (Dificuldade: Difícil)
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Adicionando Decks para Arenas 22, 23, 24 ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // Decks para adicionar
    $novosDecks = [
        // ARENA 22 - Reino Celestial
        [
            'deck' => [
                'id' => 'deck_a22_of1',
                'nome' => 'Celestial Beatdown',
                'tipo' => 'Ofensivo',
                'arena_alvo' => 22,
                'notas' => 'Deck agressivo focado em pressão constante com Golem e suporte aéreo. Use o Dragão Elétrico para limpar defesas.',
                'media_elixir' => 4.1
            ],
            'cartas' => ['golem', 'dragao-eletrico', 'bruxa', 'mosqueteira', 'tornado', 'zap', 'esqueletos', 'goblins']
        ],
        [
            'deck' => [
                'id' => 'deck_a22_de1',
                'nome' => 'Celestial Defense',
                'tipo' => 'Defensivo',
                'arena_alvo' => 22,
                'notas' => 'Defesa sólida com Tesla e Tornado para controle. Use P.E.K.K.A para contra-ataques devastadores.',
                'media_elixir' => 3.9
            ],
            'cartas' => ['pekka', 'tesla', 'mago-de-gelo', 'eletrocutadores', 'tornado', 'veneno', 'esqueletos', 'golem-de-gelo']
        ],
        [
            'deck' => [
                'id' => 'deck_a22_hi1',
                'nome' => 'Celestial Control',
                'tipo' => 'Híbrido',
                'arena_alvo' => 22,
                'notas' => 'Controle versátil com múltiplas opções de ataque. Mineiro para chip damage e Bola de Fogo para suporte.',
                'media_elixir' => 3.7
            ],
            'cartas' => ['mineiro', 'valquiria', 'mosqueteira', 'torre-inferno', 'bola-de-fogo', 'zap', 'esqueletos', 'golem-de-gelo']
        ],

        // ARENA 23 - Dimensão Cósmica
        [
            'deck' => [
                'id' => 'deck_a23_of1',
                'nome' => 'Cosmic Assault',
                'tipo' => 'Ofensivo',
                'arena_alvo' => 23,
                'notas' => 'Ofensiva cósmica com Gigante de Elixir e múltiplas tropas de suporte. Overwhelming push power.',
                'media_elixir' => 4.3
            ],
            'cartas' => ['gigante-elixir', 'bruxa', 'dragao-eletrico', 'mosqueteira', 'tornado', 'zap', 'esqueletos', 'raio']
        ],
        [
            'deck' => [
                'id' => 'deck_a23_de1',
                'nome' => 'Cosmic Fortress',
                'tipo' => 'Defensivo',
                'arena_alvo' => 23,
                'notas' => 'Fortaleza cósmica com dupla defesa (Tesla + Torre Inferno). Foguete para cycle e finish.',
                'media_elixir' => 3.6
            ],
            'cartas' => ['torre-inferno', 'tesla', 'mago-de-gelo', 'cavaleiro', 'foguete', 'tornado', 'esqueletos', 'golem-de-gelo']
        ],
        [
            'deck' => [
                'id' => 'deck_a23_hi1',
                'nome' => 'Cosmic Hybrid',
                'tipo' => 'Híbrido',
                'arena_alvo' => 23,
                'notas' => 'Equilíbrio perfeito entre ataque e defesa. P.E.K.K.A como tanque e ameaça, com cycle rápido.',
                'media_elixir' => 3.8
            ],
            'cartas' => ['pekka', 'corredor', 'eletrocutadores', 'mosqueteira', 'zap', 'veneno', 'esqueletos', 'golem-de-gelo']
        ],

        // ARENA 24 - Trono Supremo (Arena Final)
        [
            'deck' => [
                'id' => 'deck_a24_of1',
                'nome' => 'Supreme Domination',
                'tipo' => 'Ofensivo',
                'arena_alvo' => 24,
                'notas' => 'Dominação suprema com Golem e suporte máximo. O deck mais poderoso para pushes imparáveis.',
                'media_elixir' => 4.4
            ],
            'cartas' => ['golem', 'bruxa', 'dragao-eletrico', 'mini-pekka', 'tornado', 'raio', 'esqueletos', 'goblins']
        ],
        [
            'deck' => [
                'id' => 'deck_a24_de1',
                'nome' => 'Supreme Bastion',
                'tipo' => 'Defensivo',
                'arena_alvo' => 24,
                'notas' => 'Bastião supremo com defesas impenetráveis. Contra-ataque com P.E.K.K.A após defender.',
                'media_elixir' => 4.0
            ],
            'cartas' => ['pekka', 'torre-inferno', 'mago-de-gelo', 'eletrocutadores', 'foguete', 'tornado', 'esqueletos', 'golem-de-gelo']
        ],
        [
            'deck' => [
                'id' => 'deck_a24_hi1',
                'nome' => 'Supreme Champion',
                'tipo' => 'Híbrido',
                'arena_alvo' => 24,
                'notas' => 'Deck de campeão supremo. Versatilidade máxima com múltiplas win conditions e controle total.',
                'media_elixir' => 3.9
            ],
            'cartas' => ['gigante-elixir', 'mineiro', 'mosqueteira', 'valquiria', 'veneno', 'zap', 'esqueletos', 'torre-inferno']
        ]
    ];

    $totalAdicionados = 0;
    $erros = 0;

    foreach ($novosDecks as $deckData) {
        $deck = $deckData['deck'];
        $cartas = $deckData['cartas'];

        echo "Adicionando deck: {$deck['nome']} (Arena {$deck['arena_alvo']}, {$deck['tipo']})...\n";

        try {
            inserirDeck($pdo, $deck, $cartas);
            echo "  ✓ Deck adicionado com sucesso!\n\n";
            $totalAdicionados++;
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                echo "  ⚠ Deck já existe no banco\n\n";
            } else {
                echo "  ✗ ERRO: " . $e->getMessage() . "\n\n";
                $erros++;
            }
        }
    }

    // Verificação final
    echo str_repeat("=", 70) . "\n";
    echo "RESUMO:\n";
    echo str_repeat("=", 70) . "\n";
    echo "Decks adicionados: $totalAdicionados\n";
    echo "Erros: $erros\n\n";

    // Estatísticas atualizadas
    $totalDecks = executeAdminQuery($pdo, "SELECT COUNT(*) as total FROM decks");
    echo "Total de decks no banco: " . $totalDecks[0]['total'] . "\n";

    // Verificar decks por arena
    $decksPorArena = executeAdminQuery($pdo,
        "SELECT arena_alvo, COUNT(*) as total
         FROM decks
         WHERE arena_alvo IN (22, 23, 24)
         GROUP BY arena_alvo
         ORDER BY arena_alvo"
    );

    echo "\nDecks nas novas arenas:\n";
    foreach ($decksPorArena as $stat) {
        echo "  Arena {$stat['arena_alvo']}: {$stat['total']} decks\n";
    }

    echo "\n✓ Decks adicionados com sucesso às arenas 22, 23, 24!\n";
    echo "✓ Todas as arenas agora possuem decks de dificuldade apropriada!\n";

} catch (Exception $e) {
    echo "\n✗ ERRO FATAL: " . $e->getMessage() . "\n";
    exit(1);
}
