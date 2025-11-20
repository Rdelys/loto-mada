<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Loto Mada – Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        :root{
            --gold: #ffd166;
            --gold-light: #ffe9b0;
            --bg: #0f172a;
            --glass: rgba(255,255,255,0.08);
            --radius: 22px;
        }

        body{
            margin:0;
            padding:0;
            height:100vh;
            font-family: "Inter", sans-serif;
            background: radial-gradient(circle at 30% 20%, #1c2740, #0f172a 60%);
            display:flex;
            justify-content:center;
            align-items:center;
            overflow:hidden;
            color:white;
        }

        /* BACKGROUND ANIMATED ORBS */
        .orb{
            position:absolute;
            width:420px;
            height:420px;
            filter:blur(130px);
            opacity:0.55;
            animation: float 9s infinite ease-in-out alternate;
        }
        .orb.gold{
            background:#ffd166;
            top:10%;
            left:10%;
        }
        .orb.blue{
            background:#3a86ff;
            bottom:10%;
            right:15%;
        }
        @keyframes float{
            from{ transform:translateY(-20px); }
            to{ transform:translateY(20px); }
        }

        /* CARD */
        .login-card{
            width:100%;
            max-width:420px;
            padding:40px 35px;
            border-radius:var(--radius);
            background:rgba(255,255,255,0.06);
            border:1px solid rgba(255,255,255,0.1);
            backdrop-filter:blur(18px);
            box-shadow:0 25px 55px rgba(0,0,0,0.55);
            position:relative;
            animation: fadeIn .8s ease-out;
        }

        @keyframes fadeIn {
            from {opacity:0; transform: translateY(20px);}
            to   {opacity:1; transform: translateY(0);}
        }

        .title{
            text-align:center;
            font-size:26px;
            font-weight:800;
            margin-bottom:6px;
            background:linear-gradient(120deg, var(--gold), #fff);
            -webkit-background-clip:text;
            color:transparent;
        }

        .subtitle{
            text-align:center;
            opacity:0.75;
            margin-bottom:28px;
            font-size:14px;
        }

        /* INPUT GROUP */
        .input-group{
            margin-bottom:20px;
            display:flex;
            flex-direction:column;
        }

        label{
            font-size:14px;
            margin-bottom:6px;
            opacity:0.85;
        }

        .input-field{
            width:100%;
            padding:14px;
            border-radius:14px;
            border:none;
            background:rgba(255,255,255,0.12);
            font-size:15px;
            color:white;
        }
        .input-field:focus{
            outline:2px solid var(--gold);
        }

        /* BUTTON */
        .btn-submit{
            width:100%;
            margin-top:10px;
            padding:14px;
            border:none;
            border-radius:14px;
            background:linear-gradient(120deg,var(--gold),var(--gold-light));
            color:#000;
            font-size:17px;
            font-weight:800;
            cursor:pointer;
            box-shadow:0 10px 25px rgba(255,209,102,0.35);
            transition:0.25s;
        }
        .btn-submit:hover{
            transform:translateY(-2px);
            filter:brightness(1.05);
        }

        /* ERRORS */
        .error{
            color:#ff8a8a;
            font-size:14px;
            margin-top:4px;
        }

        /* RESPONSIVE */
        @media (max-width:480px){
            .login-card{
                margin:20px;
                padding:30px 25px;
            }
        }

    </style>

</head>

<body>

<!-- BACKGROUND ORBS -->
<div class="orb gold"></div>
<div class="orb blue"></div>

<!-- LOGIN CARD -->
<div class="login-card">

    <div class="title">Admin Loto Mada</div>
    <div class="subtitle">Accès réservé à l'administration du système</div>

    <form method="POST" action="{{ route('admin.login.action') }}">
        @csrf

        <div class="input-group">
            <label><i class="fa-solid fa-user-shield"></i> Nom d'utilisateur</label>
            <input type="text" name="username" class="input-field" placeholder="AdminLotoMada" required>
            @error('username') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="input-group">
            <label><i class="fa-solid fa-lock"></i> Mot de passe</label>
            <input type="password" name="password" class="input-field" placeholder="••••••••" required>
        </div>

        <button class="btn-submit">
            <i class="fa-solid fa-right-to-bracket"></i> Connexion
        </button>
    </form>

</div>

</body>
</html>
