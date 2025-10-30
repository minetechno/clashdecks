/*
 * ClashDecks - JavaScript Principal
 *
 * Como adicionar/editar conteúdo:
 * - Arenas: Edite /data/arenas.json
 * - Personagens/Cartas: Edite /data/personagens.json
 * - Decks: Edite /data/decks.json (cada deck deve ter exatamente 8 cartas)
 *
 * Ícones SVG ficam em /assets/img/
 */

// ===================================
// 1. CONFIGURAÇÃO E ESTADO GLOBAL
// ===================================
const APP_CONFIG = {
  API_BASE: window.location.pathname.includes('/personagens/') ? '../api' : 'api',
  IMG_BASE: window.location.pathname.includes('/personagens/') ? '../assets/img' : 'assets/img'
};

const STATE = {
  arenas: [],
  personagens: [],
  decks: [],
  filtros: {
    tipo: 'Todos',
    arena: '',
    dificuldade: 'Todos',
    tipoPersonagem: '',
    elixir: '',
    raridade: '',
    busca: ''
  }
};

// ===================================
// 2. UTILITÁRIOS
// ===================================

/**
 * Calcula dificuldade baseada na arena (regra fixa)
 */
function calcularDificuldade(arenaAlvo) {
  if (arenaAlvo >= 1 && arenaAlvo <= 8) return 'Facil';
  if (arenaAlvo >= 9 && arenaAlvo <= 11) return 'Medio';
  if (arenaAlvo >= 12 && arenaAlvo <= 24) return 'Dificil';
  return 'Desconhecido';
}

/**
 * Normaliza string para busca (remove acentos, lowercase)
 */
function normalizarString(str) {
  return str
    .normalize('NFD')
    .replace(/[\u0300-\u036f]/g, '')
    .toLowerCase();
}

/**
 * Busca personagem por ID
 */
function buscarPersonagemPorId(id) {
  return STATE.personagens.find(p => p.id === id);
}

// ===================================
// 3. TOASTS (NOTIFICAÇÕES)
// ===================================

/**
 * Mostra um toast de notificação
 */
