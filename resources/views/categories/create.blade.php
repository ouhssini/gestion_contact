@extends('Layout.Dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-4 py-6">
        <!-- Header with breadcrumb -->
        <div class="mb-8">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('categories.index') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-cyan-400 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Catégories
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="ml-1 text-sm font-medium text-gray-300 md:ml-2">{{ __('categories.create_title') }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">
                {{ __('categories.create_title') }}
            </h1>
            <p class="text-gray-400 mt-2">Créez une nouvelle catégorie pour organiser vos contacts</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-slate-700/50 px-6 py-4 border-b border-white/10">
                <h2 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Nouvelle Catégorie
                </h2>
            </div>

            <!-- Form Content -->
            <form action="{{ route('categories.store') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <!-- Name Field -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-300">
                        {{ __('categories.name') }}
                        <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            placeholder="Entrez le nom de la catégorie"
                            class="w-full px-4 py-3 bg-slate-700/50 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-white placeholder-gray-400 transition-all duration-200 {{ $errors->has('name') ? 'border border-red-500 focus:ring-red-500' : 'border border-white/10 focus:ring-cyan-500' }}">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    @error('name')
                        <p class="text-red-400 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                    <p class="text-gray-500 text-xs">Le nom de la catégorie doit être unique et descriptif</p>
                </div>

                <!-- Description Field (Optional) -->
                <div class="space-y-2">
                    <label for="description" class="block text-sm font-medium text-gray-300">
                        Description
                        <span class="text-gray-500 text-xs">(optionnel)</span>
                    </label>
                    <div class="relative">
                        <textarea name="description" id="description" rows="3"
                            placeholder="Ajoutez une description pour cette catégorie..."
                            class="w-full px-4 py-3 bg-slate-700/50 border border-white/10 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white placeholder-gray-400 resize-none transition-all duration-200">{{ old('description') }}</textarea>
                    </div>
                    <p class="text-gray-500 text-xs">Une brève description de cette catégorie</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-6 border-t border-white/10">
                    <a href="{{ route('categories.index') }}"
                        class="inline-flex items-center px-4 py-2 text-gray-300 bg-slate-700 hover:bg-slate-600 rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Retour
                    </a>

                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-cyan-500 to-purple-500 hover:from-cyan-600 hover:to-purple-600 text-white font-semibold rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        {{ __('categories.create_button') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Help Card -->
        <div class="mt-6 bg-slate-800/40 backdrop-blur-lg rounded-xl border border-white/10 p-6">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-white mb-1">À propos des catégories</h3>
                    <p class="text-sm text-gray-300">
                        Les catégories vous permettent d'organiser vos contacts en groupes logiques.
                        Par exemple : "Famille", "Travail", "Amis", etc. Chaque contact peut être assigné à une catégorie.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
