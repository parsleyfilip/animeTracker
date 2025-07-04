<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Anime;
use Illuminate\Support\Facades\Auth;

class AnimeSearch extends Component
{
    public $query = '';
    public $results = [];
    public $saved = false;
    public $sortBy = 'score';
    public $sortDirection = 'desc';

    public function search()
    {
        $response = Http::get("https://api.jikan.moe/v4/anime?q={$this->query}");
        $this->results = $response['data'] ?? [];
        $this->saved = false;
    }

    public function sortResults($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'desc';
        }
    }

    public function save($malId, $title, $imageUrl, $score)
    {
        $anime = \App\Models\Anime::firstOrCreate([
            'mal_id' => $malId,
        ], [
            'title' => $title,
            'image_url' => $imageUrl,
            'score' => $score,
        ]);

        auth()->user()->savedAnime()->syncWithoutDetaching([$anime->mal_id]);

        $this->saved = true;
    }

    public function render()
    {
        $sortedResults = collect($this->results);
        
        if ($sortedResults->isNotEmpty()) {
            $sortedResults = $sortedResults->sortBy([
                [$this->sortBy, $this->sortDirection]
            ])->values();
        }
        
        return view('livewire.anime-search', [
            'sortedResults' => $sortedResults
        ]);
    }
}
