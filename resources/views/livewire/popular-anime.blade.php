<div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-lg p-6">
    <h3 class="text-2xl font-bold mb-6 text-gray-100 flex items-center">
        <svg class="w-6 h-6 mr-2 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
        </svg>
        Meest Populaire Anime
    </h3>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach ($popular as $anime)
            <div class="bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ $anime['images']['jpg']['image_url'] }}" class="w-full h-40 object-cover">
                    @if(isset($anime['score']))
                        <div class="absolute top-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            ⭐ {{ $anime['score'] }}
                        </div>
                    @endif
                </div>
                <div class="p-3">
                    <h4 class="font-semibold text-gray-100 text-sm line-clamp-2 mb-2">{{ $anime['title'] }}</h4>
                    @if(isset($anime['score']))
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-400">Score: {{ $anime['score'] }}</span>
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-3 h-3 {{ $i <= ($anime['score'] / 2) ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
