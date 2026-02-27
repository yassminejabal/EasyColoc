<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-[#0b0f1a] flex flex-col items-center justify-start p-6 sm:p-12 font-sans antialiased text-slate-200 overflow-y-auto">
    
    <div class="text-center mb-10 pt-4">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-2xl shadow-lg shadow-indigo-500/20 mb-6 transform rotate-3">
            <span class="text-white text-2xl font-bold italic">💸</span>
        </div>
        <h2 class="text-3xl font-extrabold text-white tracking-tight italic">Ajouter une dépense</h2>
        <p class="text-slate-400 mt-2 font-medium italic">Enregistrez un nouvel achat pour la colocation</p>
    </div>

    <div class="w-full max-w-2xl bg-[#111827] rounded-[2.5rem] shadow-2xl border border-slate-800 p-8 md:p-12 relative overflow-hidden mb-10">
        
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-indigo-500/10 rounded-full blur-3xl"></div>

        <form action="{{route('expense.store')}}" method="POST" class="space-y-6 relative z-10">
            @csrf

            <div class="space-y-2">
                <label for="title" class="block text-sm font-bold text-slate-300 ml-1 italic">Titre / Description *</label>
                <input type="text" id="title" name="title" required placeholder="Ex: Courses Monoprix, Facture EDF..."
                       class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-inner focus:bg-[#1e293b]">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="amount" class="block text-sm font-bold text-slate-300 ml-1 italic">Montant (€) *</label>
                    <input type="number" step="0.01" id="amount" name="amount" required placeholder="0.00"
                           class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white placeholder-slate-500 outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-inner">
                </div>

                <div class="space-y-2">
                    <label for="date" class="block text-sm font-bold text-slate-300 ml-1 italic">Date d'achat *</label>
                    <input type="date" id="date" name="date" required value="{{ date('Y-m-d') }}"
                           class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-inner">
                </div>
            </div>

            <div class="space-y-2">
                <label for="category_id" class="block text-sm font-bold text-slate-300 ml-1 italic">Catégorie *</label>
                <select id="category_id" name="category_id" required
                        class="w-full px-5 py-4 bg-[#1a2235] border border-slate-700 rounded-2xl text-white outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-inner appearance-none cursor-pointer">
                    <option value="" disabled selected>Sélectionnez une catégorie...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="colocation_id" value="">

            <div class="pt-4 text-center">
                <button type="submit" class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-2xl shadow-xl shadow-indigo-500/20 transform transition active:scale-[0.98]">
                    🚀 Enregistrer la dépense
                </button>
                <p class="mt-4 text-[10px] text-slate-500 italic uppercase tracking-[0.2em] font-bold">
                    Cette dépense sera partagée entre tous les membres
                </p>
            </div>
        </form>
    </div>

    <a href="/dashboard" class="text-sm font-bold text-slate-500 hover:text-indigo-400 transition-colors italic">
        ← Annuler et retourner au tableau de bord
    </a>
</div>