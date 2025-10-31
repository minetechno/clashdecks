<?php
/**
 * Adicionar Emotes ao Banco de Dados
 */

require_once 'api/config_admin.php';

echo "=== Adicionando Emotes ao Clash Royale ===\n\n";

$pdo = getAdminDBConnection();

$emotes = [
    [
        'id' => 'danca-bebe-dragao',
        'nome' => 'Dança do Bebê Dragão',
        'categoria' => 'Dança',
        'raridade' => 'Épico',
        'icone' => 'danca-bebe-dragao.svg',
        'descricao' => 'O Bebê Dragão roxo dançando alegremente com movimentos animados.',
        'animacao' => 'O bebê dragão balança o corpo de um lado para o outro, mexe as asas e solta pequenas chamas enquanto dança.',
        'desbloqueio' => 'Disponível na loja de emotes'
    ],
    [
        'id' => 'danca-suina',
        'nome' => 'Dança Suína',
        'categoria' => 'Dança',
        'raridade' => 'Raro',
        'icone' => 'danca-suina.svg',
        'descricao' => 'O Porco Montado dançando com estilo.',
        'animacao' => 'O porco pula e gira enquanto o cavaleiro balança para os lados, celebrando a vitória.',
        'desbloqueio' => 'Arena 4'
    ],
    [
        'id' => 'goblin-chorao',
        'nome' => 'Goblin Chorão',
        'categoria' => 'Triste',
        'raridade' => 'Comum',
        'icone' => 'goblin-chorao.svg',
        'descricao' => 'Goblin verde chorando copiosamente.',
        'animacao' => 'O goblin esfrega os olhos com as mãos e lágrimas enormes caem continuamente.',
        'desbloqueio' => 'Arena 1'
    ],
    [
        'id' => 'rei-rindo',
        'nome' => 'Rei Rindo',
        'categoria' => 'Feliz',
        'raridade' => 'Lendário',
        'icone' => 'rei-rindo.svg',
        'descricao' => 'O Rei Vermelho dando gargalhadas.',
        'animacao' => 'O rei joga a cabeça para trás e ri alto, segurando a barriga.',
        'desbloqueio' => 'Emote clássico do jogo'
    ],
    [
        'id' => 'princesa-bocejando',
        'nome' => 'Princesa Bocejando',
        'categoria' => 'Provocação',
        'raridade' => 'Épico',
        'icone' => 'princesa-bocejando.svg',
        'descricao' => 'A Princesa bocejando de tédio.',
        'animacao' => 'A princesa abre a boca em um grande bocejo e cobre com a mão.',
        'desbloqueio' => 'Loja de emotes'
    ],
    [
        'id' => 'cavaleiro-saudando',
        'nome' => 'Cavaleiro Saudando',
        'categoria' => 'Respeito',
        'raridade' => 'Raro',
        'icone' => 'cavaleiro-saudando.svg',
        'descricao' => 'O Cavaleiro fazendo uma reverência respeitosa.',
        'animacao' => 'O cavaleiro tira o elmo, faz uma reverência elegante com a mão no peito.',
        'desbloqueio' => 'Arena 0'
    ],
    [
        'id' => 'bruxa-gargalhada',
        'nome' => 'Bruxa Gargalhada',
        'categoria' => 'Provocação',
        'raridade' => 'Épico',
        'icone' => 'bruxa-gargalhada.svg',
        'descricao' => 'A Bruxa dando uma gargalhada maligna.',
        'animacao' => 'A bruxa ri malignamente enquanto seus olhos brilham e ela aponta o dedo.',
        'desbloqueio' => 'Evento especial de Halloween'
    ],
    [
        'id' => 'pekka-borboleta',
        'nome' => 'P.E.K.K.A Borboleta',
        'categoria' => 'Feliz',
        'raridade' => 'Lendário',
        'icone' => 'pekka-borboleta.svg',
        'descricao' => 'P.E.K.K.A encantada com uma borboleta.',
        'animacao' => 'A P.E.K.K.A observa uma borboleta voando ao redor, movendo a cabeça seguindo o voo.',
        'desbloqueio' => 'Loja de emotes premium'
    ],
    [
        'id' => 'dragao-eletrico-zap',
        'nome' => 'Dragão Elétrico Zap',
        'categoria' => 'Provocação',
        'raridade' => 'Épico',
        'icone' => 'dragao-eletrico-zap.svg',
        'descricao' => 'Dragão Elétrico soltando raios.',
        'animacao' => 'O dragão elétrico carrega energia e solta um zap poderoso com faíscas ao redor.',
        'desbloqueio' => 'Arena 11'
    ],
    [
        'id' => 'esqueleto-dancando',
        'nome' => 'Esqueleto Dançando',
        'categoria' => 'Dança',
        'raridade' => 'Comum',
        'icone' => 'esqueleto-dancando.svg',
        'descricao' => 'Esqueleto fazendo uma dança engraçada.',
        'animacao' => 'O esqueleto dança balançando os ossos de forma descoordenada e cômica.',
        'desbloqueio' => 'Arena 2'
    ],
    [
        'id' => 'valquiria-grito',
        'nome' => 'Valquíria Grito de Guerra',
        'categoria' => 'Provocação',
        'raridade' => 'Raro',
        'icone' => 'valquiria-grito.svg',
        'descricao' => 'Valquíria soltando um grito de guerra.',
        'animacao' => 'A Valquíria levanta o machado e grita ferozmente, emanando ondas de choque.',
        'desbloqueio' => 'Arena 3'
    ],
    [
        'id' => 'mago-confuso',
        'nome' => 'Mago Confuso',
        'categoria' => 'Confuso',
        'raridade' => 'Comum',
        'icone' => 'mago-confuso.svg',
        'descricao' => 'Mago coçando a cabeça confuso.',
        'animacao' => 'O mago coça a cabeça com interrogações flutuando ao redor.',
        'desbloqueio' => 'Arena 5'
    ]
];

$adicionados = 0;
$erros = 0;

foreach ($emotes as $e) {
    try {
        $query = "INSERT INTO emotes (id, nome, categoria, raridade, icone, descricao, animacao, desbloqueio)
                  VALUES (:id, :nome, :categoria, :raridade, :icone, :descricao, :animacao, :desbloqueio)";

        $stmt = $pdo->prepare($query);
        $result = $stmt->execute([
            ':id' => $e['id'],
            ':nome' => $e['nome'],
            ':categoria' => $e['categoria'],
            ':raridade' => $e['raridade'],
            ':icone' => $e['icone'],
            ':descricao' => $e['descricao'],
            ':animacao' => $e['animacao'],
            ':desbloqueio' => $e['desbloqueio']
        ]);

        if ($result) {
            echo "✓ Adicionado: {$e['nome']} ({$e['categoria']}, {$e['raridade']})\n";
            $adicionados++;
        }
    } catch (PDOException $ex) {
        echo "✗ Erro ao adicionar {$e['nome']}: " . $ex->getMessage() . "\n";
        $erros++;
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO:\n";
echo str_repeat('=', 70) . "\n";
echo "Emotes adicionados: $adicionados\n";
echo "Erros: $erros\n";

// Verificar total
$query = "SELECT COUNT(*) as total FROM emotes";
$result = executeAdminQuery($pdo, $query);
$total = $result[0]['total'];

echo "Total de emotes no banco: $total\n";
echo "\n✓ Emotes adicionados com sucesso!\n";