function mostrarToast(mensagem, tipo = 'success') {
  const container = document.getElementById('toast-container');
  if (!container) return;

  const toast = document.createElement('div');
  toast.className = `toast toast--${tipo}`;
  toast.innerHTML = `<div class="toast__message">${mensagem}</div>`;

  container.appendChild(toast);

  // Remove após 3 segundos
  setTimeout(() => {
    toast.style.opacity = '0';
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}

// ===================================
// 4. MODAL
// ===================================

/**
 * Abre o modal de deck com detalhes
 */
function abrirModalDeck(deck) {
  const modal = document.getElementById('deck-modal');
  const content = document.getElementById('modal-content');
  const title = document.getElementById('modal-title');

  if (!modal || !content || !title) return;

  title.textContent = deck.nome;

  // Monta HTML do conteúdo
  let html = `
    <div class="modal__section">
      <div class="modal__cards">
  `;

  deck.cartas.forEach(cartaId => {
    const carta = buscarPersonagemPorId(cartaId);
    if (carta) {
      html += `
        <img
          src="${APP_CONFIG.IMG_BASE}/${carta.icone}"
          alt="${carta.nome}"
          title="${carta.nome}"
          class="modal__card-icon"
        >
      `;
    }
  });

  html += `
      </div>
    </div>

    <div class="modal__section">
      <h4 class="modal__section-title">Informações</h4>
      <p><strong>Tipo:</strong> ${deck.tipo}</p>
      <p><strong>Arena Alvo:</strong> ${deck.arenaAlvo}</p>
      <p><strong>Dificuldade:</strong> ${deck.dificuldade || calcularDificuldade(deck.arenaAlvo)}</p>
      <p><strong>Média de Elixir:</strong> ${deck.mediaElixir}</p>
    </div>

    <div class="modal__section">
      <h4 class="modal__section-title">Estratégia</h4>
      <p>${deck.notas}</p>
    </div>

    <div class="modal__section">
      <h4 class="modal__section-title">Cartas do Deck</h4>
      <ul class="modal__list">
  `;

  deck.cartas.forEach(cartaId => {
    const carta = buscarPersonagemPorId(cartaId);
    if (carta) {
      html += `<li class="modal__list-item">${carta.nome} (${carta.elixir} elixir)</li>`;
    }
  });

  html += `
      </ul>
    </div>
  `;

  content.innerHTML = html;
  modal.classList.add('modal-overlay--active');
  modal.setAttribute('aria-hidden', 'false');
}

/**
 * Abre o modal de personagem com detalhes
 */
function abrirModalPersonagem(personagem) {
  const modal = document.getElementById('personagem-modal');
  const content = document.getElementById('modal-content');
  const title = document.getElementById('modal-title');

  if (!modal || !content || !title) return;

  title.textContent = personagem.nome;

  let html = `
    <div class="modal__section text-center">
      <img
        src="${APP_CONFIG.IMG_BASE}/${personagem.icone}"
        alt="${personagem.nome}"
        style="width: 120px; height: 120px; margin: 0 auto;"
      >
    </div>

    <div class="modal__section">
      <h4 class="modal__section-title">Informações</h4>
      <p><strong>Tipo:</strong> ${personagem.tipo}</p>
      <p><strong>Raridade:</strong> ${personagem.raridade}</p>
      <p><strong>Custo:</strong> ${personagem.elixir} elixir</p>
      <p><strong>Arena de Desbloqueio:</strong> ${personagem.arenaDesbloqueio}</p>
    </div>

    <div class="modal__section">
      <h4 class="modal__section-title">Descrição</h4>
      <p>${personagem.descricao}</p>
    </div>
  `;

  if (personagem.sinergias && personagem.sinergias.length > 0) {
    html += `
      <div class="modal__section">
        <h4 class="modal__section-title">Sinergias</h4>
        <ul class="modal__list">
    `;
    personagem.sinergias.forEach(sinergiaId => {
      const sinergia = buscarPersonagemPorId(sinergiaId);
      if (sinergia) {
        html += `<li class="modal__list-item">${sinergia.nome}</li>`;
      }
    });
    html += `</ul></div>`;
  }

  if (personagem.counters && personagem.counters.length > 0) {
    html += `
      <div class="modal__section">
        <h4 class="modal__section-title">Counters</h4>
        <ul class="modal__list">
    `;
    personagem.counters.forEach(counterId => {
      const counter = buscarPersonagemPorId(counterId);
      if (counter) {
        html += `<li class="modal__list-item">${counter.nome}</li>`;
      }
    });
    html += `</ul></div>`;
  }

  content.innerHTML = html;
  modal.classList.add('modal-overlay--active');
  modal.setAttribute('aria-hidden', 'false');
}

/**
 * Fecha modal
 */
function fecharModal() {
  const modals = document.querySelectorAll('.modal-overlay');
  modals.forEach(modal => {
    modal.classList.remove('modal-overlay--active');
    modal.setAttribute('aria-hidden', 'true');
  });
}

// ===================================
// 5. CLIPBOARD (COPIAR DECK)
// ===================================

/**
 * Copia deck para área de transferência
 */
function copiarDeck(deck) {
  const nomesCartas = deck.cartas.map(cartaId => {
    const carta = buscarPersonagemPorId(cartaId);
    return carta ? carta.nome : cartaId;
  });

  const texto = `${deck.nome}: ${nomesCartas.join(', ')}`;

  navigator.clipboard.writeText(texto)
    .then(() => {
      mostrarToast('Deck copiado para a área de transferência!', 'success');
    })
    .catch(err => {
      console.error('Erro ao copiar:', err);
      mostrarToast('Erro ao copiar deck', 'error');
    });
}

// ===================================
// 6. API - FETCH DE DADOS
// ===================================

/**
 * Busca arenas da API
 */
async function buscarArenas() {
  try {
    const response = await fetch(`${APP_CONFIG.API_BASE}/arenas.php`);
    if (!response.ok) throw new Error('Erro ao buscar arenas');
    const data = await response.json();
    STATE.arenas = data;
    return data;
  } catch (error) {
    console.error('Erro ao buscar arenas:', error);
    mostrarToast('Erro ao carregar arenas', 'error');
    return [];
  }
}

/**
 * Busca personagens da API
 */
async function buscarPersonagens() {
  try {
    const response = await fetch(`${APP_CONFIG.API_BASE}/personagens.php`);
    if (!response.ok) throw new Error('Erro ao buscar personagens');
    const data = await response.json();
    STATE.personagens = data;
    return data;
  } catch (error) {
    console.error('Erro ao buscar personagens:', error);
    mostrarToast('Erro ao carregar personagens', 'error');
    return [];
  }
}

/**
 * Busca decks da API
 */
async function buscarDecks() {
  try {
    const response = await fetch(`${APP_CONFIG.API_BASE}/decks.php`);
    if (!response.ok) throw new Error('Erro ao buscar decks');
    let data = await response.json();

    // Adiciona dificuldade calculada
    data = data.map(deck => ({
      ...deck,
      dificuldade: calcularDificuldade(deck.arenaAlvo)
    }));

    STATE.decks = data;
    return data;
  } catch (error) {
    console.error('Erro ao buscar decks:', error);
    mostrarToast('Erro ao carregar decks', 'error');
    return [];
  }
}

// ===================================
// 7. RENDERIZAÇÃO - HOME
// ===================================

/**
 * Renderiza grade de arenas
 */
function renderizarArenas(arenas) {
  const grid = document.getElementById('arenas-grid');
  if (!grid) return;

  if (arenas.length === 0) {
    grid.innerHTML = '<div class="empty-state"><p class="empty-state__message">Nenhuma arena encontrada</p></div>';
    return;
  }

  grid.innerHTML = arenas.map(arena => {
    const dificuldade = calcularDificuldade(arena.id);
    const classDificuldade = dificuldade.toLowerCase();

    return `
      <article class="arena-card" role="listitem" tabindex="0">
        <img
          src="${APP_CONFIG.IMG_BASE}/${arena.icone}"
          alt="Ícone da ${arena.nome}"
          class="arena-card__icon"
        >
        <h3 class="arena-card__name">${arena.nome}</h3>
        <span class="arena-card__difficulty arena-card__difficulty--${classDificuldade}">
          ${dificuldade}
        </span>
      </article>
    `;
  }).join('');
}

/**
 * Renderiza grade de decks
 */
function renderizarDecks(decks) {
  const grid = document.getElementById('decks-grid');
  if (!grid) return;

  if (decks.length === 0) {
    grid.innerHTML = `
      <div class="empty-state">
        <p class="empty-state__icon">🔍</p>
        <p class="empty-state__message">Nenhum deck encontrado com os filtros selecionados</p>
      </div>
    `;
    return;
  }

  grid.innerHTML = decks.map(deck => {
    const dificuldade = deck.dificuldade || calcularDificuldade(deck.arenaAlvo);
    const classDificuldade = dificuldade.toLowerCase();
    const classTipo = deck.tipo.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');

    // Renderiza ícones das cartas
    const cartasHTML = deck.cartas.map(cartaId => {
      const carta = buscarPersonagemPorId(cartaId);
      if (!carta) return '';

      return `
        <img
          src="${APP_CONFIG.IMG_BASE}/${carta.icone}"
          alt="${carta.nome}"
          title="${carta.nome}"
          class="deck-card__card-icon"
        >
      `;
    }).join('');

    return `
      <article class="deck-card" role="listitem">
        <header class="deck-card__header">
          <h3 class="deck-card__title">${deck.nome}</h3>
          <div class="deck-card__tags">
            <span class="deck-card__tag deck-card__tag--${classTipo}">${deck.tipo}</span>
            <span class="deck-card__tag arena-card__difficulty--${classDificuldade}">${dificuldade}</span>
          </div>
        </header>

        <div class="deck-card__cards">
          ${cartasHTML}
        </div>

        <div class="deck-card__info">
          <span class="deck-card__stat">Arena: <strong>${deck.arenaAlvo}</strong></span>
          <span class="deck-card__stat">Elixir Médio: <strong>${deck.mediaElixir}</strong></span>
        </div>

        <p class="deck-card__notes">${deck.notas}</p>

        <div class="deck-card__actions">
          <button
            class="btn btn--success"
            onclick="copiarDeck(${JSON.stringify(deck).replace(/"/g, '&quot;')})"
            aria-label="Copiar deck ${deck.nome}"
          >
            <img src="${APP_CONFIG.IMG_BASE}/ui-copy.svg" alt="" width="16" height="16">
            Copiar Deck
          </button>
          <button
            class="btn btn--primary"
            onclick="abrirModalDeck(${JSON.stringify(deck).replace(/"/g, '&quot;')})"
            aria-label="Ver detalhes do deck ${deck.nome}"
          >
            Ver Detalhes
          </button>
        </div>
      </article>
    `;
  }).join('');
}

// ===================================
// 8. RENDERIZAÇÃO - PERSONAGENS
// ===================================

/**
 * Renderiza grade de personagens
 */
function renderizarPersonagens(personagens) {
  const grid = document.getElementById('personagens-grid');
  if (!grid) return;

  if (personagens.length === 0) {
    grid.innerHTML = `
      <div class="empty-state">
        <p class="empty-state__icon">🔍</p>
        <p class="empty-state__message">Nenhum personagem encontrado</p>
      </div>
    `;
    return;
  }

  grid.innerHTML = personagens.map(personagem => `
    <article
      class="personagem-card"
      role="listitem"
      tabindex="0"
      onclick="abrirModalPersonagem(${JSON.stringify(personagem).replace(/"/g, '&quot;')})"
      onkeypress="if(event.key==='Enter') abrirModalPersonagem(${JSON.stringify(personagem).replace(/"/g, '&quot;')})"
    >
      <img
        src="${APP_CONFIG.IMG_BASE}/${personagem.icone}"
        alt="${personagem.nome}"
        class="personagem-card__icon"
      >
      <h3 class="personagem-card__name">${personagem.nome}</h3>
      <p class="personagem-card__details">
        ${personagem.tipo} • ${personagem.raridade}<br>
        <span class="personagem-card__elixir">${personagem.elixir} elixir</span>
      </p>
    </article>
  `).join('');
}

// ===================================
// 9. FILTROS - HOME
// ===================================

/**
 * Aplica filtros aos decks
 */
function aplicarFiltrosDecks() {
  let decksFiltrados = [...STATE.decks];

  // Filtro de tipo
  if (STATE.filtros.tipo !== 'Todos') {
    decksFiltrados = decksFiltrados.filter(d => d.tipo === STATE.filtros.tipo);
  }

  // Filtro de arena
  if (STATE.filtros.arena) {
    const arenaNum = parseInt(STATE.filtros.arena);
    decksFiltrados = decksFiltrados.filter(d => d.arenaAlvo === arenaNum);
  }

  // Filtro de dificuldade
  if (STATE.filtros.dificuldade !== 'Todos') {
    decksFiltrados = decksFiltrados.filter(d => {
      const dif = calcularDificuldade(d.arenaAlvo);
      return dif === STATE.filtros.dificuldade;
    });
  }

  // Filtro de busca textual
  if (STATE.filtros.busca) {
    const buscaNormalizada = normalizarString(STATE.filtros.busca);
    decksFiltrados = decksFiltrados.filter(d => {
      const nomeNormalizado = normalizarString(d.nome);
      return nomeNormalizado.includes(buscaNormalizada);
    });
  }

  renderizarDecks(decksFiltrados);
}

/**
 * Configura event listeners dos filtros de decks
 */
function configurarFiltrosDecks() {
  // Filtros de botão (tipo e dificuldade)
  document.querySelectorAll('[data-filter]').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const filtro = e.target.dataset.filter;
      const valor = e.target.dataset.value;

      // Atualiza estado ativo dos botões do mesmo grupo
      document.querySelectorAll(`[data-filter="${filtro}"]`).forEach(b => {
        b.classList.remove('filter-btn--active');
        b.setAttribute('aria-pressed', 'false');
      });

      e.target.classList.add('filter-btn--active');
      e.target.setAttribute('aria-pressed', 'true');

      STATE.filtros[filtro] = valor;
      aplicarFiltrosDecks();
    });
  });

  // Filtro de arena (select)
  const arenaSelect = document.getElementById('filter-arena');
  if (arenaSelect) {
    arenaSelect.addEventListener('change', (e) => {
      STATE.filtros.arena = e.target.value;
      aplicarFiltrosDecks();
    });
  }

  // Busca textual
  const searchInput = document.getElementById('search-decks');
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      STATE.filtros.busca = e.target.value;
      aplicarFiltrosDecks();
    });
  }
}

