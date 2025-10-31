<?php
/**
 * Melhora os 10 emotes restantes com gradientes, sombras e efeitos 3D
 */

$emotes = [
    'danca-bebe-dragao.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="dragonGreen" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#90EE90"/>
      <stop offset="50%" style="stop-color:#3CB371"/>
      <stop offset="100%" style="stop-color:#228B22"/>
    </linearGradient>
    <radialGradient id="fireGlow" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFD700;stop-opacity:0.8"/>
      <stop offset="50%" style="stop-color:#FF8C00;stop-opacity:0.5"/>
      <stop offset="100%" style="stop-color:#FF4500;stop-opacity:0.2"/>
    </radialGradient>
    <filter id="dragonShadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="glow"><feGaussianBlur stdDeviation="1.5"/></filter>
  </defs>
  <ellipse cx="32" cy="56" rx="20" ry="4" fill="#000" opacity="0.3"/>
  <ellipse cx="32" cy="36" rx="16" ry="18" fill="url(#dragonGreen)" filter="url(#dragonShadow)"/>
  <circle cx="26" cy="30" r="4" fill="#FFF"/>
  <circle cx="38" cy="30" r="4" fill="#FFF"/>
  <circle cx="26" cy="31" r="2" fill="#000"/>
  <circle cx="38" cy="31" r="2" fill="#000"/>
  <path d="M 26 38 Q 32 42 38 38" stroke="#228B22" stroke-width="2" fill="none"/>
  <path d="M 18 28 L 14 24 L 16 28 L 14 32 L 18 30 Z" fill="url(#dragonGreen)" filter="url(#dragonShadow)"/>
  <path d="M 46 28 L 50 24 L 48 28 L 50 32 L 46 30 Z" fill="url(#dragonGreen)" filter="url(#dragonShadow)"/>
  <ellipse cx="32" cy="20" rx="10" ry="8" fill="url(#dragonGreen)" filter="url(#dragonShadow)"/>
  <path d="M 28 16 L 26 12 L 28 14 M 36 14 L 38 12 L 36 16" fill="#228B22"/>
  <path d="M 38 40 L 42 44 L 46 50" stroke="url(#fireGlow)" stroke-width="3" stroke-linecap="round" filter="url(#glow)"/>
  <circle cx="46" cy="50" r="3" fill="#FFD700" opacity="0.8" filter="url(#glow)"/>
  <circle cx="44" cy="48" r="2" fill="#FF8C00" opacity="0.6"/>
  <ellipse cx="22" cy="34" rx="2" ry="3" fill="#FF6B6B" opacity="0.5"/>
  <ellipse cx="42" cy="34" rx="2" ry="3" fill="#FF6B6B" opacity="0.5"/>
  <path d="M 28 48 L 24 52 L 22 48 M 36 48 L 40 52 L 42 48" fill="#228B22"/>
</svg>',

    'danca-suina.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="pigGrad" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFB6C1"/>
      <stop offset="50%" style="stop-color:#FF69B4"/>
      <stop offset="100%" style="stop-color:#FF1493"/>
    </linearGradient>
    <radialGradient id="snoutGrad" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FF69B4"/>
      <stop offset="100%" style="stop-color:#C71585"/>
    </radialGradient>
    <filter id="pigShadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.4"/></filter>
    <filter id="sparkle"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <ellipse cx="32" cy="56" rx="22" ry="4" fill="#000" opacity="0.3"/>
  <ellipse cx="32" cy="36" rx="18" ry="20" fill="url(#pigGrad)" filter="url(#pigShadow)"/>
  <ellipse cx="20" cy="26" rx="6" ry="7" fill="url(#pigGrad)" filter="url(#pigShadow)"/>
  <ellipse cx="44" cy="26" rx="6" ry="7" fill="url(#pigGrad)" filter="url(#pigShadow)"/>
  <circle cx="24" cy="32" r="4" fill="#FFF"/>
  <circle cx="40" cy="32" r="4" fill="#FFF"/>
  <circle cx="24" cy="33" r="2" fill="#000"/>
  <circle cx="40" cy="33" r="2" fill="#000"/>
  <ellipse cx="32" cy="42" rx="8" ry="6" fill="url(#snoutGrad)"/>
  <circle cx="29" cy="42" r="2" fill="#8B0000"/>
  <circle cx="35" cy="42" r="2" fill="#8B0000"/>
  <path d="M 26 48 Q 32 52 38 48" stroke="#FF1493" stroke-width="2" fill="none"/>
  <path d="M 16 20 L 14 16 L 18 18 M 48 18 L 50 16 L 46 20" fill="#FF69B4" filter="url(#pigShadow)"/>
  <ellipse cx="22" cy="36" rx="2" ry="3" fill="#FF6B6B" opacity="0.5"/>
  <ellipse cx="42" cy="36" rx="2" ry="3" fill="#FF6B6B" opacity="0.5"/>
  <path d="M 48 38 Q 52 40 50 44" stroke="#FFD700" stroke-width="2" stroke-linecap="round" filter="url(#sparkle)"/>
  <circle cx="50" cy="44" r="2" fill="#FFD700" opacity="0.8" filter="url(#sparkle)"/>
  <path d="M 16 38 Q 12 40 14 44" stroke="#FFD700" stroke-width="2" stroke-linecap="round" filter="url(#sparkle)"/>
  <circle cx="14" cy="44" r="2" fill="#FFD700" opacity="0.8" filter="url(#sparkle)"/>
</svg>',

    'rei-comemorando.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="crownGold" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="50%" style="stop-color:#FFA500"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <linearGradient id="skinTone" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFDAB9"/>
      <stop offset="100%" style="stop-color:#DEB887"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
    <filter id="shine"><feGaussianBlur stdDeviation="1.5"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="20" ry="3" fill="#000" opacity="0.3"/>
  <rect x="20" y="40" width="24" height="16" rx="2" fill="#8B0000" filter="url(#shadow)"/>
  <ellipse cx="32" cy="32" rx="14" ry="16" fill="url(#skinTone)" filter="url(#shadow)"/>
  <path d="M 18 22 L 16 18 L 20 16 L 24 14 L 28 14 L 32 12 L 36 14 L 40 14 L 44 16 L 48 18 L 46 22 L 42 24 L 38 24 L 34 26 L 30 24 L 26 24 L 22 24 Z" fill="url(#crownGold)" filter="url(#shadow)"/>
  <circle cx="20" cy="18" r="3" fill="#FF0000"/>
  <circle cx="32" cy="14" r="3" fill="#FF0000"/>
  <circle cx="44" cy="18" r="3" fill="#FF0000"/>
  <circle cx="26" cy="30" r="3" fill="#FFF"/>
  <circle cx="38" cy="30" r="3" fill="#FFF"/>
  <circle cx="26" cy="31" r="2" fill="#000"/>
  <circle cx="38" cy="31" r="2" fill="#000"/>
  <path d="M 26 38 Q 32 42 38 38" stroke="#8B4513" stroke-width="2" fill="none"/>
  <ellipse cx="22" cy="34" rx="2" ry="3" fill="#FF6B6B" opacity="0.5"/>
  <ellipse cx="42" cy="34" rx="2" ry="3" fill="#FF6B6B" opacity="0.5"/>
  <path d="M 12 32 L 10 38 L 8 44" stroke="#FFD700" stroke-width="3" stroke-linecap="round" filter="url(#shine)"/>
  <path d="M 52 32 L 54 38 L 56 44" stroke="#FFD700" stroke-width="3" stroke-linecap="round" filter="url(#shine)"/>
  <circle cx="8" cy="44" r="3" fill="#FFD700" opacity="0.8" filter="url(#shine)"/>
  <circle cx="56" cy="44" r="3" fill="#FFD700" opacity="0.8" filter="url(#shine)"/>
  <circle cx="10" cy="40" r="2" fill="#FFFF00" opacity="0.6"/>
  <circle cx="54" cy="40" r="2" fill="#FFFF00" opacity="0.6"/>
</svg>',

    'princesa-acenando.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="princessHair" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FFA500"/>
    </linearGradient>
    <linearGradient id="princessSkin" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFE4E1"/>
      <stop offset="100%" style="stop-color:#FFB6C1"/>
    </linearGradient>
    <radialGradient id="tiara" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FF69B4"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="1" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
    <filter id="sparkle"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="18" ry="3" fill="#000" opacity="0.3"/>
  <rect x="22" y="38" width="20" height="18" rx="2" fill="#FF69B4" filter="url(#shadow)"/>
  <ellipse cx="32" cy="30" rx="12" ry="14" fill="url(#princessSkin)" filter="url(#shadow)"/>
  <path d="M 20 24 Q 20 16 32 14 Q 44 16 44 24" fill="url(#princessHair)" filter="url(#shadow)"/>
  <path d="M 24 16 L 26 12 L 28 14 L 32 10 L 36 14 L 38 12 L 40 16" fill="url(#tiara)" filter="url(#shadow)"/>
  <circle cx="32" cy="12" r="3" fill="#FF1493"/>
  <circle cx="27" cy="28" r="3" fill="#FFF"/>
  <circle cx="37" cy="28" r="3" fill="#FFF"/>
  <circle cx="27" cy="29" r="2" fill="#000"/>
  <circle cx="37" cy="29" r="2" fill="#000"/>
  <path d="M 28 34 Q 32 36 36 34" stroke="#FF69B4" stroke-width="2" fill="none"/>
  <ellipse cx="24" cy="32" rx="2" ry="3" fill="#FF6B6B" opacity="0.5"/>
  <ellipse cx="40" cy="32" rx="2" ry="3" fill="#FF6B6B" opacity="0.5"/>
  <path d="M 10 26 L 8 22 L 10 24 L 12 22 L 14 26" fill="url(#princessSkin)" filter="url(#shadow)"/>
  <circle cx="6" cy="20" r="2" fill="#FFD700" filter="url(#sparkle)"/>
  <circle cx="8" cy="24" r="2" fill="#FFFF00" opacity="0.7" filter="url(#sparkle)"/>
  <circle cx="10" cy="20" r="2" fill="#FFD700" opacity="0.6" filter="url(#sparkle)"/>
  <path d="M 20 22 Q 18 18 16 20" stroke="url(#princessHair)" stroke-width="3" stroke-linecap="round"/>
  <path d="M 44 22 Q 46 18 48 20" stroke="url(#princessHair)" stroke-width="3" stroke-linecap="round"/>
</svg>',

    'gigante-batendo.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="giantSkin" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#D2B48C"/>
      <stop offset="50%" style="stop-color:#A0826D"/>
      <stop offset="100%" style="stop-color:#8B4513"/>
    </linearGradient>
    <linearGradient id="giantHair" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#8B4513"/>
      <stop offset="100%" style="stop-color:#654321"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="impact"><feGaussianBlur stdDeviation="2"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="24" ry="4" fill="#000" opacity="0.4"/>
  <rect x="18" y="42" width="28" height="16" rx="2" fill="#8B4513" filter="url(#shadow)"/>
  <ellipse cx="32" cy="32" rx="16" ry="18" fill="url(#giantSkin)" filter="url(#shadow)"/>
  <path d="M 18 20 Q 18 14 32 12 Q 46 14 46 20" fill="url(#giantHair)" filter="url(#shadow)"/>
  <ellipse cx="32" cy="20" rx="14" ry="10" fill="url(#giantHair)"/>
  <circle cx="26" cy="30" r="3" fill="#FFF"/>
  <circle cx="38" cy="30" r="3" fill="#FFF"/>
  <circle cx="26" cy="31" r="2" fill="#000"/>
  <circle cx="38" cy="31" r="2" fill="#000"/>
  <path d="M 26 40 L 38 40" stroke="#8B4513" stroke-width="2"/>
  <ellipse cx="22" cy="34" rx="2" ry="3" fill="#D2691E" opacity="0.5"/>
  <ellipse cx="42" cy="34" rx="2" ry="3" fill="#D2691E" opacity="0.5"/>
  <rect x="48" y="28" width="8" height="16" rx="2" fill="url(#giantSkin)" filter="url(#shadow)"/>
  <circle cx="58" cy="40" r="5" fill="#8B4513" filter="url(#shadow)"/>
  <path d="M 56 36 L 52 32 L 48 30" stroke="#FFD700" stroke-width="3" stroke-linecap="round" filter="url(#impact)"/>
  <circle cx="50" cy="30" r="3" fill="#FFD700" opacity="0.8" filter="url(#impact)"/>
  <circle cx="48" cy="32" r="2" fill="#FFFF00" opacity="0.6" filter="url(#impact)"/>
  <path d="M 54 34 L 52 30 L 50 28" stroke="#FF8C00" stroke-width="2" stroke-linecap="round" opacity="0.7"/>
</svg>',

    'mago-surpreso.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="wizardHat" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#9370DB"/>
      <stop offset="50%" style="stop-color:#8B008B"/>
      <stop offset="100%" style="stop-color:#4B0082"/>
    </linearGradient>
    <linearGradient id="wizardRobe" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#6A5ACD"/>
      <stop offset="100%" style="stop-color:#483D8B"/>
    </linearGradient>
    <radialGradient id="magic" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFD700;stop-opacity:0.9"/>
      <stop offset="50%" style="stop-color:#FF69B4;stop-opacity:0.6"/>
      <stop offset="100%" style="stop-color:#00FFFF;stop-opacity:0.3"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
    <filter id="glow"><feGaussianBlur stdDeviation="2"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="20" ry="3" fill="#000" opacity="0.3"/>
  <rect x="20" y="36" width="24" height="20" rx="2" fill="url(#wizardRobe)" filter="url(#shadow)"/>
  <ellipse cx="32" cy="30" rx="12" ry="14" fill="#FFE4C4" filter="url(#shadow)"/>
  <path d="M 32 8 L 26 18 L 38 18 Z" fill="url(#wizardHat)" filter="url(#shadow)"/>
  <path d="M 24 18 L 40 18 L 38 22 L 26 22 Z" fill="#FFD700"/>
  <circle cx="32" cy="8" r="3" fill="#FFD700"/>
  <circle cx="26" cy="28" r="4" fill="#FFF"/>
  <circle cx="38" cy="28" r="4" fill="#FFF"/>
  <circle cx="26" cy="28" r="3" fill="#000"/>
  <circle cx="38" cy="28" r="3" fill="#000"/>
  <ellipse cx="32" cy="36" rx="4" ry="5" fill="#000"/>
  <path d="M 22 24 Q 20 20 18 22" stroke="#8B4513" stroke-width="2" stroke-linecap="round"/>
  <path d="M 42 24 Q 44 20 46 22" stroke="#8B4513" stroke-width="2" stroke-linecap="round"/>
  <circle cx="10" cy="30" r="6" fill="url(#magic)" filter="url(#glow)"/>
  <circle cx="10" cy="30" r="4" fill="#FFD700" opacity="0.7"/>
  <circle cx="8" cy="26" r="2" fill="#FF69B4" opacity="0.8" filter="url(#glow)"/>
  <circle cx="12" cy="34" r="2" fill="#00FFFF" opacity="0.8" filter="url(#glow)"/>
  <path d="M 8 22 L 6 18 L 8 20 M 14 22 L 16 18 L 14 20" stroke="#FFD700" stroke-width="2" filter="url(#glow)"/>
</svg>',

    'bruxa-rindo.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="witchHat" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#4B0082"/>
      <stop offset="100%" style="stop-color:#8B008B"/>
    </linearGradient>
    <linearGradient id="witchSkin" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#98D98E"/>
      <stop offset="100%" style="stop-color:#6B8E23"/>
    </linearGradient>
    <radialGradient id="magicGlow" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#9370DB;stop-opacity:0.8"/>
      <stop offset="100%" style="stop-color:#FF00FF;stop-opacity:0.3"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
    <filter id="glow"><feGaussianBlur stdDeviation="1.5"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="18" ry="3" fill="#000" opacity="0.3"/>
  <rect x="22" y="38" width="20" height="18" rx="2" fill="#4B0082" filter="url(#shadow)"/>
  <ellipse cx="32" cy="32" rx="12" ry="14" fill="url(#witchSkin)" filter="url(#shadow)"/>
  <path d="M 32 10 L 28 16 L 36 16 Z" fill="url(#witchHat)" filter="url(#shadow)"/>
  <path d="M 26 16 L 38 16 L 36 20 L 28 20 Z" fill="#4B0082"/>
  <circle cx="32" cy="10" r="2" fill="#FFD700"/>
  <circle cx="26" cy="30" r="3" fill="#FFD700"/>
  <circle cx="38" cy="30" r="3" fill="#FFD700"/>
  <circle cx="26" cy="30" r="2" fill="#8B008B"/>
  <circle cx="38" cy="30" r="2" fill="#8B008B"/>
  <path d="M 26 38 Q 32 42 38 38" stroke="#8B008B" stroke-width="2" fill="none"/>
  <path d="M 22 26 Q 18 24 16 26" stroke="#8B4513" stroke-width="2" stroke-linecap="round"/>
  <path d="M 20 22 Q 16 20 14 22 Q 12 24 14 26" fill="url(#witchSkin)"/>
  <circle cx="52" cy="36" r="5" fill="url(#magicGlow)" filter="url(#glow)"/>
  <circle cx="52" cy="36" r="3" fill="#9370DB" opacity="0.7"/>
  <path d="M 48 32 L 46 28 L 48 30 M 56 32 L 58 28 L 56 30" stroke="#FF00FF" stroke-width="2" filter="url(#glow)"/>
  <circle cx="50" cy="30" r="2" fill="#FFD700" opacity="0.8" filter="url(#glow)"/>
  <circle cx="54" cy="40" r="2" fill="#00FFFF" opacity="0.8" filter="url(#glow)"/>
</svg>',

    'cavaleiro-furioso.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="angerMetal" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FF6B6B"/>
      <stop offset="50%" style="stop-color:#C0C0C0"/>
      <stop offset="100%" style="stop-color:#8B0000"/>
    </linearGradient>
    <radialGradient id="rage" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FF0000;stop-opacity:0.8"/>
      <stop offset="100%" style="stop-color:#8B0000;stop-opacity:0.3"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="4" stdDeviation="3" flood-opacity="0.5"/></filter>
    <filter id="anger"><feGaussianBlur stdDeviation="2"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="20" ry="4" fill="#000" opacity="0.4"/>
  <rect x="20" y="38" width="24" height="18" rx="2" fill="url(#angerMetal)" filter="url(#shadow)"/>
  <ellipse cx="32" cy="30" rx="14" ry="16" fill="#C0C0C0" filter="url(#shadow)"/>
  <path d="M 20 22 L 22 16 L 42 16 L 44 22 Z" fill="url(#angerMetal)" filter="url(#shadow)"/>
  <rect x="26" y="26" width="4" height="8" fill="#8B0000"/>
  <rect x="34" y="26" width="4" height="8" fill="#8B0000"/>
  <path d="M 24 34 L 40 34" stroke="#8B0000" stroke-width="3"/>
  <circle cx="18" cy="28" r="5" fill="url(#rage)" filter="url(#anger)"/>
  <circle cx="46" cy="28" r="5" fill="url(#rage)" filter="url(#anger)"/>
  <path d="M 16 24 L 14 20 L 16 22 L 18 20 L 20 24" stroke="#FF0000" stroke-width="2" filter="url(#anger)"/>
  <path d="M 44 24 L 46 20 L 44 22 L 42 20 L 40 24" stroke="#FF0000" stroke-width="2" filter="url(#anger)"/>
  <circle cx="14" cy="20" r="2" fill="#FFD700" opacity="0.7" filter="url(#anger)"/>
  <circle cx="50" cy="20" r="2" fill="#FFD700" opacity="0.7" filter="url(#anger)"/>
  <rect x="28" y="36" width="8" height="4" fill="#8B0000"/>
</svg>',

    'pekka-gritando.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="pekkaArmor" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#4169E1"/>
      <stop offset="50%" style="stop-color:#000080"/>
      <stop offset="100%" style="stop-color:#191970"/>
    </linearGradient>
    <linearGradient id="pekkaHorns" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FF8C00"/>
    </linearGradient>
    <radialGradient id="shout" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFFF00;stop-opacity:0.8"/>
      <stop offset="100%" style="stop-color:#FFA500;stop-opacity:0.2"/>
    </radialGradient>
    <filter id="shadow"><feDropShadow dx="2" dy="5" stdDeviation="4" flood-opacity="0.6"/></filter>
    <filter id="yell"><feGaussianBlur stdDeviation="2"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="22" ry="4" fill="#000" opacity="0.4"/>
  <rect x="18" y="36" width="28" height="20" rx="3" fill="url(#pekkaArmor)" filter="url(#shadow)"/>
  <rect x="22" y="30" width="20" height="16" rx="2" fill="url(#pekkaArmor)" filter="url(#shadow)"/>
  <rect x="26" y="26" width="4" height="10" fill="#FF0000"/>
  <rect x="34" y="26" width="4" height="10" fill="#FF0000"/>
  <path d="M 20 24 L 18 18 L 20 20 L 22 18 L 24 24" fill="url(#pekkaHorns)" filter="url(#shadow)"/>
  <path d="M 40 24 L 38 18 L 40 20 L 42 18 L 44 24" fill="url(#pekkaHorns)" filter="url(#shadow)"/>
  <ellipse cx="32" cy="40" rx="6" ry="8" fill="url(#shout)" filter="url(#yell)"/>
  <circle cx="50" cy="32" r="8" fill="url(#shout)" filter="url(#yell)"/>
  <circle cx="50" cy="32" r="5" fill="#FFFF00" opacity="0.7"/>
  <path d="M 46 28 L 44 24 L 46 26 M 54 28 L 56 24 L 54 26" stroke="#FFA500" stroke-width="2" filter="url(#yell)"/>
  <path d="M 48 30 L 52 30 M 48 34 L 52 34" stroke="#FFD700" stroke-width="2"/>
  <circle cx="14" cy="32" r="6" fill="url(#shout)" opacity="0.6" filter="url(#yell)"/>
</svg>',

    'arqueira-envergonhada.svg' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="archerHair" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FF69B4"/>
      <stop offset="100%" style="stop-color:#FF1493"/>
    </linearGradient>
    <linearGradient id="archerSkin" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFDAB9"/>
      <stop offset="100%" style="stop-color:#DEB887"/>
    </linearGradient>
    <filter id="shadow"><feDropShadow dx="1" dy="3" stdDeviation="2" flood-opacity="0.4"/></filter>
    <filter id="blush"><feGaussianBlur stdDeviation="1"/></filter>
  </defs>
  <ellipse cx="32" cy="58" rx="18" ry="3" fill="#000" opacity="0.3"/>
  <rect x="22" y="38" width="20" height="18" rx="2" fill="#9370DB" filter="url(#shadow)"/>
  <ellipse cx="32" cy="30" rx="12" ry="14" fill="url(#archerSkin)" filter="url(#shadow)"/>
  <path d="M 20 20 Q 20 14 32 12 Q 44 14 44 24" fill="url(#archerHair)" filter="url(#shadow)"/>
  <path d="M 40 18 Q 44 16 46 20 Q 46 24 44 26" fill="url(#archerHair)"/>
  <circle cx="26" cy="28" r="3" fill="#FFF"/>
  <circle cx="38" cy="28" r="3" fill="#FFF"/>
  <circle cx="26" cy="29" r="2" fill="#000"/>
  <circle cx="38" cy="29" r="2" fill="#000"/>
  <path d="M 28 34 Q 32 36 36 34" stroke="#FF69B4" stroke-width="2" fill="none"/>
  <ellipse cx="22" cy="32" rx="3" ry="4" fill="#FF6B6B" opacity="0.7" filter="url(#blush)"/>
  <ellipse cx="42" cy="32" rx="3" ry="4" fill="#FF6B6B" opacity="0.7" filter="url(#blush)"/>
  <path d="M 22 24 L 20 22 L 22 20" stroke="#8B4513" stroke-width="2" stroke-linecap="round"/>
  <circle cx="48" cy="32" r="3" fill="#FF69B4" opacity="0.5" filter="url(#blush)"/>
  <circle cx="50" cy="30" r="2" fill="#FFB6C1" opacity="0.6"/>
  <circle cx="46" cy="30" r="2" fill="#FFB6C1" opacity="0.6"/>
</svg>'
];

$backupDir = 'assets/img/';
$melhorados = 0;

foreach ($emotes as $nome => $conteudo) {
    $caminho = $backupDir . $nome;

    // Criar backup se não existir
    $backup = str_replace('.svg', '_backup.svg', $caminho);
    if (file_exists($caminho) && !file_exists($backup)) {
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
echo "RESUMO: $melhorados emotes melhorados com sucesso!\n";
echo str_repeat('=', 70) . "\n";
