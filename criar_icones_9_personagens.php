<?php
/**
 * Criar Ícones SVG para 9 Novos Personagens
 */

echo "=== Criando Ícones SVG - 9 Personagens ===\n\n";

$icones = [
    'pescador.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="28" r="10" fill="#FFE4B5"/>
  <circle cx="29" cy="26" r="2" fill="#000"/>
  <circle cx="35" cy="26" r="2" fill="#000"/>
  <path d="M 29 32 Q 32 34 35 32" stroke="#000" stroke-width="2" fill="none"/>
  <rect x="26" y="36" width="12" height="14" fill="#4682B4"/>
  <path d="M 26 22 Q 28 18 32 18 Q 36 18 38 22" fill="#8B4513"/>
  <path d="M 42 28 L 52 20 M 52 20 L 54 18 M 52 20 L 50 18" stroke="#A0522D" stroke-width="2" fill="none"/>
  <circle cx="54" cy="18" r="2" fill="#C0C0C0"/>
  <path d="M 20 30 L 22 38 L 26 36 M 44 30 L 42 38 L 38 36" fill="#4682B4"/>
  <rect x="26" y="48" width="5" height="6" fill="#4169E1"/>
  <rect x="33" y="48" width="5" height="6" fill="#4169E1"/>
</svg>',

    'bola-de-neve.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="32" r="28" fill="#E0F7FF"/>
  <circle cx="32" cy="32" r="24" fill="#B0E0FF"/>
  <circle cx="32" cy="32" r="18" fill="#87CEEB"/>
  <circle cx="32" cy="32" r="12" fill="#ADD8E6"/>
  <path d="M 15 20 L 20 25 M 49 20 L 44 25 M 20 44 L 15 49 M 44 44 L 49 49" stroke="#FFF" stroke-width="3"/>
  <path d="M 32 10 L 32 15 M 54 32 L 49 32 M 32 54 L 32 49 M 10 32 L 15 32" stroke="#FFF" stroke-width="3"/>
  <circle cx="25" cy="28" r="3" fill="#FFF" opacity="0.7"/>
  <circle cx="38" cy="36" r="4" fill="#FFF" opacity="0.7"/>
  <circle cx="28" cy="40" r="2" fill="#FFF" opacity="0.7"/>
  <circle cx="40" cy="26" r="2.5" fill="#FFF" opacity="0.7"/>
</svg>',

    'goblin-gigante.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="32" cy="42" rx="16" ry="18" fill="#90EE90"/>
  <circle cx="32" cy="24" r="12" fill="#90EE90"/>
  <circle cx="29" cy="22" r="3" fill="#000"/>
  <circle cx="35" cy="22" r="3" fill="#000"/>
  <path d="M 28 29 Q 32 32 36 29" stroke="#000" stroke-width="2" fill="none"/>
  <ellipse cx="32" cy="35" rx="14" ry="16" fill="#4169E1" opacity="0.5"/>
  <path d="M 22 35 Q 32 32 42 35" stroke="#1E90FF" stroke-width="2" fill="none"/>
  <path d="M 26 18 L 28 12 L 30 18 M 34 18 L 36 12 L 38 18" fill="#228B22"/>
  <rect x="20" y="56" width="8" height="5" fill="#90EE90"/>
  <rect x="36" y="56" width="8" height="5" fill="#90EE90"/>
  <circle cx="15" cy="45" r="2" fill="#FFD700"/>
  <circle cx="49" cy="45" r="2" fill="#FFD700"/>
</svg>',

    'esqueleto-gigante.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <circle cx="32" cy="20" r="10" fill="#F5F5F5"/>
  <ellipse cx="32" cy="40" rx="12" ry="16" fill="#E0E0E0"/>
  <circle cx="29" cy="18" r="3" fill="#000"/>
  <circle cx="35" cy="18" r="3" fill="#000"/>
  <path d="M 27 24 L 37 24" stroke="#000" stroke-width="2"/>
  <rect x="26" y="52" width="5" height="8" fill="#D3D3D3"/>
  <rect x="33" y="52" width="5" height="8" fill="#D3D3D3"/>
  <circle cx="20" cy="42" r="6" fill="#000"/>
  <circle cx="20" cy="42" r="4" fill="#FF4500"/>
  <path d="M 18 38 L 16 34 M 22 38 L 24 34" stroke="#FFA500" stroke-width="2"/>
  <path d="M 24 30 L 28 36 M 40 30 L 36 36" stroke="#D3D3D3" stroke-width="3"/>
  <circle cx="20" cy="42" r="2" fill="#FFD700" opacity="0.5"/>
</svg>',

    'megasservo.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="32" cy="38" rx="14" ry="16" fill="#4B0082"/>
  <circle cx="32" cy="22" r="10" fill="#4B0082"/>
  <circle cx="29" cy="20" r="3" fill="#FFFF00"/>
  <circle cx="35" cy="20" r="3" fill="#FFFF00"/>
  <path d="M 29 26 Q 32 28 35 26" stroke="#000" stroke-width="2" fill="none"/>
  <path d="M 18 24 L 14 18 L 16 28 M 46 24 L 50 18 L 48 28" fill="#9370DB"/>
  <ellipse cx="32" cy="15" rx="8" ry="4" fill="#8B008B"/>
  <rect x="26" y="50" width="5" height="6" fill="#4B0082"/>
  <rect x="33" y="50" width="5" height="6" fill="#4B0082"/>
  <path d="M 20 40 L 18 46 M 44 40 L 46 46" stroke="#9370DB" stroke-width="3"/>
  <circle cx="32" cy="38" r="4" fill="#9370DB" opacity="0.5"/>
</svg>',

    'bebe-dragao.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="32" cy="36" rx="16" ry="14" fill="#9370DB"/>
  <circle cx="32" cy="22" r="10" fill="#9370DB"/>
  <circle cx="29" cy="20" r="2" fill="#000"/>
  <circle cx="35" cy="20" r="2" fill="#000"/>
  <path d="M 29 26 Q 32 28 35 26" stroke="#000" stroke-width="2" fill="none"/>
  <path d="M 12 32 Q 16 28 20 32 Q 16 36 12 32" fill="#BA55D3"/>
  <path d="M 52 32 Q 48 28 44 32 Q 48 36 52 32" fill="#BA55D3"/>
  <path d="M 26 18 L 28 12 L 30 16 M 34 18 L 36 12 L 38 16" fill="#8B008B"/>
  <path d="M 32 46 L 28 52 L 32 50 L 36 52 Z" fill="#8B008B"/>
  <circle cx="38" cy="28" r="2" fill="#FF4500"/>
  <path d="M 40 28 L 48 26 Q 50 28 48 30 L 40 28" fill="#FFA500"/>
</svg>',

    'dragoes-esqueletos.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="24" cy="30" rx="10" ry="8" fill="#F5F5F5"/>
  <ellipse cx="40" cy="30" rx="10" ry="8" fill="#F5F5F5"/>
  <circle cx="24" cy="22" r="6" fill="#E0E0E0"/>
  <circle cx="40" cy="22" r="6" fill="#E0E0E0"/>
  <circle cx="22" cy="21" r="2" fill="#000"/>
  <circle cx="38" cy="21" r="2" fill="#000"/>
  <path d="M 12 28 Q 16 24 18 28 Q 16 32 12 28" fill="#D3D3D3"/>
  <path d="M 52 28 Q 48 24 46 28 Q 48 32 52 28" fill="#D3D3D3"/>
  <path d="M 24 36 L 22 42 L 24 40 L 26 42 Z" fill="#C0C0C0"/>
  <path d="M 40 36 L 38 42 L 40 40 L 42 42 Z" fill="#C0C0C0"/>
  <circle cx="24" cy="42" r="4" fill="#000"/>
  <circle cx="40" cy="42" r="4" fill="#000"/>
  <circle cx="24" cy="42" r="2" fill="#FF4500"/>
  <circle cx="40" cy="42" r="2" fill="#FF4500"/>
</svg>',

    'maquina-voadora.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <rect x="22" y="28" width="20" height="20" rx="2" fill="#696969"/>
  <rect x="24" y="30" width="16" height="16" fill="#808080"/>
  <ellipse cx="32" cy="20" rx="12" ry="6" fill="#4682B4"/>
  <ellipse cx="32" cy="20" rx="8" ry="4" fill="#87CEEB"/>
  <rect x="30" y="20" width="4" height="10" fill="#A9A9A9"/>
  <circle cx="32" cy="38" r="4" fill="#4169E1"/>
  <circle cx="32" cy="38" r="2" fill="#1E90FF"/>
  <path d="M 18 36 L 14 38 L 18 40 M 46 36 L 50 38 L 46 40" fill="#FFD700"/>
  <rect x="28" y="46" width="3" height="8" fill="#696969"/>
  <rect x="33" y="46" width="3" height="8" fill="#696969"/>
  <circle cx="29" cy="54" r="2" fill="#4A4A4A"/>
  <circle cx="34" cy="54" r="2" fill="#4A4A4A"/>
</svg>',

    'gelo.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <path d="M 32 8 L 32 56 M 8 32 L 56 32 M 16 16 L 48 48 M 48 16 L 16 48" stroke="#00BFFF" stroke-width="4"/>
  <circle cx="32" cy="32" r="12" fill="#E0F7FF" opacity="0.5"/>
  <circle cx="32" cy="8" r="4" fill="#87CEEB"/>
  <circle cx="32" cy="56" r="4" fill="#87CEEB"/>
  <circle cx="8" cy="32" r="4" fill="#87CEEB"/>
  <circle cx="56" cy="32" r="4" fill="#87CEEB"/>
  <circle cx="16" cy="16" r="4" fill="#B0E0FF"/>
  <circle cx="48" cy="48" r="4" fill="#B0E0FF"/>
  <circle cx="48" cy="16" r="4" fill="#B0E0FF"/>
  <circle cx="16" cy="48" r="4" fill="#B0E0FF"/>
  <path d="M 20 24 L 24 20 M 44 24 L 40 20 M 20 40 L 24 44 M 44 40 L 40 44" stroke="#FFF" stroke-width="2"/>
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
