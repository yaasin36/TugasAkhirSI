<x-guest-layout>
    <style>
        .video-background {
            position: absolute;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 1;
            background-size: cover;
            object-fit: cover;
        }

        .form-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        form {
            z-index: 99999;
            position: relative;
            background-color: #fff;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            padding-top: 0;
            width: 100%;
            max-width: 450px;
        }

        /* Atur warna teks untuk kontras yang baik */
        form input[type="email"],
        form input[type="password"],
        form label {
            background-color: transparent;
            color: black;
        }

        /* Tambahkan margin pada elemen input */
        form input[type="email"],
        form input[type="password"] {
            margin-bottom: 10px;
        }
    </style>
    <!-- Video Background -->
    <video autoplay muted loop class="video-background">
        <source src="{{ asset('assets/landingPage/img/tes.mp4') }}?{{ time() }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="form-container">
        <form method="POST" action="{{ route('login') }}" novalidate>
            <div class="flex justify-center ">
                <a class="text-center">
                    <img src="{{ asset('assets/landingPage/img/Marabunta.png') }}" width="130" alt="Logo">
                </a>
            </div>
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            @if (Route::has('password.request'))
            <a class="underline text-sm text-dark-600 hover:text-gray-900 dark:hover:text-black rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif


            <div class="flex items-center justify-end mt-4">
                <!-- tidak memiliki akun -->
                <x-success-button class="ms-3">
                    <a href="{{ route('register') }}">Register</a>
                </x-success-button>

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>


        </form>
    </div>
</x-guest-layout>
