<?php
/**
 * Adicionar 6 Novas Bandeiras ao Banco de Dados
 */

require_once 'api/config_admin.php';

echo "=== Adicionando 6 Novas Bandeiras ===\n\n";

$pdo = getAdminDBConnection();

$bandeiras = [
    [
        'id' => 'laranja-xadrez',
        'nome' => 'Laranja Xadrez',
        'categoria' => 'Especiais',
        'raridade' => 'Raro',
        'icone' => 'laranja-xadrez.svg',
        'descricao' => 'Bandeira com padrão xadrez em tons vibrantes de laranja.',
        'requisito' => 'Disponível na loja de bandeiras',
        'historia' => 'Um padrão clássico que representa energia e entusiasmo em batalha.'
    ],
    [
        'id' => 'verde-xadrez',
        'nome' => 'Verde Xadrez',
        'categoria' => 'Especiais',
        'raridade' => 'Raro',
        'icone' => 'verde-xadrez.svg',
        'descricao' => 'Bandeira com padrão xadrez em tons de verde.',
        'requisito' => 'Disponível na loja de bandeiras',
        'historia' => 'Verde representa crescimento e vitória nas arenas do Clash Royale.'
    ],
    [
        'id' => 'roxo-xadrez',
        'nome' => 'Roxo Xadrez',
        'categoria' => 'Especiais',
        'raridade' => 'Épico',
        'icone' => 'roxo-xadrez.svg',
        'descricao' => 'Bandeira com padrão xadrez em tons de roxo real.',
        'requisito' => 'Disponível na loja de bandeiras',
        'historia' => 'O roxo simboliza a realeza e o poder dos grandes guerreiros.'
    ],
    [
        'id' => 'flechas',
        'nome' => 'Flechas',
        'categoria' => 'Vitórias',
        'raridade' => 'Comum',
        'icone' => 'flechas.svg',
        'descricao' => 'Bandeira decorada com flechas cruzadas, símbolo dos arqueiros.',
        'requisito' => 'Alcançar 100 vitórias com tropas de arqueiros',
        'historia' => 'Para aqueles que dominam a arte do arco e flecha.'
    ],
    [
        'id' => 'rock-psicodelico',
        'nome' => 'Rock Psicodélico',
        'categoria' => 'Especiais',
        'raridade' => 'Lendário',
        'icone' => 'rock-psicodelico.svg',
        'descricao' => 'Bandeira com padrões psicodélicos vibrantes e coloridos.',
        'requisito' => 'Evento especial de música',
        'historia' => 'Uma bandeira que celebra a energia e criatividade do rock psicodélico.'
    ],
    [
        'id' => 'crl-2025',
        'nome' => 'CRL 2025',
        'categoria' => 'Especiais',
        'raridade' => 'Lendário',
        'icone' => 'crl-2025.svg',
        'descricao' => 'Bandeira oficial do Clash Royale League 2025.',
        'requisito' => 'Participar ou assistir o CRL 2025',
        'historia' => 'Comemora a temporada 2025 da liga profissional de Clash Royale.'
    ]
];

$adicionados = 0;
$erros = 0;

foreach ($bandeiras as $b) {
    try {
        $query = "INSERT INTO bandeiras (id, nome, categoria, raridade, icone, descricao, requisito, historia)
                  VALUES (:id, :nome, :categoria, :raridade, :icone, :descricao, :requisito, :historia)";

        $stmt = $pdo->prepare($query);
        $result = $stmt->execute([
            ':id' => $b['id'],
            ':nome' => $b['nome'],
            ':categoria' => $b['categoria'],
            ':raridade' => $b['raridade'],
            ':icone' => $b['icone'],
            ':descricao' => $b['descricao'],
            ':requisito' => $b['requisito'],
            ':historia' => $b['historia']
        ]);

        if ($result) {
            echo "✓ Adicionado: {$b['nome']} ({$b['categoria']}, {$b['raridade']})\n";
            $adicionados++;
        }
    } catch (PDOException $e) {
        echo "✗ Erro ao adicionar {$b['nome']}: " . $e->getMessage() . "\n";
        $erros++;
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO:\n";
echo str_repeat('=', 70) . "\n";
echo "Bandeiras adicionadas: $adicionados\n";
echo "Erros: $erros\n";

// Verificar total
$query = "SELECT COUNT(*) as total FROM bandeiras";
$result = executeAdminQuery($pdo, $query);
$total = $result[0]['total'];

echo "Total de bandeiras no banco: $total\n";
echo "\n✓ Bandeiras adicionadas com sucesso!\n";
