@extends('Layout.Dashboard')

@section('dashboard-content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl p-6 border border-white/10">
                <div class="flex items-center">
                    <div class="text-3xl mr-4">👥</div>
                    <div>
                        <p class="text-2xl font-bold text-white">{{ $data['totalContacts'] }}</p>
                        <p class="text-gray-400 text-sm">Total Contacts</p>
                    </div>
                </div>
            </div>
            <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl p-6 border border-white/10">
                <div class="flex items-center">
                    <div class="text-3xl mr-4">⭐</div>
                    <div>
                        <p class="text-2xl font-bold text-yellow-400">{{ $data['favoritesContacts'] }}</p>
                        <p class="text-gray-400 text-sm">Favoris</p>
                    </div>
                </div>
            </div>
            <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl p-6 border border-white/10">
                <div class="flex items-center">
                    <div class="text-3xl mr-4">📞</div>
                    <div>
                        <p class="text-2xl font-bold text-green-400">{{ $data['recentContactsCount'] }}</p>
                        <p class="text-gray-400 text-sm">Récents</p>
                    </div>
                </div>
            </div>
            <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl p-6 border border-white/10">
                <div class="flex items-center">
                    <div class="text-3xl mr-4"></div>
                    <div>
                        <p class="text-2xl font-bold text-purple-400">{{ $data['totalCategories'] }}</p>
                        <p class="text-gray-400 text-sm">Total Categories</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:col-span-1">
                <x-filterbyCategory :data="$data" />

                {{-- <!-- Quick Actions -->
                <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl p-6 border border-white/10 mb-6">
                    <h3 class="text-lg font-semibold text-white mb-4">⚡ Actions Rapides</h3>
                    <div class="space-y-3">
                        <a href="{{ route('contacts.create') }}"
                            class="inline-block w-full px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:from-cyan-600 hover:to-blue-700 transition-all duration-300">
                            ➕ Nouveau Contact
                        </a>
                        <a href="{{ route('categories.index') }}"
                            class="inline-block w-full px-4 py-2 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-lg hover:from-orange-600 hover:to-red-700 transition-all duration-300">
                            🏷️ Gérer Catégories
                        </a>
                        <a href="#"
                            class="inline-block w-full px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-600 text-white rounded-lg hover:from-purple-600 hover:to-pink-700 transition-all duration-300">
                            📤 Importer
                        </a>
                        <a href="#"
                            class="inline-block w-full px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg hover:from-green-600 hover:to-emerald-700 transition-all duration-300">
                            📥 Exporter
                        </a>
                    </div>
                </div> --}}

            </div>

            <!-- Contacts Table -->
            <x-contactstable :data="array_merge($data, ['contacts' => $data['contacts']->take(10)])" />

        </div>

    </div>

    </div>
@endsection
