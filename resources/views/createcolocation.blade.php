<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une colocation - EasyColoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f172a] text-slate-200 min-h-screen flex flex-col items-center p-6 font-sans">

    <div class="w-full max-w-2xl mb-6">
        <a href="{{route('dashboard')}}" class="text-sm text-slate-400 hover:text-indigo-400 flex items-center gap-2 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Retour au dashboard
        </a>
    </div>

    <div class="flex items-center gap-3 mb-8">
        <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20">
            <span class="text-white font-black text-xl italic">EC</span>
        </div>
        <h1 class="text-2xl font-bold tracking-tight text-white italic">EasyColoc</h1>
    </div>

    <div class="w-full max-w-2xl bg-[#1e293b] rounded-[2.5rem] shadow-2xl border border-slate-700/50 p-8 md:p-12">
        
        <div class="mb-10">
            <h2 class="text-3xl font-extrabold text-white mb-2 italic">🏠 Créer une colocation</h2>
            {{-- <p class="text-slate-400 text-sm">Vous deviendrez automatiquement l'**owner** de cette colocation.</p> --}}
        </div>

        <div class="bg-indigo-500/10 border border-indigo-500/20 rounded-2xl p-4 mb-10 flex gap-4">
            <span class="text-indigo-400 font-bold italic block w-6 h-6 border-2 border-indigo-400 rounded-full text-center leading-5">i</span>
            <p class="text-xs text-indigo-200 leading-relaxed font-medium">
                Vous ne pouvez avoir qu'**une seule colocation active** à la fois. Cette restriction s'applique également aux invitations acceptées.
            </p>
        </div>

        <form action="{{route('storecolocation')}}" method="POST" class="space-y-6">
            @csrf
            @method('POST')
<div class="flex flex-col space-y-2">
    <label for="name" class="text-sm font-bold text-slate-300 ml-1 italic">
        Nom de la colocation *
    </label>
    <input type="text" 
           id="name" 
           name="name" 
           required 
           placeholder="Ex: Les Joyeux Colocs"
           class="w-full px-5 py-4 bg-[#0f172a] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-inner">
    <p class="text-[10px] text-slate-500 mt-1 italic uppercase tracking-wider">
        Ce champ est obligatoire pour la création.
    </p>
</div>
            <div class="pt-6">
                <button type="submit" 
                        class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-xl shadow-indigo-500/20 transform transition active:scale-[0.98]">
                    🚀 Créer la colocation
                </button>
            </div>
        </form>
    </div>

</body>
</html>