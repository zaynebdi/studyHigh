@extends('layouts.master')

@section('title', 'Forgot Password - studyHigh.pk')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-primary-50 via-white to-secondary-50 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="max-w-md w-full">
            {{-- Forgot Password Card --}}
            <div class="bg-white rounded-2xl shadow-xl p-8">
                {{-- Header --}}
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-primary-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-key text-primary-600 text-3xl"></i>
                        </div>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">Forgot Password?</h1>
                    <p class="text-gray-600 mt-2">Enter your email and we'll send you a link to reset your password</p>
                </div>
                
                {{-- Success Message --}}
                @if(session('status'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-center gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        <p class="text-green-700 text-sm">{{ session('status') }}</p>
                    </div>
                @endif
                
                {{-- Forgot Password Form --}}
                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                    
                    {{-- Submit Button --}}
                    <button type="submit" class="w-full gradient-bg text-white py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                        <span>Send Reset Link</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
                
                {{-- Back to Login --}}
                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-primary-600 hover:text-primary-500 flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        Back to Login
                    </a>
                </div>
            </div>
            
            {{-- Help Text --}}
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    Need help? <a href="{{ route('contact') }}" class="text-primary-600 hover:text-primary-500">Contact Support</a>
                </p>
            </div>
        </div>
    </div>
@endsection
