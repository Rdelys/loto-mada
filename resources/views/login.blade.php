<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Loto Mada – Connexion / Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        :root{
    --gold:#ffd166;
    --gold-light:#ffe9b0;
    --glass1:rgba(255,255,255,0.05);
    --glass2:rgba(255,255,255,0.08);
    --glass3:rgba(255,255,255,0.12);
    --border:rgba(255,255,255,0.14);
    --radius:26px;
    --shadow1:0 15px 45px rgba(0,0,0,0.55);
    --shadow2:0 20px 60px rgba(0,0,0,0.65);
}

/* BACKGROUND ANIMÉ PREMIUM */
body{
    margin:0;
    padding:0;
    font-family:Inter, sans-serif;
    background:linear-gradient(140deg,#0b1020,#050a18,#091225);
    background-size:300% 300%;
    animation:bgMove 16s ease-in-out infinite;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    color:white;
}

@keyframes bgMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* CONTAINER PRINCIPAL */
.auth-container{
    width:100%;
    max-width:1100px;
    display:flex;
    border-radius:var(--radius);
    background:var(--glass1);
    border:1px solid var(--border);
    backdrop-filter:blur(18px) saturate(180%);
    -webkit-backdrop-filter:blur(18px) saturate(180%);
    box-shadow:var(--shadow2);
    overflow:hidden;
    animation:fadeIn .6s ease-out;
}

@keyframes fadeIn{
    from{opacity:0; transform:translateY(25px);}
    to{opacity:1; transform:translateY(0);}
}

/* ===================================== */
/* PANEL GAUCHE (Infos + Branding Loto) */
/* ===================================== */
.left-info{
    flex:1;
    padding:60px 45px;
    background:linear-gradient(160deg, rgba(255,209,102,0.18), rgba(255,255,255,0.03));
    border-right:1px solid rgba(255,255,255,0.08);
    backdrop-filter:blur(10px);
}

.left-info h1{
    font-size:42px;
    font-weight:900;
    letter-spacing:1px;
    background:linear-gradient(120deg,var(--gold),#fff);
    -webkit-background-clip:text;
    color:transparent;
    margin-bottom:15px;
}

.left-info p{
    font-size:17px;
    opacity:0.85;
}

.left-info ul{
    margin-top:25px;
    padding-left:18px;
}
.left-info ul li{
    margin-bottom:12px;
    font-size:16px;
    color:var(--gold-light);
}

/* ====================== */
/* PANEL FORMULAIRE      */
/* ====================== */
.right-form{
    flex:1;
    padding:60px 45px;
}

/* BUTTON SWITCH LOGIN / SIGNUP */
.toggle-buttons{
    display:flex;
    gap:12px;
    justify-content:center;
    margin-bottom:35px;
}

.toggle-buttons button{
    padding:12px 20px;
    border-radius:20px;
    background:var(--glass2);
    border:1px solid var(--glass3);
    color:white;
    font-weight:700;
    font-size:14px;
    cursor:pointer;
    transition:.25s;
}

.toggle-buttons button:hover{
    background:rgba(255,255,255,0.15);
}

.toggle-buttons button.active{
    background:linear-gradient(120deg,var(--gold),var(--gold-light));
    color:#111;
    box-shadow:0 6px 20px rgba(255,209,102,0.45);
}

/* FORM */
.form{
    display:none;
    animation:fade .45s ease;
}
.form.active{
    display:block;
}

@keyframes fade{
    from{opacity:0;}
    to{opacity:1;}
}

/* INPUT GROUP */
.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:6px;
    font-size:15px;
    font-weight:600;
    opacity:.9;
}

.form-group input{
    width:100%;
    padding:14px;
    background:rgba(255,255,255,0.10);
    border:none;
    border-radius:14px;
    color:white;
    font-size:15px;
    transition:.25s;
}

.form-group input:focus{
    outline:2px solid var(--gold);
    background:rgba(255,255,255,0.16);
}

/* SUBMIT BTN */
.submit-btn{
    width:100%;
    padding:15px;
    font-size:16px;
    border:none;
    border-radius:18px;
    background:linear-gradient(120deg,var(--gold),var(--gold-light));
    color:#111;
    font-weight:900;
    cursor:pointer;
    box-shadow:0 8px 25px rgba(255,209,102,0.45);
    transition:.28s;
}

.submit-btn:hover{
    transform:translateY(-2px);
    filter:brightness(1.08);
}

/* ====================== */
/* RESPONSIVE             */
/* ====================== */
@media(max-width:880px){
    .auth-container{
        flex-direction:column;
        margin:20px;
    }
    .left-info{
        border-right:none;
        text-align:center;
    }
}

@media(max-width:480px){
    .left-info h1{font-size:32px;}
    .left-info{padding:40px 25px;}
    .right-form{padding:40px 25px;}
}


    </style>
</head>

<body>

<div class="auth-container">

    <!-- LEFT INFO -->
    <div class="left-info">
        <h1>Loto Mada</h1>
        <p>Rejoignez la plateforme officielle de tirage à Madagascar.</p>

        <ul>
            <li>Jackpots jusqu’à plusieurs millions d'Ariary</li>
            <li>100% sécurisé & rapide</li>
            <li>Interface simple et moderne</li>
            <li>Résultats instantanés</li>
        </ul>
    </div>

    <!-- RIGHT FORMS -->
    <div class="right-form">

        <!-- TOGGLE -->
        <div class="toggle-buttons">
            <button id="btn-login" class="active">Connexion</button>
            <button id="btn-signup">Inscription</button>
        </div>

        <!-- LOGIN FORM -->
       <form class="form active" id="login-form" method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="form-group">
                <label>Pseudo ou Email</label>
                <input type="text" name="login" required placeholder="Entrez votre identifiant">
                @error('login') <small style="color:#ff8a8a">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" required placeholder="Votre mot de passe">
            </div>

            <button class="submit-btn">Se connecter</button>
        </form>


        <!-- SIGNUP FORM -->
        <form class="form" id="signup-form" method="POST" action="{{ route('user.register') }}">
            @csrf

            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" name="pseudo" required>
            </div>

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" required>
            </div>

            <div class="form-group">
                <label>Prénoms</label>
                <input type="text" name="prenom" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Numéro de téléphone</label>
                <input type="text" name="telephone" placeholder="Numéro Orange" required>
            </div>

            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button class="submit-btn">Créer un compte</button>
        </form>


    </div>

</div>

<script>
     // Toggle JS (déjà existant dans ta page)
    const btnLogin = document.getElementById("btn-login");
    const btnSignup = document.getElementById("btn-signup");

    const loginForm = document.getElementById("login-form");
    const signupForm = document.getElementById("signup-form");

    // Nouvelle logique : auto toggle selon l’URL
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get("tab");

    if (tab === "signup") {
        // Active inscription
        btnSignup.classList.add("active");
        btnLogin.classList.remove("active");

        signupForm.classList.add("active");
        loginForm.classList.remove("active");
    } else {
        // Par défaut : login
        btnLogin.classList.add("active");
        btnSignup.classList.remove("active");

        loginForm.classList.add("active");
        signupForm.classList.remove("active");
    }

    // Click toggle
    btnLogin.onclick = () => {
        window.location.href = "{{ route('auth.page') }}?tab=login";
    };

    btnSignup.onclick = () => {
        window.location.href = "{{ route('auth.page') }}?tab=signup";
    };
</script>
</body>
</html>
