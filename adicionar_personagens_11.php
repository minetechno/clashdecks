<?php
/**
 * Adicionar 11 Novos Personagens ao Banco de Dados
 */

require_once 'api/config_admin.php';

echo "=== Adicionando 11 Novos Personagens ===\n\n";

$pdo = getAdminDBConnection();

$personagens = [
    [
        'id' => 'porcos-reais',
        'nome' => 'Porcos Reais',
        'tipo' => 'Tropa',
        'raridade' => 'Raro',
        'elixir' => 5,
        'arena_desbloqueio' => 9,
        'icone' => 'porcos-reais.svg',
        'descricao' => 'Quatro porcos selvagens com armadura que atacam construções inimigas.',
        'sinergias' => ['congelar', 'raio', 'prediction-log'],
        'counters' => ['valquiria', 'megacavaleiro', 'bomba-gigante']
    ],
    [
        'id' => 'berserker',
        'nome' => 'Berserker',
        'tipo' => 'Tropa',
        'raridade' => 'Campeão',
        'elixir' => 4,
        'arena_desbloqueio' => 16,
        'icone' => 'berserker.svg',
        'descricao' => 'Guerreiro furioso que entra em fúria, aumentando seu dano e velocidade de ataque.',
        'sinergias' => ['raiva', 'golem', 'gigante'],
        'counters' => ['mini-pekka', 'pekka', 'esqueletos']
    ],
    [
        'id' => 'lapide',
        'nome' => 'Lápide',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 3,
        'arena_desbloqueio' => 2,
        'icone' => 'lapide.svg',
        'descricao' => 'Gera esqueletos continuamente. Quando destruída, invoca mais esqueletos.',
        'sinergias' => ['balao', 'porco-montado', 'gigante'],
        'counters' => ['veneno', 'terremoto', 'raio']
    ],
    [
        'id' => 'bombardeiro',
        'nome' => 'Bombardeiro',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 2,
        'arena_desbloqueio' => 0,
        'icone' => 'bombardeiro.svg',
        'descricao' => 'Lança bombas que causam dano em área, mas tem pouca vida.',
        'sinergias' => ['cavaleiro', 'gigante', 'golem'],
        'counters' => ['flechas', 'o-tronco', 'zap']
    ],
    [
        'id' => 'torres-de-bombas',
        'nome' => 'Torres de Bombas',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 4,
        'arena_desbloqueio' => 6,
        'icone' => 'torres-de-bombas.svg',
        'descricao' => 'Torre defensiva que lança bombas causando dano em área.',
        'sinergias' => ['veneno', 'mago-de-gelo', 'tornado'],
        'counters' => ['terremoto', 'raio', 'mineiro']
    ],
    [
        'id' => 'coletor-de-elixir',
        'nome' => 'Coletor de Elixir',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 6,
        'arena_desbloqueio' => 6,
        'icone' => 'coletor-de-elixir.svg',
        'descricao' => 'Produz elixir durante o tempo de vida. Investimento de longo prazo.',
        'sinergias' => ['tres-mosqueteiras', 'golem', 'pekka'],
        'counters' => ['mineiro', 'foguete', 'raio']
    ],
    [
        'id' => 'barril-de-esqueletos',
        'nome' => 'Barril de Esqueletos',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 3,
        'arena_desbloqueio' => 6,
        'icone' => 'barril-de-esqueletos.svg',
        'descricao' => 'Barril voador que libera esqueletos ao atingir o alvo.',
        'sinergias' => ['clone', 'congelar', 'raiva'],
        'counters' => ['zap', 'flechas', 'o-tronco']
    ],
    [
        'id' => 'carrinho-de-canhao',
        'nome' => 'Carrinho de Canhão',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 5,
        'arena_desbloqueio' => 6,
        'icone' => 'carrinho-de-canhao.svg',
        'descricao' => 'Canhão móvel com escudo. Quando o escudo quebra, continua como canhão.',
        'sinergias' => ['raiva', 'congelar', 'tornado'],
        'counters' => ['mini-pekka', 'esqueletos', 'horda-de-servos']
    ],
    [
        'id' => 'gigante-real',
        'nome' => 'Gigante Real',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 6,
        'arena_desbloqueio' => 7,
        'icone' => 'gigante-real.svg',
        'descricao' => 'Gigante com ataque de longo alcance que ataca construções e torres.',
        'sinergias' => ['curadora', 'pescador', 'tornado'],
        'counters' => ['mini-pekka', 'pekka', 'inferno']
    ],
    [
        'id' => 'goblins-lanceiros',
        'nome' => 'Goblins Lanceiros',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 2,
        'arena_desbloqueio' => 1,
        'icone' => 'goblins-lanceiros.svg',
        'descricao' => 'Três goblins que atacam de longe com lanças. Alvos terrestres e aéreos.',
        'sinergias' => ['espelho', 'clone', 'raiva'],
        'counters' => ['flechas', 'o-tronco', 'zap']
    ],
    [
        'id' => 'patifes',
        'nome' => 'Patifes',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 5,
        'arena_desbloqueio' => 9,
        'icone' => 'patifes.svg',
        'descricao' => 'Grupo de três: um menino tanque e duas meninas arqueiras.',
        'sinergias' => ['porco-montado', 'balao', 'carneiro'],
        'counters' => ['bola-de-fogo', 'valquiria', 'megacavaleiro']
    ]
];

$adicionados = 0;
$erros = 0;

foreach ($personagens as $p) {
    try {
        $query = "INSERT INTO personagens (id, nome, tipo, raridade, elixir, arena_desbloqueio, icone, descricao, sinergias, counters)
                  VALUES (:id, :nome, :tipo, :raridade, :elixir, :arena_desbloqueio, :icone, :descricao, :sinergias, :counters)";

        $stmt = $pdo->prepare($query);
        $result = $stmt->execute([
            ':id' => $p['id'],
            ':nome' => $p['nome'],
            ':tipo' => $p['tipo'],
            ':raridade' => $p['raridade'],
            ':elixir' => $p['elixir'],
            ':arena_desbloqueio' => $p['arena_desbloqueio'],
            ':icone' => $p['icone'],
            ':descricao' => $p['descricao'],
            ':sinergias' => json_encode($p['sinergias']),
            ':counters' => json_encode($p['counters'])
        ]);

        if ($result) {
            echo "✓ Adicionado: {$p['nome']} ({$p['tipo']}, {$p['raridade']}, {$p['elixir']} elixir)\n";
            $adicionados++;
        }
    } catch (PDOException $e) {
        echo "✗ Erro ao adicionar {$p['nome']}: " . $e->getMessage() . "\n";
        $erros++;
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO:\n";
echo str_repeat('=', 70) . "\n";
echo "Personagens adicionados: $adicionados\n";
echo "Erros: $erros\n";

// Verificar total
$query = "SELECT COUNT(*) as total FROM personagens";
$result = executeAdminQuery($pdo, $query);
$total = $result[0]['total'];

echo "Total de personagens no banco: $total\n";
echo "\n✓ Personagens adicionados com sucesso!\n";
