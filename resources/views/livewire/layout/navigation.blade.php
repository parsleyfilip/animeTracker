<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-gray-900 border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ auth()->check() ? route('dashboard') : '/' }}" wire:navigate class="flex items-center">
                        <svg class="w-8 h-8 text-purple-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="text-xl font-bold text-white">AnimeTracker</span>
                    </a>
                </div>

                <!-- Navigation Links - Only show for authenticated users -->
                @auth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('saved-anime')" :active="request()->routeIs('saved-anime')" wire:navigate class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        {{ __('Saved Anime') }}
                    </x-nav-link>
                    <x-nav-link :href="route('reviews')" :active="request()->routeIs('reviews')" wire:navigate class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        {{ __('Mijn Reviews') }}
                    </x-nav-link>
                </div>
                @endauth

                <!-- About Link - Show for all users -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="/about" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ __('About') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown - Only show for authenticated users -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-900 hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link class="text-gray-700 hover:bg-gray-100">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <!-- Guest Navigation Links -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors" wire:navigate>
                    {{ __('Login') }}
                </a>
                <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors" wire:navigate>
                    {{ __('Register') }}
                </a>
            </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="text-gray-300 hover:text-white hover:bg-gray-700">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('saved-anime')" :active="request()->routeIs('saved-anime')" wire:navigate class="text-gray-300 hover:text-white hover:bg-gray-700">
                {{ __('Saved Anime') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('reviews')" :active="request()->routeIs('reviews')" wire:navigate class="text-gray-300 hover:text-white hover:bg-gray-700">
                {{ __('Mijn Reviews') }}
            </x-responsive-nav-link>
            @else
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate class="text-gray-300 hover:text-white hover:bg-gray-700">
                {{ __('Login') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')" wire:navigate class="text-gray-300 hover:text-white hover:bg-gray-700">
                {{ __('Register') }}
            </x-responsive-nav-link>
            @endauth
            <x-responsive-nav-link href="/about" class="text-gray-300 hover:text-white hover:bg-gray-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ __('About') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options - Only show for authenticated users -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-gray-300" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-400">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link class="text-gray-300 hover:text-white hover:bg-gray-700">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
        @endauth
    </div>
</nav>
