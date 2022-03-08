<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())  {{ Auth::user()->name }} @endif {{ __('\'s Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                {{-- <x-jet-welcome /> --}}
                <div class="mb-8">
                    @livewire('dashboard.personal-todo')
                </div>
                <div class="mb-8">
                    @livewire('dashboard.team-projects')
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
