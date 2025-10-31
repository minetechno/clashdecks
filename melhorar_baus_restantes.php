<?php
/**
 * Melhora os 10 baús restantes com gradientes, sombras e efeitos 3D
 */

$baus = [
    'bau-gigante.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="giantBrown" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#D2691E"/>
      <stop offset="50%" style="stop-color:#8B4513"/>
      <stop offset="100%" style="stop-color:#654321"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="3" dy="5" stdDeviation="4" flood-opacity="0.6"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="28" ry="5" fill="#000" opacity="0.4"/>
  <rect x="12" y="18" width="40" height="32" fill="url(#giantBrown)" stroke="#654321" stroke-width="2" rx="3" filter="url(#shadow)"/>
  <rect x="16" y="22" width="32" height="24" fill="#A0522D" opacity="0.6"/>
  <path d="M 26 14 L 38 14 L 38 22 L 26 22 Z" fill="#654321" filter="url(#shadow)"/>
  <rect x="27" y="16" width="10" height="4" fill="#8B4513"/>
  <circle cx="32" cy="34" r="6" fill="#8B7355" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="4" fill="#A0826D"/>
  <rect x="14" y="22" width="3" height="24" fill="#A0522D" opacity="0.5"/>
  <rect x="47" y="22" width="3" height="24" fill="#654321" opacity="0.5"/>
</svg>',

    'bau-rei.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="kingRed" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FF6347"/>
      <stop offset="50%" style="stop-color:#DC143C"/>
      <stop offset="100%" style="stop-color:#8B0000"/>
    </linearGradient>
    <linearGradient id="kingGold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FFA500"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.6"/></filter>
    <filter id="shine"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.4"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#kingRed)" stroke="#8B0000" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#FF6347" opacity="0.5"/>
  <path d="M 26 16 L 32 12 L 38 16 L 36 22 L 28 22 Z" fill="url(#kingGold)" stroke="#DAA520" stroke-width="1" filter="url(#shadow)"/>
  <circle cx="32" cy="13" r="2" fill="#FF1493" filter="url(#shine)"/>
  <circle cx="32" cy="34" r="5" fill="url(#kingGold)" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="3" fill="#FFD700"/>
  <circle cx="30" cy="32" r="1.5" fill="#FFF" opacity="0.8"/>
  <rect x="18" y="24" width="2" height="20" fill="#FF6347" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#8B0000" opacity="0.5"/>
</svg>',

    'bau-destino.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="destinyPink" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FF69B4"/>
      <stop offset="50%" style="stop-color:#FF1493"/>
      <stop offset="100%" style="stop-color:#C71585"/>
    </linearGradient>
    <radialGradient id="star" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFFF00;stop-opacity:0.9"/>
      <stop offset="100%" style="stop-color:#FFA500;stop-opacity:0.5"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="glow"><feGaussianBlur stdDeviation="1.5"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#destinyPink)" stroke="#C71585" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#FF69B4" opacity="0.5"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#C71585" filter="url(#shadow)"/>
  <path d="M 32 28 L 34 32 L 38 32 L 35 35 L 36 39 L 32 36 L 28 39 L 29 35 L 26 32 L 30 32 Z" fill="url(#star)" stroke="#FFA500" stroke-width="0.8" filter="url(#glow)"/>
  <circle cx="32" cy="33" r="3" fill="#FFFF00" opacity="0.7" filter="url(#glow)"/>
  <rect x="18" y="24" width="2" height="20" fill="#FF69B4" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#C71585" opacity="0.5"/>
</svg>',

    'bau-relampago.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="thunderBlue" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#87CEEB"/>
      <stop offset="50%" style="stop-color:#4682B4"/>
      <stop offset="100%" style="stop-color:#1E90FF"/>
    </linearGradient>
    <radialGradient id="bolt" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFFF00;stop-opacity:0.9"/>
      <stop offset="100%" style="stop-color:#FFD700;stop-opacity:0.4"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="electric"><feGaussianBlur stdDeviation="1.5"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#thunderBlue)" stroke="#1E90FF" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#87CEEB" opacity="0.5"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#1E90FF" filter="url(#shadow)"/>
  <path d="M 34 28 L 30 34 L 33 34 L 30 40 L 36 32 L 33 32 L 36 28 Z" fill="url(#bolt)" filter="url(#electric)"/>
  <rect x="18" y="24" width="2" height="20" fill="#87CEEB" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#1E90FF" opacity="0.5"/>
</svg>',

    'bau-mega-relampago.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="megaBlue" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#00BFFF"/>
      <stop offset="50%" style="stop-color:#0080FF"/>
      <stop offset="100%" style="stop-color:#0040FF"/>
    </linearGradient>
    <radialGradient id="megaBolt" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFFFFF;stop-opacity:1"/>
      <stop offset="50%" style="stop-color:#FFFF00;stop-opacity:0.8"/>
      <stop offset="100%" style="stop-color:#FFD700;stop-opacity:0.3"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.6"/></filter>
    <filter id="megaGlow"><feGaussianBlur stdDeviation="2"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="26" ry="4" fill="#000" opacity="0.4"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#megaBlue)" stroke="#0040FF" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#00BFFF" opacity="0.5"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#0040FF" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="7" fill="url(#megaBolt)" filter="url(#megaGlow)"/>
  <path d="M 34 28 L 30 34 L 33 34 L 30 40 L 36 32 L 33 32 L 36 28 Z" fill="#FFF" opacity="0.9"/>
  <rect x="18" y="24" width="2" height="20" fill="#00BFFF" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#0040FF" opacity="0.5"/>
</svg>',

    'bau-de-temporada.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="seasonGreen" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#90EE90"/>
      <stop offset="50%" style="stop-color:#32CD32"/>
      <stop offset="100%" style="stop-color:#228B22"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#seasonGreen)" stroke="#228B22" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#90EE90" opacity="0.5"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#228B22" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="5" fill="#FFD700" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="3" fill="#FFA500"/>
  <rect x="18" y="24" width="2" height="20" fill="#90EE90" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#228B22" opacity="0.5"/>
</svg>',

    'bau-de-desafio.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="challengeOrange" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFA500"/>
      <stop offset="50%" style="stop-color:#FF8C00"/>
      <stop offset="100%" style="stop-color:#FF6500"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#challengeOrange)" stroke="#FF6500" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#FFA500" opacity="0.5"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#FF6500" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="5" fill="#FFD700" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="3" fill="#FFF"/>
  <rect x="18" y="24" width="2" height="20" fill="#FFA500" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#FF6500" opacity="0.5"/>
</svg>',

    'bau-de-vitoria.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="victoryGold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="50%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <radialGradient id="trophy" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFF;stop-opacity:0.9"/>
      <stop offset="100%" style="stop-color:#FFD700;stop-opacity:0.5"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="shine"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#victoryGold)" stroke="#FF8C00" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#FFD700" opacity="0.5"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#FF8C00" filter="url(#shadow)"/>
  <path d="M 28 30 L 26 34 L 28 38 L 32 40 L 36 38 L 38 34 L 36 30 Z" fill="url(#trophy)" filter="url(#shine)"/>
  <rect x="18" y="24" width="2" height="20" fill="#FFD700" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#FF8C00" opacity="0.5"/>
</svg>',

    'bau-de-guerra.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="warGray" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#A9A9A9"/>
      <stop offset="50%" style="stop-color:#808080"/>
      <stop offset="100%" style="stop-color:#696969"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.6"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.4"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#warGray)" stroke="#696969" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#A9A9A9" opacity="0.5"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#696969" filter="url(#shadow)"/>
  <path d="M 28 32 L 32 28 L 36 32 L 32 38 Z" fill="#DC143C"/>
  <circle cx="32" cy="32" r="3" fill="#8B0000"/>
  <rect x="18" y="24" width="2" height="20" fill="#A9A9A9" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#696969" opacity="0.5"/>
</svg>',

    'bau-de-torneio.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="tourneyPurple" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#9370DB"/>
      <stop offset="50%" style="stop-color:#8B008B"/>
      <stop offset="100%" style="stop-color:#4B0082"/>
    </linearGradient>
    <radialGradient id="tourneyGem" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFF"/>
      <stop offset="50%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FF69B4"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="glow"><feGaussianBlur stdDeviation="1.5"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#tourneyPurple)" stroke="#4B0082" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#9370DB" opacity="0.5"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#4B0082" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="6" fill="url(#tourneyGem)" filter="url(#glow)"/>
  <circle cx="32" cy="34" r="3" fill="#FFD700"/>
  <rect x="18" y="24" width="2" height="20" fill="#9370DB" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#4B0082" opacity="0.5"/>
</svg>'
];

$backupDir = 'assets/img/';
$melhorados = 0;

foreach ($baus as $nome => $conteudo) {
    $caminho = $backupDir . $nome;

    if (!file_exists($caminho)) {
        echo "⚠ Arquivo não existe: $nome\n";
        continue;
    }

    $backup = str_replace('.svg', '_backup.svg', $caminho);
    if (!file_exists($backup)) {
        copy($caminho, $backup);
        echo "✓ Backup criado: $backup\n";
    }

    if (file_put_contents($caminho, $conteudo)) {
        $melhorados++;
        echo "✓ Melhorado: $nome (" . filesize($caminho) . " bytes)\n";
    } else {
        echo "✗ Erro ao melhorar: $nome\n";
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO: $melhorados baús restantes melhorados!\n";
echo "Total de baús melhorados: " . ($melhorados + 8) . "/18\n";
echo str_repeat('=', 70) . "\n";
