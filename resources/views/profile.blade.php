{{-- resources/views/profile.blade.php --}}
@extends('layouts.app')

@section('title', 'Mon profil — Loto Mada')

@section('content')
<style>
:root{
    --gold: #ffd166;
    --gold-light: #ffe9b0;
    --glass1: rgba(255,255,255,0.05);
    --glass2: rgba(255,255,255,0.10);
    --glass3: rgba(255,255,255,0.15);
    --border: rgba(255,255,255,0.14);
    --radius: 22px;
    --shadow1: 0 10px 30px rgba(0,0,0,0.45);
    --shadow2: 0 18px 60px rgba(0,0,0,0.55);
}

/* WRAPPER GLOBAL */
.profile-wrap {
    max-width: 1150px;
    margin: 0 auto 60px;
    display: flex;
    gap: 28px;
    flex-wrap: wrap;
}

/* CARD PREMIUM */
.profile-card {
    flex: 1;
    min-width: 320px;
    padding: 28px;
    background: var(--glass1);
    border: 1px solid var(--glass2);
    border-radius: var(--radius);
    backdrop-filter: blur(14px) saturate(160%);
    -webkit-backdrop-filter: blur(14px) saturate(160%);
    box-shadow: var(--shadow2);
    animation: fadeIn 0.6s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ============================ */
/*       HEADER DU PROFIL       */
/* ============================ */
.profile-header {
    display: flex;
    align-items: center;
    gap: 18px;
    margin-bottom: 18px;
}

.avatar {
    width: 80px;
    height: 80px;
    border-radius: 14px;
    background: linear-gradient(120deg, var(--gold), #fff6d5);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1a1a1a;
    font-size: 28px;
    font-weight: 900;
    box-shadow: 0 0 12px rgba(255,209,102,0.5);
}

.profile-info h2 {
    margin: 0;
    font-size: 22px;
    font-weight: 900;
    background: linear-gradient(120deg, var(--gold), #fff);
    -webkit-background-clip: text;
    color: transparent;
}

.meta {
    color: rgba(255,255,255,0.75);
    font-size: 14px;
}

/* Solde */
.balance {
    font-size: 32px;
    font-weight: 900;
    color: var(--gold);
    margin-top: 6px;
    text-shadow: 0 0 14px rgba(255,209,102,0.45);
}

/* Bloc Argent gagné */
.gain-box {
    background: rgba(76,255,140,0.10);
    border-left: 4px solid #4cff8c;
    padding: 14px;
    border-radius: var(--radius);
    margin-top: 12px;
}

/* ============================= */
/* FORMULAIRE STYLE PREMIUM      */
/* ============================= */
.form-row {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 12px;
}

.form-row input,
.form-row select {
    flex: 1;
    padding: 12px;
    border-radius: 14px;
    border: none;
    background: rgba(255,255,255,0.10);
    color: #fff;
    font-size: 15px;
    transition: .25s;
}

.form-row input:focus {
    outline: 2px solid var(--gold);
    background: rgba(255,255,255,0.18);
}

/* Buttons */
.btn {
    padding: 12px 16px;
    border-radius: 14px;
    border: none;
    cursor: pointer;
    font-weight: 700;
    transition: .25s;
}

.btn-primary {
    background: linear-gradient(120deg, var(--gold), var(--gold-light));
    color: #1b1b1b;
    box-shadow: 0 6px 18px rgba(255,209,102,0.35);
}
.btn-primary:hover {
    filter: brightness(1.06);
    transform: translateY(-2px);
}

.btn-ghost {
    background: rgba(255,255,255,0.10);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.12);
}
.btn-ghost:hover {
    background: rgba(255,255,255,0.20);
}

/* Right column */
.side-card {
    width: 330px;
    min-width: 280px;
}

/* ============================= */
/*       TABLE STYLE PREMIUM     */
/* ============================= */
.ticket-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 14px;
    background: rgba(255,255,255,0.03);
    border-radius: var(--radius);
    overflow: hidden;
    font-size: 14px;
}

.ticket-table th {
    text-align: left;
    padding: 12px 14px;
    background: rgba(255,255,255,0.10);
    color: var(--gold);
    font-weight: 900;
    border-bottom: 1px solid rgba(255,255,255,0.12);
}

.ticket-table td {
    padding: 12px 14px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
}

/* Status */
.status-tag {
    padding: 5px 12px;
    border-radius: 10px;
    font-weight: 800;
    font-size: 12px;
}

.status-jouer {
    background: rgba(255,209,102,0.20);
    color: var(--gold);
}

.status-gagne {
    background: rgba(76,255,140,0.20);
    color: #4cff8c;
}

.status-perdu {
    background: rgba(255,110,110,0.20);
    color: #ff6e6e;
}

/* Responsive */
@media(max-width:980px){
    .profile-wrap { padding: 0 12px; }
    .side-card { width: 100%; }
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
        <div style="background:rgba(76,255,140,0.10);padding:12px;border-radius:12px;margin:10px 0;">
    <p style="margin:0;font-size:14px;opacity:0.8;">Argent gagnée :</p>
    <p style="margin:3px 0 0 0;font-size:22px;font-weight:900;color:#4cff8c;">
        {{ number_format($user->argent_gagnee ?? 0, 0, ',', ' ') }} Ar
    </p>
</div>

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
  <!-- Side column : achat solde + retrait -->
<div class="profile-card side-card">
    <h3 style="color:#ffd166;margin-top:0;">Achat solde</h3>

    <p style="opacity:0.9;margin-bottom:12px;">Saisis le montant que tu veux ajouter. (Simulation statique — paiement à brancher plus tard.)</p>

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

    <h4 style="margin-bottom:8px;color:#fff3c6;">Retrait d'argent</h4>
    <p style="opacity:0.85;margin-bottom:8px;">Demande de retrait — le montant sera réservé à l'envoi de la demande.</p>

    <form method="POST" action="{{ route('profile.withdraw.request') }}">
        @csrf

        <div class="form-row">
            <input type="number" name="amount" min="100" placeholder="Montant en Ariary" required>
        </div>

        <div class="form-row">
            <input type="text" name="method" placeholder="Méthode (ex: Mobile Money)">
        </div>

        <div class="form-row">
            <input type="text" name="method_details" placeholder="Détails (numéro mobile / compte)">
        </div>

        <div style="display:flex;gap:10px;margin-top:10px;">
            <button class="btn btn-primary" type="submit">Demander retrait</button>
        </div>
    </form>

    <hr style="border:none;border-top:1px solid rgba(255,255,255,0.04);margin:18px 0;">

    <h4 style="margin-bottom:8px;color:#fff3c6;">Récapitulatif</h4>
    <p style="margin:0 0 8px 0;">Pseudo: <strong id="sidePseudo">{{ $user->pseudo }}</strong></p>
    <p style="margin:0 0 8px 0;">Solde: <strong id="sideSolde">{{ number_format($user->solde ?? 0, 0, ',', ' ') }} Ar</strong></p>

    <p style="margin:10px 0 6px 0;font-weight:700;color:#ffd166;">Historique retraits</p>
    @if($user->withdrawals->isEmpty())
        <p style="opacity:0.75;">Aucune demande de retrait.</p>
    @else
        <table class="ticket-table" style="margin-top:8px;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->withdrawals()->orderBy('created_at','desc')->get() as $w)
                <tr>
                    <td>{{ $w->created_at->format('d/m/Y') }}</td>
                    <td>{{ number_format($w->amount,0,',',' ') }} Ar</td>
                    <td style="text-transform:capitalize;">{{ $w->status }}</td>
                    <td>
                        @if($w->status === 'pending')
                        <form method="POST" action="{{ route('profile.withdraw.cancel', $w) }}" style="display:inline;">
                            @csrf
                            <button class="btn btn-ghost" type="submit" style="padding:6px 10px;">Annuler</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

</div>
<div class="profile-card" style="margin-top:25px;">
    <h3 style="color:#ffd166;">Historique des Tickets</h3>

    @if($tickets->isEmpty())
        <p style="opacity:0.7;">Aucun ticket joué pour le moment.</p>
    @else
        <table class="ticket-table">
    <tr>
        <th>Date</th>
        <th>Numéros</th>
        <th>Bonus</th>
        <th>Status</th>
    </tr>

    @foreach($tickets as $t)
            <tr>
                <td>{{ $t->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ implode(', ', $t->numbers) }}</td>
                <td>{{ $t->bonus }}</td>

                <td>
                    @php
                        $statusClass = match(strtolower($t->status)) {
                            'jouer' => 'status-jouer',
                            'gagné', 'gagne' => 'status-gagne',
                            'perdu' => 'status-perdu',
                            default => 'status-jouer'
                        };
                    @endphp

                    <span class="status-tag {{ $statusClass }}">
                        {{ ucfirst($t->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </table>

    @endif
</div>

@endsection
