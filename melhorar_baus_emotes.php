<?php
/**
 * Melhorar Baús e Emotes - Versões Premium
 */

echo "=== Melhorando Baús e Emotes (Versões Premium) ===\n\n";

$iconesMelhorados = [
    // BAÚS
    'bau-ouro.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="goldGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="50%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <radialGradient id="goldShine" cx="30%" cy="30%">
      <stop offset="0%" style="stop-color:#FFF;stop-opacity:0.8"/>
      <stop offset="100%" style="stop-color:#FFF;stop-opacity:0"/>
    </radialGradient>
    <filter id="shadowGold"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
  </defs>
  <ellipse cx="32" cy="56" rx="24" ry="4" fill="#000" opacity="0.3"/>
  <rect x="16" y="30" width="32" height="24" rx="2" fill="url(#goldGrad)" filter="url(#shadowGold)"/>
  <rect x="18" y="32" width="28" height="20" fill="#DAA520"/>
  <path d="M 16 30 Q 32 22 48 30" fill="url(#goldGrad)" filter="url(#shadowGold)"/>
  <ellipse cx="32" cy="30" rx="16" ry="8" fill="#FFD700"/>
  <ellipse cx="32" cy="30" rx="14" ry="6" fill="url(#goldShine)"/>
  <rect x="30" y="38" width="4" height="8" fill="#8B4513" filter="url(#shadowGold)"/>
  <circle cx="32" cy="42" r="6" fill="#FF4500"/>
  <circle cx="32" cy="42" r="4" fill="#FFD700"/>
  <rect x="20" y="48" width="24" height="6" fill="url(#goldGrad)" filter="url(#shadowGold)"/>
  <path d="M 24 35 L 28 35 M 36 35 L 40 35" stroke="#8B4513" stroke-width="2"/>
  <circle cx="26" cy="40" r="2" fill="#FF6347"/>
  <circle cx="38" cy="40" r="2" fill="#FF6347"/>
</svg>',

    'bau-lendario.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="legGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="25%" style="stop-color:#FFA500"/>
      <stop offset="50%" style="stop-color:#FF8C00"/>
      <stop offset="75%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FFD700"/>
    </linearGradient>
    <radialGradient id="rainbow" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FF00FF;stop-opacity:0.6"/>
      <stop offset="50%" style="stop-color:#00FFFF;stop-opacity:0.4"/>
      <stop offset="100%" style="stop-color:#FFFF00;stop-opacity:0.2"/>
    </radialGradient>
    <filter id="glow"><feGaussianBlur stdDeviation="2"/><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge></filter>
    <filter id="shadowLeg"><feDropShadow dx="2" dy="5" stdDeviation="4" flood-opacity="0.6"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="26" ry="4" fill="#000" opacity="0.4"/>
  <rect x="14" y="28" width="36" height="28" rx="3" fill="url(#legGrad)" filter="url(#shadowLeg)"/>
  <rect x="16" y="30" width="32" height="24" fill="#8B4513"/>
  <ellipse cx="32" cy="42" rx="18" ry="12" fill="url(#rainbow)" filter="url(#glow)"/>
  <path d="M 14 28 Q 32 18 50 28" fill="url(#legGrad)" filter="url(#shadowLeg)"/>
  <ellipse cx="32" cy="28" rx="18" ry="10" fill="#FFD700"/>
  <rect x="30" y="36" width="4" height="12" fill="#4B0082" filter="url(#shadowLeg)"/>
  <circle cx="32" cy="42" r="8" fill="#FF00FF"/>
  <circle cx="32" cy="42" r="6" fill="#FFD700"/>
  <circle cx="32" cy="42" r="4" fill="#FFF" opacity="0.8"/>
  <path d="M 32 20 L 28 24 L 32 28 L 36 24 Z" fill="#FFD700" filter="url(#shadowLeg)"/>
  <circle cx="20" cy="38" r="3" fill="#FF00FF" filter="url(#glow)"/>
  <circle cx="44" cy="38" r="3" fill="#00FFFF" filter="url(#glow)"/>
  <circle cx="20" cy="48" r="3" fill="#FFFF00" filter="url(#glow)"/>
  <circle cx="44" cy="48" r="3" fill="#FF69B4" filter="url(#glow)"/>
</svg>',

    // EMOTES MELHORADOS
    'rei-rindo.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="skinGradKing" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFE4B5"/>
      <stop offset="100%" style="stop-color:#FFDAB9"/>
    </linearGradient>
    <linearGradient id="crownGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="50%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <filter id="shadowKing"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
  </defs>
  <ellipse cx="32" cy="56" rx="20" ry="4" fill="#000" opacity="0.2"/>
  <ellipse cx="32" cy="32" rx="20" ry="22" fill="url(#skinGradKing)" filter="url(#shadowKing)"/>
  <circle cx="26" cy="28" r="3" fill="#000"/>
  <circle cx="38" cy="28" r="3" fill="#000"/>
  <path d="M 22 36 Q 32 46 42 36" fill="#8B0000"/>
  <path d="M 23 37 Q 32 45 41 37" fill="#FF6347"/>
  <ellipse cx="32" cy="42" rx="6" ry="3" fill="#FF1493" opacity="0.6"/>
  <path d="M 18 20 Q 20 12 22 20 Q 24 14 26 20 Q 28 12 30 20 Q 32 10 34 20 Q 36 12 38 20 Q 40 14 42 20 Q 44 12 46 20" fill="url(#crownGrad)" filter="url(#shadowKing)"/>
  <circle cx="24" cy="14" r="4" fill="#DC143C"/>
  <circle cx="32" cy="12" r="5" fill="#DC143C"/>
  <circle cx="40" cy="14" r="4" fill="#DC143C"/>
  <rect x="28" y="50" width="8" height="6" fill="#9370DB" filter="url(#shadowKing)"/>
  <path d="M 14 34 L 12 38 M 50 34 L 52 38" stroke="#8B4513" stroke-width="2"/>
  <circle cx="32" cy="32" r="24" fill="none" stroke="#FFD700" stroke-width="1" opacity="0.3"/>
</svg>',

    'goblin-chorao.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="goblinSkin" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#90EE90"/>
      <stop offset="100%" style="stop-color:#32CD32"/>
    </linearGradient>
    <filter id="shadowGob"><feDropShadow dx="1" dy="2" stdDeviation="2" flood-opacity="0.3"/></filter>
    <filter id="tearGlow"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <ellipse cx="32" cy="54" rx="16" ry="3" fill="#000" opacity="0.2"/>
  <ellipse cx="32" cy="32" rx="18" ry="20" fill="url(#goblinSkin)" filter="url(#shadowGob)"/>
  <circle cx="26" cy="28" r="5" fill="#FFF"/>
  <circle cx="38" cy="28" r="5" fill="#FFF"/>
  <circle cx="26" cy="30" r="3" fill="#000"/>
  <circle cx="38" cy="30" r="3" fill="#000"/>
  <path d="M 24 40 Q 32 36 40 40" stroke="#000" stroke-width="2" fill="none"/>
  <path d="M 22 36 L 20 44 Q 18 50 16 56" stroke="#00BFFF" stroke-width="4" stroke-linecap="round" filter="url(#tearGlow)"/>
  <path d="M 42 36 L 44 44 Q 46 50 48 56" stroke="#00BFFF" stroke-width="4" stroke-linecap="round" filter="url(#tearGlow)"/>
  <circle cx="16" cy="56" r="4" fill="#00BFFF" opacity="0.7" filter="url(#tearGlow)"/>
  <circle cx="48" cy="56" r="4" fill="#00BFFF" opacity="0.7" filter="url(#tearGlow)"/>
  <circle cx="18" cy="52" r="3" fill="#00BFFF" opacity="0.6"/>
  <circle cx="46" cy="52" r="3" fill="#00BFFF" opacity="0.6"/>
  <circle cx="20" cy="48" r="2" fill="#00BFFF" opacity="0.5"/>
  <circle cx="44" cy="48" r="2" fill="#00BFFF" opacity="0.5"/>
  <path d="M 22 22 L 26 16 L 28 20 M 36 20 L 38 16 L 42 22" fill="#228B22" filter="url(#shadowGob)"/>
  <ellipse cx="20" cy="34" rx="2" ry="3" fill="#FF6B6B" opacity="0.6"/>
  <ellipse cx="44" cy="34" rx="2" ry="3" fill="#FF6B6B" opacity="0.6"/>
</svg>'
];

$criados = 0;
$erros = 0;

echo "Criando versões premium...\n\n";

foreach ($iconesMelhorados as $arquivo => $svg) {
    $caminho = "assets/img/$arquivo";

    // Backup
    if (file_exists($caminho)) {
        $backup = str_replace('.svg', '_backup.svg', $caminho);
        if (!file_exists($backup)) {
            copy($caminho, $backup);
            echo "  📁 Backup: $backup\n";
        }
    }

    if (file_put_contents($caminho, $svg)) {
        echo "  ✓ $arquivo - MELHORADO\n";
        $criados++;
    } else {
        echo "  ✗ Erro: $arquivo\n";
        $erros++;
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO: $criados ícones melhorados, $erros erros\n";
echo str_repeat('=', 70) . "\n";