// ===================================
// 10. FILTROS - PERSONAGENS
// ===================================

/**
 * Aplica filtros aos personagens
 */
function aplicarFiltrosPersonagens() {
  let personagensFiltrados = [...STATE.personagens];

  // Filtro de tipo
  if (STATE.filtros.tipoPersonagem) {
    personagensFiltrados = personagensFiltrados.filter(p =>
      p.tipo === STATE.filtros.tipoPersonagem
    );
  }

  // Filtro de elixir
  if (STATE.filtros.elixir) {
    const elixir = parseInt(STATE.filtros.elixir);
    personagensFiltrados = personagensFiltrados.filter(p => {
      if (elixir === 8) return p.elixir >= 8;
      return p.elixir === elixir;
    });
  }

  // Filtro de raridade
  if (STATE.filtros.raridade) {
    personagensFiltrados = personagensFiltrados.filter(p =>
      p.raridade === STATE.filtros.raridade
    );
  }

  // Filtro de arena
  if (STATE.filtros.arena) {
    const arena = parseInt(STATE.filtros.arena);
    personagensFiltrados = personagensFiltrados.filter(p => {
      if (arena === 13) return p.arenaDesbloqueio >= 13;
      return p.arenaDesbloqueio === arena;
    });
  }

  // Filtro de busca textual
  if (STATE.filtros.busca) {
    const buscaNormalizada = normalizarString(STATE.filtros.busca);
    personagensFiltrados = personagensFiltrados.filter(p => {
      const nomeNormalizado = normalizarString(p.nome);
      return nomeNormalizado.includes(buscaNormalizada);
    });
  }

  renderizarPersonagens(personagensFiltrados);
}

