{{-- Navigation Bar --}}
<nav class="bg-white shadow-md sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo --}}
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold gradient-text">studyHigh.pk</span>
                </a>
            </div>
            
            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('books.index') }}" class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}">Books</a>
                <a href="{{ route('quiz.index') }}" class="nav-link {{ request()->routeIs('quiz.*') ? 'active' : '' }}">Quiz</a>
                <a href="{{ route('guidance.index') }}" class="nav-link {{ request()->routeIs('guidance.*') ? 'active' : '' }}">Guidance</a>
                <a href="{{ route('reviews') }}" class="nav-link {{ request()->routeIs('reviews') ? 'active' : '' }}">Reviews</a>
            </div>
            
            {{-- Auth Buttons --}}
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    {{-- User Dropdown --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 text-gray-700 hover:text-primary-600 transition-colors">
                            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? 'User') . '&background=2563eb&color=fff' }}" 
                                 alt="Profile" 
                                 class="w-8 h-8 rounded-full">
                            <span class="font-medium">{{ auth()->user()->name ?? 'Student' }}</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                        
                        <div x-show="open" 
                             @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50"
                             style="display: none;">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                            </a>
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a>
                            <hr class="my-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Login</a>
                    <a href="{{ route('register') }}" class="bg-primary-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-primary-700 transition-all duration-300 hover:shadow-lg">
                        Get Started
                    </a>
                @endauth
            </div>
            
            {{-- Mobile Menu Button --}}
            <div class="md:hidden flex items-center">
                <button onclick="toggleMobileMenu()" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
    
    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">
                <i class="fas fa-home mr-2"></i>Home
            </a>
            <a href="{{ route('books.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">
                <i class="fas fa-book mr-2"></i>Books
            </a>
            <a href="{{ route('quiz.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">
                <i class="fas fa-question-circle mr-2"></i>Quiz
            </a>
            <a href="{{ route('guidance.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">
                <i class="fas fa-chalkboard-teacher mr-2"></i>Guidance
            </a>
            <a href="{{ route('reviews') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">
                <i class="fas fa-star mr-2"></i>Reviews
            </a>
            
            @guest
                <hr class="my-2">
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
                <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-primary-600 hover:bg-primary-50">
                    <i class="fas fa-user-plus mr-2"></i>Get Started
                </a>
            @else
                <hr class="my-2">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>

{{-- Alpine.js for dropdown functionality (Include in master layout or use vanilla JS) --}}
<script src="//unpkg.com/alpinejs" defer></script>
