<?php
/**
 * Criar Ícones SVG dos Personagens Extras
 */

echo "=== Criando Ícones SVG - Personagens Extras ===\n\n";

$icones = [
    // Espírito Elétrico - pequeno espírito azul elétrico
    'espirito-eletrico' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="52" rx="12" ry="4" fill="#424242" opacity="0.3"/>
  <circle cx="32" cy="32" r="18" fill="#42A5F5" stroke="#1976D2" stroke-width="2"/>
  <circle cx="32" cy="32" r="14" fill="#64B5F6" opacity="0.8"/>
  <circle cx="26" cy="28" r="3" fill="#FFFFFF"/>
  <circle cx="38" cy="28" r="3" fill="#FFFFFF"/>
  <circle cx="26" cy="28" r="1.5" fill="#1976D2"/>
  <circle cx="38" cy="28" r="1.5" fill="#1976D2"/>
  <path d="M 28,36 Q 32,38 36,36" stroke="#1976D2" stroke-width="2" fill="none"/>
  <polygon points="28,18 30,24 26,26 30,30 28,34" fill="#FFEB3B" stroke="#FDD835" stroke-width="1"/>
  <polygon points="36,18 34,24 38,26 34,30 36,34" fill="#FFEB3B" stroke="#FDD835" stroke-width="1"/>
</svg>',

    // Servos - três pequenos servos azuis
    'servos' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="54" rx="20" ry="5" fill="#424242" opacity="0.3"/>
  <circle cx="20" cy="32" r="8" fill="#64B5F6" stroke="#1976D2" stroke-width="1.5"/>
  <circle cx="32" cy="28" r="8" fill="#64B5F6" stroke="#1976D2" stroke-width="1.5"/>
  <circle cx="44" cy="32" r="8" fill="#64B5F6" stroke="#1976D2" stroke-width="1.5"/>
  <rect x="18" y="38" width="4" height="10" fill="#42A5F5"/>
  <rect x="30" y="34" width="4" height="12" fill="#42A5F5"/>
  <rect x="42" y="38" width="4" height="10" fill="#42A5F5"/>
  <circle cx="18" cy="30" r="1.5" fill="#1976D2"/>
  <circle cx="22" cy="30" r="1.5" fill="#1976D2"/>
  <circle cx="30" cy="26" r="1.5" fill="#1976D2"/>
  <circle cx="34" cy="26" r="1.5" fill="#1976D2"/>
  <circle cx="42" cy="30" r="1.5" fill="#1976D2"/>
  <circle cx="46" cy="30" r="1.5" fill="#1976D2"/>
</svg>',

    // Goblin com Dardos - goblin verde com zarabatana
    'goblin-com-dardos' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="52" rx="14" ry="5" fill="#424242" opacity="0.3"/>
  <rect x="26" y="36" width="12" height="16" fill="#7CB342" stroke="#558B2F" stroke-width="2"/>
  <circle cx="32" cy="24" r="10" fill="#8BC34A" stroke="#689F38" stroke-width="2"/>
  <polygon points="28,14 32,10 36,14" fill="#689F38"/>
  <circle cx="28" cy="22" r="2" fill="#FFEB3B"/>
  <circle cx="36" cy="22" r="2" fill="#FFEB3B"/>
  <path d="M 28,28 Q 32,30 36,28" stroke="#558B2F" stroke-width="1.5" fill="none"/>
  <rect x="38" y="24" width="16" height="2" fill="#8D6E63" stroke="#5D4037" stroke-width="1"/>
  <polygon points="54,22 58,26 54,28" fill="#757575"/>
  <line x1="54" y1="26" x2="56" y2="24" stroke="#FFD700" stroke-width="1"/>
  <line x1="54" y1="26" x2="56" y2="28" stroke="#FFD700" stroke-width="1"/>
</svg>',

    // Três Mosqueteiras
    'tres-mosqueteiras' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="54" rx="24" ry="4" fill="#424242" opacity="0.3"/>
  <circle cx="18" cy="24" r="8" fill="#FFD700" stroke="#E0A000" stroke-width="1.5"/>
  <circle cx="32" cy="20" r="8" fill="#FFD700" stroke="#E0A000" stroke-width="1.5"/>
  <circle cx="46" cy="24" r="8" fill="#FFD700" stroke="#E0A000" stroke-width="1.5"/>
  <rect x="14" y="30" width="8" height="18" fill="#2196F3" stroke="#1976D2" stroke-width="1.5"/>
  <rect x="28" y="26" width="8" height="20" fill="#2196F3" stroke="#1976D2" stroke-width="1.5"/>
  <rect x="42" y="30" width="8" height="18" fill="#2196F3" stroke="#1976D2" stroke-width="1.5"/>
  <rect x="16" y="20" width="4" height="4" fill="#F44336"/>
  <rect x="30" y="16" width="4" height="4" fill="#F44336"/>
  <rect x="44" y="20" width="4" height="4" fill="#F44336"/>
  <rect x="10" y="32" width="2" height="10" fill="#C0C0C0"/>
  <rect x="26" y="28" width="2" height="12" fill="#C0C0C0"/>
  <rect x="40" y="32" width="2" height="10" fill="#C0C0C0"/>
</svg>',

    // Curadora Guerreira
    'curadora-guerreira' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="52" rx="16" ry="5" fill="#424242" opacity="0.3"/>
  <rect x="24" y="36" width="16" height="16" fill="#E91E63" stroke="#C2185B" stroke-width="2"/>
  <circle cx="32" cy="24" r="10" fill="#FFD700" stroke="#E0A000" stroke-width="2"/>
  <polygon points="28,14 32,10 36,14 32,18" fill="#F48FB1"/>
  <circle cx="28" cy="22" r="2" fill="#880E4F"/>
  <circle cx="36" cy="22" r="2" fill="#880E4F"/>
  <path d="M 28,28 Q 32,26 36,28" stroke="#C2185B" stroke-width="1.5" fill="none"/>
  <rect x="20" y="40" width="4" height="8" fill="#F06292"/>
  <rect x="40" y="40" width="4" height="8" fill="#F06292"/>
  <path d="M 32,32 L 32,38 M 29,35 L 35,35" stroke="#FFFFFF" stroke-width="2"/>
  <circle cx="24" cy="28" r="3" fill="#4CAF50" opacity="0.6"/>
  <circle cx="40" cy="28" r="3" fill="#4CAF50" opacity="0.6"/>
  <circle cx="32" cy="18" r="2" fill="#4CAF50" opacity="0.6"/>
</svg>',

    // Recrutas Reais - 6 recrutas com escudos
    'recrutas-reais' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="54" rx="26" ry="4" fill="#424242" opacity="0.3"/>
  <circle cx="14" cy="28" r="6" fill="#1565C0"/>
  <circle cx="24" cy="24" r="6" fill="#1565C0"/>
  <circle cx="32" cy="22" r="6" fill="#1565C0"/>
  <circle cx="40" cy="24" r="6" fill="#1565C0"/>
  <circle cx="50" cy="28" r="6" fill="#1565C0"/>
  <circle cx="27" cy="36" r="6" fill="#1565C0"/>
  <rect x="12" y="32" width="4" height="12" fill="#0D47A1"/>
  <rect x="22" y="28" width="4" height="14" fill="#0D47A1"/>
  <rect x="30" y="26" width="4" height="16" fill="#0D47A1"/>
  <rect x="38" y="28" width="4" height="14" fill="#0D47A1"/>
  <rect x="48" y="32" width="4" height="12" fill="#0D47A1"/>
  <rect x="25" y="40" width="4" height="12" fill="#0D47A1"/>
  <circle cx="14" cy="28" r="4" fill="#E3F2FD"/>
  <circle cx="24" cy="24" r="4" fill="#E3F2FD"/>
  <circle cx="32" cy="22" r="4" fill="#E3F2FD"/>
  <circle cx="40" cy="24" r="4" fill="#E3F2FD"/>
  <circle cx="50" cy="28" r="4" fill="#E3F2FD"/>
  <circle cx="27" cy="36" r="4" fill="#E3F2FD"/>
</svg>',

    // Exército de Esqueletos
    'exercito-de-esqueletos' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="54" rx="28" ry="4" fill="#424242" opacity="0.3"/>
  <circle cx="16" cy="22" r="5" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="26" cy="20" r="5" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="32" cy="18" r="5" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="38" cy="20" r="5" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="48" cy="22" r="5" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="20" cy="34" r="5" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="32" cy="32" r="5" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="44" cy="34" r="5" fill="#EEEEEE" stroke="#9E9E9E" stroke-width="1"/>
  <circle cx="14" cy="20" r="1.5" fill="#212121"/>
  <circle cx="18" cy="20" r="1.5" fill="#212121"/>
  <circle cx="24" cy="18" r="1.5" fill="#212121"/>
  <circle cx="28" cy="18" r="1.5" fill="#212121"/>
  <circle cx="30" cy="16" r="1.5" fill="#212121"/>
  <circle cx="34" cy="16" r="1.5" fill="#212121"/>
  <circle cx="36" cy="18" r="1.5" fill="#212121"/>
  <circle cx="40" cy="18" r="1.5" fill="#212121"/>
  <circle cx="46" cy="20" r="1.5" fill="#212121"/>
  <circle cx="50" cy="20" r="1.5" fill="#212121"/>
  <path d="M 14,26 L 16,28 L 18,26" stroke="#EEEEEE" stroke-width="1.5" fill="none"/>
  <path d="M 24,24 L 26,26 L 28,24 L 30,26" stroke="#EEEEEE" stroke-width="1.5" fill="none"/>
  <path d="M 30,22 L 32,24 L 34,22 L 36,24" stroke="#EEEEEE" stroke-width="1.5" fill="none"/>
  <path d="M 36,24 L 38,26 L 40,24 L 42,26" stroke="#EEEEEE" stroke-width="1.5" fill="none"/>
  <path d="M 46,26 L 48,28 L 50,26" stroke="#EEEEEE" stroke-width="1.5" fill="none"/>
  <rect x="14" y="30" width="2" height="8" fill="#EEEEEE"/>
  <rect x="24" y="26" width="2" height="10" fill="#EEEEEE"/>
  <rect x="30" y="24" width="2" height="12" fill="#EEEEEE"/>
  <rect x="38" y="26" width="2" height="10" fill="#EEEEEE"/>
  <rect x="48" y="30" width="2" height="8" fill="#EEEEEE"/>
  <rect x="18" y="40" width="2" height="8" fill="#EEEEEE"/>
  <rect x="30" y="38" width="2" height="10" fill="#EEEEEE"/>
  <rect x="42" y="40" width="2" height="8" fill="#EEEEEE"/>
</svg>',

    // Morteiro
    'morteiro' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="18" y="42" width="28" height="14" fill="#8D6E63" stroke="#5D4037" stroke-width="2"/>
  <rect x="22" y="36" width="20" height="8" fill="#A1887F" stroke="#6D4C41" stroke-width="1.5"/>
  <polygon points="32,20 26,36 38,36" fill="#78909C" stroke="#546E7A" stroke-width="2"/>
  <circle cx="32" cy="28" r="4" fill="#424242" stroke="#212121" stroke-width="1"/>
  <path d="M 28,18 L 30,22 L 26,24 L 30,28 L 28,32" fill="#FF6F00" stroke="#E65100" stroke-width="1"/>
  <circle cx="28" cy="18" r="2" fill="#FFA000"/>
  <rect x="24" y="46" width="4" height="6" fill="#6D4C41"/>
  <rect x="36" y="46" width="4" height="6" fill="#6D4C41"/>
  <rect x="16" y="54" width="32" height="4" fill="#5D4037"/>
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
echo "\n✓ Ícones SVG criados com sucesso!\n";
