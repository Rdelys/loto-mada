{{-- resources/views/profile.blade.php --}}
@extends('layouts.app')

@section('title', 'Mon profil — Loto Mada')

@section('content')
<style>
/* Container principal */
.profile-wrap {
  max-width:1100px;
  margin: 0 auto 60px;
  display:flex;
  gap:28px;
  flex-wrap:wrap;
}

/* Card profil */
.profile-card {
  flex:1;
  min-width:300px;
  background: rgba(255,255,255,0.02);
  border:1px solid rgba(255,255,255,0.06);
  padding:22px;
  border-radius:16px;
  box-shadow: 0 12px 40px rgba(0,0,0,0.45);
}

/* Entête */
.profile-header {
  display:flex;
  align-items:center;
  gap:16px;
  margin-bottom:12px;
}

.avatar {
  width:72px; height:72px;
  border-radius:12px;
  background:linear-gradient(120deg,#ffd166,#ffe9b0);
  display:flex; align-items:center; justify-content:center;
  color:#111; font-weight:900; font-size:22px;
}

/* Info */
.profile-info h2 { margin:0 0 6px 0; font-size:20px; }
.meta { color: rgba(255,255,255,0.65); font-size:14px; }

/* Solde */
.balance {
  font-size:28px;
  font-weight:900;
  color:#ffd166;
  margin-top:6px;
}

/* Forms */
.form-row { display:flex; gap:10px; flex-wrap:wrap; margin-bottom:8px; }
.form-row input, .form-row select {
  flex:1;
  padding:10px 12px;
  border-radius:10px;
  border:none;
  background: rgba(255,255,255,0.04);
  color: #fff;
}

a {
    text-decoration: none;
}
/* Buttons */
.btn {
  padding:10px 14px;
  border-radius:12px;
  border:none;
  cursor:pointer;
  font-weight:700;
}
.btn-primary { background:linear-gradient(120deg,#ffd166,#ffe9b0); color:#111; }
.btn-ghost { background: rgba(255,255,255,0.04); color:#fff; border:1px solid rgba(255,255,255,0.06); }

/* Right column */
.side-card { width:320px; min-width:260px; align-self:flex-start; }

/* Responsive */
@media(max-width:980px){
  .profile-wrap { padding:0 12px; }
  .side-card { width:100%; }
}
</style>
@if(session('success'))
    <div style="
        background:#cfffd3;
        color:#0a4f11;
        padding:12px 16px;
        border-radius:8px;
        margin-bottom:18px;
        font-weight:700;
    ">
        {{ session('success') }}
    </div>
@endif
<div class="profile-wrap">

  <!-- Bloc principal : profil et modification -->
  <div class="profile-card">
    <div class="profile-header">
      <div class="avatar" id="avatarInitial">{{ strtoupper(substr($user->pseudo ?? auth()->user()->pseudo, 0, 1)) }}</div>
      <div class="profile-info">
        <h2 id="displayPseudo">{{ $user->pseudo }}</h2>
        <div class="meta">Nom : <span id="displayNom">{{ $user->nom }}</span> — Prénom : <span id="displayPrenom">{{ $user->prenom }}</span></div>
        <div class="meta">Email : <span id="displayEmail">{{ $user->email }}</span></div>
        <div class="meta">Téléphone : <span id="displayTelephone">{{ $user->telephone }}</span></div>
        <div class="balance" id="displaySolde">{{ number_format($user->solde ?? 0, 0, ',', ' ') }} Ar</div>
      </div>
    </div>

    <hr style="border:none;border-top:1px solid rgba(255,255,255,0.04);margin:16px 0;">

    <h3 style="color:#ffd166;margin-bottom:10px;">Modifier mon profil</h3>

    <!-- NOTE: forms are static; JS will prevent default and update the page -->
    <form id="profileForm" method="POST" action="{{ route('profile.update') }}">
        @csrf

        <div class="form-row">
            <input type="text" name="pseudo" value="{{ $user->pseudo }}" placeholder="Pseudo" required>
            <input type="text" name="nom" value="{{ $user->nom }}" placeholder="Nom" required>
        </div>

        <div class="form-row">
            <input type="text" name="prenom" value="{{ $user->prenom }}" placeholder="Prénom" required>
            <input type="email" name="email" value="{{ $user->email }}" placeholder="Email" required>
        </div>

        <div class="form-row">
            <input type="text" name="telephone" value="{{ $user->telephone }}" placeholder="Téléphone" required>
        </div>

        <div style="display:flex;gap:10px;margin-top:10px;">
            <button class="btn btn-primary" type="submit">Enregistrer</button>
            <a class="btn btn-ghost" href="{{ route('profile') }}">Réinitialiser</a>
        </div>
    </form>
  </div>

  <!-- Side column : achat solde -->
  <div class="profile-card side-card">
    <h3 style="color:#ffd166;margin-top:0;">Achat solde</h3>

    <p style="opacity:0.9;margin-bottom:12px;">Saisis le montant que tu veux ajouter. (Simulation statique — tu brancheras le paiement plus tard.)</p>

    <form id="addFundsForm" method="POST" action="{{ route('profile.addFunds') }}">
        @csrf

        <div class="form-row">
            <input type="number" name="amount" min="100" placeholder="Montant en Ariary" required>
        </div>

        <div style="display:flex;gap:10px;margin-top:10px;">
            <button class="btn btn-primary" type="submit">Ajouter</button>
            <a class="btn btn-ghost" href="{{ route('profile') }}">Effacer</a>
        </div>
    </form>

    <hr style="border:none;border-top:1px solid rgba(255,255,255,0.04);margin:18px 0;">

    <h4 style="margin-bottom:8px;color:#fff3c6;">Récapitulatif</h4>
    <p style="margin:0 0 8px 0;">Pseudo: <strong id="sidePseudo">{{ $user->pseudo }}</strong></p>
    <p style="margin:0 0 8px 0;">Solde: <strong id="sideSolde">{{ number_format($user->solde ?? 0, 0, ',', ' ') }} Ar</strong></p>
  </div>
</div>

@endsection
