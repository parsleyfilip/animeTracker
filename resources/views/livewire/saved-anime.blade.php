<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-100">Mijn Opgeslagen Anime</h2>
                    <div class="flex gap-2">
                        <input 
                            wire:model.live="search" 
                            type="text" 
                            placeholder="Zoek in opgeslagen anime..." 
                            class="px-3 py-1 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-700 text-gray-100 placeholder-gray-400 text-sm"
                        />
                    </div>
                </div>

                @if (session()->has('message'))
                    <div class="mb-4 p-3 bg-green-900 border border-green-600 text-green-300 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                @if($animes->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($animes as $anime)
                            <div class="bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                                <img src="{{ $anime->image_url }}" alt="{{ $anime->title }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-100 mb-2 line-clamp-2">{{ $anime->title }}</h3>
                                    
                                    @if($anime->score)
                                        <div class="flex items-center mb-2">
                                            <span class="text-yellow-400 text-sm">★</span>
                                            <span class="text-gray-300 text-sm ml-1">{{ $anime->score }}/10</span>
                                        </div>
                                    @endif

                                    <div class="flex gap-2">
                                        <a 
                                            href="{{ route('reviews') }}?search={{ urlencode($anime->title) }}"
                                            class="flex-1 px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition-colors text-center"
                                        >
                                            Bekijk Reviews
                                        </a>
                                        <a 
                                            href="{{ route('reviews') }}?search={{ urlencode($anime->title) }}&write=1"
                                            class="flex-1 px-3 py-1 bg-green-600 text-white text-xs rounded hover:bg-green-700 transition-colors text-center"
                                        >
                                            Schrijf Review
                                        </a>
                                        <button 
                                            wire:click="removeAnime({{ $anime->mal_id }})"
                                            class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 transition-colors"
                                        >
                                            Verwijder
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $animes->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="text-gray-400 mb-4">
                            <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-300 mb-2">Geen opgeslagen anime</h3>
                        <p class="text-gray-400">Je hebt nog geen anime opgeslagen. Ga naar de zoekpagina om anime toe te voegen!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
