@extends('layouts.master')

@section('title', 'Contact Us - studyHigh.pk')

@section('content')
    {{-- Header Section --}}
    <section class="bg-gradient-to-br from-primary-600 to-secondary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Get in Touch</h1>
            <p class="text-lg text-white/90 max-w-2xl mx-auto">Have a question or need help? We're here to assist you</p>
        </div>
    </section>
    
    {{-- Contact Section --}}
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                {{-- Contact Info --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                        <h3 class="font-bold text-gray-900 mb-4">Contact Information</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-primary-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Address</p>
                                    <p class="text-gray-600 text-sm">123 Education Street, Karachi, Pakistan</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-primary-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Phone</p>
                                    <p class="text-gray-600 text-sm">+92 300 1234567</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-primary-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Email</p>
                                    <p class="text-gray-600 text-sm">info@studyhigh.pk</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-clock text-primary-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Working Hours</p>
                                    <p class="text-gray-600 text-sm">Mon - Sat: 9:00 AM - 6:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Social Links --}}
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="font-bold text-gray-900 mb-4">Follow Us</h3>
                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-sky-500 text-white rounded-lg flex items-center justify-center hover:bg-sky-600 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-pink-600 text-white rounded-lg flex items-center justify-center hover:bg-pink-700 transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-red-600 text-white rounded-lg flex items-center justify-center hover:bg-red-700 transition-colors">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-green-500 text-white rounded-lg flex items-center justify-center hover:bg-green-600 transition-colors">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                {{-- Contact Form --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Send us a Message</h2>
                        <p class="text-gray-600 mb-6">Fill out the form below and we'll get back to you as soon as possible.</p>
                        
                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                {{-- Name --}}
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-user text-gray-400"></i>
                                        </div>
                                        <input type="text" 
                                               name="name" 
                                               id="name" 
                                               value="{{ old('name', auth()->user()->name ?? '') }}"
                                               class="input-field pl-10 @error('name') border-red-500 @enderror" 
                                               placeholder="Your name"
                                               required>
                                    </div>
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                {{-- Email --}}
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-gray-400"></i>
                                        </div>
                                        <input type="email" 
                                               name="email" 
                                               id="email" 
                                               value="{{ old('email', auth()->user()->email ?? '') }}"
                                               class="input-field pl-10 @error('email') border-red-500 @enderror" 
                                               placeholder="you@example.com"
                                               required>
                                    </div>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                {{-- Phone --}}
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-phone text-gray-400"></i>
                                        </div>
                                        <input type="tel" 
                                               name="phone" 
                                               id="phone" 
                                               value="{{ old('phone') }}"
                                               class="input-field pl-10 @error('phone') border-red-500 @enderror" 
                                               placeholder="+92 300 1234567">
                                    </div>
                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                {{-- Subject --}}
                                <div>
                                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-tag text-gray-400"></i>
                                        </div>
                                        <select name="subject" 
                                                id="subject" 
                                                class="input-field pl-10 @error('subject') border-red-500 @enderror"
                                                required>
                                            <option value="">Select a subject</option>
                                            <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                                            <option value="technical" {{ old('subject') == 'technical' ? 'selected' : '' }}>Technical Support</option>
                                            <option value="billing" {{ old('subject') == 'billing' ? 'selected' : '' }}>Billing Question</option>
                                            <option value="books" {{ old('subject') == 'books' ? 'selected' : '' }}>Book Related</option>
                                            <option value="tutoring" {{ old('subject') == 'tutoring' ? 'selected' : '' }}>Tutoring Session</option>
                                            <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback</option>
                                            <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    @error('subject')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            {{-- Message --}}
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                                <textarea name="message" 
                                          id="message" 
                                          rows="5" 
                                          class="input-field resize-none @error('message') border-red-500 @enderror" 
                                          placeholder="Describe your question or issue in detail..."
                                          required>{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            {{-- Priority --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Priority Level</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="priority" value="low" class="w-4 h-4 text-primary-600" {{ old('priority', 'low') == 'low' ? 'checked' : '' }}>
                                        <span>Low</span>
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="priority" value="medium" class="w-4 h-4 text-primary-600" {{ old('priority') == 'medium' ? 'checked' : '' }}>
                                        <span>Medium</span>
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="priority" value="high" class="w-4 h-4 text-primary-600" {{ old('priority') == 'high' ? 'checked' : '' }}>
                                        <span>High</span>
                                    </label>
                                </div>
                            </div>
                            
                            {{-- Submit Button --}}
                            <button type="submit" class="w-full gradient-bg text-white py-4 rounded-xl font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                                <i class="fas fa-paper-plane"></i>
                                <span>Send Message</span>
                            </button>
                            
                            <p class="text-center text-sm text-gray-500">
                                We typically respond within 24 hours during business days.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- FAQ Section --}}
    <section class="py-12 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Frequently Asked Questions</h2>
                <p class="text-gray-600 mt-2">Find quick answers to common questions</p>
            </div>
            
            @php
                $faqs = [
                    ['q' => 'How do I reset my password?', 'a' => 'Go to the login page and click on "Forgot Password". Enter your email address and follow the instructions sent to your inbox.'],
                    ['q' => 'Can I download books for offline reading?', 'a' => 'Yes, most books on our platform can be downloaded as PDFs for offline reading. Look for the download button on the book detail page.'],
                    ['q' => 'How do I book a guidance session?', 'a' => 'Navigate to the Guidance Sessions page, browse our expert tutors, select one that matches your needs, and choose an available time slot.'],
                    ['q' => 'What payment methods do you accept?', 'a' => 'We accept all major credit/debit cards, JazzCash, EasyPaisa, and bank transfers.'],
                    ['q' => 'How can I track my quiz progress?', 'a' => 'Your quiz scores and progress are automatically saved and can be viewed in your student dashboard under the "Quiz Performance" section.'],
                ];
            @endphp
            
            <div class="space-y-4" x-data="{ open: null }">
                @foreach($faqs as $index => $faq)
                    <div class="border border-gray-200 rounded-xl overflow-hidden">
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
            
            <div class="text-center mt-8">
                <a href="{{ route('faq') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    View All FAQs <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
