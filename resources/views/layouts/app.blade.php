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
    --gold:#ffd166;
    --gold-light:#ffe9b0;
    --glass1:rgba(255,255,255,0.04);
    --glass2:rgba(255,255,255,0.06);
    --glass3:rgba(255,255,255,0.10);
    --border-light:rgba(255,255,255,0.08);
    --border-medium:rgba(255,255,255,0.12);
    --radius-main:40px;
    --radius-sm:18px;
    --nav-height:72px;
    --shadow1:0 12px 30px rgba(0,0,0,0.35);
    --shadow2:0 18px 50px rgba(0,0,0,0.45);
}

/* BACKGROUND ANIMÉ PREMIUM */
body{
    margin:0;
    padding:40px;
    font-family:Inter, system-ui, sans-serif;
    background: linear-gradient(140deg, #0d1220, #050b18, #0f1628);
    background-size:300% 300%;
    animation: bgMove 14s ease-in-out infinite;
    color:#e8eefc;
}

@keyframes bgMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* ======================= */
/* NAVBAR PREMIUM GLASS UI */
/* ======================= */
nav{
    height:var(--nav-height);
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:12px 26px;
    border-radius:var(--radius-main);
    backdrop-filter:blur(14px) saturate(160%);
    -webkit-backdrop-filter:blur(14px) saturate(160%);
    background:rgba(255,255,255,0.05);
    border:1px solid var(--border-light);
    box-shadow:var(--shadow1);
    margin-bottom:40px;
    position:relative;
}

/* BRAND */
.brand {
    font-size:24px;
    font-weight:900;
    text-transform:uppercase;
    background:linear-gradient(120deg,var(--gold),#ffffff);
    -webkit-background-clip:text;
    color:transparent;
    letter-spacing:1px;
}

/* MENU */
.menu{
    display:flex;
    gap:16px;
}
.menu a{
    text-decoration:none;
    font-weight:600;
    padding:9px 16px;
    border-radius:20px;
    font-size:15px;
    background:rgba(255,255,255,0.04);
    border:1px solid rgba(255,255,255,0.05);
    color:var(--gold);
    transition:.25s;
}
.menu a:hover{
    background:rgba(255,255,255,0.10);
}

/* =============================== */
/* SECTION AUTH (connexion etc.)   */
/* =============================== */
.auth{
    display:flex;
    gap:12px;
}

.auth a{
    text-decoration:none;
    padding:9px 16px;
    border-radius:22px;
    font-size:14px;
    font-weight:700;
    transition:.25s;
}

/* Bouton login */
.login{
    color:#fff;
    background:rgba(255,255,255,0.06);
    border:1px solid rgba(255,255,255,0.08);
}
.login:hover{
    background:rgba(255,255,255,0.12);
}

/* Bouton signup (doré) */
.signup{
    background:linear-gradient(120deg,var(--gold),var(--gold-light));
    color:#111;
    box-shadow:0 5px 15px rgba(255,209,102,0.35);
}
.signup:hover{
    filter:brightness(1.1);
}

/* Bouton logout rond */
.logout-btn:hover{
    background:rgba(255,255,255,0.15) !important;
}

/* ========================== */
/* NAVIGATION MOBILE HAMBURGER */
/* ========================== */
.hamburger{
    display:none;
    width:45px;height:45px;
    align-items:center;justify-content:center;
    border-radius:16px;
    background:rgba(255,255,255,0.05);
    border:1px solid var(--border-light);
    cursor:pointer;
}

.hamburger svg{
    width:24px;
    stroke:var(--gold);
}

/* RESPONSIVE NAV */
@media(max-width:880px){
    .menu, .auth{display:none;}
    .hamburger{display:flex;}
}

/* ======================= */
/* FOOTER PREMIUM GOLD UI  */
/* ======================= */

.footer{
    margin-top:60px;
    padding:45px;
    border-radius:28px;
    background:var(--glass2);
    border:1px solid var(--border-light);
    box-shadow:var(--shadow2);
    backdrop-filter:blur(12px);
}

.footer-top{
    display:flex;
    flex-wrap:wrap;
    justify-content:space-between;
    gap:35px;
}

.footer-col{
    flex:1;
    min-width:240px;
}

.footer-col h3{
    font-size:22px;
    font-weight:900;
    color:var(--gold);
    margin-bottom:12px;
}
.footer-col h4{
    font-size:18px;
    font-weight:800;
    color:var(--gold-light);
    margin-bottom:10px;
}

.footer-col a{
    display:block;
    text-decoration:none;
    color:var(--gold);
    opacity:0.9;
    margin-bottom:8px;
    transition:.25s;
}
.footer-col a:hover{
    opacity:1;
    transform:translateX(6px);
}

/* Social Icons */
.footer-social{
    display:flex;
    gap:12px;
    margin-top:12px;
}
.footer-social i{
    font-size:20px;
    color:var(--gold);
    opacity:.8;
    transition:.25s;
}
.footer-social i:hover{
    opacity:1;
    transform:scale(1.2);
    text-shadow:0 0 6px rgba(255,209,102,0.6);
}

/* Bottom footer */
.footer-bottom{
    margin-top:25px;
    padding-top:16px;
    border-top:1px solid var(--border-medium);
    text-align:center;
    font-size:14px;
    opacity:.7;
}

/* FOOTER RESPONSIVE */
@media(max-width:780px){
    .footer-top{flex-direction:column;}
}

/* ======================= */
/* GLOBAL RESPONSIVE RULES */
/* ======================= */

@media(max-width:600px){
    body{padding:20px;}
    nav{padding:10px 18px;}
    .brand{font-size:20px;}
}


    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav>
        <div class="menu">
            <a href="/">Accueil</a>
            <!-- <a href="#">Jeux</a> -->
            <a href="{{ route('resultats') }}">Résultats</a>
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
