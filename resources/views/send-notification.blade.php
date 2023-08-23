<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification SMS') }}
        </h2>
    </x-slot>

    <form action="{{ route('send-notification') }}" method="POST"
        style="max-width: 500px; margin: 40px auto; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="message" style="display: block; margin-bottom: 10px; font-weight: bold;">Pesan:</label>
            <textarea name="message" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
        </div>
        <button type="submit"
            style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Kirim
            Notifikasi</button>
    </form>
</x-app-layout>
