<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Loto Mada')</title>

    <!-- FONT AWESOME PREMIUM ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root{
          --accent: #ffd166;
          --glass: rgba(255,255,255,0.06);
          --radius: 40px;
          --nav-h: 70px;
        }

        /* BACKGROUND ANIMÉ */
        body{
          margin:0;
          padding:40px;
          font-family: Inter, system-ui, sans-serif;
          background: linear-gradient(120deg,#0f172a,#081225,#041025);
          background-size: 350% 350%;
          animation: bg 14s ease-in-out infinite;
          color:#e7eef9;
        }
        @keyframes bg{
          0%{background-position:0% 50%;}
          50%{background-position:100% 50%;}
          100%{background-position:0% 50%;}
        }

        /* NAVBAR TRANSPARENTE */
        nav{
          height:var(--nav-h);
          display:flex;
          align-items:center;
          justify-content:space-between;
          padding:10px 22px;
          border-radius:var(--radius);
          backdrop-filter: blur(10px) saturate(140%);
          -webkit-backdrop-filter: blur(10px) saturate(140%);
          background: rgba(255,255,255,0.05);
          border:1px solid rgba(255,255,255,0.08);
          box-shadow:0 12px 30px rgba(0,0,0,0.35);
          margin-bottom:40px;
        }

        /* LOGO */
        .brand{
          font-size:22px;
          font-weight:800;
          letter-spacing:1px;
          text-transform:uppercase;
          background:linear-gradient(120deg,var(--accent),#ffffff);
          -webkit-background-clip:text;
          color:transparent;
        }
        .brand-small{
          font-size:16px;
          letter-spacing:0.8px;
          transform:translateY(1px);
        }

        /* MENU GAUCHE */
        .menu{
          display:flex;
          gap:14px;
        }
        .menu a{
          text-decoration:none;
          font-weight:600;
          font-size:14px;
          padding:8px 12px;
          border-radius:20px;
          color:var(--accent);
          background:rgba(255,255,255,0.03);
          border:1px solid rgba(255,255,255,0.04);
          transition:.2s;
        }
        .menu a:hover{
          background:rgba(255,255,255,0.08);
        }

        /* DROITE : CONNEXION / INSCRIPTION */
        .auth{
          display:flex;
          gap:12px;
        }
        .auth a{
          text-decoration:none;
          padding:8px 14px;
          border-radius:22px;
          font-size:14px;
          font-weight:600;
          transition:.25s;
        }

        .login{
          color:#fff;
          background:rgba(255,255,255,0.06);
          border:1px solid rgba(255,255,255,0.06);
        }
        .login:hover{
          background:rgba(255,255,255,0.12);
        }

        .signup{
          background:linear-gradient(120deg,#ffd166,#ffe9b0);
          color:#000;
          font-weight:700;
          box-shadow:0 6px 16px rgba(255,209,102,0.45);
        }
        .signup:hover{
          filter:brightness(1.1);
        }

        /* MOBILE */
        .hamburger{
          display:none;
          width:42px;height:42px;
          align-items:center;justify-content:center;
          border-radius:14px;
          background:rgba(255,255,255,0.04);
          border:1px solid rgba(255,255,255,0.08);
          cursor:pointer;
        }
        .hamburger svg{
          width:22px;height:22px;stroke:#ffd166;
        }

        @media(max-width:820px){
          .menu,.auth{display:none;}
          .hamburger{display:flex;}
        }

        /* ========================= */
        /* FOOTER PREMIUM GOLD STYLE */
        /* ========================= */

        .footer {
            margin-top: 60px;
            padding: 40px;
            background: rgba(255,255,255,0.05);
            border-radius: 28px;
            border: 1px solid rgba(255,255,255,0.07);
            backdrop-filter: blur(8px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.45);
            color: #e6e6e6;
        }

        .footer-top {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 35px;
        }

        .footer-col {
            flex: 1;
            min-width: 230px;
        }

        .footer-col h3 {
            font-size: 22px;
            font-weight: 900;
            color: #ffd166;
            margin-bottom: 12px;
        }

        .footer-col h4 {
            font-size: 18px;
            font-weight: 800;
            color: #ffe9b0;
            margin-bottom: 10px;
        }

        .footer-col a {
            display:block;
            text-decoration:none;
            margin-bottom:7px;
            color:#ffd166;
            opacity:0.9;
            transition:0.2s;
        }
        .footer-col a:hover {
            opacity:1;
            transform:translateX(4px);
        }

        /* Social Icons */
        .footer-social {
            display:flex;
            gap:14px;
            margin-top:12px;
        }

        .footer-social i {
            font-size:18px;
            color:#ffd166;
            opacity:0.85;
            transition:0.25s;
        }

        .footer-social i:hover {
            opacity:1;
            transform:scale(1.18);
            color:#fff5c0;
            text-shadow:0 0 6px rgba(255,209,102,0.7);
        }

        .footer-bottom {
            margin-top: 30px;
            padding-top: 16px;
            border-top: 1px solid rgba(255,255,255,0.12);
            text-align:center;
            font-size:14px;
            opacity:0.75;
        }

        @media(max-width:780px){
            .footer-top { flex-direction: column; }
        }

    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav>
        <div class="menu">
            <a href="/">Accueil</a>
            <!-- <a href="#">Jeux</a> -->
            <a href="#">Résultats</a>
        </div>

        <div class="brand brand-small">Loto Mada</div>

        <div class="auth">
            @guest
                <a class="login" href="{{ route('auth.page') }}?tab=login">Connexion</a>
                <a class="signup" href="{{ route('auth.page') }}?tab=signup">Inscription</a>
            @else
                <a class="login" href="{{ route('profile') }}">Mon compte ({{ Auth::user()->pseudo }})</a>
                <a class="signup" href="#">Solde : {{ Auth::user()->solde ?? 0 }} Ariary</a>

                <form action="{{ route('logout') }}" method="POST" style="margin:0; padding:0;">
                    @csrf
                    <button type="submit" 
                        style="
                            width:42px;
                            height:42px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            border-radius:14px;
                            background:rgba(255,255,255,0.06);
                            border:1px solid rgba(255,255,255,0.08);
                            cursor:pointer;
                            transition:0.25s;
                        ">
                        <i class="fas fa-right-from-bracket" style="color:#ffd166; font-size:18px;"></i>
                    </button>
                </form>
            @endguest
        </div>



        <div class="hamburger">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16"/>
            </svg>
        </div>
    </nav>

    {{-- CONTENU DES PAGES --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="footer">

        <div class="footer-top">

            <div class="footer-col">
                <h3>Loto Mada</h3>
                <p>
                    Plateforme officielle de jeux de tirage à Madagascar.  
                    Jouez en toute sécurité et tentez de gagner des jackpots exceptionnels.
                </p>
            </div>

            <div class="footer-col">
                <h4>Navigation</h4>
                <a href="#">Accueil</a>
                <a href="#">Jeux</a>
                <a href="#">Résultats</a>
                <a href="#">À propos</a>
            </div>

            <div class="footer-col">
                <h4>Aide</h4>
                <a href="#">FAQ</a>
                <a href="#">Support</a>
                <a href="#">Conditions d'utilisation</a>
                <a href="#">Politique de confidentialité</a>
            </div>

            <div class="footer-col">
                <h4>Contact</h4>
                <p>Email : support@lotomada.mg</p>
                <p>Tél : +261 xx xx xxx xx</p>

                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-x-twitter"></i></a>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            © {{ date('Y') }} Loto Mada — Tous droits réservés.
        </div>
    </footer>

</body>
</html>
