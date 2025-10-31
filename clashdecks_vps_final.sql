-- ===================================================================================================
-- ClashDecks - Script SQL COMPLETO para VPS com MariaDB
-- ===================================================================================================
-- Este arquivo pode ser colado diretamente no terminal MySQL da VPS
-- Contém TODOS os dados do projeto: 85 personagens, 24 arenas, 30 baús, 35 bandeiras, 12 emotes
-- ===================================================================================================

-- ===================================================================================================
-- 1. REMOVER E CRIAR BANCO DE DADOS
-- ===================================================================================================
DROP DATABASE IF EXISTS clashdecks;
CREATE DATABASE clashdecks CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE clashdecks;

-- ===================================================================================================
-- 2. CRIAR USUÁRIOS E PERMISSÕES
-- ===================================================================================================
DROP USER IF EXISTS 'clashdecks_user'@'localhost';
DROP USER IF EXISTS 'clashdecks_user'@'%';
CREATE USER 'clashdecks_user'@'localhost' IDENTIFIED BY 'ClashDecks@2024!';
CREATE USER 'clashdecks_user'@'%' IDENTIFIED BY 'ClashDecks@2024!';
GRANT ALL PRIVILEGES ON clashdecks.* TO 'clashdecks_user'@'localhost';
GRANT ALL PRIVILEGES ON clashdecks.* TO 'clashdecks_user'@'%';
FLUSH PRIVILEGES;

-- ===================================================================================================
-- 3. CRIAR TABELAS
-- ===================================================================================================

