@extends('layouts.master')

@section('title', 'Login - studyHigh.pk')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-primary-50 via-white to-secondary-50 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="max-w-md w-full">
            {{-- Login Card --}}
            <div class="bg-white rounded-2xl shadow-xl p-8">
                {{-- Header --}}
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-3xl"></i>
                        </div>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">Welcome Back!</h1>
                    <p class="text-gray-600 mt-2">Sign in to continue your learning journey</p>
                </div>
                
                {{-- Social Login --}}
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
                        <span class="px-2 bg-white text-gray-500">Or continue with email</span>
                    </div>
                </div>
                
                {{-- Login Form --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    
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
                                   required 
                                   autofocus>
                        </div>
                        @error('email')
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
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Remember Me & Forgot Password --}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="remember" 
                                   id="remember" 
                                   class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary-600 hover:text-primary-500">
                            Forgot password?
                        </a>
                    </div>
                    
                    {{-- Submit Button --}}
                    <button type="submit" class="w-full gradient-bg text-white py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                        <span>Sign In</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
                
                {{-- Register Link --}}
                <p class="mt-6 text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500">
                        Sign up for free
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
