<div class="min-h-screen bg-[#0b0f1a] flex flex-col items-center justify-center p-6 font-sans antialiased text-slate-200">
    
    <div class="text-center mb-10">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-2xl shadow-lg shadow-indigo-500/20 mb-6 transform -rotate-6 hover:rotate-0 transition-transform">
            <span class="text-white text-2xl font-black italic">🏷️</span>
        </div>
        <h2 class="text-3xl font-extrabold text-white tracking-tight italic">Nouvelle catégorie</h2>
        <p class="text-slate-400 mt-2 font-medium italic">Organisez les dépenses de votre colocation</p>
    </div>

    <div class="w-full max-w-md bg-[#111827] rounded-[2.5rem] shadow-2xl border border-slate-800 p-8 md:p-12 relative overflow-hidden">
        
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-indigo-500/10 rounded-full blur-3xl"></div>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6 relative z-10">
            @csrf

            <div class="space-y-2">
                <label for="name" class="block text-sm font-bold text-slate-300 ml-1 italic">Nom de la catégorie *</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       required 
                       placeholder="Ex: Alimentation, Loyer, Loisirs..."
                       class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-inner focus:bg-[#1e293b]">
                
                <p class="text-[10px] text-slate-500 mt-2 italic uppercase tracking-widest font-bold">
                    Ce champ est obligatoire pour l'enregistrement.
                </p>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-2xl shadow-xl shadow-indigo-500/20 transform transition active:scale-[0.98] focus:ring-4 focus:ring-indigo-500/30">
                    🚀 Enregistrer la catégorie
                </button>
            </div>
        </form>

        <div class="mt-8 text-center border-t border-slate-800 pt-8">
            <a href="/dashboard" class="text-sm text-slate-500 font-semibold hover:text-indigo-400 transition italic">
                ← Retour au tableau de bord
            </a>
        </div>
    </div>
</div>