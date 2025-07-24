 <div class="bg-slate-800/60 backdrop-blur-lg rounded-xl p-6 border border-white/10 mb-6">
     <h3 class="text-lg font-semibold text-white mb-4">🔍 Filtres</h3>
     <div class="space-y-4">
         <div>
             <label class="block text-sm text-gray-300 mb-2">Catégorie</label>
             <select
                 onchange="window.location.href = this.value !== '' ? window.location.pathname + '?category=' + this.value : window.location.pathname"
                 class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                 <option value="">Tous les contacts</option>
                 @foreach ($data['categories'] as $category)
                     <option value="{{ $category->name }}"
                         {{ $category->name === request('category') ? 'selected' : '' }}>
                         {{ $category->name }}
                         ({{ $category->contacts_count }})
                     </option>
                 @endforeach

             </select>
         </div>
     </div>
 </div>
