@extends('layouts.master')

@section('title', 'Student Reviews - studyHigh.pk')

@section('content')
    {{-- Header Section --}}
    <section class="bg-gradient-to-br from-primary-600 to-secondary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Student Reviews</h1>
            <p class="text-lg text-white/90 max-w-2xl mx-auto">See what our students say about their learning experience</p>
            
            {{-- Overall Rating --}}
            <div class="mt-8 inline-flex items-center gap-6 bg-white/10 backdrop-blur-sm rounded-2xl px-8 py-4">
                <div class="text-center">
                    <p class="text-5xl font-bold">4.8</p>
                    <div class="flex items-center gap-1 mt-1">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fas fa-star text-yellow-300"></i>
                        @endfor
                    </div>
                    <p class="text-sm text-white/80 mt-1">Based on 2,847 reviews</p>
                </div>
                <div class="border-l border-white/20 pl-6">
                    @php
                        $ratings = [5 => '85%', 4 => '10%', 3 => '3%', 2 => '1%', 1 => '1%'];
                    @endphp
                    @foreach($ratings as $star => $percent)
                        <div class="flex items-center gap-2 text-sm">
                            <span>{{ $star }} <i class="fas fa-star text-yellow-300 text-xs"></i></span>
                            <div class="w-24 bg-white/20 rounded-full h-2">
                                <div class="bg-yellow-300 h-2 rounded-full" style="width: {{ $percent }}"></div>
                            </div>
                            <span>{{ $percent }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    {{-- Reviews Grid --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Filter & Sort --}}
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
                <div class="flex gap-3">
                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary-500">
                        <option>All Reviews</option>
                        <option>Books</option>
                        <option>Quizzes</option>
                        <option>Guidance Sessions</option>
                    </select>
                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary-500">
                        <option>All Ratings</option>
                        <option>5 Stars</option>
                        <option>4 Stars</option>
                        <option>3 Stars</option>
                        <option>2 Stars</option>
                        <option>1 Star</option>
                    </select>
                </div>
                <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary-500">
                    <option>Most Recent</option>
                    <option>Highest Rated</option>
                    <option>Lowest Rated</option>
                </select>
            </div>
            
            {{-- Reviews --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $reviews = [
                        [
                            'name' => 'Ahmed Hassan',
                            'avatar' => 'https://ui-avatars.com/api/?name=Ahmed+Hassan&background=random',
                            'rating' => 5,
                            'date' => '2 days ago',
                            'category' => 'Books',
                            'title' => 'Amazing study materials!',
                            'content' => 'The mathematics textbook helped me score 95% in my board exams. The explanations are clear and the practice problems are very helpful.',
                            'helpful' => 24,
                        ],
                        [
                            'name' => 'Fatima Ali',
                            'avatar' => 'https://ui-avatars.com/api/?name=Fatima+Ali&background=random',
                            'rating' => 5,
                            'date' => '1 week ago',
                            'category' => 'Guidance Sessions',
                            'title' => 'Best tutoring experience',
                            'content' => 'Prof. Khan is an amazing tutor. He made calculus so much easier to understand. Highly recommend his guidance sessions!',
                            'helpful' => 18,
                        ],
                        [
                            'name' => 'Usman Khan',
                            'avatar' => 'https://ui-avatars.com/api/?name=Usman+Khan&background=random',
                            'rating' => 4,
                            'date' => '1 week ago',
                            'category' => 'Quizzes',
                            'title' => 'Great practice quizzes',
                            'content' => 'The quizzes are well-designed and help identify weak areas. Would love to see more subjects added.',
                            'helpful' => 12,
                        ],
                        [
                            'name' => 'Sana Malik',
                            'avatar' => 'https://ui-avatars.com/api/?name=Sana+Malik&background=random',
                            'rating' => 5,
                            'date' => '2 weeks ago',
                            'category' => 'Books',
                            'title' => 'Complete study solution',
                            'content' => 'studyHigh.pk has everything I need for my studies. The book library is extensive and the quality is excellent.',
                            'helpful' => 31,
                        ],
                        [
                            'name' => 'Hassan Raza',
                            'avatar' => 'https://ui-avatars.com/api/?name=Hassan+Raza&background=random',
                            'rating' => 5,
                            'date' => '3 weeks ago',
                            'category' => 'Quizzes',
                            'title' => 'Helped me improve my grades',
                            'content' => 'Taking regular quizzes on this platform helped me identify my weak areas and improve significantly.',
                            'helpful' => 15,
                        ],
                        [
                            'name' => 'Ayesha Tariq',
                            'avatar' => 'https://ui-avatars.com/api/?name=Ayesha+Tariq&background=random',
                            'rating' => 4,
                            'date' => '1 month ago',
                            'category' => 'Guidance Sessions',
                            'title' => 'Very helpful tutors',
                            'content' => 'The guidance sessions are worth every penny. The tutors are knowledgeable and patient.',
                            'helpful' => 8,
                        ],
                        [
                            'name' => 'Bilal Ahmed',
                            'avatar' => 'https://ui-avatars.com/api/?name=Bilal+Ahmed&background=random',
                            'rating' => 5,
                            'date' => '1 month ago',
                            'category' => 'Books',
                            'title' => 'Best educational platform',
                            'content' => 'I have tried many platforms but studyHigh.pk is by far the best. The quality of content is unmatched.',
                            'helpful' => 42,
                        ],
                        [
                            'name' => 'Zara Khan',
                            'avatar' => 'https://ui-avatars.com/api/?name=Zara+Khan&background=random',
                            'rating' => 5,
                            'date' => '1 month ago',
                            'category' => 'Quizzes',
                            'title' => 'Love the quiz feature',
                            'content' => 'The timed quizzes with instant feedback are amazing. They really help with exam preparation.',
                            'helpful' => 19,
                        ],
                        [
                            'name' => 'Omar Farooq',
                            'avatar' => 'https://ui-avatars.com/api/?name=Omar+Farooq&background=random',
                            'rating' => 4,
                            'date' => '2 months ago',
                            'category' => 'Guidance Sessions',
                            'title' => 'Great for exam prep',
                            'content' => 'Booked a few sessions before my exams and they made a huge difference. The tutors know exactly what to focus on.',
                            'helpful' => 11,
                        ],
                    ];
                @endphp
                
                @foreach($reviews as $review)
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $review['name'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $review['date'] }}</p>
                                </div>
                            </div>
                            <span class="bg-primary-100 text-primary-700 text-xs px-2 py-1 rounded">{{ $review['category'] }}</span>
                        </div>
                        
                        <div class="flex items-center gap-1 mb-3">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star {{ $i < $review['rating'] ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>
                        
                        <h4 class="font-bold text-gray-900 mb-2">{{ $review['title'] }}</h4>
                        <p class="text-gray-600 text-sm mb-4">{{ $review['content'] }}</p>
                        
                        <div class="flex items-center justify-between pt-4 border-t">
                            <button onclick="markHelpful(this)" class="text-sm text-gray-500 hover:text-primary-600 flex items-center gap-1">
                                <i class="far fa-thumbs-up"></i>
                                <span>Helpful ({{ $review['helpful'] }})</span>
                            </button>
                            <button class="text-sm text-gray-500 hover:text-primary-600">Report</button>
                        </div>
                    </div>
                @endforeach
            </div>
            
            {{-- Load More --}}
            <div class="text-center mt-8">
                <button class="bg-white border border-gray-300 text-gray-700 px-8 py-3 rounded-xl font-medium hover:bg-gray-50 transition-colors">
                    Load More Reviews
                </button>
            </div>
        </div>
    </section>
    
    {{-- Write Review CTA --}}
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Share Your Experience</h2>
            <p class="text-gray-600 mb-6">Your feedback helps us improve and helps other students make informed decisions.</p>
            <button onclick="openReviewModal()" class="bg-primary-600 text-white px-8 py-3 rounded-xl font-medium hover:bg-primary-700 transition-colors inline-flex items-center gap-2">
                <i class="fas fa-pen"></i>
                <span>Write a Review</span>
            </button>
        </div>
    </section>
    
    {{-- Review Modal (Hidden by default) --}}
    <div id="review-modal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-900">Write a Review</h3>
                <button onclick="closeReviewModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="p-6">
                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    {{-- Rating --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Your Rating</label>
                        <div class="flex items-center gap-2">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" onclick="setRating({{ $i }})" class="star-btn text-3xl text-gray-300 hover:text-yellow-400 transition-colors" data-rating="{{ $i }}">
                                    <i class="fas fa-star"></i>
                                </button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating-input" required>
                    </div>
                    
                    {{-- Category --}}
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select name="category" id="category" class="input-field" required>
                            <option value="">Select a category</option>
                            <option value="books">Books</option>
                            <option value="quizzes">Quizzes</option>
                            <option value="guidance">Guidance Sessions</option>
                            <option value="general">General</option>
                        </select>
                    </div>
                    
                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Review Title</label>
                        <input type="text" name="title" id="title" class="input-field" placeholder="Summarize your experience" required>
                    </div>
                    
                    {{-- Content --}}
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
                        <textarea name="content" id="content" rows="4" class="input-field resize-none" placeholder="Tell us about your experience..." required></textarea>
                    </div>
                    
                    {{-- Submit --}}
                    <button type="submit" class="w-full bg-primary-600 text-white py-3 rounded-xl font-medium hover:bg-primary-700 transition-colors">
                        Submit Review
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function markHelpful(button) {
        const span = button.querySelector('span');
        const currentCount = parseInt(span.textContent.match(/\d+/)[0]);
        
        if (button.classList.contains('text-primary-600')) {
            button.classList.remove('text-primary-600');
            span.textContent = `Helpful (${currentCount - 1})`;
        } else {
            button.classList.add('text-primary-600');
            span.textContent = `Helpful (${currentCount + 1})`;
        }
    }
    
    function openReviewModal() {
        document.getElementById('review-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeReviewModal() {
        document.getElementById('review-modal').classList.add('hidden');
        document.body.style.overflow = '';
    }
    
    function setRating(rating) {
        document.getElementById('rating-input').value = rating;
        document.querySelectorAll('.star-btn').forEach((btn, index) => {
            if (index < rating) {
                btn.classList.add('text-yellow-400');
                btn.classList.remove('text-gray-300');
            } else {
                btn.classList.remove('text-yellow-400');
                btn.classList.add('text-gray-300');
            }
        });
    }
    
    // Close modal on outside click
    document.getElementById('review-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeReviewModal();
        }
    });
</script>
@endpush
