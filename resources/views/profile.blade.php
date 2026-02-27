<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Profil — EasyColoc</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#0b0f1a;--surface:#111827;--card:#1a2235;--card2:#1f2d44;--border:rgba(99,179,237,0.12);--text:#e2e8f0;--muted:#64748b;--soft:#94a3b8;--primary:#3b82f6;--primary-g:linear-gradient(135deg,#3b82f6,#6366f1);--success:#10b981;--warning:#f59e0b;--danger:#ef4444;--radius:14px}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{background:var(--bg);color:var(--text);font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;line-height:1.6;min-height:100vh;display:flex}
.sidebar{width:260px;flex-shrink:0;background:var(--surface);border-right:1px solid var(--border);display:flex;flex-direction:column;position:fixed;top:0;left:0;bottom:0;z-index:50}
.sidebar-logo{padding:1.5rem 1.5rem 1rem;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:0.75rem}
.logo-icon{width:38px;height:38px;border-radius:10px;background:var(--primary-g);display:flex;align-items:center;justify-content:center;font-size:1.1rem;color:#fff;font-weight:800;flex-shrink:0}
.logo-text{font-weight:800;font-size:1.1rem;letter-spacing:-0.02em}.logo-text span{color:var(--primary)}
.sidebar-section{padding:1rem 0.75rem 0.5rem}
.sidebar-label{font-size:0.68rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--muted);padding:0 0.75rem;margin-bottom:0.4rem;display:block}
.nav-item{display:flex;align-items:center;gap:0.75rem;padding:0.6rem 0.75rem;border-radius:8px;color:var(--soft);text-decoration:none;font-size:0.9rem;font-weight:500;transition:all 0.2s;margin-bottom:2px}
.nav-item:hover{background:var(--card);color:var(--text)}.nav-item.active{background:rgba(59,130,246,0.15);color:var(--primary)}
.nav-icon{font-size:1.1rem;width:20px;text-align:center}
.sidebar-user{margin-top:auto;padding:1rem 1.25rem;border-top:1px solid var(--border);display:flex;align-items:center;gap:0.75rem}
.user-avatar{width:36px;height:36px;border-radius:50%;background:var(--primary-g);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.85rem;color:#fff;flex-shrink:0}
.user-name{font-weight:600;font-size:0.88rem}.user-role{font-size:0.75rem;color:var(--muted)}
.user-logout{margin-left:auto;color:var(--muted);text-decoration:none}.user-logout:hover{color:var(--danger)}
.main{margin-left:260px;flex:1;padding:2rem 2.5rem}
.page-header{margin-bottom:2rem}.page-title{font-size:1.6rem;font-weight:800;letter-spacing:-0.03em}.page-sub{color:var(--muted);font-size:0.9rem;margin-top:0.25rem}
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;margin-bottom:1.5rem}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem}
.card-title{font-weight:700;font-size:1rem}
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1.5rem}
.btn{display:inline-flex;align-items:center;gap:0.5rem;padding:0.6rem 1.25rem;border-radius:8px;font-family:'Plus Jakarta Sans',sans-serif;font-size:0.88rem;font-weight:600;border:none;cursor:pointer;text-decoration:none;transition:all 0.2s}
.btn-primary{background:var(--primary-g);color:#fff}.btn-primary:hover{opacity:0.9;transform:translateY(-1px)}
.btn-ghost{background:transparent;color:var(--soft);border:1px solid var(--border)}.btn-ghost:hover{background:var(--card2);color:var(--text)}
.btn-full{width:100%;padding:0.8rem;border-radius:10px;background:var(--primary-g);color:#fff;border:none;font-family:'Plus Jakarta Sans',sans-serif;font-size:0.9rem;font-weight:700;cursor:pointer;transition:all 0.2s}
.form-group{margin-bottom:1.1rem}
label{display:block;font-size:0.82rem;font-weight:600;color:var(--soft);margin-bottom:0.4rem}
input{width:100%;background:var(--bg);border:1px solid var(--border);border-radius:8px;padding:0.7rem 1rem;color:var(--text);font-family:'Plus Jakarta Sans',sans-serif;font-size:0.9rem;outline:none;transition:border-color 0.2s}
input:focus{border-color:rgba(59,130,246,0.5)}

/* Profile hero */
.profile-hero{background:linear-gradient(135deg,rgba(59,130,246,0.12),rgba(99,102,241,0.08));border:1px solid rgba(59,130,246,0.2);border-radius:var(--radius);padding:2rem;display:flex;align-items:center;gap:2rem;margin-bottom:1.5rem}
.profile-av-lg{width:80px;height:80px;border-radius:50%;background:var(--primary-g);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:1.8rem;color:#fff;flex-shrink:0;box-shadow:0 0 0 4px rgba(59,130,246,0.2)}
.profile-meta h2{font-size:1.4rem;font-weight:800;letter-spacing:-0.02em}
.profile-meta p{color:var(--muted);font-size:0.88rem;margin-top:0.2rem}
.profile-badges{display:flex;gap:0.5rem;margin-top:0.6rem}
.badge{display:inline-flex;align-items:center;gap:0.3rem;padding:0.25rem 0.65rem;border-radius:100px;font-size:0.72rem;font-weight:700}
.badge-blue{background:rgba(59,130,246,0.15);color:#60a5fa}.badge-orange{background:rgba(245,158,11,0.15);color:#fbbf24}.badge-green{background:rgba(16,185,129,0.15);color:#34d399}

/* Rep display */
.rep-big{font-size:3.5rem;font-weight:800;font-family:'JetBrains Mono',monospace;color:var(--warning);line-height:1}
.rep-stars-lg{font-size:1.5rem;letter-spacing:0.1em;color:var(--warning);margin-top:0.4rem}
</style>
</head>
<body>
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon">EC</div>
    <div class="logo-text">Easy<span>Coloc</span></div>
  </div>
  <div class="sidebar-section">
    <span class="sidebar-label">Navigation</span>
    <a href="Dashbard.blade.php" class="nav-item"><span class="nav-icon">🏠</span> Tableau de bord</a>
    <a href="colocation.blade.php" class="nav-item"><span class="nav-icon">🏘️</span> Ma Colocation</a>
    <a href="expenses.blade.php" class="nav-item"><span class="nav-icon">💸</span> Dépenses</a>
    <a href="balances.html" class="nav-item"><span class="nav-icon">⚖️</span> Balances</a>
    <a href="settlements.html" class="nav-item"><span class="nav-icon">💳</span> Remboursements</a>
  </div>
  <div class="sidebar-section">
    <span class="sidebar-label">Compte</span>
    <a href="profile.blade.php" class="nav-item active"><span class="nav-icon">👤</span> Profil</a>
    <a href="reputation.html" class="nav-item"><span class="nav-icon">⭐</span> Réputation</a>
  </div>
  <div class="sidebar-user">
    <div class="user-avatar">AL</div>
    <div><div class="user-name">Alex Leblanc</div><div class="user-role">Owner</div></div>
    <a href="login.blade.php" class="user-logout">⏻</a>
  </div>
</aside>

<main class="main">
  <div class="page-header">
    <div class="page-title">Mon Profil</div>
    <div class="page-sub">Gérez vos informations personnelles</div>
  </div>

  <!-- Hero -->
  <div class="profile-hero">
    <div class="profile-av-lg">AL</div>
    <div class="profile-meta">
      <h2>Alex Leblanc</h2>
      <p>alex.leblanc@exemple.fr · Membre depuis le 01/09/2025</p>
      <div class="profile-badges">
        <span class="badge badge-blue">Owner · Villa Lumière</span>
        <span class="badge badge-orange">★ Réputation 5/5</span>
        <span class="badge badge-green">✓ Compte vérifié</span>
      </div>
    </div>
  </div>

  <div class="grid-2">
    <!-- Edit profile -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">✏️ Informations personnelles</span>
      </div>
      <form method="POST" action="/profile">
        @csrf @method('PATCH')
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
          <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="first_name" value="Alex">
          </div>
          <div class="form-group">
            <label>Nom</label>
            <input type="text" name="last_name" value="Leblanc">
          </div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="alex.leblanc@exemple.fr">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
      </form>
    </div>

    <!-- Change password -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">🔒 Changer le mot de passe</span>
      </div>
      <form method="POST" action="/profile/password">
        @csrf @method('PATCH')
        <div class="form-group">
          <label>Mot de passe actuel</label>
          <input type="password" name="current_password" placeholder="••••••••">
        </div>
        <div class="form-group">
          <label>Nouveau mot de passe</label>
          <input type="password" name="password" placeholder="8+ caractères">
        </div>
        <div class="form-group">
          <label>Confirmer le nouveau mot de passe</label>
          <input type="password" name="password_confirmation" placeholder="Répétez">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </form>
    </div>
  </div>

  <!-- Danger zone -->
  <div class="card" style="border-color:rgba(239,68,68,0.2);background:rgba(239,68,68,0.03)">
    <div class="card-header">
      <span class="card-title" style="color:#f87171">⚠️ Supprimer mon compte</span>
    </div>
    <p style="font-size:0.85rem;color:var(--muted);margin-bottom:1rem">Cette action est irréversible. Toutes vos données seront supprimées définitivement.</p>
    <button class="btn btn-ghost" style="border-color:rgba(239,68,68,0.3);color:#f87171">Supprimer mon compte</button>
  </div>
</main>
</body>
</html>