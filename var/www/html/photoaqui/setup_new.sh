#!/bin/bash

echo "========================================================="
echo "Configurando Painel Administrativo PhotoAqui"
echo "========================================================="

# Criar diretórios
echo "Criando estrutura de diretórios..."
mkdir -p admin/images/products
mkdir -p admin/images/banners
mkdir -p admin/js

echo "Estrutura de diretórios criada com sucesso!"

# Criar arquivo CSS básico
echo "Criando arquivos principais..."
cat > admin/admin.css << 'EOF'
/* Estilos Base do Painel Administrativo */
:root {
  --primary: #3a86ff;
  --primary-light: #82b6ff;
  --primary-dark: #0a58ca;
  --secondary: #ff006e;
  --accent: #ffbe0b;
  --success: #38b000;
  --warning: #f48c06;
  --danger: #dc2f02;
  --neutral-50: #ffffff;
  --neutral-100: #f8f9fa;
  --neutral-200: #e9ecef;
  --neutral-800: #343a40;
  --banner-gradient-start: #5b247a;
  --banner-gradient-end: #1bcedf;
}

body {
  font-family: 'Montserrat', sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  background-color: var(--neutral-100);
  color: var(--neutral-800);
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  color: var(--primary);
}
EOF

# Criar arquivo HTML básico
cat > admin/admin.html << 'EOF'
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel Administrativo - PhotoAqui</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <div class="container">
    <h1>Painel Administrativo PhotoAqui</h1>
    <p>Este é um placeholder para o painel administrativo completo.</p>
    <p>Substitua este arquivo pelo código completo do painel administrativo.</p>
  </div>
</body>
</html>
EOF

# Criar página de login
cat > admin/admin-login.html << 'EOF'
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Administrativo - PhotoAqui</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="admin.css">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #5b247a, #1bcedf);
    }
    .login-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
      max-width: 400px;
      width: 100%;
    }
    .login-title {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .login-btn {
      background-color: var(--primary);
      color: white;
      border: none;
      padding: 12px;
      border-radius: 5px;
      width: 100%;
      cursor: pointer;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-title">
      <h1>Painel Admin</h1>
      <p>Faça login para acessar</p>
    </div>
    <form>
      <div class="form-group">
        <label for="username">Usuário</label>
        <input type="text" id="username" placeholder="Digite seu usuário">
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" placeholder="Digite sua senha">
      </div>
      <button type="button" class="login-btn">Entrar</button>
    </form>
  </div>
</body>
</html>
EOF

# Criar README
cat > admin/README.md << 'EOF'
# Painel Administrativo PhotoAqui

Esta pasta contém os arquivos do painel administrativo.

## Credenciais padrão
- Usuário: admin
- Senha: admin123

Por favor, altere essas credenciais antes de colocar em produção.
EOF

# Criar arquivos placeholder
touch admin/images/logo.png
touch admin/images/products/product1.jpg
touch admin/images/products/product2.jpg
touch admin/images/banners/banner1.jpg
touch admin/images/banners/banner2.jpg

echo "========================================================="
echo "Configuração básica concluída!"
echo "========================================================="
echo "Você pode acessar o painel em: http://seu-site.com/photoaqui/admin/admin-login.html"
echo ""
echo "Substitua os arquivos placeholders pelos arquivos completos do painel administrativo."
echo "========================================================="
