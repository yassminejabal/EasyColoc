<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Balances — EasyColoc</title>
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
.nav-icon{font-size:1.1rem;width:20px;text-align:center;flex-shrink:0}
.sidebar-user{margin-top:auto;padding:1rem 1.25rem;border-top:1px solid var(--border);display:flex;align-items:center;gap:0.75rem}
.user-avatar{width:36px;height:36px;border-radius:50%;background:var(--primary-g);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.85rem;color:#fff;flex-shrink:0}
.user-name{font-weight:600;font-size:0.88rem}.user-role{font-size:0.75rem;color:var(--muted)}
.user-logout{margin-left:auto;color:var(--muted);text-decoration:none;font-size:1rem}.user-logout:hover{color:var(--danger)}
.main{margin-left:260px;flex:1;padding:2rem 2.5rem}
.page-header{margin-bottom:2rem;display:flex;align-items:center;justify-content:space-between}
.page-title{font-size:1.6rem;font-weight:800;letter-spacing:-0.03em}.page-sub{color:var(--muted);font-size:0.9rem;margin-top:0.25rem}
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem}
.card-title{font-weight:700;font-size:1rem}
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1.5rem}
.btn{display:inline-flex;align-items:center;gap:0.5rem;padding:0.6rem 1.25rem;border-radius:8px;font-family:'Plus Jakarta Sans',sans-serif;font-size:0.88rem;font-weight:600;border:none;cursor:pointer;text-decoration:none;transition:all 0.2s}
.btn-primary{background:var(--primary-g);color:#fff}.btn-primary:hover{opacity:0.9}
.btn-ghost{background:transparent;color:var(--soft);border:1px solid var(--border)}.btn-ghost:hover{background:var(--card2);color:var(--text)}
.btn-sm{padding:0.4rem 0.9rem;font-size:0.8rem;border-radius:6px}

/* Member balance card */
.member-balance{background:var(--card);border:1px solid var(--border);border-radius:12px;padding:1.5rem;display:flex;align-items:center;gap:1.25rem;transition:transform 0.2s}
.member-balance:hover{transform:translateY(-2px)}
.member-avatar{width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:1rem;color:#fff;flex-shrink:0}
.member-info{flex:1}
.member-name{font-weight:700;font-size:1rem;margin-bottom:0.1rem}
.member-paid{font-size:0.8rem;color:var(--muted)}
.member-balance-val{font-family:'JetBrains Mono',monospace;font-weight:800;font-size:1.4rem;text-align:right}
.member-bar-wrap{width:100%;height:6px;background:var(--bg);border-radius:100px;margin-top:0.75rem;overflow:hidden}
.member-bar{height:100%;border-radius:100px;transition:width 0.5s}

/* Debt arrows */
.debt-card{background:var(--card2);border:1px solid var(--border);border-radius:10px;padding:1rem 1.25rem;display:flex;align-items:center;gap:1rem;margin-bottom:0.75rem}
.debt-from{font-weight:700;font-size:0.9rem}
.debt-arrow{color:var(--muted);font-size:1.1rem;flex:1;text-align:center;letter-spacing:0.1em}
.debt-to{font-weight:700;font-size:0.9rem;text-align:right}
.debt-amount{font-family:'JetBrains Mono',monospace;font-weight:800;font-size:1.1rem;color:var(--warning);white-space:nowrap}
.mini-av{width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-weight:700;font-size:0.65rem;color:#fff}
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
    <a href="balances.html" class="nav-item active"><span class="nav-icon">⚖️</span> Balances</a>
    <a href="settlements.html" class="nav-item"><span class="nav-icon">💳</span> Remboursements</a>
  </div>
  <div class="sidebar-section">
    <span class="sidebar-label">Compte</span>
    <a href="profile.blade.php" class="nav-item"><span class="nav-icon">👤</span> Profil</a>
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
    <div>
      <div class="page-title">Balances ⚖️</div>
      <div class="page-sub">Villa Lumière · Calcul automatique des soldes · Février 2026</div>
    </div>
    <a href="settlements.html" class="btn btn-primary">Voir les remboursements →</a>
  </div>

  <!-- Info banner -->
  <div style="background:rgba(59,130,246,0.08);border:1px solid rgba(59,130,246,0.2);border-radius:12px;padding:1rem 1.25rem;margin-bottom:1.5rem;display:flex;align-items:center;gap:0.75rem;font-size:0.88rem;color:var(--soft)">
    <span style="font-size:1.2rem">ℹ️</span>
    <span>Total des dépenses : <strong style="color:var(--text)">1 280€</strong> · Part individuelle : <strong style="color:var(--primary)">320€ / personne</strong> · 4 membres actifs</span>
  </div>

  <!-- Members balances grid -->
  <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:1rem;margin-bottom:2rem">
    <!-- Alex -->
    <div class="member-balance">
      <div class="member-avatar" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">AL</div>
      <div class="member-info">
        <div class="member-name">Alex Leblanc <span style="font-size:0.75rem;color:var(--muted);font-weight:500">· Owner</span></div>
        <div class="member-paid">A payé : <strong style="color:var(--text)">640€</strong> · Part : 320€</div>
        <div class="member-bar-wrap"><div class="member-bar" style="width:100%;background:var(--success)"></div></div>
      </div>
      <div>
        <div class="member-balance-val" style="color:var(--success)">+320€</div>
        <div style="font-size:0.72rem;color:var(--success);text-align:right">Créditeur</div>
      </div>
    </div>

    <!-- Marie -->
    <div class="member-balance">
      <div class="member-avatar" style="background:linear-gradient(135deg,#10b981,#059669)">MA</div>
      <div class="member-info">
        <div class="member-name">Marie Dupont</div>
        <div class="member-paid">A payé : <strong style="color:var(--text)">94€</strong> · Part : 320€</div>
        <div class="member-bar-wrap"><div class="member-bar" style="width:29%;background:var(--danger)"></div></div>
      </div>
      <div>
        <div class="member-balance-val" style="color:var(--danger)">-226€</div>
        <div style="font-size:0.72rem;color:var(--danger);text-align:right">Débiteur</div>
      </div>
    </div>

    <!-- Tom -->
    <div class="member-balance">
      <div class="member-avatar" style="background:linear-gradient(135deg,#f59e0b,#d97706)">TO</div>
      <div class="member-info">
        <div class="member-name">Tom Martin</div>
        <div class="member-paid">A payé : <strong style="color:var(--text)">56€</strong> · Part : 320€</div>
        <div class="member-bar-wrap"><div class="member-bar" style="width:17%;background:var(--danger)"></div></div>
      </div>
      <div>
        <div class="member-balance-val" style="color:var(--danger)">-264€</div>
        <div style="font-size:0.72rem;color:var(--danger);text-align:right">Débiteur</div>
      </div>
    </div>

    <!-- Julie -->
    <div class="member-balance">
      <div class="member-avatar" style="background:linear-gradient(135deg,#ec4899,#be185d)">JU</div>
      <div class="member-info">
        <div class="member-name">Julie Bernard</div>
        <div class="member-paid">A payé : <strong style="color:var(--text)">490€</strong> · Part : 320€</div>
        <div class="member-bar-wrap"><div class="member-bar" style="width:100%;background:var(--success)"></div></div>
      </div>
      <div>
        <div class="member-balance-val" style="color:var(--success)">+170€</div>
        <div style="font-size:0.72rem;color:var(--success);text-align:right">Créditeur</div>
      </div>
    </div>
  </div>

  <!-- Qui doit quoi -->
  <div class="card">
    <div class="card-header">
      <span class="card-title">📊 Qui doit quoi à qui</span>
      <span style="font-size:0.8rem;color:var(--muted)">Remboursements simplifiés</span>
    </div>
    <div class="debt-card">
      <div style="display:flex;align-items:center;gap:0.5rem;flex:1">
        <div class="mini-av" style="background:linear-gradient(135deg,#10b981,#059669)">MA</div>
        <div class="debt-from">Marie</div>
      </div>
      <div class="debt-arrow">→→→</div>
      <div style="display:flex;align-items:center;gap:0.5rem;flex:1;justify-content:center">
        <div class="mini-av" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">AL</div>
        <div class="debt-to">Alex</div>
      </div>
      <div class="debt-amount">226,00€</div>
    </div>
    <div class="debt-card">
      <div style="display:flex;align-items:center;gap:0.5rem;flex:1">
        <div class="mini-av" style="background:linear-gradient(135deg,#f59e0b,#d97706)">TO</div>
        <div class="debt-from">Tom</div>
      </div>
      <div class="debt-arrow">→→→</div>
      <div style="display:flex;align-items:center;gap:0.5rem;flex:1;justify-content:center">
        <div class="mini-av" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">AL</div>
        <div class="debt-to">Alex</div>
      </div>
      <div class="debt-amount">94,00€</div>
    </div>
    <div class="debt-card" style="margin-bottom:0">
      <div style="display:flex;align-items:center;gap:0.5rem;flex:1">
        <div class="mini-av" style="background:linear-gradient(135deg,#f59e0b,#d97706)">TO</div>
        <div class="debt-from">Tom</div>
      </div>
      <div class="debt-arrow">→→→</div>
      <div style="display:flex;align-items:center;gap:0.5rem;flex:1;justify-content:center">
        <div class="mini-av" style="background:linear-gradient(135deg,#ec4899,#be185d)">JU</div>
        <div class="debt-to">Julie</div>
      </div>
      <div class="debt-amount">170,00€</div>
    </div>
  </div>
</main>
</body>
</html>