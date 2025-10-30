# Sistema de Baús - ClashDecks

**Data:** 2025-10-29

## Resumo

Implementado sistema completo de **Baús do Clash Royale** com:
- ✅ 10 baús cadastrados
- ✅ Página dedicada com filtros
- ✅ Modal de detalhes com porcentagens de recompensas
- ✅ API REST para consulta
- ✅ Ícones SVG personalizados

---

## Funcionalidades

### 1. Página de Baús
**URL:** `http://localhost/clashdecks/baus/index.html`

- Lista todos os baús disponíveis no jogo
- Filtro por raridade (Comum, Raro, Épico, Lendário)
- Busca por nome
- Card com informações básicas de cada baú
- Botão "Ver Detalhes" em cada baú

### 2. Modal de Detalhes
Ao clicar em "Ver Detalhes":
- **Ícone grande do baú**
- **Informações:**
  - Raridade
  - Ciclo (se aplicável)
  - Total de cartas
  - Faixa de ouro
  - Descrição
- **Recompensas detalhadas:**
  - Porcentagem de cada tipo de carta
  - Quantidade de ouro
  - Quantidade de gemas

### 3. Navegação
- Botão "Baús" adicionado no header de todas as páginas
- Navegação consistente entre Home → Personagens → Baús

---

## Baús Cadastrados

### Baús do Ciclo (4)
1. **Baú de Prata** (Comum)
   - Ciclo: 1
   - 19 cartas | 18-102 ouro
   - Comum: 70% | Rara: 27% | Épica: 3%

2. **Baú de Ouro** (Raro)
   - Ciclo: 2
   - 57 cartas | 82-470 ouro
   - Comum: 68% | Rara: 29% | Épica: 3%

3. **Baú Gigante** (Épico)
   - Ciclo: 3
   - 180 cartas | 260-1484 ouro
   - Comum: 67% | Rara: 30% | Épica: 3%

4. **Baú Mágico** (Épico)
   - Ciclo: 4
   - 114 cartas | 416-2374 ouro
   - Comum: 65% | Rara: 30% | Épica: 5%
   - 5-15 gemas

### Baús Especiais (6)

5. **Baú do Relâmpago** (Lendário)
   - 20 cartas | 3000-6000 ouro
   - **1 carta Lendária garantida (100%)**
   - 18 cartas Épicas
   - 1 carta Rara
   - 10-20 gemas

6. **Baú do Rei** (Lendário)
   - 25 cartas | 500-2500 ouro
   - Obtido por doações ao clã
   - Comum: 60% | Rara: 35% | Épica: 5%
   - 5-10 gemas

7. **Baú do Destino** (Lendário)
   - 1 carta Lendária à escolha
   - Comprado com gemas
   - Permite escolher qualquer carta Lendária

8. **Baú Mega Relâmpago** (Lendário)
   - 40 cartas | 6000-10000 ouro
   - **2 cartas Lendárias garantidas (100%)**
   - 35 cartas Épicas
   - 3 cartas Raras
   - 20-40 gemas

9. **Baú da Coroa** (Épico)
   - 90 cartas | 200-1200 ouro
   - Obtido com 10 coroas
   - Comum: 68% | Rara: 29% | Épica: 3%

10. **Baú do Clã** (Épico)
    - 50 cartas | 300-1800 ouro
    - Obtido por batalhas e doações no clã
    - Comum: 65% | Rara: 32% | Épica: 3%

---

## Estrutura Técnica

### Banco de Dados

**Tabela:** `baus`

```sql
CREATE TABLE baus (
    id VARCHAR(50) PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    raridade VARCHAR(20) NOT NULL,
    ciclo INT DEFAULT NULL,
    icone VARCHAR(100) NOT NULL,
    descricao TEXT,
    ouro_min INT DEFAULT 0,
    ouro_max INT DEFAULT 0,
    cartas_total INT DEFAULT 0,
    recompensas JSON,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
```

**Campos:**
- `id` - Identificador único (ex: bau-prata)
- `nome` - Nome do baú
- `raridade` - Comum, Raro, Épico, Lendário
- `ciclo` - Posição no ciclo de baús (1-4) ou NULL
- `icone` - Nome do arquivo SVG
- `descricao` - Texto descritivo
- `ouro_min/max` - Faixa de ouro
- `cartas_total` - Quantidade total de cartas
- `recompensas` - JSON com detalhes das porcentagens

**Exemplo de JSON de recompensas:**
```json
{
  "cartas": {
    "Comum": "70%",
    "Rara": "27%",
    "Épica": "3%"
  },
  "ouro": "18-102",
  "gemas": "0-2"
}
```

### API

**Endpoint:** `GET /api/baus.php`

**Resposta:**
```json
[
  {
    "id": "bau-prata",
    "nome": "Baú de Prata",
    "raridade": "Comum",
    "ciclo": 1,
    "icone": "bau-prata.svg",
    "descricao": "Baú comum que aparece a cada vitória...",
    "ouroMin": 18,
    "ouroMax": 102,
    "cartasTotal": 19,
    "recompensas": {
      "cartas": {
        "Comum": "70%",
        "Rara": "27%",
        "Épica": "3%"
      },
      "ouro": "18-102",
      "gemas": "0-2"
    }
  },
  ...
]
```

### Arquivos Criados

