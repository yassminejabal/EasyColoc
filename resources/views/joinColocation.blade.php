<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Rejoindre — EasyColoc</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--bg:#0b0f1a;--surface:#111827;--card:#1a2235;--border:rgba(99,179,237,0.12);--text:#e2e8f0;--muted:#64748b;--soft:#94a3b8;--primary:#3b82f6;--primary-g:linear-gradient(135deg,#3b82f6,#6366f1);--success:#10b981;--danger:#ef4444;--radius:14px}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{background:var(--bg);color:var(--text);font-family:'Plus Jakarta Sans',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem 1rem;position:relative;overflow:hidden}
body::before{content:'';position:fixed;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle,rgba(16,185,129,0.1),transparent 70%);bottom:-150px;left:-150px;pointer-events:none}
.container{width:100%;max-width:480px;position:relative;z-index:1;animation:fadeUp 0.5s ease}
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.logo{display:flex;align-items:center;gap:0.75rem;margin-bottom:2rem}
.logo-icon{width:40px;height:40px;border-radius:11px;background:var(--primary-g);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:1.1rem;color:#fff}
.logo-text{font-weight:800;font-size:1.15rem;letter-spacing:-0.02em}.logo-text span{color:var(--primary)}
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:2rem;box-shadow:0 20px 60px rgba(0,0,0,0.4)}

/* Invitation preview */
.invite-preview{background:linear-gradient(135deg,rgba(16,185,129,0.1),rgba(6,182,212,0.06));border:1px solid rgba(16,185,129,0.25);border-radius:12px;padding:1.5rem;margin-bottom:1.75rem;text-align:center}
.invite-coloc{font-size:1.4rem;font-weight:800;margin-bottom:0.25rem}
.invite-owner{font-size:0.85rem;color:var(--muted);margin-bottom:0.75rem}
.invite-members{display:flex;justify-content:center;gap:-4px;margin-bottom:0.75rem}
.av{width:32px;height:32px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-weight:700;font-size:0.72rem;color:#fff;border:2px solid var(--card);margin-right:-8px}
.invite-stats{display:flex;justify-content:center;gap:2rem;margin-top:0.75rem}
.inv-stat{text-align:center}.inv-stat-val{font-weight:800;font-size:1.1rem}.inv-stat-label{font-size:0.73rem;color:var(--muted)}

.page-title{font-size:1.3rem;font-weight:800;letter-spacing:-0.02em;margin-bottom:0.3rem}
.page-sub{font-size:0.85rem;color:var(--muted);margin-bottom:1.5rem}
.btn-group{display:flex;gap:0.75rem}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:0.5rem;padding:0.85rem 1.5rem;border-radius:10px;font-family:'Plus Jakarta Sans',sans-serif;font-size:0.95rem;font-weight:700;border:none;cursor:pointer;text-decoration:none;transition:all 0.2s;flex:1}
.btn-accept{background:linear-gradient(135deg,#10b981,#059669);color:#fff}.btn-accept:hover{opacity:0.9;transform:translateY(-1px);box-shadow:0 8px 30px rgba(16,185,129,0.4)}
.btn-decline{background:rgba(239,68,68,0.1);color:#f87171;border:1px solid rgba(239,68,68,0.2)}.btn-decline:hover{background:rgba(239,68,68,0.2)}
.warning-box{background:rgba(245,158,11,0.08);border:1px solid rgba(245,158,11,0.2);border-radius:8px;padding:0.8rem 1rem;font-size:0.82rem;color:#fbbf24;margin-bottom:1.25rem;display:flex;gap:0.5rem}
</style>
</head>
<body>
<div class="container">
  <div class="logo">
    <div class="logo-icon">EC</div>
    <div class="logo-text">Easy<span>Coloc</span></div>
  </div>

  <div class="card">
    <div class="page-title">🎉 Vous êtes invité !</div>
    <div class="page-sub">Alex Leblanc vous invite à rejoindre sa colocation</div>

    <!-- Preview -->
    <div class="invite-preview">
      <div style="font-size:2rem;margin-bottom:0.5rem">🏡</div>
      <div class="invite-coloc">Villa Lumière</div>
      <div class="invite-owner">Paris 11e · Propriétaire : Alex Leblanc</div>
      <div class="invite-members">
        <span class="av" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">AL</span>
        <span class="av" style="background:linear-gradient(135deg,#10b981,#059669)">MA</span>
        <span class="av" style="background:linear-gradient(135deg,#f59e0b,#d97706)">TO</span>
      </div>
      <div style="font-size:0.8rem;color:var(--muted);margin-top:0.4rem">3 membres actuels</div>
      <div class="invite-stats">
        <div class="inv-stat"><div class="inv-stat-val" style="color:var(--primary)">4</div><div class="inv-stat-label">Membres max</div></div>
        <div class="inv-stat"><div class="inv-stat-val" style="color:var(--success)">01/09</div><div class="inv-stat-label">Depuis</div></div>
        <div class="inv-stat"><div class="inv-stat-val" style="color:var(--warning)">4 320€</div><div class="inv-stat-label">Dépensés</div></div>
      </div>
    </div>

    <div class="warning-box">
      <span>⚠️</span>
      <span>En acceptant, vous ne pourrez plus rejoindre ou créer d'autre colocation tant que vous êtes membre actif.</span>
    </div>

    <div class="btn-group">
      <form method="POST" action="/invitations/abc123token/accept" style="flex:1">
        @csrf
        <button type="submit" class="btn btn-accept">✓ Accepter l'invitation</button>
      </form>
      <form method="POST" action="/invitations/abc123token/decline" style="flex:1">
        @csrf
        <button type="submit" class="btn btn-decline">✕ Refuser</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>