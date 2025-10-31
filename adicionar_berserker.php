<?php
/**
 * Adicionar Berserker com raridade correta
 */

require_once 'api/config_admin.php';

echo "=== Adicionando Berserker ===\n\n";

$pdo = getAdminDBConnection();

// Berserker como Lendário
$personagem = [
    'id' => 'berserker',
    'nome' => 'Berserker',
    'tipo' => 'Tropa',
    'raridade' => 'Lendário',
    'elixir' => 4,
    'arena_desbloqueio' => 16,
    'icone' => 'berserker.svg',
    'descricao' => 'Guerreiro furioso que entra em fúria, aumentando seu dano e velocidade de ataque.',
    'sinergias' => ['raiva', 'golem', 'gigante'],
    'counters' => ['mini-pekka', 'pekka', 'esqueletos']
];

try {
    $query = "INSERT INTO personagens (id, nome, tipo, raridade, elixir, arena_desbloqueio, icone, descricao, sinergias, counters)
              VALUES (:id, :nome, :tipo, :raridade, :elixir, :arena_desbloqueio, :icone, :descricao, :sinergias, :counters)";

    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([
        ':id' => $personagem['id'],
        ':nome' => $personagem['nome'],
        ':tipo' => $personagem['tipo'],
        ':raridade' => $personagem['raridade'],
        ':elixir' => $personagem['elixir'],
        ':arena_desbloqueio' => $personagem['arena_desbloqueio'],
        ':icone' => $personagem['icone'],
        ':descricao' => $personagem['descricao'],
        ':sinergias' => json_encode($personagem['sinergias']),
        ':counters' => json_encode($personagem['counters'])
    ]);

    if ($result) {
        echo "✓ Adicionado: {$personagem['nome']} ({$personagem['tipo']}, {$personagem['raridade']}, {$personagem['elixir']} elixir)\n";
    }
} catch (PDOException $e) {
    echo "✗ Erro ao adicionar {$personagem['nome']}: " . $e->getMessage() . "\n";
}

// Verificar total
$query = "SELECT COUNT(*) as total FROM personagens";
$result = executeAdminQuery($pdo, $query);
$total = $result[0]['total'];

echo "Total de personagens no banco: $total\n";
echo "\n✓ Berserker adicionado com sucesso!\n";
