<?php
/**
 * Criar Ícones SVG para Emotes
 */

echo "=== Criando Ícones SVG - Emotes ===\n\n";

$icones = [
    'danca-bebe-dragao.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="32" cy="40" rx="16" ry="14" fill="#9370DB"/>
  <circle cx="32" cy="24" r="11" fill="#9370DB"/>
  <circle cx="28" cy="22" r="3" fill="#000"/>
  <circle cx="36" cy="22" r="3" fill="#000"/>
  <path d="M 28 28 Q 32 31 36 28" stroke="#000" stroke-width="2" fill="none"/>
  <path d="M 14 36 Q 10 32 8 36 Q 10 40 14 36" fill="#BA55D3"/>
  <path d="M 50 36 Q 54 32 56 36 Q 54 40 50 36" fill="#BA55D3"/>
  <path d="M 32 50 L 28 56 L 32 54 L 36 56 Z" fill="#8B008B"/>
  <circle cx="26" cy="42" r="2" fill="#FF4500" opacity="0.8"/>
  <circle cx="38" cy="42" r="2" fill="#FF4500" opacity="0.8"/>
  <path d="M 20 30 L 16 28 L 20 26" fill="#8B008B"/>
  <path d="M 44 30 L 48 28 L 44 26" fill="#8B008B"/>
  <circle cx="20" cy="50" r="3" fill="#FFD700" opacity="0.5"/>
  <circle cx="44" cy="50" r="3" fill="#FFD700" opacity="0.5"/>
  <path d="M 28 18 L 30 14 L 32 18 M 34 18 L 36 14 L 38 18" fill="#4B0082"/>
</svg>',

    'danca-suina.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="32" cy="42" rx="14" ry="12" fill="#FFB6C1"/>
  <circle cx="32" cy="28" r="10" fill="#FFB6C1"/>
  <ellipse cx="28" cy="28" rx="3" ry="4" fill="#FF1493"/>
  <ellipse cx="36" cy="28" rx="3" ry="4" fill="#FF1493"/>
  <circle cx="26" cy="26" r="2" fill="#000"/>
  <circle cx="38" cy="26" r="2" fill="#000"/>
  <path d="M 28 32 Q 32 34 36 32" stroke="#000" stroke-width="2" fill="none"/>
  <circle cx="24" cy="20" r="6" fill="#FFE4B5"/>
  <rect x="22" y="16" width="4" height="6" fill="#8B4513"/>
  <path d="M 24 16 L 26 12 L 28 16" fill="#FFD700"/>
  <circle cx="18" cy="46" r="3" fill="#FF69B4"/>
  <circle cx="46" cy="46" r="3" fill="#FF69B4"/>
  <path d="M 28 52 L 32 56 L 36 52" fill="#FFB6C1"/>
  <circle cx="16" cy="38" r="4" fill="#FFD700" opacity="0.6"/>
  <circle cx="48" cy="38" r="4" fill="#FFD700" opacity="0.6"/>
</svg>',

    'goblin-chorao.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="32" r="16" fill="#90EE90"/>
  <circle cx="28" cy="28" r="4" fill="#FFF"/>
  <circle cx="36" cy="28" r="4" fill="#FFF"/>
  <circle cx="28" cy="29" r="2" fill="#000"/>
  <circle cx="36" cy="29" r="2" fill="#000"/>
  <path d="M 26 38 Q 32 34 38 38" stroke="#000" stroke-width="2" fill="none"/>
  <path d="M 24 34 L 22 42 L 20 50" stroke="#00BFFF" stroke-width="3" stroke-linecap="round"/>
  <path d="M 40 34 L 42 42 L 44 50" stroke="#00BFFF" stroke-width="3" stroke-linecap="round"/>
  <circle cx="20" cy="50" r="3" fill="#00BFFF" opacity="0.6"/>
  <circle cx="44" cy="50" r="3" fill="#00BFFF" opacity="0.6"/>
  <circle cx="22" cy="46" r="2" fill="#00BFFF" opacity="0.6"/>
  <circle cx="42" cy="46" r="2" fill="#00BFFF" opacity="0.6"/>
  <path d="M 24 22 L 26 16 L 28 20 M 36 20 L 38 16 L 40 22" fill="#228B22"/>
  <circle cx="32" cy="32" r="18" fill="none" stroke="#228B22" stroke-width="2"/>
</svg>',

    'rei-rindo.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="32" r="18" fill="#FFE4B5"/>
  <circle cx="28" cy="28" r="2" fill="#000"/>
  <circle cx="36" cy="28" r="2" fill="#000"/>
  <path d="M 24 34 Q 32 42 40 34" fill="#000"/>
  <path d="M 24 34 Q 32 40 40 34" fill="#FF6347"/>
  <ellipse cx="32" cy="18" rx="16" ry="8" fill="#FFD700"/>
  <path d="M 20 18 L 22 10 L 24 18 M 28 18 L 30 8 L 32 18 M 36 18 L 38 8 L 40 18 M 42 18 L 44 10 L 46 18" fill="#FFD700"/>
  <circle cx="30" cy="12" r="3" fill="#FF0000"/>
  <circle cx="34" cy="12" r="3" fill="#FF0000"/>
  <path d="M 14 32 L 12 28 M 50 32 L 52 28" stroke="#FFE4B5" stroke-width="3"/>
  <rect x="28" y="48" width="8" height="8" fill="#9370DB"/>
  <path d="M 20 36 L 18 40 M 44 36 L 46 40" stroke="#000" stroke-width="2"/>
</svg>',

    'princesa-bocejando.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="28" r="10" fill="#FFE4B5"/>
  <circle cx="28" cy="26" r="2" fill="#000"/>
  <circle cx="36" cy="26" r="2" fill="#000"/>
  <ellipse cx="32" cy="32" rx="4" ry="6" fill="#000"/>
  <ellipse cx="32" cy="32" rx="3" ry="5" fill="#8B0000"/>
  <path d="M 26 20 Q 28 14 32 14 Q 36 14 38 20" fill="#FFD700"/>
  <circle cx="28" cy="16" r="3" fill="#FFD700"/>
  <circle cx="36" cy="16" r="3" fill="#FFD700"/>
  <rect x="28" y="36" width="8" height="12" fill="#FF69B4"/>
  <path d="M 38 30 L 44 28 L 46 32" fill="#FFE4B5"/>
  <rect x="26" y="46" width="5" height="6" fill="#FFB6C1"/>
  <rect x="33" y="46" width="5" height="6" fill="#FFB6C1"/>
  <circle cx="24" cy="34" r="2" fill="#ADD8E6" opacity="0.5"/>
  <circle cx="26" cy="36" r="2" fill="#ADD8E6" opacity="0.5"/>
  <path d="M 20 22 L 22 18 L 24 20" fill="#FFD700"/>
  <path d="M 40 20 L 42 18 L 44 22" fill="#FFD700"/>
</svg>',

    'cavaleiro-saudando.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="26" r="8" fill="#FFE4B5"/>
  <ellipse cx="32" cy="22" rx="10" ry="6" fill="#696969"/>
  <rect x="28" y="24" width="2" height="4" fill="#696969"/>
  <rect x="34" y="24" width="2" height="4" fill="#696969"/>
  <circle cx="30" cy="27" r="1.5" fill="#000"/>
  <circle cx="34" cy="27" r="1.5" fill="#000"/>
  <rect x="26" y="32" width="12" height="16" fill="#A9A9A9"/>
  <circle cx="32" cy="40" r="6" fill="#C0C0C0"/>
  <rect x="24" y="46" width="5" height="6" fill="#696969"/>
  <rect x="35" y="46" width="5" height="6" fill="#696969"/>
  <path d="M 18 34 L 14 28 L 16 36" fill="#A9A9A9"/>
  <ellipse cx="16" cy="30" rx="4" ry="6" fill="#FFD700"/>
  <path d="M 32 18 L 34 14 L 36 18" fill="#DC143C"/>
  <rect x="30" y="18" width="4" height="6" fill="#DC143C"/>
  <circle cx="32" cy="40" r="3" fill="#FFD700"/>
</svg>',

    'bruxa-gargalhada.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="28" r="10" fill="#E6C3A0"/>
  <circle cx="28" cy="26" r="3" fill="#FF00FF"/>
  <circle cx="36" cy="26" r="3" fill="#FF00FF"/>
  <path d="M 26 32 Q 32 36 38 32" fill="#000"/>
  <path d="M 26 32 Q 32 34 38 32" fill="#8B0000"/>
  <path d="M 22 22 Q 24 16 28 18 M 40 18 Q 44 16 42 22" fill="#4B0082"/>
  <rect x="26" y="36" width="12" height="14" fill="#4B0082"/>
  <path d="M 44 28 L 52 24 L 50 30" fill="#E6C3A0"/>
  <path d="M 48 26 L 54 26 L 52 28 L 54 30 L 48 30" fill="#8B4513"/>
  <rect x="24" y="48" width="5" height="6" fill="#4B0082"/>
  <rect x="35" y="48" width="5" height="6" fill="#4B0082"/>
  <circle cx="22" cy="40" r="2" fill="#9370DB" opacity="0.6"/>
  <circle cx="42" cy="40" r="2" fill="#9370DB" opacity="0.6"/>
  <path d="M 26 20 L 28 14 Q 32 12 36 14 L 38 20" fill="#000"/>
  <circle cx="30" cy="16" r="2" fill="#4B0082"/>
</svg>',

    'pekka-borboleta.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="22" y="28" width="20" height="24" rx="4" fill="#4B4B4B"/>
  <rect x="24" y="30" width="16" height="20" fill="#696969"/>
  <ellipse cx="32" cy="22" rx="8" ry="10" fill="#4B4B4B"/>
  <circle cx="29" cy="20" r="3" fill="#FF1493"/>
  <circle cx="35" cy="20" r="3" fill="#FF1493"/>
  <rect x="28" y="24" width="8" height="6" fill="#4B4B4B"/>
  <rect x="18" y="36" width="6" height="12" fill="#696969"/>
  <rect x="40" y="36" width="6" height="12" fill="#696969"/>
  <circle cx="46" cy="18" r="1" fill="#000"/>
  <path d="M 44 16 Q 42 14 40 16 Q 42 18 44 16" fill="#FF69B4"/>
  <path d="M 48 16 Q 50 14 52 16 Q 50 18 48 16" fill="#FF69B4"/>
  <path d="M 44 20 Q 42 22 40 20 Q 42 18 44 20" fill="#FFB6C1"/>
  <path d="M 48 20 Q 50 22 52 20 Q 50 18 48 20" fill="#FFB6C1"/>
  <circle cx="46" cy="18" r="3" fill="none" stroke="#FF1493" stroke-width="0.5"/>
</svg>',

    'dragao-eletrico-zap.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="32" cy="36" rx="14" ry="12" fill="#4682B4"/>
  <circle cx="32" cy="24" r="9" fill="#4682B4"/>
  <circle cx="29" cy="22" r="2" fill="#FFFF00"/>
  <circle cx="35" cy="22" r="2" fill="#FFFF00"/>
  <path d="M 29 28 Q 32 30 35 28" stroke="#000" stroke-width="2" fill="none"/>
  <path d="M 14 32 Q 10 28 8 32 Q 10 36 14 32" fill="#87CEEB"/>
  <path d="M 50 32 Q 54 28 56 32 Q 54 36 50 32" fill="#87CEEB"/>
  <path d="M 32 48 L 28 54 L 32 52 L 36 54 Z" fill="#1E90FF"/>
  <path d="M 40 24 L 46 18 L 44 26 L 48 20 L 46 28" stroke="#FFFF00" stroke-width="2" fill="none"/>
  <circle cx="42" cy="22" r="3" fill="#FFFF00" opacity="0.5"/>
  <path d="M 18 28 L 12 24 L 14 30 L 10 26 L 12 32" stroke="#FFFF00" stroke-width="2" fill="none"/>
  <circle cx="16" cy="28" r="3" fill="#FFFF00" opacity="0.5"/>
  <path d="M 24 18 L 26 12 L 28 18 M 36 18 L 38 12 L 40 18" fill="#1E3A8A"/>
</svg>',

    'esqueleto-dancando.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="20" r="8" fill="#F5F5F5"/>
  <circle cx="29" cy="18" r="2" fill="#000"/>
  <circle cx="35" cy="18" r="2" fill="#000"/>
  <path d="M 28 24 L 36 24" stroke="#000" stroke-width="2"/>
  <rect x="28" y="26" width="8" height="12" fill="#E0E0E0"/>
  <rect x="20" y="30" width="10" height="3" fill="#D3D3D3"/>
  <rect x="34" y="30" width="10" height="3" fill="#D3D3D3"/>
  <rect x="26" y="36" width="4" height="12" fill="#D3D3D3"/>
  <rect x="34" y="36" width="4" height="12" fill="#D3D3D3"/>
  <circle cx="28" cy="48" r="3" fill="#FFF"/>
  <circle cx="36" cy="48" r="3" fill="#FFF"/>
  <path d="M 18 32 L 14 36 M 46 32 L 50 36" stroke="#D3D3D3" stroke-width="3"/>
  <circle cx="14" cy="36" r="2" fill="#FFF"/>
  <circle cx="50" cy="36" r="2" fill="#FFF"/>
  <path d="M 30 40 L 28 44 M 34 40 L 36 44" stroke="#C0C0C0" stroke-width="2"/>
</svg>',

    'valquiria-grito.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="24" r="8" fill="#FFE4B5"/>
  <circle cx="30" cy="22" r="1.5" fill="#000"/>
  <circle cx="34" cy="22" r="1.5" fill="#000"/>
  <ellipse cx="32" cy="27" rx="3" ry="4" fill="#8B0000"/>
  <path d="M 24 20 Q 26 14 32 14 Q 38 14 40 20" fill="#FFD700"/>
  <path d="M 24 18 L 26 12 L 28 18 M 36 18 L 38 12 L 40 18" fill="#FFD700"/>
  <rect x="26" y="30" width="12" height="14" fill="#DC143C"/>
  <rect x="20" y="34" width="8" height="4" fill="#B22222"/>
  <rect x="36" y="34" width="8" height="4" fill="#B22222"/>
  <rect x="24" y="42" width="5" height="8" fill="#8B0000"/>
  <rect x="35" y="42" width="5" height="8" fill="#8B0000"/>
  <path d="M 16 26 L 12 22 L 10 28 L 8 24" stroke="#FF4500" stroke-width="2"/>
  <path d="M 48 26 L 52 22 L 54 28 L 56 24" stroke="#FF4500" stroke-width="2"/>
  <circle cx="12" cy="24" r="3" fill="#FFA500" opacity="0.5"/>
  <circle cx="52" cy="24" r="3" fill="#FFA500" opacity="0.5"/>
</svg>',

    'mago-confuso.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="28" r="8" fill="#FFE4B5"/>
  <circle cx="30" cy="26" r="2" fill="#000"/>
  <circle cx="34" cy="26" r="2" fill="#000"/>
  <path d="M 30 32 L 34 32" stroke="#000" stroke-width="2"/>
  <path d="M 26 22 Q 28 16 32 14 Q 36 16 38 22" fill="#9370DB"/>
  <circle cx="32" cy="12" r="3" fill="#FFD700"/>
  <path d="M 30 12 L 28 8 M 34 12 L 36 8" stroke="#FFD700" stroke-width="1.5"/>
  <rect x="26" y="34" width="12" height="14" fill="#9370DB"/>
  <path d="M 38 34 L 46 32 L 44 38" fill="#9370DB"/>
  <circle cx="44" cy="34" r="3" fill="#8B008B"/>
  <rect x="24" y="46" width="5" height="6" fill="#4B0082"/>
  <rect x="35" y="46" width="5" height="6" fill="#4B0082"/>
  <text x="24" y="14" font-size="12" fill="#000" font-weight="bold">?</text>
  <text x="38" y="18" font-size="10" fill="#000" font-weight="bold">?</text>
  <path d="M 42 28 L 44 24 L 46 28" fill="#FFE4B5"/>
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
echo "\n✓ Ícones SVG dos emotes criados com sucesso!\n";
