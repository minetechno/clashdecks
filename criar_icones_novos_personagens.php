<?php
/**
 * Criar Ícones SVG dos Novos Personagens
 */

echo "=== Criando Ícones SVG - Novos Personagens ===\n\n";

$icones = [
    // Espelho - Feitiço que reflete/duplica
    'espelho' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="14" y="8" width="36" height="48" fill="#B39DDB" stroke="#512DA8" stroke-width="2" rx="4"/>
  <rect x="18" y="12" width="28" height="40" fill="#E1BEE7" stroke="#7B1FA2" stroke-width="1.5"/>
  <circle cx="32" cy="32" r="12" fill="#FFE082" opacity="0.3"/>
  <path d="M 26,26 L 32,32 L 38,26 M 38,38 L 32,32 L 26,38" stroke="#512DA8" stroke-width="2" fill="none"/>
  <circle cx="28" cy="28" r="2" fill="#FFE082"/>
  <circle cx="36" cy="36" r="2" fill="#FFE082"/>
</svg>',

    // Clone - Duplicação
    'clone' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <circle cx="28" cy="28" r="16" fill="#4FC3F7" opacity="0.6" stroke="#0277BD" stroke-width="2"/>
  <circle cx="36" cy="36" r="16" fill="#4FC3F7" opacity="0.6" stroke="#0277BD" stroke-width="2"/>
  <circle cx="28" cy="28" r="8" fill="#81D4FA"/>
  <circle cx="36" cy="36" r="8" fill="#81D4FA"/>
  <circle cx="28" cy="26" r="2" fill="#FFFFFF"/>
  <circle cx="36" cy="34" r="2" fill="#FFFFFF"/>
  <path d="M 28,32 Q 32,34 36,32" stroke="#0277BD" stroke-width="1.5" fill="none"/>
</svg>',

    // Congelar - Gelo
    'congelar' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <circle cx="32" cy="32" r="24" fill="#B3E5FC" opacity="0.6"/>
  <path d="M 32,8 L 32,56 M 8,32 L 56,32 M 15,15 L 49,49 M 49,15 L 15,49" stroke="#0277BD" stroke-width="3" stroke-linecap="round"/>
  <circle cx="32" cy="8" r="3" fill="#81D4FA" stroke="#0277BD" stroke-width="1"/>
  <circle cx="32" cy="56" r="3" fill="#81D4FA" stroke="#0277BD" stroke-width="1"/>
  <circle cx="8" cy="32" r="3" fill="#81D4FA" stroke="#0277BD" stroke-width="1"/>
  <circle cx="56" cy="32" r="3" fill="#81D4FA" stroke="#0277BD" stroke-width="1"/>
  <circle cx="15" cy="15" r="3" fill="#81D4FA" stroke="#0277BD" stroke-width="1"/>
  <circle cx="49" cy="49" r="3" fill="#81D4FA" stroke="#0277BD" stroke-width="1"/>
  <circle cx="49" cy="15" r="3" fill="#81D4FA" stroke="#0277BD" stroke-width="1"/>
  <circle cx="15" cy="49" r="3" fill="#81D4FA" stroke="#0277BD" stroke-width="1"/>
</svg>',

    // Terremoto
    'terremoto' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <circle cx="32" cy="32" r="28" fill="#8D6E63" opacity="0.3"/>
  <path d="M 8,32 L 16,28 L 24,36 L 32,24 L 40,36 L 48,28 L 56,32" stroke="#5D4037" stroke-width="3" fill="none" stroke-linecap="round"/>
  <path d="M 8,40 L 16,36 L 24,44 L 32,32 L 40,44 L 48,36 L 56,40" stroke="#6D4C41" stroke-width="2.5" fill="none" stroke-linecap="round"/>
  <rect x="28" y="48" width="8" height="10" fill="#4E342E"/>
  <polygon points="32,48 24,48 28,44" fill="#6D4C41"/>
  <polygon points="32,48 40,48 36,44" fill="#6D4C41"/>
</svg>',

    // Fúria - Velocidade
    'furia' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <circle cx="32" cy="32" r="26" fill="#E91E63" opacity="0.4"/>
  <path d="M 12,32 L 22,32 L 26,24 L 30,40 L 34,20 L 38,36 L 42,28 L 52,28" stroke="#C2185B" stroke-width="4" fill="none" stroke-linecap="round"/>
  <polygon points="48,24 52,28 48,32" fill="#C2185B"/>
  <circle cx="52" cy="28" r="2" fill="#F8BBD0"/>
</svg>',

    // Raiva - Força e dano
    'raiva' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <circle cx="32" cy="32" r="26" fill="#B71C1C" opacity="0.5"/>
  <path d="M 20,36 Q 24,28 28,36 T 36,36 T 44,36" stroke="#D32F2F" stroke-width="3" fill="none"/>
  <path d="M 24,20 L 28,28 L 20,24 Z" fill="#D32F2F"/>
  <path d="M 40,20 L 36,28 L 44,24 Z" fill="#D32F2F"/>
  <polygon points="32,38 28,46 32,44 36,46" fill="#D32F2F"/>
</svg>',

    // Megacavaleiro
    'megacavaleiro' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="48" rx="18" ry="8" fill="#424242" opacity="0.3"/>
  <rect x="24" y="34" width="16" height="20" fill="#78909C" stroke="#263238" stroke-width="2" rx="2"/>
  <circle cx="32" cy="24" r="12" fill="#90A4AE" stroke="#263238" stroke-width="2"/>
  <rect x="28" y="28" width="8" height="4" fill="#263238"/>
  <circle cx="28" cy="20" r="2" fill="#263238"/>
  <circle cx="36" cy="20" r="2" fill="#263238"/>
  <polygon points="32,12 28,18 36,18" fill="#D32F2F"/>
  <rect x="20" y="38" width="6" height="12" fill="#607D8B" stroke="#263238" stroke-width="1"/>
  <rect x="38" y="38" width="6" height="12" fill="#607D8B" stroke="#263238" stroke-width="1"/>
</svg>',

    // Executor - Machado
    'executor' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="52" rx="16" ry="6" fill="#424242" opacity="0.3"/>
  <rect x="26" y="36" width="12" height="16" fill="#78909C" stroke="#263238" stroke-width="2"/>
  <circle cx="32" cy="26" r="10" fill="#90A4AE" stroke="#263238" stroke-width="2"/>
  <rect x="28" y="28" width="8" height="3" fill="#263238"/>
  <circle cx="28" cy="23" r="1.5" fill="#263238"/>
  <circle cx="36" cy="23" r="1.5" fill="#263238"/>
  <rect x="38" y="24" width="16" height="4" fill="#8D6E63" stroke="#4E342E" stroke-width="1.5"/>
  <polygon points="54,20 58,28 54,32" fill="#607D8B" stroke="#263238" stroke-width="1.5"/>
</svg>',

    // Bandit
    'bandit' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="52" rx="14" ry="5" fill="#424242" opacity="0.3"/>
  <rect x="26" y="36" width="12" height="16" fill="#424242" stroke="#000000" stroke-width="1.5"/>
  <circle cx="32" cy="26" r="9" fill="#FFD700" stroke="#E0A000" stroke-width="2"/>
  <rect x="26" y="22" width="12" height="6" fill="#000000"/>
  <circle cx="28" cy="24" r="1.5" fill="#FFFFFF"/>
  <circle cx="36" cy="24" r="1.5" fill="#FFFFFF"/>
  <rect x="36" cy="26" width="14" height="3" fill="#C0C0C0" stroke="#808080" stroke-width="1"/>
  <polygon points="50,24 52,28 50,30" fill="#E0E0E0"/>
</svg>',

    // Pescador
    'pescador' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="52" rx="14" ry="5" fill="#424242" opacity="0.3"/>
  <rect x="26" y="36" width="12" height="16" fill="#1976D2" stroke="#0D47A1" stroke-width="2"/>
  <circle cx="32" cy="26" r="9" fill="#FFD700" stroke="#E0A000" stroke-width="2"/>
  <rect x="28" y="20" width="8" height="4" fill="#FF6F00"/>
  <circle cx="28" cy="24" r="1.5" fill="#263238"/>
  <circle cx="36" cy="24" r="1.5" fill="#263238"/>
  <path d="M 36,26 Q 42,22 46,18" stroke="#8D6E63" stroke-width="2" fill="none"/>
  <circle cx="46" cy="18" r="2" fill="#FFC107"/>
  <path d="M 46,18 L 48,14" stroke="#757575" stroke-width="1.5"/>
</svg>',

    // Mãe Bruxa
    'mae-bruxa' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="52" rx="16" ry="6" fill="#424242" opacity="0.3"/>
  <rect x="24" y="36" width="16" height="16" fill="#5E35B1" stroke="#311B92" stroke-width="2"/>
  <circle cx="32" cy="24" r="10" fill="#FFD700" stroke="#E0A000" stroke-width="2"/>
  <polygon points="28,14 32,10 36,14 32,18" fill="#311B92"/>
  <circle cx="28" cy="22" r="2" fill="#9C27B0"/>
  <circle cx="36" cy="22" r="2" fill="#9C27B0"/>
  <path d="M 28,28 Q 32,26 36,28" stroke="#311B92" stroke-width="1.5" fill="none"/>
  <rect x="20" y="40" width="4" height="8" fill="#7E57C2"/>
  <rect x="40" y="40" width="4" height="8" fill="#7E57C2"/>
</svg>',

    // Bruxa Noturna
    'bruxa-noturna' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <circle cx="32" cy="32" r="28" fill="#4A148C" opacity="0.3"/>
  <path d="M 20,36 Q 18,32 20,28 T 24,32 Z" fill="#6A1B9A"/>
  <path d="M 44,36 Q 46,32 44,28 T 40,32 Z" fill="#6A1B9A"/>
  <rect x="24" y="32" width="16" height="18" fill="#4A148C" stroke="#2A0845" stroke-width="2"/>
  <circle cx="32" cy="22" r="10" fill="#FFD700" stroke="#E0A000" stroke-width="2"/>
  <polygon points="28,12 32,8 36,12 32,16" fill="#4A148C"/>
  <circle cx="28" cy="20" r="2" fill="#BA68C8"/>
  <circle cx="36" cy="20" r="2" fill="#BA68C8"/>
</svg>',

    // Eletrogigante
    'eletrogigante' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="54" rx="20" ry="6" fill="#424242" opacity="0.3"/>
  <rect x="22" y="34" width="20" height="20" fill="#1976D2" stroke="#0D47A1" stroke-width="2" rx="2"/>
  <circle cx="32" cy="20" r="12" fill="#42A5F5" stroke="#1976D2" stroke-width="2"/>
  <circle cx="28" cy="18" r="2" fill="#FFEB3B"/>
  <circle cx="36" cy="18" r="2" fill="#FFEB3B"/>
  <rect x="28" y="24" width="8" height="4" fill="#0D47A1"/>
  <polygon points="32,12 30,16 34,16" fill="#FFEB3B"/>
  <path d="M 26,36 L 24,32 L 22,36" stroke="#FFEB3B" stroke-width="2" fill="none"/>
  <path d="M 38,36 L 40,32 L 42,36" stroke="#FFEB3B" stroke-width="2" fill="none"/>
</svg>',

    // Guardas
    'guardas' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <circle cx="20" cy="32" r="14" fill="#E0E0E0" stroke="#757575" stroke-width="2"/>
  <circle cx="32" cy="28" r="14" fill="#E0E0E0" stroke="#757575" stroke-width="2"/>
  <circle cx="44" cy="32" r="14" fill="#E0E0E0" stroke="#757575" stroke-width="2"/>
  <circle cx="20" cy="32" r="10" fill="#1565C0"/>
  <circle cx="32" cy="28" r="10" fill="#1565C0"/>
  <circle cx="44" cy="32" r="10" fill="#1565C0"/>
  <rect x="17" y="30" width="6" height="4" fill="#FFEB3B"/>
  <rect x="29" y="26" width="6" height="4" fill="#FFEB3B"/>
  <rect x="41" y="30" width="6" height="4" fill="#FFEB3B"/>
</svg>',

    // Fornalha
    'fornalha' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="24" width="32" height="32" fill="#8D6E63" stroke="#5D4037" stroke-width="2" rx="2"/>
  <rect x="20" y="28" width="24" height="24" fill="#D84315" stroke="#BF360C" stroke-width="1.5"/>
  <circle cx="32" cy="38" r="8" fill="#FF6F00"/>
  <circle cx="32" cy="38" r="5" fill="#FFA000"/>
  <path d="M 32,30 Q 28,32 32,38" stroke="#FFEB3B" stroke-width="2" fill="none"/>
  <path d="M 32,30 Q 36,32 32,38" stroke="#FFEB3B" stroke-width="2" fill="none"/>
  <rect x="28" y="16" width="8" height="8" fill="#6D4C41" stroke="#4E342E" stroke-width="1"/>
</svg>',

    // Bomba Gigante
    'bomba-gigante' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <ellipse cx="32" cy="52" rx="18" ry="6" fill="#424242" opacity="0.3"/>
  <circle cx="32" cy="36" r="18" fill="#424242" stroke="#000000" stroke-width="2"/>
  <circle cx="32" cy="36" r="14" fill="#616161"/>
  <rect x="30" y="10" width="4" height="12" fill="#8D6E63" stroke="#5D4037" stroke-width="1"/>
  <circle cx="32" cy="10" r="3" fill="#FF6F00"/>
  <path d="M 32,8 Q 30,6 28,8" stroke="#FFA000" stroke-width="1.5" fill="none"/>
  <path d="M 32,8 Q 34,6 36,8" stroke="#FFA000" stroke-width="1.5" fill="none"/>
</svg>',

    // Cabana de Goblins
    'cabana-de-goblins' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="18" y="32" width="28" height="24" fill="#8D6E63" stroke="#5D4037" stroke-width="2"/>
  <polygon points="32,12 14,32 50,32" fill="#A1887F" stroke="#5D4037" stroke-width="2"/>
  <rect x="28" y="42" width="8" height="14" fill="#6D4C41"/>
  <rect x="22" y="38" width="6" height="8" fill="#4E342E"/>
  <rect x="36" y="38" width="6" height="8" fill="#4E342E"/>
  <circle cx="32" cy="24" r="4" fill="#7CB342"/>
  <rect x="24" y="26" width="3" height="6" fill="#558B2F"/>
  <rect x="37" y="26" width="3" height="6" fill="#558B2F"/>
</svg>',

    // Túmulo
    'tumulo' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="20" y="40" width="24" height="16" fill="#616161" stroke="#424242" stroke-width="2"/>
  <path d="M 20,40 L 32,24 L 44,40 Z" fill="#757575" stroke="#424242" stroke-width="2"/>
  <rect x="28" y="32" width="8" height="12" fill="#424242"/>
  <rect x="30" y="36" width="4" height="4" fill="#E0E0E0"/>
  <circle cx="18" cy="52" r="3" fill="#EEEEEE"/>
  <circle cx="46" cy="52" r="3" fill="#EEEEEE"/>
  <path d="M 24,28 Q 26,24 28,28" stroke="#9E9E9E" stroke-width="1" fill="none"/>
  <path d="M 36,28 Q 38,24 40,28" stroke="#9E9E9E" stroke-width="1" fill="none"/>
</svg>',

    // X-Besta
    'xbesta' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="22" y="34" width="20" height="20" fill="#8D6E63" stroke="#5D4037" stroke-width="2" rx="2"/>
  <rect x="26" y="38" width="12" height="12" fill="#A1887F"/>
  <path d="M 14,28 L 32,20 L 50,28 L 32,36 Z" fill="#6D4C41" stroke="#4E342E" stroke-width="2"/>
  <rect x="30" y="16" width="4" height="12" fill="#424242" stroke="#212121" stroke-width="1"/>
  <polygon points="32,16 28,12 36,12" fill="#9E9E9E"/>
  <line x1="20" y1="28" x2="44" y2="28" stroke="#212121" stroke-width="2"/>
  <line x1="26" y1="22" x2="38" y2="22" stroke="#757575" stroke-width="1.5"/>
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
