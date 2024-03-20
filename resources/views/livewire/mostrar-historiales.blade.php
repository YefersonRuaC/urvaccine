<div class="overflow-hidden mb-5">
    <div class="grid grid-cols-1 md:grid-cols-4 bg-gray-900 rounded-md">
        <div class="p-3 text-center md:border-r border-white text-white uppercase font-bold">
            {{ auth()->user()->name }} {{ auth()->user()->apellido }}
        </div>
        <div class="p-3 text-center md:border-r border-white text-white uppercase">
            {{ auth()->user()->tipo_doc }}: 
            <span class="font-bold">{{ auth()->user()->documento }}</span>
        </div>
        <div class="p-3 text-center text-white md:border-r border-white">
            Genero: 
            <span class="font-bold uppercase">{{ auth()->user()->genero }}</span>
        </div>
        <div class="p-3 text-center text-white">
            Fecha nacimiento: 
            <span class="font-bold">{{ auth()->user()->nacimiento->toFormattedDateString() }}</span>
        </div>
    </div>
    <!-- component -->
    <div class="py-2 overflow-hidden rounded-md">
        <table class="min-w-full rounded-md">
            <thead class="bg-gray-200">
                <tr>
                    <th scope="col" class="px-2 py-4 rounded-l-md border-r border-gray-300">Edad</th>
                    <th scope="col" class="px-2 py-4 border-r border-gray-300">Vacuna</th>
                    <th scope="col" class="px-2 py-4 border-r border-gray-300">Me proteje de</th>
                    <th scope="col" class="px-2 py-4 border-r border-gray-300">Jornada</th>
                    <th scope="col" class="px-2 py-4 border-r border-gray-300">Fecha</th>
                    <th scope="col" class="border-r border-gray-300">Empresa vacunadora</th>
                    <th scope="col" class="px-2 rounded-r-lg">Ver mas</th>
                </tr>
            </thead>
            <tbody class="text-center">
            @forelse ($historiales as $historial)
                <tr class="bg-white border-t transition duration-300 ease-in-out hover:bg-gray-100">
                    <td class="py-4 border-r border-gray-200">{{ $historial->edad }}</td>
                    <td class="py-4 border-r border-gray-200">{{ $historial->campana->vacuna->nombre }}</td>
                    <td class="py-4 border-r border-gray-200">{{ $historial->campana->vacuna->enfermedad }}</td>
                    <td class="py-4 border-r border-gray-200">{{ $historial->campana->titulo }}</td>
                    <td class="py-4 border-r border-gray-200">{{ $historial->campana->fecha->toFormattedDateString() }}</td>
                    <td class="py-4 border-r border-gray-200">{{ $historial->campana->empresa }}</td>
                    <td class="py-4">
                        <a href="{{ route('historiales.show', $historial->id) }}"
                            class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 
                            py-2 px-1 rounded-md text-white font-extrabold text-center shadow-md gap-1"
                        >
                            Ver jornada
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-3">
                        <p class="uppercase text-center text-gray-500">
                            No se encontro asistencia a jornadas de vacunacion aun
                        </p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>



{{-- <div>
    @forelse ($historiales as $historial)
        <p>{{ $historial->asistio }}</p>
        <p>{{ $historial->user->name }}</p> --}}
        {{-- <p>{{ $historial->campana->vacuna->precio }}</p> --}}
    {{-- @empty
        <p>No has asisitido a ninguna campaña</p>
    @endforelse
</div> --}}