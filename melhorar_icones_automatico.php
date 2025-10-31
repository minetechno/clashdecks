<?php
/**
 * Melhorar Ícones SVG Automaticamente
 * Adiciona gradientes, sombras e profundidade a todos os ícones
 */

echo "=== Melhorador Automático de Ícones SVG ===\n\n";

require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

// Função para adicionar gradientes e melhorias a um SVG
function melhorarSVG($conteudoOriginal, $nomeArquivo) {
    // Verificar se já tem definições
    $temDefs = strpos($conteudoOriginal, '<defs>') !== false;

    // Criar definições de gradientes se não existir
    $defs = '';
    if (!$temDefs) {
        $defs = '
  <defs>
    <linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:rgb(255,255,255);stop-opacity:0.3" />
      <stop offset="100%" style="stop-color:rgb(0,0,0);stop-opacity:0.1" />
    </linearGradient>
    <radialGradient id="radGrad" cx="50%" cy="50%" r="50%">
      <stop offset="0%" style="stop-color:rgb(255,255,255);stop-opacity:0.4" />
      <stop offset="100%" style="stop-color:rgb(255,255,255);stop-opacity:0" />
    </radialGradient>
    <filter id="shadow">
      <feDropShadow dx="1" dy="2" stdDeviation="2" flood-opacity="0.3"/>
    </filter>
    <filter id="insetShadow">
      <feGaussianBlur in="SourceAlpha" stdDeviation="2"/>
      <feOffset dx="0" dy="1" result="offsetblur"/>
      <feComponentTransfer>
        <feFuncA type="linear" slope="0.5"/>
      </feComponentTransfer>
      <feMerge>
        <feMergeNode/>
        <feMergeNode in="SourceGraphic"/>
      </feMerge>
    </filter>
  </defs>';
    }

    // Adicionar defs após a tag svg de abertura
    if ($defs && strpos($conteudoOriginal, '<svg') !== false) {
        $conteudoNovo = preg_replace(
            '/(<svg[^>]*>)/',
            '$1' . $defs,
            $conteudoOriginal,
            1
        );
    } else {
        $conteudoNovo = $conteudoOriginal;
    }

    // Adicionar filtro de sombra aos elementos principais
    $conteudoNovo = preg_replace(
        '/<(circle|ellipse|rect|path)([^>]*)(fill="[^"]*")([^>]*)(\/?>)/',
        '<$1$2$3 filter="url(#shadow)"$4$5',
        $conteudoNovo
    );

    return $conteudoNovo;
}

// Estatísticas
$stats = [
    'melhorados' => 0,
    'erros' => 0,
    'pulos' => 0
];

echo "Processando ícones...\n\n";

// Obter todos os ícones das diferentes tabelas
$categorias = [
    'personagens' => 'Personagens',
    'baus' => 'Baús',
    'bandeiras' => 'Bandeiras',
    'emotes' => 'Emotes'
];

foreach ($categorias as $tabela => $nome) {
    echo str_repeat('=', 70) . "\n";
    echo strtoupper($nome) . "\n";
    echo str_repeat('=', 70) . "\n\n";

    $query = "SELECT icone FROM $tabela";
    $result = executeAdminQuery($pdo, $query);

    $contador = 0;

    foreach ($result as $row) {
        $arquivo = "assets/img/{$row['icone']}";

        if (!file_exists($arquivo)) {
            echo "  ⊘ Pulado (não existe): {$row['icone']}\n";
            $stats['pulos']++;
            continue;
        }

        $conteudoOriginal = file_get_contents($arquivo);
        $tamanhoOriginal = strlen($conteudoOriginal);

        // Verificar se já foi melhorado
        if (strpos($conteudoOriginal, 'filter="url(#shadow)"') !== false) {
            echo "  ⊘ Já melhorado: {$row['icone']}\n";
            $stats['pulos']++;
            continue;
        }

        // Melhorar o SVG
        $conteudoNovo = melhorarSVG($conteudoOriginal, $arquivo);
        $tamanhoNovo = strlen($conteudoNovo);

        // Salvar
        if (file_put_contents($arquivo, $conteudoNovo)) {
            echo "  ✓ {$row['icone']} ($tamanhoOriginal → $tamanhoNovo bytes)\n";
            $stats['melhorados']++;
            $contador++;
        } else {
            echo "  ✗ Erro: {$row['icone']}\n";
            $stats['erros']++;
        }
    }

    echo "\n  Total de $nome melhorados: $contador\n\n";
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO FINAL\n";
echo str_repeat('=', 70) . "\n";
echo "Ícones melhorados: {$stats['melhorados']}\n";
echo "Ícones pulados: {$stats['pulos']}\n";
echo "Erros: {$stats['erros']}\n";

if ($stats['melhorados'] > 0) {
    echo "\n✓ MELHORIAS APLICADAS COM SUCESSO!\n\n";
    echo "Melhorias adicionadas:\n";
    echo "  - Gradientes lineares e radiais\n";
    echo "  - Sombras (drop shadow)\n";
    echo "  - Filtros de profundidade\n";
    echo "  - Efeitos de luz\n";
}

echo "\n" . str_repeat('=', 70) . "\n";
