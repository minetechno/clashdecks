<?php
/**
 * Adicionar 8 Novos Personagens ao Banco de Dados
 */

require_once 'api/config_admin.php';

echo "=== Adicionando 8 Novos Personagens ===\n\n";

$pdo = getAdminDBConnection();

$personagens = [
    [
        'id' => 'sparky',
        'nome' => 'Sparky',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 6,
        'arena_desbloqueio' => 6,
        'icone' => 'sparky.svg',
        'descricao' => 'Canhão elétrico sobre rodas que dispara raios devastadores, mas demora para recarregar.',
        'sinergias' => ['gigante', 'golem', 'tornado'],
        'counters' => ['exercito-de-esqueletos', 'horda-de-servos', 'foguete']
    ],
    [
        'id' => 'destruidores-de-muros',
        'nome' => 'Destruidores de Muros',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 2,
        'arena_desbloqueio' => 5,
        'icone' => 'destruidores-de-muros.svg',
        'descricao' => 'Cinco goblins com bombas que correm direto para as construções inimigas.',
        'sinergias' => ['porco-montado', 'balao', 'prediction-log'],
        'counters' => ['flechas', 'o-tronco', 'valquiria']
    ],
    [
        'id' => 'lava-hound',
        'nome' => 'Lava Hound',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 7,
        'arena_desbloqueio' => 4,
        'icone' => 'lava-hound.svg',
        'descricao' => 'Tanque aéreo de lava. Ao morrer, explode em Filhotes de Lava.',
        'sinergias' => ['balao', 'bebe-dragao', 'megasservo'],
        'counters' => ['mago-eletrico', 'inferno', 'horda-de-servos']
    ],
    [
        'id' => 'morcegos',
        'nome' => 'Morcegos',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 2,
        'arena_desbloqueio' => 5,
        'icone' => 'morcegos.svg',
        'descricao' => 'Enxame de morcegos voadores que atacam em grupo com alta velocidade.',
        'sinergias' => ['lava-hound', 'clone', 'espelho'],
        'counters' => ['zap', 'flechas', 'veneno']
    ],
    [
        'id' => 'espirito-curador',
        'nome' => 'Espírito Curador',
        'tipo' => 'Tropa',
        'raridade' => 'Raro',
        'elixir' => 1,
        'arena_desbloqueio' => 10,
        'icone' => 'espirito-curador.svg',
        'descricao' => 'Espírito que voa até os aliados e cura em área ao explodir.',
        'sinergias' => ['golem', 'gigante', 'porcos-reais'],
        'counters' => ['flechas', 'zap', 'prediction']
    ],
    [
        'id' => 'lancador',
        'nome' => 'Lançador',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 3,
        'arena_desbloqueio' => 10,
        'icone' => 'lancador.svg',
        'descricao' => 'Lança pedras que causam dano em área. Tem longo alcance mas HP baixo.',
        'sinergias' => ['cavaleiro', 'gigante', 'golem'],
        'counters' => ['flechas', 'o-tronco', 'bola-de-fogo']
    ],
    [
        'id' => 'ariete-de-batalha',
        'nome' => 'Ariete de Batalha',
        'tipo' => 'Tropa',
        'raridade' => 'Raro',
        'elixir' => 4,
        'arena_desbloqueio' => 12,
        'icone' => 'ariete-de-batalha.svg',
        'descricao' => 'Ariete poderoso com dois bárbaros. Causa dano massivo a construções.',
        'sinergias' => ['raiva', 'congelar', 'prediction-log'],
        'counters' => ['mini-pekka', 'pekka', 'inferno']
    ],
    [
        'id' => 'arqueiro-magico',
        'nome' => 'Arqueiro Mágico',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 4,
        'arena_desbloqueio' => 12,
        'icone' => 'arqueiro-magico.svg',
        'descricao' => 'Arqueiro que dispara flechas mágicas que atravessam os alvos.',
        'sinergias' => ['gigante', 'golem', 'tornado'],
        'counters' => ['mini-pekka', 'cavaleiro', 'raio']
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
