<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte — EasyColoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0b0f1a] text-slate-200 min-h-screen flex items-center justify-center p-6 overflow-y-auto">

    <div class="w-full max-w-[520px] bg-[#111827] rounded-[2.5rem] shadow-2xl border border-slate-800 p-8 sm:p-12 relative overflow-hidden">
        
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-indigo-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg mb-6 transform rotate-3">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-white tracking-tight italic">Créer un compte</h2>
                <p class="text-slate-400 mt-2 font-medium">Rejoignez l'aventure EasyColoc</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-300 ml-1">Nom complet</label>
                    <input type="text" name="name" required autofocus placeholder="Alex Leblanc"
                           class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-300 ml-1">Email</label>
                    <input type="email" name="email" required placeholder="votre@email.com"
                           class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-300 ml-1">Mot de passe</label>
                    <input type="password" name="password" required placeholder="••••••••"
                           class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-300 ml-1">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" required placeholder="••••••••"
                           class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-2xl shadow-xl shadow-indigo-500/20 transform transition active:scale-[0.98]">
                        S'inscrire
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center border-t border-slate-800 pt-8">
                <p class="text-sm text-slate-500 font-semibold">
                    Déjà inscrit ? <a href="{{ route('login') }}" class="text-indigo-400 hover:underline">Se connecter</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>