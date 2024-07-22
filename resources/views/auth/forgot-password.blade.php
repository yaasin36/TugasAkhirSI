<x-guest-layout>
    <style>
        .lupa {
            text-align: justify;
        }
    </style>
    <div class="lupa mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan email berisi tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang baru.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="login_by" :value="__('Username / Email')" />
            <x-text-input id="login_by" class="block mt-1 w-full" type="text" name="login_by" :value="old('login_by')" required
                autofocus />
            <x-input-error :messages="$errors->get('login_by')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
