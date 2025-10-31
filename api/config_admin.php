<?php
/**
 * Configuração Administrativa do Banco de Dados - ClashDecks
 *
 * ATENÇÃO: Este arquivo é para operações administrativas (INSERT, UPDATE, DELETE)
 * Use apenas para manutenção do banco de dados.
 *
 * CREDENCIAIS ADMIN:
 * - Host: localhost
 * - Usuário: root
 * - Senha: (vazia)
 * - Banco: clashdecks_db
 */

// Configurações do banco de dados (ROOT para operações administrativas)
define('ADMIN_DB_HOST', 'localhost');
define('ADMIN_DB_NAME', 'clashdecks_db');
define('ADMIN_DB_USER', 'root');
define('ADMIN_DB_PASS', ''); // Senha vazia
define('ADMIN_DB_CHARSET', 'utf8mb4');

/**
 * Cria e retorna uma conexão PDO administrativa com o banco de dados
 *
 * @return PDO Conexão PDO com privilégios de root
 * @throws PDOException Se houver erro na conexão
 */
function getAdminDBConnection() {
    try {
        $dsn = "mysql:host=" . ADMIN_DB_HOST . ";port=3307;dbname=" . ADMIN_DB_NAME . ";charset=" . ADMIN_DB_CHARSET;

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, ADMIN_DB_USER, ADMIN_DB_PASS, $options);

        return $pdo;
    } catch (PDOException $e) {
        error_log("Erro de conexão administrativa com banco de dados: " . $e->getMessage());

        echo "ERRO: Não foi possível conectar ao banco de dados.\n";
        echo "Detalhes: " . $e->getMessage() . "\n";
        exit(1);
    }
}

/**
 * Executa query administrativa (INSERT, UPDATE, DELETE)
 *
 * @param PDO $pdo Conexão PDO
 * @param string $query Query SQL
 * @param array $params Parâmetros para prepared statement
 * @return mixed Resultado da query (rowCount para INSERT/UPDATE/DELETE)
 */
function executeAdminQuery($pdo, $query, $params = []) {
    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);

        // Para SELECT retorna resultados
        if (stripos($query, 'SELECT') === 0) {
            return $stmt->fetchAll();
        }

        // Para INSERT/UPDATE/DELETE retorna número de linhas afetadas
        return $stmt->rowCount();
    } catch (PDOException $e) {
        error_log("Erro na query administrativa: " . $e->getMessage());
        echo "ERRO ao executar query.\n";
        echo "Query: " . $query . "\n";
        echo "Detalhes: " . $e->getMessage() . "\n";
        exit(1);
    }
}

/**
 * Insere um novo personagem no banco
 *
 * @param PDO $pdo Conexão PDO
 * @param array $data Dados do personagem
 * @return int Número de linhas inseridas
 */
function inserirPersonagem($pdo, $data) {
    $query = "INSERT INTO personagens (id, nome, tipo, raridade, elixir, arena_desbloqueio, icone, descricao, sinergias, counters)
              VALUES (:id, :nome, :tipo, :raridade, :elixir, :arena_desbloqueio, :icone, :descricao, :sinergias, :counters)";

    $params = [
        ':id' => $data['id'],
        ':nome' => $data['nome'],
        ':tipo' => $data['tipo'],
        ':raridade' => $data['raridade'],
        ':elixir' => $data['elixir'],
        ':arena_desbloqueio' => $data['arena_desbloqueio'],
        ':icone' => $data['icone'],
        ':descricao' => $data['descricao'],
        ':sinergias' => json_encode($data['sinergias'] ?? []),
        ':counters' => json_encode($data['counters'] ?? [])
    ];

    return executeAdminQuery($pdo, $query, $params);
}

/**
 * Insere uma nova arena no banco
 *
 * @param PDO $pdo Conexão PDO
 * @param array $data Dados da arena
 * @return int Número de linhas inseridas
 */
function inserirArena($pdo, $data) {
    $query = "INSERT INTO arenas (id, nome, icone) VALUES (:id, :nome, :icone)";

    $params = [
        ':id' => $data['id'],
        ':nome' => $data['nome'],
        ':icone' => $data['icone']
    ];

    return executeAdminQuery($pdo, $query, $params);
}

/**
 * Insere um novo deck no banco
 *
 * @param PDO $pdo Conexão PDO
 * @param array $data Dados do deck
 * @param array $cartas Array de IDs de personagens (8 cartas)
 * @return int ID do deck inserido
 */
function inserirDeck($pdo, $data, $cartas) {
    // Insere o deck
    $query = "INSERT INTO decks (id, nome, tipo, arena_alvo, notas, media_elixir)
              VALUES (:id, :nome, :tipo, :arena_alvo, :notas, :media_elixir)";

    $params = [
        ':id' => $data['id'],
        ':nome' => $data['nome'],
        ':tipo' => $data['tipo'],
        ':arena_alvo' => $data['arena_alvo'],
        ':notas' => $data['notas'],
        ':media_elixir' => $data['media_elixir']
    ];

    executeAdminQuery($pdo, $query, $params);

    // Insere as cartas do deck
    foreach ($cartas as $posicao => $personagem_id) {
        $queryCartas = "INSERT INTO deck_cartas (deck_id, personagem_id, posicao)
                        VALUES (:deck_id, :personagem_id, :posicao)";

        $paramsCartas = [
            ':deck_id' => $data['id'],
            ':personagem_id' => $personagem_id,
            ':posicao' => $posicao + 1 // Posição começa em 1
        ];

        executeAdminQuery($pdo, $queryCartas, $paramsCartas);
    }

    return $pdo->lastInsertId();
}

/**
 * Atualiza um personagem existente
 *
 * @param PDO $pdo Conexão PDO
 * @param string $id ID do personagem
 * @param array $data Dados a atualizar
 * @return int Número de linhas afetadas
 */
function atualizarPersonagem($pdo, $id, $data) {
    $campos = [];
    $params = [':id' => $id];

    foreach ($data as $campo => $valor) {
        if ($campo === 'sinergias' || $campo === 'counters') {
            $valor = json_encode($valor);
        }
        $campos[] = "$campo = :$campo";
        $params[":$campo"] = $valor;
    }

    $query = "UPDATE personagens SET " . implode(', ', $campos) . " WHERE id = :id";

    return executeAdminQuery($pdo, $query, $params);
}

/**
 * Remove um deck do banco (incluindo suas cartas)
 *
 * @param PDO $pdo Conexão PDO
 * @param string $deckId ID do deck
 * @return int Número de linhas afetadas
 */
function removerDeck($pdo, $deckId) {
    // Remove cartas primeiro (foreign key)
    $queryCartas = "DELETE FROM deck_cartas WHERE deck_id = :deck_id";
    executeAdminQuery($pdo, $queryCartas, [':deck_id' => $deckId]);

    // Remove o deck
    $queryDeck = "DELETE FROM decks WHERE id = :id";
    return executeAdminQuery($pdo, $queryDeck, [':id' => $deckId]);
}
