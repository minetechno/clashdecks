<?php
/**
 * Melhora as primeiras 12 bandeiras com gradientes, sombras e efeitos 3D
 */

$bandeiras = [
    'laranja-xadrez.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="orangeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
  </defs>
  <rect x="8" y="8" width="48" height="48" fill="url(#orangeGrad)" filter="url(#shadow)"/>
  <rect x="8" y="8" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="32" y="8" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="20" y="20" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="44" y="20" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="8" y="32" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="32" y="32" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="20" y="44" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="44" y="44" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#D2691E" stroke-width="3" filter="url(#shadow)"/>
</svg>',

    'verde-xadrez.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="greenGrad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#90EE90"/>
      <stop offset="100%" style="stop-color:#32CD32"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
  </defs>
  <rect x="8" y="8" width="48" height="48" fill="url(#greenGrad)" filter="url(#shadow)"/>
  <rect x="8" y="8" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="32" y="8" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="20" y="20" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="44" y="20" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="8" y="32" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="32" y="32" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="20" y="44" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="44" y="44" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#228B22" stroke-width="3" filter="url(#shadow)"/>
</svg>',

    'roxo-xadrez.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="purpleGrad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#BA55D3"/>
      <stop offset="100%" style="stop-color:#9370DB"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
  </defs>
  <rect x="8" y="8" width="48" height="48" fill="url(#purpleGrad)" filter="url(#shadow)"/>
  <rect x="8" y="8" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="32" y="8" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="20" y="20" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="44" y="20" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="8" y="32" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="32" y="32" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="20" y="44" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="44" y="44" width="12" height="12" fill="#FFF" opacity="0.9"/>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#8B008B" stroke-width="3" filter="url(#shadow)"/>
</svg>',

    'bandeira-royal-victory.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="royalBlue" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#2196F3"/>
      <stop offset="50%" style="stop-color:#1565C0"/>
      <stop offset="100%" style="stop-color:#0D47A1"/>
    </linearGradient>
    <linearGradient id="gold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FFA500"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="glow"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <rect x="12" y="8" width="40" height="48" fill="url(#royalBlue)" stroke="#0D47A1" stroke-width="2" rx="4" filter="url(#shadow)"/>
  <polygon points="32,16 28,24 32,22 36,24" fill="url(#gold)" stroke="#E0A000" stroke-width="1" filter="url(#glow)"/>
  <circle cx="30" cy="22" r="2" fill="#E91E63" filter="url(#glow)"/>
  <circle cx="34" cy="22" r="2" fill="#E91E63" filter="url(#glow)"/>
  <rect x="28" y="28" width="8" height="6" fill="url(#gold)" stroke="#E0A000" stroke-width="1"/>
  <path d="M 20,36 L 32,44 L 44,36" stroke="url(#gold)" stroke-width="3" fill="none"/>
  <polygon points="32,38 28,42 32,40 36,42" fill="#FFEB3B" filter="url(#glow)"/>
  <rect x="16" y="48" width="32" height="4" fill="url(#gold)"/>
</svg>',

    'bandeira-king-crown.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="purple" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#9C27B0"/>
      <stop offset="50%" style="stop-color:#6A1B9A"/>
      <stop offset="100%" style="stop-color:#4A148C"/>
    </linearGradient>
    <linearGradient id="crownGold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FFA500"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="shine"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <rect x="12" y="8" width="40" height="48" fill="url(#purple)" stroke="#4A148C" stroke-width="2" rx="4" filter="url(#shadow)"/>
  <path d="M 20,28 L 24,20 L 28,28 L 32,20 L 36,28 L 40,20 L 44,28 L 40,36 L 24,36 Z" fill="url(#crownGold)" stroke="#E0A000" stroke-width="1.5" filter="url(#shadow)"/>
  <circle cx="24" cy="20" r="2.5" fill="#E91E63" filter="url(#shine)"/>
  <circle cx="32" cy="20" r="2.5" fill="#E91E63" filter="url(#shine)"/>
  <circle cx="40" cy="20" r="2.5" fill="#E91E63" filter="url(#shine)"/>
  <rect x="26" y="40" width="12" height="8" fill="#7B1FA2" stroke="#4A148C" stroke-width="1"/>
</svg>',

    'flechas.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="arrowRed" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#FF6347"/>
      <stop offset="100%" style="stop-color:#DC143C"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
  </defs>
  <rect x="8" y="8" width="48" height="48" fill="#2C3E50" filter="url(#shadow)"/>
  <path d="M 16 32 L 28 20 L 28 26 L 48 26 L 48 38 L 28 38 L 28 44 Z" fill="url(#arrowRed)" stroke="#8B0000" stroke-width="2" filter="url(#shadow)"/>
  <path d="M 48 32 L 36 20 L 36 26 L 16 26 L 16 38 L 36 38 L 36 44 Z" fill="url(#arrowRed)" stroke="#8B0000" stroke-width="2" opacity="0.7"/>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#DC143C" stroke-width="3" filter="url(#shadow)"/>
</svg>',

    'rock-psicodelico.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="psyche1" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#FF00FF"/>
      <stop offset="50%" style="stop-color:#00FFFF"/>
      <stop offset="100%" style="stop-color:#FFFF00"/>
    </linearGradient>
    <radialGradient id="psyche2" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FF69B4;stop-opacity:0.8"/>
      <stop offset="50%" style="stop-color:#9370DB;stop-opacity:0.6"/>
      <stop offset="100%" style="stop-color:#FFD700;stop-opacity:0.4"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
    <filter id="glow"><feGaussianBlur stdDeviation="2"/></filter>
  </defs>
  <rect x="8" y="8" width="48" height="48" fill="url(#psyche1)" filter="url(#shadow)"/>
  <circle cx="20" cy="20" r="8" fill="url(#psyche2)" filter="url(#glow)"/>
  <circle cx="44" cy="20" r="8" fill="url(#psyche2)" filter="url(#glow)"/>
  <circle cx="32" cy="32" r="10" fill="url(#psyche2)" filter="url(#glow)"/>
  <circle cx="20" cy="44" r="6" fill="url(#psyche2)" filter="url(#glow)"/>
  <circle cx="44" cy="44" r="6" fill="url(#psyche2)" filter="url(#glow)"/>
  <path d="M 24 28 Q 32 24 40 28" stroke="#FFF" stroke-width="3" fill="none" opacity="0.8"/>
  <path d="M 24 36 Q 32 40 40 36" stroke="#FFF" stroke-width="3" fill="none" opacity="0.8"/>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#FF00FF" stroke-width="3" filter="url(#shadow)"/>
</svg>',

    'bandeira-undefeated.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="undefGold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="50%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.6"/></filter>
    <filter id="shine"><feGaussianBlur stdDeviation="1.5"/></filter>
  </defs>
  <rect x="12" y="8" width="40" height="48" fill="url(#undefGold)" stroke="#FF8C00" stroke-width="2" rx="4" filter="url(#shadow)"/>
  <polygon points="32,18 28,24 32,22 36,24" fill="#FFF" filter="url(#shine)"/>
  <polygon points="32,26 28,32 32,30 36,32" fill="#FFF" filter="url(#shine)"/>
  <polygon points="32,34 28,40 32,38 36,40" fill="#FFF" filter="url(#shine)"/>
  <circle cx="32" cy="30" r="8" fill="none" stroke="#FFF" stroke-width="2" opacity="0.7"/>
</svg>',

    'bandeira-triple-crown.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="royal" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#4169E1"/>
      <stop offset="50%" style="stop-color:#0000CD"/>
      <stop offset="100%" style="stop-color:#000080"/>
    </linearGradient>
    <linearGradient id="crown" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FFA500"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
  </defs>
  <rect x="12" y="8" width="40" height="48" fill="url(#royal)" stroke="#000080" stroke-width="2" rx="4" filter="url(#shadow)"/>
  <path d="M 20,20 L 22,16 L 24,20 L 26,16 L 28,20 L 26,24 L 20,24 Z" fill="url(#crown)" filter="url(#shadow)"/>
  <path d="M 28,28 L 30,24 L 32,28 L 34,24 L 36,28 L 34,32 L 28,32 Z" fill="url(#crown)" filter="url(#shadow)"/>
  <path d="M 36,36 L 38,32 L 40,36 L 42,32 L 44,36 L 42,40 L 36,40 Z" fill="url(#crown)" filter="url(#shadow)"/>
  <circle cx="23" cy="18" r="1.5" fill="#FF1493"/>
  <circle cx="32" cy="26" r="1.5" fill="#FF1493"/>
  <circle cx="40" cy="34" r="1.5" fill="#FF1493"/>
</svg>',

    'bandeira-legendary-trophy.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="trophyGold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="50%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <radialGradient id="trophyGlow" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFFF00;stop-opacity:0.8"/>
      <stop offset="100%" style="stop-color:#FFD700;stop-opacity:0.3"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.6"/></filter>
    <filter id="shine"><feGaussianBlur stdDeviation="2"/></filter>
  </defs>
  <rect x="12" y="8" width="40" height="48" fill="#2E7D32" stroke="#1B5E20" stroke-width="2" rx="4" filter="url(#shadow)"/>
  <path d="M 24,20 L 22,24 L 24,32 L 28,36 L 32,38 L 36,36 L 40,32 L 42,24 L 40,20 Z" fill="url(#trophyGold)" stroke="#FF8C00" stroke-width="1.5" filter="url(#shadow)"/>
  <rect x="30" y="38" width="4" height="8" fill="url(#trophyGold)"/>
  <rect x="26" y="46" width="12" height="4" fill="url(#trophyGold)"/>
  <circle cx="32" cy="28" r="6" fill="url(#trophyGlow)" filter="url(#shine)"/>
  <path d="M 22,24 L 18,26 L 20,30 L 22,28 Z" fill="url(#trophyGold)" opacity="0.8"/>
  <path d="M 42,24 L 46,26 L 44,30 L 42,28 Z" fill="url(#trophyGold)" opacity="0.8"/>
</svg>',

    'bandeira-golden-army.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="armyGold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="50%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
  </defs>
  <rect x="12" y="8" width="40" height="48" fill="url(#armyGold)" stroke="#FF8C00" stroke-width="2" rx="4" filter="url(#shadow)"/>
  <rect x="22" y="18" width="6" height="8" fill="#8B4513" stroke="#654321" stroke-width="1"/>
  <circle cx="25" cy="16" r="2" fill="#8B4513"/>
  <rect x="32" y="18" width="6" height="8" fill="#8B4513" stroke="#654321" stroke-width="1"/>
  <circle cx="35" cy="16" r="2" fill="#8B4513"/>
  <rect x="22" y="32" width="6" height="8" fill="#8B4513" stroke="#654321" stroke-width="1"/>
  <circle cx="25" cy="30" r="2" fill="#8B4513"/>
  <rect x="32" y="32" width="6" height="8" fill="#8B4513" stroke="#654321" stroke-width="1"/>
  <circle cx="35" cy="30" r="2" fill="#8B4513"/>
  <path d="M 20,44 L 32,46 L 44,44" stroke="#8B0000" stroke-width="2" fill="none"/>
</svg>',

    'bandeira-war-master.svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <defs>
    <linearGradient id="warRed" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FF6347"/>
      <stop offset="50%" style="stop-color:#DC143C"/>
      <stop offset="100%" style="stop-color:#8B0000"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.6"/></filter>
  </defs>
  <rect x="12" y="8" width="40" height="48" fill="url(#warRed)" stroke="#8B0000" stroke-width="2" rx="4" filter="url(#shadow)"/>
  <path d="M 26,20 L 32,16 L 38,20 L 38,28 L 32,32 L 26,28 Z" fill="#FFD700" stroke="#FFA500" stroke-width="2" filter="url(#shadow)"/>
  <rect x="30" y="24" width="4" height="12" fill="#A9A9A9" stroke="#696969" stroke-width="1"/>
  <path d="M 24,36 L 32,40 L 40,36" stroke="#FFD700" stroke-width="3" fill="none"/>
  <circle cx="20" cy="44" r="2" fill="#FFD700"/>
  <circle cx="32" cy="44" r="2" fill="#FFD700"/>
  <circle cx="44" cy="44" r="2" fill="#FFD700"/>
</svg>'
];

$backupDir = 'assets/img/';
$melhorados = 0;

foreach ($bandeiras as $nome => $conteudo) {
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
echo "RESUMO: $melhorados bandeiras melhoradas (Parte 1/2)!\n";
echo str_repeat('=', 70) . "\n";
