<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Push Notification') }}
        </h2>
    </x-slot>


    <form action="{{ route('notifications.store') }}" method="POST"
        style="max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); background-color: #ffffff;">
        @csrf

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="message" style="font-weight: bold; display: block; margin-bottom: 5px;">Pesan:</label>
            <textarea class="form-control" id="message" name="message" rows="3" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;"></textarea>
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="url" style="font-weight: bold; display: block; margin-bottom: 5px;">URL (Opsional):</label>
            <input type="url" class="form-control" id="url" name="url" value="{{ old('url') }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
        </div>

        <button type="submit" class="btn btn-primary"
            style="padding: 10px 20px; background-color: #007BFF; color: #ffffff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Kirim
            Notifikasi</button>
    </form>
</x-app-layout>
