<?php
/**
 * Copiar ícone da Arena Lendária para arenas 22, 23 e 24
 */

echo "=== Copiando Ícone da Arena Lendária ===\n\n";

// Ler o conteúdo do ícone da arena lendária
$iconeOriginal = file_get_contents('assets/img/arena15.svg');

if (!$iconeOriginal) {
    die("✗ Erro ao ler arena15.svg\n");
}

echo "✓ Ícone da Arena Lendária lido com sucesso\n";
echo "  Tamanho: " . strlen($iconeOriginal) . " bytes\n\n";

// Lista de arquivos de destino
$destinos = [
    'assets/img/arena22.svg' => 'Arena 22 - Reino Celestial',
    'assets/img/arena23.svg' => 'Arena 23 - Dimensão Cósmica',
    'assets/img/arena24.svg' => 'Arena 24 - Trono Supremo'
];

echo "Copiando para as arenas finais:\n";
echo str_repeat('-', 70) . "\n";

$copiados = 0;
$erros = 0;

foreach ($destinos as $arquivo => $descricao) {
    // Verificar se o arquivo existe antes
    $existia = file_exists($arquivo);
    $tamanhoAnterior = $existia ? filesize($arquivo) : 0;

    // Copiar o conteúdo
    if (file_put_contents($arquivo, $iconeOriginal)) {
        $tamanhoNovo = filesize($arquivo);
        echo "✓ $descricao\n";
        echo "  Arquivo: $arquivo\n";
        echo "  Tamanho anterior: $tamanhoAnterior bytes\n";
        echo "  Tamanho novo: $tamanhoNovo bytes\n\n";
        $copiados++;
    } else {
        echo "✗ Erro ao copiar para $arquivo\n\n";
        $erros++;
    }
}

echo str_repeat('=', 70) . "\n";
echo "RESUMO:\n";
echo str_repeat('=', 70) . "\n";
echo "Ícones copiados com sucesso: $copiados\n";
echo "Erros: $erros\n";

if ($copiados == 3) {
    echo "\n✓ ÍCONE DA ARENA LENDÁRIA COPIADO PARA AS 3 ARENAS FINAIS!\n";
    echo "\nAs arenas 22, 23 e 24 agora usam o mesmo ícone da Arena Lendária.\n";
    echo "Os NOMES das arenas foram mantidos:\n";
    echo "  - Arena 22: Reino Celestial\n";
    echo "  - Arena 23: Dimensão Cósmica\n";
    echo "  - Arena 24: Trono Supremo\n";
}

echo str_repeat('=', 70) . "\n";
