// cliente-dados.js - Funções para gerenciamento de dados de clientes (versão simulada)

// Dados de exemplo para simulação
const clientesSimulados = [
    {
        id: '001',
        nome: 'Maria Silva',
        email: 'maria@exemplo.com',
        telefone: '(11) 98765-4321',
        created_at: '2025-02-28',
        endereco: 'Av. Paulista, 1578',
        cidade: 'São Paulo',
        estado: 'SP',
        cep: '01310-200',
        ativo: true
    },
    {
        id: '002',
        nome: 'João Santos',
        email: 'joao@exemplo.com',
        telefone: '(11) 91234-5678',
        created_at: '2025-02-26',
        endereco: 'Rua Augusta, 500',
        cidade: 'São Paulo',
        estado: 'SP',
        cep: '01304-000',
        ativo: true
    },
    {
        id: '003',
        nome: 'Ana Oliveira',
        email: 'ana@exemplo.com',
        telefone: '(11) 99876-5432',
        created_at: '2025-02-20',
        endereco: 'Rua Oscar Freire, 123',
        cidade: 'São Paulo',
        estado: 'SP',
        cep: '01426-001',
        ativo: false
    },
    {
        id: '004',
        nome: 'Carlos Mendes',
        email: 'carlos@exemplo.com',
        telefone: '(11) 97777-8888',
        created_at: '2025-02-15',
        endereco: 'Alameda Santos, 45',
        cidade: 'São Paulo',
        estado: 'SP',
        cep: '01419-000',
        ativo: true
    },
    {
        id: '005',
        nome: 'Beatriz Ferreira',
        email: 'beatriz@exemplo.com',
        telefone: '(11) 96666-7777',
        created_at: '2025-02-10',
        endereco: 'Rua Haddock Lobo, 595',
        cidade: 'São Paulo',
        estado: 'SP',
        cep: '01414-001',
        ativo: true
    }
];

// IDs para novos clientes
let proximoId = 6;

// Buscar clientes do banco de dados
async function buscarClientes(filtros = {}) {
    try {
        // Usar a nova API
        const response = await fetch('/photoaqui/admin/api/clientes/listar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(filtros),
        });
        
        if (!response.ok) {
            throw new Error('Falha ao buscar clientes');
        }
        
        const dados = await response.json();
        return dados;
    } catch (erro) {
        console.error('Erro ao buscar clientes:', erro);
        mostrarNotificacao('error', 'Erro', 'Não foi possível carregar os clientes.');
        return {
            data: [],
            total: 0,
            pagina_atual: 1,
            ultima_pagina: 1
        };
    }
}

// Atualizar as outras funções para usar os endpoints corretos
async function verCliente(id) {
    try {
        const response = await fetch(`/photoaqui/admin/api/clientes/obter.php?id=${id}`);
        if (!response.ok) throw new Error('Falha ao buscar detalhes do cliente');
        
        const cliente = await response.json();
        abrirModalVerCliente(cliente);
    } catch (erro) {
        console.error('Erro ao visualizar cliente:', erro);
        mostrarNotificacao('error', 'Erro', 'Não foi possível visualizar os detalhes do cliente.');
    }
}        
        if (filtros.data) {
            const hoje = new Date();
            const umDia = 24 * 60 * 60 * 1000; // milissegundos em um dia
            
            switch(filtros.data) {
                case 'hoje':
                    resultado = resultado.filter(cliente => {
                        const dataCliente = new Date(cliente.created_at);
                        return dataCliente.toDateString() === hoje.toDateString();
                    });
                    break;
                case 'semana':
                    resultado = resultado.filter(cliente => {
                        const dataCliente = new Date(cliente.created_at);
                        const diff = hoje - dataCliente;
                        return diff <= 7 * umDia;
                    });
                    break;
                case 'mes':
                    resultado = resultado.filter(cliente => {
                        const dataCliente = new Date(cliente.created_at);
                        return dataCliente.getMonth() === hoje.getMonth() && 
                               dataCliente.getFullYear() === hoje.getFullYear();
                    });
                    break;
            }
        }
        
        // Simular paginação
        const itensPorPagina = 10;
        const pagina = filtros.pagina || 1;
        const inicio = (pagina - 1) * itensPorPagina;
        const fim = inicio + itensPorPagina;
        const itensPaginados = resultado.slice(inicio, fim);
        
        // Simular delay da rede
        await new Promise(resolve => setTimeout(resolve, 300));
        
        // Retornar no formato que o frontend espera
        return {
            data: itensPaginados,
            total: resultado.length,
            pagina_atual: pagina,
            ultima_pagina: Math.ceil(resultado.length / itensPorPagina)
        };
    } catch (erro) {
        console.error('Erro ao buscar clientes:', erro);
        mostrarNotificacao('error', 'Erro', 'Não foi possível carregar os clientes.');
        return {
            data: [],
            total: 0,
            pagina_atual: 1,
            ultima_pagina: 1
        };
    }
}

