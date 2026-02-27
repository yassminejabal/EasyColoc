<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Administration — EasyColoc</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#0b0f1a;--surface:#111827;--card:#1a2235;--card2:#1f2d44;--border:rgba(99,179,237,0.12);--text:#e2e8f0;--muted:#64748b;--soft:#94a3b8;--primary:#3b82f6;--primary-g:linear-gradient(135deg,#3b82f6,#6366f1);--success:#10b981;--warning:#f59e0b;--danger:#ef4444;--radius:14px}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{background:var(--bg);color:var(--text);font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;line-height:1.6;min-height:100vh;display:flex}
.sidebar{width:260px;flex-shrink:0;background:var(--surface);border-right:1px solid var(--border);display:flex;flex-direction:column;position:fixed;top:0;left:0;bottom:0;z-index:50}
.sidebar-logo{padding:1.5rem 1.5rem 1rem;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:0.75rem}
.logo-icon{width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,#ef4444,#dc2626);display:flex;align-items:center;justify-content:center;font-size:1.1rem;color:#fff;font-weight:800;flex-shrink:0}
.logo-text{font-weight:800;font-size:1.1rem;letter-spacing:-0.02em}.logo-text span{color:#f87171}
.admin-badge{font-size:0.65rem;font-weight:700;background:rgba(239,68,68,0.15);color:#f87171;padding:0.15rem 0.5rem;border-radius:4px;border:1px solid rgba(239,68,68,0.2)}
.sidebar-section{padding:1rem 0.75rem 0.5rem}
.sidebar-label{font-size:0.68rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--muted);padding:0 0.75rem;margin-bottom:0.4rem;display:block}
.nav-item{display:flex;align-items:center;gap:0.75rem;padding:0.6rem 0.75rem;border-radius:8px;color:var(--soft);text-decoration:none;font-size:0.9rem;font-weight:500;transition:all 0.2s;margin-bottom:2px}
.nav-item:hover{background:var(--card);color:var(--text)}.nav-item.active{background:rgba(239,68,68,0.12);color:#f87171}
.nav-icon{font-size:1.1rem;width:20px;text-align:center}
.sidebar-user{margin-top:auto;padding:1rem 1.25rem;border-top:1px solid var(--border);display:flex;align-items:center;gap:0.75rem}
.user-avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#ef4444,#dc2626);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.85rem;color:#fff;flex-shrink:0}
.user-name{font-weight:600;font-size:0.88rem}.user-role{font-size:0.75rem;color:#f87171}
.user-logout{margin-left:auto;color:var(--muted);text-decoration:none}.user-logout:hover{color:var(--danger)}
.main{margin-left:260px;flex:1;padding:2rem 2.5rem}
.page-header{margin-bottom:2rem}.page-title{font-size:1.6rem;font-weight:800;letter-spacing:-0.03em}.page-sub{color:var(--muted);font-size:0.9rem;margin-top:0.25rem}
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;margin-bottom:1.5rem}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem}
.card-title{font-weight:700;font-size:1rem}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:1.5rem}
.stat-card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.25rem 1.5rem;position:relative;overflow:hidden}
.stat-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px}
.stat-card.blue::before{background:var(--primary)}.stat-card.green::before{background:var(--success)}.stat-card.orange::before{background:var(--warning)}.stat-card.red::before{background:var(--danger)}
.stat-label{font-size:0.78rem;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem}
.stat-value{font-size:2rem;font-weight:800;letter-spacing:-0.04em;font-family:'JetBrains Mono',monospace}
.stat-value.blue{color:var(--primary)}.stat-value.green{color:var(--success)}.stat-value.orange{color:var(--warning)}.stat-value.red{color:var(--danger)}
.stat-desc{font-size:0.78rem;color:var(--muted);margin-top:0.25rem}
.table-wrap{overflow-x:auto;border-radius:var(--radius);border:1px solid var(--border)}
table{width:100%;border-collapse:collapse}
thead{background:rgba(99,179,237,0.05)}
th{padding:0.85rem 1rem;text-align:left;font-size:0.75rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:var(--muted);border-bottom:1px solid var(--border)}
td{padding:0.9rem 1rem;font-size:0.88rem;border-bottom:1px solid rgba(99,179,237,0.05)}
tr:last-child td{border-bottom:none}
tbody tr:hover{background:rgba(255,255,255,0.02)}
.badge{display:inline-flex;align-items:center;gap:0.3rem;padding:0.25rem 0.65rem;border-radius:100px;font-size:0.72rem;font-weight:700}
.badge-green{background:rgba(16,185,129,0.15);color:#34d399}.badge-red{background:rgba(239,68,68,0.15);color:#f87171}.badge-orange{background:rgba(245,158,11,0.15);color:#fbbf24}.badge-gray{background:rgba(100,116,139,0.15);color:#94a3b8}
.btn{display:inline-flex;align-items:center;gap:0.4rem;padding:0.4rem 0.85rem;border-radius:6px;font-family:'Plus Jakarta Sans',sans-serif;font-size:0.78rem;font-weight:600;border:none;cursor:pointer;text-decoration:none;transition:all 0.2s}
.btn-ban{background:rgba(239,68,68,0.12);color:#f87171;border:1px solid rgba(239,68,68,0.2)}.btn-ban:hover{background:rgba(239,68,68,0.25)}
.btn-unban{background:rgba(16,185,129,0.12);color:#34d399;border:1px solid rgba(16,185,129,0.2)}.btn-unban:hover{background:rgba(16,185,129,0.25)}
.mini-av{width:28px;height:28px;border-radius:50%;background:var(--primary-g);display:inline-flex;align-items:center;justify-content:center;font-weight:700;font-size:0.62rem;color:#fff}
</style>
</head>
<body>
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon">⚙</div>
    <div style="display:flex;flex-direction:column;gap:2px">
      <div class="logo-text">Easy<span>Coloc</span></div>
      <span class="admin-badge">ADMIN</span>
    </div>
  </div>
  <div class="sidebar-section">
    <span class="sidebar-label">Administration</span>
    <a href="admin.blade.php" class="nav-item active"><span class="nav-icon">📊</span> Tableau de bord</a>
    <a href="#" class="nav-item"><span class="nav-icon">👥</span> Utilisateurs</a>
    <a href="#" class="nav-item"><span class="nav-icon">🏘️</span> Colocations</a>
    <a href="#" class="nav-item"><span class="nav-icon">💸</span> Dépenses globales</a>
    <a href="#" class="nav-item"><span class="nav-icon">🚫</span> Bannis</a>
  </div>
  <div class="sidebar-section">
    <span class="sidebar-label">Mon compte</span>
    <a href="Dashbard.blade.php" class="nav-item"><span class="nav-icon">🏠</span> Vue membre</a>
    <a href="profile.blade.php" class="nav-item"><span class="nav-icon">👤</span> Profil</a>
  </div>
  <div class="sidebar-user">
    <div class="user-avatar">SA</div>
    <div><div class="user-name">Super Admin</div><div class="user-role">Global Admin</div></div>
    <a href="login.blade.php" class="user-logout">⏻</a>
  </div>
</aside>

<main class="main">
  <div class="page-header">
    <div>
      <div class="page-title">Administration globale</div>
      <div class="page-sub">Vue d'ensemble de la plateforme EasyColoc</div>
    </div>
  </div>

  <!-- Global stats -->
  <div class="stats-grid">
    <div class="stat-card blue">
      <div class="stat-label">Utilisateurs total</div>
      <div class="stat-value blue">142</div>
      <div class="stat-desc">+8 cette semaine</div>
    </div>
    <div class="stat-card green">
      <div class="stat-label">Colocations actives</div>
      <div class="stat-value green">34</div>
      <div class="stat-desc">3 créées ce mois</div>
    </div>
    <div class="stat-card orange">
      <div class="stat-label">Dépenses totales</div>
      <div class="stat-value orange">48K€</div>
      <div class="stat-desc">Toutes colocations</div>
    </div>
    <div class="stat-card red">
      <div class="stat-label">Utilisateurs bannis</div>
      <div class="stat-value red">3</div>
      <div class="stat-desc">0 nouveau</div>
    </div>
  </div>

  <!-- Users table -->
  <div class="card">
    <div class="card-header">
      <span class="card-title">👥 Utilisateurs récents</span>
      <input type="text" placeholder="🔍 Rechercher un utilisateur..." style="background:var(--bg);border:1px solid var(--border);border-radius:8px;padding:0.45rem 0.9rem;color:var(--text);font-family:'Plus Jakarta Sans',sans-serif;font-size:0.85rem;outline:none;width:240px">
    </div>
    <div class="table-wrap" style="border:none;border-radius:0">
      <table>
        <thead>
          <tr>
            <th>Utilisateur</th>
            <th>Email</th>
            <th>Colocation</th>
            <th>Rôle</th>
            <th>Réputation</th>
            <th>Statut</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span style="display:flex;align-items:center;gap:0.6rem"><span class="mini-av">AL</span><strong>Alex Leblanc</strong></span></td>
            <td style="color:var(--muted)">alex@exemple.fr</td>
            <td>Villa Lumière</td>
            <td><span class="badge" style="background:rgba(59,130,246,0.15);color:#60a5fa">Owner</span></td>
            <td style="color:var(--warning)">★ 5</td>
            <td><span class="badge badge-green">Actif</span></td>
            <td><button class="btn btn-ban">🚫 Bannir</button></td>
          </tr>
          <tr>
            <td><span style="display:flex;align-items:center;gap:0.6rem"><span class="mini-av" style="background:linear-gradient(135deg,#10b981,#059669)">MA</span><strong>Marie Dupont</strong></span></td>
            <td style="color:var(--muted)">marie@exemple.fr</td>
            <td>Villa Lumière</td>
            <td><span class="badge badge-gray">Member</span></td>
            <td style="color:var(--warning)">★ 4</td>
            <td><span class="badge badge-green">Actif</span></td>
            <td><button class="btn btn-ban">🚫 Bannir</button></td>
          </tr>
          <tr>
            <td><span style="display:flex;align-items:center;gap:0.6rem"><span class="mini-av" style="background:linear-gradient(135deg,#f59e0b,#d97706)">TO</span><strong>Tom Martin</strong></span></td>
            <td style="color:var(--muted)">tom@exemple.fr</td>
            <td>Villa Lumière</td>
            <td><span class="badge badge-gray">Member</span></td>
            <td style="color:var(--warning)">★ 3</td>
            <td><span class="badge badge-green">Actif</span></td>
            <td><button class="btn btn-ban">🚫 Bannir</button></td>
          </tr>
          <tr>
            <td><span style="display:flex;align-items:center;gap:0.6rem"><span class="mini-av" style="background:linear-gradient(135deg,#6b7280,#4b5563)">JD</span><strong>John Doe</strong></span></td>
            <td style="color:var(--muted)">john@exemple.fr</td>
            <td style="color:var(--muted)">—</td>
            <td><span class="badge badge-gray">User</span></td>
            <td style="color:var(--danger)">★ 1</td>
            <td><span class="badge badge-red">Banni</span></td>
            <td><button class="btn btn-unban">✓ Débannir</button></td>
          </tr>
          <tr>
            <td><span style="display:flex;align-items:center;gap:0.6rem"><span class="mini-av" style="background:linear-gradient(135deg,#ec4899,#be185d)">JU</span><strong>Julie Bernard</strong></span></td>
            <td style="color:var(--muted)">julie@exemple.fr</td>
            <td>Villa Lumière</td>
            <td><span class="badge badge-gray">Member</span></td>
            <td style="color:var(--warning)">★ 5</td>
            <td><span class="badge badge-green">Actif</span></td>
            <td><button class="btn btn-ban">🚫 Bannir</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Colocations table -->
  <div class="card">
    <div class="card-header">
      <span class="card-title">🏘️ Colocations récentes</span>
    </div>
    <div class="table-wrap" style="border:none;border-radius:0">
      <table>
        <thead>
          <tr><th>Nom</th><th>Owner</th><th>Membres</th><th>Dépenses</th><th>Statut</th><th>Créée le</th></tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>🏡 Villa Lumière</strong></td>
            <td>Alex Leblanc</td>
            <td>4</td>
            <td style="font-family:'JetBrains Mono',monospace;color:var(--warning)">4 320€</td>
            <td><span class="badge badge-green">Active</span></td>
            <td style="color:var(--muted)">01/09/2025</td>
          </tr>
          <tr>
            <td><strong>🏢 Appart Central</strong></td>
            <td>Sophie Blanc</td>
            <td>3</td>
            <td style="font-family:'JetBrains Mono',monospace;color:var(--warning)">2 180€</td>
            <td><span class="badge badge-green">Active</span></td>
            <td style="color:var(--muted)">15/10/2025</td>
          </tr>
          <tr>
            <td><strong>🏠 Maison du Parc</strong></td>
            <td>Lucas Renard</td>
            <td>5</td>
            <td style="font-family:'JetBrains Mono',monospace;color:var(--warning)">7 640€</td>
            <td><span class="badge badge-red">Annulée</span></td>
            <td style="color:var(--muted)">03/06/2025</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>
</body>
</html>