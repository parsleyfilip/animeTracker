<div class="bg-white rounded shadow p-6 mb-8">
    <h3 class="text-lg font-bold mb-4">Jouw Anime Statistieken</h3>
    <div class="mb-2">
        <span class="font-semibold">Gemiddelde score:</span>
        {{ $averageScore ? number_format($averageScore, 2) : 'n.v.t.' }}
    </div>
    <div class="mb-2">
        <span class="font-semibold">Meest bekeken genres:</span>
        @if($topGenres && count($topGenres))
            {{ implode(', ', array_keys($topGenres)) }}
        @else
            n.v.t.
        @endif
    </div>
    <div>
        <span class="font-semibold">Anime per seizoen:</span>
        @if($perSeason && count($perSeason))
            <ul class="list-disc ml-6">
                @foreach($perSeason as $season => $count)
                    <li>{{ $season }}: {{ $count }}</li>
                @endforeach
            </ul>
        @else
            n.v.t.
        @endif
    </div>
</div>
