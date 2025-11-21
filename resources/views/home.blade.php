@extends('layouts.app')

@section('title', 'Accueil — Loto Mada')

@section('content')

<style>
/* ======================= */
/* STYLE PREMIUM MADA GOLD */
/* ======================= */

/* IMPORTANT : garder la transparence */

/* Hero amélioré */
.hero {
    width: 100%;
    border-radius: 32px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255,255,255,0.08);
    box-shadow: 0 18px 60px rgba(0,0,0,0.40);
    margin-bottom: 40px;
    text-align: center;
    animation: fadeIn 0.6s ease-out;
}

/* Animation */
@keyframes fadeIn {
  0% { opacity:0; transform: translateY(20px); }
  100%{ opacity:1; transform:translateY(0); }
}

.hero-title {
    font-size: 34px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1px;
    background: linear-gradient(120deg, #ffd166, #fff);
    -webkit-background-clip: text;
    color: transparent;
}

.jackpot-amount {
    font-size: 58px;
    font-weight: 900;
    color: #ffcc55;
    text-shadow: 0 0 25px rgba(255,200,0,0.45);
}

/* Countdown */
.countdown {
    display: flex;
    justify-content: center;
    gap: 18px;
    margin-top: 22px;
}

.count-box {
    background: rgba(0,0,0,0.25);
    padding: 10px 14px;
    border-radius: 12px;
    color: #ffd166;
    font-size: 17px;
    font-weight: 900;
    box-shadow: 0 8px 20px rgba(0,0,0,0.4);
}
.count-box small {
    display: block;
    font-size: 10px;
    opacity: .7;
}

/* =============================== */
/* SECTION TICKET (compact & gold) */
/* =============================== */
.ticket-wrapper {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
}

.left-panel {
    flex: 1;
    min-width: 360px;
    padding: 18px;
    border-radius: 20px;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.06);
    box-shadow: 0 10px 30px rgba(0,0,0,0.35);
}

.ticket-title {
    font-size: 20px;
    font-weight: 800;
    margin-bottom: 10px;
    color: #fff3c6;
}

/* GRID COMPACT */
.number-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 6px !important;
    margin-bottom: 10px;
}

/* NUMÉROS COMPACTS PREMIUM */
.number-btn {
    width: 38px !important;
    height: 38px !important;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,0.10);
    background: rgba(255,255,255,0.05);
    font-size: 14px !important;
    font-weight: 700;
    color: #ffd166;
    display:flex;
    justify-content:center;
    align-items:center;
    cursor: pointer;
    transition: 0.15s;
}

/* Hover discret */
.number-btn:hover {
    background: rgba(255,255,255,0.12);
    transform: translateY(-2px);
}

