# Guia de Instalação do Banco de Dados - ClashDecks

## 📦 Credenciais do Banco

```
Host:     localhost
Banco:    clashdecks_db
Usuário:  clashdecks_user
Senha:    ClashDecks@2024!
```

## 🚀 Opção 1: Importar via Linha de Comando (Recomendado)

### Windows (WAMP/XAMPP)

1. **Abra o Prompt de Comando como Administrador**

2. **Navegue até a pasta do projeto:**
```bash
cd C:\wamp64\www\clashdecks
```

3. **Execute o script SQL:**

**Para WAMP:**
```bash
C:\wamp64\bin\mysql\mysql8.x.x\bin\mysql.exe -u root -p < database.sql
```

**Para XAMPP:**
```bash
C:\xampp\mysql\bin\mysql.exe -u root -p < database.sql
```

4. **Digite a senha do root quando solicitado** (geralmente é vazio no WAMP/XAMPP local)

5. **Pronto!** O banco foi criado com todos os dados.

### Linux

1. **Abra o terminal**

2. **Navegue até a pasta:**
```bash
cd /var/www/html/clashdecks
```

3. **Execute:**
```bash
mysql -u root -p < database.sql
```

4. **Digite a senha do root MySQL**

## 🌐 Opção 2: Importar via phpMyAdmin

1. **Acesse o phpMyAdmin:**
   - WAMP: http://localhost/phpmyadmin
   - XAMPP: http://localhost/phpmyadmin

2. **Faça login como root** (sem senha ou senha padrão)

3. **Clique em "Importar" no menu superior**

4. **Escolha o arquivo:**
   - Clique em "Escolher arquivo"
   - Selecione: `C:\wamp64\www\clashdecks\database.sql`

5. **Clique em "Executar"**

6. **Aguarde a importação concluir**

## ✅ Verificar Instalação

### Via Linha de Comando

```bash
mysql -u clashdecks_user -p
# Senha: ClashDecks@2024!

USE clashdecks_db;
SHOW TABLES;
```

Você deve ver:
```
+---------------------------+
| Tables_in_clashdecks_db   |
+---------------------------+
| arenas                    |
| deck_cartas               |
| decks                     |
| personagens               |
+---------------------------+
```

### Verificar Dados

```sql
-- Ver total de arenas (deve ser 21)
SELECT COUNT(*) FROM arenas;

-- Ver total de personagens (deve ser 40)
SELECT COUNT(*) FROM personagens;

-- Ver total de decks (deve ser 63)
SELECT COUNT(*) FROM decks;

-- Ver exemplo de deck com cartas
SELECT d.nome, GROUP_CONCAT(dc.personagem_id) as cartas
FROM decks d
JOIN deck_cartas dc ON d.id = dc.deck_id
WHERE d.id = 'deck_a6_of1'
GROUP BY d.id;
```

## 🔧 Testar APIs

Depois de importar o banco, teste as APIs:

### 1. Testar Arenas
```
http://localhost/clashdecks/api/arenas.php
```
Deve retornar 21 arenas em JSON.

### 2. Testar Personagens
```
http://localhost/clashdecks/api/personagens.php
http://localhost/clashdecks/api/personagens.php?tipo=Tropa
http://localhost/clashdecks/api/personagens.php?elixirMax=3
```

### 3. Testar Decks
```
http://localhost/clashdecks/api/decks.php
http://localhost/clashdecks/api/decks.php?arena=6
http://localhost/clashdecks/api/decks.php?tipo=Ofensivo
http://localhost/clashdecks/api/decks.php?dificuldade=Facil
```

## 🛠️ Estrutura do Banco

### Tabela: arenas
- `id` - ID da arena (1-21)
- `nome` - Nome da arena
- `icone` - Nome do arquivo SVG

### Tabela: personagens
- `id` - ID único da carta
- `nome` - Nome da carta
- `tipo` - Tropa|Feitiço|Construção
- `raridade` - Comum|Raro|Épico|Lendário
- `elixir` - Custo de elixir
- `arena_desbloqueio` - Arena onde desbloqueia
- `icone` - Arquivo SVG
- `descricao` - Texto descritivo
- `sinergias` - JSON array de IDs
- `counters` - JSON array de IDs

### Tabela: decks
- `id` - ID único do deck
- `nome` - Nome do deck
- `tipo` - Ofensivo|Defensivo|Híbrido
- `arena_alvo` - Arena recomendada
- `notas` - Estratégia do deck
- `media_elixir` - Custo médio

### Tabela: deck_cartas
- `id` - ID auto incremento
- `deck_id` - FK para decks
- `personagem_id` - FK para personagens
- `posicao` - Posição da carta no deck (1-8)

## 🔒 Segurança

### Alterar Senha do Usuário

```sql
ALTER USER 'clashdecks_user'@'localhost' IDENTIFIED BY 'SuaSenhaForte123!';
```

**Não esqueça de atualizar** `api/config.php`:
```php
define('DB_PASS', 'SuaSenhaForte123!');
```

## 📊 Dados Incluídos

