@extends('Layout.Main')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center">Se connecter</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="block w-full p-2 border rounded-md @error('email') border-red-500 @else border-gray-300 @enderror">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium">Mot de passe</label>
                        <input type="password" name="password" id="password" required
                            class="block w-full p-2 border rounded-md @error('password') border-red-500 @else border-gray-300 @enderror">
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="remember" class="inline-flex items-center">
                            <input type="checkbox" name="remember_me" id="remember" class="mr-2">
                            <span class="text-sm">Se souvenir de moi</span>
                        </label>
                    </div>
                </div>
                <button type="submit" class="w-full py-2 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-700">Se
                    connecter</button>
            </form>
            <div class="mt-4 text-center">
                <p class="text-sm">Vous n'avez pas de compte ? <a href="{{ route('register') }}"
                        class="text-blue-600 hover:underline">S'inscrire</a></p>
            </div>
        </div>
    </div>
@endsection