/* Active */
.number-btn.active {
    background: linear-gradient(120deg, #ffd166, #ffe6a4);
    color: #2b2a2a !important;
    box-shadow: 0 0 10px rgba(255,209,102,0.5);
}

/* RIGHT PANEL */
.right-panel {
    width: 330px;
    min-width: 280px;
    background: rgba(255,255,255,0.05);
    border-radius: 20px;
    padding: 20px;
    border: 1px solid rgba(255,255,255,0.10);
    box-shadow: 0 15px 40px rgba(0,0,0,0.40);
}

.buy-box-title {
    font-size: 18px;
    font-weight: 800;
    margin-bottom: 8px;
}

.price-tag {
    font-size: 30px;
    font-weight: 900;
    color: #ffd166;
    text-shadow: 0 0 10px rgba(255,209,102,0.6);
}

.buy-btn {
    margin-top: 20px;
    width: 100%;
    padding: 12px;
    border-radius: 16px;
    background: linear-gradient(120deg, #ffd166, #ffe7a6);
    color: #111;
    font-size: 16px;
    font-weight: 900;
    border: none;
    cursor: pointer;
    transition: 0.15s;
}
.buy-btn:hover {
    transform: translateY(-2px);
    filter: brightness(1.1);
}

/* Ticker rules */
.rules-ticker-wrapper {
    margin-top: 18px;
    overflow: hidden;
    white-space: nowrap;
    border-top:1px solid rgba(255,255,255,0.12);
    border-bottom:1px solid rgba(255,255,255,0.12);
    padding: 10px 0;
}

.rules-ticker {
    display:inline-block;
    font-size: 12px;
    color: #ffd166;
    animation: scroll 16s linear infinite;
}

@keyframes scroll {
    0% { transform: translateX(100%); }
    100%{ transform: translateX(-200%); }
}

/* ====================== */
/* CARDS PREMIUM (SEO)   */
/* ====================== */
.cards-section {
    margin-top: 50px;
}

.cards-title {
    font-size: 24px;
    font-weight: 900;
    margin-bottom: 20px;
    color: #ffdd88;
    text-transform: uppercase;
}

.cards {
    display:flex;
    gap:25px;
    flex-wrap:wrap;
}

.card {
    flex:1;
    min-width:260px;
    padding:20px;
    border-radius:18px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    box-shadow: 0 10px 30px rgba(0,0,0,0.45);
}

.card h3 {
    color:#ffd166;
    font-size:18px;
    margin-bottom:10px;
    font-weight:900;
}

.card p {
    color: #e6e6e6;
    font-size:14px;
    line-height:1.6;
}

/* ========================== */
/* SEO TEXT BLOCK (big)      */
/* ========================== */
.seo-block {
    margin-top:40px;
    padding:25px;
    border-radius:18px;
    background: rgba(255,255,255,0.03);
    border:1px solid rgba(255,255,255,0.08);
    color:#ddd;
    line-height:1.7;
    font-size:15px;
}

/* ====================== */
/* FAQ SECTION            */
/* ====================== */
.faq-section {
    margin-top:40px;
}

.faq-title {
    font-size:22px;
    font-weight:900;
    color:#ffd166;
    margin-bottom:20px;
}

.faq-item {
    background: rgba(255,255,255,0.03);
    padding:14px;
    border-radius:14px;
    margin-bottom:10px;
    border: 1px solid rgba(255,255,255,0.06);
}

.faq-item summary {
    cursor:pointer;
    font-weight:800;
    color:#fff3c6;
}

.faq-item p {
    margin-top:8px;
    color:#e4e4e4;
}

/* RESPONSIVE */
/* RESPONSIVE */
@media(max-width:900px){
    .ticket-wrapper { flex-direction: column; }
    .right-panel { width: 100%; }
}
</style>



<!-- ================= -->
<!--      HERO         -->
<!-- ================= -->
<div class="hero">
    <div class="hero-title">Lucky Day — Tirage Officiel</div>

    @if(isset($jackpot_actif))
        <p style="opacity:.8;">
            Jackpot du :  
            <strong>{{ $jackpot_actif->date_debut }} → {{ $jackpot_actif->date_fin }}</strong>
        </p>
    @else
        <p style="opacity:.8;">Aucun jackpot en cours</p>
    @endif

    @if(isset($jackpot_actif))
    <div id="countdown-wrapper" class="countdown">
        <div class="count-box"><span id="d">00</span> <small>JOURS</small></div>
        <div class="count-box"><span id="h">00</span> <small>HEURES</small></div>
        <div class="count-box"><span id="m">00</span> <small>MINUTES</small></div>
        <div class="count-box"><span id="s">00</span> <small>SECONDES</small></div>
    </div>
    @else
    <div class="countdown">
        <div class="count-box">-- <small>JOURS</small></div>
        <div class="count-box">-- <small>HEURES</small></div>
        <div class="count-box">-- <small>MINUTES</small></div>
        <div class="count-box">-- <small>SECONDES</small></div>
    </div>
    @endif


    @if(isset($jackpot_actif))
        <div class="jackpot-amount">
            {{ number_format($jackpot_actif->somme, 0, ',', ' ') }} Ar
        </div>
    @else
        <div class="jackpot-amount">-----</div>
    @endif
</div>


<!-- ======== NUMÉROS + PANEL ======== -->
<div class="ticket-wrapper">

    <div class="left-panel">

        <div class="ticket-title">Choisissez vos numéros</div>

        <h4>Jours (5 numéros)</h4>
        <div class="number-grid" id="days-grid">
            @for ($i = 1; $i <= 49; $i++)
                <div class="number-btn day-btn">{{ sprintf("%02d", $i) }}</div>
            @endfor
        </div>

        <h4 style="margin-top:12px;">Bonus (1 à 10)</h4>
        <div class="number-grid" style="grid-template-columns: repeat(5,1fr);" id="month-grid">
            @for ($i = 1; $i <= 10; $i++)
                <div class="number-btn month-btn">{{ sprintf("%02d", $i) }}</div>
            @endfor
        </div>

    </div>


    <!-- RIGHT PANEL -->
    <div class="right-panel">

        <div class="buy-box-title">Votre Participation</div>
        <div class="price-tag">2000 Ar</div>

        <button class="buy-btn">Valider mon Ticket</button>

        <div class="rules-ticker-wrapper">
            <div class="rules-ticker">
                Cat.8 : 2 numéros • Cat.7 : 2+bonus • Cat.6 : 3 nums • Cat.5 : 3+bonus •
                Cat.4 : 4 nums • Cat.3 : 4+bonus • Cat.2 : 5 nums • Cat.1 : 5+bonus —
                Ticket : 2000 Ar — Jackpot : 250 000 000 Ar
            </div>
        </div>

    </div>

</div>


<!-- ========================= -->
<!--       CARDS PREMIUM       -->
<!-- ========================= -->
<div class="cards-section">
    <div class="cards-title">Pourquoi jouer au Loto Madagascar ?</div>

    <div class="cards">
        <div class="card">
            <h3>Tirage national sécurisé</h3>
            <p>Nos tirages sont contrôlés, vérifiés et enregistrés afin de garantir une totale transparence.</p>
        </div>

        <div class="card">
            <h3>Jackpots exceptionnels</h3>
            <p>Un jackpot de 250 millions Ariary, accessible pour seulement 2000 Ar par ticket.</p>
        </div>

        <div class="card">
            <h3>Expérience premium</h3>
            <p>Design moderne, interface intuitive et achat de ticket ultra-simple.</p>
        </div>
    </div>
</div>



<!-- ========================= -->
<!-- BLOCK SEO (long)         -->
<!-- ========================= -->
<div class="seo-block">
    <h3 style="color:#ffd166; font-size:20px; font-weight:900;">Loto Mada — Jouez en toute confiance</h3>
    <p>Le <strong>Loto Madagascar</strong> vous permet de participer chaque semaine à un tirage officiel avec des règles simples : choisissez cinq numéros entre 1 et 49, puis un numéro bonus entre 1 et 10. Le prix du ticket est de seulement 2000 Ariary, ce qui en fait l’une des loteries les plus accessibles du pays.</p>
    <p>Notre plateforme met en avant un environnement sécurisé, des transactions vérifiées et une interface agréable inspirée des standards internationaux, tout en gardant une identité locale chaleureuse aux couleurs du Madagascar Gold.</p>
    <p>Chaque ticket acheté contribue au développement du divertissement responsable dans tout le pays.</p>
</div>



<!-- ========================= -->
<!--         FAQ              -->
<!-- ========================= -->
<div class="faq-section">
    <div class="faq-title">Questions fréquentes</div>

    <div class="faq-item">
        <summary>Comment participer au tirage ?</summary>
        <p>Choisissez vos numéros, ajoutez un bonus, et validez votre ticket pour 2000 Ar.</p>
    </div>

    <div class="faq-item">
        <summary>Comment connaître les résultats ?</summary>
        <p>Les résultats du tirage sont affichés sur le site après validation officielle.</p>
    </div>

    <div class="faq-item">
        <summary>Peut-on jouer depuis un téléphone ?</summary>
        <p>Oui, le site est 100% responsive et compatible mobile.</p>
    </div>
</div>



<!-- ========================= -->
<!-- JS INTERACTIF (inchangé) -->
<!-- ========================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const maxDays = 5;
    const dayButtons = document.querySelectorAll(".day-btn");

    dayButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            if(btn.classList.contains("active")) {
                btn.classList.remove("active");
                return;
            }

            let selected = document.querySelectorAll(".day-btn.active").length;
            if(selected >= maxDays) {
                alert("Vous devez choisir exactement 5 numéros.");
                return;
            }

            btn.classList.add("active");
        });
    });

    const monthButtons = document.querySelectorAll(".month-btn");
    monthButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            monthButtons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
        });
    });

    document.querySelector(".buy-btn").addEventListener("click", () => {
        const chosen = [...document.querySelectorAll(".day-btn.active")].map(x => x.textContent);
        const bonus = document.querySelector(".month-btn.active")?.textContent;

        if(chosen.length !== 5) {
            alert("Veuillez choisir exactement 5 numéros.");
            return;
        }
        if(!bonus) {
            alert("Veuillez sélectionner votre numéro bonus.");
            return;
        }

        alert("Ticket validé :\n\nNuméros : " + chosen.join(", ") + "\nBonus : " + bonus + "\nPrix : 2000 Ar");
    });
});

