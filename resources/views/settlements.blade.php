<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Remboursements — EasyColoc</title>
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
.btn{display:inline-flex;align-items:center;gap:0.5rem;padding:0.6rem 1.25rem;border-radius:8px;font-family:'Plus Jakarta Sans',sans-serif;font-size:0.88rem;font-weight:600;border:none;cursor:pointer;text-decoration:none;transition:all 0.2s}
.btn-success{background:rgba(16,185,129,0.15);color:#34d399;border:1px solid rgba(16,185,129,0.3)}.btn-success:hover{background:rgba(16,185,129,0.25)}
.btn-ghost{background:transparent;color:var(--soft);border:1px solid var(--border)}.btn-ghost:hover{background:var(--card2);color:var(--text)}
.badge{display:inline-flex;align-items:center;gap:0.3rem;padding:0.25rem 0.65rem;border-radius:100px;font-size:0.72rem;font-weight:700}
.badge-green{background:rgba(16,185,129,0.15);color:#34d399}.badge-orange{background:rgba(245,158,11,0.15);color:#fbbf24}.badge-gray{background:rgba(100,116,139,0.15);color:#94a3b8}
.mini-av{width:30px;height:30px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-weight:700;font-size:0.68rem;color:#fff;flex-shrink:0}
.mini-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-bottom:1.5rem}
.mini-stat{background:var(--card);border:1px solid var(--border);border-radius:12px;padding:1rem 1.25rem}
.mini-stat-label{font-size:0.75rem;color:var(--muted);font-weight:600;text-transform:uppercase;letter-spacing:0.06em;margin-bottom:0.25rem}
.mini-stat-val{font-size:1.5rem;font-weight:800;font-family:'JetBrains Mono',monospace}

/* Settlement rows */
.settlement-item{background:var(--card);border:1px solid var(--border);border-radius:12px;padding:1.25rem 1.5rem;display:flex;align-items:center;gap:1.25rem;margin-bottom:0.75rem;transition:border-color 0.2s}
.settlement-item:hover{border-color:rgba(99,179,237,0.25)}
.settlement-item.paid{opacity:0.55}
.settlement-amount{font-family:'JetBrains Mono',monospace;font-weight:800;font-size:1.3rem;color:var(--warning);min-width:90px;text-align:right}
.settlement-direction{flex:1;display:flex;align-items:center;gap:0.75rem}
.arrow-track{display:flex;align-items:center;gap:0.4rem;color:var(--muted);font-size:0.9rem;flex:1}
.arrow-dot{width:8px;height:2px;background:var(--muted);border-radius:1px}

/* History tab */
.tab-bar{display:flex;gap:0;margin-bottom:1.5rem;background:var(--card);border:1px solid var(--border);border-radius:10px;padding:4px;width:fit-content}
.tab{padding:0.5rem 1.25rem;border-radius:7px;font-size:0.88rem;font-weight:600;cursor:pointer;transition:all 0.2s;color:var(--muted);border:none;background:transparent;font-family:'Plus Jakarta Sans',sans-serif}
.tab.active{background:var(--primary-g);color:#fff}
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
    <a href="settlements.html" class="nav-item active"><span class="nav-icon">💳</span> Remboursements</a>
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
      <div class="page-title">Remboursements 💳</div>
      <div class="page-sub">Villa Lumière · Settlements simplifiés</div>
    </div>
  </div>

  <div class="mini-stats">
    <div class="mini-stat">
      <div class="mini-stat-label">En attente</div>
      <div class="mini-stat-val" style="color:var(--warning)">490€</div>
    </div>
    <div class="mini-stat">
      <div class="mini-stat-label">Remboursé ce mois</div>
      <div class="mini-stat-val" style="color:var(--success)">45€</div>
    </div>
    <div class="mini-stat">
      <div class="mini-stat-label">Transactions</div>
      <div class="mini-stat-val" style="color:var(--primary)">3</div>
    </div>
  </div>

  <div class="tab-bar" id="tabBar">
    <button class="tab active" onclick="switchTab(this,'pending')">En attente</button>
    <button class="tab" onclick="switchTab(this,'done')">Réglés</button>
  </div>

  <!-- Pending -->
  <div id="pending">
    <div class="settlement-item">
      <div class="settlement-direction">
        <div class="mini-av" style="background:linear-gradient(135deg,#10b981,#059669)">MA</div>
        <div>
          <div style="font-weight:700;font-size:0.9rem">Marie Dupont</div>
          <div style="font-size:0.78rem;color:var(--muted)">doit rembourser</div>
        </div>
        <div class="arrow-track">
          <div class="arrow-dot"></div><div class="arrow-dot"></div><div class="arrow-dot"></div>
          <span>→</span>
          <div class="arrow-dot"></div><div class="arrow-dot"></div><div class="arrow-dot"></div>
        </div>
        <div class="mini-av" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">AL</div>
        <div>
          <div style="font-weight:700;font-size:0.9rem">Alex Leblanc</div>
          <div style="font-size:0.78rem;color:var(--muted)">· vous</div>
        </div>
      </div>
      <div class="settlement-amount">226,00€</div>
      <span class="badge badge-orange">En attente</span>
      <form method="POST" action="/settlements/1/pay">
        @csrf
        <button type="submit" class="btn btn-success" style="white-space:nowrap">✓ Marquer payé</button>
      </form>
    </div>

    <div class="settlement-item">
      <div class="settlement-direction">
        <div class="mini-av" style="background:linear-gradient(135deg,#f59e0b,#d97706)">TO</div>
        <div>
          <div style="font-weight:700;font-size:0.9rem">Tom Martin</div>
          <div style="font-size:0.78rem;color:var(--muted)">doit rembourser</div>
        </div>
        <div class="arrow-track">
          <div class="arrow-dot"></div><div class="arrow-dot"></div><div class="arrow-dot"></div>
          <span>→</span>
          <div class="arrow-dot"></div><div class="arrow-dot"></div><div class="arrow-dot"></div>
        </div>
        <div class="mini-av" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">AL</div>
        <div>
          <div style="font-weight:700;font-size:0.9rem">Alex Leblanc</div>
          <div style="font-size:0.78rem;color:var(--muted)">· vous</div>
        </div>
      </div>
      <div class="settlement-amount">94,00€</div>
      <span class="badge badge-orange">En attente</span>
      <form method="POST" action="/settlements/2/pay">
        @csrf
        <button type="submit" class="btn btn-success" style="white-space:nowrap">✓ Marquer payé</button>
      </form>
    </div>

    <div class="settlement-item">
      <div class="settlement-direction">
        <div class="mini-av" style="background:linear-gradient(135deg,#f59e0b,#d97706)">TO</div>
        <div>
          <div style="font-weight:700;font-size:0.9rem">Tom Martin</div>
          <div style="font-size:0.78rem;color:var(--muted)">doit rembourser</div>
        </div>
        <div class="arrow-track">
          <div class="arrow-dot"></div><div class="arrow-dot"></div><div class="arrow-dot"></div>
          <span>→</span>
          <div class="arrow-dot"></div><div class="arrow-dot"></div><div class="arrow-dot"></div>
        </div>
        <div class="mini-av" style="background:linear-gradient(135deg,#ec4899,#be185d)">JU</div>
        <div>
          <div style="font-weight:700;font-size:0.9rem">Julie Bernard</div>
        </div>
      </div>
      <div class="settlement-amount">170,00€</div>
      <span class="badge badge-orange">En attente</span>
      <form method="POST" action="/settlements/3/pay">
        @csrf
        <button type="submit" class="btn btn-success" style="white-space:nowrap">✓ Marquer payé</button>
      </form>
    </div>
  </div>

  <!-- Done -->
  <div id="done" style="display:none">
    <div class="settlement-item paid">
      <div class="settlement-direction">
        <div class="mini-av" style="background:linear-gradient(135deg,#ec4899,#be185d)">JU</div>
        <div><div style="font-weight:700;font-size:0.9rem">Julie Bernard</div></div>
        <div class="arrow-track"><span>→</span></div>
        <div class="mini-av" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">AL</div>
        <div><div style="font-weight:700;font-size:0.9rem">Alex Leblanc</div></div>
      </div>
      <div class="settlement-amount" style="color:var(--success)">45,00€</div>
      <span class="badge badge-green">✓ Payé</span>
      <span style="font-size:0.8rem;color:var(--muted)">20 Fév 2026</span>
    </div>
  </div>
</main>

<script>
function switchTab(btn, tab) {
  document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('pending').style.display = tab==='pending' ? 'block' : 'none';
  document.getElementById('done').style.display = tab==='done' ? 'block' : 'none';
}
</script>
</body>
</html>