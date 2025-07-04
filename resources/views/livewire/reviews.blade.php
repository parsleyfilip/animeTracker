<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-100">Mijn Reviews</h2>
                    <div class="flex gap-2">
                        <input 
                            wire:model.live="search" 
                            type="text" 
                            placeholder="Zoek in reviews..." 
                            class="px-3 py-1 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-700 text-gray-100 placeholder-gray-400 text-sm"
                        />
                    </div>
                </div>

                @if (session()->has('message'))
                    <div class="mb-4 p-3 bg-green-900 border border-green-600 text-green-300 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                @if($reviews->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($reviews as $review)
                            <div class="bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow cursor-pointer" wire:click="openReviewModal({{ $review->id }})">
                                <img src="{{ $review->anime->image_url }}" alt="{{ $review->anime->title }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-100 mb-2 line-clamp-2">{{ $review->anime->title }}</h3>
                                    
                                    <div class="flex items-center mb-2">
                                        <span class="text-yellow-400 text-sm">★</span>
                                        <span class="text-gray-300 text-sm ml-1">{{ $review->rating }}/10</span>
                                    </div>

                                    @if($review->review)
                                        <p class="text-gray-300 text-xs line-clamp-2">{{ $review->review }}</p>
                                    @endif

                                    <div class="mt-3 text-xs text-gray-400">
                                        {{ $review->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $reviews->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="text-gray-400 mb-4">
                            <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-300 mb-2">Geen reviews gevonden</h3>
                        <p class="text-gray-400">Je hebt nog geen reviews geschreven. Ga naar je opgeslagen anime om reviews toe te voegen!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Review Detail Modal -->
    @if($showReviewModal && $selectedReview)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-gray-800 rounded-lg p-6 w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-100">Review Details</h3>
                    <button wire:click="closeReviewModal" class="text-gray-400 hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="flex gap-4 mb-4">
                    <img src="{{ $selectedReview->anime->image_url }}" alt="{{ $selectedReview->anime->title }}" class="w-32 h-48 object-cover rounded">
                    <div class="flex-1">
                        <h4 class="text-xl font-semibold text-gray-100 mb-2">{{ $selectedReview->anime->title }}</h4>
                        
                        <div class="flex items-center mb-3">
                            <span class="text-yellow-400 text-lg">★</span>
                            <span class="text-gray-300 text-lg ml-2">{{ $selectedReview->rating }}/10</span>
                        </div>

                        @if($selectedReview->anime->score)
                            <div class="text-sm text-gray-400 mb-2">
                                MAL Score: {{ $selectedReview->anime->score }}/10
                            </div>
                        @endif

                        <div class="text-sm text-gray-400">
                            Review geschreven op: {{ $selectedReview->created_at->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>

                @if($selectedReview->review)
                    <div class="mb-4">
                        <h5 class="text-sm font-medium text-gray-300 mb-2">Jouw Review:</h5>
                        <div class="bg-gray-700 p-4 rounded-lg">
                            <p class="text-gray-100 whitespace-pre-wrap">{{ $selectedReview->review }}</p>
                        </div>
                    </div>
                @else
                    <div class="mb-4">
                        <p class="text-gray-400 italic">Geen review tekst geschreven.</p>
                    </div>
                @endif

                <div class="flex gap-3">
                    <button 
                        wire:click="openEditModal({{ $selectedReview->id }})"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                    >
                        Review Bewerken
                    </button>
                    <button 
                        wire:click="deleteReview({{ $selectedReview->id }})"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors"
                        onclick="return confirm('Weet je zeker dat je deze review wilt verwijderen?')"
                    >
                        Review Verwijderen
                    </button>
                    <button 
                        wire:click="closeReviewModal"
                        class="px-4 py-2 bg-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors"
                    >
                        Sluiten
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Edit Review Modal -->
    @if($showEditModal && $editingReview)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-gray-800 rounded-lg p-6 w-full max-w-md mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-100">Review Bewerken voor {{ $editingReview->anime->title }}</h3>
                    <button wire:click="closeEditModal" class="text-gray-400 hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Rating (1-10)</label>
                    <div class="flex gap-1">
                        @for($i = 1; $i <= 10; $i++)
                            <button 
                                wire:click="$set('editRating', {{ $i }})"
                                class="w-8 h-8 rounded {{ $i <= $editRating ? 'bg-yellow-400 text-gray-900' : 'bg-gray-600 text-gray-400' }} hover:bg-yellow-300 transition-colors"
                            >
                                {{ $i }}
                            </button>
                        @endfor
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Review (optioneel)</label>
                    <textarea 
                        wire:model="editReviewText"
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-700 text-gray-100 placeholder-gray-400"
                        placeholder="Schrijf je gedachten over deze anime..."
                    ></textarea>
                </div>

                <div class="flex gap-3">
                    <button 
                        wire:click="saveEdit"
                        class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                    >
                        Opslaan
                    </button>
                    <button 
                        wire:click="closeEditModal"
                        class="px-4 py-2 bg-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors"
                    >
                        Annuleren
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Create Review Modal -->
    @if($showCreateModal && $createAnime)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-gray-800 rounded-lg p-6 w-full max-w-md mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-100">Schrijf een review voor {{ $createAnime->title }}</h3>
                    <button wire:click="closeCreateModal" class="text-gray-400 hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex gap-4 mb-4">
                    <img src="{{ $createAnime->image_url }}" alt="{{ $createAnime->title }}" class="w-24 h-36 object-cover rounded">
                    <div class="flex-1">
                        <h4 class="text-md font-semibold text-gray-100 mb-2">{{ $createAnime->title }}</h4>
                        @if($createAnime->score)
                            <div class="flex items-center mb-2">
                                <span class="text-yellow-400 text-sm">★</span>
                                <span class="text-gray-300 text-sm ml-1">{{ $createAnime->score }}/10</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Rating (1-10)</label>
                    <div class="flex gap-1">
                        @for($i = 1; $i <= 10; $i++)
                            <button 
                                wire:click="$set('createRating', {{ $i }})"
                                class="w-8 h-8 rounded {{ $i <= $createRating ? 'bg-yellow-400 text-gray-900' : 'bg-gray-600 text-gray-400' }} hover:bg-yellow-300 transition-colors"
                            >
                                {{ $i }}
                            </button>
                        @endfor
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Review (optioneel)</label>
                    <textarea 
                        wire:model="createReviewText"
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-700 text-gray-100 placeholder-gray-400"
                        placeholder="Schrijf je gedachten over deze anime..."
                    ></textarea>
                </div>
                <div class="flex gap-3">
                    <button 
                        wire:click="saveCreate"
                        class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                    >
                        Opslaan
                    </button>
                    <button 
                        wire:click="closeCreateModal"
                        class="px-4 py-2 bg-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors"
                    >
                        Annuleren
                    </button>
                </div>
            </div>
        </div>
    @endif
</div> 