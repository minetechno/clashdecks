/**
 * JavaScript para Página de Emotes - ClashDecks
 */

const STATE = {
  emotes: [],
  filtros: {
    categoria: 'Todas',
    busca: ''
  }
};

document.addEventListener('DOMContentLoaded', () => {
  console.log('ClashDecks - Emotes inicializado');
  inicializarEventos();
  carregarEmotes();
});

async function carregarEmotes() {
  try {
    mostrarLoading(true);

    const response = await fetch('../api/emotes.php');
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    STATE.emotes = data;

    console.log(`Emotes carregados: ${data.length}`);

    renderizarEmotes();
  } catch (error) {
    console.error('Erro ao carregar emotes:', error);
    mostrarErro();
  } finally {
    mostrarLoading(false);
  }
}

function renderizarEmotes() {
  const emotesFiltrados = filtrarEmotes();
  const grid = document.getElementById('emotes-grid');
  const emptyMessage = document.getElementById('empty-message');
  const countElement = document.getElementById('emotes-count');

  const plural = emotesFiltrados.length !== 1;
  countElement.textContent = `${emotesFiltrados.length} ${plural ? 'Emotes' : 'Emote'}`;

  grid.innerHTML = '';

  if (emotesFiltrados.length === 0) {
    grid.style.display = 'none';
    emptyMessage.style.display = 'block';
    return;
  }

  grid.style.display = 'grid';
  emptyMessage.style.display = 'none';

  emotesFiltrados.forEach(emote => {
    const card = criarCardEmote(emote);
    grid.appendChild(card);
  });
}

function criarCardEmote(emote) {
  const article = document.createElement('article');
  article.className = 'bau-card';
  article.setAttribute('role', 'listitem');

  const categoriaClass = emote.categoria.toLowerCase().replace(/\s+/g, '-');

  article.innerHTML = `
    <div class="bau-card__header">
      <img
        src="../assets/img/${emote.icone}"
        alt="${emote.nome}"
        class="bau-card__icon"
        loading="lazy"
      >
    </div>
    <div class="bau-card__body">
      <h3 class="bau-card__title">${emote.nome}</h3>
      <div class="bau-card__badges">
        <span class="raridade raridade--${emote.raridade.toLowerCase()}">${emote.raridade}</span>
        <span class="bandeira-categoria bandeira-categoria--${categoriaClass}">${emote.categoria}</span>
      </div>
      <p class="bau-card__description">${emote.descricao}</p>
      <p class="bau-card__description" style="font-size: 0.85em; margin-top: 0.5rem; font-style: italic; color: #666;">
        ${emote.animacao}
      </p>
    </div>
  `;

  return article;
}

function filtrarEmotes() {
  let filtrados = [...STATE.emotes];

  if (STATE.filtros.categoria && STATE.filtros.categoria !== 'Todas') {
    filtrados = filtrados.filter(e => e.categoria === STATE.filtros.categoria);
  }

  if (STATE.filtros.busca) {
    const termo = STATE.filtros.busca.toLowerCase();
    filtrados = filtrados.filter(e =>
      e.nome.toLowerCase().includes(termo) ||
      e.descricao.toLowerCase().includes(termo) ||
      (e.animacao && e.animacao.toLowerCase().includes(termo))
    );
  }

  return filtrados;
}

function inicializarEventos() {
  const filterButtons = document.querySelectorAll('[data-filter="categoria"]');
  filterButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      const value = e.target.dataset.value;

      filterButtons.forEach(btn => {
        btn.classList.remove('filter-btn--active');
        btn.setAttribute('aria-pressed', 'false');
      });
      e.target.classList.add('filter-btn--active');
      e.target.setAttribute('aria-pressed', 'true');

      STATE.filtros.categoria = value;
      renderizarEmotes();
    });
  });

  const searchInput = document.getElementById('filter-busca');
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      STATE.filtros.busca = e.target.value;
      renderizarEmotes();
    });
  }
}

function mostrarLoading(show) {
  const loading = document.getElementById('loading');
  if (loading) {
    loading.style.display = show ? 'block' : 'none';
  }
}

function mostrarErro() {
  const grid = document.getElementById('emotes-grid');
  if (grid) {
    grid.innerHTML = `
      <div class="error-message">
        <p>Erro ao carregar emotes. Por favor, tente novamente.</p>
      </div>
    `;
  }
}