/**
 * Configura event listeners dos filtros de personagens
 */
function configurarFiltrosPersonagens() {
  // Filtro de tipo
  const tipoSelect = document.getElementById('filter-tipo');
  if (tipoSelect) {
    tipoSelect.addEventListener('change', (e) => {
      STATE.filtros.tipoPersonagem = e.target.value;
      aplicarFiltrosPersonagens();
    });
  }

  // Filtro de elixir
  const elixirSelect = document.getElementById('filter-elixir');
  if (elixirSelect) {
    elixirSelect.addEventListener('change', (e) => {
      STATE.filtros.elixir = e.target.value;
      aplicarFiltrosPersonagens();
    });
  }

  // Filtro de raridade
  const raridadeSelect = document.getElementById('filter-raridade');
  if (raridadeSelect) {
    raridadeSelect.addEventListener('change', (e) => {
      STATE.filtros.raridade = e.target.value;
      aplicarFiltrosPersonagens();
    });
  }

  // Filtro de arena
  const arenaSelect = document.getElementById('filter-arena');
  if (arenaSelect) {
    arenaSelect.addEventListener('change', (e) => {
      STATE.filtros.arena = e.target.value;
      aplicarFiltrosPersonagens();
    });
  }

  // Busca textual
  const searchInput = document.getElementById('search-personagens');
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      STATE.filtros.busca = e.target.value;
      aplicarFiltrosPersonagens();
    });
  }
}

