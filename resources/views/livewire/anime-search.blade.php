<div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-lg p-6">
    @if ($saved)
        <div class="mb-4 p-3 bg-green-900 border border-green-600 text-green-300 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            Saved!
        </div>
    @endif
    
    <div class="flex gap-3 mb-6">
        <input 
            wire:model="query" 
            type="text" 
            placeholder="Zoek naar anime..." 
            class="flex-1 px-4 py-2 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-700 text-gray-100 placeholder-gray-400"
        />
        <button 
            wire:click="search" 
            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition-colors"
        >
            Zoeken
        </button>
    </div>

    @if($sortedResults->count() > 0)
        <!-- Sort Buttons -->
        <div class="mb-6 flex flex-wrap gap-2">
            <button wire:click="sortResults('title')" class="px-4 py-2 border rounded-lg transition-colors {{ $sortBy === 'title' ? 'bg-blue-600 text-white border-blue-600' : 'bg-gray-600 text-gray-300 border-gray-500 hover:bg-gray-500' }}">
                Titel {{ $sortBy === 'title' ? ($sortDirection === 'asc' ? '↑' : '↓') : '' }}
            </button>
            <button wire:click="sortResults('score')" class="px-4 py-2 border rounded-lg transition-colors {{ $sortBy === 'score' ? 'bg-blue-600 text-white border-blue-600' : 'bg-gray-600 text-gray-300 border-gray-500 hover:bg-gray-500' }}">
                Populariteit {{ $sortBy === 'score' ? ($sortDirection === 'asc' ? '↑' : '↓') : '' }}
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($sortedResults as $anime)
                <div class="bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="{{ $anime['images']['jpg']['image_url'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-100 mb-2 line-clamp-2">{{ $anime['title'] }}</h3>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-gray-400">Score: {{ $anime['score'] ?? 'N/A' }}</span>
                            @if(isset($anime['score']))
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= ($anime['score'] / 2) ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <button 
                            wire:click="save('{{ $anime['mal_id'] }}', '{{ $anime['title'] }}', '{{ $anime['images']['jpg']['image_url'] }}', {{ $anime['score'] ?? 0 }})"
                            class="w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-gray-700 transition-colors"
                        >
                            Opslaan
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif($query && !$saved)
        <div class="text-center py-8">
            <p class="text-gray-400">Geen anime gevonden voor "{{ $query }}"</p>
        </div>
    @endif
</div>