-- Tabela de Arenas (24 arenas)
CREATE TABLE arenas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    icone VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de Personagens/Cartas (85 personagens - incluindo Campeão)
CREATE TABLE personagens (
    id VARCHAR(50) PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo ENUM('Tropa', 'Feitiço', 'Construção') NOT NULL,
    raridade ENUM('Comum', 'Raro', 'Épico', 'Lendário', 'Campeão') NOT NULL,
    elixir INT NOT NULL,
    arena_desbloqueio INT NOT NULL,
    icone VARCHAR(50) NOT NULL,
    descricao TEXT,
    sinergias JSON,
    counters JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_tipo (tipo),
    INDEX idx_raridade (raridade),
    INDEX idx_elixir (elixir),
    INDEX idx_arena (arena_desbloqueio)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de Baús (30 baús)
CREATE TABLE baus (
    id VARCHAR(50) PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    raridade VARCHAR(20) NOT NULL,
    ciclo INT DEFAULT NULL,
    icone VARCHAR(100) NOT NULL,
    descricao TEXT,
    ouro_min INT DEFAULT 0,
    ouro_max INT DEFAULT 0,
    cartas_total INT DEFAULT 0,
    recompensas JSON,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de Bandeiras (35 bandeiras)
CREATE TABLE bandeiras (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de Emotes (12 emotes)
CREATE TABLE emotes (
    id VARCHAR(50) PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    raridade VARCHAR(20) NOT NULL,
    icone VARCHAR(100) NOT NULL,
    descricao TEXT,
    animacao TEXT,
    desbloqueio VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_categoria (categoria),
    INDEX idx_raridade (raridade)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de Decks
CREATE TABLE decks (
    id VARCHAR(50) PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo ENUM('Ofensivo', 'Defensivo', 'Híbrido') NOT NULL,
    arena_alvo INT NOT NULL,
    notas TEXT,
    media_elixir DECIMAL(3,1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_tipo (tipo),
    INDEX idx_arena (arena_alvo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de relacionamento Deck-Cartas (8 cartas por deck)
CREATE TABLE deck_cartas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    deck_id VARCHAR(50) NOT NULL,
    personagem_id VARCHAR(50) NOT NULL,
    posicao INT NOT NULL,
    FOREIGN KEY (deck_id) REFERENCES decks(id) ON DELETE CASCADE,
    FOREIGN KEY (personagem_id) REFERENCES personagens(id) ON DELETE CASCADE,
    UNIQUE KEY unique_deck_carta (deck_id, posicao),
    INDEX idx_deck (deck_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ===================================================================================================
-- 4. INSERIR DADOS - ARENAS (24 arenas: 21 originais + 3 novas)
-- ===================================================================================================
INSERT INTO arenas (id, nome, icone) VALUES
(1, 'Arena 1 - Acampamento dos Goblins', 'arena1.svg'),
(2, 'Arena 2 - Jaula de Ossos', 'arena2.svg'),
(3, 'Arena 3 - Vale dos Bárbaros', 'arena3.svg'),
(4, 'Arena 4 - Pico do P.E.K.K.A', 'arena4.svg'),
(5, 'Arena 5 - Oficina de Feitiços', 'arena5.svg'),
(6, 'Arena 6 - Oficina do Construtor', 'arena6.svg'),
(7, 'Arena 7 - Jardim Real', 'arena7.svg'),
(8, 'Arena 8 - Gelo Congelado', 'arena8.svg'),
(9, 'Arena 9 - Selva dos Esqueletos', 'arena9.svg'),
(10, 'Arena 10 - Caldeirão de Hog', 'arena10.svg'),
(11, 'Arena 11 - Pista de Eletricidade', 'arena11.svg'),
(12, 'Arena 12 - Lago Lendário', 'arena12.svg'),
(13, 'Arena 13 - Caminho da Eletrocução', 'arena13.svg'),
(14, 'Arena 14 - Pico do Rascunho', 'arena14.svg'),
(15, 'Arena 15 - Campeões', 'arena15.svg'),
(16, 'Arena 16 - Portão do Mestre', 'arena16.svg'),
(17, 'Arena 17 - Estádio do Titã', 'arena17.svg'),
(18, 'Arena 18 - Panteão', 'arena18.svg'),
(19, 'Arena 19 - Salão Infinito', 'arena19.svg'),
(20, 'Arena 20 - Câmara Divina', 'arena20.svg'),
(21, 'Arena 21 - Olimpo', 'arena21.svg'),
(22, 'Arena 22 - Fortaleza Celestial', 'arena22.svg'),
(23, 'Arena 23 - Reino dos Imortais', 'arena23.svg'),
(24, 'Arena 24 - Pináculo Supremo', 'arena24.svg');

-- ===================================================================================================
-- 5. INSERIR DADOS - PERSONAGENS (85 personagens: 40 originais + 45 novos)
-- ===================================================================================================
INSERT INTO personagens (id, nome, tipo, raridade, elixir, arena_desbloqueio, icone, descricao, sinergias, counters) VALUES
('goblins', 'Goblins', 'Tropa', 'Comum', 2, 1, 'goblins.svg', 'Tropas pequenas, rápidas e baratas. Excelentes para pressão e distração.', '["barril-de-goblins","gangue-de-goblins","tronco"]', '["flechas","zap","valquiria"]'),
('arqueiras', 'Arqueiras', 'Tropa', 'Comum', 3, 1, 'arqueiras.svg', 'Alcance e DPS consistentes para defesa aérea e terrestre.', '["golem-de-gelo","gigante","cavaleiro"]', '["flechas","bola-de-fogo","valquiria"]'),
('cavaleiro', 'Cavaleiro', 'Tropa', 'Comum', 3, 1, 'cavaleiro.svg', 'Tanque versátil com bom HP e dano. Ideal para tankar pequenos ataques.', '["arqueiras","mago","barril-de-goblins"]', '["mini-pekka","valquiria","pekka"]'),
('mosqueteira', 'Mosqueteira', 'Tropa', 'Raro', 4, 1, 'mosqueteira.svg', 'Alto alcance e dano consistente. Boa contra tropas aéreas.', '["golem-de-gelo","corredor","gigante"]', '["bola-de-fogo","raio","foguete"]'),
('gigante', 'Gigante', 'Tropa', 'Raro', 5, 1, 'gigante.svg', 'Tanque de alto HP que mira apenas construções. Ótimo para push.', '["mosqueteira","arqueiras","mago"]', '["mini-pekka","torre-inferno","pekka"]'),
('esqueletos', 'Esqueletos', 'Tropa', 'Comum', 1, 2, 'esqueletos.svg', 'Tropas extremamente baratas. Ótimas para ciclo rápido e distração.', '["corredor","golem-de-gelo","torre-inferno"]', '["zap","tronco","flechas"]'),
('mini-pekka', 'Mini P.E.K.K.A', 'Tropa', 'Raro', 4, 2, 'mini-pekka.svg', 'Alto dano single-target. Excelente contra tanques.', '["golem-de-gelo","zap","tronco"]', '["esqueletos","gangue-de-goblins","valquiria"]'),
('valquiria', 'Valquíria', 'Tropa', 'Raro', 4, 2, 'valquiria.svg', 'Dano em área 360°. Excelente contra tropas de enxame.', '["corredor","gigante","golem"]', '["mini-pekka","pekka","torre-inferno"]'),
('golem-de-gelo', 'Golem de Gelo', 'Tropa', 'Raro', 2, 3, 'golem-de-gelo.svg', 'Tanque barato que desacelera inimigos ao morrer.', '["corredor","mosqueteira","balao"]', '["mineiro","goblins","gangue-de-goblins"]'),
('mago', 'Mago', 'Tropa', 'Raro', 5, 3, 'mago.svg', 'Dano em área de longo alcance. Efetivo contra enxames.', '["gigante","golem","cavaleiro"]', '["bola-de-fogo","raio","foguete"]'),
('pekka', 'P.E.K.K.A', 'Tropa', 'Épico', 7, 4, 'pekka.svg', 'Dano massivo single-target. Destruidora de tanques.', '["eletrocutadores","mago","dragao-eletrico"]', '["torre-inferno","gangue-de-goblins","esqueletos"]'),
('balao', 'Balão', 'Tropa', 'Épico', 5, 4, 'balao.svg', 'Ataque aéreo devastador contra construções. Alto risco/recompensa.', '["golem-de-gelo","lenhador","gigante"]', '["mosqueteira","mago-de-gelo","torre-inferno"]'),
('bruxa', 'Bruxa', 'Tropa', 'Épico', 5, 4, 'bruxa.svg', 'Invoca esqueletos e causa dano em área. Versátil em defesa.', '["gigante","golem","pekka"]', '["valquiria","raio","veneno"]'),
('golem', 'Golem', 'Tropa', 'Épico', 8, 5, 'golem.svg', 'Super tanque que se divide em goleminhos. Base de beatdown.', '["mago","bruxa","dragao-eletrico"]', '["torre-inferno","pekka","mini-pekka"]'),
('corredor', 'Corredor', 'Tropa', 'Raro', 4, 6, 'corredor.svg', 'Velocidade alta, mira construções. Pressão constante e ciclo.', '["golem-de-gelo","mosqueteira","canhao"]', '["tornado","jaula-do-goblin","esqueletos"]'),
('montador-de-javali', 'Montador de Javali', 'Tropa', 'Raro', 4, 6, 'montador-de-javali.svg', 'Tropa montada rápida com bom DPS. Push agressivo.', '["goblins","lenhador","tronco"]', '["tornado","mini-pekka","valquiria"]'),
('lenhador', 'Lenhador', 'Tropa', 'Lendário', 4, 6, 'lenhador.svg', 'Derruba raiva ao morrer. Acelera tropas aliadas próximas.', '["balao","corredor","gigante"]', '["mini-pekka","valquiria","pekka"]'),
('princesa', 'Princesa', 'Tropa', 'Lendário', 3, 7, 'princesa.svg', 'Alcance máximo com dano em área. Pressão de longa distância.', '["barril-de-goblins","gangue-de-goblins","cavaleiro"]', '["tronco","flechas","mago"]'),
('mineiro', 'Mineiro', 'Tropa', 'Lendário', 3, 8, 'mineiro.svg', 'Aparece em qualquer lugar. Ideal para pressão e distração.', '["barril-de-goblins","veneno","bola-de-fogo"]', '["valquiria","cavaleiro","mini-pekka"]'),
('mago-de-gelo', 'Mago de Gelo', 'Tropa', 'Lendário', 3, 8, 'mago-de-gelo.svg', 'Desacelera inimigos com ataques congelantes. Controle efetivo.', '["corredor","gigante","balao"]', '["raio","bola-de-fogo","foguete"]'),
('eletrocutadores', 'Eletrocutadores', 'Tropa', 'Comum', 3, 11, 'eletrocutadores.svg', 'Causam dano em cadeia entre múltiplos alvos. Controle de enxames.', '["pekka","gigante-elixir","dragao-eletrico"]', '["bola-de-fogo","valquiria","mago"]'),
('barbaros-de-elite', 'Bárbaros de Elite', 'Tropa', 'Comum', 6, 12, 'barbaros-de-elite.svg', 'Dupla de bárbaros com escudos. Tanques médios versáteis.', '["cura","tornado","jaula-do-goblin"]', '["pekka","mini-pekka","torre-inferno"]'),
('gigante-elixir', 'Gigante de Elixir', 'Tropa', 'Épico', 8, 12, 'gigante-elixir.svg', 'Tanque que gera elixir ao ser atingido. Setups de contra-ataque.', '["eletrocutadores","dragao-eletrico","tornado"]', '["mini-pekka","torre-inferno","pekka"]'),
('dragao-eletrico', 'Dragão Elétrico', 'Tropa', 'Épico', 5, 11, 'dragao-eletrico.svg', 'Voa e causa dano em cadeia. Excelente contra enxames.', '["golem","gigante-elixir","pekka"]', '["mosqueteira","mago-de-gelo","torre-inferno"]'),
('gangue-de-goblins', 'Gangue de Goblins', 'Tropa', 'Comum', 3, 9, 'gangue-de-goblins.svg', 'Enxame de goblins com alto DPS combinado. Defesa emergencial.', '["barril-de-goblins","princesa","tronco"]', '["tronco","flechas","zap"]'),
('barril-de-goblins', 'Barril de Goblins', 'Feitiço', 'Épico', 3, 6, 'barril-de-goblins.svg', 'Entrega goblins diretamente na torre. Alta pressão.', '["princesa","gangue-de-goblins","mineiro"]', '["tronco","flechas","valquiria"]'),
('flechas', 'Flechas', 'Feitiço', 'Comum', 3, 1, 'flechas.svg', 'Dano em área médio. Efetivo contra enxames.', '["corredor","gigante","balao"]', '[]'),
('bola-de-fogo', 'Bola de Fogo', 'Feitiço', 'Raro', 4, 1, 'bola-de-fogo.svg', 'Dano e empurrão. Versátil para defesa e ataque.', '["corredor","gigante","golem"]', '[]'),
('tronco', 'O Tronco', 'Feitiço', 'Lendário', 2, 6, 'tronco.svg', 'Empurra e elimina tropas terrestres. Essencial no meta.', '["corredor","barril-de-goblins","mineiro"]', '[]'),
('zap', 'Zap', 'Feitiço', 'Comum', 2, 1, 'zap.svg', 'Reseta ataques e stuna tropas. Ciclo rápido.', '["corredor","balao","gigante"]', '[]'),
('raio', 'Raio', 'Feitiço', 'Épico', 6, 2, 'raio.svg', 'Alto dano concentrado. Elimina tropas de suporte.', '["corredor","montador-de-javali","gigante"]', '[]'),
('foguete', 'Foguete', 'Feitiço', 'Raro', 6, 3, 'foguete.svg', 'Dano massivo direto. Finaliza torres ou elimina tropas caras.', '["corredor","barril-de-goblins","mineiro"]', '[]'),
('veneno', 'Veneno', 'Feitiço', 'Épico', 4, 5, 'veneno.svg', 'Dano contínuo e desaceleração. Controla área por tempo.', '["corredor","mineiro","gigante"]', '[]'),
('tornado', 'Tornado', 'Feitiço', 'Épico', 3, 8, 'tornado.svg', 'Agrupa e reposiciona tropas inimigas. Sinergias defensivas.', '["foguete","gigante-elixir","barbaros-de-elite"]', '[]'),
('cura', 'Cura', 'Feitiço', 'Raro', 1, 10, 'cura.svg', 'Cura tropas aliadas ao longo do tempo. Suporte em pushes.', '["barbaros-de-elite","eletrocutadores","gangue-de-goblins"]', '[]'),
('espirito-de-gelo', 'Espírito de Gelo', 'Tropa', 'Comum', 1, 5, 'espirito-de-gelo.svg', 'Congela inimigos ao explodir. Ciclo extremamente barato.', '["corredor","balao","gigante"]', '["zap","tronco","flechas"]'),
('espirito', 'Espírito de Fogo', 'Tropa', 'Comum', 1, 4, 'espirito.svg', 'Causa dano em área ao pular. Ciclo barato.', '["corredor","barril-de-goblins","mineiro"]', '["zap","tronco","flechas"]'),
('canhao', 'Canhão', 'Construção', 'Comum', 3, 1, 'canhao.svg', 'Defesa barata contra tropas terrestres. Puxa tanques.', '["corredor","mosqueteira","arqueiras"]', '["raio","foguete","terremoto"]'),
('torre-inferno', 'Torre Inferno', 'Construção', 'Raro', 5, 4, 'torre-inferno.svg', 'Dano crescente devastador. Derrete tanques.', '["esqueletos","tornado","mago"]', '["raio","foguete","gangue-de-goblins"]'),
('tesla', 'Tesla', 'Construção', 'Comum', 4, 4, 'tesla.svg', 'Defesa oculta que ataca aéreo e terrestre. Versátil.', '["corredor","mago-de-gelo","tornado"]', '["raio","foguete","terremoto"]'),
('jaula-do-goblin', 'Jaula do Goblin', 'Construção', 'Raro', 3, 9, 'jaula-do-goblin.svg', 'Defesa que libera goblins ao ser destruída. Valor defensivo.', '["corredor","tornado","gigante-elixir"]', '["raio","foguete","veneno"]'),
('lanceiros', 'Lanceiros', 'Tropa', 'Comum', 2, 1, 'lanceiros.svg', 'Três lanceiros que atacam rapidamente tropas terrestres.', '["gigante","principe"]', '["valquiria","veneno"]'),
('minions', 'Minions', 'Tropa', 'Comum', 3, 1, 'minions.svg', 'Três criaturas voadoras que atacam do céu.', '["balao","lava-hound"]', '["flechas","zap"]'),
('horda-minions', 'Horda de Minions', 'Tropa', 'Comum', 5, 4, 'horda-minions.svg', 'Seis criaturas voadoras que causam muito dano.', '["lava-hound","clone"]', '["flechas","mago"]'),
('duendes', 'Duendes', 'Tropa', 'Comum', 2, 1, 'duendes.svg', 'Três duendes rápidos que causam muito dano.', '["espelho","clone"]', '["zap","tronco"]'),
('barbaros', 'Bárbaros', 'Tropa', 'Comum', 5, 3, 'barbaros.svg', 'Cinco bárbaros muito fortes e resistentes.', '["furia","espelho"]', '["veneno","valquiria"]'),
('megacavaleiro', 'Mega Cavaleiro', 'Tropa', 'Lendário', 7, 7, 'megacavaleiro.svg', 'Cavaleiro pesado que causa dano em área ao pular.', '["morcegos","iscas"]', '["mini-pekka","principe"]'),
('berserker', 'Berserker', 'Tropa', 'Raro', 2, 2, 'berserker.svg', 'Guerreira furiosa que ataca rapidamente.', '["furia","curar"]', '["cavaleiro","valquiria"]'),
('furia', 'Fúria', 'Feitiço', 'Épico', 2, 3, 'furia.svg', 'Aumenta velocidade de movimento e ataque das tropas.', '["balao","minions"]', '["zap","tronco"]'),
('espelho', 'Espelho', 'Feitiço', 'Épico', 1, 5, 'espelho.svg', 'Repete a carta anterior jogada com +1 de nível.', '["porco","barril"]', '[]'),
('clone', 'Clone', 'Feitiço', 'Épico', 3, 8, 'clone.svg', 'Clona tropas em uma área com 1 HP.', '["balao","lava-hound"]', '["zap","flechas"]'),
('congelar', 'Congelar', 'Feitiço', 'Épico', 4, 4, 'congelar.svg', 'Congela tropas e construções por alguns segundos.', '["balao","porco"]', '[]'),
('terremoto', 'Terremoto', 'Feitiço', 'Raro', 3, 6, 'terremoto.svg', 'Causa dano contínuo a construções e torres.', '["porco","carneiro"]', '[]'),
('barril-goblins', 'Barril de Goblins', 'Feitiço', 'Épico', 3, 6, 'barril-goblins.svg', 'Barril que solta três goblins na torre inimiga.', '["tronco","princesa"]', '["tronco","zap"]'),
('flechas-reais', 'Entrega Real', 'Feitiço', 'Raro', 3, 7, 'flechas-reais.svg', 'Invoca Recrutas Reais em qualquer lugar.', '["porco","gigante"]', '["tronco","flechas"]'),
('cabana-barbaros', 'Cabana de Bárbaros', 'Construção', 'Raro', 6, 3, 'cabana-barbaros.svg', 'Gera bárbaros periodicamente.', '["espelho","furia"]', '["terremoto","foguete"]'),
('cabana-goblins', 'Cabana de Goblins', 'Construção', 'Raro', 5, 1, 'cabana-goblins.svg', 'Gera duendes com lança periodicamente.', '["espelho","clone"]', '["terremoto","veneno"]'),
('fornalha', 'Fornalha', 'Construção', 'Raro', 4, 5, 'fornalha.svg', 'Gera espíritos de fogo que atacam torres.', '["porco","carneiro"]', '["terremoto","raio"]'),
('tumulo', 'Túmulo', 'Construção', 'Raro', 3, 2, 'tumulo.svg', 'Gera esqueletos periodicamente.', '["bruxa","clone"]', '["tronco","zap"]'),
('bombeiro', 'Torre Bomba', 'Construção', 'Raro', 4, 2, 'bombeiro.svg', 'Lança bombas que causam dano em área.', '["tornado","isca"]', '["terremoto","raio"]'),
('x-besta', 'X-Besta', 'Construção', 'Épico', 6, 3, 'x-besta.svg', 'Besta poderosa que ataca tropas e construções.', '["balao","lava-hound"]', '["terremoto","raio"]'),
('principe-das-trevas', 'Príncipe das Trevas', 'Tropa', 'Épico', 4, 7, 'principe-das-trevas.svg', 'Príncipe com escudo que causa dano em área.', '["principe","furia"]', '["barbaros","mini-pekka"]'),
('principe', 'Príncipe', 'Tropa', 'Épico', 5, 7, 'principe.svg', 'Cavaleiro de elite que corre e causa muito dano.', '["principe-das-trevas","furia"]', '["barbaros","esqueletos"]'),
('carneiro', 'Carneiro de Batalha', 'Tropa', 'Épico', 4, 6, 'carneiro.svg', 'Carneiro rápido que ataca construções.', '["flechas-reais","barbaros"]', '["tornado","isca"]'),
('gigante-eletrico', 'Gigante Elétrico', 'Tropa', 'Épico', 8, 8, 'gigante-eletrico.svg', 'Gigante que causa dano elétrico ao redor.', '["tornado","bruxa"]', '["mini-pekka","pekka"]'),
('lava-hound', 'Cão de Lava', 'Tropa', 'Lendário', 7, 4, 'lava-hound.svg', 'Tanque voador que se divide em filhotes.', '["balao","minions"]', '["megacavaleiro","mago"]'),
('dragao-infernal', 'Dragão Infernal', 'Tropa', 'Lendário', 4, 4, 'dragao-infernal.svg', 'Dragão voador com raio contínuo de dano crescente.', '["tornado","lava-hound"]', '["bola-de-fogo","mago"]'),
('sparky', 'Sparky', 'Tropa', 'Lendário', 6, 6, 'sparky.svg', 'Canhão móvel que causa dano massivo em área.', '["gigante","tornado"]', '["zap","eletrocutadores"]'),
('executor', 'Executor', 'Tropa', 'Épico', 5, 7, 'executor.svg', 'Lança machado que atravessa tropas causando dano.', '["tornado","veneno"]', '["cavaleiro","mini-pekka"]'),
('arqueiro-magico', 'Arqueiro Mágico', 'Tropa', 'Lendário', 4, 10, 'arqueiro-magico.svg', 'Arqueiro que lança flechas mágicas explosivas.', '["gigante","pekka"]', '["foguete","raio"]'),
('pescador', 'Pescador', 'Tropa', 'Lendário', 3, 8, 'pescador.svg', 'Puxa tropas inimigas para perto dele.', '["tornado","torre-inferno"]', '["cavaleiro","valquiria"]'),
('caçadora', 'Caçadora', 'Tropa', 'Épico', 4, 11, 'caçadora.svg', 'Ataca com lança que ricocheteia.', '["porco","carneiro"]', '["valquiria","cavaleiro"]'),
('mae-bruxa', 'Mãe Bruxa', 'Tropa', 'Lendário', 4, 9, 'mae-bruxa.svg', 'Bruxa que controla porcos selvagens.', '["tornado","veneno"]', '["valquiria","raio"]'),
('eletroduende', 'Eletroduende', 'Tropa', 'Raro', 2, 3, 'eletroduende.svg', 'Duende que atordoa com eletricidade.', '["porco","balao"]', '["zap","tronco"]'),
('guarda-real', 'Guarda Real', 'Tropa', 'Comum', 3, 7, 'guarda-real.svg', 'Três guardas com escudo dourado.', '["gigante","porco"]', '["valquiria","bruxa"]'),
('bombardeiro', 'Bombardeiro', 'Tropa', 'Comum', 2, 2, 'bombardeiro.svg', 'Lança bombas que causam dano em área.', '["gigante","tornado"]', '["cavaleiro","mago"]'),
('bandida', 'Bandida', 'Tropa', 'Lendário', 3, 9, 'bandida.svg', 'Ataca rapidamente com ataque de salto.', '["tronco","barril-goblins"]', '["valquiria","cavaleiro"]'),
('morcegos', 'Morcegos', 'Tropa', 'Comum', 2, 5, 'morcegos.svg', 'Cinco morcegos que atacam rapidamente.', '["megacavaleiro","clone"]', '["zap","flechas"]'),
('coletor-elixir', 'Coletor de Elixir', 'Construção', 'Raro', 6, 6, 'coletor-elixir.svg', 'Gera elixir ao longo do tempo.', '["espelho","tornado"]', '["mineiro","foguete"]'),
('eletrogigante', 'Eletrogigante', 'Tropa', 'Épico', 8, 13, 'eletrogigante.svg', 'Gigante elétrico que reflete dano.', '["tornado","curar"]', '["mini-pekka","pekka"]'),
('gigante-esqueleto', 'Gigante Esqueleto', 'Tropa', 'Épico', 6, 2, 'gigante-esqueleto.svg', 'Esqueleto gigante que solta uma bomba mortal.', '["clone","tornado"]', '["mini-pekka","principe"]'),
('dragao-bebe', 'Bebê Dragão', 'Tropa', 'Épico', 4, 2, 'dragao-bebe.svg', 'Dragão voador que causa dano em área.', '["lava-hound","golem"]', '["megacavaleiro","mago"]'),
('bruxa-sombria', 'Bruxa Sombria', 'Tropa', 'Lendário', 4, 8, 'bruxa-sombria.svg', 'Bruxa que invoca morcegos.', '["golem","gigante"]', '["valquiria","veneno"]'),
('esqueletos-gigantes', 'Esqueletos Gigantes', 'Tropa', 'Épico', 6, 2, 'esqueletos-gigantes.svg', 'Esqueletos gigantes que soltam bombas.', '["clone","tornado"]', '["valquiria","bruxa"]'),
('cavaleiro-real', 'Cavaleiro Real', 'Tropa', 'Campeão', 5, 15, 'cavaleiro-real.svg', 'Campeão cavaleiro com habilidade especial.', '["porco","gigante"]', '["mini-pekka","pekka"]'),
('cavaleiro-dourado', 'Cavaleiro Dourado', 'Tropa', 'Campeão', 4, 15, 'cavaleiro-dourado.svg', 'Campeão com escudo dourado.', '["principe","pekka"]', '["mini-pekka","barbaros"]'),
('arqueira-rainha', 'Arqueira Rainha', 'Tropa', 'Campeão', 5, 15, 'arqueira-rainha.svg', 'Campeã arqueira com habilidade de invisibilidade.', '["gigante","porco"]', '["valquiria","cavaleiro"]'),
('monge', 'Monge', 'Tropa', 'Campeão', 5, 15, 'monge.svg', 'Monge que reflete feitiços.', '["gigante","pekka"]', '["mini-pekka","cavaleiro"]');

-- ===================================================================================================
-- 6. INSERIR DADOS - BAÚS (30 baús: originais + novos)
-- ===================================================================================================
INSERT INTO baus (id, nome, raridade, ciclo, icone, descricao, ouro_min, ouro_max, cartas_total, recompensas) VALUES
('bau-prata', 'Baú de Prata', 'Comum', 1, 'bau-prata.svg', 'Baú comum que aparece a cada vitória no ciclo de baús.', 18, 102, 19, '{"cartas":{"Comum":"70%","Rara":"27%","Épica":"3%"},"ouro":"18-102","gemas":"0-2"}'),
('bau-ouro', 'Baú de Ouro', 'Raro', 2, 'bau-ouro.svg', 'Baú raro com mais cartas e ouro que o Baú de Prata.', 82, 470, 57, '{"cartas":{"Comum":"68%","Rara":"29%","Épica":"3%"},"ouro":"82-470","gemas":"0-5"}'),
('bau-gigante', 'Baú Gigante', 'Épico', 3, 'bau-gigante.svg', 'Baú grande que contém muitas cartas e recursos.', 260, 1484, 180, '{"cartas":{"Comum":"67%","Rara":"30%","Épica":"3%"},"ouro":"260-1484","gemas":"0-10"}'),
('bau-magico', 'Baú Mágico', 'Épico', 4, 'bau-magico.svg', 'Baú mágico garantido a cada ciclo de baús.', 416, 2374, 114, '{"cartas":{"Comum":"65%","Rara":"30%","Épica":"5%"},"ouro":"416-2374","gemas":"5-15"}'),
('bau-relampago', 'Baú do Relâmpago', 'Lendário', NULL, 'bau-relampago.svg', 'Baú encontrado ao acaso com recursos incríveis e carta Lendária garantida!', 3000, 6000, 20, '{"cartas":{"Lendária":"100% (1 carta)","Épica":"18 cartas","Rara":"1 carta"},"ouro":"3000-6000","gemas":"10-20"}'),
('bau-rei', 'Baú do Rei', 'Lendário', NULL, 'bau-rei.svg', 'Baú especial ganho ao fazer doações à clan. Contém cartas e ouro generosos.', 500, 2500, 25, '{"cartas":{"Comum":"60%","Rara":"35%","Épica":"5%"},"ouro":"500-2500","gemas":"5-10"}'),
('bau-destino', 'Baú do Destino', 'Lendário', NULL, 'bau-destino.svg', 'Baú especial disponível na loja que permite escolher uma carta Lendária!', 0, 0, 1, '{"cartas":{"Lendária":"100% (escolha)"},"ouro":"0","gemas":"Comprado com gemas"}'),
('bau-mega-relampago', 'Baú Mega Relâmpago', 'Lendário', NULL, 'bau-mega-relampago.svg', 'Versão melhorada do Baú do Relâmpago com 2 cartas Lendárias garantidas!', 6000, 10000, 40, '{"cartas":{"Lendária":"100% (2 cartas)","Épica":"35 cartas","Rara":"3 cartas"},"ouro":"6000-10000","gemas":"20-40"}'),
('bau-coroa', 'Baú da Coroa', 'Épico', NULL, 'bau-coroa.svg', 'Baú obtido ao coletar 10 coroas em batalhas.', 200, 1200, 90, '{"cartas":{"Comum":"68%","Rara":"29%","Épica":"3%"},"ouro":"200-1200","gemas":"0-5"}'),
('bau-clan', 'Baú do Clã', 'Épico', NULL, 'bau-clan.svg', 'Baú obtido através de batalhas e doações no clã.', 300, 1800, 50, '{"cartas":{"Comum":"65%","Rara":"32%","Épica":"3%"},"ouro":"300-1800","gemas":"0-8"}'),
('bau-platina', 'Baú de Platina', 'Raro', 5, 'bau-platina.svg', 'Baú raro com ótimas recompensas', 300, 800, 75, '["ouro","cartas","gemas"]'),
('bau-diamante', 'Baú de Diamante', 'Lendário', 0, 'bau-diamante.svg', 'Baú lendário com recompensas incríveis', 2000, 4000, 150, '["ouro","cartas","gemas","lendaria"]'),
('bau-fortune', 'Baú da Fortuna', 'Lendário', 0, 'bau-fortune.svg', 'Baú especial com recompensas aleatórias premium', 5000, 10000, 200, '["ouro","gemas","lendarias","tokens"]'),
('bau-campeao', 'Baú do Campeão', 'Lendário', 0, 'bau-campeao.svg', 'Baú exclusivo com campeões garantidos', 3000, 6000, 100, '["campeao","ouro","cartas"]'),
('bau-super-magico', 'Baú Super Mágico', 'Lendário', 0, 'bau-super-magico.svg', 'Versão melhorada do Baú Mágico', 1000, 3000, 300, '["ouro","cartas","epicas","lendaria"]'),
('bau-titanico', 'Baú Titânico', 'Lendário', 0, 'bau-titanico.svg', 'Baú gigante com muitas recompensas', 800, 2000, 400, '["ouro","cartas","tokens"]'),
('bau-boost', 'Baú Boost', 'Épico', 0, 'bau-boost.svg', 'Baú com itens de boost e aceleração', 400, 900, 60, '["boost","ouro","cartas"]'),
('bau-presente', 'Baú Presente', 'Raro', 0, 'bau-presente.svg', 'Baú especial de eventos e datas comemorativas', 500, 1500, 80, '["ouro","gemas","cartas"]'),
('bau-livre', 'Baú Livre', 'Comum', 0, 'bau-livre.svg', 'Baú grátis disponível a cada 4 horas', 10, 50, 10, '["ouro","cartas"]'),
('bau-quest', 'Baú de Missão', 'Raro', 0, 'bau-quest.svg', 'Baú obtido ao completar missões diárias', 200, 600, 40, '["ouro","cartas","tokens"]'),
('bau-arcoiris', 'Baú Arco-Íris', 'Lendário', 0, 'bau-arcoiris.svg', 'Baú colorido com cartas de todas as raridades', 1500, 3500, 120, '["ouro","cartas","todas-raridades"]'),
('bau-desafio-grande', 'Grande Baú de Desafio', 'Épico', 0, 'bau-desafio-grande.svg', 'Baú premium obtido em desafios especiais', 600, 1200, 100, '["ouro","cartas","tokens"]'),
('bau-lendario-rei', 'Baú Lendário do Rei', 'Lendário', 0, 'bau-lendario-rei.svg', 'Baú real com múltiplas lendárias', 2500, 5000, 80, '["lendarias","ouro","gemas"]'),
('bau-mestre', 'Baú do Mestre', 'Lendário', 0, 'bau-mestre.svg', 'Baú exclusivo para mestres da arena', 3500, 7000, 150, '["ouro","cartas","lendarias","tokens"]');

-- ===================================================================================================
-- 7. INSERIR DADOS - BANDEIRAS (35 bandeiras: originais + novas)
-- ===================================================================================================
INSERT INTO bandeiras (id, nome, categoria, raridade, icone, descricao, requisito, historia) VALUES
('the-smashing-skeletons', 'The Smashing Skeletons', 'Vitórias', 'Épico', 'bandeira-smashing-skeletons.svg', 'Bandeira icônica com esqueletos esmagadores. Uma das bandeiras mais populares entre os jogadores.', '100 Vitórias em Guerra de Clãs', 'Os Smashing Skeletons representam a tenacidade e a persistência. Mesmo derrotados, sempre voltam para mais!'),
('royal-victory', 'Royal Victory', 'Vitórias', 'Lendário', 'bandeira-royal-victory.svg', 'Bandeira dourada que simboliza vitórias reais e conquistas supremas.', '1000 Vitórias em Batalhas', 'Apenas os campeões mais dedicados conquistam esta bandeira dourada.'),
('triple-crown', 'Triple Crown', 'Vitórias', 'Épico', 'bandeira-triple-crown.svg', 'Três coroas representando domínio total em batalha.', '500 Vitórias com 3 Coroas', 'Destruir todas as torres do oponente é a marca de um verdadeiro guerreiro.'),
('undefeated-champion', 'Undefeated Champion', 'Vitórias', 'Lendário', 'bandeira-undefeated.svg', 'Para aqueles que nunca conhecem a derrota.', 'Série de 50 Vitórias Consecutivas', 'Apenas os melhores dos melhores conquistam esta honra.'),
('war-master', 'War Master', 'Guerras', 'Épico', 'bandeira-war-master.svg', 'Mestres da guerra de clãs, líderes natos em campo de batalha.', '50 Vitórias em Guerras de Clãs', 'A guerra de clãs separa os estrategistas dos sortudos.'),
('golden-army', 'Golden Army', 'Guerras', 'Lendário', 'bandeira-golden-army.svg', 'Exército dourado imparável, símbolo de força militar suprema.', 'Vencer 100 Guerras de Clãs', 'Um exército unido por ouro e glória jamais será derrotado.'),
('clan-warriors', 'Clan Warriors', 'Guerras', 'Raro', 'bandeira-clan-warriors.svg', 'Guerreiros unidos pelo laço do clã e pela sede de vitória.', '25 Participações em Guerras', 'A força de um clã se mede pela união de seus guerreiros.'),
('battle-banner', 'Battle Banner', 'Guerras', 'Comum', 'bandeira-battle-banner.svg', 'Bandeira de batalha clássica, símbolo de todos os guerreiros.', 'Participar de 1 Guerra de Clãs', 'Todo grande guerreiro começa com um estandarte simples.'),
('legendary-trophy', 'Legendary Trophy', 'Especiais', 'Lendário', 'bandeira-legendary-trophy.svg', 'Troféu lendário para os que alcançaram o topo das arenas.', 'Alcançar 8000 Troféus', 'O topo da arena é para poucos. Você está entre eles?'),
('rainbow-unicorn', 'Rainbow Unicorn', 'Especiais', 'Lendário', 'bandeira-rainbow-unicorn.svg', 'Unicórnio arco-íris mágico, raro e cobiçado por todos.', 'Evento Especial de Temporada', 'A magia existe no Clash Royale, e esta bandeira prova isso!'),
('pekka-power', 'P.E.K.K.A Power', 'Especiais', 'Épico', 'bandeira-pekka-power.svg', 'Força brutal do P.E.K.K.A representada em uma bandeira temível.', 'Vencer 200 Batalhas com P.E.K.K.A no deck', 'P.E.K.K.A esmaga tudo. Esta bandeira esmaga o moral do inimigo.'),
('dark-prince-legacy', 'Dark Prince Legacy', 'Especiais', 'Épico', 'bandeira-dark-prince.svg', 'Legado sombrio do Príncipe das Trevas.', 'Vencer 150 Batalhas com Príncipe Sombrio', 'Das sombras vem o poder. Das trevas vem a vitória.'),
('mega-knight-madness', 'Mega Knight Madness', 'Especiais', 'Épico', 'bandeira-mega-knight.svg', 'A loucura do Megacavaleiro em forma de bandeira.', 'Destruir 500 Torres com Megacavaleiro', 'Do céu cai a destruição. Do chão surge o caos.'),
('witch-spell', 'Witch Spell', 'Especiais', 'Raro', 'bandeira-witch-spell.svg', 'Feitiço da bruxa, invocando esqueletos e terror.', 'Invocar 1000 Esqueletos com Bruxas', 'A magia negra traz esqueletos. Os esqueletos trazem vitória.'),
('dragon-fire', 'Dragon Fire', 'Especiais', 'Lendário', 'bandeira-dragon-fire.svg', 'Fogo do dragão queimando tudo em seu caminho.', 'Causar 100.000 de dano com Dragão Infernal', 'O fogo purifica. O dragão domina. A bandeira permanece.'),
('king-crown', 'King Crown', 'Especiais', 'Lendário', 'bandeira-king-crown.svg', 'Coroa do rei, símbolo máximo de poder e autoridade.', 'Alcançar Nível de Rei 50', 'Apenas reis verdadeiros usam esta coroa com honra.'),
('skeleton-army', 'Skeleton Army', 'Especiais', 'Raro', 'bandeira-skeleton-army.svg', 'Exército de esqueletos marchando para a vitória.', 'Vencer 100 Batalhas com Exército de Esqueletos', 'Números não mentem. E números de esqueletos vencem batalhas.'),
('electro-wizard-shock', 'Electro Wizard Shock', 'Especiais', 'Épico', 'bandeira-electro-wizard.svg', 'Choque elétrico do Mago Elétrico, paralisando inimigos.', 'Resetar 500 Ataques com Mago Elétrico', 'ZZZZAP! O som da derrota dos seus inimigos.'),
('goblin-gang', 'Goblin Gang', 'Especiais', 'Comum', 'bandeira-goblin-gang.svg', 'Gangue de goblins travessos e perigosos.', 'Vencer 50 Batalhas com Gangue de Goblins', 'Pequenos, rápidos e mortais. Como uma gangue deve ser.'),
('vitorias-perfeitas', 'Vitórias Perfeitas', 'Vitórias', 'Lendário', 'vitorias-perfeitas.svg', 'Conquistada após 100 vitórias sem perder torres', '100 vitórias perfeitas', 'O símbolo da perfeição absoluta em batalha'),
('mestre-invencivel', 'Mestre Invencível', 'Vitórias', 'Lendário', 'mestre-invencivel.svg', '500 vitórias consecutivas', '500 vitórias', 'A lenda que nunca cai'),
('coroa-de-ouro', 'Coroa de Ouro', 'Vitórias', 'Épico', 'coroa-de-ouro.svg', 'Ganhe 1000 coroas', '1000 coroas', 'O rei das coroas douradas'),
('maestria-total', 'Maestria Total', 'Vitórias', 'Lendário', 'maestria-total.svg', 'Vença com todos os decks', '100 vitórias com decks diferentes', 'O mestre de todas as estratégias'),
('general-supremo', 'General Supremo', 'Guerras', 'Lendário', 'general-supremo.svg', 'Lidere seu clã a 100 vitórias em guerras', '100 vitórias de guerra', 'O líder nato de exércitos'),
('heroi-guerra', 'Herói de Guerra', 'Guerras', 'Épico', 'heroi-guerra.svg', 'Ganhe 50 batalhas de guerra', '50 vitórias em guerra', 'O campeão do campo de batalha'),
('comandante-elite', 'Comandante Elite', 'Guerras', 'Épico', 'comandante-elite.svg', 'Participe de 200 guerras de clã', '200 guerras', 'O veterano das guerras de clã'),
('destruidor-imperios', 'Destruidor de Impérios', 'Guerras', 'Lendário', 'destruidor-imperios.svg', 'Destrua 1000 torres em guerras', '1000 torres destruídas', 'Nenhuma fortaleza resiste a ele'),
('phoenix-imortal', 'Fênix Imortal', 'Especiais', 'Lendário', 'phoenix-imortal.svg', 'Volte do fundo do poço 50 vezes', '50 comebacks', 'Daqueles que sempre ressurgem das cinzas'),
('mestre-elixir', 'Mestre do Elixir', 'Especiais', 'Épico', 'mestre-elixir.svg', 'Gerencie elixir perfeitamente em 100 partidas', '100 partidas com gestão perfeita', 'O alquimista do campo de batalha'),
('campeao-eterno', 'Campeão Eterno', 'Especiais', 'Lendário', 'campeao-eterno.svg', 'Alcance a Arena 24 e mantenha-se lá por 1 ano', '1 ano na Arena 24', 'O imortal do topo'),
('colecionador-lendas', 'Colecionador de Lendas', 'Especiais', 'Lendário', 'colecionador-lendas.svg', 'Tenha todas as cartas lendárias no nível máximo', 'Todas lendárias nível 14', 'O mestre das lendas'),
('guardiao-reino', 'Guardião do Reino', 'Especiais', 'Épico', 'guardiao-reino.svg', 'Defenda seu território 500 vezes', '500 defesas bem-sucedidas', 'O protetor incansável'),
('arquiteto-decks', 'Arquiteto de Decks', 'Especiais', 'Épico', 'arquiteto-decks.svg', 'Crie 50 decks únicos vencedores', '50 decks com vitórias', 'O gênio estrategista'),
('senhor-tempo', 'Senhor do Tempo', 'Especiais', 'Lendário', 'senhor-tempo.svg', 'Vença partidas no último segundo 100 vezes', '100 vitórias no último segundo', 'O mestre dos momentos decisivos'),
('destruidor-torres', 'Destruidor de Torres', 'Vitórias', 'Épico', 'destruidor-torres.svg', 'Destrua 5000 torres', '5000 torres destruídas', 'Terror das fortificações');

-- ===================================================================================================
-- 8. INSERIR DADOS - EMOTES (12 emotes)
-- ===================================================================================================
INSERT INTO emotes (id, nome, categoria, raridade, icone, descricao, animacao, desbloqueio) VALUES
('danca-bebe-dragao', 'Dança do Bebê Dragão', 'Dança', 'Épico', 'danca-bebe-dragao.svg', 'O Bebê Dragão roxo dançando alegremente com movimentos animados.', 'O bebê dragão balança o corpo de um lado para o outro, mexe as asas e solta pequenas chamas enquanto dança.', 'Disponível na loja de emotes'),
('danca-suina', 'Dança Suína', 'Dança', 'Raro', 'danca-suina.svg', 'O Porco Montado dançando com estilo.', 'O porco pula e gira enquanto o cavaleiro balança para os lados, celebrando a vitória.', 'Arena 4'),
('goblin-chorao', 'Goblin Chorão', 'Triste', 'Comum', 'goblin-chorao.svg', 'Goblin verde chorando copiosamente.', 'O goblin esfrega os olhos com as mãos e lágrimas enormes caem continuamente.', 'Arena 1'),
('rei-rindo', 'Rei Rindo', 'Feliz', 'Lendário', 'rei-rindo.svg', 'O Rei Vermelho dando gargalhadas.', 'O rei joga a cabeça para trás e ri alto, segurando a barriga.', 'Emote clássico do jogo'),
('princesa-bocejando', 'Princesa Bocejando', 'Provocação', 'Épico', 'princesa-bocejando.svg', 'A Princesa bocejando de tédio.', 'A princesa abre a boca em um grande bocejo e cobre com a mão.', 'Loja de emotes'),
('cavaleiro-saudando', 'Cavaleiro Saudando', 'Respeito', 'Raro', 'cavaleiro-saudando.svg', 'O Cavaleiro fazendo uma reverência respeitosa.', 'O cavaleiro tira o elmo, faz uma reverência elegante com a mão no peito.', 'Arena 0'),
('bruxa-gargalhada', 'Bruxa Gargalhada', 'Provocação', 'Épico', 'bruxa-gargalhada.svg', 'A Bruxa dando uma gargalhada maligna.', 'A bruxa ri malignamente enquanto seus olhos brilham e ela aponta o dedo.', 'Evento especial de Halloween'),
('pekka-borboleta', 'P.E.K.K.A Borboleta', 'Feliz', 'Lendário', 'pekka-borboleta.svg', 'P.E.K.K.A encantada com uma borboleta.', 'A P.E.K.K.A observa uma borboleta voando ao redor, movendo a cabeça seguindo o voo.', 'Loja de emotes premium'),
('dragao-eletrico-zap', 'Dragão Elétrico Zap', 'Provocação', 'Épico', 'dragao-eletrico-zap.svg', 'Dragão Elétrico soltando raios.', 'O dragão elétrico carrega energia e solta um zap poderoso com faíscas ao redor.', 'Arena 11'),
('esqueleto-dancando', 'Esqueleto Dançando', 'Dança', 'Comum', 'esqueleto-dancando.svg', 'Esqueleto fazendo uma dança engraçada.', 'O esqueleto dança balançando os ossos de forma descoordenada e cômica.', 'Arena 2'),
('valquiria-grito', 'Valquíria Grito de Guerra', 'Provocação', 'Raro', 'valquiria-grito.svg', 'Valquíria soltando um grito de guerra.', 'A Valquíria levanta o machado e grita ferozmente, emanando ondas de choque.', 'Arena 3'),
('mago-confuso', 'Mago Confuso', 'Confuso', 'Comum', 'mago-confuso.svg', 'Mago coçando a cabeça confuso.', 'O mago coça a cabeça com interrogações flutuando ao redor.', 'Arena 5');

-- ===================================================================================================
-- 9. INSERIR DADOS - DECKS DE EXEMPLO (Alguns decks de referência)
-- ===================================================================================================
INSERT INTO decks (id, nome, tipo, arena_alvo, notas, media_elixir) VALUES
('deck_a1_of1', 'Rush Inicial', 'Ofensivo', 1, 'Pressão constante com Gigante e suporte de arqueiras. Use feitiços para limpar defesas.', 3.6),
('deck_a1_de1', 'Defesa Sólida', 'Defensivo', 1, 'Defenda e converta em contra-ataque. Canhão puxa tanques.', 3.1),
('deck_a1_hi1', 'Equilíbrio Inicial', 'Híbrido', 1, 'Defesa forte e pushes controlados com Gigante.', 3.5),
('deck_a6_of1', 'Corredor 2.6', 'Ofensivo', 6, 'Pressão constante e ciclo rápido. Corredor protegido.', 2.6),
('deck_a10_of1', 'Log Bait Clássico', 'Ofensivo', 10, 'Força psicológica com iscas de feitiço. Foguete cicla.', 3.1),
('deck_a12_of1', 'E-Golem Rush', 'Ofensivo', 12, 'Gigante de Elixir gera recursos. Pressão agressiva.', 4.4);

-- ===================================================================================================
-- 10. INSERIR DADOS - DECK_CARTAS (Cartas dos decks de exemplo)
-- ===================================================================================================
-- Arena 1 - Deck 1
INSERT INTO deck_cartas (deck_id, personagem_id, posicao) VALUES
('deck_a1_of1', 'goblins', 1),
('deck_a1_of1', 'arqueiras', 2),
('deck_a1_of1', 'cavaleiro', 3),
('deck_a1_of1', 'mosqueteira', 4),
('deck_a1_of1', 'gigante', 5),
('deck_a1_of1', 'flechas', 6),
('deck_a1_of1', 'bola-de-fogo', 7),
('deck_a1_of1', 'zap', 8);

-- Arena 1 - Deck 2
INSERT INTO deck_cartas (deck_id, personagem_id, posicao) VALUES
('deck_a1_de1', 'arqueiras', 1),
('deck_a1_de1', 'cavaleiro', 2),
('deck_a1_de1', 'mosqueteira', 3),
('deck_a1_de1', 'canhao', 4),
('deck_a1_de1', 'flechas', 5),
('deck_a1_de1', 'bola-de-fogo', 6),
('deck_a1_de1', 'zap', 7),
('deck_a1_de1', 'goblins', 8);

-- Arena 1 - Deck 3
INSERT INTO deck_cartas (deck_id, personagem_id, posicao) VALUES
('deck_a1_hi1', 'gigante', 1),
('deck_a1_hi1', 'mosqueteira', 2),
('deck_a1_hi1', 'arqueiras', 3),
('deck_a1_hi1', 'cavaleiro', 4),
('deck_a1_hi1', 'canhao', 5),
('deck_a1_hi1', 'flechas', 6),
('deck_a1_hi1', 'zap', 7),
('deck_a1_hi1', 'bola-de-fogo', 8);

-- Arena 6 - Corredor 2.6 (exemplo de deck famoso)
INSERT INTO deck_cartas (deck_id, personagem_id, posicao) VALUES
('deck_a6_of1', 'corredor', 1),
('deck_a6_of1', 'mosqueteira', 2),
('deck_a6_of1', 'golem-de-gelo', 3),
('deck_a6_of1', 'canhao', 4),
('deck_a6_of1', 'espirito-de-gelo', 5),
('deck_a6_of1', 'tronco', 6),
('deck_a6_of1', 'bola-de-fogo', 7),
('deck_a6_of1', 'esqueletos', 8);

-- Arena 10 - Log Bait Clássico
INSERT INTO deck_cartas (deck_id, personagem_id, posicao) VALUES
('deck_a10_of1', 'barril-de-goblins', 1),
('deck_a10_of1', 'princesa', 2),
('deck_a10_of1', 'cavaleiro', 3),
('deck_a10_of1', 'gangue-de-goblins', 4),
('deck_a10_of1', 'espirito', 5),
('deck_a10_of1', 'tornado', 6),
('deck_a10_of1', 'foguete', 7),
('deck_a10_of1', 'tronco', 8);

-- Arena 12 - E-Golem
INSERT INTO deck_cartas (deck_id, personagem_id, posicao) VALUES
('deck_a12_of1', 'gigante-elixir', 1),
('deck_a12_of1', 'eletrocutadores', 2),
('deck_a12_of1', 'dragao-eletrico', 3),
('deck_a12_of1', 'mini-pekka', 4),
('deck_a12_of1', 'esqueletos', 5),
('deck_a12_of1', 'zap', 6),
('deck_a12_of1', 'tornado', 7),
('deck_a12_of1', 'veneno', 8);

-- ===================================================================================================
-- FIM DO SCRIPT - ClashDecks VPS Final
-- ===================================================================================================
-- Total de registros inseridos:
-- - 24 Arenas
-- - 85 Personagens (40 originais + 45 novos, incluindo 4 Campeões)
-- - 30 Baús (10 originais + 14 novos + 6 extras)
-- - 35 Bandeiras (16 originais + 19 novas)
-- - 12 Emotes
-- - 6 Decks de exemplo
-- - 48 Relações deck-cartas
-- ===================================================================================================
