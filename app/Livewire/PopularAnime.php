<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PopularAnime extends Component
{
    public $popular = [];

    public function mount()
    {
        $response = Http::get('https://api.jikan.moe/v4/top/anime?limit=10');
        $this->popular = $response['data'] ?? [];
    }

    public function render()
    {
        return view('livewire.popular-anime', [
            'popular' => $this->popular,
        ]);
    }
}
