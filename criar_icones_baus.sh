#!/bin/bash
# Script para criar todos os ícones de baús

cd assets/img

# Baú Gigante
cat > bau-gigante.svg << 'EOF'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="12" y="18" width="40" height="32" fill="#8b4513" stroke="#654321" stroke-width="2" rx="3"/>
  <rect x="16" y="22" width="32" height="24" fill="#a0522d" opacity="0.7"/>
  <path d="M 26 14 L 38 14 L 38 22 L 26 22 Z" fill="#654321"/>
  <circle cx="32" cy="34" r="5" fill="#8b7355"/>
</svg>
EOF

# Baú Mágico
cat > bau-magico.svg << 'EOF'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="20" width="32" height="28" fill="#9370db" stroke="#6a5acd" stroke-width="2" rx="2"/>
  <rect x="20" y="24" width="24" height="20" fill="#ba55d3" opacity="0.7"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#6a5acd"/>
  <circle cx="32" cy="34" r="4" fill="#ffff00"/>
  <path d="M 32 28 L 34 32 L 32 36 L 30 32 Z" fill="#ffff00" opacity="0.6"/>
</svg>
EOF

# Baú do Relâmpago
cat > bau-relampago.svg << 'EOF'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="20" width="32" height="28" fill="#4169e1" stroke="#191970" stroke-width="2" rx="2"/>
  <rect x="20" y="24" width="24" height="20" fill="#4682b4" opacity="0.7"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#191970"/>
  <path d="M 32 26 L 36 32 L 32 32 L 32 40 L 28 34 L 32 34 Z" fill="#ffff00" stroke="#ffa500" stroke-width="1"/>
</svg>
EOF

# Baú do Rei
cat > bau-rei.svg << 'EOF'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="20" width="32" height="28" fill="#dc143c" stroke="#8b0000" stroke-width="2" rx="2"/>
  <rect x="20" y="24" width="24" height="20" fill="#ff6347" opacity="0.7"/>
  <path d="M 26 16 L 32 12 L 38 16 L 36 22 L 28 22 Z" fill="#ffd700" stroke="#daa520" stroke-width="1"/>
  <circle cx="32" cy="34" r="4" fill="#ffd700"/>
</svg>
EOF

# Baú do Destino
cat > bau-destino.svg << 'EOF'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="20" width="32" height="28" fill="#ff1493" stroke="#c71585" stroke-width="2" rx="2"/>
  <rect x="20" y="24" width="24" height="20" fill="#ff69b4" opacity="0.7"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#c71585"/>
  <path d="M 32 28 L 34 32 L 38 32 L 35 35 L 36 39 L 32 36 L 28 39 L 29 35 L 26 32 L 30 32 Z" fill="#ffff00" stroke="#ffa500" stroke-width="0.5"/>
</svg>
EOF

# Baú Mega Relâmpago
cat > bau-mega-relampago.svg << 'EOF'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="14" y="18" width="36" height="32" fill="#1e90ff" stroke="#00008b" stroke-width="2.5" rx="3"/>
  <rect x="18" y="22" width="28" height="24" fill="#4169e1" opacity="0.7"/>
  <path d="M 27 14 L 37 14 L 37 22 L 27 22 Z" fill="#00008b"/>
  <path d="M 28 24 L 32 30 L 30 30 L 30 38 L 26 32 L 28 32 Z" fill="#ffff00" stroke="#ff8c00" stroke-width="1"/>
  <path d="M 36 24 L 40 30 L 38 30 L 38 38 L 34 32 L 36 32 Z" fill="#ffff00" stroke="#ff8c00" stroke-width="1"/>
</svg>
EOF

# Baú da Coroa
cat > bau-coroa.svg << 'EOF'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="20" width="32" height="28" fill="#9932cc" stroke="#8b008b" stroke-width="2" rx="2"/>
  <rect x="20" y="24" width="24" height="20" fill="#ba55d3" opacity="0.7"/>
  <path d="M 24 14 L 28 18 L 32 12 L 36 18 L 40 14 L 38 22 L 26 22 Z" fill="#ffd700" stroke="#daa520" stroke-width="1"/>
  <circle cx="32" cy="34" r="4" fill="#ff1493"/>
</svg>
EOF

# Baú do Clã
cat > bau-clan.svg << 'EOF'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <rect x="16" y="20" width="32" height="28" fill="#228b22" stroke="#006400" stroke-width="2" rx="2"/>
  <rect x="20" y="24" width="24" height="20" fill="#32cd32" opacity="0.7"/>
  <path d="M 28 16 L 36 16 L 36 24 L 28 24 Z" fill="#006400"/>
  <path d="M 26 32 L 32 28 L 38 32 L 32 36 Z" fill="#ffd700" stroke="#ff8c00" stroke-width="1"/>
</svg>
EOF

echo "Todos os ícones de baús criados!"
