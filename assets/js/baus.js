/*
 * ClashDecks - JavaScript para Baús
 */

// ===================================
// 1. CONFIGURAÇÃO E ESTADO GLOBAL
// ===================================
const APP_CONFIG = {
  API_BASE: '../api',
  IMG_BASE: '../assets/img'
};

const STATE = {
  baus: [],
  filtros: {
    raridade: 'Todos',
    busca: ''
  }
};

// ===================================
// 2. UTILITÁRIOS
// ===================================

/**
 * Normaliza string para busca
 */
function normalizarString(str) {
  return str
    .normalize('NFD')
    .replace(/[\u0300-\u036f]/g, '')
    .toLowerCase();
}

/**
 * Busca baú por ID
 */
function buscarBauPorId(id) {
  return STATE.baus.find(b => b.id === id);
}

// ===================================
// 3. TOASTS
// ===================================

function mostrarToast(mensagem, tipo = 'success') {
  const container = document.getElementById('toast-container');
  if (!container) return;

  const toast = document.createElement('div');
  toast.className = `toast toast--${tipo}`;
  toast.innerHTML = `<div class="toast__message">${mensagem}</div>`;

  container.appendChild(toast);

  setTimeout(() => {
    toast.style.opacity = '0';
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}

// ===================================
// 4. MODAL
// ===================================

function abrirModalBau(bau) {
  const modal = document.getElementById('bau-modal');
  const content = document.getElementById('modal-content');
  const title = document.getElementById('modal-title');

  if (!modal || !content || !title) return;

  title.textContent = bau.nome;

  // Monta HTML do conteúdo
  let html = `
    <div class="modal__section text-center">
      <img
        src="${APP_CONFIG.IMG_BASE}/${bau.icone}"
        alt="${bau.nome}"
        class="modal__bau-icon"
        style="width: 120px; height: 120px;"
      >
    </div>

    <div class="modal__section">
      <h4 class="modal__section-title">Informações</h4>
      <p><strong>Raridade:</strong> <span class="raridade raridade--${bau.raridade.toLowerCase()}">${bau.raridade}</span></p>
      ${bau.ciclo ? `<p><strong>Ciclo:</strong> ${bau.ciclo}</p>` : ''}
      <p><strong>Total de Cartas:</strong> ${bau.cartasTotal}</p>
      ${bau.ouroMin > 0 ? `<p><strong>Ouro:</strong> ${bau.ouroMin} - ${bau.ouroMax}</p>` : ''}
      <p class="mt-md">${bau.descricao}</p>
    </div>

    <div class="modal__section">
      <h4 class="modal__section-title">Recompensas (Porcentagens)</h4>
  `;

  // Cartas
  if (bau.recompensas.cartas) {
    html += `<div class="recompensas-group"><h5>Cartas:</h5><ul class="recompensas-list">`;
    for (const [tipo, porcentagem] of Object.entries(bau.recompensas.cartas)) {
      html += `<li><strong>${tipo}:</strong> ${porcentagem}</li>`;
    }
    html += `</ul></div>`;
  }

  // Ouro
  if (bau.recompensas.ouro) {
    html += `<div class="recompensas-group"><h5>Ouro:</h5><p>${bau.recompensas.ouro}</p></div>`;
  }

  // Gemas
  if (bau.recompensas.gemas) {
    html += `<div class="recompensas-group"><h5>Gemas:</h5><p>${bau.recompensas.gemas}</p></div>`;
  }

  html += `</div>`;

  content.innerHTML = html;

  // Exibir modal
  modal.classList.add('modal-overlay--active');
  modal.setAttribute('aria-hidden', 'false');
  document.body.style.overflow = 'hidden';
}

function fecharModal() {
  const modal = document.getElementById('bau-modal');
  if (!modal) return;

  modal.classList.remove('modal-overlay--active');
  modal.setAttribute('aria-hidden', 'true');
  document.body.style.overflow = '';
}

// ===================================
// 5. RENDERIZAÇÃO
// ===================================

function renderizarBaus() {
  const grid = document.getElementById('baus-grid');
  if (!grid) return;

  let bausFiltrados = STATE.baus;

  // Filtrar por raridade
  if (STATE.filtros.raridade !== 'Todos') {
    bausFiltrados = bausFiltrados.filter(b => b.raridade === STATE.filtros.raridade);
  }

  // Filtrar por busca
  if (STATE.filtros.busca) {
    const buscaNormalizada = normalizarString(STATE.filtros.busca);
    bausFiltrados = bausFiltrados.filter(b =>
      normalizarString(b.nome).includes(buscaNormalizada)
    );
  }

  // Verificar se há resultados
  if (bausFiltrados.length === 0) {
    grid.innerHTML = '<p class="empty-state">Nenhum baú encontrado com os filtros aplicados.</p>';
    return;
  }

  // Renderizar cards de baús
  grid.innerHTML = bausFiltrados.map(bau => `
    <article class="bau-card" role="listitem">
      <div class="bau-card__image">
        <img
          src="${APP_CONFIG.IMG_BASE}/${bau.icone}"
          alt="${bau.nome}"
          class="bau-card__icon"
        >
      </div>
      <div class="bau-card__content">
        <h3 class="bau-card__title">${bau.nome}</h3>
        <p class="bau-card__raridade">
          <span class="raridade raridade--${bau.raridade.toLowerCase()}">${bau.raridade}</span>
        </p>
        <p class="bau-card__info">
          ${bau.cartasTotal} cartas
          ${bau.ouroMin > 0 ? ` • ${bau.ouroMin}-${bau.ouroMax} <img src="${APP_CONFIG.IMG_BASE}/ui-gold.svg" alt="ouro" width="16" height="16" style="vertical-align: middle;" onerror="this.style.display='none'">` : ''}
        </p>
        <button
          type="button"
          class="btn btn--primary mt-sm"
          onclick="abrirModalBau(buscarBauPorId('${bau.id}'))"
        >
          Ver Detalhes
        </button>
      </div>
    </article>
  `).join('');
}

// ===================================
// 6. CARREGAMENTO DE DADOS
// ===================================

async function carregarBaus() {
  try {
    const response = await fetch(`${APP_CONFIG.API_BASE}/baus.php`);

    if (!response.ok) {
      throw new Error(`Erro HTTP: ${response.status}`);
    }

    const data = await response.json();
    STATE.baus = data;
    renderizarBaus();
  } catch (error) {
    console.error('Erro ao carregar baús:', error);
    const grid = document.getElementById('baus-grid');
    if (grid) {
      grid.innerHTML = '<p class="error-state">Erro ao carregar baús. Tente novamente mais tarde.</p>';
    }
  }
}

// ===================================
// 7. EVENT LISTENERS
// ===================================

function inicializarEventListeners() {
  // Filtros de raridade
  document.querySelectorAll('[data-filter="raridade"]').forEach(btn => {
    btn.addEventListener('click', () => {
      // Atualizar estado dos botões
      document.querySelectorAll('[data-filter="raridade"]').forEach(b => {
        b.classList.remove('filter-btn--active');
        b.setAttribute('aria-pressed', 'false');
      });

      btn.classList.add('filter-btn--active');
      btn.setAttribute('aria-pressed', 'true');

      // Atualizar filtro
      STATE.filtros.raridade = btn.dataset.value;
      renderizarBaus();
    });
  });

  // Busca
  const searchInput = document.getElementById('search-baus');
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      STATE.filtros.busca = e.target.value;
      renderizarBaus();
    });
  }

  // Fechar modal
  const modalClose = document.querySelector('.modal__close');
  if (modalClose) {
    modalClose.addEventListener('click', fecharModal);
  }

  const modalOverlay = document.getElementById('bau-modal');
  if (modalOverlay) {
    modalOverlay.addEventListener('click', (e) => {
      if (e.target === modalOverlay) {
        fecharModal();
      }
    });
  }

  // ESC para fechar modal
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      fecharModal();
    }
  });
}

// ===================================
// 8. INICIALIZAÇÃO
// ===================================

document.addEventListener('DOMContentLoaded', () => {
  inicializarEventListeners();
  carregarBaus();
});
