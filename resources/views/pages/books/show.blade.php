@extends('layouts.master')

@section('title', ($book['title'] ?? 'Book Details') . ' - studyHigh.pk')

@section('content')
    @php
        // Dummy book data for preview
        $book = $book ?? [
            'id' => 1,
            'title' => 'Mathematics for Class 10',
            'subject' => 'Mathematics',
            'grade' => 'Class 10',
            'author' => 'Prof. Ahmad Khan',
            'publisher' => 'StudyHigh Publications',
            'image' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=800',
            'rating' => 4.8,
            'downloads' => 2340,
            'pages' => 450,
            'language' => 'English',
            'type' => 'Textbook',
            'description' => 'This comprehensive mathematics textbook covers all topics required for Class 10 board exams. It includes detailed explanations, solved examples, practice exercises, and previous year question papers. The book is designed to help students build a strong foundation in mathematics and excel in their examinations.',
            'chapters' => [
                'Chapter 1: Real Numbers',
                'Chapter 2: Polynomials',
                'Chapter 3: Pair of Linear Equations',
                'Chapter 4: Quadratic Equations',
                'Chapter 5: Arithmetic Progressions',
                'Chapter 6: Triangles',
                'Chapter 7: Coordinate Geometry',
                'Chapter 8: Trigonometry',
                'Chapter 9: Applications of Trigonometry',
                'Chapter 10: Circles',
                'Chapter 11: Constructions',
                'Chapter 12: Areas Related to Circles',
                'Chapter 13: Surface Areas and Volumes',
                'Chapter 14: Statistics',
                'Chapter 15: Probability',
            ],
            'reviews_count' => 128,
            'file_size' => '15.5 MB',
            'file_format' => 'PDF',
        ];
    @endphp
    
    {{-- Breadcrumb --}}
    <div class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-primary-600">Home</a>
                <i class="fas fa-chevron-right mx-2 text-xs"></i>
                <a href="{{ route('books.index') }}" class="hover:text-primary-600">Books</a>
                <i class="fas fa-chevron-right mx-2 text-xs"></i>
                <span class="text-gray-900">{{ $book['title'] }}</span>
            </nav>
        </div>
    </div>
    
    {{-- Book Details Section --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                {{-- Left Column - Image & Actions --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        {{-- Book Cover --}}
                        <div class="bg-gray-100 rounded-2xl overflow-hidden shadow-lg mb-6">
                            <img src="{{ $book['image'] }}" alt="{{ $book['title'] }}" class="w-full aspect-[3/4] object-cover">
                        </div>
                        
                        {{-- Action Buttons --}}
                        <div class="space-y-3">
                            <a href="#" class="w-full gradient-bg text-white py-3 rounded-xl font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                                <i class="fas fa-book-open"></i>
                                <span>Read Online</span>
                            </a>
                            <a href="#" class="w-full bg-white border-2 border-primary-600 text-primary-600 py-3 rounded-xl font-semibold hover:bg-primary-50 transition-colors flex items-center justify-center gap-2">
                                <i class="fas fa-download"></i>
                                <span>Download PDF</span>
                            </a>
                            <button onclick="addToFavorites({{ $book['id'] }})" class="w-full bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-colors flex items-center justify-center gap-2">
                                <i class="far fa-heart"></i>
                                <span>Add to Favorites</span>
                            </button>
                        </div>
                        
                        {{-- Book Info --}}
                        <div class="mt-6 bg-gray-50 rounded-xl p-4">
                            <h4 class="font-semibold text-gray-900 mb-3">Book Information</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">File Size:</span>
                                    <span class="text-gray-900">{{ $book['file_size'] }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Format:</span>
                                    <span class="text-gray-900">{{ $book['file_format'] }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Pages:</span>
                                    <span class="text-gray-900">{{ $book['pages'] }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Language:</span>
                                    <span class="text-gray-900">{{ $book['language'] }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Publisher:</span>
                                    <span class="text-gray-900">{{ $book['publisher'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Right Column - Details --}}
                <div class="lg:col-span-2">
                    {{-- Header --}}
                    <div class="mb-6">
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-sm font-medium">{{ $book['type'] }}</span>
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">{{ $book['subject'] }}</span>
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">{{ $book['grade'] }}</span>
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">{{ $book['title'] }}</h1>
                        <p class="text-lg text-gray-600">by <span class="font-medium text-gray-900">{{ $book['author'] }}</span></p>
                    </div>
                    
                    {{-- Rating & Stats --}}
                    <div class="flex flex-wrap items-center gap-6 mb-8 pb-8 border-b">
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= floor($book['rating']) ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                            <span class="font-semibold text-gray-900">{{ $book['rating'] }}</span>
                            <span class="text-gray-500">({{ $book['reviews_count'] }} reviews)</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-600">
                            <i class="fas fa-download"></i>
                            <span>{{ number_format($book['downloads']) }} downloads</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-600">
                            <i class="fas fa-eye"></i>
                            <span>{{ number_format($book['downloads'] * 2.5) }} views</span>
                        </div>
                    </div>
                    
                    {{-- Description --}}
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Description</h2>
                        <p class="text-gray-600 leading-relaxed">{{ $book['description'] }}</p>
                    </div>
                    
                    {{-- Chapters --}}
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Table of Contents</h2>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <ul class="space-y-3">
                                @foreach($book['chapters'] as $index => $chapter)
                                    <li class="flex items-center gap-3">
                                        <span class="w-8 h-8 bg-primary-100 text-primary-600 rounded-lg flex items-center justify-center text-sm font-medium">{{ $index + 1 }}</span>
                                        <span class="text-gray-700">{{ $chapter }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    {{-- Reviews Section --}}
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-900">Student Reviews</h2>
                            <button onclick="openReviewModal()" class="text-primary-600 hover:text-primary-700 font-medium">
                                Write a Review
                            </button>
                        </div>
                        
                        @php
                            $dummyReviews = [
                                ['name' => 'Ali Ahmed', 'rating' => 5, 'date' => '2 weeks ago', 'text' => 'Excellent book! Very helpful for my board exam preparation. The solved examples are very clear.'],
                                ['name' => 'Sana Khan', 'rating' => 4, 'date' => '1 month ago', 'text' => 'Great content and well-organized. Would recommend to all Class 10 students.'],
                                ['name' => 'Hassan Raza', 'rating' => 5, 'date' => '2 months ago', 'text' => 'Best mathematics book I have ever used. Helped me score 95% in my exams!'],
                            ];
                        @endphp
                        
                        <div class="space-y-4">
                            @foreach($dummyReviews as $review)
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <div class="flex items-start justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($review['name']) }}&background=random" alt="{{ $review['name'] }}" class="w-10 h-10 rounded-full">
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $review['name'] }}</div>
                                                <div class="text-sm text-gray-500">{{ $review['date'] }}</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $review['rating'] ? 'text-yellow-400' : 'text-gray-300' }} text-sm"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-gray-600">{{ $review['text'] }}</p>
                                </div>
                            @endforeach
                        </div>
                        
                        <button class="w-full mt-4 py-3 border border-gray-300 rounded-xl text-gray-600 hover:bg-gray-50 transition-colors">
                            View All Reviews
                        </button>
                    </div>
                    
                    {{-- Related Books --}}
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Related Books</h2>
                        <div class="grid sm:grid-cols-2 gap-4">
                            @php
                                $relatedBooks = [
                                    ['title' => 'Advanced Mathematics', 'subject' => 'Mathematics', 'image' => 'https://images.unsplash.com/photo-1509228468518-180dd4864904?w=400', 'rating' => 4.7],
                                    ['title' => 'Geometry Basics', 'subject' => 'Mathematics', 'image' => 'https://images.unsplash.com/photo-1596495578065-6e0763fa1178?w=400', 'rating' => 4.5],
                                ];
                            @endphp
                            
                            @foreach($relatedBooks as $related)
                                <a href="#" class="flex gap-4 bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors">
                                    <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}" class="w-20 h-24 object-cover rounded-lg">
                                    <div>
                                        <span class="text-xs text-primary-600 font-medium">{{ $related['subject'] }}</span>
                                        <h4 class="font-semibold text-gray-900 mt-1">{{ $related['title'] }}</h4>
                                        <div class="flex items-center gap-1 mt-2">
                                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                                            <span class="text-sm text-gray-600">{{ $related['rating'] }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function addToFavorites(bookId) {
        // AJAX call to add to favorites
        showToast('Added to favorites!', 'success');
    }
    
    function openReviewModal() {
        // Open review modal
        showToast('Review feature coming soon!', 'info');
    }
</script>
@endpush
