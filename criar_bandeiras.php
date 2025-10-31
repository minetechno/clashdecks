<?php
/**
 * Criar Sistema de Bandeiras de Guerra - ClashDecks
 */

require_once 'api/config_admin.php';

echo "=== Criando Sistema de Bandeiras de Guerra - ClashDecks ===\n\n";

try {
    $pdo = getAdminDBConnection();

    // 1. Criar tabela de bandeiras
    echo "1. Criando tabela 'bandeiras'...\n";

    $createTableSQL = "
    CREATE TABLE IF NOT EXISTS bandeiras (
        id VARCHAR(50) PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        categoria VARCHAR(50) NOT NULL,
        raridade VARCHAR(20) NOT NULL,
        icone VARCHAR(100) NOT NULL,
        descricao TEXT,
        requisito VARCHAR(255),
        historia TEXT,
        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_categoria (categoria),
        INDEX idx_raridade (raridade)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ";

    $pdo->exec($createTableSQL);
    echo "  ✓ Tabela 'bandeiras' criada\n\n";

    // 2. Inserir dados das bandeiras
    echo "2. Inserindo dados das bandeiras...\n";

    $bandeiras = [
        // BANDEIRAS DE VITÓRIAS
        [
            'id' => 'the-smashing-skeletons',
            'nome' => 'The Smashing Skeletons',
            'categoria' => 'Vitórias',
            'raridade' => 'Épico',
            'icone' => 'bandeira-smashing-skeletons.svg',
            'descricao' => 'Bandeira icônica com esqueletos esmagadores. Uma das bandeiras mais populares entre os jogadores.',
            'requisito' => '100 Vitórias em Guerra de Clãs',
            'historia' => 'Os Smashing Skeletons representam a tenacidade e a persistência. Mesmo derrotados, sempre voltam para mais!'
        ],
        [
            'id' => 'royal-victory',
            'nome' => 'Royal Victory',
            'categoria' => 'Vitórias',
            'raridade' => 'Lendário',
            'icone' => 'bandeira-royal-victory.svg',
            'descricao' => 'Bandeira dourada que simboliza vitórias reais e conquistas supremas.',
            'requisito' => '1000 Vitórias em Batalhas',
            'historia' => 'Apenas os campeões mais dedicados conquistam esta bandeira dourada.'
        ],
        [
            'id' => 'triple-crown',
            'nome' => 'Triple Crown',
            'categoria' => 'Vitórias',
            'raridade' => 'Épico',
            'icone' => 'bandeira-triple-crown.svg',
            'descricao' => 'Três coroas representando domínio total em batalha.',
            'requisito' => '500 Vitórias com 3 Coroas',
            'historia' => 'Destruir todas as torres do oponente é a marca de um verdadeiro guerreiro.'
        ],
        [
            'id' => 'undefeated-champion',
            'nome' => 'Undefeated Champion',
            'categoria' => 'Vitórias',
            'raridade' => 'Lendário',
            'icone' => 'bandeira-undefeated.svg',
            'descricao' => 'Para aqueles que nunca conhecem a derrota.',
            'requisito' => 'Série de 50 Vitórias Consecutivas',
            'historia' => 'Apenas os melhores dos melhores conquistam esta honra.'
        ],

        // BANDEIRAS DE GUERRAS
        [
            'id' => 'war-master',
            'nome' => 'War Master',
            'categoria' => 'Guerras',
            'raridade' => 'Épico',
            'icone' => 'bandeira-war-master.svg',
            'descricao' => 'Mestres da guerra de clãs, líderes natos em campo de batalha.',
            'requisito' => '50 Vitórias em Guerras de Clãs',
            'historia' => 'A guerra de clãs separa os estrategistas dos sortudos.'
        ],
        [
            'id' => 'golden-army',
            'nome' => 'Golden Army',
            'categoria' => 'Guerras',
            'raridade' => 'Lendário',
            'icone' => 'bandeira-golden-army.svg',
            'descricao' => 'Exército dourado imparável, símbolo de força militar suprema.',
            'requisito' => 'Vencer 100 Guerras de Clãs',
            'historia' => 'Um exército unido por ouro e glória jamais será derrotado.'
        ],
        [
            'id' => 'clan-warriors',
            'nome' => 'Clan Warriors',
            'categoria' => 'Guerras',
            'raridade' => 'Raro',
            'icone' => 'bandeira-clan-warriors.svg',
            'descricao' => 'Guerreiros unidos pelo laço do clã e pela sede de vitória.',
            'requisito' => '25 Participações em Guerras',
            'historia' => 'A força de um clã se mede pela união de seus guerreiros.'
        ],
        [
            'id' => 'battle-banner',
            'nome' => 'Battle Banner',
            'categoria' => 'Guerras',
            'raridade' => 'Comum',
            'icone' => 'bandeira-battle-banner.svg',
            'descricao' => 'Bandeira de batalha clássica, símbolo de todos os guerreiros.',
            'requisito' => 'Participar de 1 Guerra de Clãs',
            'historia' => 'Todo grande guerreiro começa com um estandarte simples.'
        ],

        // BANDEIRAS ESPECIAIS
        [
            'id' => 'legendary-trophy',
            'nome' => 'Legendary Trophy',
            'categoria' => 'Especiais',
            'raridade' => 'Lendário',
            'icone' => 'bandeira-legendary-trophy.svg',
            'descricao' => 'Troféu lendário para os que alcançaram o topo das arenas.',
            'requisito' => 'Alcançar 8000 Troféus',
            'historia' => 'O topo da arena é para poucos. Você está entre eles?'
        ],
        [
            'id' => 'rainbow-unicorn',
            'nome' => 'Rainbow Unicorn',
            'categoria' => 'Especiais',
            'raridade' => 'Lendário',
            'icone' => 'bandeira-rainbow-unicorn.svg',
            'descricao' => 'Unicórnio arco-íris mágico, raro e cobiçado por todos.',
            'requisito' => 'Evento Especial de Temporada',
            'historia' => 'A magia existe no Clash Royale, e esta bandeira prova isso!'
        ],
        [
            'id' => 'pekka-power',
            'nome' => 'P.E.K.K.A Power',
            'categoria' => 'Especiais',
            'raridade' => 'Épico',
            'icone' => 'bandeira-pekka-power.svg',
            'descricao' => 'Força brutal do P.E.K.K.A representada em uma bandeira temível.',
            'requisito' => 'Vencer 200 Batalhas com P.E.K.K.A no deck',
            'historia' => 'P.E.K.K.A esmaga tudo. Esta bandeira esmaga o moral do inimigo.'
        ],
        [
            'id' => 'dark-prince-legacy',
            'nome' => 'Dark Prince Legacy',
            'categoria' => 'Especiais',
            'raridade' => 'Épico',
            'icone' => 'bandeira-dark-prince.svg',
            'descricao' => 'Legado sombrio do Príncipe das Trevas.',
            'requisito' => 'Vencer 150 Batalhas com Príncipe Sombrio',
            'historia' => 'Das sombras vem o poder. Das trevas vem a vitória.'
        ],
        [
            'id' => 'mega-knight-madness',
            'nome' => 'Mega Knight Madness',
            'categoria' => 'Especiais',
            'raridade' => 'Épico',
            'icone' => 'bandeira-mega-knight.svg',
            'descricao' => 'A loucura do Megacavaleiro em forma de bandeira.',
            'requisito' => 'Destruir 500 Torres com Megacavaleiro',
            'historia' => 'Do céu cai a destruição. Do chão surge o caos.'
        ],
        [
            'id' => 'witch-spell',
            'nome' => 'Witch Spell',
            'categoria' => 'Especiais',
            'raridade' => 'Raro',
            'icone' => 'bandeira-witch-spell.svg',
            'descricao' => 'Feitiço da bruxa, invocando esqueletos e terror.',
            'requisito' => 'Invocar 1000 Esqueletos com Bruxas',
            'historia' => 'A magia negra traz esqueletos. Os esqueletos trazem vitória.'
        ],
        [
            'id' => 'dragon-fire',
            'nome' => 'Dragon Fire',
            'categoria' => 'Especiais',
            'raridade' => 'Lendário',
            'icone' => 'bandeira-dragon-fire.svg',
            'descricao' => 'Fogo do dragão queimando tudo em seu caminho.',
            'requisito' => 'Causar 100.000 de dano com Dragão Infernal',
            'historia' => 'O fogo purifica. O dragão domina. A bandeira permanece.'
        ],
        [
            'id' => 'king-crown',
            'nome' => 'King Crown',
            'categoria' => 'Especiais',
            'raridade' => 'Lendário',
            'icone' => 'bandeira-king-crown.svg',
            'descricao' => 'Coroa do rei, símbolo máximo de poder e autoridade.',
            'requisito' => 'Alcançar Nível de Rei 50',
            'historia' => 'Apenas reis verdadeiros usam esta coroa com honra.'
        ],
        [
            'id' => 'skeleton-army',
            'nome' => 'Skeleton Army',
            'categoria' => 'Especiais',
            'raridade' => 'Raro',
            'icone' => 'bandeira-skeleton-army.svg',
            'descricao' => 'Exército de esqueletos marchando para a vitória.',
            'requisito' => 'Vencer 100 Batalhas com Exército de Esqueletos',
            'historia' => 'Números não mentem. E números de esqueletos vencem batalhas.'
        ],
        [
            'id' => 'electro-wizard-shock',
            'nome' => 'Electro Wizard Shock',
            'categoria' => 'Especiais',
            'raridade' => 'Épico',
            'icone' => 'bandeira-electro-wizard.svg',
            'descricao' => 'Choque elétrico do Mago Elétrico, paralisando inimigos.',
            'requisito' => 'Resetar 500 Ataques com Mago Elétrico',
            'historia' => 'ZZZZAP! O som da derrota dos seus inimigos.'
        ],
        [
            'id' => 'goblin-gang',
            'nome' => 'Goblin Gang',
            'categoria' => 'Especiais',
            'raridade' => 'Comum',
            'icone' => 'bandeira-goblin-gang.svg',
            'descricao' => 'Gangue de goblins travessos e perigosos.',
            'requisito' => 'Vencer 50 Batalhas com Gangue de Goblins',
            'historia' => 'Pequenos, rápidos e mortais. Como uma gangue deve ser.'
        ]
    ];

    $insertQuery = "INSERT INTO bandeiras (id, nome, categoria, raridade, icone, descricao, requisito, historia)
                    VALUES (:id, :nome, :categoria, :raridade, :icone, :descricao, :requisito, :historia)";

    $stmt = $pdo->prepare($insertQuery);

    foreach ($bandeiras as $bandeira) {
        $stmt->execute([
            ':id' => $bandeira['id'],
            ':nome' => $bandeira['nome'],
            ':categoria' => $bandeira['categoria'],
            ':raridade' => $bandeira['raridade'],
            ':icone' => $bandeira['icone'],
            ':descricao' => $bandeira['descricao'],
            ':requisito' => $bandeira['requisito'],
            ':historia' => $bandeira['historia']
        ]);
        echo "  ✓ {$bandeira['nome']} adicionada\n";
    }

    // 3. Verificação
    echo "\n======================================================================\n";
    echo "VERIFICAÇÃO:\n";
    echo "======================================================================\n";

    $queryTotal = "SELECT COUNT(*) as total FROM bandeiras";
    $totalBandeiras = executeAdminQuery($pdo, $queryTotal)[0]['total'];

    echo "Total de bandeiras cadastradas: $totalBandeiras\n\n";

    // Listar por categoria
    $categorias = ['Vitórias', 'Guerras', 'Especiais'];
    foreach ($categorias as $cat) {
        $query = "SELECT COUNT(*) as total FROM bandeiras WHERE categoria = :cat";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':cat' => $cat]);
        $total = $stmt->fetch()['total'];
        echo "  • $cat: $total bandeiras\n";
    }

    echo "\n✓ Sistema de bandeiras criado com sucesso!\n";

} catch (Exception $e) {
    echo "ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
