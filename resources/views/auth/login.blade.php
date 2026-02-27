<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0b0f1a; }
    .glass-card { background: #111827; border: 1px solid rgba(255, 255, 255, 0.08); }
    .input-glow:focus { border-color: #3b82f6; box-shadow: 0 0 15px rgba(59, 130, 246, 0.2); }
</style>
</head>
<body>
    <div class="min-h-screen bg-[#0b0f1a] flex flex-col items-center p-6 text-slate-200 font-sans antialiased overflow-y-auto">
    <div class="w-full max-w-md flex justify-between mb-8 text-sm text-slate-400">
        <a href="/" class="hover:text-indigo-400 flex items-center gap-2 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Retour au site
        </a>
    </div>

    <div class="w-full max-w-md bg-[#111827] rounded-[2.5rem] shadow-2xl border border-slate-800 p-8 md:p-12 relative overflow-hidden">
        
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg shadow-indigo-500/20 mb-6 transform -rotate-6">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h2 class="text-3xl font-extrabold text-white tracking-tight italic">Bon retour !</h2>
            <p class="text-slate-400 mt-2 font-medium italic">Accédez à votre espace EasyColoc</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="email" class="block text-sm font-bold text-slate-300 ml-1">Email professionnel ou perso</label>
                <input id="email" 
                       type="email" 
                       name="email" 
                       required 
                       autofocus 
                       placeholder="nom@exemple.com"
                       class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-inner">
            </div>

            <div class="space-y-2">
                <div class="flex justify-between items-center ml-1">
                    <label for="password" class="text-sm font-bold text-slate-300">Mot de passe</label>
                    <a class="text-xs font-bold text-indigo-400 hover:text-indigo-300 transition" href="{{ route('password.request') }}">
                        Oublié ?
                    </a>
                </div>
                <input id="password" 
                       type="password" 
                       name="password" 
                       required 
                       placeholder="••••••••"
                       class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-inner">
            </div>

            <div class="flex items-center ml-1">
                <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                    <input id="remember_me" type="checkbox" name="remember" class="w-5 h-5 rounded-lg border-slate-700 bg-[#1a2235] text-indigo-600 shadow-sm focus:ring-indigo-500 cursor-pointer">
                    <span class="ms-3 text-sm font-semibold text-slate-500 group-hover:text-slate-400 transition-colors">Rester connecté</span>
                </label>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-2xl shadow-xl shadow-indigo-500/20 transform transition active:scale-[0.98]">
                    Se connecter
                </button>
            </div>
        </form>

        <div class="mt-10 text-center border-t border-slate-800 pt-8">
            <p class="text-sm text-slate-500 font-semibold">
                Nouveau ici ? 
                <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-bold transition">register</a>
            </p>
        </div>
    </div>
    
    <p class="text-center mt-8 text-slate-500 text-[10px] uppercase tracking-widest font-bold">
        EasyColoc — Gestion de Colocation
    </p>
</div>
</body>
</html>
