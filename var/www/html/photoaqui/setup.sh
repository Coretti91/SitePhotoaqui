@echo off
echo =====================================================
echo Configurando Painel Administrativo PhotoAqui
echo =====================================================
echo.

rem Criar a estrutura de diretórios
echo Criando estrutura de diretórios...
if not exist admin mkdir admin
if not exist admin\images mkdir admin\images
if not exist admin\images\products mkdir admin\images\products
if not exist admin\images\banners mkdir admin\images\banners
if not exist admin\js mkdir admin\js

echo.
echo Estrutura de diretórios criada com sucesso!
echo.

rem Copiar todos os arquivos para a estrutura
echo Gerando arquivos do painel administrativo...

rem Criando arquivos HTML
echo Criando arquivo admin.html...
cd admin
(
echo ^<!DOCTYPE html^>
echo ^<html lang="pt-br"^>
echo ^<head^>
echo   ^<meta charset="UTF-8"^>
echo   ^<meta name="viewport" content="width=device-width, initial-scale=1.0"^>
echo   ^<title^>Painel Administrativo - PhotoAqui^</title^>
echo   ^<!-- Fonte do Google --^>
echo   ^<link rel="preconnect" href="https://fonts.googleapis.com"^>
echo   ^<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin^>
echo   ^<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"^>
echo   ^<!-- Font Awesome para ícones --^>
echo   ^<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"^>
echo   ^<!-- Arquivo CSS externo --^>
echo   ^<link rel="stylesheet" href="admin.css"^>
echo ^</head^>
echo ^<body^>
echo   ^<!-- O restante do código foi omitido por brevidade --^>
echo   ^<!-- Veja o arquivo completo no repositório --^>
echo   ^<h1^>Painel Administrativo PhotoAqui^</h1^>
echo   ^<p^>Este arquivo foi gerado automaticamente pelo script de instalação.^</p^>
echo   ^<p^>Substitua este arquivo pelo conteúdo completo do admin.html fornecido.^</p^>
echo ^</body^>
echo ^</html^>
) > admin.html

echo Criando arquivo admin-login.html...
(
echo ^<!DOCTYPE html^>
echo ^<html lang="pt-br"^>
echo ^<head^>
echo   ^<meta charset="UTF-8"^>
echo   ^<meta name="viewport" content="width=device-width, initial-scale=1.0"^>
echo   ^<title^>Login Administrativo - PhotoAqui^</title^>
echo   ^<!-- Fonte do Google --^>
echo   ^<link rel="preconnect" href="https://fonts.googleapis.com"^>
echo   ^<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin^>
echo   ^<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"^>
echo   ^<!-- Font Awesome para ícones --^>
echo   ^<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"^>
echo   ^<!-- Arquivo CSS externo --^>
echo   ^<link rel="stylesheet" href="admin.css"^>
echo ^</head^>
echo ^<body^>
echo   ^<!-- O restante do código foi omitido por brevidade --^>
echo   ^<!-- Veja o arquivo completo no repositório --^>
echo   ^<h1^>Login Administrativo PhotoAqui^</h1^>
echo   ^<p^>Este arquivo foi gerado automaticamente pelo script de instalação.^</p^>
echo   ^<p^>Substitua este arquivo pelo conteúdo completo do admin-login.html fornecido.^</p^>
echo ^</body^>
echo ^</html^>
) > admin-login.html

echo Criando arquivo admin.css...
(
echo /* Estilos Base do Painel Administrativo */
echo :root {
echo   --primary: #3a86ff;
echo   --primary-light: #82b6ff;
echo   --primary-dark: #0a58ca;
echo   --secondary: #ff006e;
echo   --accent: #ffbe0b;
echo   --success: #38b000;
echo   --warning: #f48c06;
echo   --danger: #dc2f02;
echo   --info: #00b4d8;
echo   --neutral-50: #ffffff;
echo   --neutral-100: #f8f9fa;
echo   --neutral-200: #e9ecef;
echo   --neutral-300: #dee2e6;
echo   --neutral-800: #343a40;
echo   --neutral-900: #212529;
echo   
echo   /* Cores do banner */
echo   --banner-gradient-start: #5b247a;
echo   --banner-gradient-end: #1bcedf;
echo }
echo 
echo /* O restante do CSS foi omitido por brevidade */
echo /* Veja o arquivo completo no repositório */
echo 
echo body {
echo   font-family: 'Montserrat', sans-serif;
echo   background-color: var(--neutral-100);
echo   color: var(--neutral-800);
echo }
) > admin.css

echo Criando arquivo README.md...
(
echo # Painel Administrativo PhotoAqui
echo 
echo Este documento contém instruções para implementação do painel administrativo da PhotoAqui.
echo 
echo ## Estrutura de Arquivos
echo 
echo ```
echo /admin/
echo   ├── admin.html           # Página principal do painel administrativo
echo   ├── admin-login.html     # Página de login
echo   ├── admin.css            # Arquivo CSS separado com todos os estilos
echo   ├── images/              # Pasta de imagens
echo   │   ├── logo.png         # Logo da PhotoAqui
echo   │   ├── products/        # Imagens de produtos
echo   │   └── banners/         # Imagens de banners
echo   └── js/                  # Scripts JavaScript ^(opcional para expansão futura^)
echo ```
echo 
echo ## Credenciais para Teste
echo 
echo Para fins de teste, o sistema está configurado com as seguintes credenciais:
echo - Usuário: `admin`
echo - Senha: `admin123`
echo - Código 2FA: `123456`
echo 
echo **Importante:** Altere estas credenciais antes de colocar o sistema em produção!
) > README.md

echo Criando arquivo .htaccess...
(
echo # Proteger o diretório de listagem
echo Options -Indexes
echo 
echo # Restringir acesso a arquivos sensíveis
echo ^<FilesMatch "\.(htaccess^|htpasswd^|ini^|log^|sh^|inc^|bak)$"^>
echo     Order Allow,Deny
echo     Deny from all
echo ^</FilesMatch^>
) > .htaccess

echo.
echo Criando arquivos placeholder para imagens...
cd images
echo PlaceholderLogo > logo.txt
cd products
echo PlaceholderFotolivro > fotolivro.txt
echo PlaceholderQuadro > quadro.txt
echo PlaceholderFotos > fotos.txt
echo PlaceholderCaneca > caneca.txt
cd ..
cd banners
echo PlaceholderBanner1 > banner1.txt
echo PlaceholderBanner2 > banner2.txt
echo PlaceholderBanner3 > banner3.txt
cd ..
cd ..

echo.
echo ========================================================
echo Instalação concluída com sucesso!
echo ========================================================
echo.
echo A estrutura do painel administrativo foi criada.
echo.
echo Próximos passos:
echo 1. Substitua os arquivos placeholders pelos arquivos completos fornecidos
echo 2. Adicione suas próprias imagens na pasta images
echo 3. Configure o acesso ao painel administrativo
echo.
echo Credenciais de teste:
echo - Usuário: admin
echo - Senha: admin123
echo - Código 2FA: 123456
echo.
echo ========================================================
echo.

pause
