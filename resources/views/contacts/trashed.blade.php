@extends('Layout.Dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section -->
        <div class="mb-8">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('contacts.index') }}" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-cyan-400 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Contacts
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-300 md:ml-2">Contacts supprimés</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">
                        Contacts Supprimés
                    </h1>
                    <p class="text-gray-400 mt-2">Gérez vos contacts supprimés - restaurez ou supprimez définitivement</p>
                </div>
                @if($contacts->count() > 0)
                    <div class="flex items-center space-x-3">
                        <button onclick="openBulkDeleteModal()" 
                               class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Vider la corbeille
                        </button>
                    </div>
                @endif
            </div>
        </div>

        @if($contacts->count() > 0)
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-red-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-400">Contacts supprimés</p>
                            <p class="text-2xl font-bold text-white">{{ $contacts->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-400">Favoris supprimés</p>
                            <p class="text-2xl font-bold text-white">{{ $contacts->where('is_favorite', true)->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-cyan-500/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-400">Supprimés récemment</p>
                            <p class="text-2xl font-bold text-white">{{ $contacts->where('deleted_at', '>=', now()->subDays(7))->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contacts Table -->
            <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-slate-700/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Contact
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider hidden md:table-cell">
                                    Supprimé le
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider hidden lg:table-cell">
                                    Catégorie
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach ($contacts as $contact)
                                <tr class="hover:bg-slate-700/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if ($contact->image)
                                                <img src="{{ asset('storage/' . $contact->image) }}"
                                                     alt="{{ $contact->name }}"
                                                     class="h-10 w-10 rounded-full object-cover mr-4 opacity-60">
                                            @else
                                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-orange-400 to-red-500 flex items-center justify-center text-white font-semibold mr-4 opacity-60">
                                                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                                                </div>
                                            @endif
                                            <div>
                                                <div class="text-sm font-medium text-white flex items-center">
                                                    {{ $contact->name }}
                                                    @if($contact->is_favorite)
                                                        <svg class="w-4 h-4 ml-2 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <div class="text-sm text-gray-400">{{ $contact->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-300 hidden md:table-cell">
                                        <div class="flex flex-col">
                                            <span>{{ $contact->deleted_at->format('d/m/Y') }}</span>
                                            <span class="text-xs text-gray-400">{{ $contact->deleted_at->format('H:i') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 hidden lg:table-cell">
                                        @if($contact->category)
                                            <span class="px-2 py-1 text-xs font-medium bg-purple-900 text-purple-300 rounded-full opacity-60">
                                                {{ $contact->category->name }}
                                            </span>
                                        @else
                                            <span class="text-gray-500 text-sm">Aucune</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <!-- Restore Button -->
                                            <form action="{{ route('contacts.restore', $contact) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit"
                                                        title="Restaurer le contact"
                                                        class="p-2 text-green-400 hover:bg-green-400/20 rounded-lg transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <!-- Permanent Delete Button -->
                                            <button onclick="openPermanentDeleteModal({{ $contact->id }}, '{{ $contact->name }}')"
                                                    title="Supprimer définitivement"
                                                    class="p-2 text-red-400 hover:bg-red-400/20 rounded-lg transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 p-12 text-center">
                <div class="w-24 h-24 bg-slate-700/50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Aucun contact supprimé</h3>
                <p class="text-gray-400 mb-6 max-w-md mx-auto">
                    Votre corbeille est vide. Les contacts supprimés apparaîtront ici et pourront être restaurés ou supprimés définitivement.
                </p>
                <a href="{{ route('contacts.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-cyan-500 to-purple-500 hover:from-cyan-600 hover:to-purple-600 text-white font-semibold rounded-lg transition-all duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour aux contacts
                </a>
            </div>
        @endif

        <!-- Back Button -->
        @if($contacts->count() > 0)
            <div class="mt-8">
                <a href="{{ route('contacts.index') }}" 
                   class="inline-flex items-center px-4 py-2 text-gray-300 bg-slate-700 hover:bg-slate-600 rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour aux contacts
                </a>
            </div>
        @endif
    </div>

    <!-- Permanent Delete Confirmation Modal -->
    <div id="permanentDeleteModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden items-center justify-center">
        <div class="bg-slate-800 rounded-xl border border-white/20 p-6 max-w-md w-full mx-4 transform transition-all">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-white">Suppression définitive</h3>
                </div>
            </div>
            <div class="mb-6">
                <p class="text-gray-300">
                    Êtes-vous sûr de vouloir supprimer définitivement le contact <span id="contactName" class="font-semibold text-white"></span> ? 
                    <strong class="text-red-400">Cette action est irréversible.</strong>
                </p>
            </div>
            <div class="flex justify-end space-x-3">
                <button onclick="closePermanentDeleteModal()" 
                        class="px-4 py-2 text-gray-300 bg-slate-700 hover:bg-slate-600 rounded-lg transition-colors">
                    Annuler
                </button>
                <form id="permanentDeleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                        Supprimer définitivement
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bulk Delete Confirmation Modal -->
    <div id="bulkDeleteModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden items-center justify-center">
        <div class="bg-slate-800 rounded-xl border border-white/20 p-6 max-w-md w-full mx-4 transform transition-all">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-white">Vider la corbeille</h3>
                </div>
            </div>
            <div class="mb-6">
                <p class="text-gray-300">
                    Êtes-vous sûr de vouloir supprimer définitivement <strong class="text-white">tous les contacts</strong> de la corbeille ? 
                    <strong class="text-red-400">Cette action est irréversible.</strong>
                </p>
            </div>
            <div class="flex justify-end space-x-3">
                <button onclick="closeBulkDeleteModal()" 
                        class="px-4 py-2 text-gray-300 bg-slate-700 hover:bg-slate-600 rounded-lg transition-colors">
                    Annuler
                </button>
                <form action="{{ route('contacts.emptyTrash') }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                        Vider la corbeille
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openPermanentDeleteModal(contactId, contactName) {
        document.getElementById('contactName').textContent = contactName;
        document.getElementById('permanentDeleteForm').action = `/contacts/${contactId}/force-delete`;
        const modal = document.getElementById('permanentDeleteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function closePermanentDeleteModal() {
        const modal = document.getElementById('permanentDeleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }

    function openBulkDeleteModal() {
        const modal = document.getElementById('bulkDeleteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function closeBulkDeleteModal() {
        const modal = document.getElementById('bulkDeleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }

    // Close modals when clicking outside
    document.getElementById('permanentDeleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closePermanentDeleteModal();
        }
    });

    document.getElementById('bulkDeleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeBulkDeleteModal();
        }
    });

    // Close modals with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePermanentDeleteModal();
            closeBulkDeleteModal();
        }
    });
    </script>
@endsection
