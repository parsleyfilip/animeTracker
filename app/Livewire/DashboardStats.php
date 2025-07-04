<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Anime;

class DashboardStats extends Component
{
    public $averageScore;
    public $topGenres = [];
    public $perSeason = [];

    public function mount()
    {
        $animes = auth()->user()->animes;
        $this->averageScore = $animes->avg('score');

        // Genres en seizoen zijn niet standaard opgeslagen, dus we simuleren deze velden
        $genres = [];
        $seasons = [];
        foreach ($animes as $anime) {
            // Simulatie: splits genre op komma's, neem seizoen als random voorbeeld
            $animeGenres = isset($anime->genres) ? explode(',', $anime->genres) : [];
            foreach ($animeGenres as $genre) {
                $genre = trim($genre);
                if ($genre) {
                    $genres[$genre] = ($genres[$genre] ?? 0) + 1;
                }
            }
            $season = $anime->season ?? null;
            if ($season) {
                $seasons[$season] = ($seasons[$season] ?? 0) + 1;
            }
        }
        arsort($genres);
        arsort($seasons);
        $this->topGenres = array_slice($genres, 0, 3, true);
        $this->perSeason = $seasons;
    }

    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
