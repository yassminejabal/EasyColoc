<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dashboard — EasyColoc</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
/* ===== DESIGN SYSTEM ===== */
:root{--bg:#0b0f1a;--surface:#111827;--card:#1a2235;--card2:#1f2d44;--border:rgba(99,179,237,0.12);--text:#e2e8f0;--muted:#64748b;--soft:#94a3b8;--primary:#3b82f6;--primary-g:linear-gradient(135deg,#3b82f6,#6366f1);--success:#10b981;--warning:#f59e0b;--danger:#ef4444;--info:#06b6d4;--radius:14px;--radius-sm:8px;--shadow:0 4px 32px rgba(0,0,0,0.4)}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{background:var(--bg);color:var(--text);font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;line-height:1.6;min-height:100vh;display:flex}

/* SIDEBAR */
.sidebar{width:260px;flex-shrink:0;background:var(--surface);border-right:1px solid var(--border);display:flex;flex-direction:column;position:fixed;top:0;left:0;bottom:0;z-index:50}
.sidebar-logo{padding:1.5rem 1.5rem 1rem;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:0.75rem}
.logo-icon{width:38px;height:38px;border-radius:10px;background:var(--primary-g);display:flex;align-items:center;justify-content:center;font-size:1.1rem;color:#fff;font-weight:800;flex-shrink:0}
.logo-text{font-weight:800;font-size:1.1rem;letter-spacing:-0.02em}.logo-text span{color:var(--primary)}
.sidebar-section{padding:1rem 0.75rem 0.5rem}
.sidebar-label{font-size:0.68rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--muted);padding:0 0.75rem;margin-bottom:0.4rem;display:block}
.nav-item{display:flex;align-items:center;gap:0.75rem;padding:0.6rem 0.75rem;border-radius:8px;color:var(--soft);text-decoration:none;font-size:0.9rem;font-weight:500;transition:all 0.2s;margin-bottom:2px}
.nav-item:hover{background:var(--card);color:var(--text)}
.nav-item.active{background:rgba(59,130,246,0.15);color:var(--primary)}
.nav-icon{font-size:1.1rem;width:20px;text-align:center;flex-shrink:0}
.sidebar-user{margin-top:auto;padding:1rem 1.25rem;border-top:1px solid var(--border);display:flex;align-items:center;gap:0.75rem}
.user-avatar{width:36px;height:36px;border-radius:50%;background:var(--primary-g);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.85rem;color:#fff;flex-shrink:0}
.user-name{font-weight:600;font-size:0.88rem}.user-role{font-size:0.75rem;color:var(--muted)}
.user-logout{margin-left:auto;color:var(--muted);text-decoration:none;font-size:1rem;transition:color 0.2s}.user-logout:hover{color:var(--danger)}

/* MAIN */
.main{margin-left:260px;flex:1;padding:2rem 2.5rem}
.page-header{margin-bottom:2rem;display:flex;align-items:center;justify-content:space-between}
.page-title{font-size:1.6rem;font-weight:800;letter-spacing:-0.03em}
.page-sub{color:var(--muted);font-size:0.9rem;margin-top:0.25rem}

/* STATS */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:1.5rem}
.stat-card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.25rem 1.5rem;position:relative;overflow:hidden;transition:transform 0.2s,box-shadow 0.2s}
.stat-card:hover{transform:translateY(-2px);box-shadow:var(--shadow)}
.stat-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px}
.stat-card.blue::before{background:var(--primary)}.stat-card.green::before{background:var(--success)}.stat-card.orange::before{background:var(--warning)}.stat-card.red::before{background:var(--danger)}
.stat-label{font-size:0.78rem;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.4rem}
.stat-value{font-size:2rem;font-weight:800;letter-spacing:-0.04em;font-family:'JetBrains Mono',monospace}
.stat-value.blue{color:var(--primary)}.stat-value.green{color:var(--success)}.stat-value.orange{color:var(--warning)}.stat-value.red{color:var(--danger)}
.stat-desc{font-size:0.78rem;color:var(--muted);margin-top:0.25rem}

/* CARDS */
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem}
.card-title{font-weight:700;font-size:1rem;letter-spacing:-0.01em}
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1.5rem}
.grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem}

