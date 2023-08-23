<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification Email') }}
        </h2>
    </x-slot>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif
    <form action="{{ url('/email-notify') }}" method="post"
        class="bg-white p-6 rounded shadow-md max-w-xl mx-auto mt-4">
        @csrf
        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Pengguna:</label>
            <select name="user_id" id="user_id"
                class="form-input block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan:</label>
            <textarea name="message" id="message" rows="4"
                class="form-input block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow">
                Kirim Notifikasi
            </button>
        </div>
    </form>
</x-app-layout>
