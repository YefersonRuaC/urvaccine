<div class=" bg-gray-100 py-7 px-7">
    <div class="ml-60">
        <a href="/" 
            class="inline-flex items-center justify-center bg-white hover:bg-gray-100 py-2 px-5
                    rounded-md text-black text-xs font-extrabold uppercase text-center gap-1 shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" class="w-7 h-7">
                <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg> 
            Volver       
        </a>
    </div>
    <a href="/">
        <x-application-logo />
    </a>

    <div class="p-6 flex justify-center">
        <div class="p-8 bg-white rounded-lg shadow-xl max-w-3xl w-full">
            <x-guest-layout>
                <div class="flex flex-col items-center">
                    <h1 class="text-center text-blue-700 text-4xl font-bold">Crea una cuenta</h1>
                    <h5 class="text-center text-blue-700 text-xl mt-2">¡Llena el formulario!</h5>
                </div>
            <form method="POST" action="{{ route('register') }}" class="mx-auto mt-5 max-w-xl md:mt-8" novalidate>
                @csrf
    
                <div class="border-b border-gray-300 mt-4 mb-6"></div>
    
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">
                    
                    <!-- Role -->
                    <div class="md:col-span-2">
                        <x-input-label for="rol" :value="__('¿Que tipo de usuario deseas crear?')"/>
                        <select 
                            name="rol" 
                            id="rol" 
                            class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                        >
                            <option value="" selected disabled>--Selecciona un rol--</option>
                            <option value="1">Persona</option>
                            <option value="2">Mascota</option>
                        </select>
    
                        <x-input-error :messages="$errors->get('rol')" class="mt-2" />
                    </div>
    
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Ingresa tu nombre')"/>
    
                        <x-text-input 
                            id="name" 
                            class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required autofocus autocomplete="name" 
                            placeholder="Nombre"
                        />
    
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="apellido" :value="__('Ingresa tus apellidos')"/>
    
                        <x-text-input 
                            id="apellido" 
                            class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600" 
                            type="text" 
                            name="apellido" 
                            :value="old('apellido')" 
                            required autofocus autocomplete="apellido" 
                            placeholder="Apellido"
                        />
    
                        <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                    </div>
    
                    <!-- telefono -->
                    <div class="md:col-span-2">
                        <x-input-label for="telefono" :value="__('Telefono')"/>
                        
                        <x-text-input 
                            id="telefono" 
                            class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600" 
                            type="tel" 
                            name="telefono" 
                            :value="old('telefono')" 
                            required autofocus autocomplete="telefono" 
                            placeholder="Telefono"
                        />
                        
                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                    </div>
                    
    
                        <!-- tipo_doc -->
                    <div>
                        <x-input-label for="tipo_doc" :value="__('Seleccion su tipo de documento')"/>
                        <select 
                            name="tipo_doc" 
                            id="tipo_doc" 
                            class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                        >
                            <option value="" selected disabled>--Tipo de documento--</option>
                            <option value="cc">CEDULA DE CIUDADANIA</option>
                            <option value="ce">CEDULA DE EXTRANJERIA</option>
                            <option value="rc">REGISTRO CIVIL</option>
                        </select>
    
                        <x-input-error :messages="$errors->get('tipo_doc')" class="mt-2" />
                    </div>
    
                    <!-- documento -->
                    <div>
                        <x-input-label for="documento" :value="__('Numero de documento')" />
    
                        <x-text-input 
                            id="documento" 
                            class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600" 
                            type="number" 
                            name="documento" 
                            :value="old('documento')" 
                            required autofocus autocomplete="documento" 
                            placeholder="Documento"
                        />
    
                        <x-input-error :messages="$errors->get('documento')" class="mt-2" />
                    </div>
    
                    <!-- genero -->
                    <div>
                        <x-input-label for="genero" :value="__('Genero')"/>
    
                        <select 
                            name="genero" 
                            id="genero" 
                            class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                        >
                            <option selected value="" disabled>--Seleccione su genero--</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
    
                        <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                    </div>
    
                    <!-- nacimiento -->
                    <div>
                        <x-input-label for="nacimiento" :value="__('Fecha de nacimiento')"/>
    
                        <x-text-input 
                            id="nacimiento" 
                            class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600" 
                            type="date" 
                            name="nacimiento" 
                            :value="old('nacimiento')" 
                            required autofocus autocomplete="nacimiento" 
                            max="{{ date('Y-m-d') }}"
                        />
    
                        <x-input-error :messages="$errors->get('nacimiento')" class="mt-2" />
                    </div>
    
                    <!-- Email -->
                <div class="md:col-span-2">
                    <x-input-label for="email" :value="__('Correo electronico')" />
    
                    <x-text-input 
                        id="email" 
                        class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                        focus:ring-inset focus:ring-blue-600" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required autofocus autocomplete="email" 
                        placeholder="Correo electronico"
                    />
    
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                <!-- Password -->
                <div class="md:col-span-2">
                    <x-input-label for="password" :value="__('Contraseña')"/>
    
                    <x-text-input 
                        id="password" 
                        class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                        focus:ring-inset focus:ring-blue-600" 
                        type="password" 
                        name="password" 
                        :value="old('password')" 
                        required autofocus autocomplete="password"
                        placeholder="Contraseña" 
                    />
    
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
    
                <!-- Password_confirmation -->
                <div class="md:col-span-2">
                    <x-input-label for="password_confirmation" :value="__('Repita su contraseña')"/>
    
                    <x-text-input 
                        id="password_confirmation" 
                        class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                        focus:ring-inset focus:ring-blue-600" 
                        type="password" 
                        name="password_confirmation" 
                        :value="old('password_confirmation')" 
                        required autofocus autocomplete="password_confirmation" 
                        placeholder="Repita su contraseña"
                    />
    
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                
            </div>
    
            <div class="border-b border-gray-300 mt-6 mb-4"></div>
    
                <x-primary-button class=" block w-full rounded-md bg-green-600 py-2 px-4 text-center hover:bg-green-700 text-white font-bold">
                    {{ __('Crear cuenta') }}
                </x-primary-button>
    
                <div class="flex justify-center mt-5">
                    <x-link
                        :href="route('login')"
                        class="text-blue-600  mb-5 hover:underline hover:text-blue-800"
                    >
                    ¿Ya tienes una cuenta? Inicia sesion
                    </x-link>
                </div>
            </form>
            </x-guest-layout>
        </div>
    </div>
</div>