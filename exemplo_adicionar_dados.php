<?php
/**
 * Exemplo Prático: Adicionar Dados ao Banco
 *
 * Este script demonstra como adicionar novos dados ao banco de dados
 * usando a configuração administrativa (config_admin.php)
 *
 * USO:
 * php exemplo_adicionar_dados.php
 */

require_once __DIR__ . '/api/config_admin.php';

echo "=== Exemplo de Adição de Dados - ClashDecks ===\n\n";

try {
    // Conecta ao banco com privilégios administrativos
    $pdo = getAdminDBConnection();
    echo "✓ Conectado ao banco com privilégios administrativos\n\n";

    // ========================================
    // EXEMPLO 1: Adicionar um novo personagem
    // ========================================
    echo "Exemplo 1: Adicionando novo personagem 'Mega Cavaleiro'...\n";

    $novoPersonagem = [
        'id' => 'mega-cavaleiro',
        'nome' => 'Mega Cavaleiro',
        'tipo' => 'Tropa',
        'raridade' => 'Lendário',
        'elixir' => 7,
        'arena_desbloqueio' => 7,
        'icone' => 'mega-cavaleiro.svg',
        'descricao' => 'Unidade pesada que causa dano em área ao pousar. Possui muito HP e ataca corpo a corpo.',
        'sinergias' => ['cavaleiro', 'bola-de-fogo', 'zap'],
        'counters' => ['mini-pekka', 'esqueletos', 'bruxa']
    ];

    try {
        inserirPersonagem($pdo, $novoPersonagem);
        echo "  ✓ Personagem 'Mega Cavaleiro' adicionado com sucesso!\n\n";
    } catch (Exception $e) {
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "  ⚠ Personagem 'Mega Cavaleiro' já existe no banco\n\n";
        } else {
            throw $e;
        }
    }

    // ========================================
    // EXEMPLO 2: Adicionar uma nova arena
    // ========================================
    echo "Exemplo 2: Adicionando nova arena 'Arena 22 - Arena Infinita'...\n";

    $novaArena = [
        'id' => 22,
        'nome' => 'Arena Infinita',
        'icone' => 'arena-22.svg'
    ];

    try {
        inserirArena($pdo, $novaArena);
        echo "  ✓ Arena 'Arena Infinita' adicionada com sucesso!\n\n";
    } catch (Exception $e) {
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "  ⚠ Arena 'Arena Infinita' já existe no banco\n\n";
        } else {
            throw $e;
        }
    }

    // ========================================
    // EXEMPLO 3: Adicionar um novo deck
    // ========================================
    echo "Exemplo 3: Adicionando novo deck 'Mega Knight Control'...\n";

    $novoDeck = [
        'id' => 'deck_a7_mega_control',
        'nome' => 'Mega Knight Control',
        'tipo' => 'Híbrido',
        'arena_alvo' => 7,
        'notas' => 'Deck de controle usando Mega Cavaleiro como carta principal. Use-o para defender e contra-atacar.',
        'media_elixir' => 3.8
    ];

    $cartasDeck = [
        'mega-cavaleiro',
        'cavaleiro',
        'bola-de-fogo',
        'zap',
        'esqueletos',
        'mosqueteira',
        'flechas',
        'corredor'
    ];

    try {
        inserirDeck($pdo, $novoDeck, $cartasDeck);
        echo "  ✓ Deck 'Mega Knight Control' adicionado com sucesso!\n\n";
    } catch (Exception $e) {
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "  ⚠ Deck 'Mega Knight Control' já existe no banco\n\n";
        } else {
            throw $e;
        }
    }

    // ========================================
    // EXEMPLO 4: Atualizar um personagem
    // ========================================
    echo "Exemplo 4: Atualizando descrição do Mega Cavaleiro...\n";

    try {
        atualizarPersonagem($pdo, 'mega-cavaleiro', [
            'descricao' => 'Unidade pesada que causa dano em área ao pousar. Perfeito para defender e contra-atacar!'
        ]);
        echo "  ✓ Personagem atualizado com sucesso!\n\n";
    } catch (Exception $e) {
        echo "  ⚠ Erro ao atualizar: " . $e->getMessage() . "\n\n";
    }

    // ========================================
    // VERIFICAÇÃO FINAL
    // ========================================
    echo "Verificando dados atuais no banco:\n";
    echo str_repeat("-", 50) . "\n";

    $result = executeAdminQuery($pdo, 'SELECT COUNT(*) as total FROM arenas');
    echo "Total de Arenas: " . $result[0]['total'] . "\n";

    $result = executeAdminQuery($pdo, 'SELECT COUNT(*) as total FROM personagens');
    echo "Total de Personagens: " . $result[0]['total'] . "\n";

    $result = executeAdminQuery($pdo, 'SELECT COUNT(*) as total FROM decks');
    echo "Total de Decks: " . $result[0]['total'] . "\n";

    echo str_repeat("-", 50) . "\n\n";
    echo "✓ Script concluído com sucesso!\n\n";

    // ========================================
    // NOTA IMPORTANTE
    // ========================================
    echo "NOTA: Para reverter as mudanças deste exemplo, execute:\n";
    echo "  DELETE FROM deck_cartas WHERE deck_id = 'deck_a7_mega_control';\n";
    echo "  DELETE FROM decks WHERE id = 'deck_a7_mega_control';\n";
    echo "  DELETE FROM personagens WHERE id = 'mega-cavaleiro';\n";
    echo "  DELETE FROM arenas WHERE id = 22;\n\n";

} catch (Exception $e) {
    echo "\n✗ ERRO: " . $e->getMessage() . "\n";
    exit(1);
}
