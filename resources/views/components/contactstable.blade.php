   <!-- Contacts Table -->
   <div class="lg:col-span-3">
       <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl border border-white/10 overflow-hidden">
           <div class="overflow-x-auto">
               <table class="min-w-full">
                   <thead class="bg-slate-700/50">
                       <tr>
                           <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                               Contact</th>
                           <th
                               class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider hidden md:table-cell">
                               Téléphone</th>
                           <th <th
                               class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider hidden md:table-cell">
                               Address </th>
                           <th
                               class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider hidden lg:table-cell">
                               Catégorie</th>
                           <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                               Actions</th>
                       </tr>
                   </thead>
                   <tbody class="divide-y divide-white/10">
                       <!-- Contact Rows-->
                       @foreach ($data['contacts'] as $contact)
                           <tr class="hover:bg-slate-700/30 transition-colors">
                               <td class="px-6 py-4">
                                   <div class="flex items-center">
                                       @if ($contact->image)
                                           <img src="{{ asset('storage/' . $contact->image) }}"
                                               alt="{{ $contact->name }}"
                                               class="h-10 w-10 rounded-full object-cover mr-4">
                                       @else
                                           <div
                                               class="h-10 w-10 rounded-full bg-gradient-to-r from-orange-400 to-red-500 flex items-center justify-center text-white font-semibold mr-4">
                                               {{ strtoupper(substr($contact->name, 0, 1)) }}
                                           </div>
                                       @endif
                                       <div>
                                           <div class="text-sm font-medium text-white">{{ $contact->name }}</div>
                                           <div class="text-sm text-gray-400">{{ $contact->email }}</div>
                                       </div>
                                   </div>
                               </td>
                               <td class="px-6 py-4 text-sm text-gray-300 hidden md:table-cell">
                                   {{ $contact->phone }}</td>
                               <td class="px-6 py-4 text-sm text-gray-300 hidden md:table-cell">
                                   {{ $contact->address }}</td>
                               <td class="px-6 py-4 hidden lg:table-cell">
                                   <span
                                       class="px-2 py-1 text-xs font-medium bg-purple-900 text-purple-300 rounded-full">{{ $contact->category->name ?? 'Aucune' }}</span>
                               </td>
                               <td class="px-6 py-4">
                                   <div class="flex items-center space-x-2">
                                       {{-- show the contact details --}}
                                       <a href="{{ route('contacts.show', $contact) }}"
                                           class="p-2 text-gray-400 hover:bg-gray-400/20 rounded-lg transition-colors">
                                           <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                               viewBox="0 0 24 24">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                   d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                   d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                               </path>
                                           </svg> </a>
                                       {{-- mark or unmark as favorite --}}
                                       <form action="{{ route('contacts.toggleFavorite', $contact) }}" method="POST">
                                           @csrf
                                           <button
                                               class="cursor-pointer p-2 rounded-lg transition-colors @if ($contact->is_favorite) text-yellow-400 hover:bg-yellow-400/20 @else text-gray-400 hover:bg-gray-400/20 hover:text-yellow-400 @endif">
                                               <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                   <path
                                                       d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                                   </path>
                                               </svg>
                                           </button>
                                       </form>
                                       <a href="{{ route('contacts.edit', $contact) }}"
                                           class="p-2 text-cyan-400 hover:bg-cyan-400/20 rounded-lg transition-colors">
                                           <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                               viewBox="0 0 24 24">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                   d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                               </path>
                                           </svg>
                                       </a>
                                       <button onclick="openDeleteModal({{ $contact->id }}, '{{ $contact->name }}')"
                                           class="p-2 text-red-400 hover:bg-red-400/20 rounded-lg transition-colors">
                                           <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                               viewBox="0 0 24 24">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                   d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                               </path>
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
   </div>

   <!-- Delete Confirmation Modal -->
   <div id="deleteModal"
       class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden items-center justify-center">
       <div class="bg-slate-800 rounded-xl border border-white/20 p-6 max-w-md w-full mx-4 transform transition-all">
           <div class="flex items-center mb-4">
               <div class="flex-shrink-0">
                   <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z" />
                   </svg>
               </div>
               <div class="ml-3">
                   <h3 class="text-lg font-medium text-white">Confirmer la suppression</h3>
               </div>
           </div>
           <div class="mb-6">
               <p class="text-gray-300">
                   Êtes-vous sûr de vouloir supprimer le contact <span id="contactName"
                       class="font-semibold text-white"></span> ?
                   Cette action est irréversible.
               </p>
           </div>
           <div class="flex justify-end space-x-3">
               <button onclick="closeDeleteModal()"
                   class="px-4 py-2 text-gray-300 bg-slate-700 hover:bg-slate-600 rounded-lg transition-colors">
                   Annuler
               </button>
               <form id="deleteForm" method="POST" class="inline">
                   @csrf
                   @method('DELETE')
                   <button type="submit"
                       class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                       Supprimer
                   </button>
               </form>
           </div>
       </div>
   </div>

   <script>
       function openDeleteModal(contactId, contactName) {
           document.getElementById('contactName').textContent = contactName;
           document.getElementById('deleteForm').action = `/contacts/${contactId}`;
           const modal = document.getElementById('deleteModal');
           modal.classList.remove('hidden');
           modal.classList.add('flex');
           document.body.classList.add('overflow-hidden');
       }

       function closeDeleteModal() {
           const modal = document.getElementById('deleteModal');
           modal.classList.add('hidden');
           modal.classList.remove('flex');
           document.body.classList.remove('overflow-hidden');
       }

       // Close modal when clicking outside
       document.getElementById('deleteModal').addEventListener('click', function(e) {
           if (e.target === this) {
               closeDeleteModal();
           }
       });

       // Close modal with Escape key
       document.addEventListener('keydown', function(e) {
           if (e.key === 'Escape') {
               closeDeleteModal();
           }
       });
   </script>
