@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-6">Profil Saya</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6 text-gray-900">
    @csrf

    <div>
        <label for="name" class="block font-semibold mb-1">Nama</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
        @error('name')
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="block font-semibold mb-1">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
        @error('email')
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="block font-semibold mb-1">Password Baru <small class="text-gray-500">(kosongkan jika tidak ingin ganti)</small></label>
        <input type="password" name="password" id="password" 
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
        @error('password')
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password_confirmation" class="block font-semibold mb-1">Konfirmasi Password Baru</label>
        <input type="password" name="password_confirmation" id="password_confirmation" 
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
    </div>

    <button type="submit" class="bg-cyan-500 text-white px-6 py-2 rounded hover:bg-cyan-600 transition">
        Simpan Perubahan
    </button>
</form>

</div>
@endsection
