<!DOCTYPE html>
<html>
<head>
    <title>Admin Loto Mada - Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body{
            background:#0f172a;
            color:white;
            font-family:Inter, sans-serif;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        .box{
            width:380px;
            padding:30px;
            background:rgba(255,255,255,0.06);
            border-radius:18px;
            backdrop-filter:blur(10px);
        }
        input{
            width:100%;
            padding:12px;
            border-radius:10px;
            background:rgba(255,255,255,0.15);
            border:none;
            color:white;
            margin-bottom:15px;
        }
        button{
            width:100%;
            padding:12px;
            background:#ffd166;
            border:none;
            border-radius:12px;
            color:black;
            font-weight:bold;
            cursor:pointer;
        }
    </style>
</head>

<body>

<div class="box">
    <h2 style="text-align:center;">Admin Loto Mada</h2>

    <form method="POST" action="{{ route('admin.login.action') }}">
        @csrf

        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>

        <button>Connexion</button>

        @error('username')
            <p style="color:#ff8a8a; margin-top:10px;">{{ $message }}</p>
        @enderror
    </form>
</div>

</body>
</html>
