@extends('layouts.app')

@section('title', 'Loto Mada - Loterie en ligne à Madagascar | Jouez et Gagnez en Sécurité')

@section('content')
<style>
/* ---------------- HERO SECTION ---------------- */
.hero {
    position: relative;
    background: url('https://plus.unsplash.com/premium_photo-1718191345799-30f50e04a57a?auto=format&fit=crop&q=80&w=1600') center/cover no-repeat;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
}

.hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.55);
    backdrop-filter: blur(2px);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    padding: 0 1.5rem;
    animation: fadeIn 1s ease-in-out;
}

.hero h1 {
    font-size: clamp(2.5rem, 6vw, 4.2rem);
    font-weight: 800;
    letter-spacing: -0.03em;
    color: #fff;
    text-shadow: 0 4px 15px rgba(0,0,0,0.4);
}

.hero p {
    margin-top: 1rem;
    font-size: clamp(1rem, 1.5vw, 1.3rem);
    color: #e5e5e5;
    line-height: 1.8;
}

/* CTA Buttons */
.cta-buttons {
    margin-top: 2rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.btn-cta {
    padding: 1rem 2.4rem;
    border-radius: 50px;
    font-weight: 600;
    text-transform: uppercase;
    transition: all 0.3s ease;
    font-size: 1rem;
    letter-spacing: 0.5px;
}

.btn-green {
    background-color: #00b57f;
    color: white;
    box-shadow: 0 8px 24px rgba(0,181,127,0.35);
}

.btn-green:hover {
    background-color: #00936a;
    transform: translateY(-4px);
}

.btn-white {
    background-color: white;
    color: #00b57f;
    border: 1px solid #00b57f;
}

.btn-white:hover {
    background-color: #00b57f;
    color: white;
    transform: translateY(-4px);
}

/* ---------------- FEATURES (Cards) ---------------- */
.features {
    background: #f7f9fa;
    padding: 6rem 1.5rem;
}

.features h2 {
    text-align: center;
    font-size: 2.3rem;
    font-weight: 800;
    color: #036b52;
    margin-bottom: 3rem;
    letter-spacing: -0.01em;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2.5rem;
    max-width: 1100px;
    margin: 0 auto;
}

/* Card Premium Style */
.feature {
    position: relative;
    overflow: hidden;
    border-radius: 1.2rem;
    height: 340px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    transition: all 0.4s ease;
}

.feature img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(70%);
    transition: all 0.5s ease;
}

.feature:hover img {
    transform: scale(1.08);
    filter: brightness(60%);
}

.feature-content {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    padding: 1.5rem;
    text-align: center;
    background: rgba(0, 0, 0, 0.25);
    backdrop-filter: blur(2px);
}

.feature i {
    font-size: 2.5rem;
    color: #00c896;
    margin-bottom: 1rem;
}

.feature h3 {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
}

.feature p {
    font-size: 1rem;
    max-width: 80%;
    color: #e5e5e5;
    line-height: 1.6;
}

/* ---------------- WHY SECTION ---------------- */
.why-section {
    padding: 6rem 1.5rem;
    text-align: center;
    max-width: 1000px;
    margin: 0 auto;
}

.why-section h2 {
    font-size: 2.2rem;
    font-weight: 800;
    color: #b71c1c;
    margin-bottom: 1rem;
}

.why-section img {
    width: 100%;
    border-radius: 1.2rem;
    margin: 2.5rem 0;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}

.why-section p {
    color: #444;
    font-size: 1.05rem;
    line-height: 1.8;
    margin-bottom: 1.5rem;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <h1>Jouez et gagnez avec <span style="color:#00c896;">Loto Mada</span> 🎯</h1>
        <p>Découvrez la première loterie en ligne de Madagascar. Une expérience 100% sécurisée, moderne et transparente, où chaque tirage compte.</p>
        <div class="cta-buttons">
            <a href="#" class="btn-cta btn-green"><i class="fa-solid fa-play mr-2"></i> Jouer maintenant</a>
            <a href="#" class="btn-cta btn-white"><i class="fa-solid fa-user-plus mr-2"></i> Créer un compte</a>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="features" id="features">
    <h2>Pourquoi choisir Loto Mada ?</h2>

    <div class="feature-grid">
        <div class="feature">
            <img src="https://plus.unsplash.com/premium_vector-1721296175149-989d7fc11dd2?auto=format&fit=crop&q=80&w=880" alt="Sécurité en ligne Loto Mada">
            <div class="feature-content">
                <i class="fa-solid fa-shield-halved"></i>
                <h3>Sécurité garantie</h3>
                <p>Vos transactions sont cryptées avec les dernières technologies pour une protection totale de vos données.</p>
            </div>
        </div>

        <div class="feature">
            <img src="https://images.unsplash.com/reserve/oGLumRxPRmemKujIVuEG_LongExposure_i84.jpeg?auto=format&fit=crop&q=80&w=1173" alt="Tirages rapides Madagascar">
            <div class="feature-content">
                <i class="fa-solid fa-bolt"></i>
                <h3>Tirages en direct</h3>
                <p>Assistez aux tirages en temps réel, vérifiés et transparents, pour une expérience immersive et fiable.</p>
            </div>
        </div>

        <div class="feature">
            <img src="https://plus.unsplash.com/premium_photo-1701121214648-245e9c86cc92?auto=format&fit=crop&q=80&w=880" alt="Gains instantanés Loto Mada">
            <div class="feature-content">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <h3>Gains instantanés</h3>
                <p>Encaissez vos gains en quelques clics, sans délais ni frais cachés. Gagnez et profitez en toute liberté.</p>
            </div>
        </div>
    </div>
</section>

<!-- WHY SECTION -->
<section class="why-section">
    <h2>Loto Mada : Le jeu responsable et gagnant à Madagascar 🎉</h2>
    <img src="https://images.unsplash.com/photo-1758522487244-b0fd13f11937?auto=format&fit=crop&q=80&w=1332" alt="Joueur heureux Madagascar">
    <p><strong>Loto Mada</strong> incarne une nouvelle génération de loterie en ligne, alliant sécurité, rapidité et responsabilité. Chaque joueur bénéficie d’un espace personnel clair et sécurisé pour suivre ses jeux et ses gains.</p>
    <p>Rejoignez la communauté <strong>Loto Mada</strong> et vivez l’émotion du jeu en toute confiance. Ensemble, faisons du plaisir du jeu une expérience maîtrisée et enrichissante.</p>
    <a href="#" class="btn-cta btn-green mt-6 inline-block"><i class="fa-solid fa-circle-info mr-2"></i> En savoir plus</a>
</section>
@endsection
