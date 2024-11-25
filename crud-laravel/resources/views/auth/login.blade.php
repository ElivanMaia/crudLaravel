<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const rememberMeCheckbox = document.getElementById('remember_me');
            passwordInput.type = rememberMeCheckbox.checked ? 'text' : 'password';
        }
    </script>
</head>
<body>
    <div class="absolute inset-0 bg-custom">
        <x-guest-layout>
            <div class="flex justify-center pt-10">
                <img src="{{ asset('images/logoReal.png') }}" width="135" height="85" alt="Logo">
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Digite seu email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Digite sua senha" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- remember me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" onclick="togglePassword()" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-white dark:text-white">{{ __('Mostrar Senha') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                <span class="text-sm text-white dark:text-white">
                        Não tem uma conta? 
                        <a class="underline text-white dark:text-white hover:text-gray-300 dark:hover:text-gray-400" href="{{ route('register') }}">
                            {{ __('Registre-se') }}
                        </a>
                    </span>


                    <x-primary-button class="ms-3">
                        {{ __('Entrar') }}
                    </x-primary-button>
                </div>
            </form>
        </x-guest-layout>
    </div>
</body>
</html>
