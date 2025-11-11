<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Loto Mada')</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: #fff;
      margin: 0;
      padding: 0;
    }

    :root {
      --green: #016b54;
      --red: #c62828;
      --dark: #111827;
      --white: #ffffff;
      --transition: all 0.3s ease;
    }

    /* === HEADER === */
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 50;
      backdrop-filter: blur(14px);
      background: rgba(255, 255, 255, 0.05);
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      transition: all 0.35s ease-in-out;
    }

    header.scrolled {
      background: rgba(255, 255, 255, 0.92);
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(20px);
    }

    /* === LOGO === */
    .logo-badge {
      background-color: var(--green);
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.4rem;
      font-weight: bold;
      box-shadow: 0 4px 12px rgba(0, 91, 65, 0.3);
      transition: var(--transition);
    }

    .logo-badge:hover {
      transform: rotate(8deg) scale(1.05);
      box-shadow: 0 6px 16px rgba(0, 91, 65, 0.4);
    }

    /* === NAV LINKS === */
    .nav-link {
      position: relative;
      font-weight: 600;
      color: var(--dark);
      transition: var(--transition);
      padding-bottom: 4px;
    }

    .nav-link::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 2px;
      width: 0%;
      background-color: var(--green);
      transition: width 0.3s ease-in-out;
    }

    .nav-link:hover {
      color: var(--green);
      transform: translateY(-2px);
    }

    .nav-link:hover::after {
      width: 100%;
    }

    /* === BUTTONS === */
    .btn-3d {
      position: relative;
      border-radius: 9999px;
      font-weight: 600;
      transition: all 0.25s ease-in-out;
      overflow: hidden;
    }

    .btn-connexion {
      background-color: white;
      color: var(--dark);
      border: 1.5px solid #ddd;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-connexion:hover {
      border-color: var(--green);
      color: var(--green);
      box-shadow: 0 8px 20px rgba(0, 91, 65, 0.25);
      transform: translateY(-2px);
    }

    .btn-inscription {
      background-color: var(--green);
      color: white;
      box-shadow: 0 4px 15px rgba(0, 91, 65, 0.25);
      position: relative;
    }

    .btn-inscription::before {
      content: "";
      position: absolute;
      top: 0;
      left: -75%;
      width: 50%;
      height: 100%;
      background: rgba(255, 255, 255, 0.2);
      transform: skewX(-25deg);
      animation: shine 3s infinite linear;
    }

    .btn-inscription:hover {
      transform: translateY(-3px) scale(1.03);
      box-shadow: 0 10px 25px rgba(0, 91, 65, 0.3);
      background-color: var(--red);
    }

    @keyframes shine {
      0% { left: -75%; }
      50% { left: 125%; }
      100% { left: 125%; }
    }

    /* === FOOTER === */
    footer {
      background-color: var(--dark);
      color: #e5e5e5;
      padding: 4rem 1.5rem 2rem;
      font-size: 0.95rem;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-logo {
      display: flex;
      align-items: center;
      gap: 0.6rem;
    }

    .footer-logo .logo-badge {
      width: 40px;
      height: 40px;
      font-size: 1.2rem;
    }

    .footer-logo h3 {
      font-weight: 700;
      font-size: 1.4rem;
    }

    .footer-links a {
      display: block;
      color: #ccc;
      margin-bottom: 0.6rem;
      transition: color 0.3s;
    }

    .footer-links a:hover {
      color: var(--green);
    }

    .social-icons a {
      color: #ccc;
      margin-right: 0.8rem;
      font-size: 1.3rem;
      transition: color 0.3s;
    }

    .social-icons a:hover {
      color: var(--green);
    }

    .payment-logos img {
      height: 30px;
      margin-right: 12px;
      filter: brightness(0.95);
      transition: transform 0.3s ease;
    }

    .payment-logos img:hover {
      transform: scale(1.1);
    }

    .footer-bottom {
      text-align: center;
      font-size: 0.85rem;
      border-top: 1px solid rgba(255,255,255,0.1);
      margin-top: 3rem;
      padding-top: 1.2rem;
      color: #aaa;
    }

    @media (max-width: 768px) {
      .footer-grid { text-align: center; }
      .footer-logo { justify-content: center; }
      .social-icons { justify-content: center; }
      .payment-logos { justify-content: center; }
    }
  </style>
</head>

<body class="text-gray-800">

  <!-- 🔹 NAVBAR -->
  <header>
    <nav class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
      <!-- Logo -->
      <a href="{{ url('/') }}" class="flex items-center gap-3">
        <div class="logo-badge">🎱</div>
        <h1 class="text-3xl font-extrabold tracking-tight text-[var(--dark)]">
          <span class="text-[var(--red)]">Loto</span><span class="text-[var(--green)]"> Mada</span>
        </h1>
      </a>

      <!-- Menu principal -->
      <div class="hidden lg:flex items-center gap-10 font-medium">
        <a href="{{ url('/') }}" class="nav-link">Accueil</a>
        <a href="#" class="nav-link">Jeux</a>
        <a href="#" class="nav-link">Résultats</a>
        <a href="#" class="nav-link">Tirages</a>
        <a href="#" class="nav-link">Contact</a>
      </div>

      <!-- Boutons -->
      <div class="hidden lg:flex items-center gap-4">
        <a href="#" class="btn-3d btn-connexion px-5 py-2">
          <i class="fa-solid fa-user mr-1"></i> Connexion
        </a>
        <a href="#" class="btn-3d btn-inscription px-6 py-2">
          <i class="fa-solid fa-user-plus mr-1"></i> Inscription
        </a>
      </div>

      <!-- Bouton mobile -->
      <button id="menuToggle" class="lg:hidden text-2xl text-[var(--green)] focus:outline-none">
        <i class="fas fa-bars"></i>
      </button>
    </nav>

    <!-- Menu mobile -->
    <div id="mobileMenu" class="bg-white/95 backdrop-blur-md shadow-md border-t border-gray-200 flex flex-col items-center py-4 space-y-4 lg:hidden">
      <a href="{{ url('/') }}" class="nav-link text-gray-700">Accueil</a>
      <a href="#" class="nav-link text-gray-700">Jeux</a>
      <a href="#" class="nav-link text-gray-700">Résultats</a>
      <a href="#" class="nav-link text-gray-700">Tirages</a>
      <a href="#" class="nav-link text-gray-700">Contact</a>
      <div class="border-t border-gray-300 w-10/12"></div>
      <a href="#" class="btn-3d btn-connexion px-5 py-2 w-10/12 text-center">Connexion</a>
      <a href="#" class="btn-3d btn-inscription px-6 py-2 w-10/12 text-center">Inscription</a>
    </div>
  </header>

  <!-- Spacer -->
  <div class="h-24"></div>

  <!-- Contenu -->
  <main>
    @yield('content')
  </main>

  <!-- 🔸 FOOTER -->
  <footer>
    <div class="footer-grid">
      <div>
        <div class="footer-logo">
          <div class="logo-badge">🎱</div>
          <h3>Loto <span class="text-green-400">Mada</span></h3>
        </div>
        <p class="mt-3 text-gray-300">La plateforme n°1 de loterie et paris en ligne à Madagascar. Jouez, gagnez et vivez l’émotion du tirage en direct.</p>
        <!-- <div class="payment-logos mt-4 flex items-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/3/3e/Orange_Money_logo.svg" alt="Orange Money" title="Paiement Orange Money">
          <img src="https://upload.wikimedia.org/wikipedia/commons/b/bb/Visa_2021.svg" alt="Visa" title="Paiement Visa">
          <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="MasterCard" title="Paiement MasterCard">
          <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Airtel_Money_logo.svg" alt="Airtel Money" title="Paiement Airtel Money">
        </div> -->
      </div>

      <div class="footer-links">
        <h4 class="font-semibold text-white mb-2">Navigation</h4>
        <a href="#">Accueil</a>
        <a href="#">Jeux</a>
        <a href="#">Résultats</a>
        <a href="#">Contact</a>
      </div>

      <div class="footer-links">
        <h4 class="font-semibold text-white mb-2">Assistance</h4>
        <a href="#">FAQ</a>
        <a href="#">Conditions générales</a>
        <a href="#">Politique de confidentialité</a>
        <a href="#">Jeu responsable</a>
      </div>

      <div>
        <h4 class="font-semibold text-white mb-2">Contact</h4>
        <p><i class="fa-solid fa-envelope mr-2"></i> support@lotomada.mg</p>
        <p><i class="fa-solid fa-phone mr-2"></i> +261 34 12 345 67</p>
        <div class="social-icons mt-3 flex">
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      &copy; {{ date('Y') }} Loto Mada — Tous droits réservés. | Développé avec ❤️ à Madagascar.
    </div>
  </footer>

  <!-- Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuToggle = document.getElementById('menuToggle');
      const mobileMenu = document.getElementById('mobileMenu');
      const header = document.querySelector('header');

      menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('active');
        mobileMenu.classList.toggle('active');
      });

      window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      });
    });
  </script>
</body>
</html>
