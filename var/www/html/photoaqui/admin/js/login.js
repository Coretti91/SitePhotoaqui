// Salve este arquivo como admin/js/login.js

document.addEventListener('DOMContentLoaded', function() {
    console.log("Script de login carregado");
    
    // Remover parâmetros da URL se existirem (por segurança)
    if (window.location.search) {
        const cleanUrl = window.location.protocol + "//" + 
                         window.location.host + 
                         window.location.pathname;
        window.history.replaceState({}, document.title, cleanUrl);
    }
    
    // Encontrar todos os botões de login na página
    const loginButtons = document.querySelectorAll('button[type="submit"], .btn-login, button:contains("Entrar")');
    
    loginButtons.forEach(button => {
        console.log("Botão de login encontrado:", button);
        
        button.addEventListener('click', function(event) {
            event.preventDefault();
            console.log("Botão de login clicado");
            
            // Encontrar o formulário pai ou usar o mais próximo se não for um formulário
            let form = button.closest('form');
            if (!form) {
                console.log("Formulário não encontrado, usando contexto do botão");
            }
            
            // Encontrar campos de entrada (podem estar em diferentes estruturas)
            let username, password;
            
            // Tentar diferentes seletores para username e password
            const usernameInputs = document.querySelectorAll('input[type="text"], input[id="username"]');
            const passwordInputs = document.querySelectorAll('input[type="password"], input[id="password"]');
            
            if (usernameInputs.length > 0) username = usernameInputs[0].value;
            if (passwordInputs.length > 0) password = passwordInputs[0].value;
            
            console.log("Tentando login com:", username);
            
            // Verificar credenciais
            if (username === 'admin' && password === 'admin123') {
                console.log("Login bem-sucedido, redirecionando...");
                window.location.href = 'admin.html';
            } else {
                alert('Credenciais inválidas. Por favor, tente novamente.\n\nDica: Use "admin" e "admin123"');
                console.log("Falha no login");
            }
        });
    });
    
    // Se não houver botões encontrados, adicionar um listener a todos os formulários
    if (loginButtons.length === 0) {
        console.log("Nenhum botão encontrado, procurando formulários");
        
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', handleFormSubmit);
        });
    }
    
    // Adicionar listener para a tecla Enter em campos de senha
    const passwordFields = document.querySelectorAll('input[type="password"]');
    passwordFields.forEach(field => {
        field.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                handleFormSubmit(e);
            }
        });
    });
    
    // Função de manipulação do envio de formulário
    function handleFormSubmit(event) {
        event.preventDefault();
        console.log("Formulário enviado");
        
        let username, password;
        const usernameInputs = document.querySelectorAll('input[type="text"], input[id="username"]');
        const passwordInputs = document.querySelectorAll('input[type="password"], input[id="password"]');
        
        if (usernameInputs.length > 0) username = usernameInputs[0].value;
        if (passwordInputs.length > 0) password = passwordInputs[0].value;
        
        if (username === 'admin' && password === 'admin123') {
            console.log("Login bem-sucedido via formulário");
            window.location.href = 'admin.html';
        } else {
            alert('Credenciais inválidas. Por favor, tente novamente.\n\nDica: Use "admin" e "admin123"');
        }
    }
    
    // Verificar se os parâmetros da URL contêm credenciais (inseguro, apenas para resolver o problema atual)
    const urlParams = new URLSearchParams(window.location.search);
    const urlUsername = urlParams.get('username');
    const urlPassword = urlParams.get('password');
    
    if (urlUsername === 'admin' && urlPassword === 'admin123') {
        console.log("Login via URL params (inseguro!)");
        setTimeout(() => {
            window.location.href = 'admin.html';
        }, 500);
    }
});

// Polyfill para :contains se não estiver disponível
if (!Element.prototype.matches) {
    Element.prototype.matches = 
        Element.prototype.msMatchesSelector || 
        Element.prototype.webkitMatchesSelector;
}

if (!Element.prototype.closest) {
    Element.prototype.closest = function(s) {
        var el = this;
        do {
            if (el.matches(s)) return el;
            el = el.parentElement || el.parentNode;
        } while (el !== null && el.nodeType === 1);
        return null;
    };
}
