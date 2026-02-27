<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc — Simplifiez vos comptes en colocation</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900" x-data="{ mobileMenu: false }">

    <nav class="fixed w-full z-50 glass border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-2xl font-bold tracking-tight text-slate-800">Easy<span class="text-indigo-600">Coloc</span></span>
            </div>

            <div class="hidden md:flex items-center gap-10">
                <a href="#features" class="font-medium hover:text-indigo-600 transition">Fonctionnalités</a>
                <a href="#how" class="font-medium hover:text-indigo-600 transition">Comment ça marche</a>
                <div class="h-6 w-[1px] bg-slate-200"></div>
                <a href="/login" class="font-semibold text-slate-600 hover:text-slate-900">Connexion</a>
                <a href="/register" class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-indigo-700 transition transform hover:-translate-y-0.5">S'inscrire</a>
            </div>

            <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 text-slate-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" stroke-linecap="round"></path></svg>
            </button>
        </div>

        <div x-show="mobileMenu" @click.away="mobileMenu = false" class="md:hidden bg-white border-b p-6 space-y-4 shadow-xl">
            <a href="#features" class="block font-medium">Fonctionnalités</a>
            <a href="/login" class="block font-medium">Connexion</a>
            <a href="/register" class="block bg-indigo-600 text-white p-3 rounded-lg text-center font-bold">Démarrer</a>
        </div>
    </nav>

    <header class="pt-40 pb-20 px-6">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center">
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-700 text-sm font-bold mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                    </span>
                    Gestion de Colocation Automatisée
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 leading-[1.1] mb-8">
                    Gérez vos comptes, pas vos <span class="text-indigo-600 italic">disputes.</span>
                </h1>
                <p class="text-xl text-slate-600 mb-10 max-w-xl mx-auto lg:mx-0">
                    Plus besoin de tableaux Excel complexes. EasyColoc suit vos dépenses, calcule les dettes et gère les remboursements en toute transparence.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="/register" class="px-10 py-5 bg-indigo-600 text-white font-bold rounded-2xl shadow-2xl shadow-indigo-200 hover:bg-indigo-700 transition-all transform hover:scale-105">
                        Démarrer l'aventure
                    </a>
                    <a href="#features" class="px-10 py-5 bg-white border border-slate-200 text-slate-700 font-bold rounded-2xl hover:bg-slate-50 transition">
                        Voir les outils
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-indigo-200 rounded-full blur-3xl opacity-30 transform scale-110"></div>
                <div class="relative glass border border-white p-2 rounded-[2.5rem] shadow-2xl">
                    <div class="bg-white rounded-[2rem] overflow-hidden p-6">
                        <div class="flex items-center justify-between border-b pb-6 mb-6">
                            <h3 class="font-bold text-lg">Solde de la Coloc</h3>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase">À jour</span>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-indigo-50 rounded-2xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold">Y</div>
                                    <div>
                                        <p class="font-bold text-sm">Yassmine Jabal</p>
                                        <p class="text-xs text-slate-500 italic">Dépense: Courses</p>
                                    </div>
                                </div>
                                <span class="font-bold text-indigo-600">+450 DH</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl opacity-60">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-400 flex items-center justify-center text-white font-bold">A</div>
                                    <div>
                                        <p class="font-bold text-sm">Amine H.</p>
                                        <p class="text-xs text-slate-500 italic">Dette</p>
                                    </div>
                                </div>
                                <span class="font-bold text-red-500">-225 DH</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center mb-20">
                <h2 class="text-4xl font-extrabold text-slate-900 mb-6 italic">Pourquoi utiliser EasyColoc ?</h2>
                <p class="text-slate-600">Tout ce dont vous avez besoin pour une gestion saine et transparente de votre foyer commun.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-10">
                <div class="group p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-indigo-200 hover:bg-white hover:shadow-2xl transition-all duration-300">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-8 text-2xl group-hover:scale-110 transition">⚡</div>
                    <h3 class="text-xl font-bold mb-4">Calcul Intelligent</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Notre algorithme calcule qui doit combien à qui et optimise les transferts pour simplifier les comptes.</p>
                </div>

                <div class="group p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-indigo-200 hover:bg-white hover:shadow-2xl transition-all duration-300">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-8 text-2xl group-hover:scale-110 transition">🤝</div>
                    <h3 class="text-xl font-bold mb-4">Système de Réputation</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Gagnez des points en étant bon payeur. Un système basé sur la confiance pour éviter les relances gênantes.</p>
                </div>

                <div class="group p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-indigo-200 hover:bg-white hover:shadow-2xl transition-all duration-300">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-8 text-2xl group-hover:scale-110 transition">📩</div>
                    <h3 class="text-xl font-bold mb-4">Invitations Instantanées</h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Invitez vos colocataires par mail. Un token unique sécurisé leur permet de rejoindre votre espace en un clic.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-16 bg-slate-900 text-slate-400">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <p class="text-2xl font-bold text-white mb-2 tracking-tighter italic">EasyColoc</p>
                <p class="text-sm">Plateforme de gestion développée par <span class="text-white">Yassmine Jabal</span> dans le cadre de la formation YouCode 2026.</p>
            </div>
            <div class="flex md:justify-end gap-6 text-sm">
                <a href="#" class="hover:text-white transition">Politique</a>
                <a href="#" class="hover:text-white transition">Conditions</a>
                <a href="#" class="hover:text-white transition italic uppercase font-bold text-indigo-400">Marrakech / Youssoufia</a>
            </div>
        </div>
    </footer>

</body>
</html>