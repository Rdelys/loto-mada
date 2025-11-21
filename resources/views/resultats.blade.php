@extends('layouts.app')

@section('title', 'Résultats des tirages - Loto Mada')

@section('content')

<style>
/* CONTAINER PREMIUM */
.result-container{
    max-width:1000px;
    margin:auto;
    padding:40px;
    border-radius:32px;
    background:rgba(255,255,255,0.05);
    border:1px solid rgba(255,255,255,0.10);
    backdrop-filter:blur(14px);
    box-shadow:0 12px 55px rgba(0,0,0,0.45);
    animation:fade .8s ease;
}

@keyframes fade{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1;}
}

.result-title{
    font-size:38px;
    font-weight:900;
    text-align:center;
    color:#ffd166;
    text-shadow:0 3px 10px rgba(255,209,102,0.35);
}

.result-sub{
    text-align:center;
    font-size:18px;
    opacity:0.85;
    margin:15px 0 35px;
}

/* CARROUSEL */
.carousel-wrapper{
    position:relative;
    overflow:hidden;
}

.carousel{
    display:flex;
    gap:26px;
    overflow-x:auto;
    scroll-snap-type:x mandatory;
    scroll-behavior:smooth;
    padding-bottom:12px;
}

.carousel::-webkit-scrollbar{
    height:6px;
}
.carousel::-webkit-scrollbar-thumb{
    background:linear-gradient(120deg,#ffd166,#ffdb99);
    border-radius:20px;
}

/* CARDS PREMIUM */
.result-card{
    min-width:300px;
    flex:0 0 300px;
    scroll-snap-align:center;
    padding:28px;
    border-radius:24px;
    background:rgba(255,255,255,0.04);
    border:1px solid rgba(255,255,255,0.075);
    backdrop-filter:blur(10px);

    box-shadow:
        0 0 18px rgba(255,209,102,0.22),
        0 0 6px rgba(255,255,255,0.10);
    animation:borderGlow 6s linear infinite alternate;
}

@keyframes borderGlow {
    0% { border-color:rgba(255,209,102,0.15); }
    100% { border-color:rgba(255,209,102,0.40); }
}

/* BADGE ZONE (toujours en haut !) */
.badge-area{
    display:flex;
    justify-content:flex-end;
    margin-bottom:15px;
}

/* BADGES */
.winner{
    padding:7px 18px;
    font-weight:800;
    font-size:12px;
    border-radius:20px;
    text-transform:uppercase;
    letter-spacing:0.6px;
    white-space:nowrap;
}

.win{
    background:rgba(76,255,140,0.18);
    color:#4cff8c;
    border:1px solid rgba(76,255,140,0.40);
    box-shadow:0 0 10px rgba(76,255,140,0.25);
}

.none{
    background:rgba(255,80,80,0.20);
    color:#ff9d9d;
    border:1px solid rgba(255,120,120,0.45);

    box-shadow:
        0 0 6px rgba(255,120,120,0.50),
        inset 0 0 6px rgba(255,80,80,0.25);
}

/* NUMÉROS */
.numbers-block{
    margin-bottom:15px;
}

.numbers{
    font-size:17px;
    font-weight:700;
    color:#ffe9b0;
    line-height:1.4;
}

/* JACKPOT */
.somme{
    margin-top:8px;
    font-size:19px;
    font-weight:800;
    color:#ffd166;
    text-shadow:0 0 6px rgba(255,209,102,0.45);
}

/* BUTTONS CARROUSEL */
.carousel-btn{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    width:48px;
    height:48px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.10);
    backdrop-filter:blur(6px);
    cursor:pointer;
    box-shadow:0 6px 20px rgba(0,0,0,0.35);
}

.carousel-btn i{
    color:#ffd166;
    font-size:20px;
}

.prev-btn{ left:-5px; }
.next-btn{ right:-5px; }

@media(max-width:768px){
    .carousel-btn{ display:none; }
    .result-card{ min-width:85%; }
}
</style>



<div class="result-container">

    <h1 class="result-title">Résultats des tirages</h1>

    <p class="result-sub">
        Derniers tirages officiels du <strong>Loto Mada</strong>.<br>
        Numéros gagnants, bonus & jackpots attribués.
    </p>

    <div class="carousel-wrapper">

        @if(count($tirages) > 5)
        <div class="carousel-btn prev-btn" onclick="carouselScroll(-1)">
            <i class="fa-solid fa-chevron-left"></i>
        </div>

        <div class="carousel-btn next-btn" onclick="carouselScroll(1)">
            <i class="fa-solid fa-chevron-right"></i>
        </div>
        @endif

        <div class="carousel" id="tirageCarousel">

            @foreach($tirages as $t)

            <div class="result-card">

                {{-- BADGE FIXE EN HAUT --}}
                <div class="badge-area">
                    @if($t->winner_id)
                        <span class="winner win">Gagné</span>
                    @else
                        <span class="winner none">Aucun gagnant</span>
                    @endif
                </div>

                {{-- NUMÉROS --}}
                <div class="numbers-block">
                    <div class="numbers">
                        Numéros : {{ implode(', ', $t->numbers) }}
                    </div>
                    <div class="numbers">
                        Bonus : {{ $t->bonus }}
                    </div>
                </div>

                {{-- JACKPOT --}}
                <div class="somme">
                    Jackpot : {{ number_format($t->jackpot_somme, 0, ',', ' ') }} Ar
                </div>

                {{-- DATE --}}
                <small style="opacity:0.65; display:block; margin-top:6px;">
                    Tirage du {{ $t->created_at->format('d/m/Y H:i') }}
                </small>

            </div>

            @endforeach

        </div>
    </div>
</div>

<script>
function carouselScroll(direction){
    const carousel = document.getElementById("tirageCarousel");
    const cardWidth = 320;
    carousel.scrollLeft += direction * cardWidth;
}
</script>

@endsection
