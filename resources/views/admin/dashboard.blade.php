<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Loto Mada</title>
</head>
<body style="background:#0f172a; color:white; padding:40px;">

    <h1>Bienvenue Admin {{ Auth::guard('admin')->user()->username }}</h1>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button>Déconnexion</button>
    </form>

</body>
</html>
