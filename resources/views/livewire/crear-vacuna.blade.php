<form class="mx-auto mt-5 w-full md:w-1/2 md:mt-5" wire:submit.prevent='crearVacuna'>

    <div class="border-b border-gray-300 mb-10"></div>

    <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">

        {{--Nombre--}}
        <div class="md:col-span-2">
            <x-input-label for="nombre" :value="__('Nombre vacuna')" />
            <x-text-input 
                id="nombre" 
                class="block mt-1 w-full"
                type="text"
                wire:model="nombre"
                :value="old('nombre')"
                placeholder="Nombre vacuna"
            />{{--En livewire en ves de poner name="" ponemos wire:model="" para que se comunique con el backend--}}

            @error('nombre')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Tipo usuario--}}
        <div class="md:col-span-2">
            <x-input-label for="tipo_user" :value="__('Tipo usuario')" />
            <select 
                wire:model="tipo_user" 
                id="tipo_user" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md 
                shadow-md w-full"
            >
            <option value="" selected disabled>--Seleccione--</option>
            <option value="persona">Persona</option>
            <option value="mascota">Mascota</option>
            </select>

            @error('tipo_user')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Tipo (free/pago)--}}
        <div>
            <x-input-label for="tipo" :value="__('Tipo vacuna')" />
            <select 
                wire:model="tipo" 
                id="tipo" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-md w-full"
            >
            <option value="" selected disabled>--Seleccione--</option>
            <option value="gratis">Gratis</option>
            <option value="pago">Pago</option>
            </select>

            @error('tipo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Precio--}}
        <div>
            <x-input-label for="precio" :value="__('Precio vacuna')" />
            <x-text-input 
                id="precio" 
                class="block mt-1 w-full"
                type="number"
                wire:model="precio"
                :value="old('precio')"
                placeholder="Precio vacuna"
            />

            @error('precio')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Edad desde--}}
        <div>
            <x-input-label for="edad_desde" :value="__('Edad desde')" />
            <x-text-input 
                id="edad_desde" 
                class="block mt-1 w-full"
                type="text"
                wire:model="edad_desde"
                :value="old('edad_desde')"
                placeholder="(#) dias - meses - años"
            />

            @error('edad_desde')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Edad hasta--}}
        <div>
            <x-input-label for="edad_hasta" :value="__('Edad hasta')" />
            <x-text-input 
                id="edad_hasta" 
                class="block mt-1 w-full"
                type="text"
                wire:model="edad_hasta"
                :value="old('edad_hasta')"
                placeholder="(#) dias - meses - años"
            />

            @error('edad_hasta')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Genero--}}
        <div class="md:col-span-2">
            <x-input-label for="genero" :value="__('Genero usuario')" />
            <select 
                wire:model="genero" 
                id="genero" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-md w-full"
            >
            <option value="" selected disabled>--Seleccione--</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="ambos">Ambos</option>
            </select>

            @error('genero')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Enfermedad--}}
        <div class="md:col-span-2">
            <x-input-label for="enfermedad" :value="__('Enfermedad que previene')" />
            <x-text-input 
                id="enfermedad" 
                class="block mt-1 w-full"
                type="text"
                wire:model="enfermedad"
                :value="old('enfermedad')"
                placeholder="Enfermedad"
            />

            @error('enfermedad')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Propagacion--}}
        <div class="md:col-span-2">
            <x-input-label for="propagacion" :value="__('Medios de propagacion')" />
            <x-text-input 
                id="propagacion" 
                class="block mt-1 w-full"
                type="text"
                wire:model="propagacion"
                :value="old('propagacion')"
                placeholder="Propagacion"
            />

            @error('propagacion')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Sintomas--}}
        <div class="md:col-span-2">
            <x-input-label for="sintomas" :value="__('Sintomas de la enfermedad')" />
            <textarea 
                wire:model="sintomas" 
                id="sintomas" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-md w-full h-40"
                placeholder="Ingrese los sintomas de la enfermedad relacionados con la vacuna ha crear"
            ></textarea>
            @error('sintomas')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>
    </div>

    <div class="border-b border-gray-300 mt-6 mb-7"></div>

    <x-primary-button class="w-full">
        Crear vacuna
    </x-primary-button>
</form>