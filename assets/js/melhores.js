/**
 * Script para a página de Melhores Personagens
 */

// Carregar os melhores personagens ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    carregarMelhoresPersonagens();
});

/**
 * Carrega os melhores personagens de todas as categorias
 */
async function carregarMelhoresPersonagens() {
    try {
        const response = await fetch('../api/melhores.php');

        if (!response.ok) {
            throw new Error('Erro ao carregar melhores personagens');
        }

        const result = await response.json();

        if (result.success) {
            renderizarPersonagens('melhores-ofensivos', result.data.ofensivos);
            renderizarPersonagens('melhores-defensivos', result.data.defensivos);
            renderizarPersonagens('melhores-versateis', result.data.versateis);
        } else {
            mostrarErro('Erro ao carregar melhores personagens');
        }
    } catch (error) {
        console.error('Erro:', error);
        mostrarErro('Erro ao conectar com o servidor');
    }
}

/**
 * Renderiza os personagens em um container específico
 */
function renderizarPersonagens(containerId, personagens) {
    const container = document.getElementById(containerId);

    if (!container) {
        console.error(`Container ${containerId} não encontrado`);
        return;
    }

    if (!personagens || personagens.length === 0) {
        container.innerHTML = '<p class="empty-message">Nenhum personagem encontrado</p>';
        return;
    }

    const html = personagens.map(personagem => criarCardPersonagem(personagem)).join('');
    container.innerHTML = html;
}

/**
 * Cria o HTML de um card de personagem
 */
function criarCardPersonagem(personagem) {
    const raridadeClass = `raridade-${personagem.raridade.toLowerCase()}`;

    return `
        <div class="personagem-card ${raridadeClass}">
            <div class="personagem-card__header">
                <img src="../assets/img/${personagem.icone}"
                     alt="${personagem.nome}"
                     class="personagem-card__image"
                     onerror="this.src='../assets/img/logo.svg'">
            </div>
            <div class="personagem-card__body">
                <h3 class="personagem-card__title">${personagem.nome}</h3>
                <div class="personagem-card__badges">
                    <span class="badge badge--tipo">${personagem.tipo}</span>
                    <span class="badge badge--raridade ${raridadeClass}">${personagem.raridade}</span>
                    <span class="badge badge--elixir">
                        <span class="elixir-icon">💧</span>
                        ${personagem.elixir}
                    </span>
                </div>
                <p class="personagem-card__description">${personagem.descricao}</p>
                <div class="personagem-card__info">
                    <span class="info-item">
                        <strong>Arena:</strong> ${personagem.arena_desbloqueio}
                    </span>
                </div>
            </div>
        </div>
    `;
}

/**
 * Mostra mensagem de erro
 */
function mostrarErro(mensagem) {
    const containers = ['melhores-ofensivos', 'melhores-defensivos', 'melhores-versateis'];

    containers.forEach(containerId => {
        const container = document.getElementById(containerId);
        if (container) {
            container.innerHTML = `<p class="error-message">${mensagem}</p>`;
        }
    });
}
