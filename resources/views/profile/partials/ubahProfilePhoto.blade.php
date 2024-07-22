<!-- profile/partials/ubahProfilePhoto.blade.php -->
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile.") }}
        </p>
    </header>
    @if (session('status') === 'profile-photo-updated')
        <div id="successMessage"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ __('Profil Berhasil Diubah!.') }}</span>
        </div>
    @endif

    <script>
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 5000);
    </script>
    <form method="POST" action="{{ route('profile.updatePhoto') }}" enctype="multipart/form-data">
        @csrf

        <div class="flex items-center my-4">
            <div class="w-40 h-40 rounded-full overflow-hidden">
                @if (Auth::user()->gambar)
                    <img src="{{ Storage::url(Auth::user()->gambar) }}" alt="image"
                        class="w-full h-full object-cover rounded-circle">
                @else
                    <!-- Tampilkan gambar default jika tidak ada gambar profil -->
                    <img src="{{ asset('assets/img/boy(2).png') }}" alt="img"
                        class="w-full h-full object-cover rounded-circle">
                @endif
            </div>
        </div>

        <div class="mb-4">
            <x-input-label for="gambar" :value="__('Profile Photo')" />
            <input id="gambar" name="gambar" type="file" class="mt-1 block w-full" accept="image/*">
            <x-input-error class="mt-2" :messages="$errors->get('gambar')" />
        </div>

        <div class="flex items-center mt-2">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>

    </form>
</section>
