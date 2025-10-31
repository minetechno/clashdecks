<?php
/**
 * Melhora todos os ícones de baús com gradientes, sombras e efeitos 3D
 */

$baus = [
    'bau-prata.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="silverGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#E8E8E8"/>
      <stop offset="50%" style="stop-color:#C0C0C0"/>
      <stop offset="100%" style="stop-color:#A0A0A0"/>
    </linearGradient>
    <linearGradient id="silverLight" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#FFFFFF;stop-opacity:0.7"/>
      <stop offset="100%" style="stop-color:#C0C0C0;stop-opacity:0.3"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="shine"><feGaussianBlur stdDeviation="0.5"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#silverGrad)" stroke="#808080" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="url(#silverLight)"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#A0A0A0" filter="url(#shadow)"/>
  <rect x="29" y="18" width="6" height="4" fill="#C0C0C0"/>
  <circle cx="32" cy="34" r="5" fill="#606060" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="3" fill="#808080"/>
  <circle cx="30" cy="32" r="1.5" fill="#FFF" opacity="0.7" filter="url(#shine)"/>
  <rect x="18" y="24" width="2" height="20" fill="#D0D0D0" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#909090" opacity="0.5"/>
</svg>',

    'bau-coroa.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="purpleGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#BA55D3"/>
      <stop offset="50%" style="stop-color:#9932CC"/>
      <stop offset="100%" style="stop-color:#8B008B"/>
    </linearGradient>
    <linearGradient id="crownGold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="50%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <radialGradient id="gemGlow" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FF1493;stop-opacity:0.9"/>
      <stop offset="100%" style="stop-color:#C71585;stop-opacity:0.5"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="glow"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#purpleGrad)" stroke="#8B008B" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#BA55D3" opacity="0.5"/>
  <path d="M 24 14 L 28 18 L 32 12 L 36 18 L 40 14 L 38 22 L 26 22 Z" fill="url(#crownGold)" stroke="#DAA520" stroke-width="1" filter="url(#shadow)"/>
  <circle cx="28" cy="16" r="2" fill="#FF1493" filter="url(#glow)"/>
  <circle cx="32" cy="13" r="2" fill="#FF1493" filter="url(#glow)"/>
  <circle cx="36" cy="16" r="2" fill="#FF1493" filter="url(#glow)"/>
  <circle cx="32" cy="34" r="5" fill="url(#gemGlow)" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="3" fill="#FF1493"/>
  <circle cx="30" cy="32" r="1.5" fill="#FFF" opacity="0.8"/>
  <rect x="18" y="24" width="2" height="20" fill="#BA55D3" opacity="0.6"/>
  <rect x="44" y="24" width="2" height="20" fill="#8B008B" opacity="0.6"/>
</svg>',

    'bau-epico.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="epicPurple" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#9C27B0"/>
      <stop offset="50%" style="stop-color:#7B1FA2"/>
      <stop offset="100%" style="stop-color:#4A148C"/>
    </linearGradient>
    <linearGradient id="epicLight" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#E1BEE7;stop-opacity:0.7"/>
      <stop offset="100%" style="stop-color:#9C27B0;stop-opacity:0.3"/>
    </linearGradient>
    <radialGradient id="epicGem" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFFFFF"/>
      <stop offset="50%" style="stop-color:#E1BEE7"/>
      <stop offset="100%" style="stop-color:#9C27B0"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.6"/></filter>
    <filter id="glow"><feGaussianBlur stdDeviation="1.5"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="26" ry="4" fill="#000" opacity="0.4"/>
  <rect x="14" y="50" width="36" height="4" fill="#2A0845" filter="url(#shadow)"/>
  <rect x="16" y="24" width="32" height="28" fill="url(#epicPurple)" stroke="#4A148C" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="28" width="24" height="20" fill="url(#epicLight)"/>
  <rect x="24" y="16" width="16" height="10" fill="#4A148C" stroke="#2A0845" stroke-width="1.5" filter="url(#shadow)"/>
  <rect x="28" y="14" width="8" height="4" fill="#6A1B9A"/>
  <circle cx="32" cy="38" r="7" fill="url(#epicGem)" filter="url(#glow)"/>
  <circle cx="32" cy="38" r="4" fill="#FFFFFF" opacity="0.9"/>
  <circle cx="30" cy="36" r="2" fill="#E1BEE7"/>
  <rect x="22" y="32" width="2" height="12" fill="#9C27B0" opacity="0.7"/>
  <rect x="40" y="32" width="2" height="12" fill="#9C27B0" opacity="0.7"/>
  <rect x="18" y="28" width="2" height="20" fill="#BA68C8" opacity="0.4"/>
  <rect x="44" y="28" width="2" height="20" fill="#6A1B9A" opacity="0.4"/>
</svg>',

    'bau-magico.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="magicPurple" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#BA55D3"/>
      <stop offset="50%" style="stop-color:#9370DB"/>
      <stop offset="100%" style="stop-color:#6A5ACD"/>
    </linearGradient>
    <radialGradient id="magicStar" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFFF00;stop-opacity:0.9"/>
      <stop offset="50%" style="stop-color:#FFD700;stop-opacity:0.6"/>
      <stop offset="100%" style="stop-color:#FFA500;stop-opacity:0.2"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="sparkle"><feGaussianBlur stdDeviation="1.5"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#magicPurple)" stroke="#6A5ACD" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#BA55D3" opacity="0.5"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#6A5ACD" filter="url(#shadow)"/>
  <rect x="29" y="18" width="6" height="4" fill="#8B7AB8"/>
  <circle cx="32" cy="34" r="6" fill="url(#magicStar)" filter="url(#sparkle)"/>
  <path d="M 32 28 L 34 32 L 32 36 L 30 32 Z" fill="#FFFF00" opacity="0.8"/>
  <path d="M 28 32 L 32 34 L 36 32 L 32 30 Z" fill="#FFD700" opacity="0.7"/>
  <circle cx="32" cy="32" r="2" fill="#FFF" opacity="0.9"/>
  <rect x="18" y="24" width="2" height="20" fill="#BA55D3" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#6A5ACD" opacity="0.5"/>
  <circle cx="24" cy="28" r="2" fill="#FFD700" opacity="0.6" filter="url(#sparkle)"/>
  <circle cx="40" cy="28" r="2" fill="#FFD700" opacity="0.6" filter="url(#sparkle)"/>
  <circle cx="24" cy="40" r="2" fill="#FFFF00" opacity="0.5" filter="url(#sparkle)"/>
  <circle cx="40" cy="40" r="2" fill="#FFFF00" opacity="0.5" filter="url(#sparkle)"/>
</svg>',

    'bau-clan.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="clanBrown" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#D2691E"/>
      <stop offset="50%" style="stop-color:#8B4513"/>
      <stop offset="100%" style="stop-color:#654321"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="22" ry="4" fill="#000" opacity="0.3"/>
  <rect x="18" y="22" width="28" height="26" fill="url(#clanBrown)" stroke="#654321" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="22" y="26" width="20" height="18" fill="#A0522D" opacity="0.5"/>
  <path d="M 28 18 L 36 18 L 36 26 L 28 26 Z" fill="#654321" filter="url(#shadow)"/>
  <rect x="29" y="20" width="6" height="4" fill="#8B4513"/>
  <circle cx="32" cy="36" r="4" fill="#FFD700" filter="url(#shadow)"/>
  <circle cx="32" cy="36" r="2.5" fill="#FFA500"/>
  <rect x="20" y="26" width="2" height="18" fill="#A0522D" opacity="0.6"/>
  <rect x="42" y="26" width="2" height="18" fill="#654321" opacity="0.6"/>
</svg>',

    'bau-real.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="royalBlue" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#4169E1"/>
      <stop offset="50%" style="stop-color:#0000CD"/>
      <stop offset="100%" style="stop-color:#000080"/>
    </linearGradient>
    <linearGradient id="royalGold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FFA500"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.6"/></filter>
    <filter id="shine"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="26" ry="4" fill="#000" opacity="0.4"/>
  <rect x="16" y="20" width="32" height="28" fill="url(#royalBlue)" stroke="#000080" stroke-width="2" rx="2" filter="url(#shadow)"/>
  <rect x="20" y="24" width="24" height="20" fill="#4169E1" opacity="0.6"/>
  <path d="M 26 14 L 28 18 L 32 12 L 36 18 L 38 14 L 36 22 L 28 22 Z" fill="url(#royalGold)" stroke="#DAA520" stroke-width="1" filter="url(#shadow)"/>
  <circle cx="32" cy="13" r="2.5" fill="#FF1493" filter="url(#shine)"/>
  <circle cx="32" cy="34" r="6" fill="url(#royalGold)" filter="url(#shadow)"/>
  <circle cx="32" cy="34" r="4" fill="#FFD700"/>
  <circle cx="30" cy="32" r="1.5" fill="#FFF" opacity="0.8"/>
  <rect x="18" y="24" width="2" height="20" fill="#4169E1" opacity="0.5"/>
  <rect x="44" y="24" width="2" height="20" fill="#000080" opacity="0.5"/>
</svg>'
];

$backupDir = 'assets/img/';
$melhorados = 0;

foreach ($baus as $nome => $conteudo) {
    $caminho = $backupDir . $nome;

    // Verificar se arquivo existe
    if (!file_exists($caminho)) {
        echo "⚠ Arquivo não existe: $nome\n";
        continue;
    }

    // Criar backup se não existir
    $backup = str_replace('.svg', '_backup.svg', $caminho);
    if (!file_exists($backup)) {
        copy($caminho, $backup);
        echo "✓ Backup criado: $backup\n";
    }

    // Aplicar melhorias
    if (file_put_contents($caminho, $conteudo)) {
        $melhorados++;
        echo "✓ Melhorado: $nome (" . filesize($caminho) . " bytes)\n";
    } else {
        echo "✗ Erro ao melhorar: $nome\n";
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO: $melhorados baús melhorados!\n";
echo str_repeat('=', 70) . "\n";
