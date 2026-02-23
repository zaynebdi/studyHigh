@extends('layouts.master')

@section('title', 'Premium Guidance Sessions - studyHigh.pk')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-accent-500 to-accent-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Premium Guidance Sessions</h1>
                <p class="text-lg text-white/90 max-w-2xl mx-auto">Get personalized one-on-one tutoring from expert educators to accelerate your learning</p>
            </div>
        </div>
    </section>
    
    {{-- How It Works --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-bold text-gray-900">How It Works</h2>
                <p class="text-gray-600 mt-2">Book a session in 3 easy steps</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-accent-600 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">1. Choose a Tutor</h3>
                    <p class="text-gray-600">Browse our expert tutors and select the one that matches your needs</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-alt text-accent-600 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">2. Book a Session</h3>
                    <p class="text-gray-600">Select a convenient date and time from the tutor's available slots</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-video text-accent-600 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">3. Start Learning</h3>
                    <p class="text-gray-600">Join the video session and get personalized guidance from your tutor</p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Tutors Section --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Filters --}}
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Our Expert Tutors</h2>
                <div class="flex gap-3">
                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-accent-500 focus:border-accent-500">
                        <option>All Subjects</option>
                        <option>Mathematics</option>
                        <option>Physics</option>
                        <option>Chemistry</option>
                        <option>Biology</option>
                        <option>English</option>
                    </select>
                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-accent-500 focus:border-accent-500">
                        <option>All Grades</option>
                        <option>Class 9-10</option>
                        <option>Class 11-12</option>
                        <option>University</option>
                    </select>
                </div>
            </div>
            
            {{-- Tutors Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $tutors = [
                        [
                            'id' => 1,
                            'name' => 'Prof. Ahmad Khan',
                            'subjects' => ['Mathematics', 'Statistics'],
                            'grades' => ['Class 9-12', 'University'],
                            'experience' => '15+ years',
                            'rating' => 4.9,
                            'reviews' => 234,
                            'price' => 1500,
                            'image' => 'https://ui-avatars.com/api/?name=Ahmad+Khan&background=random&size=200',
                            'bio' => 'Former professor at LUMS with expertise in advanced mathematics and competitive exam preparation.',
                            'availability' => 'Mon-Sat',
                        ],
                        [
                            'id' => 2,
                            'name' => 'Dr. Sarah Ali',
                            'subjects' => ['Physics', 'Chemistry'],
                            'grades' => ['Class 11-12', 'University'],
                            'experience' => '10+ years',
                            'rating' => 4.8,
                            'reviews' => 189,
                            'price' => 1800,
                            'image' => 'https://ui-avatars.com/api/?name=Sarah+Ali&background=random&size=200',
                            'bio' => 'PhD in Physics from FAST. Specializes in making complex concepts easy to understand.',
                            'availability' => 'Mon-Fri',
                        ],
                        [
                            'id' => 3,
                            'name' => 'Prof. Usman Tariq',
                            'subjects' => ['Chemistry', 'Biology'],
                            'grades' => ['Class 9-12'],
                            'experience' => '12+ years',
                            'rating' => 4.7,
                            'reviews' => 156,
                            'price' => 1200,
                            'image' => 'https://ui-avatars.com/api/?name=Usman+Tariq&background=random&size=200',
                            'bio' => 'Experienced educator with a passion for teaching science through practical examples.',
                            'availability' => 'Tue-Sun',
                        ],
                        [
                            'id' => 4,
                            'name' => 'Ms. Fatima Hassan',
                            'subjects' => ['English', 'Urdu'],
                            'grades' => ['All Levels'],
                            'experience' => '8+ years',
                            'rating' => 4.9,
                            'reviews' => 312,
                            'price' => 1000,
                            'image' => 'https://ui-avatars.com/api/?name=Fatima+Hassan&background=random&size=200',
                            'bio' => 'Language expert helping students excel in communication and literature studies.',
                            'availability' => 'Mon-Sun',
                        ],
                        [
                            'id' => 5,
                            'name' => 'Dr. Ayesha Malik',
                            'subjects' => ['Biology', 'Chemistry'],
                            'grades' => ['Class 9-12', 'University'],
                            'experience' => '10+ years',
                            'rating' => 4.8,
                            'reviews' => 198,
                            'price' => 1600,
                            'image' => 'https://ui-avatars.com/api/?name=Ayesha+Malik&background=random&size=200',
                            'bio' => 'Medical professional with teaching experience in biology and life sciences.',
                            'availability' => 'Mon-Fri',
                        ],
                        [
                            'id' => 6,
                            'name' => 'Engr. Bilal Ahmed',
                            'subjects' => ['Computer Science', 'Mathematics'],
                            'grades' => ['Class 9-12', 'University'],
                            'experience' => '7+ years',
                            'rating' => 4.6,
                            'reviews' => 145,
                            'price' => 1400,
                            'image' => 'https://ui-avatars.com/api/?name=Bilal+Ahmed&background=random&size=200',
                            'bio' => 'Software engineer passionate about teaching programming and computational thinking.',
                            'availability' => 'Sat-Sun',
                        ],
                    ];
                @endphp
                
                @foreach($tutors as $tutor)
                    <div class="card-hover bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-start gap-4">
                                <img src="{{ $tutor['image'] }}" alt="{{ $tutor['name'] }}" class="w-20 h-20 rounded-xl object-cover">
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-900">{{ $tutor['name'] }}</h3>
                                    <div class="flex items-center gap-1 mt-1">
                                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                                        <span class="text-sm font-medium">{{ $tutor['rating'] }}</span>
                                        <span class="text-sm text-gray-500">({{ $tutor['reviews'] }} reviews)</span>
                                    </div>
                                    <p class="text-accent-600 font-semibold mt-1">Rs. {{ number_format($tutor['price']) }}/hour</p>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 text-sm mt-4 line-clamp-2">{{ $tutor['bio'] }}</p>
                            
                            <div class="mt-4">
                                <p class="text-xs text-gray-500 mb-2">Subjects:</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($tutor['subjects'] as $subject)
                                        <span class="bg-accent-50 text-accent-700 text-xs px-2 py-1 rounded">{{ $subject }}</span>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="mt-3 flex items-center gap-4 text-sm text-gray-500">
                                <span><i class="fas fa-briefcase mr-1"></i> {{ $tutor['experience'] }}</span>
                                <span><i class="fas fa-calendar mr-1"></i> {{ $tutor['availability'] }}</span>
                            </div>
                            
                            <div class="mt-4 flex gap-3">
                                <a href="{{ route('guidance.book', $tutor['id']) }}" class="flex-1 bg-accent-600 text-white text-center py-2.5 rounded-lg font-medium hover:bg-accent-700 transition-colors">
                                    Book Session
                                </a>
                                <button onclick="showTutorProfile({{ $tutor['id'] }})" class="px-4 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                    <i class="fas fa-user"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- Pricing Plans --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-bold text-gray-900">Session Packages</h2>
                <p class="text-gray-600 mt-2">Save more with our discounted packages</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                @php
                    $packages = [
                        ['name' => 'Starter', 'sessions' => 1, 'price' => 1500, 'discount' => 0, 'features' => ['1-hour session', 'Any subject', 'Any tutor', 'Session recording']],
                        ['name' => 'Popular', 'sessions' => 5, 'price' => 6750, 'discount' => 10, 'popular' => true, 'features' => ['5 one-hour sessions', 'Any subject', 'Any tutor', 'Session recordings', 'Priority booking', 'Progress report']],
                        ['name' => 'Premium', 'sessions' => 10, 'price' => 12000, 'discount' => 20, 'features' => ['10 one-hour sessions', 'Any subject', 'Any tutor', 'Session recordings', 'Priority booking', 'Detailed progress report', '24/7 support']],
                    ];
                @endphp
                
                @foreach($packages as $package)
                    <div class="rounded-xl shadow-md overflow-hidden {{ $package['popular'] ?? false ? 'ring-2 ring-accent-500 scale-105' : '' }}">
                        @if($package['popular'] ?? false)
                            <div class="bg-accent-500 text-white text-center py-2 text-sm font-medium">Most Popular</div>
                        @endif
                        <div class="p-6 {{ $package['popular'] ?? false ? '' : 'pt-8' }}">
                            <h3 class="text-xl font-bold text-gray-900">{{ $package['name'] }}</h3>
                            <div class="mt-4">
                                <span class="text-4xl font-bold text-gray-900">Rs. {{ number_format($package['price']) }}</span>
                                @if($package['discount'] > 0)
                                    <span class="text-green-600 text-sm ml-2">Save {{ $package['discount'] }}%</span>
                                @endif
                            </div>
                            <p class="text-gray-500 text-sm mt-1">{{ $package['sessions'] }} session{{ $package['sessions'] > 1 ? 's' : '' }}</p>
                            
                            <ul class="mt-6 space-y-3">
                                @foreach($package['features'] as $feature)
                                    <li class="flex items-center gap-2 text-sm text-gray-600">
                                        <i class="fas fa-check text-green-500"></i>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                            
                            <button class="w-full mt-6 {{ $package['popular'] ?? false ? 'bg-accent-600 text-white hover:bg-accent-700' : 'border-2 border-accent-600 text-accent-600 hover:bg-accent-50' }} py-3 rounded-lg font-medium transition-colors">
                                Choose {{ $package['name'] }}
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- FAQ Section --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-bold text-gray-900">Frequently Asked Questions</h2>
            </div>
            
            @php
                $faqs = [
                    ['q' => 'How do I book a guidance session?', 'a' => 'Simply browse our tutors, select one that matches your needs, choose an available time slot, and complete the booking. You will receive a confirmation email with the session details.'],
                    ['q' => 'What if I need to reschedule my session?', 'a' => 'You can reschedule your session up to 24 hours before the scheduled time at no extra cost. Simply go to your dashboard and click on Reschedule.'],
                    ['q' => 'Are the sessions recorded?', 'a' => 'Yes, all sessions are recorded and made available to you for future reference. You can access these recordings from your dashboard.'],
                    ['q' => 'What payment methods are accepted?', 'a' => 'We accept all major credit/debit cards, JazzCash, EasyPaisa, and bank transfers. All payments are secure and encrypted.'],
                    ['q' => 'Can I get a refund if I am not satisfied?', 'a' => 'Yes, we offer a 100% satisfaction guarantee. If you are not satisfied with your first session, contact us within 24 hours for a full refund.'],
                ];
            @endphp
            
            <div class="space-y-4" x-data="{ open: null }">
                @foreach($faqs as $index => $faq)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <button @click="open === {{ $index }} ? open = null : open = {{ $index }}" 
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <span class="font-medium text-gray-900">{{ $faq['q'] }}</span>
                            <i class="fas fa-chevron-down text-gray-400 transition-transform" :class="{ 'rotate-180': open === {{ $index }} }"></i>
                        </button>
                        <div x-show="open === {{ $index }}" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="px-6 pb-4 text-gray-600">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function showTutorProfile(tutorId) {
        showToast('Tutor profile modal coming soon!', 'info');
    }
</script>
@endpush
