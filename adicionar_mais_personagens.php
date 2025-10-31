<?php
/**
 * Script para adicionar mais personagens ao banco de dados
 * Adicionando 45 novos personagens (de 40 para 85 total)
 */

$conn = new mysqli('localhost', 'root', '', 'clashdecks', 3307);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

echo "=== ADICIONANDO MAIS PERSONAGENS ===\n\n";

// Novos personagens a serem adicionados
$personagens = [
    // TROPAS COMUNS
    [
        'id' => 'lanceiros',
        'nome' => 'Lanceiros',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 2,
        'arena_desbloqueio' => 1,
        'icone' => 'lanceiros.svg',
        'descricao' => 'Três lanceiros que atacam rapidamente tropas terrestres.',
        'sinergias' => json_encode(['gigante', 'principe']),
        'counters' => json_encode(['valquiria', 'veneno'])
    ],
    [
        'id' => 'minions',
        'nome' => 'Minions',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 3,
        'arena_desbloqueio' => 1,
        'icone' => 'minions.svg',
        'descricao' => 'Três criaturas voadoras que atacam do céu.',
        'sinergias' => json_encode(['balao', 'lava-hound']),
        'counters' => json_encode(['flechas', 'zap'])
    ],
    [
        'id' => 'horda-minions',
        'nome' => 'Horda de Minions',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 5,
        'arena_desbloqueio' => 4,
        'icone' => 'horda-minions.svg',
        'descricao' => 'Seis criaturas voadoras que causam muito dano.',
        'sinergias' => json_encode(['lava-hound', 'clone']),
        'counters' => json_encode(['flechas', 'mago'])
    ],
    [
        'id' => 'duendes',
        'nome' => 'Duendes',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 2,
        'arena_desbloqueio' => 1,
        'icone' => 'duendes.svg',
        'descricao' => 'Três duendes rápidos que causam muito dano.',
        'sinergias' => json_encode(['espelho', 'clone']),
        'counters' => json_encode(['zap', 'tronco'])
    ],
    [
        'id' => 'barbaros',
        'nome' => 'Bárbaros',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 5,
        'arena_desbloqueio' => 3,
        'icone' => 'barbaros.svg',
        'descricao' => 'Cinco bárbaros muito fortes e resistentes.',
        'sinergias' => json_encode(['furia', 'espelho']),
        'counters' => json_encode(['veneno', 'valquiria'])
    ],
    [
        'id' => 'megacavaleiro',
        'nome' => 'Mega Cavaleiro',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 7,
        'arena_desbloqueio' => 7,
        'icone' => 'megacavaleiro.svg',
        'descricao' => 'Cavaleiro pesado que causa dano em área ao pular.',
        'sinergias' => json_encode(['morcegos', 'iscas']),
        'counters' => json_encode(['mini-pekka', 'principe'])
    ],
    [
        'id' => 'berserker',
        'nome' => 'Berserker',
        'tipo' => 'Tropa',
        'raridade' => 'Raro',
        'elixir' => 2,
        'arena_desbloqueio' => 2,
        'icone' => 'berserker.svg',
        'descricao' => 'Guerreira furiosa que ataca rapidamente.',
        'sinergias' => json_encode(['furia', 'curar']),
        'counters' => json_encode(['cavaleiro', 'valquiria'])
    ],

    // FEITIÇOS
    [
        'id' => 'furia',
        'nome' => 'Fúria',
        'tipo' => 'Feitiço',
        'raridade' => 'Épico',
        'elixir' => 2,
        'arena_desbloqueio' => 3,
        'icone' => 'furia.svg',
        'descricao' => 'Aumenta velocidade de movimento e ataque das tropas.',
        'sinergias' => json_encode(['balao', 'minions']),
        'counters' => json_encode(['zap', 'tronco'])
    ],
    [
        'id' => 'espelho',
        'nome' => 'Espelho',
        'tipo' => 'Feitiço',
        'raridade' => 'Épico',
        'elixir' => 1,
        'arena_desbloqueio' => 5,
        'icone' => 'espelho.svg',
        'descricao' => 'Repete a carta anterior jogada com +1 de nível.',
        'sinergias' => json_encode(['porco', 'barril']),
        'counters' => json_encode([])
    ],
    [
        'id' => 'clone',
        'nome' => 'Clone',
        'tipo' => 'Feitiço',
        'raridade' => 'Épico',
        'elixir' => 3,
        'arena_desbloqueio' => 8,
        'icone' => 'clone.svg',
        'descricao' => 'Clona tropas em uma área com 1 HP.',
        'sinergias' => json_encode(['balao', 'lava-hound']),
        'counters' => json_encode(['zap', 'flechas'])
    ],
    [
        'id' => 'congelar',
        'nome' => 'Congelar',
        'tipo' => 'Feitiço',
        'raridade' => 'Épico',
        'elixir' => 4,
        'arena_desbloqueio' => 4,
        'icone' => 'congelar.svg',
        'descricao' => 'Congela tropas e construções por alguns segundos.',
        'sinergias' => json_encode(['balao', 'porco']),
        'counters' => json_encode([])
    ],
    [
        'id' => 'terremoto',
        'nome' => 'Terremoto',
        'tipo' => 'Feitiço',
        'raridade' => 'Raro',
        'elixir' => 3,
        'arena_desbloqueio' => 6,
        'icone' => 'terremoto.svg',
        'descricao' => 'Causa dano contínuo a construções e torres.',
        'sinergias' => json_encode(['porco', 'carneiro']),
        'counters' => json_encode([])
    ],
    [
        'id' => 'barril-goblins',
        'nome' => 'Barril de Goblins',
        'tipo' => 'Feitiço',
        'raridade' => 'Épico',
        'elixir' => 3,
        'arena_desbloqueio' => 6,
        'icone' => 'barril-goblins.svg',
        'descricao' => 'Barril que solta três goblins na torre inimiga.',
        'sinergias' => json_encode(['tronco', 'princesa']),
        'counters' => json_encode(['tronco', 'zap'])
    ],
    [
        'id' => 'flechas-reais',
        'nome' => 'Entrega Real',
        'tipo' => 'Feitiço',
        'raridade' => 'Raro',
        'elixir' => 3,
        'arena_desbloqueio' => 7,
        'icone' => 'flechas-reais.svg',
        'descricao' => 'Invoca Recrutas Reais em qualquer lugar.',
        'sinergias' => json_encode(['porco', 'gigante']),
        'counters' => json_encode(['tronco', 'flechas'])
    ],

    // CONSTRUÇÕES
    [
        'id' => 'cabana-barbaros',
        'nome' => 'Cabana de Bárbaros',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 6,
        'arena_desbloqueio' => 3,
        'icone' => 'cabana-barbaros.svg',
        'descricao' => 'Gera bárbaros periodicamente.',
        'sinergias' => json_encode(['espelho', 'furia']),
        'counters' => json_encode(['terremoto', 'foguete'])
    ],
    [
        'id' => 'cabana-goblins',
        'nome' => 'Cabana de Goblins',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 5,
        'arena_desbloqueio' => 1,
        'icone' => 'cabana-goblins.svg',
        'descricao' => 'Gera duendes com lança periodicamente.',
        'sinergias' => json_encode(['espelho', 'clone']),
        'counters' => json_encode(['terremoto', 'veneno'])
    ],
    [
        'id' => 'fornalha',
        'nome' => 'Fornalha',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 4,
        'arena_desbloqueio' => 5,
        'icone' => 'fornalha.svg',
        'descricao' => 'Gera espíritos de fogo que atacam torres.',
        'sinergias' => json_encode(['porco', 'carneiro']),
        'counters' => json_encode(['terremoto', 'raio'])
    ],
    [
        'id' => 'tumulo',
        'nome' => 'Túmulo',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 3,
        'arena_desbloqueio' => 2,
        'icone' => 'tumulo.svg',
        'descricao' => 'Gera esqueletos periodicamente.',
        'sinergias' => json_encode(['bruxa', 'clone']),
        'counters' => json_encode(['tronco', 'zap'])
    ],
    [
        'id' => 'bombeiro',
        'nome' => 'Torre Bomba',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 4,
        'arena_desbloqueio' => 2,
        'icone' => 'bombeiro.svg',
        'descricao' => 'Lança bombas que causam dano em área.',
        'sinergias' => json_encode(['tornado', 'isca']),
        'counters' => json_encode(['terremoto', 'raio'])
    ],
    [
        'id' => 'x-besta',
        'nome' => 'X-Besta',
        'tipo' => 'Construção',
        'raridade' => 'Épico',
        'elixir' => 6,
        'arena_desbloqueio' => 3,
        'icone' => 'x-besta.svg',
        'descricao' => 'Besta poderosa que ataca tropas e construções.',
        'sinergias' => json_encode(['balao', 'lava-hound']),
        'counters' => json_encode(['terremoto', 'raio'])
    ],

    // TROPAS RARAS ADICIONAIS
    [
        'id' => 'principe-das-trevas',
        'nome' => 'Príncipe das Trevas',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 4,
        'arena_desbloqueio' => 7,
        'icone' => 'principe-das-trevas.svg',
        'descricao' => 'Príncipe com escudo que causa dano em área.',
        'sinergias' => json_encode(['principe', 'furia']),
        'counters' => json_encode(['barbaros', 'mini-pekka'])
    ],
    [
        'id' => 'principe',
        'nome' => 'Príncipe',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 5,
        'arena_desbloqueio' => 7,
        'icone' => 'principe.svg',
        'descricao' => 'Cavaleiro de elite que corre e causa muito dano.',
        'sinergias' => json_encode(['principe-das-trevas', 'furia']),
        'counters' => json_encode(['barbaros', 'esqueletos'])
    ],
    [
        'id' => 'carneiro',
        'nome' => 'Carneiro de Batalha',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 4,
        'arena_desbloqueio' => 6,
        'icone' => 'carneiro.svg',
        'descricao' => 'Carneiro rápido que ataca construções.',
        'sinergias' => json_encode(['flechas-reais', 'barbaros']),
        'counters' => json_encode(['tornado', 'isca'])
    ],
    [
        'id' => 'gigante-eletrico',
        'nome' => 'Gigante Elétrico',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 8,
        'arena_desbloqueio' => 8,
        'icone' => 'gigante-eletrico.svg',
        'descricao' => 'Gigante que causa dano elétrico ao redor.',
        'sinergias' => json_encode(['tornado', 'bruxa']),
        'counters' => json_encode(['mini-pekka', 'pekka'])
    ],
    [
        'id' => 'lava-hound',
        'nome' => 'Cão de Lava',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 7,
        'arena_desbloqueio' => 4,
        'icone' => 'lava-hound.svg',
        'descricao' => 'Tanque voador que se divide em filhotes.',
        'sinergias' => json_encode(['balao', 'minions']),
        'counters' => json_encode(['megacavaleiro', 'mago'])
    ],
    [
        'id' => 'dragao-infernal',
        'nome' => 'Dragão Infernal',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 4,
        'arena_desbloqueio' => 4,
        'icone' => 'dragao-infernal.svg',
        'descricao' => 'Dragão voador com raio contínuo de dano crescente.',
        'sinergias' => json_encode(['tornado', 'lava-hound']),
        'counters' => json_encode(['bola-de-fogo', 'mago'])
    ],
    [
        'id' => 'sparky',
        'nome' => 'Sparky',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 6,
        'arena_desbloqueio' => 6,
        'icone' => 'sparky.svg',
        'descricao' => 'Canhão móvel que causa dano massivo em área.',
        'sinergias' => json_encode(['gigante', 'tornado']),
        'counters' => json_encode(['zap', 'eletrocutadores'])
    ],
    [
        'id' => 'executor',
        'nome' => 'Executor',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 5,
        'arena_desbloqueio' => 7,
        'icone' => 'executor.svg',
        'descricao' => 'Lança machado que atravessa tropas causando dano.',
        'sinergias' => json_encode(['tornado', 'veneno']),
        'counters' => json_encode(['cavaleiro', 'mini-pekka'])
    ],
    [
        'id' => 'arqueiro-magico',
        'nome' => 'Arqueiro Mágico',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 4,
        'arena_desbloqueio' => 10,
        'icone' => 'arqueiro-magico.svg',
        'descricao' => 'Arqueiro que lança flechas mágicas explosivas.',
        'sinergias' => json_encode(['gigante', 'pekka']),
        'counters' => json_encode(['foguete', 'raio'])
    ],
    [
        'id' => 'pescador',
        'nome' => 'Pescador',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 3,
        'arena_desbloqueio' => 8,
        'icone' => 'pescador.svg',
        'descricao' => 'Puxa tropas inimigas para perto dele.',
        'sinergias' => json_encode(['tornado', 'torre-inferno']),
        'counters' => json_encode(['cavaleiro', 'valquiria'])
    ],
    [
        'id' => 'caçadora',
        'nome' => 'Caçadora',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 4,
        'arena_desbloqueio' => 11,
        'icone' => 'caçadora.svg',
        'descricao' => 'Ataca com lança que ricocheteia.',
        'sinergias' => json_encode(['porco', 'carneiro']),
        'counters' => json_encode(['valquiria', 'cavaleiro'])
    ],
    [
        'id' => 'mae-bruxa',
        'nome' => 'Mãe Bruxa',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 4,
        'arena_desbloqueio' => 9,
        'icone' => 'mae-bruxa.svg',
        'descricao' => 'Bruxa que controla porcos selvagens.',
        'sinergias' => json_encode(['tornado', 'veneno']),
        'counters' => json_encode(['valquiria', 'raio'])
    ],
    [
        'id' => 'eletroduende',
        'nome' => 'Eletroduende',
        'tipo' => 'Tropa',
        'raridade' => 'Raro',
        'elixir' => 2,
        'arena_desbloqueio' => 3,
        'icone' => 'eletroduende.svg',
        'descricao' => 'Duende que atordoa com eletricidade.',
        'sinergias' => json_encode(['porco', 'balao']),
        'counters' => json_encode(['zap', 'tronco'])
    ],
    [
        'id' => 'guarda-real',
        'nome' => 'Guarda Real',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 3,
        'arena_desbloqueio' => 7,
        'icone' => 'guarda-real.svg',
        'descricao' => 'Três guardas com escudo dourado.',
        'sinergias' => json_encode(['gigante', 'porco']),
        'counters' => json_encode(['valquiria', 'bruxa'])
    ],
    [
        'id' => 'bombardeiro',
        'nome' => 'Bombardeiro',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 2,
        'arena_desbloqueio' => 2,
        'icone' => 'bombardeiro.svg',
        'descricao' => 'Lança bombas que causam dano em área.',
        'sinergias' => json_encode(['gigante', 'tornado']),
        'counters' => json_encode(['cavaleiro', 'mago'])
    ],
    [
        'id' => 'bandida',
        'nome' => 'Bandida',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 3,
        'arena_desbloqueio' => 9,
        'icone' => 'bandida.svg',
        'descricao' => 'Ataca rapidamente com ataque de salto.',
        'sinergias' => json_encode(['tronco', 'barril-goblins']),
        'counters' => json_encode(['valquiria', 'cavaleiro'])
    ],
    [
        'id' => 'morcegos',
        'nome' => 'Morcegos',
        'tipo' => 'Tropa',
        'raridade' => 'Comum',
        'elixir' => 2,
        'arena_desbloqueio' => 5,
        'icone' => 'morcegos.svg',
        'descricao' => 'Cinco morcegos que atacam rapidamente.',
        'sinergias' => json_encode(['megacavaleiro', 'clone']),
        'counters' => json_encode(['zap', 'flechas'])
    ],
    [
        'id' => 'coletor-elixir',
        'nome' => 'Coletor de Elixir',
        'tipo' => 'Construção',
        'raridade' => 'Raro',
        'elixir' => 6,
        'arena_desbloqueio' => 6,
        'icone' => 'coletor-elixir.svg',
        'descricao' => 'Gera elixir ao longo do tempo.',
        'sinergias' => json_encode(['espelho', 'tornado']),
        'counters' => json_encode(['mineiro', 'foguete'])
    ],
    [
        'id' => 'eletrogigante',
        'nome' => 'Eletrogigante',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 8,
        'arena_desbloqueio' => 13,
        'icone' => 'eletrogigante.svg',
        'descricao' => 'Gigante elétrico que reflete dano.',
        'sinergias' => json_encode(['tornado', 'curar']),
        'counters' => json_encode(['mini-pekka', 'pekka'])
    ],
    [
        'id' => 'gigante-esqueleto',
        'nome' => 'Gigante Esqueleto',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 6,
        'arena_desbloqueio' => 2,
        'icone' => 'gigante-esqueleto.svg',
        'descricao' => 'Esqueleto gigante que solta uma bomba mortal.',
        'sinergias' => json_encode(['clone', 'tornado']),
        'counters' => json_encode(['mini-pekka', 'principe'])
    ],
    [
        'id' => 'dragao-bebe',
        'nome' => 'Bebê Dragão',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 4,
        'arena_desbloqueio' => 2,
        'icone' => 'dragao-bebe.svg',
        'descricao' => 'Dragão voador que causa dano em área.',
        'sinergias' => json_encode(['lava-hound', 'golem']),
        'counters' => json_encode(['megacavaleiro', 'mago'])
    ],
    [
        'id' => 'bruxa-sombria',
        'nome' => 'Bruxa Sombria',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 4,
        'arena_desbloqueio' => 8,
        'icone' => 'bruxa-sombria.svg',
        'descricao' => 'Bruxa que invoca morcegos.',
        'sinergias' => json_encode(['golem', 'gigante']),
        'counters' => json_encode(['valquiria', 'veneno'])
    ],
    [
        'id' => 'esqueletos-gigantes',
        'nome' => 'Esqueletos Gigantes',
        'tipo' => 'Tropa',
        'raridade' => 'Épico',
        'elixir' => 6,
        'arena_desbloqueio' => 2,
        'icone' => 'esqueletos-gigantes.svg',
        'descricao' => 'Esqueletos gigantes que soltam bombas.',
        'sinergias' => json_encode(['clone', 'tornado']),
        'counters' => json_encode(['valquiria', 'bruxa'])
    ],
    [
        'id' => 'cavaleiro-real',
        'nome' => 'Cavaleiro Real',
        'tipo' => 'Tropa',
        'raridade' => 'Campeão',
        'elixir' => 5,
        'arena_desbloqueio' => 15,
        'icone' => 'cavaleiro-real.svg',
        'descricao' => 'Campeão cavaleiro com habilidade especial.',
        'sinergias' => json_encode(['porco', 'gigante']),
        'counters' => json_encode(['mini-pekka', 'pekka'])
    ],
    [
        'id' => 'cavaleiro-dourado',
        'nome' => 'Cavaleiro Dourado',
        'tipo' => 'Tropa',
        'raridade' => 'Campeão',
        'elixir' => 4,
        'arena_desbloqueio' => 15,
        'icone' => 'cavaleiro-dourado.svg',
        'descricao' => 'Campeão com escudo dourado.',
        'sinergias' => json_encode(['principe', 'pekka']),
        'counters' => json_encode(['mini-pekka', 'barbaros'])
    ],
    [
        'id' => 'arqueira-rainha',
        'nome' => 'Arqueira Rainha',
        'tipo' => 'Tropa',
        'raridade' => 'Campeão',
        'elixir' => 5,
        'arena_desbloqueio' => 15,
        'icone' => 'arqueira-rainha.svg',
        'descricao' => 'Campeã arqueira com habilidade de invisibilidade.',
        'sinergias' => json_encode(['gigante', 'porco']),
        'counters' => json_encode(['valquiria', 'cavaleiro'])
    ],
    [
        'id' => 'monge',
        'nome' => 'Monge',
        'tipo' => 'Tropa',
        'raridade' => 'Campeão',
        'elixir' => 5,
        'arena_desbloqueio' => 15,
        'icone' => 'monge.svg',
        'descricao' => 'Monge que reflete feitiços.',
        'sinergias' => json_encode(['gigante', 'pekka']),
        'counters' => json_encode(['mini-pekka', 'cavaleiro'])
    ]
];

