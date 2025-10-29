# ClashDecks

Sistema de catálogo de decks de Clash Royale organizado por arena, dificuldade e estilo de jogo.

## Tecnologias

- HTML5 semântico
- CSS3 (Grid, Flexbox, Custom Properties)
- JavaScript Vanilla (ES6+)
- PHP 7.4+ (APIs REST)
- **MySQL 5.7+** (Banco de Dados)
- PDO (Conexão segura com banco)

## ⚡ Instalação Rápida

### 1. Configurar o Banco de Dados (OBRIGATÓRIO)

O projeto agora usa **MySQL** ao invés de JSON.

**Via Linha de Comando (Recomendado):**
```bash
cd C:\wamp64\www\clashdecks
C:\wamp64\bin\mysql\mysql8.x.x\bin\mysql.exe -u root -p < database.sql
```

**Via phpMyAdmin:**
1. Acesse http://localhost/phpmyadmin
2. Importar → Escolher arquivo → `database.sql`
3. Executar

**Credenciais criadas automaticamente:**
```
Host:     localhost
Banco:    clashdecks_db
Usuário:  clashdecks_user
Senha:    ClashDecks@2024!
```

📖 **[Ver guia completo de instalação do banco](INSTALL_DATABASE.md)**

### 2. Como Rodar

### WAMP/XAMPP (Windows)

1. Coloque a pasta `clashdecks` em `C:\wamp64\www\` ou `C:\xampp\htdocs\`
2. Inicie o servidor Apache
3. Acesse: `http://localhost/clashdecks/`

### PHP Built-in Server (Linux/Mac/Windows)

```bash
cd c:\wamp64\www\clashdecks
php -S localhost:8000
```

Acesse: `http://localhost:8000/`

### Servidor Linux (VPS)

```bash
# Copie para /var/www/html/
sudo cp -r clashdecks /var/www/html/

# Configure permissões
sudo chown -R www-data:www-data /var/www/html/clashdecks
sudo chmod -R 755 /var/www/html/clashdecks

# Acesse via domínio ou IP
http://seudominio.com/clashdecks/
```

## Estrutura do Projeto

```
/clashdecks
├── database.sql                # Script SQL completo (banco + dados)
├── INSTALL_DATABASE.md         # Guia de instalação do banco
├── assets/
│   ├── css/
│   │   └── styles.css          # Estilos completos
│   ├── js/
│   │   └── app.js              # Lógica do front-end
│   └── img/                    # SVGs originais
│       ├── logo.svg
│       ├── arena4-bg.svg       # Fundo padrão pedra
│       ├── arena1.svg ... arena21.svg
│       ├── goblins.svg, arqueiras.svg, etc.
│       └── ui-close.svg, ui-copy.svg, etc.
├── data/                       # ⚠️ JSONs mantidos para referência (APIs usam MySQL)
│   ├── arenas.json            # 21 arenas
│   ├── personagens.json       # Todas as cartas
│   └── decks.json             # Decks por arena
├── api/                        # APIs PHP (agora com MySQL)
│   ├── config.php             # Configuração do banco
│   ├── arenas.php             # API de arenas
│   ├── personagens.php        # API de personagens (com filtros)
│   └── decks.php              # API de decks (com filtros)
├── personagens/
│   └── index.html             # Catálogo de cartas
├── index.html                 # Página principal
└── README.md
```

## Como Editar Conteúdo

### Adicionar Nova Arena

Edite `data/arenas.json`:

```json
{
  "id": 22,
  "nome": "Arena 22",
  "icone": "arena22.svg"
}
```

Crie o ícone SVG em `assets/img/arena22.svg`.

### Adicionar Nova Carta/Personagem

Edite `data/personagens.json`:

```json
{
  "id": "nova_carta",
  "nome": "Nova Carta",
  "tipo": "Tropa|Feitiço|Construção",
  "raridade": "Comum|Raro|Épico|Lendário",
  "elixir": 3,
  "arenaDesbloqueio": 5,
  "icone": "nova-carta.svg",
  "descricao": "Descrição da carta...",
  "sinergias": ["carta1", "carta2"],
  "counters": ["carta3", "carta4"]
}
```

Crie o ícone SVG em `assets/img/nova-carta.svg`.

### Adicionar Novo Deck

Edite `data/decks.json`:

```json
{
  "id": "meu_deck_personalizado",
  "nome": "Nome do Deck",
  "tipo": "Ofensivo|Defensivo|Híbrido",
  "arenaAlvo": 10,
  "cartas": [
    "carta1", "carta2", "carta3", "carta4",
    "carta5", "carta6", "carta7", "carta8"
  ],
  "notas": "Estratégia e dicas do deck...",
  "mediaElixir": 3.5
}
```

**Importante**: Use exatamente 8 cartas. Os IDs devem existir em `personagens.json`.

### Criar Ícones SVG

Todos os SVGs em `assets/img/` devem seguir o padrão:

- Dimensões: 64x64 ou 128x128
- Estilo: flat/cartoon
- Cores: coerentes com o tema
- Sem dependências externas
- Otimizados (viewBox, sem espaços desnecessários)

Exemplo:

```svg
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
  <circle cx="32" cy="32" r="30" fill="#4A90E2"/>
  <path d="M..." fill="#FFF"/>
</svg>
```

## Regras de Dificuldade

A dificuldade dos decks é calculada automaticamente baseada na arena:

- **Fácil**: Arenas 1-8
- **Médio**: Arenas 9-11
- **Difícil**: Arenas 12-21

## Filtros Disponíveis

### Página Home (Decks)
- Tipo: Ofensivo, Defensivo, Híbrido
- Arena: 1 a 21
- Dificuldade: Fácil, Médio, Difícil
- Busca textual: Nome do deck

### Página Personagens
- Tipo: Tropa, Feitiço, Construção
- Custo de elixir: 0-10
- Raridade: Comum, Raro, Épico, Lendário
- Arena de desbloqueio: 1-21
- Busca textual: Nome da carta

## APIs Disponíveis

### GET /api/arenas.php
Retorna todas as arenas.

```bash
curl http://localhost/clashdecks/api/arenas.php
```

### GET /api/personagens.php
Filtros opcionais via query string:
- `?tipo=Tropa`
- `?elixirMax=4`
- `?arenaMin=5`
- `?raridade=Lendário`

```bash
curl "http://localhost/clashdecks/api/personagens.php?tipo=Tropa&elixirMax=3"
```

### GET /api/decks.php
Filtros opcionais:
- `?arena=10`
- `?tipo=Ofensivo`
- `?dificuldade=Medio`

```bash
curl "http://localhost/clashdecks/api/decks.php?arena=8&tipo=Ofensivo"
```

## Funcionalidades Principais

- Navegação entre Home e Personagens com estado ativo
- Filtros combináveis em tempo real
- Visualização de 8 cartas por deck com ícones
- Copiar deck para área de transferência
- Modais de detalhes (sinergias, fraquezas, variações)
- Design responsivo (mobile-first)
- Acessibilidade WCAG 2.1 AA
- Sem dependências externas (100% standalone)

## Navegadores Suportados

- Chrome/Edge 90+
- Firefox 88+
- Safari 14+

## Licença

Projeto educacional. SVGs e código são originais (não usam assets oficiais da Supercell).

## Créditos

Desenvolvido como catálogo de referência para jogadores de Clash Royale.
