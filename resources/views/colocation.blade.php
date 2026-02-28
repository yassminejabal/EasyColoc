<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Colocation — EasyColoc</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        :root {
            --bg: #0b0f1a; --surface: #111827; --card: #1a2235; --card2: #1f2d44;
            --border: rgba(99,179,237,0.12); --text: #e2e8f0; --muted: #64748b;
            --soft: #94a3b8; --primary: #3b82f6; --primary-g: linear-gradient(135deg,#3b82f6,#6366f1);
            --success: #10b981; --warning: #f59e0b; --danger: #ef4444; --radius: 14px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        
        body { 
            background: var(--bg); color: var(--text); 
            font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; 
            line-height: 1.6; min-height: 100vh; display: flex; 
        }

        /* Sidebar */
        .sidebar { 
            width: 260px; flex-shrink: 0; background: var(--surface); 
            border-right: 1px solid var(--border); display: flex; 
            flex-direction: column; position: fixed; top: 0; left: 0; bottom: 0; z-index: 50; 
        }
        .sidebar-logo { padding: 1.5rem 1.5rem 1rem; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 0.75rem; }
        .logo-icon { width: 38px; height: 38px; border-radius: 10px; background: var(--primary-g); display: flex; align-items: center; justify-content: center; font-size: 1.1rem; color: #fff; font-weight: 800; flex-shrink: 0; }
        .logo-text { font-weight: 800; font-size: 1.1rem; letter-spacing: -0.02em; }
        .logo-text span { color: var(--primary); }
        .sidebar-section { padding: 1rem 0.75rem 0.5rem; }
        .sidebar-label { font-size: 0.68rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--muted); padding: 0 0.75rem; margin-bottom: 0.4rem; display: block; }
        .nav-item { display: flex; align-items: center; gap: 0.75rem; padding: 0.6rem 0.75rem; border-radius: 8px; color: var(--soft); text-decoration: none; font-size: 0.9rem; font-weight: 500; transition: all 0.2s; margin-bottom: 2px; }
        .nav-item:hover { background: var(--card); color: var(--text); }
        .nav-item.active { background: rgba(59,130,246,0.15); color: var(--primary); }
        .nav-icon { font-size: 1.1rem; width: 20px; text-align: center; flex-shrink: 0; }

        /* User Section */
        .sidebar-user { margin-top: auto; padding: 1rem 1.25rem; border-top: 1px solid var(--border); display: flex; align-items: center; gap: 0.75rem; }
        .user-avatar { width: 36px; height: 36px; border-radius: 50%; background: var(--primary-g); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.85rem; color: #fff; flex-shrink: 0; }
        .user-name { font-weight: 600; font-size: 0.88rem; }
        .user-role { font-size: 0.75rem; color: var(--muted); }
        .user-logout { margin-left: auto; color: var(--muted); text-decoration: none; font-size: 1rem; }
        .user-logout:hover { color: var(--danger); }

        /* Main Content */
        .main { margin-left: 260px; flex: 1; padding: 2rem 2.5rem; }
        .page-header { margin-bottom: 2rem; display: flex; align-items: center; justify-content: space-between; }
        .page-title { font-size: 1.6rem; font-weight: 800; letter-spacing: -0.03em; }
        .page-sub { color: var(--muted); font-size: 0.9rem; margin-top: 0.25rem; }
        
        /* Cards & Grid */
        .card { background: var(--card); border: 1px solid var(--border); border-radius: var(--radius); padding: 1.5rem; margin-bottom: 1.5rem; }
        .card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; }
        .card-title { font-weight: 700; font-size: 1rem; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.25rem; border-radius: 8px; font-family: inherit; font-size: 0.88rem; font-weight: 600; border: none; cursor: pointer; text-decoration: none; transition: all 0.2s; }
        .btn-primary { background: var(--primary-g); color: #fff; }
        .btn-primary:hover { opacity: 0.9; transform: translateY(-1px); box-shadow: 0 4px 20px rgba(59,130,246,0.4); }
        .btn-danger { background: rgba(239,68,68,0.1); color: #f87171; border: 1px solid rgba(239,68,68,0.2); }
        .btn-ghost { background: transparent; color: var(--soft); border: 1px solid var(--border); }
        .btn-sm { padding: 0.4rem 0.9rem; font-size: 0.8rem; border-radius: 6px; }

        /* Badge */
        .badge { display: inline-flex; align-items: center; gap: 0.3rem; padding: 0.25rem 0.65rem; border-radius: 100px; font-size: 0.72rem; font-weight: 700; }
        .badge-green { background: rgba(16,185,129,0.15); color: #34d399; }
        .badge-blue { background: rgba(59,130,246,0.15); color: #60a5fa; }

        /* Hero */
        .coloc-hero { background: linear-gradient(135deg,rgba(59,130,246,0.12),rgba(99,102,241,0.08)); border: 1px solid rgba(59,130,246,0.2); border-radius: var(--radius); padding: 2rem; margin-bottom: 1.5rem; position: relative; overflow: hidden; }
        .coloc-hero::before { content: '🏡'; position: absolute; right: 2rem; top: 50%; transform: translateY(-50%); font-size: 4rem; opacity: 0.15; }
        .coloc-hero-name { font-size: 1.75rem; font-weight: 800; letter-spacing: -0.03em; margin-bottom: 0.25rem; }
        .coloc-hero-meta { color: var(--muted); font-size: 0.88rem; display: flex; gap: 1.5rem; flex-wrap: wrap; margin-top: 0.5rem; }

        /* Members & Categories */
        .member-row { display: flex; align-items: center; gap: 1rem; padding: 0.9rem 0; border-bottom: 1px solid var(--border); }
        .member-row:last-child { border-bottom: none; }
        .member-av { width: 42px; height: 42px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.9rem; color: #fff; flex-shrink: 0; }
        .member-info { flex: 1; }
        .member-name { font-weight: 700; font-size: 0.95rem; }
        .member-rep { font-size: 0.78rem; color: var(--muted); margin-top: 0.05rem; }
        .rep-star { color: var(--warning); }
        .cat-tag { display: inline-flex; align-items: center; gap: 0.5rem; background: var(--card2); border: 1px solid var(--border); border-radius: 8px; padding: 0.5rem 0.9rem; font-size: 0.85rem; font-weight: 500; margin: 0.3rem; }
        .cat-del { color: var(--danger); cursor: pointer; background: none; border: none; font-size: 0.9rem; }
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
            <a href="Dashboard.blade.php" class="nav-item"><span class="nav-icon">🏠</span> Tableau de bord</a>
            <a href="colocation.blade.php" class="nav-item active"><span class="nav-icon">🏘️</span> Ma Colocation</a>
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
            <a href="login.blade.php" class="user-logout">⏻</a>
        </div>
    </aside>

    <main class="main">
        <div class="page-header">
            <div>
                <div class="page-title">Ma Colocation</div>
                <div class="page-sub">Gestion et administration de Villa Lumière</div>
            </div>
            <form method="POST" action="{{ route('colocation.destroy', $colocations->id) }}">
                @csrf @method('post')
                <button type="submit" class="btn btn-danger btn-sm">Annuler la colocation</button>
            </form>
        </div>
        
        <a href="{{route('expense.create')}}" class="btn btn-ghost" style="margin-bottom: 1.5rem;">+ Nouvelle dépense</a>

        <div class="coloc-hero">
            <div class="coloc-hero-name">🏡 {{$colocations->name}}</div>
            <span class="badge badge-green" style="margin-bottom:0.75rem">● {{$colocations->status}}</span>
            <div class="coloc-hero-meta">
                <span class="meta-chip">📅 Depuis : {{$colocations->created_at}}</span>
            </div>
        </div>

        <div class="grid-2">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">👥 Membres (4)</span>
                    <button id="openModal" class="btn btn-primary btn-sm">+ Inviter</button>
                </div>
                
                <div class="member-row">
                    <div class="member-av" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">AL</div>
                    <div class="member-info">
                        <div class="member-name">Alex Leblanc <span class="badge badge-blue" style="font-size:0.65rem;padding:0.1rem 0.5rem;margin-left:0.3rem">Owner</span></div>
                        <div class="member-rep"><span class="rep-star">★★★★★</span> Réputation : 5 · Rejoint le 01/09/2025</div>
                    </div>
                    <span style="color:var(--success);font-size:0.8rem;font-weight:600">Vous</span>
                </div>
                </div>

            <div class="card">
                <div class="card-header">
                    <span class="card-title">🏷️ Catégories</span>
                </div>
                <div style="flex-wrap:wrap;display:flex;gap:0.2rem;margin-bottom:1rem">
                    @foreach ($categories as $item)
                        <form action="{{ route('categorie.destroy', $item->id) }}" method="POST">
                            @csrf @method('POST')
                            <span class="cat-tag">
                                🛒 {{ $item->name }}
                                <button type="submit" class="cat-del">✕</button>
                            </span>
                        </form>
                    @endforeach
                </div>
                <form method="POST" action="{{route('categorie.store')}}" style="display:flex;gap:0.5rem">
                    @csrf
                    <input type="text" name="name" placeholder="Nouvelle catégorie..." style="flex:1;background:var(--bg);border:1px solid var(--border);border-radius:8px;padding:0.6rem 0.9rem;color:var(--text);outline:none">
                    <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
                </form>
            </div>
        </div>
    </main>

    <div id="modal" style="display: none" class="fixed inset-0 bg-[#0B1120]/80 backdrop-blur-md flex items-center justify-center z-[100] p-4">
        <div class="bg-[#151C2C] border border-gray-700/50 rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all scale-100">
            <div class="bg-[#1E2638] px-6 py-5 flex justify-between items-center border-b border-gray-700/40">
                <h3 class="text-white font-semibold text-lg">Inviter un colocataire</h3>
                <button id="closeModal" class="text-gray-400 hover:text-white transition-colors p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-8">
                <p class="text-gray-400 text-sm mb-6 leading-relaxed">
                    Envoyez une invitation à votre futur colocataire pour qu'il rejoigne <span class="text-indigo-400 font-semibold text-white">Villa Lumière</span>.
                </p>
                <form action="#" class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.1em] mb-2 ml-1">Adresse E-mail</label>
                        <input type="email" placeholder="nom@exemple.com" class="w-full bg-[#0B1120] border border-gray-700/60 rounded-xl px-4 py-3.5 text-gray-200 focus:outline-none focus:ring-2 focus:ring-[#5157E0] transition-all">
                    </div>
                    <div class="flex gap-4 pt-4">
                        <button type="button" id="cancelBtn" class="flex-1 px-4 py-3 rounded-xl text-gray-400 font-medium hover:bg-gray-800/50 border border-gray-700/50">Annuler</button>
                        <button type="submit" class="flex-1 bg-[#5157E0] hover:bg-[#4349c7] text-white font-bold py-3 rounded-xl shadow-lg shadow-indigo-500/30">Inviter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modal');
        const openBtn = document.getElementById('openModal');
        const closeBtn = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');

        openBtn.addEventListener('click', function() {
        modal.style.display = 'flex'; 
    });
          closeBtn.addEventListener('click',function(){
          modal.style.display = 'none';
            
        });
          cancelBtn.addEventListener('click',function(){
          modal.style.display = 'none';
            
        });


    </script>
</body>
</html>