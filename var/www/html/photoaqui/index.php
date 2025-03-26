<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotoAqui - Eternize suas memórias com qualidade</title>
    <!-- Fonte do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #3a86ff;
            --primary-light: #82b6ff;
            --primary-dark: #0a58ca;
            --secondary: #ff006e;
            --secondary-light: #ff4d96;
            --accent: #ffbe0b;
            --neutral-50: #ffffff;
            --neutral-100: #f8f9fa;
            --neutral-200: #e9ecef;
            --neutral-300: #dee2e6;
            --neutral-400: #ced4da;
            --neutral-500: #adb5bd;
            --neutral-600: #6c757d;
            --neutral-700: #495057;
            --neutral-800: #343a40;
            --neutral-900: #212529;
            --success: #38b000;
            
            /* Novas cores baseadas no banner */
            --banner-gradient-start: #5b247a;
            --banner-gradient-end: #1bcedf;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--neutral-800);
            background-color: var(--neutral-100);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        img {
            max-width: 100%;
            height: auto;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* ANÚNCIO SUPERIOR */
        .top-banner {
            background-color: var(--neutral-700);
            color: white;
            text-align: center;
            padding: 8px 0;
            font-size: 14px;
        }
        
        .top-banner span {
            margin: 0 15px;
        }
        
        /* CABEÇALHO */
        header {
            background-color: var(--neutral-50);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .logo {
            flex: 0 0 auto;
        }
        
        .logo img {
            height: 40px;
        }
        
        .search-bar {
            flex: 1;
            max-width: 500px;
            margin: 0 20px;
            position: relative;
        }
        
        .search-bar input {
            width: 100%;
            padding: 10px 15px;
            padding-right: 40px;
            border: 1px solid var(--neutral-300);
            border-radius: 30px;
            font-size: 14px;
        }
        
        .search-bar button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--neutral-600);
            cursor: pointer;
            font-size: 18px;
            padding: 8px;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .action-item {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--neutral-700);
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
        }
        
        .action-item i {
            font-size: 22px;
            margin-bottom: 3px;
        }
        
        .cart-count {
            position: absolute;
            top: -5px;
            right: -8px;
            background-color: var(--secondary);
            color: white;
            font-size: 10px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* NAVEGAÇÃO PRINCIPAL */
        .main-nav {
            background-color: var(--neutral-50);
            border-top: 1px solid var(--neutral-200);
            border-bottom: 1px solid var(--neutral-200);
        }
        
        .nav-container {
            display: flex;
            justify-content: center;
        }
        
        .nav-list {
            display: flex;
            list-style: none;
        }
        
        .nav-list li {
            position: relative;
        }
        
        .nav-list a {
            display: block;
            padding: 15px 20px;
            color: var(--neutral-800);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .nav-list a:hover {
            color: var(--primary);
        }
        
        .nav-list li:hover .submenu {
            display: block;
        }
        
        .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 220px;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 100;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .submenu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding: 15px;
            min-width: 650px;
        }
        
        .submenu-column h4 {
            margin-bottom: 10px;
            color: var(--neutral-800);
            font-size: 14px;
            padding-bottom: 5px;
            border-bottom: 1px solid var(--neutral-300);
        }
        
        .submenu-column ul {
            list-style: none;
        }
        
        .submenu-column li a {
            padding: 8px 10px;
            font-size: 13px;
            font-weight: normal;
        }
        
        .submenu-item {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            text-decoration: none;
            color: var(--neutral-700);
            transition: background-color 0.3s;
        }
        
        .submenu-item:hover {
            background-color: var(--neutral-100);
        }
        
        .submenu-item img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 4px;
        }
        
        .submenu-item-content h4 {
            font-size: 14px;
            color: var(--neutral-800);
            margin-bottom: 3px;
        }
        
        .submenu-item-content p {
            font-size: 12px;
            color: var(--neutral-600);
        }
        
        /* BANNER PRINCIPAL */
        .hero-banner {
            background: linear-gradient(135deg, var(--banner-gradient-start), var(--banner-gradient-end));
            color: white;
            padding: 0;
            overflow: hidden;
            position: relative;
        }
        
        .hero-content {
            display: flex;
            align-items: center;
            min-height: 500px;
        }
        
        .hero-text {
            flex: 1;
            padding: 60px;
            max-width: 600px;
            position: relative;
            z-index: 2;
        }
        
        .hero-text h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        
        .hero-text p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .hero-image {
            flex: 1;
            position: relative;
            z-index: 1;
            text-align: center;
        }
        
        .hero-image img {
            max-height: 450px;
            transform: perspective(800px) rotateY(-8deg) rotateX(5deg);
            box-shadow: 30px 30px 60px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }
        
        .cta-button {
            display: inline-block;
            background-color: var(--accent);
            color: var(--neutral-800);
            padding: 14px 32px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        }
        
        .cta-button i {
            margin-right: 8px;
        }
        
        /* VANTAGENS */
        .features {
            padding: 60px 0;
            background-color: var(--neutral-50);
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }
        
        .feature-card {
            padding: 20px;
            text-align: center;
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background-color: var(--primary-light);
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 15px;
            font-size: 24px;
        }
        
        .feature-card h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--neutral-800);
        }
        
        .feature-card p {
            font-size: 14px;
            color: var(--neutral-600);
        }
        
        /* PRODUTOS EM DESTAQUE */
        .product-section {
            padding: 60px 0;
            background-color: var(--neutral-100);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-title h2 {
            font-size: 32px;
            color: var(--neutral-800);
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -8px;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            transform: translateX(-50%);
        }
        
        .section-title p {
            font-size: 16px;
            color: var(--neutral-600);
            max-width: 700px;
            margin: 0 auto;
        }
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        
        .product-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .product-image {
            height: 250px;
            overflow: hidden;
            position: relative;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.05);
        }
        
        .product-label {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: var(--accent);
            color: var(--neutral-800);
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 4px;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-title {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--neutral-800);
        }
        
        .product-price {
            font-size: 16px;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .product-price .original-price {
            text-decoration: line-through;
            color: var(--neutral-500);
            font-weight: normal;
            font-size: 14px;
            margin-right: 8px;
        }
        
        .product-description {
            font-size: 14px;
            color: var(--neutral-600);
            margin-bottom: 15px;
        }
        
        .product-action {
            display: flex;
            justify-content: space-between;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-block {
            display: block;
            width: 100%;
        }
        
        /* PRODUTOS EM PROMOÇÃO */
        .promo-section {
            background: linear-gradient(to right, var(--banner-gradient-start), var(--banner-gradient-end));
            padding: 80px 0;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .promo-section::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .promo-section::after {
            content: '';
            position: absolute;
            bottom: -70px;
            left: -70px;
            width: 250px;
            height: 250px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .promo-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }
        
        .promo-card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            position: relative;
            z-index: 1;
        }
        
        .promo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .promo-image {
            height: 180px;
        }
        
        .promo-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .promo-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--accent);
            color: var(--neutral-800);
            font-weight: 700;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .promo-info {
            padding: 15px;
        }
        
        .promo-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
            color: white;
        }
        
        .promo-price {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .promo-original {
            text-decoration: line-through;
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            margin-right: 10px;
        }
        
        .promo-current {
            font-size: 18px;
            font-weight: 700;
            color: var(--accent);
        }
        
        .btn-light {
            background-color: white;
            color: var(--primary);
            border: none;
        }
        
        .btn-light:hover {
            background-color: var(--neutral-200);
        }
        
        /* COMO FUNCIONA */
        .how-it-works {
            padding: 80px 0;
            background-color: var(--neutral-50);
        }
        
        .steps-container {
            display: flex;
            justify-content: space-between;
            max-width: 900px;
            margin: 40px auto 0;
            position: relative;
        }
        
        .steps-container::before {
            content: '';
            position: absolute;
            top: 30px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: var(--neutral-300);
            z-index: 1;
        }
        
        .step {
            text-align: center;
            max-width: 200px;
            position: relative;
            z-index: 2;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 15px;
        }
        
        .step h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--neutral-800);
        }
        
        .step p {
            font-size: 14px;
            color: var(--neutral-600);
        }
        
        /* EDITOR DE FOTOS */
        .editor-section {
            padding: 80px 0;
            background-color: var(--neutral-100);
        }
        
        .editor-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }
        
        .editor-info {
            flex: 1;
        }
        
        .editor-title {
            font-size: 36px;
            font-weight: 700;
            color: var(--neutral-800);
            margin-bottom: 15px;
        }
        
        .editor-subtitle {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        .editor-description {
            font-size: 16px;
            color: var(--neutral-700);
            margin-bottom: 15px;
            line-height: 1.7;
        }
        
        .editor-features {
            margin: 20px 0 30px;
        }
        
        .editor-feature {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .feature-check {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: var(--success);
            color: white;
            margin-right: 10px;
            font-size: 14px;
        }
        
        .editor-feature span {
            font-size: 16px;
            color: var(--neutral-700);
        }
        
        .editor-video {
            flex: 1;
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .editor-video iframe {
            width: 100%;
            height: 315px;
            border: none;
        }
        
        /* TESTEMUNHOS */
        .testimonials {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 80px 0;
        }
        
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        
        .testimonial-card {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .testimonial-text {
            font-size: 15px;
            line-height: 1.7;
            color: var(--neutral-600);
            margin-bottom: 20px;
            position: relative;
        }
        
        .testimonial-text::before {
            content: '\201C';
            font-size: 60px;
            color: var(--primary-light);
            opacity: 0.3;
            position: absolute;
            top: -20px;
            left: -10px;
            font-family: serif;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }
        
        .author-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .author-info h4 {
            font-size: 16px;
            color: var(--neutral-800);
            margin-bottom: 3px;
        }
        
        .author-info p {
            font-size: 14px;
            color: var(--neutral-600);
        }
        
        .author-rating {
            color: var(--accent);
            font-size: 14px;
            margin-top: 5px;
        }
        
        /* CHAMADA FINAL */
        .final-cta {
            background-color: var(--primary);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        
        .cta-container {
            max-width: 700px;
            margin: 0 auto;
        }
        
        .cta-heading {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .cta-text {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        /* RODAPÉ */
        footer {
            background-color: var(--neutral-800);
            color: var(--neutral-300);
            padding: 60px 0 0;
            margin-top: auto;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-info {
            max-width: 300px;
        }
        
        .footer-logo {
            margin-bottom: 20px;
        }
        
        .footer-logo img {
            height: 40px;
        }
        
        .footer-description {
            font-size: 14px;
            color: var(--neutral-400);
            margin-bottom: 20px;
            line-height: 1.7;
        }
        
        .footer-social {
            display: flex;
            gap: 10px;
        }
        
        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }
        
        .footer-links h4 {
            font-size: 16px;
            color: white;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .footer-links ul {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            font-size: 14px;
            color: var(--neutral-400);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .footer-newsletter h4 {
            font-size: 16px;
            color: white;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .newsletter-form {
            display: flex;
            margin-bottom: 15px;
        }
        
        .newsletter-form input {
            flex: 1;
            padding: 10px 15px;
            border: none;
            border-radius: 4px 0 0 4px;
            font-size: 14px;
        }
        
        .newsletter-form button {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            padding: 0 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .newsletter-form button:hover {
            background-color: var(--primary-dark);
        }
        
        .footer-privacy {
            font-size: 12px;
            color: var(--neutral-500);
            margin-top: 10px;
        }
        
        .footer-bottom-wrapper {
            background-color: rgba(0, 0, 0, 0.2);
            width: 100%;
            padding: 20px 0;
            margin-top: 20px;
        }
        
        .footer-bottom {
            text-align: center;
            font-size: 14px;
            color: var(--neutral-500);
        }
        
        .payment-methods {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .payment-icon {
            background-color: white;
            border-radius: 4px;
            padding: 5px;
            width: 40px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* RESPONSIVIDADE */
        @media (max-width: 1024px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
    </style>
</head>
<body>
    <!-- Banner Superior -->
    <div class="top-banner">
        <div class="container">
            <span><i class="fas fa-certificate"></i> Pentacampeões Prêmio Reclame Aqui</span>
            <span><i class="fas fa-check-circle"></i> 100% de Satisfação Garantida</span>
            <span><i class="fas fa-credit-card"></i> Em até 3x sem juros</span>
        </div>
    </div>
    
    <!-- Cabeçalho -->
    <header>
        <div class="container header-main">
            <div class="logo">
                <a href="/">
                    <img src="/api/placeholder/150/40" alt="PhotoAqui Logo">
                </a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Buscar produtos...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
            <div class="header-actions">
                <a href="/conta" class="action-item">
                    <i class="fas fa-user"></i>
                    <span>Minha Conta</span>
                </a>
                <a href="/carrinho" class="action-item">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Carrinho</span>
                    <div class="cart-count">0</div>
                </a>
            </div>
        </div>
        
        <nav class="main-nav">
            <div class="container nav-container">
                <ul class="nav-list">
                    <li>
                        <a href="/fotolivros">Fotolivros</a>
                        <div class="submenu">
                            <div class="submenu-grid">
                                <div class="submenu-column">
                                    <h4>Escolha pela capa</h4>
                                    <ul>
                                        <li><a href="/fotolivros/capa-dura-hd">Capa Dura HD Fotográfico</a></li>
                                        <li><a href="/fotolivros/capa-dura-glow">Capa Dura Glow</a></li>
                                        <li><a href="/fotolivros/capa-dura">Capa Dura</a></li>
                                        <li><a href="/fotolivros/capa-revista">Capa Revista</a></li>
                                    </ul>
                                </div>
                                <div class="submenu-column">
                                    <h4>Escolha pelo tamanho</h4>
                                    <ul>
                                        <li><a href="/fotolivros/28x36cm">28x36cm</a></li>
                                        <li><a href="/fotolivros/30x30cm">30x30cm</a></li>
                                        <li><a href="/fotolivros/21x28cm">21x28cm</a></li>
                                        <li><a href="/fotolivros/21x21cm">21x21cm</a></li>
                                        <li><a href="/fotolivros/15x19cm">15x19cm</a></li>
                                        <li><a href="/fotolivros/13x14cm">13x14cm</a></li>
                                    </ul>
                                </div>
                                <div class="submenu-column">
                                    <h4>Produtos Recomendados</h4>
                                    <a href="/fotolivros/capa-dura-glow-30x30" class="submenu-item">
                                        <img src="/api/placeholder/80/80" alt="Fotolivro Capa Dura Glow">
                                        <div class="submenu-item-content">
                                            <h4>Fotolivro Capa Dura Glow</h4>
                                            <p>Novo! Com brilho e durabilidade</p>
                                        </div>
                                    </a>
                                    <a href="/fotolivros/hd-fotografico" class="submenu-item">
                                        <img src="/api/placeholder/80/80" alt="Fotolivro HD Fotográfico">
                                        <div class="submenu-item-content">
                                            <h4>Fotolivro HD Fotográfico</h4>
                                            <p>Abertura panorâmica 180°</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="/fotos">Fotos</a></li>
                    <li><a href="/quadros">Foto Quadros</a></li>
                    <li><a href="/presentes">Foto Presentes</a></li>
                    <li><a href="/papelaria">Papelaria</a></li>
                    <li><a href="/calendarios">Calendários</a></li>
                    <li><a href="/novidades">Novidades</a></li>
                    <li><a href="/promocoes">Promoções</a></li>
                </ul>
            </div>
        </nav>
    </header>
    
    <!-- Banner Principal -->
    <section class="hero-banner">
        <div class="container hero-content">
            <div class="hero-text">
                <h1>Viva a Vida, Reviva com a PhotoAqui!</h1>
                <p>Eternize suas memórias com nossa revelação fotográfica de qualidade que duram mais de 100 anos. Crie fotolivros, imprima fotos e muito mais!</p>
                <a href="/editor" class="cta-button"><i class="fas fa-upload"></i> Enviar Fotos Agora</a>
            </div>
            <div class="hero-image">
                <img src="/api/placeholder/500/400" alt="Fotolivro aberto mostrando páginas com fotos de família">
            </div>
        </div>
    </section>
    
    <!-- Vantagens -->
    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Qualidade Premium</h3>
                    <p>Papel fotográfico profissional com durabilidade de mais de 100 anos.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3>Entrega Rápida</h3>
                    <p>Seu pedido fica pronto em apenas 1 dia útil com frete expresso.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>5 Estrelas</h3>
                    <p>Pentacampeão do prêmio Reclame Aqui com 100% de satisfação.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3>Editor com IA</h3>
                    <p>Editor inteligente que monta seu fotolivro automaticamente.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Produtos em Destaque -->
    <section class="product-section">
        <div class="container">
            <div class="section-title">
                <h2>Produtos em Destaque</h2>
                <p>Confira nossos produtos mais vendidos e transforme suas fotos em memórias eternas</p>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="/api/placeholder/400/300" alt="Fotolivro Capa Dura Glow 30x30cm">
                        <div class="product-label">Novidade</div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Fotolivro Capa Dura Glow 30x30cm</h3>
                        <div class="product-price">
                            <span class="original-price">R$ 199,90</span>
                            <span>R$ 149,90</span>
                        </div>
                        <p class="product-description">Com acabamento brilhante e abertura plana para melhor visualização das suas fotos.</p>
                        <div class="product-action">
                            <a href="/produto/fotolivro-glow" class="btn btn-primary">Ver Detalhes</a>
                            <button class="btn btn-outline">Comprar</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="/api/placeholder/400/300" alt="Fotolivro HD Fotográfico 30x30cm">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Fotolivro HD Fotográfico 30x30cm</h3>
                        <div class="product-price">
                            <span class="original-price">R$ 249,90</span>
                            <span>R$ 199,90</span>
                        </div>
                        <p class="product-description">Abertura panorâmica 180° com alta definição para fotos incríveis em páginas nobres.</p>
                        <div class="product-action">
                            <a href="/produto/fotolivro-hd" class="btn btn-primary">Ver Detalhes</a>
                            <button class="btn btn-outline">Comprar</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="/api/placeholder/400/300" alt="Revelação de Fotos 10x15cm">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Revelação de Fotos 10x15cm</h3>
                        <div class="product-price">
                            <span class="original-price">R$ 1,99</span>
                            <span>R$ 0,99</span>
                        </div>
                        <p class="product-description">Revelação fotográfica profissional em papel brilhante ou fosco com cores vibrantes.</p>
                        <div class="product-action">
                            <a href="/produto/revelacao-10x15" class="btn btn-primary">Ver Detalhes</a>
                            <button class="btn btn-outline">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Promoções -->
    <section class="promo-section">
        <div class="container">
            <div class="section-title">
                <h2>Ofertas Especiais</h2>
                <p>Aproveite até 50% de desconto em produtos selecionados</p>
            </div>
            <div class="promo-grid">
                <div class="promo-card">
                    <div class="promo-image">
                        <img src="/api/placeholder/300/200" alt="Fotolivro Capa Dura 30x30cm">
                    </div>
                    <div class="promo-badge">-40%</div>
                    <div class="promo-info">
                        <h3 class="promo-title">Fotolivro Capa Dura 30x30cm</h3>
                        <div class="promo-price">
                            <span class="promo-original">R$ 149,90</span>
                            <span class="promo-current">R$ 89,90</span>
                        </div>
                        <a href="/produto/fotolivro-capa-dura" class="btn btn-light btn-block">Aproveitar</a>
                    </div>
                </div>
                <div class="promo-card">
                    <div class="promo-image">
                        <img src="/api/placeholder/300/200" alt="Foto Quadro 30x40cm">
                    </div>
                    <div class="promo-badge">-35%</div>
                    <div class="promo-info">
                        <h3 class="promo-title">Foto Quadro 30x40cm</h3>
                        <div class="promo-price">
                            <span class="promo-original">R$ 119,90</span>
                            <span class="promo-current">R$ 77,90</span>
                        </div>
                        <a href="/produto/foto-quadro" class="btn btn-light btn-block">Aproveitar</a>
                    </div>
                </div>
                <div class="promo-card">
                    <div class="promo-image">
                        <img src="/api/placeholder/300/200" alt="Pack 100 Fotos 10x15cm">
                    </div>
                    <div class="promo-badge">-50%</div>
                    <div class="promo-info">
                        <h3 class="promo-title">Pack 100 Fotos 10x15cm</h3>
                        <div class="promo-price">
                            <span class="promo-original">R$ 99,90</span>
                            <span class="promo-current">R$ 49,90</span>
                        </div>
                        <a href="/produto/pack-fotos" class="btn btn-light btn-block">Aproveitar</a>
                    </div>
                </div>
                <div class="promo-card">
                    <div class="promo-image">
                        <img src="/api/placeholder/300/200" alt="Caneca Personalizada">
                    </div>
                    <div class="promo-badge">-30%</div>
                    <div class="promo-info">
                        <h3 class="promo-title">Caneca Personalizada</h3>
                        <div class="promo-price">
                            <span class="promo-original">R$ 39,90</span>
                            <span class="promo-current">R$ 27,90</span>
                        </div>
                        <a href="/produto/caneca" class="btn btn-light btn-block">Aproveitar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Como Funciona -->
    <section class="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>Como Funciona</h2>
                <p>Simples, rápido e fácil de usar</p>
            </div>
            <div class="steps-container">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Escolha seu Produto</h3>
                    <p>Selecione entre nossos diversos produtos fotográficos de alta qualidade.</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Envie suas Fotos</h3>
                    <p>Utilize nosso editor ou faça upload diretamente do seu celular via QR Code.</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Personalize</h3>
                    <p>Use nosso editor intuitivo ou deixe nossa IA criar automaticamente para você.</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Receba em Casa</h3>
                    <p>Entregamos seu pedido pronto em apenas 1 dia útil para todo o Brasil.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Editor de Fotos -->
    <section class="editor-section">
        <div class="container">
            <div class="editor-content">
                <div class="editor-info">
                    <h2 class="editor-title">O Melhor Editor</h2>
                    <h3 class="editor-subtitle">Único com Inteligência Artificial</h3>
                    <p class="editor-description">Editor online, super intuitivo e fácil de usar. Suba suas fotos pelo celular através do nosso QR Code.</p>
                    <p class="editor-description">Crie seu fotolivro incrível e personalizado com a nossa ampla galeria de temas e layouts.</p>
                    <div class="editor-features">
                        <div class="editor-feature">
                            <div class="feature-check"><i class="fas fa-check"></i></div>
                            <span>Upload direto do celular via QR Code</span>
                        </div>
                        <div class="editor-feature">
                            <div class="feature-check"><i class="fas fa-check"></i></div>
                            <span>Montagem automática com Inteligência Artificial</span>
                        </div>
                        <div class="editor-feature">
                            <div class="feature-check"><i class="fas fa-check"></i></div>
                            <span>Mais de 100 temas e layouts disponíveis</span>
                        </div>
                        <div class="editor-feature">
                            <div class="feature-check"><i class="fas fa-check"></i></div>
                            <span>Edição online simples e intuitiva</span>
                        </div>
                    </div>
                    <a href="/editor" class="cta-button"><i class="fas fa-edit"></i> Experimente Agora</a>
                </div>
                <div class="editor-video">
                    <iframe src="/api/placeholder/560/315" title="Editor de Fotos PhotoAqui" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Testemunhos -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>O que nossos clientes dizem</h2>
                <p>Avaliações de clientes reais que compraram nossos produtos</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        Meu fotolivro ficou perfeito! A qualidade das impressões é incrível e o acabamento é superior a qualquer outro que já vi. Recomendo demais para quem quer eternizar momentos especiais.
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="/api/placeholder/50/50" alt="Mariana Silva">
                        </div>
                        <div class="author-info">
                            <h4>Mariana Silva</h4>
                            <p>Rio de Janeiro, RJ</p>
                            <div class="author-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        O editor é super fácil de usar! Consegui criar um fotolivro lindo em menos de 20 minutos. A entrega foi rápida e o produto chegou perfeito. Já estou pensando no próximo!
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="/api/placeholder/50/50" alt="Carlos Mendes">
                        </div>
                        <div class="author-info">
                            <h4>Carlos Mendes</h4>
                            <p>São Paulo, SP</p>
                            <div class="author-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        Amei a função de IA! Não tive tempo de montar meu álbum e o resultado ficou melhor do que eu imaginava. As cores são vibrantes e as páginas têm ótima qualidade.
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="/api/placeholder/50/50" alt="Ana Luiza">
                        </div>
                        <div class="author-info">
                            <h4>Ana Luiza</h4>
                            <p>Florianópolis, SC</p>
                            <div class="author-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Chamada Final -->
    <section class="final-cta">
        <div class="container cta-container">
            <h2 class="cta-heading">Eternize Seus Momentos Especiais</h2>
            <p class="cta-text">Transforme suas fotos digitais em memórias impressas que durarão por gerações.</p>
            <a href="/editor" class="cta-button"><i class="fas fa-camera"></i> Comece Agora</a>
        </div>
    </section>
    
    <!-- Rodapé -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <div class="footer-logo">
                        <img src="/api/placeholder/150/40" alt="PhotoAqui Logo">
                    </div>
                    <p class="footer-description">A PhotoAqui existe para te ajudar a guardar seus melhores momentos em fotolivros, revelações e muito mais! Eternize suas memórias com qualidade profissional.</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Links Úteis</h4>
                    <ul>
                        <li><a href="/atendimento">Central de Atendimento</a></li>
                        <li><a href="/minha-conta">Minha Conta</a></li>
                        <li><a href="/frete">Frete e Prazos de entrega</a></li>
                        <li><a href="/termos">Termos e Condições</a></li>
                        <li><a href="/privacidade">Política de Privacidade</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Categorias</h4>
                    <ul>
                        <li><a href="/fotolivros">Fotolivros</a></li>
                        <li><a href="/fotos">Fotos</a></li>
                        <li><a href="/quadros">Foto Quadros</a></li>
                        <li><a href="/presentes">Foto Presentes</a></li>
                        <li><a href="/calendarios">Calendários</a></li>
                        <li><a href="/promocoes">Promoções</a></li>
                    </ul>
                </div>
                <div class="footer-newsletter">
                    <h4>Fique por Dentro</h4>
                    <p>Receba ofertas exclusivas da PhotoAqui no seu e-mail</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Seu e-mail">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                    <p class="footer-privacy">Nunca compartilhamos seus dados. Veja nossa <a href="/privacidade">Política de Privacidade</a>.</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom-wrapper">
            <div class="container">
                <div class="footer-bottom">
                    <p>&copy; 2025 PhotoAqui. Todos os direitos reservados.</p>
                    <div class="payment-methods">
                        <div class="payment-icon"><img src="/api/placeholder/30/20" alt="Visa"></div>
                        <div class="payment-icon"><img src="/api/placeholder/30/20" alt="Mastercard"></div>
                        <div class="payment-icon"><img src="/api/placeholder/30/20" alt="Amex"></div>
                        <div class="payment-icon"><img src="/api/placeholder/30/20" alt="Boleto"></div>
                        <div class="payment-icon"><img src="/api/placeholder/30/20" alt="Pix"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
        </div>
    </footer>
    
    <!-- Aviso de Cookies -->
    <div class="cookie-banner" style="position: fixed; bottom: 0; left: 0; right: 0; background-color: rgba(33, 37, 41, 0.9); color: white; padding: 15px; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <p style="margin: 0 20px 0 0; font-size: 14px;">Utilizamos cookies para personalizar anúncios e auxiliar em sua navegação. Ao continuar, você aceita nossa <a href="/privacidade" style="color: var(--accent); text-decoration: underline;">Política de Privacidade</a>.</p>
        <button id="accept-cookies" style="background-color: var(--accent); color: var(--neutral-800); border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; font-weight: 600; white-space: nowrap;">Aceitar e fechar</button>
    </div>
    
    <script>
        // Script para destacar o link de navegação ativo
        document.addEventListener('DOMContentLoaded', function() {
            const currentLocation = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-list a');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentLocation) {
                    link.style.color = 'var(--primary)';
                }
            });
            
            // Slider para o banner principal (placeholder para demonstração)
            let slideIndex = 0;
            const slides = document.querySelectorAll('.hero-slide');
            
            function showSlides() {
                if (slides.length > 0) {
                    slides.forEach(slide => {
                        slide.style.display = 'none';
                    });
                    
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1;
                    }
                    
                    slides[slideIndex - 1].style.display = 'block';
                    setTimeout(showSlides, 5000); // Muda slide a cada 5 segundos
                }
            }
            
            // Iniciar o slideshow se houver slides
            if (slides.length > 0) {
                showSlides();
            }
            
            // Adicionar produtos ao carrinho
            const addToCartButtons = document.querySelectorAll('.btn-outline');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productCard = this.closest('.product-card');
                    const productTitle = productCard.querySelector('.product-title').textContent;
                    const productPrice = productCard.querySelector('.product-price span:last-child').textContent;
                    
                    // Atualizar contador do carrinho
                    const cartCount = document.querySelector('.cart-count');
                    cartCount.textContent = parseInt(cartCount.textContent) + 1;
                    
                    // Mostrar mensagem de sucesso
                    alert(`Produto "${productTitle}" adicionado ao carrinho!`);
                    
                    // Aqui você adicionaria lógica para armazenar dados do carrinho
                    console.log(`Produto adicionado: ${productTitle} - ${productPrice}`);
                });
            });
            
            // Lidar com envio do formulário de newsletter
            const newsletterForm = document.querySelector('.newsletter-form');
            
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const email = this.querySelector('input').value;
                    
                    if (email && email.includes('@')) {
                        alert('Obrigado por se inscrever! Em breve você receberá nossas ofertas no seu email.');
                        this.querySelector('input').value = '';
                    } else {
                        alert('Por favor, insira um email válido.');
                    }
                });
            }
            
            // Aceitar cookies
            const cookieBanner = document.querySelector('.cookie-banner');
            const acceptCookiesButton = document.getElementById('accept-cookies');
            
            if (cookieBanner && acceptCookiesButton) {
                // Verificar se os cookies foram aceitos via cookie (não via localStorage)
                function getCookie(name) {
                    const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                    return match ? match[2] : null;
                }
                
                const cookiesAccepted = getCookie('cookiesAccepted');
                
                if (cookiesAccepted === 'true') {
                    cookieBanner.style.display = 'none';
                }
                
                acceptCookiesButton.addEventListener('click', function() {
                    // Definir um cookie que expira em 365 dias
                    const expiryDate = new Date();
                    expiryDate.setFullYear(expiryDate.getFullYear() + 1);
                    document.cookie = "cookiesAccepted=true; expires=" + expiryDate.toUTCString() + "; path=/";
                    cookieBanner.style.display = 'none';
                });
            }
            
            // Mostrar submenu ao passar o mouse
            const navItems = document.querySelectorAll('.nav-list li');
            
            navItems.forEach(item => {
                const submenu = item.querySelector('.submenu');
                
                if (submenu) {
                    // Em dispositivos desktop, mostrar submenu no hover
                    if (window.innerWidth > 768) {
                        item.addEventListener('mouseenter', function() {
                            submenu.style.display = 'block';
                        });
                        
                        item.addEventListener('mouseleave', function() {
                            submenu.style.display = 'none';
                        });
                    } 
                    // Em dispositivos móveis, alternar submenu no clique
                    else {
                        item.addEventListener('click', function(e) {
                            if (submenu.style.display === 'block') {
                                submenu.style.display = 'none';
                            } else {
                                // Fechar outros submenus abertos
                                document.querySelectorAll('.submenu').forEach(menu => {
                                    menu.style.display = 'none';
                                });
                                
                                submenu.style.display = 'block';
                            }
                            
                            e.preventDefault();
                        });
                    }
                }
            });
            
            // Ajustar layout para telas maiores/menores
            function handleResponsiveLayout() {
                const windowWidth = window.innerWidth;
                
                // Ajustar layout móvel vs desktop
                if (windowWidth <= 768) {
                    // Para dispositivos móveis
                    document.querySelectorAll('.submenu').forEach(submenu => {
                        submenu.style.position = 'static';
                        submenu.style.width = '100%';
                        submenu.style.boxShadow = 'none';
                    });
                } else {
                    // Para desktop
                    document.querySelectorAll('.submenu').forEach(submenu => {
                        submenu.style.position = 'absolute';
                        submenu.style.width = 'auto';
                        submenu.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
                    });
                }
            }
            
            // Executar no carregamento e quando a janela for redimensionada
            handleResponsiveLayout();
            window.addEventListener('resize', handleResponsiveLayout);
            
            // Animação de scroll suave para âncoras
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80, // Ajuste para o cabeçalho fixo
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Animação de elementos ao scroll
            function animateOnScroll() {
                const animatedElements = document.querySelectorAll('.product-card, .feature-card, .promo-card, .step, .testimonial-card');
                
                animatedElements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementPosition < windowHeight - 50) {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }
                });
            }
            
            // Configurar animação inicial
            const animatedElements = document.querySelectorAll('.product-card, .feature-card, .promo-card, .step, .testimonial-card');
            animatedElements.forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            });
            
            // Executar animação no scroll
            window.addEventListener('scroll', animateOnScroll);
            // Executar uma vez para animações visíveis no carregamento
            setTimeout(animateOnScroll, 100);
        });
    </script>
</body>
</html>
            .promo-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .footer-content {
                grid-template-columns: 1fr 1fr 1fr;
            }
            
            .footer-info {
                grid-column: span 3;
                max-width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .header-main {
                flex-wrap: wrap;
            }
            
            .search-bar {
                order: 3;
                margin: 15px 0 0;
                max-width: 100%;
                width: 100%;
            }
            
            .product-grid,
            .promo-grid,
            .testimonial-grid {
                grid-template-columns: 1fr 1fr;
            }
            
            .steps-container {
                flex-direction: column;
                align-items: center;
                gap: 40px;
            }
            
            .steps-container::before {
                display: none;
            }
            
            .editor-content {
                flex-direction: column;
            }
            
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }
            
            .footer-info {
                grid-column: span 2;
                max-width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .hero-content {
                flex-direction: column;
                text-align: center;
                padding: 40px 0;
            }
            
            .hero-text {
                padding: 30px 20px;
            }
            
            .hero-image {
                margin-top: 30px;
            }
            
            .hero-image img {
                max-height: 300px;
            }
            
            .features-grid,
            .product-grid,
            .promo-grid,
            .testimonial-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .footer-info {
                grid-column: span 1;
            }
        }
