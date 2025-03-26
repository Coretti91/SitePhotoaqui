// Salve como "js/admin.js"
document.addEventListener('DOMContentLoaded', function() {
    console.log('Painel Administrativo PhotoAqui - Script Carregado');

    // Toggle do menu lateral
    const toggleSidebarBtn = document.querySelector('.toggle-sidebar');
    const body = document.querySelector('body');
    
    if (toggleSidebarBtn) {
        toggleSidebarBtn.addEventListener('click', function() {
            body.classList.toggle('sidebar-collapsed');
            console.log('Menu lateral alternado');
        });
    }
    
    // Submenu toggles
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Toggle status
            this.classList.toggle('open');
            
            // Encontrar e abrir o submenu correspondente
            const menuItem = this.closest('.nav-item');
            const submenu = menuItem.querySelector('.submenu');
            
            if (submenu) {
                submenu.classList.toggle('open');
                console.log('Submenu alternado');
            }
        });
    });
    
    // Botões de editar produto
    const editButtons = document.querySelectorAll('.product-btn.edit, [id^="Editar"]');
    
    editButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productElement = this.closest('.product-card') || this.closest('tr');
            const productName = productElement.querySelector('.product-title')?.textContent || 
                               productElement.querySelector('td:first-child')?.textContent || 
                               'este produto';
            
            alert(`Editando ${productName}`);
            console.log(`Editando ${productName}`);
        });
    });
    
    // Botões de visualizar produto
    const viewButtons = document.querySelectorAll('.product-btn.view, [id^="Visualizar"]');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productElement = this.closest('.product-card') || this.closest('tr');
            const productName = productElement.querySelector('.product-title')?.textContent || 
                               productElement.querySelector('td:first-child')?.textContent || 
                               'este produto';
            
            alert(`Visualizando ${productName}`);
            console.log(`Visualizando ${productName}`);
        });
    });
    
    // Gerenciamento de banners
    const bannerActionButtons = document.querySelectorAll('.banner-btn, [id^="Desativar"], [id^="Ativar"], [id^="Programar"]');
    
    bannerActionButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const action = this.textContent.trim() || this.id;
            const bannerElement = this.closest('.banner-item') || this.closest('tr');
            const bannerTitle = bannerElement.querySelector('.banner-title')?.textContent || 
                               bannerElement.querySelector('td:first-child')?.textContent || 
                               'este banner';
            
            if (action.includes('Editar')) {
                alert(`Editando o banner: ${bannerTitle}`);
            } else if (action.includes('Ativar')) {
                alert(`Banner ativado: ${bannerTitle}`);
                this.textContent = 'Desativar';
                this.id = 'Desativar';
                const statusElement = bannerElement.querySelector('.banner-status') || 
                                     bannerElement.querySelector('td:nth-child(3)');
                if (statusElement) {
                    statusElement.textContent = 'Ativo';
                    statusElement.className = 'banner-status status-active';
                }
            } else if (action.includes('Desativar')) {
                alert(`Banner desativado: ${bannerTitle}`);
                this.textContent = 'Ativar';
                this.id = 'Ativar';
                const statusElement = bannerElement.querySelector('.banner-status') || 
                                     bannerElement.querySelector('td:nth-child(3)');
                if (statusElement) {
                    statusElement.textContent = 'Inativo';
                    statusElement.className = 'banner-status status-inactive';
                }
            } else if (action.includes('Programar')) {
                const date = prompt('Informe a data para ativar este banner (DD/MM/AAAA):');
                if (date) {
                    alert(`Banner programado para: ${date}`);
                    const statusElement = bannerElement.querySelector('.banner-status') || 
                                         bannerElement.querySelector('td:nth-child(3)');
                    if (statusElement) {
                        statusElement.textContent = 'Agendado';
                        statusElement.className = 'banner-status status-scheduled';
                    }
                }
            }
        });
    });
    
    // Adicionar Produto
    const addProductButton = document.querySelector('[id^="Adicionar"]');
    
    if (addProductButton) {
        addProductButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Simulação do formulário de adição de produto
            alert('Abrindo formulário para adicionar novo produto');
            
            // Aqui você pode abrir um modal ou redirecionar para uma página de adição de produto
        });
    }
    
    // Novo Banner
    const addBannerButton = document.querySelector('[id^="Novo Banner"]');
    
    if (addBannerButton) {
        addBannerButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Simulação do formulário de adição de banner
            alert('Abrindo formulário para adicionar novo banner');
            
            // Aqui você pode abrir um modal ou redirecionar para uma página de adição de banner
        });
    }
    
    // Ver Todos os Produtos
    const viewAllProductsButton = document.querySelector('[id^="Ver Todos"]');
    
    if (viewAllProductsButton) {
        viewAllProductsButton.addEventListener('click', function(e) {
            e.preventDefault();
            alert('Mostrando todos os produtos');
            
            // Aqui você pode expandir a lista ou redirecionar para uma página com todos os produtos
        });
    }
    
    // Logout
    const logoutButton = document.getElementById('logoutBtn');
    
    if (logoutButton) {
        logoutButton.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Tem certeza que deseja sair do sistema?')) {
                window.location.href = 'admin-login.html';
            }
        });
    }
    
    // Filtros de produtos
    const filterSelects = document.querySelectorAll('.filter-select');
    
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            const filterType = this.previousElementSibling.textContent.trim();
            const filterValue = this.value;
            
            alert(`Filtrando produtos por ${filterType} ${filterValue}`);
            // Aqui você implementaria a lógica de filtro real
        });
    });
    
    // Charts de monitoramento em tempo real
    const refreshButtons = document.querySelectorAll('.realtime-refresh');
    
    refreshButtons.forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.realtime-card');
            const valueElement = card.querySelector('.realtime-value');
            
            if (!valueElement) return;
            
            // Efeito visual de atualização
            this.classList.add('fa-spin');
            
            setTimeout(() => {
                // Atualizar com valores aleatórios simulados
                const currentText = valueElement.textContent;
                const isPercentage = currentText.includes('%');
                const isCurrency = currentText.includes('R$');
                
                let originalValue = parseFloat(currentText.replace(/[^0-9,.]/g, '').replace(',', '.'));
                let newValue;
                
                if (isPercentage) {
                    // Variação aleatória para percentuais
                    newValue = (originalValue + (Math.random() * 1.5 - 0.7)).toFixed(1) + '%';
                } else if (isCurrency) {
                    // Variação aleatória para valores monetários
                    newValue = 'R$ ' + (originalValue * (1 + (Math.random() * 0.1 - 0.05))).toFixed(0);
                } else {
                    // Variação aleatória para números inteiros
                    newValue = Math.round(originalValue * (1 + (Math.random() * 0.2 - 0.1)));
                }
                
                valueElement.textContent = newValue;
                this.classList.remove('fa-spin');
                
                console.log(`Valor atualizado de ${currentText} para ${newValue}`);
            }, 800);
        });
    });
});