// ===================================
// 11. INICIALIZAÇÃO
// ===================================

/**
 * Inicializa a página Home
 */
async function inicializarHome() {
  // Buscar dados
  await Promise.all([
    buscarArenas(),
    buscarPersonagens(),
    buscarDecks()
  ]);

  // Renderizar
  renderizarArenas(STATE.arenas);
  renderizarDecks(STATE.decks);

  // Configurar filtros
  configurarFiltrosDecks();

  // Configurar eventos de modal
  const modal = document.getElementById('deck-modal');
  if (modal) {
    modal.addEventListener('click', (e) => {
      if (e.target === modal) fecharModal();
    });

    const closeBtn = modal.querySelector('.modal__close');
    if (closeBtn) {
      closeBtn.addEventListener('click', fecharModal);
    }
  }

  // ESC para fechar modal
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') fecharModal();
  });
}

/**
 * Inicializa a página de Personagens
 */
async function inicializarPersonagens() {
  // Buscar dados
  await buscarPersonagens();

  // Renderizar
  renderizarPersonagens(STATE.personagens);

  // Configurar filtros
  configurarFiltrosPersonagens();

  // Configurar eventos de modal
  const modal = document.getElementById('personagem-modal');
  if (modal) {
    modal.addEventListener('click', (e) => {
      if (e.target === modal) fecharModal();
    });

    const closeBtn = modal.querySelector('.modal__close');
    if (closeBtn) {
      closeBtn.addEventListener('click', fecharModal);
    }
  }

  // ESC para fechar modal
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') fecharModal();
  });
}

/**
 * Inicializa a aplicação baseada na página atual
 */
function inicializarApp() {
  const isPersonagensPage = window.location.pathname.includes('/personagens/');

  if (isPersonagensPage) {
    inicializarPersonagens();
  } else {
    inicializarHome();
  }
}

// ===================================
// 12. BOOTSTRAP
// ===================================

// Aguarda DOM carregar
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', inicializarApp);
} else {
  inicializarApp();
}

// Expor funções globalmente para uso inline em HTML
window.copiarDeck = copiarDeck;
window.abrirModalDeck = abrirModalDeck;
window.abrirModalPersonagem = abrirModalPersonagem;
window.fecharModal = fecharModal;
