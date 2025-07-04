<?php

namespace App\Livewire;

use App\Models\Anime;
use Livewire\Component;
use Livewire\WithPagination;

class SavedAnime extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'title';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'title'],
        'sortDirection' => ['except' => 'asc'],
    ];

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

    public function removeAnime($malId)
    {
        $user = auth()->user();
        $user->savedAnime()->detach($malId);
        
        session()->flash('message', 'Anime removed from saved list!');
    }

    public function render()
    {
        $user = auth()->user();
        
        $query = $user->savedAnime();
        
        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }
        
        $animes = $query->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(12);
            
        return view('livewire.saved-anime', [
            'animes' => $animes,
        ]);
    }
}
