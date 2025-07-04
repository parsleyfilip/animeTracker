<?php

namespace App\Livewire;

use App\Models\Review;
use App\Models\Anime;
use Livewire\Component;
use Livewire\WithPagination;

class Reviews extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $showReviewModal = false;
    public $selectedReview = null;
    public $showEditModal = false;
    public $editingReview = null;
    public $editReviewText = '';
    public $editRating = 0;
    public $showCreateModal = false;
    public $createReviewText = '';
    public $createRating = 0;
    public $createAnime = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function mount()
    {
        // Check if there's a search parameter from the saved anime page
        if (request()->has('search')) {
            $this->search = request()->get('search');
        }
        // Open create modal if write=1 is present
        if (request()->has('write') && request()->get('write') == 1 && $this->search) {
            $anime = \App\Models\Anime::where('title', 'like', $this->search)->first();
            if ($anime) {
                $this->createAnime = $anime;
                $this->showCreateModal = true;
                $this->createRating = 0;
                $this->createReviewText = '';
            }
        }
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function openReviewModal($reviewId)
    {
        $this->selectedReview = Review::with('anime')->find($reviewId);
        $this->showReviewModal = true;
    }

    public function closeReviewModal()
    {
        $this->showReviewModal = false;
        $this->selectedReview = null;
    }

    public function openEditModal($reviewId)
    {
        $this->editingReview = Review::with('anime')->find($reviewId);
        $this->editReviewText = $this->editingReview->review ?? '';
        $this->editRating = $this->editingReview->rating;
        $this->showEditModal = true;
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->editingReview = null;
        $this->editReviewText = '';
        $this->editRating = 0;
    }

    public function saveEdit()
    {
        $this->validate([
            'editRating' => 'required|integer|min:1|max:10',
            'editReviewText' => 'nullable|string|max:1000',
        ]);

        $this->editingReview->update([
            'rating' => $this->editRating,
            'review' => $this->editReviewText,
        ]);

        $this->closeEditModal();
        session()->flash('message', 'Review succesvol bijgewerkt!');
    }

    public function deleteReview($reviewId)
    {
        Review::where('id', $reviewId)
            ->where('user_id', auth()->id())
            ->delete();
        $this->closeReviewModal();
        session()->flash('message', 'Review succesvol verwijderd!');
    }

    public function openCreateModal($animeId)
    {
        $this->createAnime = \App\Models\Anime::find($animeId);
        $this->showCreateModal = true;
        $this->createRating = 0;
        $this->createReviewText = '';
    }

    public function closeCreateModal()
    {
        $this->showCreateModal = false;
        $this->createAnime = null;
        $this->createRating = 0;
        $this->createReviewText = '';
    }

    public function saveCreate()
    {
        $this->validate([
            'createRating' => 'required|integer|min:1|max:10',
            'createReviewText' => 'nullable|string|max:1000',
        ]);
        if (!$this->createAnime) return;
        \App\Models\Review::create([
            'user_id' => auth()->id(),
            'mal_id' => $this->createAnime->mal_id,
            'rating' => $this->createRating,
            'review' => $this->createReviewText,
        ]);
        $this->closeCreateModal();
        session()->flash('message', 'Review succesvol aangemaakt!');
        $this->resetPage();
    }

    public function render()
    {
        $query = Review::with('anime')
            ->where('user_id', auth()->id());
        
        if ($this->search) {
            $query->whereHas('anime', function($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            });
        }
        
        $reviews = $query->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(12);
            
        return view('livewire.reviews', [
            'reviews' => $reviews,
        ]);
    }
} 