$stmt = $conn->prepare("INSERT INTO personagens (id, nome, tipo, raridade, elixir, arena_desbloqueio, icone, descricao, sinergias, counters) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE nome = VALUES(nome), tipo = VALUES(tipo), raridade = VALUES(raridade), elixir = VALUES(elixir), arena_desbloqueio = VALUES(arena_desbloqueio), icone = VALUES(icone), descricao = VALUES(descricao), sinergias = VALUES(sinergias), counters = VALUES(counters)");

$sucesso = 0;
$erro = 0;

foreach ($personagens as $p) {
    $stmt->bind_param(
        'ssssisssss',
        $p['id'],
        $p['nome'],
        $p['tipo'],
        $p['raridade'],
        $p['elixir'],
        $p['arena_desbloqueio'],
        $p['icone'],
        $p['descricao'],
        $p['sinergias'],
        $p['counters']
    );

    if ($stmt->execute()) {
        echo "✓ {$p['nome']} ({$p['tipo']} - {$p['raridade']}) adicionado com sucesso!\n";
        $sucesso++;
    } else {
        echo "✗ Erro ao adicionar {$p['nome']}: " . $stmt->error . "\n";
        $erro++;
    }
}

echo "\n=== RESUMO ===\n";
echo "✓ Sucesso: $sucesso personagens\n";
echo "✗ Erros: $erro personagens\n";

echo "\n=== TOTAL DE PERSONAGENS ===\n";
$result = $conn->query("SELECT COUNT(*) as total FROM personagens");
$total = $result->fetch_assoc()['total'];
echo "Total de personagens cadastrados: $total\n";

$stmt->close();
$conn->close();

echo "\n✓ Script concluído!\n";
