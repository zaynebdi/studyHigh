@extends('layouts.master')

@section('title', 'Books - studyHigh.pk')

@section('content')
    {{-- Header Section --}}
    <section class="bg-gradient-to-br from-primary-600 to-secondary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Explore Our Book Library</h1>
                <p class="text-lg text-white/90 max-w-2xl mx-auto">Find textbooks, reference materials, and study guides for all subjects and grade levels</p>
            </div>
            
            {{-- Search Bar --}}
            <div class="mt-8 max-w-2xl mx-auto">
                <form action="{{ route('books.index') }}" method="GET" class="relative">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Search books by title, subject, or author..."
                           class="w-full px-6 py-4 pr-32 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-white/30">
                    <button type="submit" class="absolute right-2 top-2 bottom-2 bg-primary-600 text-white px-6 rounded-lg hover:bg-primary-700 transition-colors flex items-center gap-2">
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
            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Sidebar Filters --}}
                <aside class="lg:w-64 flex-shrink-0">
                    <div class="bg-white rounded-xl shadow-md p-6 sticky top-24">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-gray-900">Filters</h3>
                            <a href="{{ route('books.index') }}" class="text-sm text-primary-600 hover:text-primary-700">Clear All</a>
                        </div>
                        
                        {{-- Subject Filter --}}
                        <div class="mb-6">
                            <h4 class="font-medium text-gray-700 mb-3">Subject</h4>
                            <div class="space-y-2">
                                @php
                                    $subjects = ['Mathematics', 'Physics', 'Chemistry', 'Biology', 'English', 'Urdu', 'Computer Science', 'Pakistan Studies'];
                                @endphp
                                @foreach($subjects as $subject)
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" 
                                               name="subjects[]" 
                                               value="{{ Str::slug($subject) }}"
                                               {{ in_array(Str::slug($subject), request('subjects', [])) ? 'checked' : '' }}
                                               class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                               onchange="this.form.submit()">
                                        <span class="ml-2 text-gray-600">{{ $subject }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                        {{-- Grade Filter --}}
                        <div class="mb-6">
                            <h4 class="font-medium text-gray-700 mb-3">Grade Level</h4>
                            <div class="space-y-2">
                                @php
                                    $grades = ['Class 9', 'Class 10', 'Class 11', 'Class 12', 'University'];
                                @endphp
                                @foreach($grades as $grade)
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" 
                                               name="grades[]" 
                                               value="{{ Str::slug($grade) }}"
                                               {{ in_array(Str::slug($grade), request('grades', [])) ? 'checked' : '' }}
                                               class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                               onchange="this.form.submit()">
                                        <span class="ml-2 text-gray-600">{{ $grade }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                        {{-- Type Filter --}}
                        <div>
                            <h4 class="font-medium text-gray-700 mb-3">Book Type</h4>
                            <div class="space-y-2">
                                @php
                                    $types = ['Textbook', 'Reference', 'Notes', 'Past Papers', 'Guide'];
                                @endphp
                                @foreach($types as $type)
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" 
                                               name="types[]" 
                                               value="{{ Str::slug($type) }}"
                                               {{ in_array(Str::slug($type), request('types', [])) ? 'checked' : '' }}
                                               class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                               onchange="this.form.submit()">
                                        <span class="ml-2 text-gray-600">{{ $type }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>
                
                {{-- Books Grid --}}
                <div class="flex-1">
                    {{-- Results Header --}}
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <p class="text-gray-600">
                            Showing <span class="font-semibold text-gray-900">{{ count($books ?? []) }}</span> results
                        </p>
                        
                        {{-- Sort Dropdown --}}
                        <div class="flex items-center gap-2">
                            <label for="sort" class="text-gray-600">Sort by:</label>
                            <select name="sort" id="sort" 
                                    class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    onchange="window.location.href = this.value">
                                <option value="{{ route('books.index', array_merge(request()->all(), ['sort' => 'popular'])) }}" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                                <option value="{{ route('books.index', array_merge(request()->all(), ['sort' => 'newest'])) }}" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="{{ route('books.index', array_merge(request()->all(), ['sort' => 'rating'])) }}" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                                <option value="{{ route('books.index', array_merge(request()->all(), ['sort' => 'downloads'])) }}" {{ request('sort') == 'downloads' ? 'selected' : '' }}>Most Downloaded</option>
                            </select>
                        </div>
                    </div>
                    
                    {{-- Books Grid --}}
                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                        @forelse($books ?? [] as $book)
                            @include('components.cards.book-card', ['book' => $book])
                        @empty
                            {{-- Dummy Books for Preview --}}
                            @php
                                $dummyBooks = [
                                    ['id' => 1, 'title' => 'Mathematics for Class 10', 'subject' => 'Mathematics', 'grade' => 'Class 10', 'author' => 'Prof. Ahmad Khan', 'image' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=400', 'rating' => 4.8, 'downloads' => 2340, 'type' => 'Textbook', 'description' => 'Comprehensive mathematics textbook covering all topics for Class 10 board exams.'],
                                    ['id' => 2, 'title' => 'Physics Fundamentals', 'subject' => 'Physics', 'grade' => 'Class 11', 'author' => 'Dr. Sarah Ali', 'image' => 'https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?w=400', 'rating' => 4.9, 'downloads' => 1890, 'type' => 'Reference', 'description' => 'Complete physics reference book with solved examples and practice problems.'],
                                    ['id' => 3, 'title' => 'Chemistry Made Easy', 'subject' => 'Chemistry', 'grade' => 'Class 12', 'author' => 'Prof. Usman Tariq', 'image' => 'https://images.unsplash.com/photo-1603126857599-f6e157fa2fe6?w=400', 'rating' => 4.7, 'downloads' => 1560, 'type' => 'Guide', 'description' => 'Simplified chemistry guide with visual diagrams and easy explanations.'],
                                    ['id' => 4, 'title' => 'English Grammar Guide', 'subject' => 'English', 'grade' => 'All Classes', 'author' => 'Ms. Fatima Hassan', 'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=400', 'rating' => 4.6, 'downloads' => 3210, 'type' => 'Reference', 'description' => 'Complete English grammar reference for students of all levels.'],
                                    ['id' => 5, 'title' => 'Biology Complete Notes', 'subject' => 'Biology', 'grade' => 'Class 10', 'author' => 'Dr. Ayesha Malik', 'image' => 'https://images.unsplash.com/photo-1530210124550-912dc1381cb8?w=400', 'rating' => 4.8, 'downloads' => 2780, 'type' => 'Notes', 'description' => 'Comprehensive biology notes with diagrams and key points.'],
                                    ['id' => 6, 'title' => 'Computer Science Basics', 'subject' => 'Computer Science', 'grade' => 'Class 9', 'author' => 'Engr. Bilal Ahmed', 'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400', 'rating' => 4.5, 'downloads' => 1450, 'type' => 'Textbook', 'description' => 'Introduction to computer science with practical exercises.'],
                                    ['id' => 7, 'title' => 'Pakistan Studies Guide', 'subject' => 'Pakistan Studies', 'grade' => 'Class 9', 'author' => 'Prof. Rizwan Khan', 'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=400', 'rating' => 4.4, 'downloads' => 1980, 'type' => 'Guide', 'description' => 'Complete guide for Pakistan Studies with historical context.'],
                                    ['id' => 8, 'title' => 'Urdu Literature', 'subject' => 'Urdu', 'grade' => 'Class 12', 'author' => 'Dr. Saima Akhtar', 'image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=400', 'rating' => 4.7, 'downloads' => 1230, 'type' => 'Textbook', 'description' => 'Urdu literature textbook with poetry and prose analysis.'],
                                    ['id' => 9, 'title' => 'Past Papers Collection', 'subject' => 'All Subjects', 'grade' => 'Class 10', 'author' => 'studyHigh Team', 'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=400', 'rating' => 4.9, 'downloads' => 4560, 'type' => 'Past Papers', 'description' => '5 years of past exam papers with solutions and marking schemes.'],
                                ];
                            @endphp
                            
                            @foreach($dummyBooks as $book)
                                <div class="card-hover bg-white rounded-xl overflow-hidden shadow-md flex flex-col">
                                    <div class="relative">
                                        <img src="{{ $book['image'] }}" alt="{{ $book['title'] }}" class="w-full h-48 object-cover">
                                        <div class="absolute top-3 left-3">
                                            <span class="bg-primary-600 text-white text-xs px-2 py-1 rounded">{{ $book['type'] }}</span>
                                        </div>
                                        <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-lg text-sm font-medium flex items-center gap-1">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <span>{{ $book['rating'] }}</span>
                                        </div>
                                    </div>
                                    <div class="p-5 flex-1 flex flex-col">
                                        <span class="text-xs font-medium text-primary-600 bg-primary-50 px-2 py-1 rounded w-fit">{{ $book['subject'] }}</span>
                                        <h3 class="font-bold text-gray-900 mt-2 mb-1">{{ $book['title'] }}</h3>
                                        <p class="text-sm text-gray-500 mb-2">{{ $book['author'] }}</p>
                                        <p class="text-sm text-gray-600 mb-4 line-clamp-2 flex-1">{{ $book['description'] }}</p>
                                        <div class="flex items-center justify-between pt-4 border-t">
                                            <span class="text-sm text-gray-500"><i class="fas fa-download mr-1"></i> {{ number_format($book['downloads']) }}</span>
                                            <a href="{{ route('books.show', $book['id']) }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-primary-700 transition-colors">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforelse
                    </div>
                    
                    {{-- Pagination --}}
                    @if(isset($books) && $books->hasPages())
                        <div class="mt-8">
                            {{ $books->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
