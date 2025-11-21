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
            --gold: #ffd166;
            --gold-light: #ffe9b0;
            --dark: #0f172a;
            --glass: rgba(255,255,255,0.07);
            --radius: 24px;
        }

        body{
            margin:0;
            padding:0;
            font-family: "Inter", sans-serif;
            background: linear-gradient(120deg,#0f172a,#081225,#041025);
            animation:bg 14s ease-in-out infinite;
            background-size:300% 300%;
            color:#fff;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        @keyframes bg{
          0%{background-position:0% 50%;}
          50%{background-position:100% 50%;}
          100%{background-position:0% 50%;}
        }

        /* CONTAINER */
        .auth-container{
            width:100%;
            max-width:1100px;
            display:flex;
            background:var(--glass);
            border:1px solid rgba(255,255,255,0.10);
            border-radius:var(--radius);
            backdrop-filter:blur(14px);
            box-shadow:0 20px 50px rgba(0,0,0,0.45);
            overflow:hidden;
        }

        /* LEFT INFO */
        .left-info{
            flex:1;
            padding:50px 40px;
            background:linear-gradient(160deg, rgba(255,209,102,0.1), rgba(255,255,255,0.02));
            border-right:1px solid rgba(255,255,255,0.07);
        }
        .left-info h1{
            font-size:38px;
            font-weight:900;
            color:var(--gold);
            margin-bottom:12px;
        }
        .left-info p{
            font-size:16px;
            line-height:1.6;
            opacity:0.85;
        }

        .left-info ul{
            margin-top:20px;
            padding-left:20px;
        }
        .left-info ul li{
            margin-bottom:10px;
            color:var(--gold-light);
            font-size:15px;
        }

        /* RIGHT FORM */
        .right-form{
            flex:1;
            padding:50px 40px;
        }

        .toggle-buttons{
            display:flex;
            justify-content:center;
            margin-bottom:30px;
            gap:12px;
        }

        .toggle-buttons button{
            background:rgba(255,255,255,0.08);
            border:1px solid rgba(255,255,255,0.15);
            color:#fff;
            padding:10px 18px;
            font-weight:600;
            border-radius:20px;
            cursor:pointer;
            transition:0.25s;
        }

        .toggle-buttons button.active{
            background:linear-gradient(120deg,var(--gold),var(--gold-light));
            color:#000;
            box-shadow:0 6px 16px rgba(255,209,102,0.4);
        }

        .form{
            display:none;
            animation:fade .4s ease;
        }

        .form.active{
            display:block;
        }

        @keyframes fade{from{opacity:0;}to{opacity:1;}}

        .form-group{
            margin-bottom:18px;
        }

        .form-group label{
            display:block;
            margin-bottom:6px;
            font-weight:600;
            opacity:0.9;
        }

        .form-group input{
            width:100%;
            padding:12px;
            border-radius:14px;
            border:none;
            background:rgba(255,255,255,0.12);
            color:#fff;
            font-size:15px;
        }
        .form-group input:focus{
            outline:2px solid var(--gold);
        }

        .submit-btn{
            width:100%;
            padding:14px;
            border:none;
            border-radius:18px;
            background:linear-gradient(120deg,var(--gold),var(--gold-light));
            color:#000;
            font-weight:700;
            cursor:pointer;
            font-size:16px;
            margin-top:10px;
            box-shadow:0 8px 20px rgba(255,209,102,0.4);
            transition:0.30s;
        }
        .submit-btn:hover{
            transform:translateY(-2px);
            filter:brightness(1.08);
        }

        /* RESPONSIVE */
        @media(max-width:860px){
            .auth-container{
                flex-direction:column;
            }
            .left-info, .right-form{
                border-right:none;
            }
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
