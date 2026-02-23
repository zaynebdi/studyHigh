@extends('layouts.master')

@section('title', 'Quiz Results - studyHigh.pk')

@section('content')
    @php
        // Dummy result data
        $result = $result ?? [
            'quiz_title' => 'Mathematics Challenge 2024',
            'subject' => 'Mathematics',
            'score' => 24,
            'total_questions' => 30,
            'correct' => 24,
            'incorrect' => 4,
            'unanswered' => 2,
            'time_taken' => '38:45',
            'percentage' => 80,
            'grade' => 'B+',
            'rank' => 156,
            'total_participants' => 2340,
            'improvement' => '+5%',
        ];
        
        $percentage = $result['percentage'];
        $gradeColor = $percentage >= 90 ? 'green' : ($percentage >= 80 ? 'blue' : ($percentage >= 70 ? 'yellow' : ($percentage >= 60 ? 'orange' : 'red')));
    @endphp
    
    {{-- Results Header --}}
    <section class="bg-gradient-to-br from-primary-600 to-secondary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-block bg-white/20 px-4 py-2 rounded-full text-sm mb-4">
                <i class="fas fa-check-circle mr-2"></i>Quiz Completed
            </div>
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Quiz Results</h1>
            <p class="text-lg text-white/90">{{ $result['quiz_title'] }}</p>
        </div>
    </section>
    
    {{-- Results Content --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Score Card --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    {{-- Score Circle --}}
                    <div class="text-center">
                        <div class="relative inline-block">
                            <svg class="w-48 h-48 transform -rotate-90">
                                <circle cx="96" cy="96" r="88" stroke="#e5e7eb" stroke-width="16" fill="none"/>
                                <circle cx="96" cy="96" r="88" 
                                        stroke="{{ $percentage >= 90 ? '#10b981' : ($percentage >= 80 ? '#3b82f6' : ($percentage >= 70 ? '#fbbf24' : ($percentage >= 60 ? '#f97316' : '#ef4444'))) }}" 
                                        stroke-width="16" 
                                        fill="none"
                                        stroke-dasharray="{{ 2 * pi() * 88 }}"
                                        stroke-dashoffset="{{ 2 * pi() * 88 * (1 - $percentage / 100) }}"
                                        stroke-linecap="round"
                                        class="transition-all duration-1000"/>
                            </svg>
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-5xl font-bold text-gray-900">{{ $result['score'] }}</span>
                                <span class="text-gray-500">/{{ $result['total_questions'] }}</span>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-{{ $gradeColor }}-600 mt-4">Grade: {{ $result['grade'] }}</p>
                    </div>
                    
                    {{-- Stats --}}
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Performance Summary</h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-check text-green-600"></i>
                                    </div>
                                    <span class="font-medium text-gray-700">Correct Answers</span>
                                </div>
                                <span class="text-xl font-bold text-green-600">{{ $result['correct'] }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-red-50 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-times text-red-600"></i>
                                    </div>
                                    <span class="font-medium text-gray-700">Incorrect Answers</span>
                                </div>
                                <span class="text-xl font-bold text-red-600">{{ $result['incorrect'] }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-minus text-gray-600"></i>
                                    </div>
                                    <span class="font-medium text-gray-700">Unanswered</span>
                                </div>
                                <span class="text-xl font-bold text-gray-600">{{ $result['unanswered'] }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-clock text-blue-600"></i>
                                    </div>
                                    <span class="font-medium text-gray-700">Time Taken</span>
                                </div>
                                <span class="text-xl font-bold text-blue-600">{{ $result['time_taken'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Rank & Comparison --}}
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md p-6 text-center">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trophy text-purple-600 text-2xl"></i>
                    </div>
                    <p class="text-3xl font-bold text-gray-900">#{{ $result['rank'] }}</p>
                    <p class="text-gray-500">Your Rank</p>
                    <p class="text-sm text-gray-400 mt-1">out of {{ number_format($result['total_participants']) }} participants</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6 text-center">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                    </div>
                    <p class="text-3xl font-bold text-gray-900">{{ $result['improvement'] }}</p>
                    <p class="text-gray-500">Improvement</p>
                    <p class="text-sm text-gray-400 mt-1">from last attempt</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6 text-center">
                    <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-percentage text-yellow-600 text-2xl"></i>
                    </div>
                    <p class="text-3xl font-bold text-gray-900">{{ $result['percentage'] }}%</p>
                    <p class="text-gray-500">Accuracy</p>
                    <p class="text-sm text-gray-400 mt-1">overall performance</p>
                </div>
            </div>
            
            {{-- Question Review --}}
            <div class="bg-white rounded-xl shadow-md mb-8">
                <div class="p-6 border-b">
                    <h2 class="text-xl font-bold text-gray-900">Question Review</h2>
                </div>
                <div class="p-6">
                    @php
                        $reviewQuestions = [
                            ['id' => 1, 'question' => 'What is the value of x in the equation 2x + 5 = 15?', 'your_answer' => 'x = 5', 'correct_answer' => 'x = 5', 'is_correct' => true],
                            ['id' => 2, 'question' => 'Which of the following is a prime number?', 'your_answer' => '7', 'correct_answer' => '7', 'is_correct' => true],
                            ['id' => 3, 'question' => 'What is the area of a rectangle with length 8cm and width 5cm?', 'your_answer' => '26 cm²', 'correct_answer' => '40 cm²', 'is_correct' => false],
                            ['id' => 4, 'question' => 'Solve: 3² + 4² = ?', 'your_answer' => '25', 'correct_answer' => '25', 'is_correct' => true],
                            ['id' => 5, 'question' => 'What is the square root of 144?', 'your_answer' => '12', 'correct_answer' => '12', 'is_correct' => true],
                        ];
                    @endphp
                    
                    <div class="space-y-4">
                        @foreach($reviewQuestions as $index => $q)
                            <div class="border rounded-xl p-4 {{ $q['is_correct'] ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50' }}">
                                <div class="flex items-start gap-4">
                                    <span class="w-8 h-8 {{ $q['is_correct'] ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} rounded-lg flex items-center justify-center font-bold flex-shrink-0">{{ $index + 1 }}</span>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900 mb-2">{{ $q['question'] }}</p>
                                        <div class="grid sm:grid-cols-2 gap-2 text-sm">
                                            <div>
                                                <span class="text-gray-500">Your Answer:</span>
                                                <span class="{{ $q['is_correct'] ? 'text-green-600' : 'text-red-600' }} font-medium ml-2">{{ $q['your_answer'] }}</span>
                                            </div>
                                            @if(!$q['is_correct'])
                                                <div>
                                                    <span class="text-gray-500">Correct Answer:</span>
                                                    <span class="text-green-600 font-medium ml-2">{{ $q['correct_answer'] }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        @if($q['is_correct'])
                                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                                        @else
                                            <i class="fas fa-times-circle text-red-500 text-xl"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <button class="w-full mt-4 py-3 border border-gray-300 rounded-xl text-gray-600 hover:bg-gray-50 transition-colors">
                        View All Questions
                    </button>
                </div>
            </div>
            
            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quiz.take', 1) }}" class="bg-primary-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-primary-700 transition-colors flex items-center justify-center gap-2">
                    <i class="fas fa-redo"></i>
                    <span>Retake Quiz</span>
                </a>
                <a href="{{ route('quiz.index') }}" class="bg-white border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-xl font-semibold hover:border-primary-500 hover:text-primary-600 transition-colors flex items-center justify-center gap-2">
                    <i class="fas fa-list"></i>
                    <span>More Quizzes</span>
                </a>
                <a href="{{ route('dashboard') }}" class="bg-white border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-xl font-semibold hover:border-primary-500 hover:text-primary-600 transition-colors flex items-center justify-center gap-2">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Go to Dashboard</span>
                </a>
            </div>
            
            {{-- Share Results --}}
            <div class="mt-8 text-center">
                <p class="text-gray-600 mb-4">Share your achievement!</p>
                <div class="flex justify-center gap-3">
                    <button class="w-12 h-12 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors flex items-center justify-center">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button class="w-12 h-12 bg-sky-500 text-white rounded-full hover:bg-sky-600 transition-colors flex items-center justify-center">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button class="w-12 h-12 bg-green-500 text-white rounded-full hover:bg-green-600 transition-colors flex items-center justify-center">
                        <i class="fab fa-whatsapp"></i>
                    </button>
                    <button class="w-12 h-12 bg-gray-600 text-white rounded-full hover:bg-gray-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-link"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
