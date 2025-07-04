<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 text-gray-100">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-100 mb-4">AnimeTracker</h1>
                        <p class="text-gray-400 text-lg">Een anime tracking applicatie gebouwd met Laravel en Livewire</p>
                    </div>

                    <!-- Project Doel -->
                    <div class="mb-8 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-4 text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            Project Doel & Leerdoelen
                        </h3>
                        <div class="text-white space-y-3">
                            <p class="text-lg font-semibold mb-3">Het hoofddoel van dit project was om <span class="text-yellow-300">Livewire beter te leren kennen</span> binnen de Laravel ecosystem.</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-white/10 rounded-lg p-4">
                                    <h4 class="font-bold mb-2 text-yellow-300">Livewire Leerdoelen:</h4>
                                    <ul class="space-y-1 text-sm">
                                        <li>• Real-time componenten bouwen</li>
                                        <li>• Server-side interacties zonder JavaScript</li>
                                        <li>• Form handling en validatie</li>
                                        <li>• Component lifecycle begrijpen</li>
                                        <li>• Event handling en communicatie</li>
                                    </ul>
                                </div>
                                <div class="bg-white/10 rounded-lg p-4">
                                    <h4 class="font-bold mb-2 text-yellow-300">Laravel Integratie:</h4>
                                    <ul class="space-y-1 text-sm">
                                        <li>• Livewire met Laravel Breeze</li>
                                        <li>• Database integratie via Eloquent</li>
                                        <li>• Authentication en autorisatie</li>
                                        <li>• API integratie binnen Livewire</li>
                                        <li>• Routing en middleware</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Technologieën -->
                        <div class="bg-gray-700 rounded-lg p-6">
                            <h3 class="text-xl font-bold mb-4 text-blue-400 flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                                Gebruikte Technologieën
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                                    <span class="font-semibold">Laravel 12</span> - PHP Framework
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                                    <span class="font-semibold">Livewire 3</span> - Real-time UI Components
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-cyan-500 rounded-full mr-3"></div>
                                    <span class="font-semibold">Tailwind CSS</span> - Utility-first CSS Framework
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                    <span class="font-semibold">Laravel Breeze</span> - Authentication Scaffolding
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                                    <span class="font-semibold">Jikan API</span> - MyAnimeList Unofficial API
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                                    <span class="font-semibold">SQLite</span> - Database
                                </div>
                            </div>
                        </div>

                        <!-- Wat ik heb geleerd -->
                        <div class="bg-gray-700 rounded-lg p-6">
                            <h3 class="text-xl font-bold mb-4 text-green-400 flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                Wat ik heb geleerd
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></div>
                                    <span>Livewire componenten maken en real-time interacties</span>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></div>
                                    <span>Externe API's integreren (Jikan API)</span>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></div>
                                    <span>Database relaties en Eloquent ORM</span>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></div>
                                    <span>Tailwind CSS voor styling</span>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></div>
                                    <span>Laravel routes en middleware</span>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></div>
                                    <span>User authentication en autorisatie</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="mt-8 bg-gray-700 rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-4 text-purple-400 flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Features
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Anime zoeken via Jikan API
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Favorieten opslaan
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Sorteren en filteren
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Statistieken dashboard
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Dark mode interface
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Responsive design
                            </div>
                        </div>
                    </div>

                    <!-- Conclusie -->
                    <div class="mt-8 bg-gray-700 rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-4 text-yellow-400 flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Conclusie
                        </h3>
                        <p class="text-gray-300 leading-relaxed">
                            Dit project heeft me geholpen om <span class="text-yellow-300 font-semibold">Livewire diepgaand te begrijpen</span> en te zien hoe het naadloos integreert met Laravel. 
                            Door een volledige applicatie te bouwen die ik misschien ooit later zou kunnen gebruiken, heb ik praktische ervaring opgedaan met real-time componenten en 
                            server-side interacties. Livewire heeft wel keihard bewezen om een krachtige tool te zijn 
                            voor het bouwen van gekke interfaces zonder complexe JavaScript of JavaScript frameworks.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 