<div class="md:flex md:justify-center md:gap-10 md:items-center bg-gray-100">
    <div class="md:w-5/12 p-6 md:my-10 my-0">
        <x-auth-image/>
    </div>

    <div class="md:w-5/12 p-6 md:my-10 my-0">
        <a href="/">
            <x-application-logo />
        </a>

        <div class="p-6 bg-white rounded-lg shadow-xl mt-5">
            <x-guest-layout>
                <div class="flex flex-col items-center">
                    <h1 class="text-center text-blue-700 text-4xl font-bold">Bienvenido de nuevo</h1>
                    <h5 class="text-center text-blue-700 text-xl mt-2">Inicia sesion con tus datos</h5>
                </div>

                <div class="border-b border-gray-300 mt-4 mb-4"></div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="mb-0" novalidate>
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Correo electronico')" />
                        <x-text-input 
                            id="email" 
                            class="block mt-1 w-full" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required autofocus autocomplete="username"
                            placeholder="Correo electronico"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Contraseña')" />

                        <x-text-input 
                            id="password" 
                            class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="Contraseña"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex justify-center">
                        <x-primary-button class="my-5 md:w-3/5 w-full">
                            {{ __('Iniciar sesion') }}
                        </x-primary-button>
                    </div>

                    <div class="border-b border-gray-300"></div>

                    <div class="flex flex-col items-center justify-center mt-5">
                            <x-link
                                :href="route('password.request')"
                                class="text-blue-600 mb-4 hover:underline hover:text-blue-800"
                            >
                                ¿Olvidaste tu contraseña?
                            </x-link>
            
                            <x-link
                            :href="route('register')"
                            class="bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg"
                            >
                                Crear cuenta
                            </x-link>
                    </div>
                </form>
            </x-guest-layout>
        </div>
    </div>
</div>