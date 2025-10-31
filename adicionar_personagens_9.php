<?php
/**
 * Adicionar 9 Novos Personagens ao Banco de Dados
 */

require_once 'api/config_admin.php';

echo "=== Adicionando 9 Novos Personagens ===\n\n";

$pdo = getAdminDBConnection();

$personagens = [
    [
        'id' => 'pescador',
        'nome' => 'Pescador',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 3,
        'arena_desbloqueio' => 13,
        'icone' => 'pescador.svg',
        'descricao' => 'Pescador que puxa tropas inimigas com seu anzol, trazendo-as para perto.',
        'sinergias' => ['tornado', 'gigante', 'golem'],
        'counters' => ['mini-pekka', 'valquiria', 'cavaleiro']
    ],
    [
        'id' => 'bola-de-neve',
        'nome' => 'Bola de Neve',
        'tipo' => 'Feitiço',
        'raridade' => 'Comum',
        'elixir' => 2,
        'arena_desbloqueio' => 8,
        'icone' => 'bola-de-neve.svg',
        'descricao' => 'Bola de neve que causa dano médio e reduz a velocidade de ataque e movimento.',
        'sinergias' => ['porco-montado', 'balao', 'gigante'],
        'counters' => ['raio', 'veneno', 'foguete']
    ],
    [
        'id' => 'goblin-gigante',
        'nome' => 'Goblin Gigante',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 6,
        'arena_desbloqueio' => 8,
        'icone' => 'goblin-gigante.svg',
        'descricao' => 'Goblin enorme com escudo. Quando destruído, libera goblins lanceiros.',
        'sinergias' => ['goblins-lanceiros', 'raiva', 'congelar'],
        'counters' => ['mini-pekka', 'pekka', 'exercito-de-esqueletos']
    ],
    [
        'id' => 'esqueleto-gigante',
        'nome' => 'Esqueleto Gigante',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 6,
        'arena_desbloqueio' => 2,
        'icone' => 'esqueleto-gigante.svg',
        'descricao' => 'Esqueleto colossal que carrega uma bomba. Explode ao morrer causando dano massivo.',
        'sinergias' => ['clone', 'tornado', 'balao'],
        'counters' => ['mineiro', 'horda-de-servos', 'megacavaleiro']
    ],
    [
        'id' => 'megasservo',
        'nome' => 'Megasservo',
        'tipo' => 'Tropa',
        'raridade' => 'Raro',
        'elixir' => 3,
        'arena_desbloqueio' => 7,
        'icone' => 'megasservo.svg',
        'descricao' => 'Servo grandalhão com muito HP e dano. Ataca alvos terrestres e aéreos.',
        'sinergias' => ['horda-de-servos', 'balao', 'lavahound'],
        'counters' => ['megacavaleiro', 'mago-eletrico', 'flechas']
    ],
    [
        'id' => 'bebe-dragao',
        'nome' => 'Bebê Dragão',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 4,
        'arena_desbloqueio' => 0,
        'icone' => 'bebe-dragao.svg',
        'descricao' => 'Dragão jovem que cospe fogo em área. Voa e tem HP moderado.',
        'sinergias' => ['lavahound', 'balao', 'golem'],
        'counters' => ['megasservo', 'mago-eletrico', 'horda-de-servos']
    ],
    [
        'id' => 'dragoes-esqueletos',
        'nome' => 'Dragões Esqueletos',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 4,
        'arena_desbloqueio' => 7,
        'icone' => 'dragoes-esqueletos.svg',
        'descricao' => 'Dois dragões esqueletos voadores. Quando morrem, liberam bombas que causam dano em área.',
        'sinergias' => ['clone', 'espelho', 'raiva'],
        'counters' => ['flechas', 'mago-eletrico', 'tornado']
    ],
    [
        'id' => 'maquina-voadora',
        'nome' => 'Máquina Voadora',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 4,
        'arena_desbloqueio' => 6,
        'icone' => 'maquina-voadora.svg',
        'descricao' => 'Torre voadora que se move após destruída. Ataca tropas aéreas e terrestres.',
        'sinergias' => ['tesla', 'inferno', 'fornalha'],
        'counters' => ['terremoto', 'raio', 'foguete']
    ],
    [
        'id' => 'gelo',
        'nome' => 'Gelo',
        'tipo' => 'Feitiço',
        'raridade' => 'Raro',
        'elixir' => 1,
        'arena_desbloqueio' => 8,
        'icone' => 'gelo.svg',
        'descricao' => 'Congela tropas e construções em uma área por alguns segundos.',
        'sinergias' => ['balao', 'porco-montado', 'gigante'],
        'counters' => ['zap', 'prediction', 'tropas-rapidas']
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
