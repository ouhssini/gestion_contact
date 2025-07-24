@extends('Layout.Main')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute -top-40 -right-40 w-80 h-80 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse">
            </div>
            <div
                class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse delay-1000">
            </div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-pulse delay-2000">
            </div>
        </div>

        <!-- Floating Particles -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-2 h-2 bg-white rounded-full opacity-30 animate-bounce delay-300"></div>
            <div class="absolute top-40 right-20 w-1 h-1 bg-purple-300 rounded-full opacity-40 animate-bounce delay-700">
            </div>
            <div class="absolute bottom-40 left-1/4 w-3 h-3 bg-blue-300 rounded-full opacity-20 animate-bounce delay-1000">
            </div>
            <div class="absolute top-1/3 right-1/3 w-2 h-2 bg-pink-300 rounded-full opacity-30 animate-bounce delay-500">
            </div>
        </div>

        <div class="relative z-10 flex flex-col items-center justify-center px-4 py-16">
            <!-- Header Section -->
            <header class="text-center mb-20">
                <div class="relative">
                    <h1
                        class="text-6xl md:text-8xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400 animate-pulse mb-6">
                        Gestion de Contacts
                    </h1>
                    <div
                        class="absolute -top-4 -left-4 w-full h-full border-2 border-purple-400 opacity-20 rounded-lg transform rotate-1">
                    </div>
                </div>
                <p
                    class="mt-8 text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed backdrop-blur-sm bg-white/5 p-6 rounded-2xl border border-white/10">
                    Révolutionnez votre façon de gérer vos contacts avec une expérience <span
                        class="text-cyan-400 font-semibold">moderne</span>,
                    <span class="text-purple-400 font-semibold">intuitive</span> et <span
                        class="text-pink-400 font-semibold">sécurisée</span>
                </p>
            </header>

            <!-- Features Section -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl w-full mb-20">
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-2xl blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200">
                    </div>
                    <div
                        class="relative bg-slate-800/80 backdrop-blur-lg p-8 rounded-2xl border border-white/10 hover:border-cyan-400/50 transition-all duration-500 transform hover:-translate-y-3 hover:scale-105">
                        <div class="text-5xl mb-6 transform group-hover:scale-110 transition-transform duration-300">📋
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-cyan-400 transition-colors">Gestion
                            Intuitive</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Interface révolutionnaire avec des animations fluides et des micro-interactions qui rendent la
                            gestion de contacts
                            naturelle et agréable.
                        </p>
                        <div
                            class="mt-6 h-1 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                        </div>
                    </div>
                </div>

                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-2xl blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200">
                    </div>
                    <div
                        class="relative bg-slate-800/80 backdrop-blur-lg p-8 rounded-2xl border border-white/10 hover:border-purple-400/50 transition-all duration-500 transform hover:-translate-y-3 hover:scale-105">
                        <div class="text-5xl mb-6 transform group-hover:scale-110 transition-transform duration-300">🛡️
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-purple-400 transition-colors">
                            Sécurité Avancée</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Cryptage de niveau militaire, authentification multi-facteurs et sauvegarde automatique pour une
                            protection maximale de vos données sensibles.
                        </p>
                        <div
                            class="mt-6 h-1 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                        </div>
                    </div>
                </div>

                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-pink-400 to-rose-500 rounded-2xl blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200">
                    </div>
                    <div
                        class="relative bg-slate-800/80 backdrop-blur-lg p-8 rounded-2xl border border-white/10 hover:border-pink-400/50 transition-all duration-500 transform hover:-translate-y-3 hover:scale-105">
                        <div class="text-5xl mb-6 transform group-hover:scale-110 transition-transform duration-300">⚡</div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-pink-400 transition-colors">
                            Performance Ultra</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Synchronisation temps réel, recherche instantanée et interface ultra-responsive pour une
                            expérience
                            fluide sur tous vos appareils.
                        </p>
                        <div
                            class="mt-6 h-1 bg-gradient-to-r from-pink-400 to-rose-500 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="grid grid-cols-1 md:grid-cols-4 gap-8 max-w-6xl w-full mb-20">
                <div class="text-center bg-white/5 backdrop-blur-lg rounded-2xl p-6 border border-white/10">
                    <div class="text-4xl font-black text-cyan-400 mb-2">99.9%</div>
                    <div class="text-gray-300 text-sm uppercase tracking-wider">Disponibilité</div>
                </div>
                <div class="text-center bg-white/5 backdrop-blur-lg rounded-2xl p-6 border border-white/10">
                    <div class="text-4xl font-black text-purple-400 mb-2">1M+</div>
                    <div class="text-gray-300 text-sm uppercase tracking-wider">Utilisateurs</div>
                </div>
                <div class="text-center bg-white/5 backdrop-blur-lg rounded-2xl p-6 border border-white/10">
                    <div class="text-4xl font-black text-pink-400 mb-2">24/7</div>
                    <div class="text-gray-300 text-sm uppercase tracking-wider">Support</div>
                </div>
                <div class="text-center bg-white/5 backdrop-blur-lg rounded-2xl p-6 border border-white/10">
                    <div class="text-4xl font-black text-rose-400 mb-2">256-bit</div>
                    <div class="text-gray-300 text-sm uppercase tracking-wider">Cryptage</div>
                </div>
            </section>

            <!-- Call to Action -->
            <section class="text-center relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400 rounded-full blur-2xl opacity-20">
                </div>
                @auth
                    <div class="relative">
                        <a href="{{ route('dashboard') }}"
                            class="group relative inline-flex items-center justify-center px-12 py-6 text-xl font-bold text-white bg-gradient-to-r from-cyan-500 via-purple-500 to-pink-500 rounded-full shadow-2xl hover:shadow-cyan-500/25 transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 overflow-hidden">
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                            <span class="relative flex items-center">
                                🚀 Accéder au Tableau de Bord
                                <svg class="ml-3 w-6 h-6 transform group-hover:translate-x-2 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                @else
                    <div class="space-y-4 md:space-y-0 md:space-x-6 md:flex md:justify-center">
                        <a href="{{ route('loginForm') }}"
                            class="group relative inline-flex items-center justify-center px-10 py-5 text-lg font-bold text-white bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full shadow-2xl hover:shadow-cyan-500/25 transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 overflow-hidden">
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                            <span class="relative flex items-center">
                                🔐 Se Connecter
                                <svg class="ml-2 w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                            </span>
                        </a>
                        <a href="{{ route('registerForm') }}"
                            class="group relative inline-flex items-center justify-center px-10 py-5 text-lg font-bold text-white bg-gradient-to-r from-purple-500 to-pink-600 rounded-full shadow-2xl hover:shadow-purple-500/25 transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 overflow-hidden">
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                            <span class="relative flex items-center">
                                ✨ S'Inscrire Gratuitement
                                <svg class="ml-2 w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                    </path>
                                </svg>
                            </span>
                        </a>
                    </div>
                @endauth
            </section>

            <!-- Footer -->
            <footer class="mt-20 text-center">
                <div class="backdrop-blur-lg bg-white/5 rounded-2xl p-6 border border-white/10">
                    <p class="text-gray-400 text-sm flex items-center justify-center">
                        <span class="mr-2">©</span>
                        <span class="text-white font-semibold">{{ date('Y') }}</span>
                        <span class="mx-2 text-purple-400">•</span>
                        <span
                            class="bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent font-bold">Gestion
                            de Contacts</span>
                        <span class="mx-2 text-purple-400">•</span>
                        <span>Tous droits réservés</span>
                    </p>
                    <div class="mt-4 flex justify-center space-x-6">
                        <span
                            class="text-xs text-gray-500 hover:text-purple-400 transition-colors cursor-pointer">Politique
                            de confidentialité</span>
                        <span
                            class="text-xs text-gray-500 hover:text-purple-400 transition-colors cursor-pointer">Conditions
                            d'utilisation</span>
                        <span
                            class="text-xs text-gray-500 hover:text-purple-400 transition-colors cursor-pointer">Support</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(139, 92, 246, 0.6);
            }
        }

        .animate-glow {
            animation: glow 2s ease-in-out infinite;
        }
    </style>
@endsection
