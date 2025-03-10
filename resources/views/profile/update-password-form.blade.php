<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Perbarui Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Pastikan akun Anda menggunakan kata sandi panjang dan acak untuk tetap aman.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Password Sekarang') }}" />
            <x-input id="current_password" type="password" 
                class="mt-2 block block w-full border-gray-300 focus:border-blues focus:ring focus:ring-blue-500 focus:ring-opacity-50" 
                wire:model.defer="state.current_password" 
                autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('Password Baru') }}" />
            <x-input id="password" type="password" 
                class="mt-2 block block w-full border-gray-300 focus:border-blues focus:ring focus:ring-blue-500 focus:ring-opacity-50"  
                wire:model.defer="state.password" 
                autocomplete="new-password" />

            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
            <x-input id="password_confirmation" type="password" 
                class="mt-2 block block w-full border-gray-300 focus:border-blues focus:ring focus:ring-blue-500 focus:ring-opacity-50" 
                wire:model.defer="state.password_confirmation" 
                autocomplete="new-password" />

            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Tersimpan.') }}
        </x-action-message>

        <x-button>
            {{ __('Simpan') }}
        </x-button>
    </x-slot>
</x-form-section>