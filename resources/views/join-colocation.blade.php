<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EasyColoc – Rejoindre une coloc</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: 'Poppins', sans-serif; background: #f1f5f9; }
    .sidebar-link { display:flex; align-items:center; gap:10px; padding:10px 14px; border-radius:10px; font-size:13px; font-weight:500; color:#4b5563; transition:all .2s; text-decoration:none; }
    .sidebar-link:hover { background:#e0e7ff; color:#4f46e5; }
    .sidebar-link.active { background:#4f46e5; color:white; }
    .modal { display:none; } .modal.open { display:flex; }
  </style>
</head>
<body class="flex min-h-screen">

  <aside class="w-64 bg-white shadow-lg flex flex-col fixed h-full z-30">
    <div class="p-6 border-b"><h1 class="text-2xl font-bold text-indigo-600">🏠 EasyColoc</h1><p class="text-xs text-gray-400 mt-1">Gestion de colocation</p></div>
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
      <p class="text-xs text-gray-400 uppercase font-semibold px-3 mb-2">Menu</p>
      <a href="dashboard.html" class="sidebar-link">📊 Dashboard</a>
      <a href="colocation.html" class="sidebar-link">🏡 Ma Colocation</a>
      <a href="join-colocation.html" class="sidebar-link active">🔗 Rejoindre une coloc</a>
      <a href="create-colocation.html" class="sidebar-link">➕ Créer une coloc</a>
      <p class="text-xs text-gray-400 uppercase font-semibold px-3 mt-4 mb-2">Finances</p>
      <a href="expenses.html" class="sidebar-link">💸 Dépenses</a>
      <a href="balances.html" class="sidebar-link">⚖️ Balances</a>
      <a href="settlements.html" class="sidebar-link">💳 Remboursements</a>
      <p class="text-xs text-gray-400 uppercase font-semibold px-3 mt-4 mb-2">Compte</p>
      <a href="profile.html" class="sidebar-link">👤 Mon Profil</a>
      <a href="reputation.html" class="sidebar-link">⭐ Réputation</a>
      <a href="admin.html" class="sidebar-link">🛡️ Admin</a>
    </nav>
    <div class="p-4 border-t">
      <div class="flex items-center gap-3 mb-3">
        <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">A</div>
        <div><p class="text-sm font-medium text-gray-700">Alice Martin</p><p class="text-xs text-indigo-500 font-medium">Propriétaire</p></div>
      </div>
      <button">🚪 Se déconnecter</button>
    </div>
  </aside>

  <div class="flex-1 flex flex-col ml-64">
    <header class="bg-white shadow-sm px-8 py-4 sticky top-0 z-20">
      <h2 class="text-lg font-semibold text-gray-800">🔗 Rejoindre une colocation</h2>
    </header>

    <main class="p-8 flex items-start justify-center">
      <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-8">
        <!-- Preview (hidden by default) -->
        <div id="colocPreview" class="hidden mb-6 bg-indigo-50 border border-indigo-200 rounded-xl p-4 text-center">
          <div class="text-4xl mb-2">🏡</div>
          <h3 class="font-bold text-gray-800 text-lg" id="previewName">Appartement Les Lilas</h3>
          <p class="text-sm text-gray-500 mt-1">Propriétaire : <span class="font-medium">Alice Martin</span></p>
          <p class="text-sm text-gray-500">3 membres · Créée en sept. 2025</p>
          <div class="flex justify-center gap-2 mt-3">
            <span class="bg-white border text-xs px-2 py-1 rounded-full">👤 Alice</span>
            <span class="bg-white border text-xs px-2 py-1 rounded-full">👤 Bob</span>
            <span class="bg-white border text-xs px-2 py-1 rounded-full">👤 Clara</span>
          </div>
        </div>

        <div class="text-center mb-6" id="joinHeader">
          <div class="text-5xl mb-3">🔗</div>
          <h2 class="text-2xl font-bold text-gray-800">Rejoindre via code</h2>
          <p class="text-sm text-gray-400 mt-2">Entrez le code d'invitation reçu par email ou partagé par votre propriétaire.</p>
        </div>

        <form onsubmit="handleJoin(event)" class="space-y-4">
          <div>
            <label class="text-xs font-semibold text-gray-600 block mb-1">Code d'invitation</label>
            <input id="codeInput" type="text" placeholder="Ex: COLOC-4F9X" maxlength="10"
              oninput="checkCode(this.value)"
              class="w-full border border-gray-200 px-4 py-3 rounded-xl text-sm font-mono text-center text-lg tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-400 transition uppercase" required/>
            <p class="text-xs text-gray-400 mt-1 text-center">Le code est au format COLOC-XXXX</p>
          </div>
          <p id="codeError" class="text-xs text-red-500 text-center hidden">⚠️ Code invalide ou inconnu.</p>
          <button type="submit" id="joinBtn" class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold hover:bg-indigo-700 transition text-sm">
            Rejoindre la colocation →
          </button>
        </form>

        <div class="relative flex items-center gap-3 my-5">
          <div class="flex-1 border-t border-gray-200"></div>
          <span class="text-xs text-gray-400">ou</span>
          <div class="flex-1 border-t border-gray-200"></div>
        </div>
        <a href="create-colocation.html" class="block text-center border border-indigo-300 text-indigo-600 py-3 rounded-xl text-sm font-medium hover:bg-indigo-50 transition">
          ➕ Créer une nouvelle colocation
        </a>
      </div>
    </main>
  </div>

  <div id="logoutModal" class="modal fixed inset-0 bg-black/40 backdrop-blur-sm z-50 items-center justify-center">
    <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-sm text-center">
      <div class="text-5xl mb-3">🚪</div>
      <h3 class="text-lg font-bold text-gray-800 mb-2">Se déconnecter ?</h3>
      <p class="text-sm text-gray-400 mb-6">Vous allez être redirigé vers la page de connexion.</p>
      <div class="flex gap-3">
        <button" class="flex-1 border text-gray-600 py-2.5 rounded-xl text-sm hover:bg-gray-50 transition">Annuler</button>
        <a href="login.html" class="flex-1 bg-red-500 text-white py-2.5 rounded-xl text-sm font-semibold hover:bg-red-600 transition text-center">Déconnecter</a>
      </div>
    </div>
  </div>


</body>
</html>