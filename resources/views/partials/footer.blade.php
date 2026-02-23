{{-- Footer --}}
<footer class="bg-gray-900 text-white">
    {{-- Main Footer --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Brand Column --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold">studyHigh.pk</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Pakistan's leading education platform providing quality books, interactive quizzes, and premium guidance sessions for students.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition-colors">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            
            {{-- Quick Links --}}
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('books.index') }}" class="text-gray-400 hover:text-white transition-colors">Books</a>
                    </li>
                    <li>
                        <a href="{{ route('quiz.index') }}" class="text-gray-400 hover:text-white transition-colors">Quiz</a>
                    </li>
                    <li>
                        <a href="{{ route('guidance.index') }}" class="text-gray-400 hover:text-white transition-colors">Guidance Sessions</a>
                    </li>
                    <li>
                        <a href="{{ route('reviews') }}" class="text-gray-400 hover:text-white transition-colors">Reviews</a>
                    </li>
                </ul>
            </div>
            
            {{-- Support --}}
            <div>
                <h3 class="text-lg font-semibold mb-4">Support</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('faq') }}" class="text-gray-400 hover:text-white transition-colors">FAQ</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors">Contact Us</a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
                    </li>
                    <li>
                        <a href="{{ route('help') }}" class="text-gray-400 hover:text-white transition-colors">Help Center</a>
                    </li>
                </ul>
            </div>
            
            {{-- Contact Info --}}
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-primary-400 mt-1"></i>
                        <span class="text-gray-400">123 Education Street, Karachi, Pakistan</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-primary-400"></i>
                        <span class="text-gray-400">+92 300 1234567</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-primary-400"></i>
                        <span class="text-gray-400">info@studyhigh.pk</span>
                    </li>
                </ul>
                
                {{-- Newsletter --}}
                <div class="mt-6">
                    <h4 class="text-sm font-medium mb-2">Subscribe to Newsletter</h4>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex">
                        @csrf
                        <input type="email" name="email" placeholder="Your email" required
                               class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-l-lg text-white placeholder-gray-500 focus:outline-none focus:border-primary-500">
                        <button type="submit" class="px-4 py-2 bg-primary-600 rounded-r-lg hover:bg-primary-700 transition-colors">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Bottom Bar --}}
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-400 text-sm text-center md:text-left">
                    &copy; {{ date('Y') }} studyHigh.pk. All rights reserved.
                </p>
                <div class="flex items-center gap-6">
                    <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy</a>
                    <a href="{{ route('terms') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Terms</a>
                    <a href="{{ route('sitemap') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>
