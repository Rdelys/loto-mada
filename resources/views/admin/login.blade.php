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

/* GLOBAL */
body{
    margin:0;
    padding:0;
    height:100vh;
    font-family: "Inter", sans-serif;
    background: radial-gradient(circle at 30% 20%, #18233a, #0f172a 60%);
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
    color:white;
}

/* FLOATING LIGHTS */
.orb{
    position:absolute;
    width:430px;
    height:430px;
    filter:blur(140px);
    opacity:0.55;
    animation: float 10s infinite ease-in-out alternate;
}
.orb.gold{
    background:#ffd166;
    top:8%;
    left:8%;
}
.orb.blue{
    background:#4772ff;
    bottom:10%;
    right:12%;
}

@keyframes float{
    from{ transform:translateY(-18px); }
    to{ transform:translateY(22px); }
}

/* CARD */
.login-card{
    width:100%;
    max-width:420px;
    padding:42px 36px;
    border-radius:var(--radius);
    background:rgba(255,255,255,0.07);
    border:1px solid rgba(255,255,255,0.10);
    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    /* Premium Shadow */
    box-shadow:
        0 25px 55px rgba(0,0,0,0.55),
        0 0 20px rgba(255,209,102,0.08);

    animation: fadeIn .8s ease-out;
}

@keyframes fadeIn {
    from {opacity:0; transform: translateY(20px);}
    to   {opacity:1; transform: translateY(0);}
}

/* TITLE */
.title{
    text-align:center;
    font-size:27px;
    font-weight:900;
    margin-bottom:5px;
    letter-spacing:0.5px;
    background:linear-gradient(120deg, var(--gold), #ffffff);
    -webkit-background-clip:text;
    color:transparent;
}

.subtitle{
    text-align:center;
    opacity:0.78;
    margin-bottom:32px;
    font-size:14px;
}

/* INPUT GROUP */
.input-group{
    margin-bottom:22px;
    display:flex;
    flex-direction:column;
}

label{
    font-size:14px;
    margin-bottom:6px;
    opacity:0.88;
    font-weight:600;
}

.input-group i{
    color:var(--gold);
    margin-right:4px;
}

.input-field{
    width:100%;
    padding:14px;
    border-radius:14px;
    border:none;
    background:rgba(255,255,255,0.13);
    font-size:15px;
    color:white;
    transition:0.25s;
}
.input-field:focus{
    outline:2px solid var(--gold);
    background:rgba(255,255,255,0.18);
    box-shadow:0 0 12px rgba(255,209,102,0.4);
}

/* BUTTON */
.btn-submit{
    width:100%;
    margin-top:10px;
    padding:15px;
    border:none;
    border-radius:14px;
    background:linear-gradient(120deg,var(--gold),var(--gold-light));
    color:#000;
    font-size:17px;
    font-weight:800;
    cursor:pointer;

    box-shadow:
        0 10px 25px rgba(255,209,102,0.40),
        inset 0 0 10px rgba(255,255,255,0.2);

    transition:0.25s;
}
.btn-submit:hover{
    transform:translateY(-2px);
    filter:brightness(1.08);
}

/* ERRORS */
.error{
    color:#ff8a8a;
    font-size:13px;
    margin-top:5px;
}

/* RESPONSIVE */
@media (max-width:480px){
    .login-card{
        margin:20px;
        padding:34px 26px;
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
