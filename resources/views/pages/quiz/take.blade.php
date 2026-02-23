@extends('layouts.master')

@section('title', 'Taking Quiz - studyHigh.pk')

@section('content')
    @php
        // Dummy quiz data
        $quiz = $quiz ?? [
            'id' => 1,
            'title' => 'Mathematics Challenge 2024',
            'subject' => 'Mathematics',
            'duration' => 45, // minutes
            'total_questions' => 30,
        ];
        
        // Dummy questions
        $questions = [
            ['id' => 1, 'question' => 'What is the value of x in the equation 2x + 5 = 15?', 'options' => ['x = 5', 'x = 10', 'x = 15', 'x = 20']],
            ['id' => 2, 'question' => 'Which of the following is a prime number?', 'options' => ['4', '6', '7', '9']],
            ['id' => 3, 'question' => 'What is the area of a rectangle with length 8cm and width 5cm?', 'options' => ['13 cm²', '26 cm²', '40 cm²', '45 cm²']],
            ['id' => 4, 'question' => 'Solve: 3² + 4² = ?', 'options' => ['7', '25', '49', '12']],
            ['id' => 5, 'question' => 'What is the square root of 144?', 'options' => ['10', '11', '12', '14']],
        ];
    @endphp
    
    {{-- Quiz Header --}}
    <div class="bg-white shadow-sm sticky top-16 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-xl font-bold text-gray-900">{{ $quiz['title'] }}</h1>
                    <p class="text-sm text-gray-500">{{ $quiz['subject'] }} • {{ $quiz['total_questions'] }} Questions</p>
                </div>
                
                {{-- Timer --}}
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-lg">
                        <i class="fas fa-clock text-gray-500"></i>
                        <span id="timer" class="font-mono font-bold text-lg text-gray-900">45:00</span>
                    </div>
                    <button onclick="submitQuiz()" class="bg-green-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-green-700 transition-colors flex items-center gap-2">
                        <span>Submit</span>
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>
            
            {{-- Progress Bar --}}
            <div class="mt-4">
                <div class="flex items-center justify-between text-sm text-gray-500 mb-1">
                    <span>Progress</span>
                    <span id="progress-text">0/{{ $quiz['total_questions'] }} answered</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div id="progress-bar" class="bg-primary-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Quiz Content --}}
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form id="quiz-form" action="{{ route('quiz.submit', $quiz['id']) }}" method="POST">
                @csrf
                
                <div class="space-y-6">
                    @foreach($questions as $index => $question)
                        <div class="bg-white rounded-xl shadow-sm p-6" id="question-{{ $question['id'] }}">
                            {{-- Question Header --}}
                            <div class="flex items-start gap-4 mb-4">
                                <span class="w-8 h-8 bg-primary-100 text-primary-600 rounded-lg flex items-center justify-center font-bold flex-shrink-0">{{ $index + 1 }}</span>
                                <h3 class="text-lg font-medium text-gray-900">{{ $question['question'] }}</h3>
                            </div>
                            
                            {{-- Options --}}
                            <div class="space-y-3 ml-12">
                                @foreach($question['options'] as $optionIndex => $option)
                                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors option-label" data-question="{{ $question['id'] }}">
                                        <input type="radio" 
                                               name="answers[{{ $question['id'] }}]" 
                                               value="{{ $optionIndex }}"
                                               class="w-4 h-4 text-primary-600 focus:ring-primary-500 border-gray-300"
                                               onchange="markAnswered({{ $question['id'] }})">
                                        <span class="text-gray-700">{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    
                    {{-- More dummy questions for visual --}}
                    @for($i = 6; $i <= 10; $i++)
                        <div class="bg-white rounded-xl shadow-sm p-6 opacity-50" id="question-{{ $i }}">
                            <div class="flex items-start gap-4 mb-4">
                                <span class="w-8 h-8 bg-gray-100 text-gray-600 rounded-lg flex items-center justify-center font-bold flex-shrink-0">{{ $i }}</span>
                                <h3 class="text-lg font-medium text-gray-900">Question {{ $i }} placeholder...</h3>
                            </div>
                            <div class="space-y-3 ml-12">
                                @for($j = 0; $j < 4; $j++)
                                    <div class="p-4 border border-gray-200 rounded-lg">
                                        <span class="text-gray-400">Option {{ chr(65 + $j) }}</span>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div>
                
                {{-- Submit Button --}}
                <div class="mt-8 text-center">
                    <button type="submit" class="bg-green-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-green-700 transition-colors flex items-center gap-2 mx-auto">
                        <span>Submit Quiz</span>
                        <i class="fas fa-check-circle"></i>
                    </button>
                    <p class="text-gray-500 mt-3 text-sm">Make sure to review all answers before submitting</p>
                </div>
            </form>
        </div>
    </div>
    
    {{-- Question Navigator (Floating) --}}
    <div class="fixed bottom-6 right-6 z-40">
        <button onclick="toggleNavigator()" class="w-14 h-14 bg-primary-600 text-white rounded-full shadow-lg hover:bg-primary-700 transition-colors flex items-center justify-center">
            <i class="fas fa-list-ol text-xl"></i>
        </button>
        
        <div id="question-navigator" class="hidden absolute bottom-16 right-0 bg-white rounded-xl shadow-xl p-4 w-64">
            <h4 class="font-semibold text-gray-900 mb-3">Question Navigator</h4>
            <div class="grid grid-cols-5 gap-2">
                @for($i = 1; $i <= $quiz['total_questions']; $i++)
                    <button onclick="scrollToQuestion({{ $i }})" 
                            id="nav-btn-{{ $i }}"
                            class="w-10 h-10 rounded-lg border-2 border-gray-200 text-sm font-medium hover:border-primary-500 transition-colors">
                        {{ $i }}
                    </button>
                @endfor
            </div>
            <div class="mt-3 flex items-center gap-4 text-xs">
                <span class="flex items-center gap-1"><span class="w-3 h-3 bg-primary-600 rounded"></span> Answered</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 border-2 border-gray-200 rounded"></span> Unanswered</span>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Timer functionality
    let timeRemaining = {{ $quiz['duration'] }} * 60; // Convert to seconds
    const timerElement = document.getElementById('timer');
    
    function updateTimer() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        
        if (timeRemaining <= 300) { // 5 minutes remaining
            timerElement.classList.add('text-red-600');
        }
        
        if (timeRemaining <= 0) {
            submitQuiz();
        } else {
            timeRemaining--;
        }
    }
    
    setInterval(updateTimer, 1000);
    
    // Track answered questions
    const answeredQuestions = new Set();
    const totalQuestions = {{ $quiz['total_questions'] }};
    
    function markAnswered(questionId) {
        answeredQuestions.add(questionId);
        updateProgress();
        
        // Update navigator button
        const navBtn = document.getElementById(`nav-btn-${questionId}`);
        if (navBtn) {
            navBtn.classList.add('bg-primary-600', 'text-white', 'border-primary-600');
        }
        
        // Highlight selected option
        const questionDiv = document.getElementById(`question-${questionId}`);
        questionDiv.querySelectorAll('.option-label').forEach(label => {
            label.classList.remove('bg-primary-50', 'border-primary-500');
        });
        event.target.closest('.option-label').classList.add('bg-primary-50', 'border-primary-500');
    }
    
    function updateProgress() {
        const answered = answeredQuestions.size;
        const percentage = (answered / totalQuestions) * 100;
        
        document.getElementById('progress-text').textContent = `${answered}/${totalQuestions} answered`;
        document.getElementById('progress-bar').style.width = `${percentage}%`;
    }
    
    // Navigator toggle
    function toggleNavigator() {
        const navigator = document.getElementById('question-navigator');
        navigator.classList.toggle('hidden');
    }
    
    function scrollToQuestion(questionId) {
        const element = document.getElementById(`question-${questionId}`);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        toggleNavigator();
    }
    
    // Submit quiz
    function submitQuiz() {
        if (confirm('Are you sure you want to submit the quiz?')) {
            document.getElementById('quiz-form').submit();
        }
    }
    
    // Auto-save (simulate)
    setInterval(() => {
        console.log('Auto-saving answers...');
        // In real implementation, send AJAX request to save progress
    }, 30000); // Every 30 seconds
    
    // Warn before leaving page
    window.addEventListener('beforeunload', (e) => {
        if (answeredQuestions.size < totalQuestions) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
</script>
@endpush
