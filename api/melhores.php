<?php
/**
 * API para retornar os melhores personagens por categoria
 */

require_once 'config.php';

header('Content-Type: application/json');
header('Cache-Control: max-age=900'); // Cache de 15 minutos

try {
    $pdo = getDBConnection();

    // Melhores Ofensivos - Alto dano, tropas de ataque, feitiços ofensivos
    $melhoresOfensivos = [
        'pekka',
        'megacavaleiro',
        'gigante-eletrico',
        'principe',
        'valquiria',
        'sparky',
        'gigante',
        'foguete'
    ];

    // Melhores Defensivos - Estruturas, controle de área, tropas defensivas
    $melhoresDefensivos = [
        'tesla',
        'torre-inferno',
        'fornalha',
        'cabana-de-goblins',
        'tornado',
        'veneno',
        'bruxa',
        'executor'
    ];

    // Melhores Versáteis - Funcionam bem em ataque e defesa
    $melhoresVersateis = [
        'cavaleiro',
        'bola-de-fogo',
        'zap',
        'mago',
        'mini-pekka',
        'arqueiras',
        'esqueletos',
        'flechas'
    ];

    // Função para buscar personagens
    function buscarPersonagens($pdo, $ids) {
        if (empty($ids)) {
            return [];
        }

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $query = "SELECT id, nome, tipo, raridade, elixir, arena_desbloqueio, icone, descricao
                  FROM personagens
                  WHERE id IN ($placeholders)
                  ORDER BY FIELD(id, " . $placeholders . ")";

        $stmt = $pdo->prepare($query);
        $params = array_merge($ids, $ids); // Duplicar para o FIELD()
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar cada categoria
    $ofensivos = buscarPersonagens($pdo, $melhoresOfensivos);
    $defensivos = buscarPersonagens($pdo, $melhoresDefensivos);
    $versateis = buscarPersonagens($pdo, $melhoresVersateis);

    $response = [
        'success' => true,
        'data' => [
            'ofensivos' => $ofensivos,
            'defensivos' => $defensivos,
            'versateis' => $versateis
        ],
        'totais' => [
            'ofensivos' => count($ofensivos),
            'defensivos' => count($defensivos),
            'versateis' => count($versateis)
        ]
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Erro ao buscar melhores personagens',
        'message' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
