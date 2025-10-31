<?php
/**
 * Melhorar Ícones Principais - Versões Premium
 * Criando ícones completamente redesenhados com mais detalhes
 */

echo "=== Melhorando Ícones Principais (Versões Premium) ===\n\n";

$iconesMelhorados = [
    // PERSONAGENS PRINCIPAIS
    'cavaleiro.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="metalGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#C0C0C0"/>
      <stop offset="50%" style="stop-color:#808080"/>
      <stop offset="100%" style="stop-color:#606060"/>
    </linearGradient>
    <radialGradient id="shineGrad" cx="30%" cy="30%">
      <stop offset="0%" style="stop-color:#fff;stop-opacity:0.6"/>
      <stop offset="100%" style="stop-color:#fff;stop-opacity:0"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
  </defs>
  <ellipse cx="32" cy="52" rx="18" ry="4" fill="#000" opacity="0.2"/>
  <rect x="28" y="32" width="8" height="18" fill="url(#metalGrad)" filter="url(#shadow)"/>
  <circle cx="32" cy="24" r="10" fill="url(#metalGrad)" filter="url(#shadow)"/>
  <circle cx="32" cy="24" r="10" fill="url(#shineGrad)"/>
  <rect x="30" y="20" width="4" height="3" fill="#000"/>
  <circle cx="30" cy="25" r="1.5" fill="#4169E1"/>
  <circle cx="34" cy="25" r="1.5" fill="#4169E1"/>
  <rect x="24" y="34" width="6" height="12" rx="2" fill="url(#metalGrad)" filter="url(#shadow)"/>
  <rect x="34" y="34" width="6" height="12" rx="2" fill="url(#metalGrad)" filter="url(#shadow)"/>
  <ellipse cx="20" cy="36" rx="4" ry="8" fill="#FFD700" filter="url(#shadow)"/>
  <path d="M 20 36 Q 16 36 14 40" stroke="#DAA520" stroke-width="2" fill="none"/>
  <rect x="30" y="14" width="4" height="8" fill="#DC143C" filter="url(#shadow)"/>
  <path d="M 32 14 L 28 10 L 32 8 L 36 10 Z" fill="#DC143C" filter="url(#shadow)"/>
  <circle cx="32" cy="38" r="4" fill="#FFD700" opacity="0.8"/>
</svg>',

    'gigante.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="skinGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD7A8"/>
      <stop offset="100%" style="stop-color:#E6B88A"/>
    </linearGradient>
    <linearGradient id="armorGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#8B4513"/>
      <stop offset="50%" style="stop-color:#654321"/>
      <stop offset="100%" style="stop-color:#4A2810"/>
    </linearGradient>
    <filter id="shadow3d"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
  </defs>
  <ellipse cx="32" cy="56" rx="20" ry="5" fill="#000" opacity="0.3"/>
  <rect x="22" y="36" width="20" height="20" rx="3" fill="url(#armorGrad)" filter="url(#shadow3d)"/>
  <circle cx="32" cy="22" r="12" fill="url(#skinGrad)" filter="url(#shadow3d)"/>
  <circle cx="28" cy="20" r="2" fill="#000"/>
  <circle cx="36" cy="20" r="2" fill="#000"/>
  <path d="M 28 26 Q 32 28 36 26" stroke="#000" stroke-width="2" fill="none"/>
  <ellipse cx="32" cy="16" rx="10" ry="4" fill="#8B4513"/>
  <rect x="18" y="40" width="8" height="16" rx="2" fill="url(#armorGrad)" filter="url(#shadow3d)"/>
  <rect x="38" y="40" width="8" height="16" rx="2" fill="url(#armorGrad)" filter="url(#shadow3d)"/>
  <circle cx="32" cy="42" r="5" fill="#FFD700" filter="url(#shadow3d)"/>
  <circle cx="32" cy="42" r="3" fill="#FFA500"/>
  <rect x="26" y="48" width="3" height="3" fill="#FFD700"/>
  <rect x="35" y="48" width="3" height="3" fill="#FFD700"/>
</svg>',

    'pekka.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="pekkaArmor" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#4B4B4B"/>
      <stop offset="50%" style="stop-color:#2F2F2F"/>
      <stop offset="100%" style="stop-color:#1A1A1A"/>
    </linearGradient>
    <radialGradient id="pekkaglow" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FF1493;stop-opacity:0.8"/>
      <stop offset="100%" style="stop-color:#FF1493;stop-opacity:0"/>
    </radialGradient>
    <filter id="shadowPekka"><feDropShadow dx="3" dy="5" stdDeviation="4" flood-opacity="0.6"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="22" ry="4" fill="#000" opacity="0.4"/>
  <rect x="20" y="28" width="24" height="28" rx="4" fill="url(#pekkaArmor)" filter="url(#shadowPekka)"/>
  <rect x="22" y="30" width="20" height="24" fill="#3A3A3A"/>
  <ellipse cx="32" cy="20" rx="10" ry="12" fill="url(#pekkaArmor)" filter="url(#shadowPekka)"/>
  <circle cx="28" cy="18" r="3" fill="#FF1493" filter="url(#shadowPekka)"/>
  <circle cx="36" cy="18" r="3" fill="#FF1493" filter="url(#shadowPekka)"/>
  <circle cx="28" cy="18" r="2" fill="#FFF"/>
  <circle cx="36" cy="18" r="2" fill="#FFF"/>
  <rect x="28" y="22" width="8" height="4" fill="#3A3A3A"/>
  <rect x="12" y="32" width="10" height="20" rx="3" fill="url(#pekkaArmor)" filter="url(#shadowPekka)"/>
  <rect x="42" y="32" width="10" height="20" rx="3" fill="url(#pekkaArmor)" filter="url(#shadowPekka)"/>
  <ellipse cx="32" cy="42" r="8" fill="url(#pekkaglow)"/>
  <path d="M 50 35 L 56 30 L 52 38 L 56 34" fill="#C0C0C0" filter="url(#shadowPekka)"/>
  <line x1="50" y1="35" x2="56" y2="30" stroke="#87CEEB" stroke-width="2"/>
</svg>'
];

