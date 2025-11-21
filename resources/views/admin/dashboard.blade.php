<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin – Dashboard Loto Mada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        :root{
            --gold:#ffd166;
            --gold-light:#ffe9b0;
            --dark:#0b1120;
            --glass:rgba(255,255,255,0.06);
            --radius:18px;
            --transition:0.35s ease;
        }

        body{
            padding-top: 10px; /* évite que le contenu passe sous la navbar */
            background:var(--dark);
            color:white;
            font-family:Inter, sans-serif;
        }

        .navbar{
    width:100%;
    position:fixed;
    top:0;
    left:0;
    background:rgba(255,255,255,0.06);
    border-bottom:1px solid rgba(255,255,255,0.15);
    backdrop-filter:blur(12px);
    padding:10px 20px;
    display:flex;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;
    z-index:3000;
}

        .logo{
            font-size:22px;
            font-weight:900;
            background:linear-gradient(120deg,var(--gold),#fff);
            -webkit-background-clip:text;
            color:transparent;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .nav-links{
            display:flex;
            align-items:center;
            gap:20px;
        }

        .nav-links a{
            padding:10px 16px;
            color:var(--gold);
            text-decoration:none;
            border-radius:var(--radius);
            transition:var(--transition);
            display:flex;
            align-items:center;
            gap:10px;
            cursor:pointer;
            font-weight:500;
        }

        .nav-links a:hover{
            background:rgba(255,255,255,0.15);
        }

        .nav-links a.active{
            background:rgba(255,255,255,0.20);
        }

        /* SUBMENU */
.dropdown {
    position: relative;
}

.dropdown > a {
    cursor: pointer;
}

.dropdown-menu {
    position: absolute;
    top: 45px;
    left: 0;
    background: rgba(255,255,255,0.10);
    border: 1px solid rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    padding: 10px 0;
    border-radius: var(--radius);
    min-width: 200px;
    display: none;
    flex-direction: column;
    z-index: 9999;
}

.dropdown.open .dropdown-menu {
    display: flex;
}

.dropdown-menu a {
    padding: 12px 18px;
    font-size: 14px;
    color: var(--gold);
}

.dropdown-menu a:hover {
    background: rgba(255,255,255,0.15);
}


        /* MOBILE MENU */
        .hamburger{
            display:none;
            font-size:26px;
            cursor:pointer;
            color:var(--gold);
        }

        @media(max-width:900px){
            .nav-links{
                position:fixed;
                top:70px;
                left:0;
                width:100%;
                background:rgba(0,0,0,0.75);
                backdrop-filter:blur(8px);
                flex-direction:column;
                padding:20px 0;
                border-bottom:1px solid rgba(255,255,255,0.15);
                display:none;
            }

            .nav-links.show{
                display:flex;
            }

            .dropdown-menu{
                position:relative;
                top:0;
                border:none;
                background:transparent;
            }

            .hamburger{
                display:block;
            }
        }


        /* CONTENT */
        .content{
            padding:120px 40px 40px 40px;
        }

        .section{
            display:none;
            animation:fadeIn .4s ease;
        }

        .section.active{
            display:block;
        }

        @keyframes fadeIn{
            from{opacity:0; transform:translateY(10px);}
            to{opacity:1; transform:translateY(0);}
        }

        /* CARD */
        .card{
            padding:30px;
            backdrop-filter:blur(12px);
            margin-bottom:30px;
        }

        .title{
            font-size:24px;
            font-weight:700;
            margin-bottom:8px;
            color:var(--gold);
        }

        /* BTN GOLD */
        .btn-gold{
            background:var(--gold);
            color:black;
            padding:10px 16px;
            border:none;
            border-radius:var(--radius);
            font-weight:600;
            cursor:pointer;
            transition:var(--transition);
            margin-bottom:20px;
        }

        .btn-gold:hover{
            background:var(--gold-light);
        }

        /* TABLE */
        .jackpot-table{
            width:100%;
            border-collapse:collapse;
            background:rgba(255,255,255,0.05);
            border-radius:var(--radius);
            overflow:hidden;
            margin-top:20px;
        }

        .jackpot-table th, .jackpot-table td{
            padding:14px;
            text-align:left;
        }

        .jackpot-table tr:nth-child(even){
            background:rgba(255,255,255,0.03);
        }

        .table-btn{
            padding:6px 12px;
            border:none;
            border-radius:var(--radius);
            cursor:pointer;
        }

        .table-btn.edit{ background:#4ea8de; }
        .table-btn.delete{ background:#e63946; }

        /* MODAL */
        .modal-overlay{
            position:fixed;
            top:0; left:0;
            width:100%; height:100%;
            background:rgba(0,0,0,0.65);
            display:none;
            justify-content:center;
            align-items:center;
            z-index:5000;
        }

        .modal-box{
            background:var(--glass);
            padding:30px;
            width:360px;
            border-radius:var(--radius);
            border:1px solid rgba(255,255,255,0.15);
            backdrop-filter:blur(12px);
        }

        .modal-box input{
            width:100%;
            padding:10px;
            margin:6px 0 15px 0;
            border-radius:var(--radius);
            border:none;
        }

        .modal-actions{
            display:flex;
            justify-content:flex-end;
            gap:10px;
        }

        .btn-cancel{
            background:#aaa;
            padding:8px 12px;
            border:none;
            border-radius:var(--radius);
        }

        .btn-save{
            background:var(--gold);
            padding:8px 12px;
            border:none;
            border-radius:var(--radius);
            color:black;
            font-weight:700;
        }

        #deleteJackpotModal p{
            margin:15px 0;
            opacity:0.8;
        }

        .modal-box select.modal-select{
            width:100%;
            padding:10px;
            margin:6px 0 15px 0;
            border-radius:var(--radius);
            border:none;
            background:white;
            color:black;
        }

.status-tag {
    padding: 4px 10px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 12px;
    display: inline-block;
}

.status-jouer {
    background: rgba(255, 209, 102, 0.2);
    color: #ffd166;
}

.status-gagne {
    background: rgba(76, 255, 140, 0.2);
    color: #4cff8c;
}

.status-perdu {
    background: rgba(255, 110, 110, 0.2);
    color: #ff6e6e;
}

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">
        <i class="fa-solid fa-shield-halved"></i> Admin Loto Mada
    </div>

    <i class="fa-solid fa-bars hamburger" onclick="toggleMenu()"></i>

    <div class="nav-links" id="navLinks">

        <a data-section="dashboard" class="active">
            <i class="fa-solid fa-chart-line"></i> Dashboard
        </a>

        <a data-section="tirage">
            <i class="fa-solid fa-bullseye"></i> Tirage
        </a>

        <a data-section="jackpots">
            <i class="fa-solid fa-clock"></i> Temps & Jackpots
        </a>

        <a data-section="tickets-user">
            <i class="fa-solid fa-hashtag"></i> N° Misés
        </a>

        <div class="dropdown">
            <a>
                <i class="fa-solid fa-list"></i> Listes <i class="fa-solid fa-caret-down"></i>
            </a>

            <div class="dropdown-menu">
                <a data-section="liste-tirages"><i class="fa-solid fa-list-ol"></i> Liste des tirages</a>
                <a data-section="vainqueurs"><i class="fa-solid fa-trophy"></i> Vainqueurs</a>
            </div>
        </div>

        <a data-section="utilisateurs">
            <i class="fa-solid fa-users"></i> Utilisateurs
        </a>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="nav-links a" style="background:rgba(255,255,255,0.12);border:none;padding:10px 16px;border-radius:var(--radius);color:white;cursor:pointer;">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </form>

    </div>

</div>



<!-- CONTENT -->
<div class="content">

    <!-- DASHBOARD -->
    <div class="section active" id="dashboard">
        <div class="card">
             @if(isset($jackpot_actif))
            <div class="card">
                <div class="title">Compte à rebours du Jackpot actif</div>

                <p>
                    Du <b>{{ $jackpot_actif->date_debut }}</b>  
                    au <b>{{ $jackpot_actif->date_fin }}</b>
                </p>

                <h2 id="countdown" style="font-size:32px;font-weight:900;color:var(--gold);">
                    Chargement...
                </h2>

            </div>

            @else
            <div class="card">
                <div class="title">Aucun jackpot lancé</div>
                <p>Changez le statut d’un jackpot en <b>Lancer</b> pour activer le compte à rebours.</p>
            </div>
            @endif
            <div class="cards-row" style="display:flex;gap:20px;flex-wrap:wrap;margin-top:20px;">

                <div class="card" style="flex:1;min-width:220px;">
                    <div class="title">Jackpots terminés</div>
                    <p style="font-size:26px;font-weight:900;color:var(--gold);">
                        {{ $jackpots_termine }}
                    </p>
                </div>

                <div class="card" style="flex:1;min-width:220px;">
                    <div class="title">Jackpots à planifier</div>
                    <p style="font-size:26px;font-weight:900;color:var(--gold);">
                        {{ $jackpots_planifier }}
                    </p>
                </div>
            </div>           
        </div>
    </div>

    <!-- TIRAGE -->
    <div class="section" id="tirage">
        <div class="card">
            <div class="card">
                <div class="title">Gestion des Tirages</div>

                <button class="btn-gold" onclick="genererTirage()">🎯 Lancer un tirage</button>

                <p id="resultat-tirage" style="margin-top:20px;"></p>

                <!-- 🟡 Tableau des tirages -->
                <h3 style="margin-top:25px;color:#ffd166;">Historique des Tirages</h3>

                <table class="jackpot-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Numéros</th>
                            <th>Bonus</th>
                            <th>Gagnant ?</th>
                            <th>Utilisateur</th>
                            <th>Somme jackpot</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($tirages as $t)
                        <tr>
                            <td>{{ $t->created_at->format('d/m/Y H:i') }}</td>

                            <td>{{ implode(', ', $t->numbers) }}</td>

                            <td>{{ $t->bonus }}</td>

                            <td>
                                @if($t->winner_id)
                                    <span class="status-tag status-gagne">Gagné</span>
                                @else
                                    <span class="status-tag status-perdu">Aucun gagnant</span>
                                @endif
                            </td>

                            <td>
                                @if($t->winner_id)
                                    {{ $t->winner->pseudo ?? 'N/A' }}
                                @else
                                    -
                                @endif
                            </td>

                            <td>{{ number_format($t->jackpot_somme, 0, ',', ' ') }} Ar</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- JACKPOTS -->
    <div class="section" id="jackpots">
        <div class="card">
            <div class="title">Temps & Jackpots</div>

            <!-- Bouton d’ouverture de la modal -->
            <button class="btn-gold" onclick="openJackpotModal()">
                <i class="fa-solid fa-plus"></i> Ajouter un jackpot
            </button>

            <!-- Tableau statique -->
            <table class="jackpot-table">
                <thead>
                    <tr>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Somme</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jackpots as $j)
                    <tr>
                        <td>{{ $j->date_debut }}</td>
                        <td>{{ $j->date_fin }}</td>
                        <td>{{ number_format($j->somme, 0, ',', ' ') }} Ar</td>
                        <td>{{ $j->status }}</td>

                        <td>
                            <button class="table-btn edit"
                                onclick="openEditJackpotModal({{ $j->id }}, '{{ $j->date_debut }}', '{{ $j->date_fin }}', '{{ $j->somme }}', '{{ $j->status }}')">
                                Modifier
                            </button>

                            <button class="table-btn delete"
                                onclick="openDeleteJackpotModal({{ $j->id }})">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!-- Modal Jackpots -->
    <!-- Modal -->
    <div id="jackpotModal" class="modal-overlay">
        <div class="modal-box">
            <h3>Ajouter un Jackpot</h3>
            <form method="POST" action="{{ route('jackpot.store') }}">
                @csrf

                <label>Date de début</label>
                <input type="date" name="date_debut" required>

                <label>Date de fin</label>
                <input type="date" name="date_fin" required>

                <label>Somme du jackpot</label>
                <input type="number" name="somme" required>

                <label>Status</label>
                <select name="status" class="modal-select">
                    <option>A planifier</option>
                    <option>Lancer</option>
                    <option>Terminer</option>
                </select>

                <div class="modal-actions">
                    <button class="btn-cancel" type="button" onclick="closeJackpotModal()">Annuler</button>
                    <button class="btn-save">Enregistrer</button>
                </div>

                </form>
        </div>
    </div>

    <!-- Modal Modification -->
    <div id="editJackpotModal" class="modal-overlay">
        <div class="modal-box">
            <h3>Modifier le Jackpot</h3>

            <form method="POST" id="editJackpotForm">
                @csrf

                <label>Date de début</label>
                <input type="date" id="edit_date_debut" name="date_debut">

                <label>Date de fin</label>
                <input type="date" id="edit_date_fin" name="date_fin">

                <label>Somme du jackpot</label>
                <input type="number" id="edit_somme" name="somme">

                <label>Status</label>
                <select id="edit_status" name="status" class="modal-select">
                    <option>A planifier</option>
                    <option>Lancer</option>
                    <option>Terminer</option>
                </select>

                <div class="modal-actions">
                    <button class="btn-cancel" type="button" onclick="closeEditJackpotModal()">Annuler</button>
                    <button class="btn-save">Mettre à jour</button>
                </div>

            </form>

        </div>
    </div>

    <!-- Modal Suppression -->
    <div id="deleteJackpotModal" class="modal-overlay">
        <div class="modal-box">
            <h3>Supprimer ce jackpot ?</h3>
            <form method="POST" id="deleteJackpotForm">
                @csrf

                <p>Voulez-vous vraiment supprimer cette entrée ?</p>

                <div class="modal-actions">
                    <button class="btn-cancel" type="button" onclick="closeDeleteJackpotModal()">Non</button>
                    <button class="btn-save" style="background:#e63946;color:white;">Oui</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SECTION : Numéros misés par les utilisateurs -->
    <div class="section" id="tickets-user">
        <div class="card">
            <div class="title">Numéros misés par les utilisateurs</div>

            <table class="jackpot-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Utilisateur</th>
                        <th>Numéros</th>
                        <th>Bonus</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($user_tickets as $t)
                    <tr>
                        <td>{{ $t->created_at->format('d/m/Y H:i') }}</td>

                        <td>{{ $t->user->pseudo }}</td>

                        <td>{{ implode(', ', $t->numbers) }}</td>

                        <td>{{ $t->bonus }}</td>

                        <td>
                            <span class="status-tag 
                                @if($t->status === 'Jouer') status-jouer 
                                @elseif($t->status === 'Gagné') status-gagne 
                                @else status-perdu 
                                @endif">
                                {{ $t->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- Fin Jackpots -->

    <!-- LISTE TIRAGES -->
    <div class="section" id="liste-tirages">
        <div class="card">
            <div class="title">Liste des tirages</div>
            <p>Historique complet des tirages effectués.</p>
        </div>
    </div>

    <!-- VAINQUEURS -->
    <div class="section" id="vainqueurs">
        <div class="card">
            <div class="title">Liste des Vainqueurs</div>
            <p>Retrouvez ici tous les tirages ayant eu un gagnant officiel.</p>

            <table class="jackpot-table">
                <thead>
                    <tr>
                        <th>Date du tirage</th>
                        <th>Gagnant</th>
                        <th>Téléphone</th>
                        <th>Numéros gagnants</th>
                        <th>Bonus</th>
                        <th>Jackpot</th>
                    </tr>
                </thead>

                <tbody>
                @php
                    $vainqueurs = $tirages->whereNotNull('winner_id');
                @endphp

                @if($vainqueurs->isEmpty())
                    <tr>
                        <td colspan="6" style="text-align:center; opacity:0.8; padding:20px;">
                            Aucun vainqueur pour le moment.
                        </td>
                    </tr>
                @else
                    @foreach($vainqueurs as $v)
                        <tr>
                            <td>{{ $v->created_at->format('d/m/Y H:i') }}</td>

                            <td>
                                <strong>{{ $v->winner->pseudo }}</strong><br>
                                <small>{{ $v->winner->nom }} {{ $v->winner->prenom }}</small>
                            </td>

                            <td>{{ $v->winner->telephone }}</td>

                            <td>{{ implode(', ', $v->numbers) }}</td>

                            <td>{{ $v->bonus }}</td>

                            <td style="font-weight:700; color:#ffd166;">
                                {{ number_format($v->jackpot_somme, 0, ',', ' ') }} Ar
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>


    <!-- UTILISATEURS -->
    <div class="section" id="utilisateurs">
        <div class="card">
            <div class="title">Liste des utilisateurs</div>

            <table class="jackpot-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pseudo</th>
                        <th>Nom complet</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Solde</th>
                        <th>Date d'inscription</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->pseudo }}</td>
                        <td>{{ $u->nom }} {{ $u->prenom }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->telephone }}</td>
                        <td>{{ number_format($u->solde, 0, ',', ' ') }} Ar</td>
                        <td>{{ $u->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>


</div>

<script>

function toggleMenu() {
    document.getElementById("navLinks").classList.toggle("show");
}

document.querySelectorAll(".nav-links a[data-section]").forEach(btn => {
    btn.addEventListener("click", () => {

        document.querySelectorAll(".nav-links a").forEach(a => a.classList.remove("active"));
        btn.classList.add("active");

        document.querySelectorAll(".section").forEach(s => s.classList.remove("active"));

        document.getElementById(btn.dataset.section).classList.add("active");

        document.getElementById("navLinks").classList.remove("show");
    });
});

document.querySelectorAll(".dropdown > a").forEach(drop => {
    drop.addEventListener("click", function(e){
        e.stopPropagation(); 
        let parent = this.parentElement;

        // Fermer tous les dropdowns
        document.querySelectorAll(".dropdown").forEach(d => {
            if(d !== parent) d.classList.remove("open");
        });

        // Toggle actuel
        parent.classList.toggle("open");
    });
});

// Fermer si on clique ailleurs
document.addEventListener("click", () => {
    document.querySelectorAll(".dropdown").forEach(d => d.classList.remove("open"));
});

function openJackpotModal(){
    document.getElementById("jackpotModal").style.display = "flex";
}

function closeJackpotModal(){
    document.getElementById("jackpotModal").style.display = "none";
}

function openEditJackpotModal(){
    document.getElementById("editJackpotModal").style.display = "flex";
}

function closeEditJackpotModal(){
    document.getElementById("editJackpotModal").style.display = "none";
}

function openDeleteJackpotModal(){
    document.getElementById("deleteJackpotModal").style.display = "flex";
}

function closeDeleteJackpotModal(){
    document.getElementById("deleteJackpotModal").style.display = "none";
}

function openEditJackpotModal(id, date_debut, date_fin, somme, status){
    document.getElementById("editJackpotModal").style.display = "flex";

    // Fill form
    document.getElementById("edit_date_debut").value = date_debut;
    document.getElementById("edit_date_fin").value = date_fin;
    document.getElementById("edit_somme").value = somme;
    document.getElementById("edit_status").value = status;

    // Set form action
    document.getElementById("editJackpotForm").action =
        "/admin/jackpot/update/" + id;
}

function openDeleteJackpotModal(id){
    document.getElementById("deleteJackpotModal").style.display = "flex";
    document.getElementById("deleteJackpotForm").action =
        "/admin/jackpot/delete/" + id;
}

@if(isset($jackpot_actif))

// Convertir dates depuis Laravel → JS
let dateDebut = new Date("{{ $jackpot_actif->date_debut }} 00:00:00").getTime();
let dateFin   = new Date("{{ $jackpot_actif->date_fin }} 23:59:59").getTime();

// Timer
setInterval(function () {
    let now = new Date().getTime();

    // Si la date n’est pas encore arrivée → Attente
    if (now < dateDebut) {
        let diff = dateDebut - now;
        document.getElementById("countdown").innerHTML =
            formatTime(diff) + " — Début dans";
        return;
    }

    // Compte à rebours en cours
    let diff = dateFin - now;

    if (diff <= 0) {
        document.getElementById("countdown").innerHTML = "Terminé !";
        return;
    }

    document.getElementById("countdown").innerHTML = formatTime(diff);

}, 1000);

// Format JJ/MM/HH/SS
function formatTime(ms) {
    let seconds = Math.floor(ms / 1000);
    let days = Math.floor(seconds / 86400);
    seconds %= 86400;

    let hours = Math.floor(seconds / 3600);
    seconds %= 3600;

    let minutes = Math.floor(seconds / 60);
    seconds = seconds % 60;

    return pad(days) + "J : " + pad(hours) + "H : " + pad(minutes) + "M : " + pad(seconds) + "S";
}

function pad(n) {
    return (n < 10 ? "0" : "") + n;
}

@endif
function genererTirage() {

    fetch("/admin/tirage/generer", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({}) // ← OBLIGATOIRE
})

    .then(res => res.json())
    .then(data => {

        if (data.error) {
            alert(data.error);
            return;
        }

        document.getElementById("resultat-tirage").innerHTML =
            `<b>Numéros :</b> ${data.numbers.join(', ')}
             <br><b>Bonus :</b> ${data.bonus}
             <br><b>Gagnant :</b> ${data.winner_id ? 'Utilisateur #' + data.winner_id : 'Aucun'}`;
    });
}
</script>
</body>
</html>
