@extends('layouts.master')

@section('title', 'Book Guidance Session - studyHigh.pk')

@section('content')
    @php
        // Dummy tutor data
        $tutor = $tutor ?? [
            'id' => 1,
            'name' => 'Prof. Ahmad Khan',
            'subjects' => ['Mathematics', 'Statistics'],
            'price' => 1500,
            'image' => 'https://ui-avatars.com/api/?name=Ahmad+Khan&background=random&size=200',
        ];
    @endphp
    
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Header --}}
            <div class="mb-8">
                <a href="{{ route('guidance.index') }}" class="text-gray-500 hover:text-gray-700 flex items-center gap-2 mb-4">
                    <i class="fas fa-arrow-left"></i>
                    Back to Tutors
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Book a Guidance Session</h1>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Booking Form --}}
                <div class="md:col-span-2">
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <form action="{{ route('guidance.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="tutor_id" value="{{ $tutor['id'] }}">
                            
                            {{-- Subject Selection --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Select Subject</label>
                                <div class="grid grid-cols-2 gap-3">
                                    @foreach($tutor['subjects'] as $subject)
                                        <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="radio" name="subject" value="{{ $subject }}" class="w-4 h-4 text-accent-600" required>
                                            <span>{{ $subject }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            
                            {{-- Topic --}}
                            <div>
                                <label for="topic" class="block text-sm font-medium text-gray-700 mb-2">Topic/Area of Focus</label>
                                <input type="text" 
                                       name="topic" 
                                       id="topic" 
                                       class="input-field" 
                                       placeholder="e.g., Calculus - Integration by Parts"
                                       required>
                            </div>
                            
                            {{-- Date Selection --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Select Date</label>
                                <div class="grid grid-cols-4 gap-3">
                                    @php
                                        $dates = [
                                            ['day' => 'Mon', 'date' => '24', 'month' => 'Feb'],
                                            ['day' => 'Tue', 'date' => '25', 'month' => 'Feb'],
                                            ['day' => 'Wed', 'date' => '26', 'month' => 'Feb'],
                                            ['day' => 'Thu', 'date' => '27', 'month' => 'Feb'],
                                        ];
                                    @endphp
                                    @foreach($dates as $date)
                                        <label class="flex flex-col items-center p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="radio" name="date" value="{{ $date['date'] }}-{{ $date['month'] }}" class="sr-only" required>
                                            <span class="text-xs text-gray-500">{{ $date['day'] }}</span>
                                            <span class="text-xl font-bold">{{ $date['date'] }}</span>
                                            <span class="text-xs text-gray-500">{{ $date['month'] }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            
                            {{-- Time Selection --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Select Time</label>
                                <div class="grid grid-cols-4 gap-3">
                                    @php
                                        $times = ['10:00 AM', '12:00 PM', '2:00 PM', '4:00 PM', '6:00 PM', '8:00 PM'];
                                    @endphp
                                    @foreach($times as $time)
                                        <label class="flex items-center justify-center p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="radio" name="time" value="{{ $time }}" class="sr-only" required>
                                            <span>{{ $time }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            
                            {{-- Duration --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Session Duration</label>
                                <div class="grid grid-cols-3 gap-3">
                                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="duration" value="60" class="w-4 h-4 text-accent-600" checked>
                                        <div>
                                            <span class="font-medium">1 Hour</span>
                                            <span class="text-gray-500 text-sm block">Rs. {{ number_format($tutor['price']) }}</span>
                                        </div>
                                    </label>
                                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="duration" value="90" class="w-4 h-4 text-accent-600">
                                        <div>
                                            <span class="font-medium">1.5 Hours</span>
                                            <span class="text-gray-500 text-sm block">Rs. {{ number_format($tutor['price'] * 1.5) }}</span>
                                        </div>
                                    </label>
                                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="duration" value="120" class="w-4 h-4 text-accent-600">
                                        <div>
                                            <span class="font-medium">2 Hours</span>
                                            <span class="text-gray-500 text-sm block">Rs. {{ number_format($tutor['price'] * 2) }}</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            {{-- Notes --}}
                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Additional Notes (Optional)</label>
                                <textarea name="notes" 
                                          id="notes" 
                                          rows="3" 
                                          class="input-field resize-none" 
                                          placeholder="Any specific topics or questions you want to cover..."></textarea>
                            </div>
                            
                            {{-- Submit Button --}}
                            <button type="submit" class="w-full bg-accent-600 text-white py-4 rounded-xl font-semibold hover:bg-accent-700 transition-colors flex items-center justify-center gap-2">
                                <span>Proceed to Payment</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                {{-- Sidebar --}}
                <div>
                    {{-- Tutor Info --}}
                    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                        <h3 class="font-bold text-gray-900 mb-4">Tutor</h3>
                        <div class="flex items-center gap-4">
                            <img src="{{ $tutor['image'] }}" alt="{{ $tutor['name'] }}" class="w-16 h-16 rounded-xl">
                            <div>
                                <p class="font-bold text-gray-900">{{ $tutor['name'] }}</p>
                                <p class="text-sm text-gray-500">{{ implode(', ', $tutor['subjects']) }}</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Booking Summary --}}
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="font-bold text-gray-900 mb-4">Booking Summary</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Session Rate</span>
                                <span>Rs. {{ number_format($tutor['price']) }}/hr</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Duration</span>
                                <span id="summary-duration">1 Hour</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Platform Fee</span>
                                <span>Rs. 100</span>
                            </div>
                            <hr>
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total</span>
                                <span id="summary-total">Rs. {{ number_format($tutor['price'] + 100) }}</span>
                            </div>
                        </div>
                        <div class="mt-4 p-3 bg-green-50 rounded-lg">
                            <p class="text-green-700 text-sm text-center">
                                <i class="fas fa-shield-alt mr-1"></i>
                                100% Satisfaction Guaranteed
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Update summary when duration changes
    document.querySelectorAll('input[name="duration"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const price = {{ $tutor['price'] }};
            const duration = parseInt(this.value);
            const hours = duration / 60;
            const total = (price * hours) + 100;
            
            document.getElementById('summary-duration').textContent = hours + ' Hour' + (hours > 1 ? 's' : '');
            document.getElementById('summary-total').textContent = 'Rs. ' + total.toLocaleString();
        });
    });
    
    // Highlight selected date/time
    document.querySelectorAll('input[name="date"], input[name="time"]').forEach(radio => {
        radio.addEventListener('change', function() {
            this.closest('label').classList.add('bg-accent-50', 'border-accent-500');
            this.closest('label').classList.remove('border-gray-200');
        });
    });
</script>
@endpush
