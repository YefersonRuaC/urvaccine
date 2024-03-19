<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Campañas') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-md md:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:mostrar-campanas />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
