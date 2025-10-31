<?php
/**
 * Criar Ícones SVG para 8 Novos Personagens
 */

echo "=== Criando Ícones SVG - 8 Personagens ===\n\n";

$icones = [
    'sparky.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="20" y="28" width="24" height="20" rx="4" fill="#4682B4"/>
  <rect x="22" y="30" width="20" height="16" fill="#87CEEB"/>
  <circle cx="32" cy="22" r="8" fill="#4169E1"/>
  <circle cx="32" cy="22" r="5" fill="#1E90FF"/>
  <circle cx="22" cy="50" r="5" fill="#2F4F4F"/>
  <circle cx="22" cy="50" r="3" fill="#696969"/>
  <circle cx="42" cy="50" r="5" fill="#2F4F4F"/>
  <circle cx="42" cy="50" r="3" fill="#696969"/>
  <circle cx="32" cy="38" r="6" fill="#FFD700"/>
  <path d="M 28 16 L 32 12 L 36 16 M 30 14 L 34 14" stroke="#FFFF00" stroke-width="2"/>
  <path d="M 40 22 L 46 18 M 42 26 L 48 28" stroke="#FFFF00" stroke-width="2"/>
  <circle cx="32" cy="38" r="3" fill="#FF4500"/>
</svg>',

    'destruidores-de-muros.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="16" cy="32" r="6" fill="#90EE90"/>
  <circle cx="26" cy="26" r="6" fill="#90EE90"/>
  <circle cx="32" cy="32" r="6" fill="#90EE90"/>
  <circle cx="38" cy="26" r="6" fill="#90EE90"/>
  <circle cx="48" cy="32" r="6" fill="#90EE90"/>
  <circle cx="14" cy="31" r="2" fill="#000"/>
  <circle cx="24" cy="25" r="2" fill="#000"/>
  <circle cx="30" cy="31" r="2" fill="#000"/>
  <circle cx="36" cy="25" r="2" fill="#000"/>
  <circle cx="46" cy="31" r="2" fill="#000"/>
  <circle cx="16" cy="42" r="4" fill="#000"/>
  <circle cx="26" cy="36" r="4" fill="#000"/>
  <circle cx="32" cy="42" r="4" fill="#000"/>
  <circle cx="38" cy="36" r="4" fill="#000"/>
  <circle cx="48" cy="42" r="4" fill="#000"/>
  <circle cx="16" cy="42" r="2" fill="#FF4500"/>
  <circle cx="26" cy="36" r="2" fill="#FF4500"/>
  <circle cx="32" cy="42" r="2" fill="#FF4500"/>
  <circle cx="38" cy="36" r="2" fill="#FF4500"/>
  <circle cx="48" cy="42" r="2" fill="#FF4500"/>
</svg>',

    'lava-hound.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="32" cy="36" rx="18" ry="16" fill="#8B4513"/>
  <ellipse cx="32" cy="36" rx="14" ry="12" fill="#D2691E"/>
  <circle cx="32" cy="22" r="10" fill="#8B4513"/>
  <circle cx="28" cy="20" r="3" fill="#FF4500"/>
  <circle cx="36" cy="20" r="3" fill="#FF4500"/>
  <path d="M 14 32 Q 10 28 8 32 Q 10 36 14 32" fill="#A0522D"/>
  <path d="M 50 32 Q 54 28 56 32 Q 54 36 50 32" fill="#A0522D"/>
  <path d="M 32 48 L 28 54 L 32 52 L 36 54 Z" fill="#8B4513"/>
  <circle cx="24" cy="38" r="3" fill="#FF6347"/>
  <circle cx="32" cy="40" r="3" fill="#FF6347"/>
  <circle cx="40" cy="38" r="3" fill="#FF6347"/>
  <path d="M 20 26 L 24 20 L 26 24 M 38 24 L 40 20 L 44 26" fill="#654321"/>
  <circle cx="28" cy="20" r="1.5" fill="#FFFF00"/>
  <circle cx="36" cy="20" r="1.5" fill="#FFFF00"/>
</svg>',

    'morcegos.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <g>
    <circle cx="22" cy="24" r="4" fill="#4B0082"/>
    <path d="M 14 24 Q 16 20 18 24 Q 16 26 14 24" fill="#8B008B"/>
    <path d="M 26 24 Q 28 20 30 24 Q 28 26 26 24" fill="#8B008B"/>
    <circle cx="21" cy="23" r="1" fill="#FF0000"/>
  </g>
  <g>
    <circle cx="32" cy="20" r="4" fill="#4B0082"/>
    <path d="M 24 20 Q 26 16 28 20 Q 26 22 24 20" fill="#8B008B"/>
    <path d="M 36 20 Q 38 16 40 20 Q 38 22 36 20" fill="#8B008B"/>
    <circle cx="31" cy="19" r="1" fill="#FF0000"/>
  </g>
  <g>
    <circle cx="42" cy="28" r="4" fill="#4B0082"/>
    <path d="M 34 28 Q 36 24 38 28 Q 36 30 34 28" fill="#8B008B"/>
    <path d="M 46 28 Q 48 24 50 28 Q 48 30 46 28" fill="#8B008B"/>
    <circle cx="41" cy="27" r="1" fill="#FF0000"/>
  </g>
  <g>
    <circle cx="26" cy="38" r="4" fill="#4B0082"/>
    <path d="M 18 38 Q 20 34 22 38 Q 20 40 18 38" fill="#8B008B"/>
    <path d="M 30 38 Q 32 34 34 38 Q 32 40 30 38" fill="#8B008B"/>
    <circle cx="25" cy="37" r="1" fill="#FF0000"/>
  </g>
  <g>
    <circle cx="38" cy="42" r="4" fill="#4B0082"/>
    <path d="M 30 42 Q 32 38 34 42 Q 32 44 30 42" fill="#8B008B"/>
    <path d="M 42 42 Q 44 38 46 42 Q 44 44 42 42" fill="#8B008B"/>
    <circle cx="37" cy="41" r="1" fill="#FF0000"/>
  </g>
</svg>',

    'espirito-curador.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="32" r="18" fill="#98FB98"/>
  <circle cx="32" cy="32" r="14" fill="#90EE90"/>
  <circle cx="32" cy="32" r="10" fill="#00FF7F"/>
  <circle cx="29" cy="30" r="2" fill="#000"/>
  <circle cx="35" cy="30" r="2" fill="#000"/>
  <path d="M 29 36 Q 32 38 35 36" stroke="#000" stroke-width="2" fill="none"/>
  <path d="M 32 24 L 32 18 M 32 22 L 28 22 M 32 22 L 36 22" stroke="#FF69B4" stroke-width="2"/>
  <circle cx="32" cy="18" r="2" fill="#FF1493"/>
  <circle cx="22" cy="28" r="2" fill="#FFB6C1" opacity="0.7"/>
  <circle cx="42" cy="28" r="2" fill="#FFB6C1" opacity="0.7"/>
  <circle cx="26" cy="40" r="2" fill="#FFB6C1" opacity="0.7"/>
  <circle cx="38" cy="40" r="2" fill="#FFB6C1" opacity="0.7"/>
  <path d="M 18 24 L 22 26 M 46 24 L 42 26 M 20 42 L 24 40 M 44 42 L 40 40" stroke="#98FB98" stroke-width="2"/>
</svg>',

    'lancador.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="26" r="8" fill="#FFE4B5"/>
  <circle cx="30" cy="24" r="2" fill="#000"/>
  <circle cx="34" cy="24" r="2" fill="#000"/>
  <path d="M 30 30 Q 32 32 34 30" stroke="#000" stroke-width="2" fill="none"/>
  <rect x="26" y="32" width="12" height="14" fill="#8B4513"/>
  <path d="M 26 22 Q 28 18 32 18 Q 36 18 38 22" fill="#A0522D"/>
  <rect x="22" y="44" width="5" height="8" fill="#654321"/>
  <rect x="37" y="44" width="5" height="8" fill="#654321"/>
  <path d="M 38 28 L 50 18" stroke="#654321" stroke-width="3"/>
  <circle cx="50" cy="18" r="5" fill="#808080"/>
  <circle cx="50" cy="18" r="3" fill="#A9A9A9"/>
  <path d="M 20 32 L 18 38 L 22 36 M 44 32 L 46 38 L 42 36" fill="#8B4513"/>
  <circle cx="48" cy="14" r="2" fill="#696969"/>
  <circle cx="52" cy="16" r="2" fill="#696969"/>
</svg>',

    'ariete-de-batalha.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="18" y="36" width="28" height="12" fill="#8B4513"/>
  <rect x="20" y="38" width="24" height="8" fill="#A0522D"/>
  <ellipse cx="46" cy="42" rx="8" ry="6" fill="#696969"/>
  <ellipse cx="46" cy="42" rx="5" ry="4" fill="#A9A9A9"/>
  <circle cx="20" cy="48" r="4" fill="#2F4F4F"/>
  <circle cx="20" cy="48" r="2" fill="#696969"/>
  <circle cx="44" cy="48" r="4" fill="#2F4F4F"/>
  <circle cx="44" cy="48" r="2" fill="#696969"/>
  <circle cx="18" cy="28" r="6" fill="#FFE4B5"/>
  <circle cx="38" cy="28" r="6" fill="#FFE4B5"/>
  <path d="M 14 24 L 16 18 L 18 22 M 34 24 L 36 18 L 38 22" fill="#8B4513"/>
  <circle cx="17" cy="27" r="1.5" fill="#000"/>
  <circle cx="37" cy="27" r="1.5" fill="#000"/>
  <rect x="18" y="32" width="20" height="4" fill="#654321"/>
  <path d="M 46 42 L 54 42 L 52 38 L 50 38 Z" fill="#4A4A4A"/>
</svg>',

    'arqueiro-magico.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="26" r="8" fill="#FFE4B5"/>
  <circle cx="30" cy="24" r="2" fill="#000"/>
  <circle cx="34" cy="24" r="2" fill="#000"/>
  <path d="M 30 30 Q 32 32 34 30" stroke="#000" stroke-width="2" fill="none"/>
  <rect x="26" y="32" width="12" height="16" fill="#9370DB"/>
  <path d="M 26 22 Q 28 16 32 16 Q 36 16 38 22" fill="#4B0082"/>
  <path d="M 20 28 L 42 20" stroke="#8B4513" stroke-width="2"/>
  <path d="M 42 20 L 38 18 M 42 20 L 40 24" stroke="#8B4513" stroke-width="2" fill="none"/>
  <circle cx="44" cy="18" r="3" fill="#FF00FF"/>
  <circle cx="44" cy="18" r="1.5" fill="#FFFF00"/>
  <path d="M 28 18 L 32 12 L 36 18" fill="#FFD700"/>
  <rect x="24" y="46" width="5" height="6" fill="#9370DB"/>
  <rect x="35" y="46" width="5" height="6" fill="#9370DB"/>
  <path d="M 48 16 L 52 14 M 46 22 L 48 26" stroke="#FF69B4" stroke-width="1.5"/>
</svg>'
];

$criados = 0;
$erros = 0;
$jaExistentes = 0;

foreach ($icones as $nomeArquivo => $conteudoSVG) {
    $caminho = "assets/img/$nomeArquivo";

    if (file_exists($caminho)) {
        echo "⊘ Já existe: $caminho\n";
        $jaExistentes++;
    } else {
        if (file_put_contents($caminho, $conteudoSVG)) {
            echo "✓ Criado: $caminho\n";
            $criados++;
        } else {
            echo "✗ Erro ao criar: $caminho\n";
            $erros++;
        }
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO:\n";
echo str_repeat('=', 70) . "\n";
echo "Ícones criados: $criados\n";
echo "Já existentes: $jaExistentes\n";
echo "Erros: $erros\n";
echo "\n✓ Processo de criação de ícones SVG concluído!\n";
