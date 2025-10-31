<?php
/**
 * Criar Ícones SVG para 6 Novas Bandeiras
 */

echo "=== Criando Ícones SVG - 6 Bandeiras ===\n\n";

$icones = [
    'laranja-xadrez.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="8" y="8" width="48" height="48" fill="#FF8C00"/>
  <rect x="8" y="8" width="12" height="12" fill="#FFF"/>
  <rect x="32" y="8" width="12" height="12" fill="#FFF"/>
  <rect x="20" y="20" width="12" height="12" fill="#FFF"/>
  <rect x="44" y="20" width="12" height="12" fill="#FFF"/>
  <rect x="8" y="32" width="12" height="12" fill="#FFF"/>
  <rect x="32" y="32" width="12" height="12" fill="#FFF"/>
  <rect x="20" y="44" width="12" height="12" fill="#FFF"/>
  <rect x="44" y="44" width="12" height="12" fill="#FFF"/>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#D2691E" stroke-width="2"/>
</svg>',

    'verde-xadrez.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="8" y="8" width="48" height="48" fill="#228B22"/>
  <rect x="8" y="8" width="12" height="12" fill="#FFF"/>
  <rect x="32" y="8" width="12" height="12" fill="#FFF"/>
  <rect x="20" y="20" width="12" height="12" fill="#FFF"/>
  <rect x="44" y="20" width="12" height="12" fill="#FFF"/>
  <rect x="8" y="32" width="12" height="12" fill="#FFF"/>
  <rect x="32" y="32" width="12" height="12" fill="#FFF"/>
  <rect x="20" y="44" width="12" height="12" fill="#FFF"/>
  <rect x="44" y="44" width="12" height="12" fill="#FFF"/>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#006400" stroke-width="2"/>
</svg>',

    'roxo-xadrez.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="8" y="8" width="48" height="48" fill="#8B00FF"/>
  <rect x="8" y="8" width="12" height="12" fill="#FFF"/>
  <rect x="32" y="8" width="12" height="12" fill="#FFF"/>
  <rect x="20" y="20" width="12" height="12" fill="#FFF"/>
  <rect x="44" y="20" width="12" height="12" fill="#FFF"/>
  <rect x="8" y="32" width="12" height="12" fill="#FFF"/>
  <rect x="32" y="32" width="12" height="12" fill="#FFF"/>
  <rect x="20" y="44" width="12" height="12" fill="#FFF"/>
  <rect x="44" y="44" width="12" height="12" fill="#FFF"/>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#6A0DAD" stroke-width="2"/>
  <circle cx="32" cy="32" r="6" fill="#FFD700" opacity="0.8"/>
</svg>',

    'flechas.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="8" y="8" width="48" height="48" fill="#4169E1"/>
  <path d="M 20 44 L 44 20" stroke="#FFD700" stroke-width="4" stroke-linecap="round"/>
  <path d="M 20 20 L 44 44" stroke="#FFD700" stroke-width="4" stroke-linecap="round"/>
  <polygon points="44,16 48,20 44,24" fill="#FFD700"/>
  <polygon points="44,40 48,44 44,48" fill="#FFD700"/>
  <polygon points="16,20 20,16 24,20" fill="#FFD700"/>
  <polygon points="40,44 44,40 48,44" fill="#FFD700"/>
  <circle cx="32" cy="32" r="6" fill="#FFF"/>
  <circle cx="32" cy="32" r="3" fill="#FF4500"/>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#1E90FF" stroke-width="2"/>
</svg>',

    'rock-psicodelico.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <radialGradient id="psych1" cx="50%" cy="50%" r="50%">
      <stop offset="0%" style="stop-color:#FF00FF;stop-opacity:1" />
      <stop offset="50%" style="stop-color:#00FFFF;stop-opacity:1" />
      <stop offset="100%" style="stop-color:#FFFF00;stop-opacity:1" />
    </radialGradient>
    <radialGradient id="psych2" cx="30%" cy="30%" r="70%">
      <stop offset="0%" style="stop-color:#FF6347;stop-opacity:1" />
      <stop offset="50%" style="stop-color:#9370DB;stop-opacity:1" />
      <stop offset="100%" style="stop-color:#00FF7F;stop-opacity:1" />
    </radialGradient>
  </defs>
  <rect x="8" y="8" width="48" height="48" fill="url(#psych1)"/>
  <circle cx="32" cy="32" r="20" fill="url(#psych2)" opacity="0.7"/>
  <path d="M 32 16 Q 40 24 32 32 Q 24 24 32 16" fill="#FF00FF" opacity="0.5"/>
  <path d="M 32 32 Q 40 40 32 48 Q 24 40 32 32" fill="#00FFFF" opacity="0.5"/>
  <path d="M 16 32 Q 24 24 32 32 Q 24 40 16 32" fill="#FFFF00" opacity="0.5"/>
  <path d="M 32 32 Q 40 24 48 32 Q 40 40 32 32" fill="#FF6347" opacity="0.5"/>
  <circle cx="32" cy="32" r="8" fill="#FFF"/>
  <text x="32" y="37" font-size="14" text-anchor="middle" fill="#000" font-weight="bold">★</text>
</svg>',

    'crl-2025.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="crlGrad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
      <stop offset="100%" style="stop-color:#FFA500;stop-opacity:1" />
    </linearGradient>
  </defs>
  <rect x="8" y="8" width="48" height="48" fill="#1E3A8A"/>
  <rect x="10" y="10" width="44" height="44" fill="url(#crlGrad)" opacity="0.2"/>
  <path d="M 32 16 L 38 22 L 46 20 L 42 28 L 48 34 L 40 36 L 38 44 L 32 38 L 26 44 L 24 36 L 16 34 L 22 28 L 18 20 L 26 22 Z" fill="#FFD700"/>
  <circle cx="32" cy="30" r="10" fill="#1E3A8A"/>
  <text x="32" y="27" font-size="8" text-anchor="middle" fill="#FFD700" font-weight="bold">CRL</text>
  <text x="32" y="52" font-size="10" text-anchor="middle" fill="#FFD700" font-weight="bold">2025</text>
  <rect x="6" y="6" width="52" height="52" fill="none" stroke="#FFD700" stroke-width="2"/>
  <circle cx="16" cy="16" r="2" fill="#FFF"/>
  <circle cx="48" cy="16" r="2" fill="#FFF"/>
  <circle cx="16" cy="48" r="2" fill="#FFF"/>
  <circle cx="48" cy="48" r="2" fill="#FFF"/>
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