/* BUTTONS */
.btn{display:inline-flex;align-items:center;gap:0.5rem;padding:0.6rem 1.25rem;border-radius:8px;font-family:'Plus Jakarta Sans',sans-serif;font-size:0.88rem;font-weight:600;border:none;cursor:pointer;text-decoration:none;transition:all 0.2s}
.btn-primary{background:var(--primary-g);color:#fff}.btn-primary:hover{opacity:0.9;transform:translateY(-1px);box-shadow:0 4px 20px rgba(59,130,246,0.4)}
.btn-ghost{background:transparent;color:var(--soft);border:1px solid var(--border)}.btn-ghost:hover{background:var(--card2);color:var(--text)}
.btn-sm{padding:0.4rem 0.9rem;font-size:0.8rem;border-radius:6px}

/* TABLE */
.table-wrap{overflow-x:auto;border-radius:var(--radius);border:1px solid var(--border)}
table{width:100%;border-collapse:collapse}
thead{background:rgba(99,179,237,0.05)}
th{padding:0.85rem 1rem;text-align:left;font-size:0.75rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:var(--muted);border-bottom:1px solid var(--border)}
td{padding:0.9rem 1rem;font-size:0.88rem;border-bottom:1px solid rgba(99,179,237,0.05)}
tr:last-child td{border-bottom:none}
tbody tr:hover{background:rgba(255,255,255,0.02)}

/* BADGES */
.badge{display:inline-flex;align-items:center;gap:0.3rem;padding:0.25rem 0.65rem;border-radius:100px;font-size:0.72rem;font-weight:700;letter-spacing:0.04em}
.badge-blue{background:rgba(59,130,246,0.15);color:#60a5fa}.badge-green{background:rgba(16,185,129,0.15);color:#34d399}.badge-orange{background:rgba(245,158,11,0.15);color:#fbbf24}.badge-red{background:rgba(239,68,68,0.15);color:#f87171}.badge-gray{background:rgba(100,116,139,0.15);color:#94a3b8}

/* RECENT */
.activity-item{display:flex;align-items:flex-start;gap:1rem;padding:0.9rem 0;border-bottom:1px solid var(--border)}
.activity-item:last-child{border-bottom:none}
.activity-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0}
.activity-desc{font-size:0.88rem;font-weight:500}.activity-time{font-size:0.76rem;color:var(--muted);margin-top:0.1rem}
.amount-positive{color:var(--success);font-weight:700;font-family:'JetBrains Mono',monospace}
.amount-negative{color:var(--danger);font-weight:700;font-family:'JetBrains Mono',monospace}

/* COLOCATION CARD */
.coloc-card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;position:relative;overflow:hidden;transition:transform 0.2s,box-shadow 0.2s}
.coloc-card:hover{transform:translateY(-3px);box-shadow:0 8px 40px rgba(0,0,0,0.4)}
.coloc-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px;background:var(--primary-g)}
.coloc-name{font-weight:800;font-size:1.1rem;letter-spacing:-0.02em;margin-bottom:0.25rem}
.coloc-meta{font-size:0.82rem;color:var(--muted)}
.coloc-members{display:flex;gap:-4px;margin-top:1rem}
.avatar{width:30px;height:30px;border-radius:50%;background:var(--primary-g);display:inline-flex;align-items:center;justify-content:center;font-weight:700;font-size:0.7rem;color:#fff;border:2px solid var(--card);margin-right:-6px}
.avatar.green{background:linear-gradient(135deg,#10b981,#059669)}
.avatar.orange{background:linear-gradient(135deg,#f59e0b,#d97706)}
.avatar.pink{background:linear-gradient(135deg,#ec4899,#be185d)}

/* BALANCE BAR */
.balance-bar{background:var(--bg);border-radius:100px;height:6px;margin-top:0.5rem;overflow:hidden}
.balance-fill{height:100%;border-radius:100px;background:var(--primary-g)}

/* GREETING BANNER */
.greeting-banner{background:linear-gradient(135deg,rgba(59,130,246,0.15),rgba(99,102,241,0.1));border:1px solid rgba(59,130,246,0.2);border-radius:var(--radius);padding:1.5rem 2rem;margin-bottom:1.5rem;display:flex;align-items:center;justify-content:space-between}
.greeting-text h2{font-size:1.25rem;font-weight:800;letter-spacing:-0.02em}
.greeting-text p{color:var(--muted);font-size:0.88rem;margin-top:0.2rem}
.greeting-emoji{font-size:2.5rem}
</style>
</head>
<body>
<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon">EC</div>
    <div class="logo-text">Easy<span>Coloc</span></div>
  </div>
  <div class="sidebar-section">
    <span class="sidebar-label">Navigation</span>
    <a href="dashboard.blade.php" class="nav-item active"><span class="nav-icon">🏠</span> Tableau de bord</a>
      {{-- @foreach($colocationss as $colocation)
    @if ($colocation->status = 'annule')
         --}}
     {{-- @endif --}}
    {{-- @endforeach --}}
    @if($colocationss)
    {{-- <span class="nav-icon">🏘️</span> Ma Colocation --}}
    <a href="{{route('MaColocation')}}" class="nav-item"><span class="nav-icon">🏘️</span> Ma Colocation</a>
  </a>
  @endif
    {{-- <span class="nav-icon">🏘️</span> Ma Colocation --}}
</a>
  {{-- @if(isset($colocationss) && $colocationss->count() > 0)
@endif --}}

    <a href="expenses.blade.php" class="nav-item"><span class="nav-icon">💸</span> Dépenses</a>
    <a href="balances.html" class="nav-item"><span class="nav-icon">⚖️</span> Balances</a>
    <a href="settlements.html" class="nav-item"><span class="nav-icon">💳</span> Remboursements</a>
  </div>
  <div class="sidebar-section">
    <span class="sidebar-label">Compte</span>
    <a href="profile.blade.php" class="nav-item"><span class="nav-icon">👤</span> Profil</a>
    <a href="reputation.html" class="nav-item"><span class="nav-icon">⭐</span> Réputation</a>
  </div>
  <div class="sidebar-user">
    <div class="user-avatar">AL</div>
    <div>
      <div class="user-name">Alex Leblanc</div>
      <div class="user-role">Owner</div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="user-logout bg-transparent border-none cursor-pointer" title="Déconnexion">
        ⏻
    </button>
</form>
   
  </div>
</aside>

<!-- MAIN -->
<main class="main">
  <div class="page-header">
    <div>
      <div class="page-title">Tableau de bord</div>
      <div class="page-sub">Mercredi 25 Février 2026</div>
    </div>
    <div style="display:flex;gap:0.75rem">
      <a href="{{route('createcolocation')}}" class="btn btn-primary">🏡 Créer une colocation</a>
    </div>
  </div>

  <!-- Greeting -->
  <div class="greeting-banner">
    <div class="greeting-text">
      <h2>Bonjour, Alex 👋</h2>
      <p>Vous avez <strong>3 remboursements</strong> en attente ce mois-ci.</p>
    </div>
    <div class="greeting-emoji">🏡</div>
  </div>

  <!-- Stats -->
  <div class="stats-grid">
    <div class="stat-card blue">
      <div class="stat-label">Total dépenses</div>
      <div class="stat-value blue">1 240€</div>
      <div class="stat-desc">Ce mois · +12% vs précédent</div>
    </div>
    <div class="stat-card green">
      <div class="stat-label">Mon solde</div>
      <div class="stat-value green">+87€</div>
      <div class="stat-desc">On vous doit de l'argent</div>
    </div>
    <div class="stat-card orange">
      <div class="stat-label">Membres actifs</div>
      <div class="stat-value orange">4</div>
      <div class="stat-desc">Colocation "Villa Lumière"</div>
    </div>
    <div class="stat-card red">
      <div class="stat-label">Dettes actives</div>
      <div class="stat-value red">3</div>
      <div class="stat-desc">Remboursements en attente</div>
    </div>
  </div>

  <!-- Grid 2 col -->
  <div class="grid-2" style="margin-bottom:1.5rem">
    <!-- Ma colocation -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Ma Colocation</span>
        <a href="colocation.blade.php" class="btn btn-ghost btn-sm">Voir →</a>
      </div>
      <div class="coloc-card" style="border:none;padding:0.5rem 0 0;background:transparent;box-shadow:none">
        <div class="coloc-name">🏡 Villa Lumière</div>
        <div class="coloc-meta">Paris 11e · Créée le 01/09/2025 · <span class="badge badge-green">Active</span></div>
        <div class="coloc-members" style="margin-top:1rem">
          <span class="avatar" title="Alex">AL</span>
          <span class="avatar green" title="Marie">MA</span>
          <span class="avatar orange" title="Tom">TO</span>
          <span class="avatar pink" title="Julie">JU</span>
        </div>
        <div style="margin-top:1rem;font-size:0.82rem;color:var(--muted)">Total dépensé depuis création</div>
        <div style="font-size:1.4rem;font-weight:800;font-family:'JetBrains Mono',monospace;color:var(--primary)">4 320€</div>
        <div class="balance-bar" style="margin-top:0.75rem"><div class="balance-fill" style="width:72%"></div></div>
        <div style="font-size:0.75rem;color:var(--muted);margin-top:0.3rem">72% des dépenses réglées</div>
      </div>
    </div>

    <!-- Activité récente -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Activité récente</span>
        <a href="expenses.blade.php" class="btn btn-ghost btn-sm">Tout voir →</a>
      </div>
      <div class="activity-item">
        <div class="activity-icon" style="background:rgba(16,185,129,0.15)">🛒</div>
        <div style="flex:1">
          <div class="activity-desc">Courses Monoprix</div>
          <div class="activity-time">Aujourd'hui · Marie</div>
        </div>
        <span class="amount-negative">-78,50€</span>
      </div>
      <div class="activity-item">
        <div class="activity-icon" style="background:rgba(59,130,246,0.15)">💡</div>
        <div style="flex:1">
          <div class="activity-desc">Facture EDF Février</div>
          <div class="activity-time">Hier · Alex (vous)</div>
        </div>
        <span class="amount-negative">-124€</span>
      </div>
      <div class="activity-item">
        <div class="activity-icon" style="background:rgba(245,158,11,0.15)">🍕</div>
        <div style="flex:1">
          <div class="activity-desc">Repas commun vendredi</div>
          <div class="activity-time">23 Fév · Tom</div>
        </div>
        <span class="amount-negative">-56€</span>
      </div>
      <div class="activity-item">
        <div class="activity-icon" style="background:rgba(16,185,129,0.15)">💳</div>
        <div style="flex:1">
          <div class="activity-desc">Remboursement reçu</div>
          <div class="activity-time">20 Fév · Julie → Vous</div>
        </div>
        <span class="amount-positive">+45€</span>
      </div>
    </div>
  </div>

  <!-- Dépenses par catégorie -->
  <div class="card">
    <div class="card-header">
      <span class="card-title">Dépenses par catégorie — Février 2026</span>
      <a href="expenses.blade.php" class="btn btn-ghost btn-sm">Détails →</a>
    </div>
    <div class="grid-3">
      <div style="background:var(--card2);border-radius:10px;padding:1rem;display:flex;align-items:center;gap:1rem">
        <div style="font-size:1.6rem">🛒</div>
        <div><div style="font-weight:700">Courses</div><div style="color:var(--muted);font-size:0.8rem">6 dépenses</div></div>
        <div style="margin-left:auto;font-family:'JetBrains Mono',monospace;font-weight:700;color:var(--success)">320€</div>
      </div>
      <div style="background:var(--card2);border-radius:10px;padding:1rem;display:flex;align-items:center;gap:1rem">
        <div style="font-size:1.6rem">💡</div>
        <div><div style="font-weight:700">Charges</div><div style="color:var(--muted);font-size:0.8rem">3 dépenses</div></div>
        <div style="margin-left:auto;font-family:'JetBrains Mono',monospace;font-weight:700;color:var(--primary)">480€</div>
      </div>
      <div style="background:var(--card2);border-radius:10px;padding:1rem;display:flex;align-items:center;gap:1rem">
        <div style="font-size:1.6rem">🍕</div>
        <div><div style="font-weight:700">Repas</div><div style="color:var(--muted);font-size:0.8rem">4 dépenses</div></div>
        <div style="margin-left:auto;font-family:'JetBrains Mono',monospace;font-weight:700;color:var(--warning)">180€</div>
      </div>
      <div style="background:var(--card2);border-radius:10px;padding:1rem;display:flex;align-items:center;gap:1rem">
        <div style="font-size:1.6rem">🏠</div>
        <div><div style="font-weight:700">Loyer</div><div style="color:var(--muted);font-size:0.8rem">1 dépense</div></div>
        <div style="margin-left:auto;font-family:'JetBrains Mono',monospace;font-weight:700;color:var(--danger)">200€</div>
      </div>
      <div style="background:var(--card2);border-radius:10px;padding:1rem;display:flex;align-items:center;gap:1rem">
        <div style="font-size:1.6rem">🎮</div>
        <div><div style="font-weight:700">Loisirs</div><div style="color:var(--muted);font-size:0.8rem">2 dépenses</div></div>
        <div style="margin-left:auto;font-family:'JetBrains Mono',monospace;font-weight:700;color:var(--info)">60€</div>
      </div>
      <div style="background:var(--card2);border-radius:10px;padding:1rem;display:flex;align-items:center;gap:1rem">
        <div style="font-size:1.6rem">🧴</div>
        <div><div style="font-weight:700">Hygiène</div><div style="color:var(--muted);font-size:0.8rem">2 dépenses</div></div>
        <div style="margin-left:auto;font-family:'JetBrains Mono',monospace;font-weight:700;color:var(--soft)">40€</div>
      </div>
    </div>
  </div>
</main>
</body>
</html>