@extends('layouts.master')

@section('title', 'Student Dashboard - studyHigh.pk')

@section('content')
    <div class="min-h-screen bg-gray-50">
        {{-- Dashboard Header --}}
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Student Dashboard</h1>
                        <p class="text-gray-600">Welcome back, {{ auth()->user()->name ?? 'Student' }}!</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('books.index') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-primary-700 transition-colors flex items-center gap-2">
                            <i class="fas fa-book"></i>
                            <span>Browse Books</span>
                        </a>
                        <a href="{{ route('quiz.index') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors flex items-center gap-2">
                            <i class="fas fa-question-circle"></i>
                            <span>Take Quiz</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Dashboard Content --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{-- Stats Cards --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                @php
                    $stats = [
                        ['label' => 'Books Read', 'value' => '24', 'icon' => 'fa-book-open', 'color' => 'blue'],
                        ['label' => 'Quizzes Taken', 'value' => '18', 'icon' => 'fa-clipboard-check', 'color' => 'green'],
                        ['label' => 'Avg. Score', 'value' => '85%', 'icon' => 'fa-chart-line', 'color' => 'purple'],
                        ['label' => 'Guidance Sessions', 'value' => '5', 'icon' => 'fa-chalkboard-teacher', 'color' => 'orange'],
                    ];
                @endphp
                
                @foreach($stats as $stat)
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">{{ $stat['label'] }}</p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stat['value'] }}</p>
                            </div>
                            <div class="w-12 h-12 bg-{{ $stat['color'] }}-100 rounded-xl flex items-center justify-center">
                                <i class="fas {{ $stat['icon'] }} text-{{ $stat['color'] }}-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="grid lg:grid-cols-3 gap-8">
                {{-- Left Column --}}
                <div class="lg:col-span-2 space-y-8">
                    {{-- Recent Activity --}}
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b">
                            <h2 class="text-lg font-bold text-gray-900">Recent Activity</h2>
                        </div>
                        <div class="p-6">
                            @php
                                $activities = [
                                    ['type' => 'quiz', 'title' => 'Completed Mathematics Quiz', 'detail' => 'Score: 18/20 (90%)', 'time' => '2 hours ago', 'icon' => 'fa-check-circle', 'color' => 'green'],
                                    ['type' => 'book', 'title' => 'Read Physics Fundamentals', 'detail' => 'Chapter 5: Laws of Motion', 'time' => 'Yesterday', 'icon' => 'fa-book', 'color' => 'blue'],
                                    ['type' => 'guidance', 'title' => 'Guidance Session with Prof. Khan', 'detail' => 'Topic: Calculus Basics', 'time' => '2 days ago', 'icon' => 'fa-video', 'color' => 'purple'],
                                    ['type' => 'quiz', 'title' => 'Completed Chemistry Quiz', 'detail' => 'Score: 15/20 (75%)', 'time' => '3 days ago', 'icon' => 'fa-check-circle', 'color' => 'green'],
                                    ['type' => 'achievement', 'title' => 'Earned Quick Learner Badge', 'detail' => 'Completed 5 quizzes in a week', 'time' => '1 week ago', 'icon' => 'fa-trophy', 'color' => 'yellow'],
                                ];
                            @endphp
                            
                            <div class="space-y-4">
                                @foreach($activities as $activity)
                                    <div class="flex items-start gap-4">
                                        <div class="w-10 h-10 bg-{{ $activity['color'] }}-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <i class="fas {{ $activity['icon'] }} text-{{ $activity['color'] }}-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-medium text-gray-900">{{ $activity['title'] }}</p>
                                            <p class="text-sm text-gray-500">{{ $activity['detail'] }}</p>
                                        </div>
                                        <span class="text-sm text-gray-400">{{ $activity['time'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    {{-- Recent Books --}}
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b flex items-center justify-between">
                            <h2 class="text-lg font-bold text-gray-900">Recently Accessed Books</h2>
                            <a href="{{ route('books.index') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">View All</a>
                        </div>
                        <div class="p-6">
                            <div class="grid sm:grid-cols-2 gap-4">
                                @php
                                    $recentBooks = [
                                        ['title' => 'Mathematics for Class 10', 'progress' => 75, 'image' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=200'],
                                        ['title' => 'Physics Fundamentals', 'progress' => 45, 'image' => 'https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?w=200'],
                                        ['title' => 'Chemistry Made Easy', 'progress' => 30, 'image' => 'https://images.unsplash.com/photo-1603126857599-f6e157fa2fe6?w=200'],
                                        ['title' => 'English Grammar Guide', 'progress' => 90, 'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=200'],
                                    ];
                                @endphp
                                
                                @foreach($recentBooks as $book)
                                    <div class="flex gap-4 p-4 bg-gray-50 rounded-xl">
                                        <img src="{{ $book['image'] }}" alt="{{ $book['title'] }}" class="w-16 h-20 object-cover rounded-lg">
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-900 text-sm">{{ $book['title'] }}</h4>
                                            <div class="mt-2">
                                                <div class="flex items-center justify-between text-xs text-gray-500 mb-1">
                                                    <span>Progress</span>
                                                    <span>{{ $book['progress'] }}%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2">
                                                    <div class="bg-primary-600 h-2 rounded-full" style="width: {{ $book['progress'] }}%"></div>
                                                </div>
                                            </div>
                                            <a href="#" class="text-primary-600 text-xs font-medium mt-2 inline-block">Continue Reading</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    {{-- Quiz Performance --}}
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b flex items-center justify-between">
                            <h2 class="text-lg font-bold text-gray-900">Quiz Performance</h2>
                            <a href="{{ route('quiz.index') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">Take New Quiz</a>
                        </div>
                        <div class="p-6">
                            @php
                                $quizzes = [
                                    ['subject' => 'Mathematics', 'title' => 'Algebra Basics', 'score' => 18, 'total' => 20, 'date' => '2 days ago'],
                                    ['subject' => 'Physics', 'title' => 'Mechanics Quiz', 'score' => 15, 'total' => 20, 'date' => '5 days ago'],
                                    ['subject' => 'Chemistry', 'title' => 'Organic Chemistry', 'score' => 12, 'total' => 20, 'date' => '1 week ago'],
                                ];
                            @endphp
                            
                            <div class="space-y-4">
                                @foreach($quizzes as $quiz)
                                    @php
                                        $percentage = ($quiz['score'] / $quiz['total']) * 100;
                                        $color = $percentage >= 80 ? 'green' : ($percentage >= 60 ? 'yellow' : 'red');
                                    @endphp
                                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                                        <div class="w-14 h-14 bg-{{ $color }}-100 rounded-xl flex items-center justify-center">
                                            <span class="text-{{ $color }}-600 font-bold">{{ round($percentage) }}%</span>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-medium text-gray-900">{{ $quiz['title'] }}</p>
                                            <p class="text-sm text-gray-500">{{ $quiz['subject'] }} • {{ $quiz['date'] }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-medium text-gray-900">{{ $quiz['score'] }}/{{ $quiz['total'] }}</p>
                                            <a href="#" class="text-primary-600 text-sm">Review</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Right Column --}}
                <div class="space-y-8">
                    {{-- Profile Card --}}
                    <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                        <div class="relative inline-block">
                            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? 'Student') . '&background=2563eb&color=fff&size=128' }}" 
                                 alt="Profile" 
                                 class="w-24 h-24 rounded-full mx-auto">
                            <button class="absolute bottom-0 right-0 w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center text-white hover:bg-primary-700">
                                <i class="fas fa-camera text-sm"></i>
                            </button>
                        </div>
                        <h3 class="font-bold text-gray-900 mt-4">{{ auth()->user()->name ?? 'Student Name' }}</h3>
                        <p class="text-gray-500 text-sm">{{ auth()->user()->grade ?? 'Class 10' }}</p>
                        <div class="mt-4 flex items-center justify-center gap-2">
                            <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-sm font-medium">Premium Member</span>
                        </div>
                        <a href="{{ route('profile') }}" class="mt-4 w-full border border-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-50 transition-colors inline-block">
                            Edit Profile
                        </a>
                    </div>
                    
                    {{-- Achievements --}}
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b">
                            <h2 class="text-lg font-bold text-gray-900">Achievements</h2>
                        </div>
                        <div class="p-6">
                            @php
                                $achievements = [
                                    ['name' => 'Bookworm', 'description' => 'Read 10 books', 'icon' => 'fa-book', 'earned' => true],
                                    ['name' => 'Quiz Master', 'description' => 'Score 90%+ in 5 quizzes', 'icon' => 'fa-trophy', 'earned' => true],
                                    ['name' => 'Quick Learner', 'description' => 'Complete 5 quizzes in a week', 'icon' => 'fa-bolt', 'earned' => true],
                                    ['name' => 'Guidance Seeker', 'description' => 'Attend 3 guidance sessions', 'icon' => 'fa-chalkboard-teacher', 'earned' => false],
                                    ['name' => 'Perfect Score', 'description' => 'Get 100% in any quiz', 'icon' => 'fa-star', 'earned' => false],
                                ];
                            @endphp
                            
                            <div class="grid grid-cols-3 gap-3">
                                @foreach($achievements as $achievement)
                                    <div class="text-center {{ $achievement['earned'] ? '' : 'opacity-40' }}" title="{{ $achievement['name'] }}: {{ $achievement['description'] }}">
                                        <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center mx-auto">
                                            <i class="fas {{ $achievement['icon'] }} text-yellow-600 text-xl"></i>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-1">{{ $achievement['name'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    {{-- Upcoming Sessions --}}
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b flex items-center justify-between">
                            <h2 class="text-lg font-bold text-gray-900">Upcoming Sessions</h2>
                            <a href="{{ route('guidance.index') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">Book New</a>
                        </div>
                        <div class="p-6">
                            @php
                                $sessions = [
                                    ['subject' => 'Mathematics', 'topic' => 'Calculus Advanced', 'tutor' => 'Prof. Ahmad Khan', 'date' => 'Tomorrow, 3:00 PM', 'status' => 'confirmed'],
                                    ['subject' => 'Physics', 'topic' => 'Electromagnetism', 'tutor' => 'Dr. Sarah Ali', 'date' => 'Fri, 10:00 AM', 'status' => 'pending'],
                                ];
                            @endphp
                            
                            <div class="space-y-4">
                                @foreach($sessions as $session)
                                    <div class="p-4 border border-gray-200 rounded-xl">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-xs font-medium text-primary-600 bg-primary-50 px-2 py-1 rounded">{{ $session['subject'] }}</span>
                                            <span class="text-xs text-gray-500">{{ $session['date'] }}</span>
                                        </div>
                                        <p class="font-medium text-gray-900">{{ $session['topic'] }}</p>
                                        <p class="text-sm text-gray-500">with {{ $session['tutor'] }}</p>
                                        <div class="mt-3 flex gap-2">
                                            <a href="#" class="flex-1 bg-primary-600 text-white text-center py-2 rounded-lg text-sm hover:bg-primary-700">Join</a>
                                            <a href="#" class="flex-1 border border-gray-300 text-gray-700 text-center py-2 rounded-lg text-sm hover:bg-gray-50">Reschedule</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    {{-- Study Streak --}}
                    <div class="bg-gradient-to-br from-primary-600 to-secondary-600 rounded-xl shadow-sm p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-bold">Study Streak</h2>
                            <i class="fas fa-fire text-2xl text-yellow-300"></i>
                        </div>
                        <div class="text-center">
                            <p class="text-5xl font-bold">12</p>
                            <p class="text-white/80">Days in a row!</p>
                        </div>
                        <div class="mt-4 flex justify-center gap-1">
                            @for($i = 0; $i < 7; $i++)
                                <div class="w-8 h-8 rounded {{ $i < 5 ? 'bg-white' : 'bg-white/30' }} flex items-center justify-center">
                                    <i class="fas fa-check {{ $i < 5 ? 'text-primary-600' : 'text-white' }} text-xs"></i>
                                </div>
                            @endfor
                        </div>
                        <p class="text-center text-sm text-white/80 mt-3">Keep it up! 3 more days for a new badge!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
