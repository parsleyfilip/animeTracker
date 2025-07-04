<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 text-gray-100">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-100 mb-2">{{ __("You're logged in!") }}</h1>
                        <p class="text-gray-400">Welkom bij je persoonlijke anime tracker</p>
                    </div>
                    
                    <div class="mb-12">
                        <livewire:anime-search />
                    </div>
                    
                    <div class="mb-8">
                        <livewire:popular-anime />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
