@extends('layouts.master')

@section('title', 'Quizzes - studyHigh.pk')

@section('content')
    {{-- Header Section --}}
    <section class="bg-gradient-to-br from-secondary-600 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Test Your Knowledge</h1>
                <p class="text-lg text-white/90 max-w-2xl mx-auto">Take interactive quizzes to assess your understanding and track your progress</p>
            </div>
            
            {{-- Search Bar --}}
            <div class="mt-8 max-w-2xl mx-auto">
                <form action="{{ route('quiz.index') }}" method="GET" class="relative">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Search quizzes by subject or topic..."
                           class="w-full px-6 py-4 pr-32 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-white/30">
                    <button type="submit" class="absolute right-2 top-2 bottom-2 bg-secondary-600 text-white px-6 rounded-lg hover:bg-secondary-700 transition-colors flex items-center gap-2">
                        <i class="fas fa-search"></i>
                        <span>Search</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
    
    {{-- Main Content --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Categories --}}
            <div class="mb-8">
                <div class="flex flex-wrap gap-3 justify-center">
                    <a href="{{ route('quiz.index') }}" class="px-5 py-2 rounded-full font-medium {{ !request('category') ? 'bg-secondary-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} transition-colors">
                        All Quizzes
                    </a>
                    @php
                        $categories = ['Mathematics', 'Physics', 'Chemistry', 'Biology', 'English', 'General Knowledge'];
                    @endphp
                    @foreach($categories as $category)
                        <a href="{{ route('quiz.index', ['category' => Str::slug($category)]) }}" 
                           class="px-5 py-2 rounded-full font-medium {{ request('category') == Str::slug($category) ? 'bg-secondary-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} transition-colors">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            {{-- Featured Quiz --}}
            <div class="mb-12">
                <div class="bg-gradient-to-r from-primary-600 to-secondary-600 rounded-2xl p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-1/3 h-full opacity-10">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#FFFFFF" d="M44.7,-76.4C58.9,-69.2,71.8,-59.1,81.6,-46.6C91.4,-34.1,98.1,-19.2,95.8,-5.3C93.5,8.6,82.2,21.5,70.6,32.2C59,42.9,47.1,51.4,34.9,58.7C22.7,66,10.2,72.1,-1.8,75.2C-13.8,78.3,-25.3,78.4,-36.2,74.1C-47.1,69.8,-57.4,61.1,-65.3,50.3C-73.2,39.5,-78.7,26.6,-80.9,13.1C-83.1,-0.4,-82,-14.5,-76.3,-27.2C-70.6,-39.9,-60.3,-51.2,-48.3,-59.3C-36.3,-67.4,-22.6,-72.3,-8.4,-74.8C5.8,-77.3,19.6,-77.4,33.1,-76.1L44.7,-76.4Z" transform="translate(100 100)" />
                        </svg>
                    </div>
                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                        <div class="flex-1">
                            <span class="inline-block bg-white/20 px-3 py-1 rounded-full text-sm mb-4">Featured Quiz</span>
                            <h2 class="text-3xl font-bold mb-2">Mathematics Challenge 2024</h2>
                            <p class="text-white/90 mb-4">Test your mathematical skills with our comprehensive quiz covering algebra, geometry, and calculus.</p>
                            <div class="flex flex-wrap items-center gap-4 mb-6">
                                <span class="flex items-center gap-2"><i class="fas fa-question-circle"></i> 30 Questions</span>
                                <span class="flex items-center gap-2"><i class="fas fa-clock"></i> 45 Minutes</span>
                                <span class="flex items-center gap-2"><i class="fas fa-users"></i> 2,340 Attempts</span>
                            </div>
                            <a href="{{ route('quiz.take', 1) }}" class="inline-flex items-center gap-2 bg-white text-primary-600 px-6 py-3 rounded-xl font-semibold hover:bg-gray-100 transition-colors">
                                <span>Start Quiz</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="w-32 h-32 bg-white/20 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-calculator text-6xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Quiz Grid --}}
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Available Quizzes</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $quizzes = [
                            ['id' => 1, 'title' => 'Algebra Basics', 'subject' => 'Mathematics', 'questions' => 20, 'time' => 30, 'difficulty' => 'Easy', 'attempts' => 1234, 'image' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=400'],
                            ['id' => 2, 'title' => 'Mechanics Fundamentals', 'subject' => 'Physics', 'questions' => 25, 'time' => 40, 'difficulty' => 'Medium', 'attempts' => 890, 'image' => 'https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?w=400'],
                            ['id' => 3, 'title' => 'Organic Chemistry', 'subject' => 'Chemistry', 'questions' => 30, 'time' => 45, 'difficulty' => 'Hard', 'attempts' => 567, 'image' => 'https://images.unsplash.com/photo-1603126857599-f6e157fa2fe6?w=400'],
                            ['id' => 4, 'title' => 'Cell Biology', 'subject' => 'Biology', 'questions' => 20, 'time' => 30, 'difficulty' => 'Medium', 'attempts' => 789, 'image' => 'https://images.unsplash.com/photo-1530210124550-912dc1381cb8?w=400'],
                            ['id' => 5, 'title' => 'Grammar & Vocabulary', 'subject' => 'English', 'questions' => 25, 'time' => 35, 'difficulty' => 'Easy', 'attempts' => 1456, 'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=400'],
                            ['id' => 6, 'title' => 'Pakistan Studies', 'subject' => 'General Knowledge', 'questions' => 30, 'time' => 40, 'difficulty' => 'Medium', 'attempts' => 2345, 'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=400'],
                            ['id' => 7, 'title' => 'Geometry Mastery', 'subject' => 'Mathematics', 'questions' => 25, 'time' => 35, 'difficulty' => 'Medium', 'attempts' => 678, 'image' => 'https://images.unsplash.com/photo-1509228468518-180dd4864904?w=400'],
                            ['id' => 8, 'title' => 'Thermodynamics', 'subject' => 'Physics', 'questions' => 20, 'time' => 30, 'difficulty' => 'Hard', 'attempts' => 432, 'image' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=400'],
                            ['id' => 9, 'title' => 'Periodic Table', 'subject' => 'Chemistry', 'questions' => 15, 'time' => 20, 'difficulty' => 'Easy', 'attempts' => 1567, 'image' => 'https://images.unsplash.com/photo-1603126857599-f6e157fa2fe6?w=400'],
                        ];
                    @endphp
                    
                    @foreach($quizzes as $quiz)
                        <div class="card-hover bg-white rounded-xl overflow-hidden shadow-md">
                            <div class="relative h-40">
                                <img src="{{ $quiz['image'] }}" alt="{{ $quiz['title'] }}" class="w-full h-full object-cover">
                                <div class="absolute top-3 left-3">
                                    @php
                                        $difficultyColors = [
                                            'Easy' => 'bg-green-500',
                                            'Medium' => 'bg-yellow-500',
                                            'Hard' => 'bg-red-500',
                                        ];
                                    @endphp
                                    <span class="{{ $difficultyColors[$quiz['difficulty']] }} text-white text-xs px-2 py-1 rounded font-medium">{{ $quiz['difficulty'] }}</span>
                                </div>
                            </div>
                            <div class="p-5">
                                <span class="text-xs font-medium text-secondary-600 bg-secondary-50 px-2 py-1 rounded">{{ $quiz['subject'] }}</span>
                                <h3 class="font-bold text-gray-900 mt-2 mb-3">{{ $quiz['title'] }}</h3>
                                <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                                    <span><i class="fas fa-question-circle mr-1"></i> {{ $quiz['questions'] }} Qs</span>
                                    <span><i class="fas fa-clock mr-1"></i> {{ $quiz['time'] }} min</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">{{ number_format($quiz['attempts']) }} attempts</span>
                                    <a href="{{ route('quiz.take', $quiz['id']) }}" class="bg-secondary-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-secondary-700 transition-colors">
                                        Start
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            {{-- Pagination --}}
            <div class="flex justify-center">
                <nav class="flex items-center gap-2">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg bg-secondary-600 text-white">1</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">2</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">3</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </section>
@endsection
