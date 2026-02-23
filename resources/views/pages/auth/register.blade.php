@extends('layouts.master')

@section('title', 'Sign Up - studyHigh.pk')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-primary-50 via-white to-secondary-50 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="max-w-lg w-full">
            {{-- Register Card --}}
            <div class="bg-white rounded-2xl shadow-xl p-8">
                {{-- Header --}}
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center">
                            <i class="fas fa-user-plus text-white text-3xl"></i>
                        </div>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">Create Your Account</h1>
                    <p class="text-gray-600 mt-2">Start your learning journey today</p>
                </div>
                
                {{-- Social Register --}}
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <button type="button" class="flex items-center justify-center gap-2 border border-gray-300 rounded-lg py-2.5 hover:bg-gray-50 transition-colors">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                        <span class="text-sm font-medium text-gray-700">Google</span>
                    </button>
                    <button type="button" class="flex items-center justify-center gap-2 border border-gray-300 rounded-lg py-2.5 hover:bg-gray-50 transition-colors">
                        <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Facebook" class="w-5 h-5">
                        <span class="text-sm font-medium text-gray-700">Facebook</span>
                    </button>
                </div>
                
                {{-- Divider --}}
                <div class="relative mb-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or register with email</span>
                    </div>
                </div>
                
                {{-- Register Form --}}
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf
                    
                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   value="{{ old('name') }}"
                                   class="input-field pl-10 @error('name') border-red-500 @enderror" 
                                   placeholder="John Doe"
                                   required 
                                   autofocus>
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   value="{{ old('email') }}"
                                   class="input-field pl-10 @error('email') border-red-500 @enderror" 
                                   placeholder="you@example.com"
                                   required>
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
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
                                   placeholder="+92 300 1234567"
                                   required>
                        </div>
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Grade/Level --}}
                    <div>
                        <label for="grade" class="block text-sm font-medium text-gray-700 mb-2">Grade/Level</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-graduation-cap text-gray-400"></i>
                            </div>
                            <select name="grade" 
                                    id="grade" 
                                    class="input-field pl-10 @error('grade') border-red-500 @enderror"
                                    required>
                                <option value="">Select your grade</option>
                                <option value="class_9" {{ old('grade') == 'class_9' ? 'selected' : '' }}>Class 9</option>
                                <option value="class_10" {{ old('grade') == 'class_10' ? 'selected' : '' }}>Class 10 (Matric)</option>
                                <option value="class_11" {{ old('grade') == 'class_11' ? 'selected' : '' }}>Class 11 (First Year)</option>
                                <option value="class_12" {{ old('grade') == 'class_12' ? 'selected' : '' }}>Class 12 (Second Year)</option>
                                <option value="university" {{ old('grade') == 'university' ? 'selected' : '' }}>University</option>
                                <option value="other" {{ old('grade') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        @error('grade')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="input-field pl-10 pr-10 @error('password') border-red-500 @enderror" 
                                   placeholder="••••••••"
                                   required>
                            <button type="button" 
                                    onclick="togglePassword('password', this)" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters with letters and numbers</p>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" 
                                   name="password_confirmation" 
                                   id="password_confirmation" 
                                   class="input-field pl-10 pr-10" 
                                   placeholder="••••••••"
                                   required>
                            <button type="button" 
                                    onclick="togglePassword('password_confirmation', this)" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    {{-- Terms --}}
                    <div class="flex items-start">
                        <input type="checkbox" 
                               name="terms" 
                               id="terms" 
                               class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded mt-1"
                               required>
                        <label for="terms" class="ml-2 block text-sm text-gray-600">
                            I agree to the <a href="{{ route('terms') }}" class="text-primary-600 hover:text-primary-500">Terms of Service</a> and 
                            <a href="{{ route('privacy') }}" class="text-primary-600 hover:text-primary-500">Privacy Policy</a>
                        </label>
                    </div>
                    @error('terms')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    {{-- Submit Button --}}
                    <button type="submit" class="w-full gradient-bg text-white py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                        <span>Create Account</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
                
                {{-- Login Link --}}
                <p class="mt-6 text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500">
                        Sign in here
                    </a>
                </p>
            </div>
            
            {{-- Back to Home --}}
            <div class="text-center mt-6">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700 text-sm flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
    @endpush
@endsection
