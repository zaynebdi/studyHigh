@extends('layouts.master')

@section('title', 'Reset Password - studyHigh.pk')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-primary-50 via-white to-secondary-50 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="max-w-md w-full">
            {{-- Reset Password Card --}}
            <div class="bg-white rounded-2xl shadow-xl p-8">
                {{-- Header --}}
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-primary-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-lock-open text-primary-600 text-3xl"></i>
                        </div>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">Reset Password</h1>
                    <p class="text-gray-600 mt-2">Create a new password for your account</p>
                </div>
                
                {{-- Reset Password Form --}}
                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    
                    {{-- Hidden Token --}}
                    <input type="hidden" name="token" value="{{ $token ?? '' }}">
                    
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
                                   value="{{ $email ?? old('email') }}"
                                   class="input-field pl-10 @error('email') border-red-500 @enderror" 
                                   placeholder="you@example.com"
                                   required 
                                   readonly>
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- New Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="input-field pl-10 pr-10 @error('password') border-red-500 @enderror" 
                                   placeholder="••••••••"
                                   required 
                                   autofocus>
                            <button type="button" 
                                    onclick="togglePassword('password', this)" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters</p>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
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
                    
                    {{-- Submit Button --}}
                    <button type="submit" class="w-full gradient-bg text-white py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                        <span>Reset Password</span>
                        <i class="fas fa-check"></i>
                    </button>
                </form>
            </div>
            
            {{-- Back to Login --}}
            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 text-sm flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    Back to Login
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
