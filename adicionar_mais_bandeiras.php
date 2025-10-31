<?php
/**
 * Script para adicionar mais bandeiras ao banco de dados
 * Adicionando 19 novas bandeiras (de 16 para 35 total)
 */

$conn = new mysqli('localhost', 'root', '', 'clashdecks', 3307);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

echo "=== ADICIONANDO MAIS BANDEIRAS ===\n\n";

// Novas bandeiras a serem adicionadas
$bandeiras = [
    // VITÓRIAS
    [
        'id' => 'vitorias-perfeitas',
        'nome' => 'Vitórias Perfeitas',
        'categoria' => 'Vitórias',
        'raridade' => 'Lendário',
        'icone' => 'vitorias-perfeitas.svg',
        'descricao' => 'Conquistada após 100 vitórias sem perder torres',
        'requisito' => '100 vitórias perfeitas',
        'historia' => 'O símbolo da perfeição absoluta em batalha'
    ],
    [
        'id' => 'mestre-invencivel',
        'nome' => 'Mestre Invencível',
        'categoria' => 'Vitórias',
        'raridade' => 'Lendário',
        'icone' => 'mestre-invencivel.svg',
        'descricao' => '500 vitórias consecutivas',
        'requisito' => '500 vitórias',
        'historia' => 'A lenda que nunca cai'
    ],
    [
        'id' => 'coroa-de-ouro',
        'nome' => 'Coroa de Ouro',
        'categoria' => 'Vitórias',
        'raridade' => 'Épico',
        'icone' => 'coroa-de-ouro.svg',
        'descricao' => 'Ganhe 1000 coroas',
        'requisito' => '1000 coroas',
        'historia' => 'O rei das coroas douradas'
    ],
    [
        'id' => 'maestria-total',
        'nome' => 'Maestria Total',
        'categoria' => 'Vitórias',
        'raridade' => 'Lendário',
        'icone' => 'maestria-total.svg',
        'descricao' => 'Vença com todos os decks',
        'requisito' => '100 vitórias com decks diferentes',
        'historia' => 'O mestre de todas as estratégias'
    ],

    // GUERRAS
    [
        'id' => 'general-supremo',
        'nome' => 'General Supremo',
        'categoria' => 'Guerras',
        'raridade' => 'Lendário',
        'icone' => 'general-supremo.svg',
        'descricao' => 'Lidere seu clã a 100 vitórias em guerras',
        'requisito' => '100 vitórias de guerra',
        'historia' => 'O líder nato de exércitos'
    ],
    [
        'id' => 'heroi-guerra',
        'nome' => 'Herói de Guerra',
        'categoria' => 'Guerras',
        'raridade' => 'Épico',
        'icone' => 'heroi-guerra.svg',
        'descricao' => 'Ganhe 50 batalhas de guerra',
        'requisito' => '50 vitórias em guerra',
        'historia' => 'O campeão do campo de batalha'
    ],
    [
        'id' => 'comandante-elite',
        'nome' => 'Comandante Elite',
        'categoria' => 'Guerras',
        'raridade' => 'Épico',
        'icone' => 'comandante-elite.svg',
        'descricao' => 'Participe de 200 guerras de clã',
        'requisito' => '200 guerras',
        'historia' => 'O veterano das guerras de clã'
    ],
    [
        'id' => 'destruidor-imperios',
        'nome' => 'Destruidor de Impérios',
        'categoria' => 'Guerras',
        'raridade' => 'Lendário',
        'icone' => 'destruidor-imperios.svg',
        'descricao' => 'Destrua 1000 torres em guerras',
        'requisito' => '1000 torres destruídas',
        'historia' => 'Nenhuma fortaleza resiste a ele'
    ],

    // ESPECIAIS
    [
        'id' => 'phoenix-imortal',
        'nome' => 'Fênix Imortal',
        'categoria' => 'Especiais',
        'raridade' => 'Lendário',
        'icone' => 'phoenix-imortal.svg',
        'descricao' => 'Volte do fundo do poço 50 vezes',
        'requisito' => '50 comebacks',
        'historia' => 'Daqueles que sempre ressurgem das cinzas'
    ],
    [
        'id' => 'mestre-elixir',
        'nome' => 'Mestre do Elixir',
        'categoria' => 'Especiais',
        'raridade' => 'Épico',
        'icone' => 'mestre-elixir.svg',
        'descricao' => 'Gerencie elixir perfeitamente em 100 partidas',
        'requisito' => '100 partidas com gestão perfeita',
        'historia' => 'O alquimista do campo de batalha'
    ],
    [
        'id' => 'campeao-eterno',
        'nome' => 'Campeão Eterno',
        'categoria' => 'Especiais',
        'raridade' => 'Lendário',
        'icone' => 'campeao-eterno.svg',
        'descricao' => 'Alcance a Arena 24 e mantenha-se lá por 1 ano',
        'requisito' => '1 ano na Arena 24',
        'historia' => 'O imortal do topo'
    ],
    [
        'id' => 'colecionador-lendas',
        'nome' => 'Colecionador de Lendas',
        'categoria' => 'Especiais',
        'raridade' => 'Lendário',
        'icone' => 'colecionador-lendas.svg',
        'descricao' => 'Tenha todas as cartas lendárias no nível máximo',
        'requisito' => 'Todas lendárias nível 14',
        'historia' => 'O mestre das lendas'
    ],
    [
        'id' => 'guardiao-reino',
        'nome' => 'Guardião do Reino',
        'categoria' => 'Especiais',
        'raridade' => 'Épico',
        'icone' => 'guardiao-reino.svg',
        'descricao' => 'Defenda seu território 500 vezes',
        'requisito' => '500 defesas bem-sucedidas',
        'historia' => 'O protetor incansável'
    ],
    [
        'id' => 'arquiteto-decks',
        'nome' => 'Arquiteto de Decks',
        'categoria' => 'Especiais',
        'raridade' => 'Épico',
        'icone' => 'arquiteto-decks.svg',
        'descricao' => 'Crie 50 decks únicos vencedores',
        'requisito' => '50 decks com vitórias',
        'historia' => 'O gênio estrategista'
    ],
    [
        'id' => 'senhor-tempo',
        'nome' => 'Senhor do Tempo',
        'categoria' => 'Especiais',
        'raridade' => 'Lendário',
        'icone' => 'senhor-tempo.svg',
        'descricao' => 'Vença partidas no último segundo 100 vezes',
        'requisito' => '100 vitórias no último segundo',
        'historia' => 'O mestre dos momentos decisivos'
    ],
    [
        'id' => 'destruidor-torres',
        'nome' => 'Destruidor de Torres',
        'categoria' => 'Vitórias',
        'raridade' => 'Épico',
        'icone' => 'destruidor-torres.svg',
        'descricao' => 'Destrua 5000 torres',
        'requisito' => '5000 torres destruídas',
        'historia' => 'Terror das fortificações'
    ],
    [
        'id' => 'gladiador',
        'nome' => 'Gladiador',
        'categoria' => 'Vitórias',
        'raridade' => 'Raro',
        'icone' => 'gladiador.svg',
        'descricao' => 'Vença 200 desafios',
        'requisito' => '200 vitórias em desafios',
        'historia' => 'O guerreiro da arena'
    ],
    [
        'id' => 'conquistador',
        'nome' => 'Conquistador',
        'categoria' => 'Guerras',
        'raridade' => 'Raro',
        'icone' => 'conquistador.svg',
        'descricao' => 'Conquiste todas as arenas',
        'requisito' => 'Desbloqueie Arena 24',
        'historia' => 'O dominador de reinos'
    ],
    [
        'id' => 'lenda-viva',
        'nome' => 'Lenda Viva',
        'categoria' => 'Especiais',
        'raridade' => 'Lendário',
        'icone' => 'lenda-viva.svg',
        'descricao' => 'Seja top 1 global por 1 mês',
        'requisito' => 'Top 1 global por 30 dias',
        'historia' => 'A lenda definitiva'
    ]
];

