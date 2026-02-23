{{-- Book Card Component --}}
{{-- Usage: @include('components.cards.book-card', ['book' => $book]) --}}

@php
    // Default book data if not provided
    $book = $book ?? [
        'id' => 1,
        'title' => 'Sample Book Title',
        'subject' => 'Mathematics',
        'grade' => 'Class 10',
        'author' => 'Author Name',
        'image' => 'https://via.placeholder.com/400x300',
        'rating' => 4.5,
        'downloads' => 1000,
        'type' => 'Textbook',
        'description' => 'Book description goes here...',
    ];
@endphp

<div class="card-hover bg-white rounded-xl overflow-hidden shadow-md flex flex-col h-full">
    <div class="relative">
        <img src="{{ $book['image'] ?? $book->cover_image }}" 
             alt="{{ $book['title'] ?? $book->title }}" 
             class="w-full h-48 object-cover">
        
        {{-- Type Badge --}}
        <div class="absolute top-3 left-3">
            <span class="bg-primary-600 text-white text-xs px-2 py-1 rounded font-medium">
                {{ $book['type'] ?? $book->type }}
            </span>
        </div>
        
        {{-- Rating Badge --}}
        <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-lg text-sm font-medium flex items-center gap-1">
            <i class="fas fa-star text-yellow-400"></i>
            <span>{{ $book['rating'] ?? $book->rating }}</span>
        </div>
        
        {{-- Favorite Button --}}
        @auth
            <button onclick="toggleFavorite({{ $book['id'] ?? $book->id }})" 
                    class="absolute bottom-3 right-3 w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-100 transition-colors"
                    title="Add to favorites">
                <i class="far fa-heart text-gray-400 hover:text-red-500"></i>
            </button>
        @endauth
    </div>
    
    <div class="p-5 flex-1 flex flex-col">
        {{-- Subject Badge --}}
        <span class="text-xs font-medium text-primary-600 bg-primary-50 px-2 py-1 rounded w-fit">
            {{ $book['subject'] ?? $book->category->name ?? 'General' }}
        </span>
        
        {{-- Title --}}
        <h3 class="font-bold text-gray-900 mt-2 mb-1 line-clamp-2">
            {{ $book['title'] ?? $book->title }}
        </h3>
        
        {{-- Author --}}
        <p class="text-sm text-gray-500 mb-2">
            {{ $book['author'] ?? $book->author }}
        </p>
        
        {{-- Grade --}}
        <p class="text-xs text-gray-400 mb-3">
            <i class="fas fa-graduation-cap mr-1"></i>
            {{ $book['grade'] ?? $book->grade }}
        </p>
        
        {{-- Description --}}
        <p class="text-sm text-gray-600 line-clamp-2 mb-4 flex-1">
            {{ $book['description'] ?? $book->description }}
        </p>
        
        {{-- Footer --}}
        <div class="flex items-center justify-between pt-4 border-t">
            <span class="text-sm text-gray-500">
                <i class="fas fa-download mr-1"></i> 
                {{ number_format($book['downloads'] ?? $book->download_count ?? 0) }}
            </span>
            <a href="{{ route('books.show', $book['id'] ?? $book->id) }}" 
               class="bg-primary-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-primary-700 transition-colors">
                View Details
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function toggleFavorite(bookId) {
        // TODO: Implement favorite toggle via AJAX
        fetch(`{{ url('/favorites') }}/${bookId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast(data.message, 'success');
            }
        })
        .catch(error => {
            showToast('Please login to add favorites', 'error');
        });
    }
</script>
@endpush
