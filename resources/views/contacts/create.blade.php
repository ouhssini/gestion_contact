@extends('Layout.Dashboard')

@section('dashboard-content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">Create Contact</h1>
            <a href="{{ route('contacts.index') }}"
                class="inline-flex items-center px-4 py-2 bg-slate-700/50 hover:bg-slate-600/50 border border-slate-600/50 text-gray-300 hover:text-white font-medium rounded-lg transition-all duration-200 ease-in-out backdrop-blur-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Back to Contacts
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-slate-800/50 backdrop-blur-lg rounded-xl border border-slate-600/50 p-8 shadow-xl">
            <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Personal Information Section -->
                <div class="border-b border-slate-600/50 pb-6">
                    <h2 class="text-lg font-semibold text-gray-200 mb-4">Personal Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-300 mb-2">Name *</label>
                            <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 text-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition duration-200 placeholder-gray-400 backdrop-blur-sm"
                                placeholder="Enter full name">
                            @error('name')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-300 mb-2">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 text-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition duration-200 placeholder-gray-400 backdrop-blur-sm"
                                placeholder="example@email.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Contact Details Section -->
                <div class="border-b border-slate-600/50 pb-6">
                    <h2 class="text-lg font-semibold text-gray-200 mb-4">Contact Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-300 mb-2">Phone</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 text-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition duration-200 placeholder-gray-400 backdrop-blur-sm"
                                placeholder="+1 (555) 123-4567">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="category_id"
                                class="block text-sm font-semibold text-gray-300 mb-2">Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 text-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition duration-200 backdrop-blur-sm">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Address Section -->
                <div class="border-b border-slate-600/50 pb-6">
                    <h2 class="text-lg font-semibold text-gray-200 mb-4">Address</h2>
                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-300 mb-2">Full Address</label>
                        <textarea name="address" id="address" rows="4"
                            class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 text-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition duration-200 placeholder-gray-400 resize-none backdrop-blur-sm"
                            placeholder="Enter complete address">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Image & Preferences Section -->
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-gray-200">Additional Information</h2>

                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-300 mb-2">Profile Image</label>
                        <div class="relative">
                            <input type="file" name="image" id="image" accept="image/*"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600/50 text-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition duration-200 backdrop-blur-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-cyan-500/20 file:text-cyan-400 hover:file:bg-cyan-500/30">
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center p-4 bg-slate-700/30 rounded-lg border border-slate-600/50">
                        <input type="checkbox" name="is_favorite" id="is_favorite" value="1" {{ old('is_favorite') ? 'checked' : '' }}
                            class="h-5 w-5 text-cyan-500 focus:ring-cyan-500 border-slate-500 rounded transition duration-200 bg-slate-700">
                        <label for="is_favorite" class="ml-3 block text-sm font-medium text-gray-200">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                Mark as Favorite
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-6 border-t border-slate-600/50">
                    <button type="submit"
                        class="w-full md:w-auto inline-flex justify-center items-center px-8 py-3 bg-gradient-to-r from-cyan-500 to-purple-500 hover:from-cyan-600 hover:to-purple-600 focus:ring-4 focus:ring-cyan-500/50 text-white font-semibold rounded-lg transition-all duration-200 ease-in-out shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Save Contact
                    </button>
                </div>
            </form>
        </div>
    </div>

 


@endsection