$criados = 0;
$erros = 0;

echo "Criando versões premium dos ícones principais...\n\n";

foreach ($iconesMelhorados as $arquivo => $svg) {
    $caminho = "assets/img/$arquivo";

    // Fazer backup do original
    if (file_exists($caminho)) {
        $backup = str_replace('.svg', '_backup.svg', $caminho);
        if (!file_exists($backup)) {
            copy($caminho, $backup);
            echo "  📁 Backup criado: $backup\n";
        }
    }

    // Criar versão melhorada
    if (file_put_contents($caminho, $svg)) {
        $tamanho = filesize($caminho);
        echo "  ✓ $arquivo ($tamanho bytes) - MELHORADO\n";
        $criados++;
    } else {
        echo "  ✗ Erro ao criar: $arquivo\n";
        $erros++;
    }
}

echo "\n" . str_repeat('=', 70) . "\n";
echo "RESUMO:\n";
echo str_repeat('=', 70) . "\n";
echo "Ícones melhorados: $criados\n";
echo "Erros: $erros\n";

if ($criados > 0) {
    echo "\n✓ ÍCONES PRINCIPAIS MELHORADOS COM SUCESSO!\n\n";
    echo "Melhorias aplicadas:\n";
    echo "  ✓ Gradientes lineares e radiais profissionais\n";
    echo "  ✓ Sombras 3D realistas\n";
    echo "  ✓ Detalhes adicionais (armaduras, armas, acessórios)\n";
    echo "  ✓ Profundidade e volume\n";
    echo "  ✓ Cores mais ricas e variadas\n";
    echo "  ✓ Efeitos de luz e brilho\n\n";
    echo "Os arquivos originais foram salvos como *_backup.svg\n";
}

echo "\n" . str_repeat('=', 70) . "\n";
