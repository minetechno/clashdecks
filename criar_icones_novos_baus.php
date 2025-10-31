<?php
/**
 * Criar Ícones SVG dos Novos Baús
 */

echo "=== Criando Ícones SVG - Novos Baús ===\n\n";

$icones = [
    // Baú Lendário - Dourado com gemas roxas
    'bau-lendario' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="24" width="32" height="28" fill="#FFD700" stroke="#E0A000" stroke-width="2" rx="2"/>
  <rect x="20" y="28" width="24" height="20" fill="#FFA000"/>
  <circle cx="32" cy="38" r="8" fill="#9C27B0"/>
  <polygon points="32,32 28,38 32,36 36,38" fill="#E1BEE7"/>
  <rect x="24" y="16" width="16" height="10" fill="#E0A000" stroke="#BF360C" stroke-width="1.5"/>
  <rect x="28" y="14" width="8" height="4" fill="#D32F2F"/>
  <rect x="14" y="50" width="36" height="4" fill="#BF360C"/>
  <circle cx="24" cy="38" r="2" fill="#FFEB3B"/>
  <circle cx="40" cy="38" r="2" fill="#FFEB3B"/>
</svg>',

    // Baú Real - Azul royal com coroa
    'bau-real' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="24" width="32" height="28" fill="#1976D2" stroke="#0D47A1" stroke-width="2" rx="2"/>
  <rect x="20" y="28" width="24" height="20" fill="#1565C0"/>
  <polygon points="32,28 28,34 32,32 36,34" fill="#FFD700"/>
  <circle cx="32" cy="34" r="4" fill="#FFEB3B"/>
  <rect x="24" y="16" width="16" height="10" fill="#0D47A1" stroke="#01579B" stroke-width="1.5"/>
  <polygon points="32,10 28,16 36,16" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <circle cx="30" cy="14" r="1.5" fill="#E91E63"/>
  <circle cx="34" cy="14" r="1.5" fill="#E91E63"/>
  <rect x="14" y="50" width="36" height="4" fill="#01579B"/>
</svg>',

    // Baú Épico - Roxo com detalhes
    'bau-epico' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="24" width="32" height="28" fill="#7B1FA2" stroke="#4A148C" stroke-width="2" rx="2"/>
  <rect x="20" y="28" width="24" height="20" fill="#6A1B9A"/>
  <circle cx="32" cy="38" r="6" fill="#E1BEE7"/>
  <circle cx="32" cy="38" r="3" fill="#FFFFFF"/>
  <rect x="24" y="16" width="16" height="10" fill="#4A148C" stroke="#2A0845" stroke-width="1.5"/>
  <rect x="28" y="14" width="8" height="4" fill="#6A1B9A"/>
  <rect x="14" y="50" width="36" height="4" fill="#2A0845"/>
  <rect x="22" y="32" width="2" height="12" fill="#9C27B0"/>
  <rect x="40" y="32" width="2" height="12" fill="#9C27B0"/>
</svg>',

    // Baú de Temporada - Multicolorido/festivo
    'bau-de-temporada' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="24" width="32" height="28" fill="#E91E63" stroke="#C2185B" stroke-width="2" rx="2"/>
  <rect x="16" y="28" width="10" height="20" fill="#9C27B0"/>
  <rect x="27" y="28" width="10" height="20" fill="#2196F3"/>
  <rect x="38" y="28" width="10" height="20" fill="#4CAF50"/>
  <circle cx="32" cy="38" r="6" fill="#FFD700"/>
  <polygon points="32,34 30,38 32,36 34,38" fill="#FFFFFF"/>
  <rect x="24" y="16" width="16" height="10" fill="#C2185B" stroke="#880E4F" stroke-width="1.5"/>
  <rect x="28" y="14" width="8" height="4" fill="#FFD700"/>
  <rect x="14" y="50" width="36" height="4" fill="#880E4F"/>
</svg>',

    // Baú de Desafio - Laranja com símbolo de troféu
    'bau-de-desafio' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="24" width="32" height="28" fill="#FF6F00" stroke="#E65100" stroke-width="2" rx="2"/>
  <rect x="20" y="28" width="24" height="20" fill="#F57C00"/>
  <path d="M 32,30 L 28,36 L 32,40 L 36,36 Z" fill="#FFD700"/>
  <circle cx="32" cy="36" r="3" fill="#FFEB3B"/>
  <rect x="24" y="16" width="16" height="10" fill="#E65100" stroke="#BF360C" stroke-width="1.5"/>
  <rect x="28" y="14" width="8" height="4" fill="#FF6F00"/>
  <rect x="14" y="50" width="36" height="4" fill="#BF360C"/>
  <polygon points="26,34 26,38 30,36" fill="#FFA000"/>
  <polygon points="38,34 38,38 34,36" fill="#FFA000"/>
</svg>',

    // Baú de Vitória - Verde com V
    'bau-de-vitoria' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="24" width="32" height="28" fill="#388E3C" stroke="#1B5E20" stroke-width="2" rx="2"/>
  <rect x="20" y="28" width="24" height="20" fill="#2E7D32"/>
  <path d="M 26,32 L 30,40 L 38,28" stroke="#FFEB3B" stroke-width="3" fill="none" stroke-linecap="round"/>
  <rect x="24" y="16" width="16" height="10" fill="#1B5E20" stroke="#0D3A0D" stroke-width="1.5"/>
  <rect x="28" y="14" width="8" height="4" fill="#388E3C"/>
  <rect x="14" y="50" width="36" height="4" fill="#0D3A0D"/>
  <circle cx="38" cy="28" r="2" fill="#FFEB3B" opacity="0.5"/>
</svg>',

    // Baú de Guerra - Vermelho com espadas cruzadas
    'bau-de-guerra' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="24" width="32" height="28" fill="#C62828" stroke="#8E0000" stroke-width="2" rx="2"/>
  <rect x="20" y="28" width="24" height="20" fill="#B71C1C"/>
  <path d="M 24,34 L 40,44 M 40,34 L 24,44" stroke="#FFD700" stroke-width="3" stroke-linecap="round"/>
  <circle cx="24" cy="34" r="2" fill="#FFD700"/>
  <circle cx="40" cy="34" r="2" fill="#FFD700"/>
  <circle cx="24" cy="44" r="2" fill="#FFD700"/>
  <circle cx="40" cy="44" r="2" fill="#FFD700"/>
  <rect x="24" y="16" width="16" height="10" fill="#8E0000" stroke="#5C0000" stroke-width="1.5"/>
  <rect x="28" y="14" width="8" height="4" fill="#C62828"/>
  <rect x="14" y="50" width="36" height="4" fill="#5C0000"/>
</svg>',

    // Baú de Torneio - Prata/Platinum com estrela
    'bau-de-torneio' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="24" width="32" height="28" fill="#CFD8DC" stroke="#78909C" stroke-width="2" rx="2"/>
  <rect x="20" y="28" width="24" height="20" fill="#B0BEC5"/>
  <polygon points="32,30 30,36 24,36 29,40 27,46 32,42 37,46 35,40 40,36 34,36" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <circle cx="32" cy="38" r="3" fill="#FFEB3B"/>
  <rect x="24" y="16" width="16" height="10" fill="#78909C" stroke="#546E7A" stroke-width="1.5"/>
  <rect x="28" y="14" width="8" height="4" fill="#CFD8DC"/>
  <rect x="14" y="50" width="36" height="4" fill="#546E7A"/>
  <circle cx="26" cy="32" r="1.5" fill="#FFE082"/>
  <circle cx="38" cy="32" r="1.5" fill="#FFE082"/>
  <circle cx="26" cy="44" r="1.5" fill="#FFE082"/>
  <circle cx="38" cy="44" r="1.5" fill="#FFE082"/>
</svg>'
];

$totalCriados = 0;
$totalErros = 0;

foreach ($icones as $id => $svg) {
    $arquivo = "assets/img/$id.svg";

    try {
        file_put_contents($arquivo, $svg);
        echo "✓ Criado: $arquivo\n";
        $totalCriados++;
    } catch (Exception $e) {
        echo "✗ ERRO ao criar $arquivo: " . $e->getMessage() . "\n";
        $totalErros++;
    }
}

echo "\n======================================================================\n";
echo "RESUMO:\n";
echo "======================================================================\n";
echo "Ícones criados: $totalCriados\n";
echo "Erros: $totalErros\n";
echo "\n✓ Ícones SVG dos baús criados com sucesso!\n";
