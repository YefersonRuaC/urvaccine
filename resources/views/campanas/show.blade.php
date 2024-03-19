<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informacion campaña') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="text-gray-900">
                    {{--Gracias al RMB tenemos acceso a la vrble $vacuna con toda su info--}}
                    <div class="md:flex md:justify-center">

                        {{--Pasamos la vrble a la vista livewire--}}
                        <livewire:mostrar-campana 
                            :campana="$campana"
                        />
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
