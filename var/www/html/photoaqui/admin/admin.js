// admin.js - Script de inicialização do painel administrativo

// Função para mudar a seção exibida no painel
function changeSection(sectionId) {
    // Ocultar todas as seções
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    
    // Remover classe 'active' de todos os links do menu
    document.querySelectorAll('.sidebar-menu a').forEach(link => {
        link.classList.remove('active');
    });
    
    // Mostrar a seção selecionada
    const selectedSection = document.getElementById(sectionId + '-section');
    if (selectedSection) {
        selectedSection.classList.add('active');
    }
    
    // Adicionar classe 'active' ao link do menu correspondente
    const menuLink = document.querySelector(`.sidebar-menu a[onclick*="changeSection('${sectionId}')"]`);
    if (menuLink) {
        menuLink.classList.add('active');
    }
    
    // Inicializar a seção específica
    if (sectionId === 'clientes') {
        inicializarPaginaClientes();
    } else if (sectionId === 'produtos') {
        // Inicializar a página de produtos quando implementada
        // inicializarPaginaProdutos();
    } else if (sectionId === 'pedidos') {
        // Inicializar a página de pedidos quando implementada
        // inicializarPaginaPedidos();
    }
    
    // Corrigir botões deslocados, se necessário
    setTimeout(corrigirBotoesDeslocados, 100);
}

// Função para alternar a visibilidade da barra lateral em dispositivos móveis
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('active');
}

// Função para mostrar notificações toast (global)
function mostrarNotificacao(tipo, titulo, mensagem) {
    let containerToast = document.querySelector('.toast-container');
    if (!containerToast) {
        containerToast = document.createElement('div');
        containerToast.className = 'toast-container';
        document.body.appendChild(containerToast);
    }
    
    const toast = document.createElement('div');
    toast.className = `toast toast-${tipo}`;
    toast.innerHTML = `
        <div class="toast-icon">
            <i class="fas fa-${tipo === 'success' ? 'check-circle' : tipo === 'error' ? 'exclamation-circle' : tipo === 'warning' ? 'exclamation-triangle' : 'info-circle'}"></i>
        </div>
        <div class="toast-content">
            <div class="toast-title">${titulo}</div>
            <div class="toast-message">${mensagem}</div>
        </div>
        <button class="toast-close" onclick="this.parentElement.remove();">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    containerToast.appendChild(toast);
    
    // Remover automaticamente após 5 segundos
    setTimeout(() => {
        toast.remove();
    }, 5000);
}

// Função para simular carregamento de dados
async function mockAPICall(endpoint, data = {}, delay = 500) {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log(`Mock API call to ${endpoint}:`, data);
            resolve({
                success: true,
                data: data
            });
        }, delay);
    });
}

// Inicialização do painel quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', function() {
    // Adicionar tratadores de eventos para o botão do menu móvel
    const mobileToggle = document.querySelector('.mobile-toggle');
    if (mobileToggle) {
        mobileToggle.addEventListener('click', toggleSidebar);
    }
    
    // Iniciar na seção dashboard por padrão
    changeSection('dashboard');
    
    // Corrigir botões deslocados na inicialização
    corrigirBotoesDeslocados();
    
    // Configurar modais globais
    document.querySelectorAll('.modal-close').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.modal-overlay').classList.remove('active');
        });
    });
    
    // Fechar modais quando clicar fora deles
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
            }
        });
    });
    
    console.log('Painel administrativo inicializado com sucesso!');
});

// Função para verificar e corrigir botões deslocados
function corrigirBotoesDeslocados() {
    console.log("Verificando e corrigindo botões deslocados...");
    
    // Obter a seção ativa atual
    const secaoAtiva = document.querySelector('.content-section.active');
    if (!secaoAtiva) return;
    
    // Botões Cancelar e Adicionar Produto na seção de clientes
    if (secaoAtiva.id === 'clientes-section') {
        const botoesDeslocados = secaoAtiva.querySelectorAll('button');
        
        botoesDeslocados.forEach(botao => {
            const textoBotao = botao.textContent.trim();
            
            // Se encontrarmos botões que não deveriam estar aqui
            if ((textoBotao === 'Cancelar' || textoBotao === 'Adicionar Produto') && 
                !botao.closest('.modal') && !botao.closest('.card-header')) {
                
                console.log(`Removendo botão deslocado: ${textoBotao}`);
                botao.remove();
            }
        });
    }
    
    // Se estamos na seção de produtos, verifique se há botões que precisam ser reposicionados
    if (secaoAtiva.id === 'produtos-section') {
        const cabecalhoProdutos = secaoAtiva.querySelector('.page-header');
        if (cabecalhoProdutos) {
            // Verifique se já existe um botão "Adicionar Produto"
            const botaoExistente = cabecalhoProdutos.querySelector('button:contains("Adicionar Produto")');
            if (!botaoExistente) {
                // Procure pelo botão em outro lugar
                const botaoDeslocado = document.querySelector('button:contains("Adicionar Produto")');
                if (botaoDeslocado) {
                    // Remova-o do local atual e adicione-o ao cabeçalho
                    botaoDeslocado.remove();
                    cabecalhoProdutos.appendChild(botaoDeslocado);
                } else {
                    // Crie um novo botão se não encontrar um existente
                    const novoBotao = document.createElement('button');
                    novoBotao.className = 'btn btn-primary';
                    novoBotao.innerHTML = '<i class="fas fa-plus btn-icon"></i> Adicionar Produto';
                    novoBotao.onclick = function() {
                        // Função para abrir modal de novo produto (a ser implementada)
                        if (typeof abrirModalNovoProduto === 'function') {
                            abrirModalNovoProduto();
                        } else {
                            console.log('Função abrirModalNovoProduto não implementada');
                        }
                    };
                    cabecalhoProdutos.appendChild(novoBotao);
                }
            }
        }
    }
}

// Exportar funções para uso global
window.changeSection = changeSection;
window.toggleSidebar = toggleSidebar;
window.mostrarNotificacao = mostrarNotificacao;
window.corrigirBotoesDeslocados = corrigirBotoesDeslocados;