@if(isset($jackpot_actif))

let dateDebut = new Date("{{ $jackpot_actif->date_debut }} 00:00:00").getTime();
let dateFin   = new Date("{{ $jackpot_actif->date_fin }} 23:59:59").getTime();

setInterval(function() {
    let now = new Date().getTime();
    let dSpan = document.getElementById("d");
    let hSpan = document.getElementById("h");
    let mSpan = document.getElementById("m");
    let sSpan = document.getElementById("s");

    // PAS ENCORE COMMENCÉ
    if (now < dateDebut) {
        let diff = dateDebut - now;
        let t = convert(diff);
        dSpan.innerText = t.days;
        hSpan.innerText = t.hours;
        mSpan.innerText = t.minutes;
        sSpan.innerText = t.seconds;
        return;
    }

    // COMPTE À REBOURS EN COURS
    let diff = dateFin - now;

    if (diff <= 0) {
        dSpan.innerText = "00";
        hSpan.innerText = "00";
        mSpan.innerText = "00";
        sSpan.innerText = "00";
        return;
    }

    let t = convert(diff);
    dSpan.innerText = t.days;
    hSpan.innerText = t.hours;
    mSpan.innerText = t.minutes;
    sSpan.innerText = t.seconds;

}, 1000);

function convert(ms) {
    let seconds = Math.floor(ms / 1000);
    let days = Math.floor(seconds / 86400);
    seconds %= 86400;

    let hours = Math.floor(seconds / 3600);
    seconds %= 3600;

    let minutes = Math.floor(seconds / 60);
    seconds %= 60;

    return {
        days: pad(days),
        hours: pad(hours),
        minutes: pad(minutes),
        seconds: pad(seconds),
    };
}

function pad(n) {
    return (n < 10 ? "0" : "") + n;
}

@endif

</script>

@endsection
