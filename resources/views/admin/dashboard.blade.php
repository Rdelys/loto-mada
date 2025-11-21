<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin – Dashboard Loto Mada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        .dropdown{
            position:relative;
        }

        .dropdown-menu{
            position:absolute;
            top:45px;
            left:0;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(10px);
            padding:10px 0;
            border-radius:var(--radius);
            border:1px solid rgba(255,255,255,0.15);
            display:none;
            flex-direction:column;
            min-width:200px;
        }

        .dropdown:hover .dropdown-menu{
            display:flex;
        }

        .dropdown-menu a{
            padding:12px 18px;
            font-size:14px;
        }

        .dropdown-menu a:hover{
            background:rgba(255,255,255,0.15);
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
            <div class="title">Dashboard</div>
            <p>Bienvenue {{ Auth::guard('admin')->user()->username }}</p>
        </div>
    </div>

    <!-- TIRAGE -->
    <div class="section" id="tirage">
        <div class="card">
            <div class="title">Gestion des Tirages</div>
            <p>Création, validation et contrôle des tirages.</p>
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
                    <tr>
                        <td>2025-01-01</td>
                        <td>2025-01-30</td>
                        <td>5 000 000 Ar</td>
                        <td>A planifier</td>
                        <td>
                            <button class="table-btn edit" onclick="openEditJackpotModal()">Modifier</button>
                            <button class="table-btn delete" onclick="openDeleteJackpotModal()">Supprimer</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Jackpots -->
    <!-- Modal -->
    <div id="jackpotModal" class="modal-overlay">
        <div class="modal-box">
            <h3>Ajouter un Jackpot</h3>

            <label>Date de début</label>
            <input type="date">

            <label>Date de fin</label>
            <input type="date">

            <label>Somme du jackpot</label>
            <input type="number" placeholder="ex: 2000000">

            <label>Status</label>
            <select class="modal-select">
                <option>A planifier</option>
                <option>Lancer</option>
            </select>

            <div class="modal-actions">
                <button class="btn-cancel" onclick="closeJackpotModal()">Annuler</button>
                <button class="btn-save">Enregistrer</button>
            </div>
        </div>
    </div>

    <!-- Modal Modification -->
    <div id="editJackpotModal" class="modal-overlay">
        <div class="modal-box">
            <h3>Modifier le Jackpot</h3>

            <label>Date de début</label>
            <input type="date" value="2025-01-01">

            <label>Date de fin</label>
            <input type="date" value="2025-01-30">

            <label>Somme du jackpot</label>
            <input type="number" value="5000000">

            <label>Status</label>
            <select class="modal-select">
                <option selected>A planifier</option>
                <option>Lancer</option>
            </select>

            <div class="modal-actions">
                <button class="btn-cancel" onclick="closeEditJackpotModal()">Annuler</button>
                <button class="btn-save">Mettre à jour</button>
            </div>
        </div>
    </div>

    <!-- Modal Suppression -->
    <div id="deleteJackpotModal" class="modal-overlay">
        <div class="modal-box">
            <h3>Supprimer ce jackpot ?</h3>
            <p>Voulez-vous vraiment supprimer cette entrée ?</p>

            <div class="modal-actions">
                <button class="btn-cancel" onclick="closeDeleteJackpotModal()">Non</button>
                <button class="btn-save" style="background:#e63946;color:white;">Oui</button>
            </div>
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
            <div class="title">Vainqueurs</div>
            <p>Liste des gagnants.</p>
        </div>
    </div>

    <!-- UTILISATEURS -->
    <div class="section" id="utilisateurs">
        <div class="card">
            <div class="title">Liste des utilisateurs</div>
            <p>Gestion des comptes joueurs.</p>
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
</script>


</body>
</html>
