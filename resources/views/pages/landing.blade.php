@extends('layouts.master')

@section('title', 'studyHigh.pk - Your Gateway to Academic Excellence')

@section('content')
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-50 via-white to-secondary-50 py-20 lg:py-32">
        {{-- Background Decorations --}}
        <div class="absolute top-0 right-0 w-1/2 h-full opacity-10">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#3B82F6" d="M44.7,-76.4C58.9,-69.2,71.8,-59.1,81.6,-46.6C91.4,-34.1,98.1,-19.2,95.8,-5.3C93.5,8.6,82.2,21.5,70.6,32.2C59,42.9,47.1,51.4,34.9,58.7C22.7,66,10.2,72.1,-1.8,75.2C-13.8,78.3,-25.3,78.4,-36.2,74.1C-47.1,69.8,-57.4,61.1,-65.3,50.3C-73.2,39.5,-78.7,26.6,-80.9,13.1C-83.1,-0.4,-82,-14.5,-76.3,-27.2C-70.6,-39.9,-60.3,-51.2,-48.3,-59.3C-36.3,-67.4,-22.6,-72.3,-8.4,-74.8C5.8,-77.3,19.6,-77.4,33.1,-76.1L44.7,-76.4Z" transform="translate(100 100)" />
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 w-1/3 h-1/2 opacity-10">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#C026D3" d="M39.9,-65.7C52.8,-58.5,65.3,-50.4,73.8,-39.2C82.3,-28,86.8,-13.7,85.8,0.1C84.8,13.9,78.3,27.2,69.6,38.6C60.9,50,49.9,59.5,37.5,66.3C25.1,73.1,11.3,77.2,-1.8,80.1C-14.9,83,-27.4,84.7,-38.8,80.1C-50.2,75.5,-60.5,64.6,-68.3,52.3C-76.1,40,-81.4,26.3,-82.6,12.3C-83.8,-1.7,-80.9,-16,-74.1,-28.4C-67.3,-40.8,-56.6,-51.3,-44.3,-58.8C-32,-66.3,-18.1,-70.8,-3.3,-77.1L39.9,-65.7Z" transform="translate(100 100)" />
            </svg>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Hero Content --}}
                <div class="text-center lg:text-left animate-fade-in">
                    <div class="inline-flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-md mb-6">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span class="text-sm font-medium text-gray-600">Trusted by 50,000+ Students</span>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Unlock Your <span class="gradient-text">Academic Potential</span> with studyHigh.pk
                    </h1>
                    
                    <p class="text-lg text-gray-600 mb-8 max-w-xl mx-auto lg:mx-0">
                        Access premium study materials, interactive quizzes, and expert guidance sessions. Your journey to academic excellence starts here.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('register') }}" class="bg-primary-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-primary-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 flex items-center justify-center gap-2">
                            <span>Get Started Free</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('books.index') }}" class="bg-white text-gray-700 border-2 border-gray-200 px-8 py-4 rounded-xl font-semibold text-lg hover:border-primary-500 hover:text-primary-600 transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-book-open"></i>
                            <span>Browse Books</span>
                        </a>
                    </div>
                    
                    {{-- Stats --}}
                    <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-gray-200">
                        <div>
                            <div class="text-3xl font-bold text-primary-600">10K+</div>
                            <div class="text-sm text-gray-500">Books Available</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-secondary-600">500+</div>
                            <div class="text-sm text-gray-500">Practice Quizzes</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-accent-600">100+</div>
                            <div class="text-sm text-gray-500">Expert Mentors</div>
                        </div>
                    </div>
                </div>
                
                {{-- Hero Image --}}
                <div class="relative animate-slide-up">
                    <div class="relative">
                        {{-- Main Image --}}
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Students studying" 
                             class="rounded-2xl shadow-2xl w-full">
                        
                        {{-- Floating Cards --}}
                        <div class="absolute -top-6 -left-6 bg-white p-4 rounded-xl shadow-lg animate-bounce-slow">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-gray-800">Quiz Completed!</div>
                                    <div class="text-xs text-gray-500">Score: 95/100</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-xl shadow-lg animate-bounce-slow" style="animation-delay: 1s;">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-trophy text-primary-600 text-xl"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-gray-800">Top Performer</div>
                                    <div class="text-xs text-gray-500">Rank #1 this week</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute top-1/2 -right-12 bg-white p-3 rounded-lg shadow-lg hidden lg:block">
                            <div class="flex items-center gap-2">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Khan&background=random" alt="User" class="w-8 h-8 rounded-full">
                                <div class="text-xs">
                                    <div class="font-semibold">Sarah Khan</div>
                                    <div class="text-gray-500">Just enrolled</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Features Section --}}
    <section class="py-20 bg-white" id="features">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block bg-primary-100 text-primary-700 px-4 py-1 rounded-full text-sm font-medium mb-4">Why Choose Us</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Everything You Need to Excel</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Comprehensive learning resources designed to help you achieve your academic goals</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div class="card-hover bg-gray-50 p-8 rounded-2xl">
                    <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-book-reader text-primary-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Extensive Book Library</h3>
                    <p class="text-gray-600">Access thousands of textbooks, reference materials, and study guides across all subjects and grade levels.</p>
                </div>
                
                {{-- Feature 2 --}}
                <div class="card-hover bg-gray-50 p-8 rounded-2xl">
                    <div class="w-14 h-14 bg-secondary-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-clipboard-check text-secondary-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Interactive Quizzes</h3>
                    <p class="text-gray-600">Test your knowledge with timed quizzes, get instant feedback, and track your progress over time.</p>
                </div>
                
                {{-- Feature 3 --}}
                <div class="card-hover bg-gray-50 p-8 rounded-2xl">
                    <div class="w-14 h-14 bg-accent-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-chalkboard-teacher text-accent-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Guidance</h3>
                    <p class="text-gray-600">Book one-on-one sessions with experienced tutors and mentors for personalized learning support.</p>
                </div>
                
                {{-- Feature 4 --}}
                <div class="card-hover bg-gray-50 p-8 rounded-2xl">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Progress Tracking</h3>
                    <p class="text-gray-600">Monitor your learning journey with detailed analytics, performance reports, and achievement badges.</p>
                </div>
                
                {{-- Feature 5 --}}
                <div class="card-hover bg-gray-50 p-8 rounded-2xl">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Learn Anywhere</h3>
                    <p class="text-gray-600">Access all resources on any device. Study on your phone, tablet, or computer - anytime, anywhere.</p>
                </div>
                
                {{-- Feature 6 --}}
                <div class="card-hover bg-gray-50 p-8 rounded-2xl">
                    <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-users text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Community Support</h3>
                    <p class="text-gray-600">Join a community of learners, ask questions, share knowledge, and collaborate with peers.</p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Popular Books Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Popular Books</h2>
                    <p class="text-gray-600">Most accessed study materials this week</p>
                </div>
                <a href="{{ route('books.index') }}" class="mt-4 md:mt-0 text-primary-600 font-medium hover:text-primary-700 flex items-center gap-2">
                    View All Books <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($popularBooks ?? [] as $book)
                    @include('components.cards.book-card', ['book' => $book])
                @endforeach
                
                {{-- Dummy Books for Preview --}}
                @php
                    $dummyBooks = [
                        ['title' => 'Mathematics for Class 10', 'subject' => 'Mathematics', 'grade' => 'Class 10', 'image' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=400', 'rating' => 4.8, 'downloads' => 2340],
                        ['title' => 'Physics Fundamentals', 'subject' => 'Physics', 'grade' => 'Class 11', 'image' => 'https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?w=400', 'rating' => 4.9, 'downloads' => 1890],
                        ['title' => 'Chemistry Made Easy', 'subject' => 'Chemistry', 'grade' => 'Class 12', 'image' => 'https://images.unsplash.com/photo-1603126857599-f6e157fa2fe6?w=400', 'rating' => 4.7, 'downloads' => 1560],
                        ['title' => 'English Grammar Guide', 'subject' => 'English', 'grade' => 'All Classes', 'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=400', 'rating' => 4.6, 'downloads' => 3210],
                    ];
                @endphp
                
                @foreach($dummyBooks as $book)
                    <div class="card-hover bg-white rounded-xl overflow-hidden shadow-md">
                        <div class="relative">
                            <img src="{{ $book['image'] }}" alt="{{ $book['title'] }}" class="w-full h-48 object-cover">
                            <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-lg text-sm font-medium flex items-center gap-1">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span>{{ $book['rating'] }}</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <span class="text-xs font-medium text-primary-600 bg-primary-50 px-2 py-1 rounded">{{ $book['subject'] }}</span>
                            <h3 class="font-bold text-gray-900 mt-2 mb-1">{{ $book['title'] }}</h3>
                            <p class="text-sm text-gray-500 mb-3">{{ $book['grade'] }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500"><i class="fas fa-download mr-1"></i> {{ number_format($book['downloads']) }}</span>
                                <a href="{{ route('books.show', 1) }}" class="text-primary-600 hover:text-primary-700 font-medium text-sm">Read Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- How It Works --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Get started with studyHigh.pk in three simple steps</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Step 1 --}}
                <div class="text-center relative">
                    <div class="w-20 h-20 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-3xl font-bold relative z-10">1</div>
                    {{-- Connector Line --}}
                    <div class="hidden md:block absolute top-10 left-1/2 w-full h-0.5 bg-primary-200"></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Create Account</h3>
                    <p class="text-gray-600">Sign up for free and set up your student profile with your academic interests and goals.</p>
                </div>
                
                {{-- Step 2 --}}
                <div class="text-center relative">
                    <div class="w-20 h-20 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-3xl font-bold relative z-10">2</div>
                    <div class="hidden md:block absolute top-10 left-1/2 w-full h-0.5 bg-primary-200"></div>
                    <div class="hidden md:block absolute top-10 right-1/2 w-full h-0.5 bg-primary-200"></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Explore Resources</h3>
                    <p class="text-gray-600">Browse our extensive library of books, take quizzes, and book guidance sessions.</p>
                </div>
                
                {{-- Step 3 --}}
                <div class="text-center relative">
                    <div class="w-20 h-20 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-3xl font-bold relative z-10">3</div>
                    <div class="hidden md:block absolute top-10 right-1/2 w-full h-0.5 bg-primary-200"></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Excel Academically</h3>
                    <p class="text-gray-600">Track your progress, earn certificates, and achieve your academic goals with confidence.</p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Testimonials --}}
    <section class="py-20 bg-gradient-to-br from-primary-900 to-secondary-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">What Students Say</h2>
                <p class="text-gray-300 max-w-2xl mx-auto">Join thousands of satisfied students who have improved their grades with studyHigh.pk</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $testimonials = [
                        ['name' => 'Ahmed Hassan', 'grade' => 'Class 10 Student', 'image' => 'https://ui-avatars.com/api/?name=Ahmed+Hassan&background=random', 'text' => 'studyHigh.pk helped me score 95% in my board exams. The practice quizzes and study materials are amazing!'],
                        ['name' => 'Fatima Ali', 'grade' => 'Class 12 Student', 'image' => 'https://ui-avatars.com/api/?name=Fatima+Ali&background=random', 'text' => 'The guidance sessions with expert tutors made complex topics so much easier to understand. Highly recommended!'],
                        ['name' => 'Usman Khan', 'grade' => 'University Student', 'image' => 'https://ui-avatars.com/api/?name=Usman+Khan&background=random', 'text' => 'Best educational platform in Pakistan. The book library has everything I need for my studies.'],
                    ];
                @endphp
                
                @foreach($testimonials as $testimonial)
                    <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl">
                        <div class="flex items-center gap-1 mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star text-yellow-400"></i>
                            @endfor
                        </div>
                        <p class="text-gray-200 mb-6 italic">"{{ $testimonial['text'] }}"</p>
                        <div class="flex items-center gap-4">
                            <img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}" class="w-12 h-12 rounded-full">
                            <div>
                                <div class="font-semibold">{{ $testimonial['name'] }}</div>
                                <div class="text-sm text-gray-400">{{ $testimonial['grade'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- CTA Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="gradient-bg rounded-3xl p-8 md:p-16 text-center text-white relative overflow-hidden">
                {{-- Background Pattern --}}
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                        </pattern>
                        <rect width="100" height="100" fill="url(#grid)" />
                    </svg>
                </div>
                
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Start Your Learning Journey?</h2>
                    <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">Join 50,000+ students already learning on studyHigh.pk. Sign up today and get access to all premium features free for 7 days.</p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="bg-white text-primary-600 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-100 transition-all duration-300 hover:shadow-xl">
                            Get Started Free
                        </a>
                        <a href="{{ route('guidance.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white/10 transition-all duration-300">
                            Book a Demo Session
                        </a>
                    </div>
                    
                    <p class="mt-6 text-sm text-white/70">No credit card required. Cancel anytime.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
