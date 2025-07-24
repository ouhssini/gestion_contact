@extends('Layout.Main')
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">

        <!-- Mobile menu overlay -->
        <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed top-0 left-0 z-50 w-64 h-screen bg-slate-800/95 backdrop-blur-lg border-r border-white/10 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0">
            <div class="flex items-center justify-between h-16 px-6 border-b border-white/10">
                <div class="flex items-center">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-cyan-400 to-purple-400 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="ml-3 text-lg font-semibold text-white">Contacts</span>
                </div>
                <button id="close-sidebar"
                    class="lg:hidden p-1 rounded-md text-gray-400 hover:text-white hover:bg-slate-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <nav class="mt-8 px-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700/50 hover:text-white transition-colors {{ request()->routeIs('dashboard') ? 'bg-slate-700/50 text-cyan-400' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 7 4-4 4 4">
                                </path>
                            </svg>
                            Tableau de bord
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contacts.index') }}"
                            class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700/50 hover:text-white transition-colors {{ request()->routeIs('contacts.*') ? 'bg-slate-700/50 text-cyan-400' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Contacts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}"
                            class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700/50 hover:text-white transition-colors {{ request()->routeIs('categories.*') ? 'bg-slate-700/50 text-cyan-400' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Catégories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact.trashed') }}"
                            class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700/50 hover:text-white transition-colors {{ request()->routeIs('contact.trashed') ? 'bg-slate-700/50 text-cyan-400' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V8z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10h6"></path>
                            </svg>
                            Contacts supprimés
                        </a>
                    </li>
                </ul>

                <div class="mt-8 pt-8 border-t border-white/10">
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700/50 hover:text-white transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Paramètres
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- User info in sidebar -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-cyan-400 to-purple-400 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium text-white">{{ auth()->user()->name ?? 'Anonyme' }}</p>
                        <p class="text-xs text-gray-400">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Dashboard Header -->
        <header class="bg-slate-800/90 backdrop-blur-lg border-b border-white/10 sticky top-0 z-30 lg:ml-64">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <button id="open-sidebar"
                            class="lg:hidden p-2 rounded-md text-gray-400 hover:text-white hover:bg-slate-700 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h1
                            class="text-xl lg:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">
                            Contacts Dashboard
                        </h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="hidden md:flex items-center space-x-2 text-gray-300">
                            <span class="text-sm">👋 Bonjour,</span>
                            <span class="text-cyan-400 font-semibold">{{ auth()->user()->name ?? 'Anonyme' }}</span>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                class="p-2 cursor-pointer rounded-lg bg-red-600 hover:bg-red-700 text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="lg:ml-64 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Toast Notifications -->
                @if (session('success'))
                    <div id="success-toast"
                        class="fixed top-20 right-4 z-50 bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 transform translate-x-full transition-transform duration-300 ease-out">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>{{ session('success') }}</span>
                        <button onclick="closeToast('success-toast')" class="ml-4 text-green-200 hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div id="error-toast"
                        class="fixed top-20 right-4 z-50 bg-red-600 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 transform translate-x-full transition-transform duration-300 ease-out">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>{{ session('error') }}</span>
                        <button onclick="closeToast('error-toast')" class="ml-4 text-red-200 hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endif
                @yield('dashboard-content')
            </div>
        </main>

    </div>

    <!-- JavaScript for sidebar toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const openSidebarBtn = document.getElementById('open-sidebar');
            const closeSidebarBtn = document.getElementById('close-sidebar');
            const overlay = document.getElementById('mobile-menu-overlay');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            openSidebarBtn.addEventListener('click', openSidebar);
            closeSidebarBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);

            // Close sidebar on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
                    closeSidebar();
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Show toasts on page load
            const toasts = ['success-toast', 'error-toast'];
            toasts.forEach(toastId => {
                const toast = document.getElementById(toastId);
                if (toast) {
                    setTimeout(() => {
                        toast.classList.remove('translate-x-full');
                    }, 100);

                    // Auto-hide after 5 seconds
                    setTimeout(() => {
                        closeToast(toastId);
                    }, 5000);
                }
            });
        });

        function closeToast(toastId) {
            const toast = document.getElementById(toastId);
            if (toast) {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }
        }
    </script>
@endsection
