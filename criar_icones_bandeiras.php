<?php
/**
 * Criar Ícones SVG das Bandeiras
 */

echo "=== Criando Ícones SVG das Bandeiras ===\n\n";

$icones = [
    // The Smashing Skeletons - Esqueletos esmagadores
    'bandeira-smashing-skeletons' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#424242" stroke="#212121" stroke-width="2" rx="4"/>
  <circle cx="24" cy="24" r="6" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="40" cy="24" r="6" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="22" cy="23" r="2" fill="#212121"/>
  <circle cx="26" cy="23" r="2" fill="#212121"/>
  <circle cx="38" cy="23" r="2" fill="#212121"/>
  <circle cx="42" cy="23" r="2" fill="#212121"/>
  <path d="M 20,30 L 22,32 L 24,30 L 26,32 L 28,30" stroke="#EEEEEE" stroke-width="2" fill="none"/>
  <path d="M 36,30 L 38,32 L 40,30 L 42,32 L 44,30" stroke="#EEEEEE" stroke-width="2" fill="none"/>
  <rect x="26" y="36" width="4" height="12" fill="#EEEEEE"/>
  <rect x="34" y="36" width="4" height="12" fill="#EEEEEE"/>
  <polygon points="28,48 26,52 30,52" fill="#EEEEEE"/>
  <polygon points="36,48 34,52 38,52" fill="#EEEEEE"/>
  <path d="M 18,20 L 14,22 L 18,24" fill="#D32F2F"/>
  <path d="M 46,20 L 50,22 L 46,24" fill="#D32F2F"/>
</svg>',

    // Royal Victory - Vitória Real
    'bandeira-royal-victory' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#1565C0" stroke="#0D47A1" stroke-width="2" rx="4"/>
  <polygon points="32,16 28,24 32,22 36,24" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <circle cx="30" cy="22" r="1.5" fill="#E91E63"/>
  <circle cx="34" cy="22" r="1.5" fill="#E91E63"/>
  <rect x="28" y="28" width="8" height="6" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <path d="M 20,36 L 32,44 L 44,36" stroke="#FFD700" stroke-width="3" fill="none"/>
  <polygon points="32,38 28,42 32,40 36,42" fill="#FFEB3B"/>
  <rect x="16" y="48" width="32" height="4" fill="#FFD700"/>
</svg>',

    // Triple Crown - Três Coroas
    'bandeira-triple-crown' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#7B1FA2" stroke="#4A148C" stroke-width="2" rx="4"/>
  <polygon points="20,20 18,24 20,22 22,24" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <polygon points="32,16 30,20 32,18 34,20" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <polygon points="44,20 42,24 44,22 46,24" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <circle cx="20" cy="22" r="1" fill="#E91E63"/>
  <circle cx="32" cy="18" r="1" fill="#E91E63"/>
  <circle cx="44" cy="22" r="1" fill="#E91E63"/>
  <path d="M 18,28 L 32,38 L 46,28" stroke="#FFD700" stroke-width="2" fill="none"/>
  <text x="32" y="50" font-family="Arial, sans-serif" font-size="16" font-weight="bold" fill="#FFD700" text-anchor="middle">3</text>
</svg>',

    // Undefeated Champion - Campeão Invicto
    'bandeira-undefeated' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#D32F2F" stroke="#B71C1C" stroke-width="2" rx="4"/>
  <path d="M 24,18 L 32,28 L 40,18 L 38,28 L 44,32 L 38,36 L 40,46 L 32,36 L 24,46 L 26,36 L 20,32 L 26,28 Z" fill="#FFD700" stroke="#E0A000" stroke-width="1.5"/>
  <circle cx="32" cy="32" r="4" fill="#FFEB3B"/>
  <text x="32" y="36" font-family="Arial, sans-serif" font-size="8" font-weight="bold" fill="#D32F2F" text-anchor="middle">1</text>
</svg>',

    // War Master - Mestre de Guerra
    'bandeira-war-master' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#263238" stroke="#000000" stroke-width="2" rx="4"/>
  <path d="M 24,18 L 40,18 M 26,24 L 38,24" stroke="#D32F2F" stroke-width="3"/>
  <path d="M 20,30 L 44,30 L 40,36 L 24,36 Z" fill="#607D8B" stroke="#37474F" stroke-width="1"/>
  <rect x="30" y="36" width="4" height="12" fill="#78909C"/>
  <circle cx="32" cy="44" r="2" fill="#E0E0E0"/>
  <path d="M 18,20 L 22,24 L 18,28" stroke="#FF6F00" stroke-width="2" fill="none"/>
  <path d="M 46,20 L 42,24 L 46,28" stroke="#FF6F00" stroke-width="2" fill="none"/>
</svg>',

    // Golden Army - Exército Dourado
    'bandeira-golden-army' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#FFB300" stroke="#F57C00" stroke-width="2" rx="4"/>
  <circle cx="24" cy="24" r="4" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <circle cx="32" cy="24" r="4" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <circle cx="40" cy="24" r="4" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <rect x="22" y="32" width="4" height="8" fill="#BF360C"/>
  <rect x="30" y="32" width="4" height="8" fill="#BF360C"/>
  <rect x="38" y="32" width="4" height="8" fill="#BF360C"/>
  <path d="M 16,44 L 48,44 L 44,50 L 20,50 Z" fill="#D32F2F" stroke="#B71C1C" stroke-width="1"/>
</svg>',

    // Clan Warriors - Guerreiros do Clã
    'bandeira-clan-warriors' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#388E3C" stroke="#1B5E20" stroke-width="2" rx="4"/>
  <path d="M 22,20 L 32,28 L 42,20 M 22,32 L 32,40 L 42,32" stroke="#FFEB3B" stroke-width="2" fill="none"/>
  <circle cx="32" cy="24" r="3" fill="#FFD700"/>
  <circle cx="32" cy="36" r="3" fill="#FFD700"/>
  <rect x="28" y="44" width="8" height="8" fill="#2E7D32" stroke="#1B5E20" stroke-width="1"/>
</svg>',

    // Battle Banner - Estandarte de Batalha
    'bandeira-battle-banner' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#C62828" stroke="#8E0000" stroke-width="2" rx="4"/>
  <path d="M 24,20 L 40,20 L 32,28 Z" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <rect x="28" y="32" width="8" height="16" fill="#FFEB3B" stroke="#FFD700" stroke-width="1"/>
  <path d="M 20,52 L 44,52" stroke="#FFD700" stroke-width="2"/>
</svg>',

    // Legendary Trophy - Troféu Lendário
    'bandeira-legendary-trophy' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#1A237E" stroke="#0D1B5E" stroke-width="2" rx="4"/>
  <path d="M 24,20 Q 20,28 24,36 L 40,36 Q 44,28 40,20 Z" fill="#FFD700" stroke="#E0A000" stroke-width="1.5"/>
  <rect x="28" y="36" width="8" height="4" fill="#E0A000"/>
  <rect x="26" y="40" width="12" height="8" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <circle cx="32" cy="28" r="4" fill="#FFEB3B"/>
  <polygon points="32,24 31,27 34,27" fill="#FFFFFF"/>
</svg>',

    // Rainbow Unicorn - Unicórnio Arco-íris
    'bandeira-rainbow-unicorn' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#E1BEE7" stroke="#9C27B0" stroke-width="2" rx="4"/>
  <path d="M 16,16 L 48,16 L 48,32 L 16,32 Z" fill="url(#rainbowGrad)"/>
  <defs>
    <linearGradient id="rainbowGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#F44336"/>
      <stop offset="33%" style="stop-color:#FFEB3B"/>
      <stop offset="66%" style="stop-color:#2196F3"/>
      <stop offset="100%" style="stop-color:#9C27B0"/>
    </linearGradient>
  </defs>
  <circle cx="32" cy="36" r="6" fill="#FFFFFF" stroke="#E0E0E0" stroke-width="1"/>
  <polygon points="32,28 30,34 34,34" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <circle cx="30" cy="35" r="1" fill="#000000"/>
  <circle cx="34" cy="35" r="1" fill="#000000"/>
  <path d="M 30,38 Q 32,40 34,38" stroke="#F48FB1" stroke-width="1" fill="none"/>
</svg>',

    // P.E.K.K.A Power
    'bandeira-pekka-power' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#37474F" stroke="#212121" stroke-width="2" rx="4"/>
  <rect x="24" y="20" width="16" height="20" fill="#607D8B" stroke="#37474F" stroke-width="1.5"/>
  <rect x="28" y="24" width="8" height="4" fill="#F44336"/>
  <circle cx="28" cy="32" r="2" fill="#FFEB3B"/>
  <circle cx="36" cy="32" r="2" fill="#FFEB3B"/>
  <polygon points="32,44 28,48 36,48" fill="#78909C"/>
  <path d="M 18,26 L 22,30 L 18,34" fill="#E0E0E0"/>
  <path d="M 46,26 L 42,30 L 46,34" fill="#E0E0E0"/>
</svg>',

    // Dark Prince Legacy
    'bandeira-dark-prince' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#1A0A2E" stroke="#0D0517" stroke-width="2" rx="4"/>
  <polygon points="32,18 28,24 30,28 32,26 34,28 36,24" fill="#7B1FA2" stroke="#4A148C" stroke-width="1"/>
  <rect x="26" y="28" width="12" height="16" fill="#4A148C" stroke="#2A0845" stroke-width="1"/>
  <circle cx="28" cy="34" r="2" fill="#9C27B0"/>
  <circle cx="36" cy="34" r="2" fill="#9C27B0"/>
  <path d="M 28,42 L 32,46 L 36,42" stroke="#7B1FA2" stroke-width="2" fill="none"/>
</svg>',

    // Mega Knight Madness
    'bandeira-mega-knight' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#0D47A1" stroke="#01579B" stroke-width="2" rx="4"/>
  <rect x="24" y="22" width="16" height="18" fill="#1976D2" stroke="#0D47A1" stroke-width="1.5"/>
  <circle cx="32" cy="18" r="6" fill="#42A5F5" stroke="#1976D2" stroke-width="1"/>
  <rect x="28" y="22" width="8" height="3" fill="#000000"/>
  <circle cx="28" cy="28" r="1.5" fill="#FFEB3B"/>
  <circle cx="36" cy="28" r="1.5" fill="#FFEB3B"/>
  <path d="M 22,42 L 26,48 L 32,44 L 38,48 L 42,42" stroke="#FFEB3B" stroke-width="2" fill="none"/>
</svg>',

    // Witch Spell
    'bandeira-witch-spell' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#4A148C" stroke="#2A0845" stroke-width="2" rx="4"/>
  <polygon points="32,16 28,20 32,24 36,20" fill="#9C27B0" stroke="#7B1FA2" stroke-width="1"/>
  <circle cx="32" cy="28" r="6" fill="#FFD700" stroke="#E0A000" stroke-width="1"/>
  <circle cx="28" cy="27" r="1.5" fill="#4A148C"/>
  <circle cx="36" cy="27" r="1.5" fill="#4A148C"/>
  <circle cx="24" cy="38" r="3" fill="#EEEEEE"/>
  <circle cx="40" cy="38" r="3" fill="#EEEEEE"/>
  <circle cx="32" cy="44" r="3" fill="#EEEEEE"/>
  <circle cx="28" cy="50" r="2" fill="#EEEEEE"/>
  <circle cx="36" cy="50" r="2" fill="#EEEEEE"/>
</svg>',

    // Dragon Fire
    'bandeira-dragon-fire' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#BF360C" stroke="#8E0000" stroke-width="2" rx="4"/>
  <path d="M 20,24 Q 24,18 32,20 Q 40,18 44,24 Q 42,30 32,32 Q 22,30 20,24" fill="#D32F2F" stroke="#B71C1C" stroke-width="1"/>
  <circle cx="28" cy="24" r="2" fill="#FFEB3B"/>
  <circle cx="36" cy="24" r="2" fill="#FFEB3B"/>
  <path d="M 26,36 Q 28,32 32,34 Q 36,32 38,36" stroke="#FF6F00" stroke-width="2" fill="none"/>
  <path d="M 24,40 Q 28,36 32,38 Q 36,36 40,40" stroke="#FFA000" stroke-width="2" fill="none"/>
  <path d="M 22,44 Q 28,40 32,42 Q 36,40 42,44" stroke="#FFB300" stroke-width="2" fill="none"/>
</svg>',

    // King Crown
    'bandeira-king-crown' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#6A1B9A" stroke="#4A148C" stroke-width="2" rx="4"/>
  <path d="M 20,28 L 24,20 L 28,28 L 32,20 L 36,28 L 40,20 L 44,28 L 40,36 L 24,36 Z" fill="#FFD700" stroke="#E0A000" stroke-width="1.5"/>
  <circle cx="24" cy="20" r="2" fill="#E91E63"/>
  <circle cx="32" cy="20" r="2" fill="#E91E63"/>
  <circle cx="40" cy="20" r="2" fill="#E91E63"/>
  <rect x="26" y="40" width="12" height="8" fill="#7B1FA2" stroke="#4A148C" stroke-width="1"/>
</svg>',

    // Skeleton Army
    'bandeira-skeleton-army' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#212121" stroke="#000000" stroke-width="2" rx="4"/>
  <circle cx="22" cy="24" r="4" fill="#EEEEEE"/>
  <circle cx="32" cy="24" r="4" fill="#EEEEEE"/>
  <circle cx="42" cy="24" r="4" fill="#EEEEEE"/>
  <circle cx="20" cy="23" r="1" fill="#000000"/>
  <circle cx="24" cy="23" r="1" fill="#000000"/>
  <circle cx="30" cy="23" r="1" fill="#000000"/>
  <circle cx="34" cy="23" r="1" fill="#000000"/>
  <circle cx="40" cy="23" r="1" fill="#000000"/>
  <circle cx="44" cy="23" r="1" fill="#000000"/>
  <circle cx="22" cy="38" r="3" fill="#EEEEEE"/>
  <circle cx="32" cy="38" r="3" fill="#EEEEEE"/>
  <circle cx="42" cy="38" r="3" fill="#EEEEEE"/>
  <path d="M 18,48 L 20,50 L 22,48 L 24,50" stroke="#EEEEEE" stroke-width="1.5" fill="none"/>
  <path d="M 28,48 L 30,50 L 32,48 L 34,50 L 36,48" stroke="#EEEEEE" stroke-width="1.5" fill="none"/>
  <path d="M 38,48 L 40,50 L 42,48 L 44,50 L 46,48" stroke="#EEEEEE" stroke-width="1.5" fill="none"/>
</svg>',

    // Electro Wizard Shock
    'bandeira-electro-wizard' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#0D47A1" stroke="#01579B" stroke-width="2" rx="4"/>
  <circle cx="32" cy="24" r="8" fill="#1976D2" stroke="#0D47A1" stroke-width="1"/>
  <circle cx="28" cy="22" r="2" fill="#FFEB3B"/>
  <circle cx="36" cy="22" r="2" fill="#FFEB3B"/>
  <polygon points="28,34 32,40 26,42 32,48 28,50 36,50 32,42 38,40 32,34" fill="#FFEB3B" stroke="#FDD835" stroke-width="1"/>
  <path d="M 22,26 L 18,28 L 22,30" stroke="#FFEB3B" stroke-width="2"/>
  <path d="M 42,26 L 46,28 L 42,30" stroke="#FFEB3B" stroke-width="2"/>
</svg>',

    // Goblin Gang
    'bandeira-goblin-gang' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="8" width="40" height="48" fill="#558B2F" stroke="#33691E" stroke-width="2" rx="4"/>
  <circle cx="24" cy="26" r="5" fill="#7CB342" stroke="#558B2F" stroke-width="1"/>
  <circle cx="32" cy="24" r="5" fill="#7CB342" stroke="#558B2F" stroke-width="1"/>
  <circle cx="40" cy="26" r="5" fill="#7CB342" stroke="#558B2F" stroke-width="1"/>
  <circle cx="22" cy="25" r="1.5" fill="#FFD700"/>
  <circle cx="26" cy="25" r="1.5" fill="#FFD700"/>
  <circle cx="30" cy="23" r="1.5" fill="#FFD700"/>
  <circle cx="34" cy="23" r="1.5" fill="#FFD700"/>
  <circle cx="38" cy="25" r="1.5" fill="#FFD700"/>
  <circle cx="42" cy="25" r="1.5" fill="#FFD700"/>
  <rect x="22" y="36" width="4" height="8" fill="#689F38"/>
  <rect x="30" y="36" width="4" height="8" fill="#689F38"/>
  <rect x="38" y="36" width="4" height="8" fill="#689F38"/>
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
echo "\n✓ Ícones SVG das bandeiras criados com sucesso!\n";
