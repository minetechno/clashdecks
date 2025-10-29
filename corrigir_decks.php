<?php
/**
 * Corrige decks sem cartas no banco de dados
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Corrigindo Decks Vazios - ClashDecks ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // Definição das cartas para cada deck
    $decksCartas = [
        // ARENA 3
        'deck_a3_of1' => ['mago', 'gigante', 'mosqueteira', 'cavaleiro', 'flechas', 'zap', 'esqueletos', 'goblins'],
        'deck_a3_de1' => ['mago-de-gelo', 'valquiria', 'tesla', 'arqueiras', 'esqueletos', 'golem-de-gelo', 'flechas', 'zap'],
        'deck_a3_hi1' => ['mago', 'cavaleiro', 'arqueiras', 'mini-pekka', 'zap', 'flechas', 'esqueletos', 'goblins'],

        // ARENA 4
        'deck_a4_of1' => ['pekka', 'corredor', 'mosqueteira', 'eletrocutadores', 'zap', 'veneno', 'esqueletos', 'golem-de-gelo'],
        'deck_a4_de1' => ['torre-inferno', 'arqueiras', 'cavaleiro', 'esqueletos', 'golem-de-gelo', 'zap', 'flechas', 'tesla'],
        'deck_a4_hi1' => ['balao', 'lenhador', 'eletrocutadores', 'arqueiras', 'zap', 'flechas', 'esqueletos', 'golem-de-gelo'],

        // ARENA 5
        'deck_a5_of1' => ['golem', 'bruxa', 'mosqueteira', 'mini-pekka', 'zap', 'bola-de-fogo', 'esqueletos', 'golem-de-gelo'],
        'deck_a5_de1' => ['gigante', 'veneno', 'mosqueteira', 'valquiria', 'esqueletos', 'golem-de-gelo', 'zap', 'tesla'],
        'deck_a5_hi1' => ['golem', 'tornado', 'mosqueteira', 'mini-pekka', 'zap', 'veneno', 'esqueletos', 'goblins'],

        // ARENA 6
        'deck_a6_de1' => ['lenhador', 'balao', 'valquiria', 'mosqueteira', 'zap', 'bola-de-fogo', 'esqueletos', 'golem-de-gelo'],
        'deck_a6_hi1' => ['barril-de-goblins', 'gangue-de-goblins', 'princesa', 'cavaleiro', 'foguete', 'tronco', 'esqueletos', 'golem-de-gelo'],

        // ARENA 7
        'deck_a7_of1' => ['princesa', 'barril-de-goblins', 'gangue-de-goblins', 'cavaleiro', 'foguete', 'tronco', 'esqueletos', 'torre-inferno'],
        'deck_a7_de1' => ['princesa', 'tornado', 'cavaleiro', 'arqueiras', 'foguete', 'tronco', 'esqueletos', 'tesla'],
        'deck_a7_hi1' => ['montador-de-javali', 'princesa', 'valquiria', 'mosqueteira', 'zap', 'bola-de-fogo', 'esqueletos', 'canhao'],

        // ARENA 8
        'deck_a8_of1' => ['mineiro', 'veneno', 'valquiria', 'mosqueteira', 'esqueletos', 'golem-de-gelo', 'zap', 'bola-de-fogo'],
        'deck_a8_de1' => ['mago-de-gelo', 'tornado', 'cavaleiro', 'arqueiras', 'foguete', 'tronco', 'esqueletos', 'tesla'],
        'deck_a8_hi1' => ['montador-de-javali', 'mago-de-gelo', 'valquiria', 'mosqueteira', 'zap', 'bola-de-fogo', 'esqueletos', 'canhao'],

        // ARENA 9
        'deck_a9_of1' => ['gangue-de-goblins', 'barril-de-goblins', 'princesa', 'cavaleiro', 'foguete', 'tronco', 'esqueletos', 'torre-inferno'],
        'deck_a9_de1' => ['jaula-do-goblin', 'tornado', 'cavaleiro', 'arqueiras', 'foguete', 'tronco', 'esqueletos', 'tesla'],
        'deck_a9_hi1' => ['montador-de-javali', 'gangue-de-goblins', 'valquiria', 'mosqueteira', 'zap', 'bola-de-fogo', 'esqueletos', 'canhao'],

        // ARENA 10
        'deck_a10_of1' => ['mineiro', 'veneno', 'valquiria', 'mosqueteira', 'esqueletos', 'golem-de-gelo', 'zap', 'torre-inferno'],
        'deck_a10_de1' => ['cura', 'esqueletos', 'goblins', 'cavaleiro', 'arqueiras', 'zap', 'flechas', 'tesla'],
        'deck_a10_hi1' => ['mineiro', 'barril-de-goblins', 'gangue-de-goblins', 'valquiria', 'veneno', 'tronco', 'esqueletos', 'torre-inferno'],

        // ARENA 11
        'deck_a11_of1' => ['dragao-eletrico', 'golem', 'bruxa', 'mini-pekka', 'zap', 'tornado', 'esqueletos', 'goblins'],
        'deck_a11_de1' => ['eletrocutadores', 'tornado', 'cavaleiro', 'arqueiras', 'foguete', 'tronco', 'esqueletos', 'tesla'],
        'deck_a11_hi1' => ['dragao-eletrico', 'montador-de-javali', 'valquiria', 'mosqueteira', 'zap', 'bola-de-fogo', 'esqueletos', 'tornado'],

        // ARENA 12
        'deck_a12_of1' => ['barbaros-de-elite', 'montador-de-javali', 'valquiria', 'mosqueteira', 'zap', 'bola-de-fogo', 'esqueletos', 'golem-de-gelo'],
        'deck_a12_de1' => ['gigante-elixir', 'tornado', 'cavaleiro', 'arqueiras', 'foguete', 'tronco', 'esqueletos', 'tesla'],
        'deck_a12_hi1' => ['barbaros-de-elite', 'corredor', 'mosqueteira', 'valquiria', 'zap', 'bola-de-fogo', 'esqueletos', 'golem-de-gelo'],

        // ARENA 13
        'deck_a13_of1' => ['pekka', 'corredor', 'mosqueteira', 'eletrocutadores', 'zap', 'veneno', 'esqueletos', 'golem-de-gelo'],
        'deck_a13_de1' => ['tornado', 'cavaleiro', 'arqueiras', 'mago-de-gelo', 'foguete', 'tronco', 'esqueletos', 'tesla'],
        'deck_a13_hi1' => ['mineiro', 'veneno', 'valquiria', 'mosqueteira', 'esqueletos', 'golem-de-gelo', 'zap', 'torre-inferno'],

        // ARENA 14
        'deck_a14_of1' => ['balao', 'lenhador', 'eletrocutadores', 'arqueiras', 'zap', 'flechas', 'esqueletos', 'golem-de-gelo'],
        'deck_a14_de1' => ['pekka', 'eletrocutadores', 'mosqueteira', 'mago-de-gelo', 'zap', 'veneno', 'esqueletos', 'torre-inferno'],
        'deck_a14_hi1' => ['pekka', 'corredor', 'mosqueteira', 'eletrocutadores', 'zap', 'veneno', 'esqueletos', 'golem-de-gelo'],

        // ARENA 15
        'deck_a15_of1' => ['montador-de-javali', 'valquiria', 'mosqueteira', 'canhao', 'zap', 'bola-de-fogo', 'esqueletos', 'golem-de-gelo'],
        'deck_a15_de1' => ['tesla', 'cavaleiro', 'arqueiras', 'mago-de-gelo', 'foguete', 'tronco', 'esqueletos', 'golem-de-gelo'],
        'deck_a15_hi1' => ['mineiro', 'veneno', 'valquiria', 'mosqueteira', 'esqueletos', 'golem-de-gelo', 'zap', 'torre-inferno'],

        // ARENA 16
        'deck_a16_of1' => ['lenhador', 'balao', 'eletrocutadores', 'arqueiras', 'zap', 'bola-de-fogo', 'esqueletos', 'golem-de-gelo'],
        'deck_a16_de1' => ['golem', 'tornado', 'bruxa', 'mini-pekka', 'zap', 'veneno', 'esqueletos', 'goblins'],
        'deck_a16_hi1' => ['golem', 'bruxa', 'mosqueteira', 'mini-pekka', 'zap', 'bola-de-fogo', 'esqueletos', 'tornado'],

        // ARENA 17
        'deck_a17_of1' => ['montador-de-javali', 'valquiria', 'mosqueteira', 'canhao', 'zap', 'bola-de-fogo', 'esqueletos', 'golem-de-gelo'],
        'deck_a17_de1' => ['foguete', 'tornado', 'cavaleiro', 'arqueiras', 'mago-de-gelo', 'tronco', 'esqueletos', 'tesla'],
        'deck_a17_hi1' => ['montador-de-javali', 'valquiria', 'mosqueteira', 'eletrocutadores', 'zap', 'bola-de-fogo', 'esqueletos', 'canhao'],

        // ARENA 18
        'deck_a18_of1' => ['gigante-elixir', 'bruxa', 'mosqueteira', 'mini-pekka', 'zap', 'tornado', 'esqueletos', 'goblins'],
        'deck_a18_de1' => ['pekka', 'eletrocutadores', 'mosqueteira', 'mago-de-gelo', 'zap', 'veneno', 'esqueletos', 'torre-inferno'],
        'deck_a18_hi1' => ['montador-de-javali', 'valquiria', 'mosqueteira', 'canhao', 'zap', 'bola-de-fogo', 'esqueletos', 'golem-de-gelo'],

        // ARENA 19
        'deck_a19_of1' => ['barril-de-goblins', 'gangue-de-goblins', 'princesa', 'cavaleiro', 'foguete', 'tronco', 'esqueletos', 'torre-inferno'],
        'deck_a19_de1' => ['tesla', 'mago-de-gelo', 'cavaleiro', 'arqueiras', 'foguete', 'tronco', 'esqueletos', 'tornado'],
        'deck_a19_hi1' => ['mineiro', 'veneno', 'valquiria', 'mosqueteira', 'esqueletos', 'golem-de-gelo', 'zap', 'torre-inferno'],

        // ARENA 20
        'deck_a20_of1' => ['gigante-elixir', 'bruxa', 'mosqueteira', 'mini-pekka', 'zap', 'tornado', 'esqueletos', 'raio'],
        'deck_a20_de1' => ['pekka', 'eletrocutadores', 'mosqueteira', 'mago-de-gelo', 'zap', 'veneno', 'esqueletos', 'torre-inferno'],
        'deck_a20_hi1' => ['golem', 'bruxa', 'mosqueteira', 'mini-pekka', 'zap', 'tornado', 'esqueletos', 'goblins'],

        // ARENA 21
        'deck_a21_of1' => ['barril-de-goblins', 'gangue-de-goblins', 'princesa', 'cavaleiro', 'foguete', 'tronco', 'esqueletos', 'torre-inferno'],
        'deck_a21_de1' => ['pekka', 'eletrocutadores', 'mosqueteira', 'mago-de-gelo', 'zap', 'veneno', 'esqueletos', 'torre-inferno'],
        'deck_a21_hi1' => ['golem', 'bruxa', 'mosqueteira', 'mini-pekka', 'zap', 'tornado', 'dragao-eletrico', 'raio'],
    ];

    $total = 0;
    $erros = 0;

    foreach ($decksCartas as $deckId => $cartas) {
        echo "Corrigindo deck: $deckId\n";

        try {
            // Remove cartas antigas (se houver)
            executeAdminQuery($pdo,
                "DELETE FROM deck_cartas WHERE deck_id = :deck_id",
                [':deck_id' => $deckId]
            );

            // Insere as 8 cartas
            foreach ($cartas as $posicao => $personagemId) {
                $query = "INSERT INTO deck_cartas (deck_id, personagem_id, posicao)
                         VALUES (:deck_id, :personagem_id, :posicao)";

                executeAdminQuery($pdo, $query, [
                    ':deck_id' => $deckId,
                    ':personagem_id' => $personagemId,
                    ':posicao' => $posicao + 1
                ]);
            }

            echo "  ✓ 8 cartas adicionadas\n";
            $total++;

        } catch (Exception $e) {
            echo "  ✗ ERRO: " . $e->getMessage() . "\n";
            $erros++;
        }
    }

    echo "\n" . str_repeat("=", 60) . "\n";
    echo "✓ Correção concluída!\n";
    echo "  Decks corrigidos: $total\n";
    echo "  Erros: $erros\n\n";

    // Verificação final
    $result = executeAdminQuery($pdo,
        "SELECT COUNT(*) as total FROM decks d
         LEFT JOIN deck_cartas dc ON d.id = dc.deck_id
         GROUP BY d.id
         HAVING COUNT(dc.personagem_id) < 8"
    );

    if (empty($result)) {
        echo "✓ SUCESSO: Todos os decks possuem 8 cartas!\n";
    } else {
        echo "✗ ATENÇÃO: Ainda há decks com problemas\n";
    }

} catch (Exception $e) {
    echo "\n✗ ERRO FATAL: " . $e->getMessage() . "\n";
    exit(1);
}