// Renderizar clientes na tabela
function renderizarTabelaClientes(clientes) {
    const corpoTabela = document.querySelector('#tabela-clientes tbody');
    if (!corpoTabela) return;
    
    corpoTabela.innerHTML = '';
    
    if (!clientes.data || clientes.data.length === 0) {
        const linhavazia = document.createElement('tr');
        linhavazia.innerHTML = `<td colspan="7" class="text-center">Nenhum cliente encontrado</td>`;
        corpoTabela.appendChild(linhavazia);
        return;
    }
    
    clientes.data.forEach(cliente => {
        const linha = document.createElement('tr');
        
        // Formatar data
        const data = new Date(cliente.created_at);
        const dataFormatada = data.toLocaleDateString('pt-BR');
        
        linha.innerHTML = `
            <td>${cliente.id}</td>
            <td>${cliente.nome}</td>
            <td>${cliente.email}</td>
            <td>${cliente.telefone || '-'}</td>
            <td>${dataFormatada}</td>
            <td>
                <span class="status-badge status-${cliente.ativo ? 'active' : 'inactive'}">
                    ${cliente.ativo ? 'Ativo' : 'Inativo'}
                </span>
            </td>
            <td class="action-buttons">
                <button class="action-btn view-btn" title="Visualizar" onclick="verCliente('${cliente.id}')">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="action-btn edit-btn" title="Editar" onclick="editarCliente('${cliente.id}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="action-btn delete-btn" title="Excluir" onclick="excluirCliente('${cliente.id}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        
        corpoTabela.appendChild(linha);
    });
}

// Aplicar filtros e recarregar clientes
function aplicarFiltrosCliente() {
    const filtroStatus = document.getElementById('filtro-status').value;
    const filtroData = document.getElementById('filtro-data').value;
    const termoBusca = document.getElementById('busca-cliente').value;
    
    const filtros = {
        status: filtroStatus !== 'todos' ? filtroStatus : null,
        data: filtroData !== 'todos' ? filtroData : null,
        busca: termoBusca || null
    };
    
    carregarClientes(filtros);
}

// Inicializar página de clientes
async function inicializarPaginaClientes() {
    console.log('Inicializando página de clientes...');
    
    // Configurar event listeners para filtros
    document.getElementById('filtro-status')?.addEventListener('change', aplicarFiltrosCliente);
    document.getElementById('filtro-data')?.addEventListener('change', aplicarFiltrosCliente);
    document.getElementById('form-busca-cliente')?.addEventListener('submit', (e) => {
        e.preventDefault();
        aplicarFiltrosCliente();
    });
    
    // Carregamento inicial
    await carregarClientes();
}

// Carregar clientes com filtros opcionais
async function carregarClientes(filtros = {}) {
    console.log('Carregando clientes com filtros:', filtros);
    
    // Mostrar indicador de carregamento se necessário
    // document.getElementById('loading-indicator').style.display = 'block';
    
    const clientes = await buscarClientes(filtros);
    renderizarTabelaClientes(clientes);
    atualizarPaginacao(clientes.total, clientes.pagina_atual, clientes.ultima_pagina);
    
    // Ocultar indicador de carregamento
    // document.getElementById('loading-indicator').style.display = 'none';
}

// Funções CRUD para clientes (simuladas)
async function verCliente(id) {
    console.log('Visualizando cliente ID:', id);
    
    // Encontrar cliente pelo ID
    const cliente = clientesSimulados.find(c => c.id === id);
    
    if (cliente) {
        // Abrir modal com detalhes do cliente
        abrirModalVerCliente(cliente);
    } else {
        mostrarNotificacao('error', 'Erro', 'Cliente não encontrado.');
    }
}

async function editarCliente(id) {
    console.log('Editando cliente ID:', id);
    
    // Encontrar cliente pelo ID
    const cliente = clientesSimulados.find(c => c.id === id);
    
    if (cliente) {
        // Abrir modal de edição com os dados do cliente
        abrirModalEditarCliente(cliente);
    } else {
        mostrarNotificacao('error', 'Erro', 'Cliente não encontrado.');
    }
}

async function excluirCliente(id) {
    if (confirm('Tem certeza que deseja excluir este cliente? Esta ação não pode ser desfeita.')) {
        console.log('Excluindo cliente ID:', id);
        
        // Simulando exclusão
        const index = clientesSimulados.findIndex(c => c.id === id);
        
        if (index !== -1) {
            clientesSimulados.splice(index, 1);
            mostrarNotificacao('success', 'Sucesso', 'Cliente excluído com sucesso!');
            carregarClientes(); // Recarregar a tabela
        } else {
            mostrarNotificacao('error', 'Erro', 'Cliente não encontrado.');
        }
    }
}

// Criar novo cliente (simulado)
async function criarCliente(dadosCliente) {
    console.log('Criando novo cliente:', dadosCliente);
    
    try {
        // Simular delay da rede
        await new Promise(resolve => setTimeout(resolve, 500));
        
        // Criar novo cliente com ID sequencial
        const novoCliente = {
            id: String(proximoId++).padStart(3, '0'),
            nome: dadosCliente.nome,
            email: dadosCliente.email,
            telefone: dadosCliente.telefone,
            endereco: dadosCliente.endereco,
            cidade: dadosCliente.cidade,
            estado: dadosCliente.estado,
            cep: dadosCliente.cep,
            ativo: dadosCliente.ativo,
            created_at: new Date().toISOString().split('T')[0]
        };
        
        // Adicionar à lista
        clientesSimulados.push(novoCliente);
        
        mostrarNotificacao('success', 'Sucesso', 'Cliente criado com sucesso!');
        return novoCliente;
    } catch (erro) {
        console.error('Erro ao criar cliente:', erro);
        mostrarNotificacao('error', 'Erro', 'Não foi possível criar o cliente.');
        return null;
    }
}

// Salvar alterações do cliente (simulado)
async function salvarAlteracoesCliente() {
    const clienteId = document.getElementById('editar-cliente-id').value;
    
    const dadosCliente = {
        nome: document.getElementById('editar-cliente-nome').value,
        email: document.getElementById('editar-cliente-email').value,
        telefone: document.getElementById('editar-cliente-telefone').value,
        endereco: document.getElementById('editar-cliente-endereco').value,
        cidade: document.getElementById('editar-cliente-cidade').value,
        estado: document.getElementById('editar-cliente-estado').value,
        cep: document.getElementById('editar-cliente-cep').value,
        ativo: document.getElementById('editar-cliente-status').checked
    };
    
    console.log('Salvando alterações do cliente ID:', clienteId, dadosCliente);
    
    try {
        // Simular delay da rede
        await new Promise(resolve => setTimeout(resolve, 500));
        
        // Encontrar e atualizar cliente
        const cliente = clientesSimulados.find(c => c.id === clienteId);
        
        if (cliente) {
            // Atualizar dados
            Object.assign(cliente, dadosCliente);
            
            mostrarNotificacao('success', 'Sucesso', 'Cliente atualizado com sucesso!');
            document.getElementById('modal-editar-cliente').classList.remove('active');
            carregarClientes(); // Recarregar a tabela
        } else {
            throw new Error('Cliente não encontrado');
        }
    } catch (erro) {
        console.error('Erro ao atualizar cliente:', erro);
        mostrarNotificacao('error', 'Erro', 'Não foi possível atualizar o cliente.');
    }
}

// Atualizar controles de paginação
function atualizarPaginacao(total, paginaAtual, ultimaPagina) {
    const paginacaoEl = document.querySelector('.pagination');
    if (!paginacaoEl) return;
    
    let paginacaoHTML = '';
    
    // Botão anterior
    paginacaoHTML += `
        <a href="#" class="pagination-item ${paginaAtual === 1 ? 'disabled' : ''}" 
           onclick="${paginaAtual > 1 ? 'irParaPagina(' + (paginaAtual - 1) + ')' : 'return false'}">
            <i class="fas fa-chevron-left"></i>
        </a>
    `;
    
    // Números de página
    for (let i = 1; i <= ultimaPagina; i++) {
        if (
            i === 1 || 
            i === ultimaPagina || 
            (i >= paginaAtual - 1 && i <= paginaAtual + 1)
        ) {
            paginacaoHTML += `
                <a href="#" class="pagination-item ${i === paginaAtual ? 'active' : ''}" 
                   onclick="irParaPagina(${i})">
                    ${i}
                </a>
            `;
        } else if (
            i === paginaAtual - 2 || 
            i === paginaAtual + 2
        ) {
            paginacaoHTML += `<span class="pagination-item">...</span>`;
        }
    }
    
    // Botão próximo
    paginacaoHTML += `
        <a href="#" class="pagination-item ${paginaAtual === ultimaPagina ? 'disabled' : ''}" 
           onclick="${paginaAtual < ultimaPagina ? 'irParaPagina(' + (paginaAtual + 1) + ')' : 'return false'}">
            <i class="fas fa-chevron-right"></i>
        </a>
    `;
    
    paginacaoEl.innerHTML = paginacaoHTML;
}

// Ir para uma página específica
function irParaPagina(pagina) {
    const filtros = {
        status: document.getElementById('filtro-status').value,
        data: document.getElementById('filtro-data').value,
        busca: document.getElementById('busca-cliente').value,
        pagina: pagina
    };
    
    carregarClientes(filtros);
    return false; // Evitar comportamento padrão do link
}

// Modais de cliente
function abrirModalVerCliente(cliente) {
    // Preencher o modal com os dados do cliente
    document.getElementById('ver-cliente-nome').textContent = cliente.nome;
    document.getElementById('ver-cliente-email').textContent = cliente.email;
    document.getElementById('ver-cliente-telefone').textContent = cliente.telefone || '-';
    document.getElementById('ver-cliente-endereco').textContent = cliente.endereco || '-';
    document.getElementById('ver-cliente-cidade').textContent = cliente.cidade || '-';
    document.getElementById('ver-cliente-estado').textContent = cliente.estado || '-';
    document.getElementById('ver-cliente-cep').textContent = cliente.cep || '-';
    document.getElementById('ver-cliente-status').textContent = cliente.ativo ? 'Ativo' : 'Inativo';
    
    // Formatar data
    const data = new Date(cliente.created_at);
    document.getElementById('ver-cliente-criado').textContent = data.toLocaleDateString('pt-BR');
    
    // Mostrar modal
    document.getElementById('modal-ver-cliente').classList.add('active');
}

function abrirModalEditarCliente(cliente) {
    // Preencher formulário com dados do cliente
    document.getElementById('editar-cliente-id').value = cliente.id;
    document.getElementById('editar-cliente-nome').value = cliente.nome;
    document.getElementById('editar-cliente-email').value = cliente.email;
    document.getElementById('editar-cliente-telefone').value = cliente.telefone || '';
    document.getElementById('editar-cliente-endereco').value = cliente.endereco || '';
    document.getElementById('editar-cliente-cidade').value = cliente.cidade || '';
    document.getElementById('editar-cliente-estado').value = cliente.estado || '';
    document.getElementById('editar-cliente-cep').value = cliente.cep || '';
    document.getElementById('editar-cliente-status').checked = cliente.ativo;
    
    // Mostrar modal
    document.getElementById('modal-editar-cliente').classList.add('active');
}

function abrirModalNovoCliente() {
    // Resetar campos do formulário
    document.getElementById('form-novo-cliente').reset();
    // Mostrar modal
    document.getElementById('modal-novo-cliente').classList.add('active');
}

async function salvarNovoCliente() {
    const dadosCliente = {
        nome: document.getElementById('novo-cliente-nome').value,
        email: document.getElementById('novo-cliente-email').value,
        telefone: document.getElementById('novo-cliente-telefone').value,
        endereco: document.getElementById('novo-cliente-endereco').value,
        cidade: document.getElementById('novo-cliente-cidade').value,
        estado: document.getElementById('novo-cliente-estado').value,
        cep: document.getElementById('novo-cliente-cep').value,
        ativo: document.getElementById('novo-cliente-status').checked
    };
    
    const resultado = await criarCliente(dadosCliente);
    if (resultado) {
        document.getElementById('modal-novo-cliente').classList.remove('active');
        carregarClientes(); // Recarregar a lista de clientes
    }
}

// Função auxiliar para mostrar notificações toast
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

// Exportar funções para uso global
window.buscarClientes = buscarClientes;
window.renderizarTabelaClientes = renderizarTabelaClientes;
window.inicializarPaginaClientes = inicializarPaginaClientes;
window.carregarClientes = carregarClientes;
window.criarCliente = criarCliente;
window.verCliente = verCliente;
window.editarCliente = editarCliente;
window.excluirCliente = excluirCliente;
window.aplicarFiltrosCliente = aplicarFiltrosCliente;
window.irParaPagina = irParaPagina;
window.abrirModalNovoCliente = abrirModalNovoCliente;
window.salvarNovoCliente = salvarNovoCliente;
window.salvarAlteracoesCliente = salvarAlteracoesCliente;
window.abrirModalVerCliente = abrirModalVerCliente;
window.abrirModalEditarCliente = abrirModalEditarCliente;
window.mostrarNotificacao = mostrarNotificacao;