$stmt = $conn->prepare("INSERT INTO bandeiras (id, nome, categoria, raridade, icone, descricao, requisito, historia) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE nome = VALUES(nome), categoria = VALUES(categoria), raridade = VALUES(raridade), icone = VALUES(icone), descricao = VALUES(descricao), requisito = VALUES(requisito), historia = VALUES(historia)");

$sucesso = 0;
$erro = 0;

foreach ($bandeiras as $b) {
    $stmt->bind_param(
        'ssssssss',
        $b['id'],
        $b['nome'],
        $b['categoria'],
        $b['raridade'],
        $b['icone'],
        $b['descricao'],
        $b['requisito'],
        $b['historia']
    );

    if ($stmt->execute()) {
        echo "✓ {$b['nome']} ({$b['categoria']} - {$b['raridade']}) adicionada com sucesso!\n";
        $sucesso++;
    } else {
        echo "✗ Erro ao adicionar {$b['nome']}: " . $stmt->error . "\n";
        $erro++;
    }
}

echo "\n=== RESUMO ===\n";
echo "✓ Sucesso: $sucesso bandeiras\n";
echo "✗ Erros: $erro bandeiras\n";

echo "\n=== TOTAL DE BANDEIRAS ===\n";
$result = $conn->query("SELECT COUNT(*) as total FROM bandeiras");
$total = $result->fetch_assoc()['total'];
echo "Total de bandeiras cadastradas: $total\n";

echo "\n=== BANDEIRAS POR CATEGORIA ===\n";
$result = $conn->query("SELECT categoria, COUNT(*) as total FROM bandeiras GROUP BY categoria ORDER BY categoria");
while ($row = $result->fetch_assoc()) {
    echo "{$row['categoria']}: {$row['total']} bandeiras\n";
}

$stmt->close();
$conn->close();

echo "\n✓ Script concluído!\n";
