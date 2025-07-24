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
                                class="ml-1 text-sm font-medium text-gray-300 md:ml-2">{{ $data['category']->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">
                {{ $data['category']->name }}
            </h1>
            <p class="text-gray-400 mt-2">Détails de la catégorie</p>
        </div>

        <!-- Category Details -->
        <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-white">Description</h2>
                <p class="text-gray-400 mt-2">{{ $data['category']->description }}</p>
            </div>
        </div>
    </div>
    <!-- Contacts Table -->
    <x-contactstable :data="$data" />
@endsection
