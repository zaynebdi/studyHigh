<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - studyHigh.pk')</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        admin: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                },
            },
        }
    </script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link { @apply flex items-center gap-3 px-4 py-3 text-admin-400 hover:text-white hover:bg-admin-800 rounded-lg transition-colors; }
        .sidebar-link.active { @apply text-white bg-primary-600; }
        .stat-card { @apply bg-white rounded-xl shadow-sm p-6; }
    </style>
    
    @stack('styles')
</head>
<body class="bg-admin-50 text-admin-800">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside class="w-64 bg-admin-900 flex-shrink-0 overflow-y-auto hidden md:block">
            {{-- Logo --}}
            <div class="p-6 border-b border-admin-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <div>
                        <span class="text-white font-bold text-lg">studyHigh.pk</span>
                        <span class="text-admin-400 text-xs block">Admin Panel</span>
                    </div>
                </a>
            </div>
            
            {{-- Navigation --}}
            <nav class="p-4 space-y-1">
                <p class="px-4 text-xs font-semibold text-admin-500 uppercase tracking-wider mb-2">Main</p>
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="sidebar-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.books') }}" class="sidebar-link {{ request()->routeIs('admin.books*') ? 'active' : '' }}">
                    <i class="fas fa-book w-5"></i>
                    <span>Books</span>
                </a>
                <a href="{{ route('admin.quizzes') }}" class="sidebar-link {{ request()->routeIs('admin.quizzes*') ? 'active' : '' }}">
                    <i class="fas fa-question-circle w-5"></i>
                    <span>Quizzes</span>
                </a>
                <a href="{{ route('admin.guidance') }}" class="sidebar-link {{ request()->routeIs('admin.guidance*') ? 'active' : '' }}">
                    <i class="fas fa-chalkboard-teacher w-5"></i>
                    <span>Guidance Sessions</span>
                </a>
                
                <p class="px-4 text-xs font-semibold text-admin-500 uppercase tracking-wider mb-2 mt-6">Management</p>
                <a href="{{ route('admin.reviews') }}" class="sidebar-link {{ request()->routeIs('admin.reviews*') ? 'active' : '' }}">
                    <i class="fas fa-star w-5"></i>
                    <span>Reviews</span>
                </a>
                <a href="{{ route('admin.queries') }}" class="sidebar-link {{ request()->routeIs('admin.queries*') ? 'active' : '' }}">
                    <i class="fas fa-envelope w-5"></i>
                    <span>Queries</span>
                </a>
                <a href="{{ route('admin.payments') }}" class="sidebar-link {{ request()->routeIs('admin.payments*') ? 'active' : '' }}">
                    <i class="fas fa-credit-card w-5"></i>
                    <span>Payments</span>
                </a>
                
                <p class="px-4 text-xs font-semibold text-admin-500 uppercase tracking-wider mb-2 mt-6">Settings</p>
                <a href="{{ route('admin.settings') }}" class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <i class="fas fa-cog w-5"></i>
                    <span>Settings</span>
                </a>
                <a href="{{ route('admin.reports') }}" class="sidebar-link {{ request()->routeIs('admin.reports*') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar w-5"></i>
                    <span>Reports</span>
                </a>
            </nav>
            
            {{-- User Profile --}}
            <div class="p-4 border-t border-admin-800 mt-auto">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=2563eb&color=fff" alt="Admin" class="w-10 h-10 rounded-full">
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-medium truncate">Admin User</p>
                        <p class="text-admin-400 text-sm truncate">admin@studyhigh.pk</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-admin-400 hover:text-white">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>
        
        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Top Header --}}
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    {{-- Mobile Menu Button --}}
                    <button onclick="toggleMobileSidebar()" class="md:hidden text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    {{-- Search --}}
                    <div class="hidden md:flex items-center flex-1 max-w-md ml-4">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   placeholder="Search..."
                                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none">
                        </div>
                    </div>
                    
                    {{-- Right Actions --}}
                    <div class="flex items-center gap-4">
                        {{-- Notifications --}}
                        <button class="relative text-gray-600 hover:text-gray-900">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">5</span>
                        </button>
                        
                        {{-- Messages --}}
                        <button class="relative text-gray-600 hover:text-gray-900">
                            <i class="fas fa-envelope text-xl"></i>
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-primary-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>
                        
                        {{-- View Site --}}
                        <a href="{{ route('home') }}" target="_blank" class="hidden md:flex items-center gap-2 text-gray-600 hover:text-primary-600">
                            <i class="fas fa-external-link-alt"></i>
                            <span>View Site</span>
                        </a>
                    </div>
                </div>
            </header>
            
            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto p-6">
                @yield('admin-content')
            </main>
        </div>
    </div>
    
    {{-- Mobile Sidebar --}}
    <div id="mobile-sidebar" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50" onclick="toggleMobileSidebar()"></div>
        <div class="absolute left-0 top-0 bottom-0 w-64 bg-admin-900 overflow-y-auto">
            {{-- Same sidebar content as desktop --}}
            <div class="p-6 border-b border-admin-800 flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <span class="text-white font-bold text-lg">studyHigh.pk</span>
                </a>
                <button onclick="toggleMobileSidebar()" class="text-admin-400">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="sidebar-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.books') }}" class="sidebar-link {{ request()->routeIs('admin.books*') ? 'active' : '' }}">
                    <i class="fas fa-book w-5"></i>
                    <span>Books</span>
                </a>
                <a href="{{ route('admin.quizzes') }}" class="sidebar-link {{ request()->routeIs('admin.quizzes*') ? 'active' : '' }}">
                    <i class="fas fa-question-circle w-5"></i>
                    <span>Quizzes</span>
                </a>
            </nav>
        </div>
    </div>
    
    <script>
        function toggleMobileSidebar() {
            document.getElementById('mobile-sidebar').classList.toggle('hidden');
        }
    </script>
    
    @stack('scripts')
</body>
</html>
