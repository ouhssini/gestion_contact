@extends('Layout.Dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-4 py-6">
        <!-- Header with breadcrumb -->
        <div class="mb-8">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('contacts.index') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-cyan-400 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Contacts
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-300 md:ml-2">{{ $contact->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex items-center justify-between">
                <div>
                    <h1
                        class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">
                        Détails du Contact
                    </h1>
                    <p class="text-gray-400 mt-2">Informations complètes de {{ $contact->name }}</p>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- Favorite Toggle -->
                    <form action="{{ route('contacts.toggleFavorite', $contact) }}" method="POST">
                        @csrf
                        <button
                            class="p-3 rounded-lg transition-colors {{ $contact->is_favorite ? 'bg-yellow-400/20 text-yellow-400 hover:bg-yellow-400/30' : 'bg-slate-700 text-gray-400 hover:bg-yellow-400/20 hover:text-yellow-400' }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                        </button>
                    </form>
                    <!-- Action Buttons -->
                    <a href="{{ route('contacts.edit', $contact) }}"
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-cyan-500 to-purple-500 hover:from-cyan-600 hover:to-purple-600 text-white font-semibold rounded-lg transition-all duration-200 shadow-lg">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Modifier
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 overflow-hidden">
                    <!-- Profile Header -->
                    <div class="bg-gradient-to-r from-cyan-500/20 to-purple-500/20 p-6 text-center">
                        @if ($contact->image)
                            <img src="{{ asset('storage/' . $contact->image) }}" alt="{{ $contact->name }}"
                                class="w-24 h-24 rounded-full object-cover mx-auto mb-4 border-4 border-white/20">
                        @else
                            <div
                                class="w-24 h-24 rounded-full bg-gradient-to-r from-orange-400 to-red-500 flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4 border-4 border-white/20">
                                {{ strtoupper(substr($contact->name, 0, 1)) }}
                            </div>
                        @endif
                        <h2 class="text-2xl font-bold text-white mb-2">{{ $contact->name }}</h2>
                        @if ($contact->category)
                            <span class="px-3 py-1 text-sm font-medium bg-purple-900 text-purple-300 rounded-full">
                                {{ $contact->category->name }}
                            </span>
                        @endif
                    </div>

                    <!-- Quick Actions -->
                    <div class="p-6 space-y-3">
                        <h3 class="text-lg font-semibold text-white mb-4">Actions Rapides</h3>

                        @if ($contact->email)
                            <a href="mailto:{{ $contact->email }}"
                                class="flex items-center p-3 bg-slate-700/50 hover:bg-slate-700 rounded-lg transition-colors group">
                                <div
                                    class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-500/30 transition-colors">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Envoyer un email</p>
                                    <p class="text-gray-400 text-sm">{{ $contact->email }}</p>
                                </div>
                            </a>
                        @endif

                        @if ($contact->phone)
                            <a href="tel:{{ $contact->phone }}"
                                class="flex items-center p-3 bg-slate-700/50 hover:bg-slate-700 rounded-lg transition-colors group">
                                <div
                                    class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-500/30 transition-colors">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Appeler</p>
                                    <p class="text-gray-400 text-sm">{{ $contact->phone }}</p>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Details Card -->
            <div class="lg:col-span-2">
                <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-slate-700/50 px-6 py-4 border-b border-white/10">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2 text-cyan-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informations Détaillées
                        </h3>
                    </div>

                    <!-- Contact Details Grid -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-300">Email</label>
                                <div class="flex items-center p-3 bg-slate-700/30 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-white">{{ $contact->email ?: 'Non renseigné' }}</span>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-300">Téléphone</label>
                                <div class="flex items-center p-3 bg-slate-700/30 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    <span class="text-white">{{ $contact->phone ?: 'Non renseigné' }}</span>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-300">Catégorie</label>
                                <div class="flex items-center p-3 bg-slate-700/30 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    @if ($contact->category)
                                        <span
                                            class="px-2 py-1 text-xs font-medium bg-purple-900 text-purple-300 rounded-full">
                                            {{ $contact->category->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">Aucune catégorie</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Favorite Status -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-300">Statut Favori</label>
                                <div class="flex items-center p-3 bg-slate-700/30 rounded-lg">
                                    <svg class="w-5 h-5 mr-3 {{ $contact->is_favorite ? 'text-yellow-400' : 'text-gray-400' }}"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                        </path>
                                    </svg>
                                    <span class="{{ $contact->is_favorite ? 'text-yellow-400' : 'text-gray-400' }}">
                                        {{ $contact->is_favorite ? 'Contact favori' : 'Contact standard' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Address (Full Width) -->
                        @if ($contact->address)
                            <div class="mt-6 space-y-2">
                                <label class="block text-sm font-medium text-gray-300">Adresse</label>
                                <div class="flex items-start p-3 bg-slate-700/30 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-400 mr-3 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-white">{{ $contact->address }}</span>
                                </div>
                            </div>
                        @endif

                        <!-- Timestamps -->
                        <div class="mt-6 pt-6 border-t border-white/10">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-400">Créé le :</span>
                                    <span class="text-white ml-2">{{ $contact->created_at->format('d/m/Y à H:i') }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-400">Modifié le :</span>
                                    <span class="text-white ml-2">{{ $contact->updated_at->format('d/m/Y à H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8">
            <a href="{{ route('contacts.index') }}"
                class="inline-flex items-center px-4 py-2 text-gray-300 bg-slate-700 hover:bg-slate-600 rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour à la liste
            </a>
        </div>
    </div>
@endsection