#### 1. Backend
- `api/baus.php` - API REST para baús
- `criar_baus.php` - Script de criação da tabela e inserção de dados

#### 2. Frontend
- `baus/index.html` - Página principal de baús
- `assets/js/baus.js` - JavaScript para a página de baús
- `assets/css/styles.css` - Estilos adicionados para baús

#### 3. Ícones SVG (10 arquivos)
- `assets/img/bau-prata.svg`
- `assets/img/bau-ouro.svg`
- `assets/img/bau-gigante.svg`
- `assets/img/bau-magico.svg`
- `assets/img/bau-relampago.svg`
- `assets/img/bau-rei.svg`
- `assets/img/bau-destino.svg`
- `assets/img/bau-mega-relampago.svg`
- `assets/img/bau-coroa.svg`
- `assets/img/bau-clan.svg`

#### 4. Headers Atualizados
- `index.html` - Link para Baús adicionado
- `personagens/index.html` - Link para Baús adicionado

#### 5. Scripts de Teste
- `testar_baus.php` - Teste completo do sistema
- `criar_icones_baus.sh` - Script para criar ícones

---

## CSS - Classes Adicionadas

### Grid de Baús
```css
.baus-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 2rem;
}
```

### Card de Baú
```css
.bau-card - Card principal
.bau-card__icon - Ícone do baú
.bau-card__title - Título do baú
.bau-card__raridade - Badge de raridade
.bau-card__info - Informações resumidas
```

### Badges de Raridade
```css
.raridade--comum - Cinza (#808080)
.raridade--raro - Azul (#4169e1)
.raridade--épico - Roxo (#9370db)
.raridade--lendário - Dourado (#ffd700)
```

### Modal
```css
.modal__bau-icon - Ícone grande no modal
.recompensas-group - Grupo de recompensas
.recompensas-list - Lista de recompensas
```

---

## JavaScript - Funções Principais

### Estado Global
```javascript
const STATE = {
  baus: [],
  filtros: {
    raridade: 'Todos',
    busca: ''
  }
};
```

### Funções Principais
- `carregarBaus()` - Carrega dados da API
- `renderizarBaus()` - Renderiza grid de baús
- `abrirModalBau(bau)` - Abre modal com detalhes
- `fecharModal()` - Fecha modal
- `buscarBauPorId(id)` - Busca baú específico

### Event Listeners
- Filtro de raridade (botões)
- Busca em tempo real
- Abrir/fechar modal
- ESC para fechar modal

---

## Como Usar

### Acessar a Página
```
http://localhost/clashdecks/baus/index.html
```

### Filtrar Baús
1. Clique em um botão de raridade (Comum, Raro, Épico, Lendário)
2. Ou digite no campo de busca

### Ver Detalhes
1. Clique no botão "Ver Detalhes" de qualquer baú
2. Modal abre com informações completas
3. Veja as porcentagens de recompensas
4. Fechar: clique no X, fora do modal ou pressione ESC

---

## Características dos Ícones SVG

- ViewBox: 64x64 (padrão do projeto)
- Estilo: Flat/minimalista
- Tamanho: ~200-400 bytes cada
- Cores representam a raridade
- Detalhes simples e reconhecíveis

### Exemplos de Cores
- **Prata:** Cinza metálico
- **Ouro:** Dourado
- **Relâmpago:** Azul com raio amarelo
- **Rei:** Vermelho com coroa dourada
- **Destino:** Rosa/magenta com estrela
- **Mágico:** Roxo com efeito brilhante

---

## Testes Realizados

### ✓ Banco de Dados
- Tabela criada com sucesso
- 10 baús inseridos
- Campos JSON funcionando

### ✓ API
- Endpoint respondendo
- JSON válido retornado
- CORS configurado
- 10 baús retornados

### ✓ Ícones
- 10/10 ícones criados
- Todos os arquivos SVG válidos
- Localizados em assets/img/

### ✓ Interface
- Página carregando corretamente
- Filtros funcionando
- Busca funcionando
- Modal abrindo/fechando
- Responsividade OK

### ✓ Navegação
- Link no header (index.html)
- Link no header (personagens/index.html)
- Links funcionando entre páginas

---

## Responsividade

### Desktop (> 768px)
- Grid: 3-4 colunas
- Cards: 280px mínimo

### Tablet (480px - 768px)
- Grid: 2-3 colunas
- Cards: 240px mínimo

### Mobile (< 480px)
- Grid: 1 coluna
- Cards: largura total

---

## Melhorias Futuras (Opcional)

1. **Mais Baús:**
   - Baú Lendário
   - Baú Real
   - Baús de eventos sazonais

2. **Funcionalidades:**
   - Calculadora de baús
   - Simulador de abertura
   - Histórico de baús

3. **Filtros Adicionais:**
   - Por quantidade de ouro
   - Por quantidade de cartas
   - Por presença de Lendária

4. **Estatísticas:**
   - Chance real de cada carta
   - Comparação entre baús
   - Valor em gemas

---

## Resumo Final

```
✅ 10 baús cadastrados
✅ Página funcional com filtros
✅ Modal com detalhes completos
✅ API REST funcionando
✅ 10 ícones SVG criados
✅ Navegação integrada
✅ Totalmente responsivo
✅ Todos os testes passando
```

**O sistema de baús está completo e pronto para uso!** 🎁

**Acesse:** `http://localhost/clashdecks/baus/index.html`
