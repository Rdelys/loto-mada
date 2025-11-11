@extends('layouts.app')

@section('title', 'Accueil - Loto Mada | Loterie en ligne à Madagascar')

@section('content')
<style>
    /* --- HERO SECTION --- */
    .hero {
        position: relative;
        background: url('https://plus.unsplash.com/premium_photo-1718191345799-30f50e04a57a?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170') center/cover no-repeat;
        height: 100vh;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        backdrop-filter: blur(2px);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 850px;
        padding: 0 1rem;
        animation: fadeIn 1s ease-in-out;
    }

    .hero h1 {
        font-size: clamp(2.2rem, 5vw, 4rem);
        font-weight: 800;
        letter-spacing: -0.02em;
        text-shadow: 0 4px 10px rgba(0,0,0,0.4);
    }

    .hero p {
        font-size: clamp(1rem, 1.4vw, 1.4rem);
        color: #e5e5e5;
        margin-top: 1.2rem;
        line-height: 1.7;
    }

    /* CTA BUTTONS */
    .cta-buttons {
        margin-top: 2rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
    }

    .btn-cta {
        display: inline-block;
        padding: 0.9rem 2.2rem;
        border-radius: 9999px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-green {
        background-color: #036b52;
        color: white;
        box-shadow: 0 5px 18px rgba(3, 107, 82, 0.3);
    }

    .btn-green:hover {
        background-color: #024d3d;
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(3, 107, 82, 0.35);
    }

    .btn-white {
        background-color: white;
        color: #036b52;
        border: 1px solid #036b52;
    }

    .btn-white:hover {
        background-color: #036b52;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(3, 107, 82, 0.25);
    }

    /* --- ADVANTAGES --- */
    .features {
        background-color: #f9fafb;
        padding: 6rem 1.5rem;
    }

    .features h2 {
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        color: #036b52;
        margin-bottom: 3rem;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 2.5rem;
        max-width: 1100px;
        margin: 0 auto;
    }

    .feature {
        background: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.4s ease;
    }

    .feature:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(3, 107, 82, 0.2);
    }

    .feature img {
        width: 100%;
        height: 160px;
        object-fit: cover;
    }

    .feature-content {
        padding: 1.5rem;
        text-align: center;
    }

    .feature i {
        font-size: 2.2rem;
        color: #036b52;
        margin-bottom: 1rem;
    }

    .feature h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #036b52;
        margin-bottom: 0.5rem;
    }

    .feature p {
        color: #555;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* --- WHY SECTION --- */
    .why-section {
        padding: 6rem 1.5rem;
        text-align: center;
        max-width: 1000px;
        margin: 0 auto;
    }

    .why-section h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #b71c1c;
        margin-bottom: 1rem;
    }

    .why-section img {
        width: 100%;
        border-radius: 1rem;
        margin: 2rem 0;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .why-section p {
        color: #444;
        font-size: 1.05rem;
        line-height: 1.8;
        max-width: 800px;
        margin: 0 auto 2rem auto;
    }

    /* --- ANIMATION --- */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <h1>Bienvenue sur <span class="text-[#00c896]">Loto Mada</span> 🎉</h1>
        <p>La première plateforme de loterie 100% en ligne à Madagascar. Jouez, gagnez et vivez l’excitation des tirages en temps réel.</p>
        <div class="cta-buttons">
            <a href="#" class="btn-cta btn-green"><i class="fa-solid fa-play mr-2"></i> Jouer maintenant</a>
            <a href="#" class="btn-cta btn-white"><i class="fa-solid fa-user-plus mr-2"></i> Créer un compte</a>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="features">
    <h2>Pourquoi choisir Loto Mada ?</h2>
    <div class="feature-grid">

        <div class="feature">
            <img src="https://plus.unsplash.com/premium_vector-1721296175149-989d7fc11dd2?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=880" alt="Sécurité en ligne">
            <div class="feature-content">
                <i class="fa-solid fa-shield-halved"></i>
                <h3>Sécurité garantie</h3>
                <p>Vos transactions et vos données sont protégées par une technologie de cryptage de pointe.</p>
            </div>
        </div>

        <div class="feature">
            <img src="https://images.unsplash.com/reserve/oGLumRxPRmemKujIVuEG_LongExposure_i84.jpeg?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1173" alt="Tirages rapides">
            <div class="feature-content">
                <i class="fa-solid fa-bolt"></i>
                <h3>Tirages rapides</h3>
                <p>Découvrez les résultats en temps réel, chaque tirage est certifié et vérifiable.</p>
            </div>
        </div>

        <div class="feature">
            <img src="https://plus.unsplash.com/premium_photo-1701121214648-245e9c86cc92?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=880" alt="Gains instantanés">
            <div class="feature-content">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <h3>Gains instantanés</h3>
                <p>Retirez vos gains directement sur votre compte en quelques clics, sans frais cachés.</p>
            </div>
        </div>
    </div>
</section>

<!-- WHY SECTION -->
<section class="why-section">
    <h2>Une nouvelle ère du jeu responsable à Madagascar 🎯</h2>

    <img src="https://images.unsplash.com/photo-1758522487244-b0fd13f11937?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1332" alt="Joueur heureux">

    <p>
        <strong>Loto Mada</strong> révolutionne la manière de jouer en ligne. 
        Nous mettons la transparence, la sécurité et la responsabilité au cœur de notre plateforme.  
        Chaque joueur dispose d’un tableau de bord clair pour suivre ses jeux et ses gains en toute simplicité.  
    </p>

    <p>
        En rejoignant <strong>Loto Mada</strong>, vous participez à une expérience moderne et fiable, tout en soutenant 
        le développement d’un jeu responsable à Madagascar. Parce que le plaisir du jeu doit toujours rimer avec sécurité et maîtrise.
    </p>

    <a href="#" class="btn-cta btn-green mt-6 inline-block">
        <i class="fa-solid fa-circle-info mr-2"></i> En savoir plus
    </a>
</section>
@endsection
