<?php
/**
 * Criar Ícones SVG para 11 Novos Personagens
 */

echo "=== Criando Ícones SVG - 11 Personagens ===\n\n";

$icones = [
    'porcos-reais.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="32" r="30" fill="#FFB6C1"/>
  <circle cx="25" cy="28" r="8" fill="#FF69B4"/>
  <circle cx="39" cy="28" r="8" fill="#FF69B4"/>
  <circle cx="22" cy="25" r="2" fill="#000"/>
  <circle cx="42" cy="25" r="2" fill="#000"/>
  <ellipse cx="25" cy="32" rx="3" ry="4" fill="#FF1493"/>
  <ellipse cx="39" cy="32" rx="3" ry="4" fill="#FF1493"/>
  <rect x="20" y="40" width="24" height="3" fill="#FFD700"/>
  <path d="M 28 20 L 32 15 L 36 20" fill="#FFD700" stroke="#DAA520" stroke-width="1"/>
  <text x="32" y="54" font-size="10" text-anchor="middle" fill="#000" font-weight="bold">4x</text>
</svg>',

    'berserker.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="32" r="30" fill="#8B0000"/>
  <circle cx="32" cy="28" r="12" fill="#DC143C"/>
  <circle cx="28" cy="26" r="2" fill="#FFFF00"/>
  <circle cx="36" cy="26" r="2" fill="#FFFF00"/>
  <path d="M 26 32 Q 32 36 38 32" stroke="#000" stroke-width="2" fill="none"/>
  <rect x="28" y="38" width="8" height="12" fill="#696969"/>
  <path d="M 20 15 L 25 10 L 22 18 M 44 15 L 39 10 L 42 18" fill="#FFD700"/>
  <circle cx="32" cy="28" r="3" fill="#FF4500" opacity="0.5"/>
  <path d="M 15 28 L 20 26 L 20 30 Z M 49 28 L 44 26 L 44 30 Z" fill="#A9A9A9"/>
</svg>',

    'lapide.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="20" y="42" width="24" height="8" fill="#4A4A4A"/>
  <rect x="24" y="20" width="16" height="22" rx="8" fill="#808080"/>
  <path d="M 24 30 L 40 30 M 24 35 L 40 35" stroke="#000" stroke-width="1" opacity="0.3"/>
  <circle cx="28" cy="26" r="2" fill="#000"/>
  <circle cx="36" cy="26" r="2" fill="#000"/>
  <path d="M 30 32 L 34 32" stroke="#000" stroke-width="1"/>
  <circle cx="18" cy="48" r="3" fill="#FFF"/>
  <circle cx="46" cy="48" r="3" fill="#FFF"/>
  <circle cx="18" cy="48" r="1.5" fill="#000"/>
  <circle cx="46" cy="48" r="1.5" fill="#000"/>
</svg>',

    'bombardeiro.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="35" r="15" fill="#4169E1"/>
  <circle cx="32" cy="22" r="8" fill="#FFE4B5"/>
  <circle cx="30" cy="20" r="2" fill="#000"/>
  <circle cx="34" cy="20" r="2" fill="#000"/>
  <path d="M 30 25 Q 32 27 34 25" stroke="#000" stroke-width="1" fill="none"/>
  <circle cx="45" cy="20" r="6" fill="#000"/>
  <line x1="40" y1="18" x2="35" y2="15" stroke="#000" stroke-width="2"/>
  <circle cx="45" cy="20" r="3" fill="#FF4500"/>
  <rect x="26" y="45" width="5" height="8" fill="#4169E1"/>
  <rect x="33" y="45" width="5" height="8" fill="#4169E1"/>
</svg>',

    'torres-de-bombas.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="20" y="25" width="24" height="30" fill="#696969"/>
  <rect x="22" y="27" width="20" height="26" fill="#808080"/>
  <rect x="18" y="52" width="28" height="5" fill="#4A4A4A"/>
  <circle cx="32" cy="20" r="8" fill="#000"/>
  <circle cx="32" cy="20" r="5" fill="#FF4500"/>
  <rect x="28" y="35" width="8" height="10" fill="#4A4A4A"/>
  <circle cx="32" cy="40" r="3" fill="#FFA500"/>
  <path d="M 20 30 L 44 30 M 20 45 L 44 45" stroke="#4A4A4A" stroke-width="2"/>
  <circle cx="26" cy="15" r="2" fill="#FFD700"/>
  <circle cx="38" cy="15" r="2" fill="#FFD700"/>
</svg>',

    'coletor-de-elixir.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="20" y="30" width="24" height="25" fill="#4B0082"/>
  <rect x="22" y="32" width="20" height="21" fill="#9370DB"/>
  <rect x="18" y="52" width="28" height="5" fill="#2F1B4A"/>
  <circle cx="32" cy="42" r="6" fill="#FF00FF"/>
  <circle cx="32" cy="42" r="4" fill="#FF69B4"/>
  <rect x="30" y="20" width="4" height="12" fill="#9370DB"/>
  <ellipse cx="32" cy="20" rx="6" ry="3" fill="#BA55D3"/>
  <circle cx="26" cy="38" r="2" fill="#FF00FF" opacity="0.6"/>
  <circle cx="38" cy="46" r="2" fill="#FF00FF" opacity="0.6"/>
  <circle cx="32" cy="48" r="1.5" fill="#FFF" opacity="0.8"/>
</svg>',

    'barril-de-esqueletos.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="32" cy="38" rx="14" ry="16" fill="#8B4513"/>
  <ellipse cx="32" cy="38" rx="12" ry="14" fill="#A0522D"/>
  <rect x="30" y="22" width="4" height="8" fill="#8B4513"/>
  <path d="M 20 32 Q 32 30 44 32 M 20 40 Q 32 42 44 40 M 20 48 Q 32 46 44 48" stroke="#654321" stroke-width="1.5" fill="none"/>
  <circle cx="28" cy="35" r="3" fill="#FFF"/>
  <circle cx="36" cy="35" r="3" fill="#FFF"/>
  <circle cx="28" cy="35" r="1.5" fill="#000"/>
  <circle cx="36" cy="35" r="1.5" fill="#000"/>
  <path d="M 28 42 L 32 40 L 36 42" stroke="#FFF" stroke-width="2" fill="none"/>
  <path d="M 32 15 Q 28 18 30 22 M 32 15 Q 36 18 34 22" stroke="#000" stroke-width="2" fill="none"/>
</svg>',

    'carrinho-de-canhao.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="18" y="35" width="28" height="12" rx="2" fill="#4682B4"/>
  <rect x="20" y="37" width="24" height="8" fill="#87CEEB"/>
  <circle cx="25" cy="47" r="5" fill="#2F4F4F"/>
  <circle cx="25" cy="47" r="3" fill="#696969"/>
  <circle cx="41" cy="47" r="5" fill="#2F4F4F"/>
  <circle cx="41" cy="47" r="3" fill="#696969"/>
  <rect x="30" y="25" width="16" height="6" rx="2" fill="#696969"/>
  <rect x="42" y="27" width="8" height="3" fill="#4A4A4A"/>
  <circle cx="46" cy="28" r="2" fill="#FFD700"/>
  <path d="M 20 40 L 18 35 L 22 35 Z M 46 40 L 48 35 L 44 35 Z" fill="#FFD700"/>
</svg>',

    'gigante-real.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="24" y="38" width="16" height="18" fill="#4169E1"/>
  <circle cx="32" cy="24" r="10" fill="#FFE4B5"/>
  <circle cx="29" cy="22" r="2" fill="#000"/>
  <circle cx="35" cy="22" r="2" fill="#000"/>
  <path d="M 29 28 Q 32 30 35 28" stroke="#000" stroke-width="2" fill="none"/>
  <path d="M 20 18 Q 22 12 28 14 M 44 18 Q 42 12 36 14" fill="#8B4513"/>
  <rect x="28" y="18" width="8" height="6" fill="#FFD700"/>
  <path d="M 28 18 L 32 12 L 36 18" fill="#FFD700" stroke="#DAA520" stroke-width="1"/>
  <rect x="36" y="32" width="12" height="6" fill="#696969"/>
  <circle cx="48" cy="35" r="3" fill="#4A4A4A"/>
  <rect x="20" y="54" width="8" height="4" fill="#4169E1"/>
  <rect x="36" y="54" width="8" height="4" fill="#4169E1"/>
</svg>',

    'goblins-lanceiros.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="20" cy="32" r="8" fill="#90EE90"/>
  <circle cx="32" cy="28" r="8" fill="#90EE90"/>
  <circle cx="44" cy="32" r="8" fill="#90EE90"/>
  <circle cx="18" cy="30" r="2" fill="#000"/>
  <circle cx="30" cy="26" r="2" fill="#000"/>
  <circle cx="42" cy="30" r="2" fill="#000"/>
  <path d="M 17 35 Q 20 37 23 35" stroke="#000" stroke-width="1" fill="none"/>
  <path d="M 29 31 Q 32 33 35 31" stroke="#000" stroke-width="1" fill="none"/>
  <path d="M 41 35 Q 44 37 47 35" stroke="#000" stroke-width="1" fill="none"/>
  <line x1="20" y1="40" x2="20" y2="52" stroke="#8B4513" stroke-width="2"/>
  <line x1="32" y1="36" x2="32" y2="48" stroke="#8B4513" stroke-width="2"/>
  <line x1="44" y1="40" x2="44" y2="52" stroke="#8B4513" stroke-width="2"/>
  <polygon points="20,52 18,56 22,56" fill="#A0522D"/>
  <polygon points="32,48 30,52 34,52" fill="#A0522D"/>
  <polygon points="44,52 42,56 46,56" fill="#A0522D"/>
</svg>',

    'patifes.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="22" cy="26" r="8" fill="#FFA500"/>
  <circle cx="32" cy="30" r="9" fill="#4682B4"/>
  <circle cx="42" cy="26" r="8" fill="#FFA500"/>
  <circle cx="20" cy="24" r="2" fill="#000"/>
  <circle cx="30" cy="28" r="2" fill="#000"/>
  <circle cx="40" cy="24" r="2" fill="#000"/>
  <path d="M 19 30 Q 22 32 25 30" stroke="#000" stroke-width="1" fill="none"/>
  <path d="M 29 34 Q 32 36 35 34" stroke="#000" stroke-width="1" fill="none"/>
  <path d="M 39 30 Q 42 32 45 30" stroke="#000" stroke-width="1" fill="none"/>
  <rect x="18" y="33" width="8" height="10" fill="#FF6347"/>
  <rect x="28" y="38" width="8" height="12" fill="#4169E1"/>
  <rect x="38" y="33" width="8" height="10" fill="#FF6347"/>
  <path d="M 18 20 L 26 20 L 22 16 Z M 38 20 L 46 20 L 42 16 Z" fill="#8B4513"/>
  <circle cx="32" cy="24" r="4" fill="#FFD700"/>
</svg>'
];

$criados = 0;
$erros = 0;

foreach ($icones as $nomeArquivo => $conteudoSVG) {
    $caminho = "assets/img/$nomeArquivo";

    if (file_put_contents($caminho, $conteudoSVG)) {
        echo "✓ Criado: $caminho\n";
        $criados++;
    } else {
        echo "✗ Erro ao criar: $caminho\n";
        $erros++;
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO:\n";
echo str_repeat('=', 70) . "\n";
echo "Ícones criados: $criados\n";
echo "Erros: $erros\n";
echo "\n✓ Ícones SVG criados com sucesso!\n";
