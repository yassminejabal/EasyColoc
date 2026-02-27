<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Réputation — EasyColoc</title>
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
.page-title{font-size:1.6rem;font-weight:800;letter-spacing:-0.03em;margin-bottom:0.25rem}.page-sub{color:var(--muted);font-size:0.9rem;margin-bottom:2rem}
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.5rem;margin-bottom:1.5rem}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem}
.card-title{font-weight:700;font-size:1rem}

/* Rep hero */
.rep-hero{background:linear-gradient(135deg,rgba(245,158,11,0.12),rgba(251,191,36,0.06));border:1px solid rgba(245,158,11,0.25);border-radius:var(--radius);padding:2.5rem;text-align:center;margin-bottom:1.5rem}
.rep-score{font-size:5rem;font-weight:800;font-family:'JetBrains Mono',monospace;color:var(--warning);line-height:1;margin-bottom:0.5rem}
.rep-stars{font-size:2rem;letter-spacing:0.15em;margin-bottom:0.75rem;color:var(--warning)}
.rep-label{font-size:1rem;font-weight:600;color:var(--soft)}
.rep-desc{font-size:0.85rem;color:var(--muted);margin-top:0.4rem;max-width:360px;margin-left:auto;margin-right:auto}

/* History items */
.rep-event{display:flex;align-items:center;gap:1rem;padding:0.9rem 0;border-bottom:1px solid var(--border)}
.rep-event:last-child{border-bottom:none}
.rep-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0}
.rep-change-pos{font-family:'JetBrains Mono',monospace;font-weight:800;font-size:1.1rem;color:var(--success);min-width:42px;text-align:right}
.rep-change-neg{font-family:'JetBrains Mono',monospace;font-weight:800;font-size:1.1rem;color:var(--danger);min-width:42px;text-align:right}

/* Rules card */
.rule-item{display:flex;align-items:flex-start;gap:0.75rem;padding:0.75rem 0;border-bottom:1px solid var(--border);font-size:0.88rem}
.rule-item:last-child{border-bottom:none}
.rule-icon{font-size:1.1rem;flex-shrink:0}
.rule-desc{flex:1;color:var(--soft)}
.rule-points{font-family:'JetBrains Mono',monospace;font-weight:700;font-size:0.9rem;white-space:nowrap}
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
    <a href="profile.blade.php" class="nav-item"><span class="nav-icon">👤</span> Profil</a>
    <a href="reputation.html" class="nav-item active"><span class="nav-icon">⭐</span> Réputation</a>
  </div>
  <div class="sidebar-user">
    <div class="user-avatar">AL</div>
    <div><div class="user-name">Alex Leblanc</div><div class="user-role">Owner</div></div>
    <a href="login.blade.php" class="user-logout">⏻</a>
  </div>
</aside>

<main class="main">
  <div class="page-title">Réputation ⭐</div>
  <div class="page-sub">Votre score reflète votre comportement financier au sein des colocations</div>

  <!-- Rep hero -->
  <div class="rep-hero">
    <div class="rep-score">5</div>
    <div class="rep-stars">★★★★★</div>
    <div class="rep-label">Excellent — Membre exemplaire</div>
    <div class="rep-desc">Vous avez toujours respecté vos engagements financiers. Continuez comme ça !</div>
  </div>

  <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem">
    <!-- History -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">📜 Historique</span>
      </div>
      <div class="rep-event">
        <div class="rep-icon" style="background:rgba(16,185,129,0.12)">✅</div>
        <div style="flex:1">
          <div style="font-weight:600;font-size:0.9rem">Départ sans dette</div>
          <div style="font-size:0.78rem;color:var(--muted)">Colocation "Studio Voltaire" · Jan 2025</div>
        </div>
        <span class="rep-change-pos">+1</span>
      </div>
      <div class="rep-event">
        <div class="rep-icon" style="background:rgba(16,185,129,0.12)">✅</div>
        <div style="flex:1">
          <div style="font-weight:600;font-size:0.9rem">Départ sans dette</div>
          <div style="font-size:0.78rem;color:var(--muted)">Colocation "Montmartre 3" · Août 2024</div>
        </div>
        <span class="rep-change-pos">+1</span>
      </div>
      <div class="rep-event">
        <div class="rep-icon" style="background:rgba(16,185,129,0.12)">✅</div>
        <div style="flex:1">
          <div style="font-weight:600;font-size:0.9rem">Départ sans dette</div>
          <div style="font-size:0.78rem;color:var(--muted)">Colocation "Nation Appart" · Fév 2024</div>
        </div>
        <span class="rep-change-pos">+1</span>
      </div>
    </div>

    <!-- Rules -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">📋 Règles de réputation</span>
      </div>
      <div class="rule-item">
        <div class="rule-icon">✅</div>
        <div class="rule-desc">Quitter une colocation <strong style="color:var(--text)">sans dette</strong></div>
        <span class="rule-points" style="color:var(--success)">+1</span>
      </div>
      <div class="rule-item">
        <div class="rule-icon">✅</div>
        <div class="rule-desc">Annuler sa colocation <strong style="color:var(--text)">sans dettes actives</strong></div>
        <span class="rule-points" style="color:var(--success)">+1</span>
      </div>
      <div class="rule-item">
        <div class="rule-icon">❌</div>
        <div class="rule-desc">Quitter une colocation <strong style="color:var(--text)">avec une dette</strong></div>
        <span class="rule-points" style="color:var(--danger)">-1</span>
      </div>
      <div class="rule-item">
        <div class="rule-icon">❌</div>
        <div class="rule-desc">Annuler sa colocation <strong style="color:var(--text)">avec des dettes non réglées</strong></div>
        <span class="rule-points" style="color:var(--danger)">-1</span>
      </div>
      <div class="rule-item">
        <div class="rule-icon">⚠️</div>
        <div class="rule-desc">Membre retiré par owner avec dette : <strong style="color:var(--text)">dette transférée à l'owner</strong></div>
        <span class="rule-points" style="color:var(--warning)">0</span>
      </div>
    </div>
  </div>
</main>
</body>
</html>