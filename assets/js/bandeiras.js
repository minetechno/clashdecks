/**
 * JavaScript para Página de Bandeiras - ClashDecks
 */

// ===================================
// 1. ESTADO GLOBAL
// ===================================

const STATE = {
  bandeiras: [],
  filtros: {
    categoria: 'Todas',
    busca: ''
  }
};

// ===================================
// 2. INICIALIZAÇÃO
// ===================================

document.addEventListener('DOMContentLoaded', () => {
  console.log('ClashDecks - Bandeiras inicializado');
  inicializarEventos();
  carregarBandeiras();
});

// ===================================
// 3. CARREGAMENTO DE DADOS
// ===================================

async function carregarBandeiras() {
  try {
    mostrarLoading(true);

    const response = await fetch('../api/bandeiras.php');
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    STATE.bandeiras = data;

    console.log(`Bandeiras carregadas: ${data.length}`);

    renderizarBandeiras();
  } catch (error) {
    console.error('Erro ao carregar bandeiras:', error);
    mostrarErro();
  } finally {
    mostrarLoading(false);
  }
}

// ===================================
// 4. RENDERIZAÇÃO
// ===================================

function renderizarBandeiras() {
  const bandeirasFiltradas = filtrarBandeiras();
  const grid = document.getElementById('bandeiras-grid');
  const emptyMessage = document.getElementById('empty-message');
  const countElement = document.getElementById('bandeiras-count');

  // Atualizar contador
  const plural = bandeirasFiltradas.length !== 1;
  countElement.textContent = `${bandeirasFiltradas.length} ${plural ? 'Bandeiras' : 'Bandeira'}`;

  // Limpar grid
  grid.innerHTML = '';

  // Verificar se há bandeiras
  if (bandeirasFiltradas.length === 0) {
    grid.style.display = 'none';
    emptyMessage.style.display = 'block';
    return;
  }

  grid.style.display = 'grid';
  emptyMessage.style.display = 'none';

  // Renderizar cada bandeira
  bandeirasFiltradas.forEach(bandeira => {
    const card = criarCardBandeira(bandeira);
    grid.appendChild(card);
  });
}

function criarCardBandeira(bandeira) {
  const article = document.createElement('article');
  article.className = 'bau-card';
  article.setAttribute('role', 'listitem');

  article.innerHTML = `
    <div class="bau-card__header">
      <img
        src="../assets/img/${bandeira.icone}"
        alt="${bandeira.nome}"
        class="bau-card__icon"
        loading="lazy"
      >
    </div>
    <div class="bau-card__body">
      <h3 class="bau-card__title">${bandeira.nome}</h3>
      <div class="bau-card__badges">
        <span class="raridade raridade--${bandeira.raridade.toLowerCase()}">${bandeira.raridade}</span>
        <span class="bandeira-categoria bandeira-categoria--${bandeira.categoria.toLowerCase().replace(/\s+/g, '-')}">${bandeira.categoria}</span>
      </div>
      <p class="bau-card__description">${bandeira.descricao}</p>
    </div>
    <div class="bau-card__footer">
      <button
        type="button"
        class="btn btn--primary"
        onclick='abrirModalBandeira(${JSON.stringify(bandeira).replace(/'/g, "&apos;")})'
        aria-label="Ver detalhes de ${bandeira.nome}"
      >
        Ver Detalhes
      </button>
    </div>
  `;

  return article;
}

// ===================================
// 5. FILTROS
// ===================================

function filtrarBandeiras() {
  let filtradas = [...STATE.bandeiras];

  // Filtro de categoria
  if (STATE.filtros.categoria && STATE.filtros.categoria !== 'Todas') {
    filtradas = filtradas.filter(b => b.categoria === STATE.filtros.categoria);
  }

  // Filtro de busca
  if (STATE.filtros.busca) {
    const termo = STATE.filtros.busca.toLowerCase();
    filtradas = filtradas.filter(b =>
      b.nome.toLowerCase().includes(termo) ||
      b.descricao.toLowerCase().includes(termo) ||
      (b.requisito && b.requisito.toLowerCase().includes(termo))
    );
  }

  return filtradas;
}

function inicializarEventos() {
  // Filtros de categoria
  const filterButtons = document.querySelectorAll('[data-filter="categoria"]');
  filterButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      const value = e.target.dataset.value;

      // Atualizar estado dos botões
      filterButtons.forEach(btn => {
        btn.classList.remove('filter-btn--active');
        btn.setAttribute('aria-pressed', 'false');
      });
      e.target.classList.add('filter-btn--active');
      e.target.setAttribute('aria-pressed', 'true');

      // Atualizar filtro e renderizar
      STATE.filtros.categoria = value;
      renderizarBandeiras();
    });
  });

  // Filtro de busca
  const searchInput = document.getElementById('filter-busca');
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      STATE.filtros.busca = e.target.value;
      renderizarBandeiras();
    });
  }

  // Modal - Fechar ao clicar fora
  const modalOverlay = document.getElementById('modal-overlay');
  if (modalOverlay) {
    modalOverlay.addEventListener('click', (e) => {
      if (e.target === modalOverlay) {
        fecharModal();
      }
    });
  }

  // Modal - Fechar com ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      fecharModal();
    }
  });
}

// ===================================
// 6. MODAL
// ===================================

function abrirModalBandeira(bandeira) {
  const modal = document.getElementById('modal-overlay');

  // Preencher informações
  document.getElementById('modal-title').textContent = bandeira.nome;
  document.getElementById('modal-icon').src = `../assets/img/${bandeira.icone}`;
  document.getElementById('modal-icon').alt = bandeira.nome;
  document.getElementById('modal-categoria').textContent = bandeira.categoria;
  document.getElementById('modal-categoria').className = `modal__badge bandeira-categoria bandeira-categoria--${bandeira.categoria.toLowerCase().replace(/\s+/g, '-')}`;
  document.getElementById('modal-descricao').textContent = bandeira.descricao;
  document.getElementById('modal-requisito').textContent = bandeira.requisito || 'Informação não disponível';
  document.getElementById('modal-raridade').textContent = bandeira.raridade;
  document.getElementById('modal-raridade').className = `raridade raridade--${bandeira.raridade.toLowerCase()}`;

  // História (se existir)
  const historiaSection = document.getElementById('modal-historia');
  const historiaText = document.getElementById('modal-historia-text');
  if (bandeira.historia) {
    historiaText.textContent = bandeira.historia;
    historiaSection.style.display = 'block';
  } else {
    historiaSection.style.display = 'none';
  }

  // Mostrar modal
  modal.style.display = 'flex';
  document.body.style.overflow = 'hidden';

  // Focar no botão de fechar
  const closeButton = modal.querySelector('.modal__close');
  if (closeButton) {
    closeButton.focus();
  }
}

function fecharModal() {
  const modal = document.getElementById('modal-overlay');
  modal.style.display = 'none';
  document.body.style.overflow = 'auto';
}

// ===================================
// 7. UTILITÁRIOS
// ===================================

function mostrarLoading(show) {
  const loading = document.getElementById('loading');
  if (loading) {
    loading.style.display = show ? 'block' : 'none';
  }
}

function mostrarErro() {
  const grid = document.getElementById('bandeiras-grid');
  if (grid) {
    grid.innerHTML = `
      <div class="error-message">
        <p>Erro ao carregar bandeiras. Por favor, tente novamente.</p>
      </div>
    `;
  }
}

// Exportar funções globais para uso inline
window.abrirModalBandeira = abrirModalBandeira;
window.fecharModal = fecharModal;