- ✅ **21 Arenas** - Todas as arenas de 1 a 21
- ✅ **40 Personagens** - Cartas principais incluindo tropas, feitiços e construções
- ✅ **63 Decks** - 3 decks por arena (Ofensivo, Defensivo, Híbrido)
- ✅ **504 Relações** - Deck-Cartas (63 decks × 8 cartas cada)

### Exemplos de Decks Incluídos:
- **Corredor 2.6** (Arena 6) - Deck famoso de ciclo rápido
- **Log Bait Clássico** (Arena 10) - Isca de feitiços
- **P.E.K.K.A Bridge Spam** (Arena 4) - Pressão dupla
- **Golem Beatdown** (Arena 5) - Beatdown clássico
- **E-Golem** (Arena 12) - Com Gigante de Elixir
- E muitos mais...

## ❓ Problemas Comuns

### Erro: "Access denied for user"
**Solução:** Verifique se executou o script completo que cria o usuário.

### Erro: "Database does not exist"
**Solução:** O script cria o banco automaticamente. Execute novamente.

### Erro: "Cannot connect to MySQL server"
**Solução:** Certifique-se que o MySQL está rodando no WAMP/XAMPP.

### APIs retornam erro 500
**Solução:** Verifique:
1. MySQL está rodando
2. Usuário e senha em `api/config.php` estão corretos
3. Banco foi importado corretamente

## 🔧 Configuração Administrativa (Atualizações Diretas)

O projeto possui dois arquivos de configuração:

### `api/config.php` - Acesso Público (APIs)
- Usuário: `clashdecks_user`
- Senha: `ClashDecks@2024!`
- Permissões: apenas SELECT (leitura)
- Usado pelas APIs públicas

### `api/config_admin.php` - Acesso Administrativo (Manutenção)
- Usuário: `root`
- Senha: (vazia)
- Permissões: completas (INSERT, UPDATE, DELETE)
- Usado para manutenção do banco

### Testar Conexão Administrativa

```bash
php test_admin_connection.php
```

Deve retornar:
```
✓ Conexão administrativa estabelecida com sucesso!
✓ Todas as tabelas acessíveis!
```

## 📝 Adicionar Mais Dados

### Usando config_admin.php (Recomendado)

```php
<?php
require_once 'api/config_admin.php';
$pdo = getAdminDBConnection();

// Adicionar novo personagem
inserirPersonagem($pdo, [
    'id' => 'nova-carta',
    'nome' => 'Nova Carta',
    'tipo' => 'Tropa',
    'raridade' => 'Raro',
    'elixir' => 4,
    'arena_desbloqueio' => 10,
    'icone' => 'nova-carta.svg',
    'descricao' => 'Descrição da carta...',
    'sinergias' => ['corredor', 'mosqueteira'],
    'counters' => ['mini-pekka', 'valquiria']
]);

// Adicionar novo deck
inserirDeck($pdo, [
    'id' => 'meu_deck',
    'nome' => 'Meu Deck Personalizado',
    'tipo' => 'Ofensivo',
    'arena_alvo' => 10,
    'notas' => 'Estratégia do deck...',
    'media_elixir' => 3.5
], [
    'corredor',
    'mosqueteira',
    'golem-de-gelo',
    'canhao',
    'esqueletos',
    'zap',
    'bola-de-fogo',
    'flechas'
]);

echo "Dados inseridos com sucesso!\n";
?>
```

### Usando SQL Direto (Alternativa)

```sql
-- 1. Inserir o deck
INSERT INTO decks (id, nome, tipo, arena_alvo, notas, media_elixir) VALUES
('meu_deck', 'Meu Deck Personalizado', 'Ofensivo', 10, 'Estratégia do deck...', 3.5);

-- 2. Inserir as 8 cartas
INSERT INTO deck_cartas (deck_id, personagem_id, posicao) VALUES
('meu_deck', 'corredor', 1),
('meu_deck', 'mosqueteira', 2),
('meu_deck', 'golem-de-gelo', 3),
('meu_deck', 'canhao', 4),
('meu_deck', 'esqueletos', 5),
('meu_deck', 'zap', 6),
('meu_deck', 'bola-de-fogo', 7),
('meu_deck', 'flechas', 8);
```

```sql
-- Adicionar novo personagem
INSERT INTO personagens (id, nome, tipo, raridade, elixir, arena_desbloqueio, icone, descricao, sinergias, counters) VALUES
('nova-carta', 'Nova Carta', 'Tropa', 'Raro', 4, 10, 'nova-carta.svg',
'Descrição da carta...',
'["corredor","mosqueteira"]',
'["mini-pekka","valquiria"]');
```

## 🔄 Resetar Banco

Para começar do zero:

```bash
mysql -u root -p < database.sql
```

O script DROP DATABASE no início garante que tudo será recriado.

## 📞 Suporte

Se precisar de ajuda, verifique:
1. Logs do MySQL em `C:\wamp64\logs\mysql.log`
2. Logs do PHP em `C:\wamp64\logs\php_error.log`
3. Console do navegador (F12) para erros JavaScript

---

**Projeto ClashDecks** - Banco de Dados MySQL Completo
