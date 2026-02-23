<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ==================== PUBLIC ROUTES ====================

// Landing Page
Route::get('/', function () {
    return view('pages.landing');
})->name('home');

// ==================== AUTHENTICATION ROUTES ====================

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

Route::post('/login', function () {
    // TODO: Implement login logic in AuthController
    return redirect()->route('dashboard');
})->name('login.post');

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');

Route::post('/register', function () {
    // TODO: Implement registration logic in AuthController
    return redirect()->route('dashboard');
})->name('register.post');

Route::post('/logout', function () {
    // TODO: Implement logout logic in AuthController
    return redirect()->route('home');
})->name('logout');

// Password Reset
Route::get('/forgot-password', function () {
    return view('pages.auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function () {
    // TODO: Implement password reset email logic
    return back()->with('status', 'Password reset link sent!');
})->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('pages.auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', function () {
    // TODO: Implement password reset logic
    return redirect()->route('login')->with('status', 'Password reset successful!');
})->name('password.update');

// ==================== BOOKS ROUTES ====================

Route::get('/books', function () {
    // TODO: Fetch books from BookController
    return view('pages.books.index');
})->name('books.index');

Route::get('/books/{id}', function ($id) {
    // TODO: Fetch book details from BookController
    return view('pages.books.show', ['id' => $id]);
})->name('books.show');

// ==================== QUIZ ROUTES ====================

Route::get('/quiz', function () {
    // TODO: Fetch quizzes from QuizController
    return view('pages.quiz.index');
})->name('quiz.index');

Route::get('/quiz/{id}/take', function ($id) {
    // TODO: Fetch quiz from QuizController
    return view('pages.quiz.take', ['id' => $id]);
})->name('quiz.take');

Route::post('/quiz/{id}/submit', function ($id) {
    // TODO: Process quiz submission in QuizController
    return redirect()->route('quiz.result', ['id' => $id]);
})->name('quiz.submit');

Route::get('/quiz/{id}/result', function ($id) {
    // TODO: Fetch quiz results from QuizController
    return view('pages.quiz.result', ['id' => $id]);
})->name('quiz.result');

// ==================== GUIDANCE SESSIONS ROUTES ====================

Route::get('/guidance', function () {
    // TODO: Fetch tutors from GuidanceController
    return view('pages.guidance.index');
})->name('guidance.index');

Route::get('/guidance/{id}/book', function ($id) {
    // TODO: Fetch tutor details from GuidanceController
    return view('pages.guidance.book', ['id' => $id]);
})->name('guidance.book');

Route::post('/guidance/book', function () {
    // TODO: Process booking in GuidanceController
    return redirect()->route('dashboard')->with('success', 'Session booked successfully!');
})->name('guidance.store');

// ==================== REVIEWS ROUTES ====================

Route::get('/reviews', function () {
    // TODO: Fetch reviews from ReviewController
    return view('pages.reviews');
})->name('reviews');

Route::post('/reviews', function () {
    // TODO: Store review in ReviewController
    return back()->with('success', 'Review submitted successfully!');
})->name('reviews.store');

// ==================== CONTACT & SUPPORT ROUTES ====================

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function () {
    // TODO: Process contact form in ContactController
    return back()->with('success', 'Message sent successfully!');
})->name('contact.store');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/help', function () {
    return view('pages.help');
})->name('help');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/sitemap', function () {
    return view('pages.sitemap');
})->name('sitemap');

// ==================== NEWSLETTER ROUTES ====================

Route::post('/newsletter/subscribe', function () {
    // TODO: Process newsletter subscription
    return back()->with('success', 'Subscribed to newsletter!');
})->name('newsletter.subscribe');

// ==================== PROTECTED ROUTES (Require Authentication) ====================

Route::middleware(['auth'])->group(function () {
    
    // Student Dashboard
    Route::get('/dashboard', function () {
        // TODO: Fetch user dashboard data from DashboardController
        return view('pages.dashboard.student');
    })->name('dashboard');
    
    // User Profile
    Route::get('/profile', function () {
        // TODO: Fetch user profile from ProfileController
        return view('pages.profile');
    })->name('profile');
    
    Route::put('/profile', function () {
        // TODO: Update user profile in ProfileController
        return back()->with('success', 'Profile updated successfully!');
    })->name('profile.update');
    
    // Favorites
    Route::get('/favorites', function () {
        // TODO: Fetch user favorites from FavoriteController
        return view('pages.favorites');
    })->name('favorites');
    
    Route::post('/favorites/{bookId}', function ($bookId) {
        // TODO: Add to favorites in FavoriteController
        return response()->json(['success' => true]);
    })->name('favorites.add');
    
    Route::delete('/favorites/{bookId}', function ($bookId) {
        // TODO: Remove from favorites in FavoriteController
        return response()->json(['success' => true]);
    })->name('favorites.remove');
    
    // Notifications
    Route::get('/notifications', function () {
        // TODO: Fetch notifications from NotificationController
        return view('pages.notifications');
    })->name('notifications');
    
    Route::put('/notifications/{id}/read', function ($id) {
        // TODO: Mark notification as read
        return response()->json(['success' => true]);
    })->name('notifications.read');
});

// ==================== ADMIN ROUTES (Require Admin Authentication) ====================

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    
    // Admin Dashboard (sirf ek route with name)
Route::get('/', function () {
    return view('pages.admin.dashboard');
})->name('admin.dashboard');

// Route::get('/dashboard', function () {
//     return view('pages.admin.dashboard');
// })->name('admin.dashboard'); //
    
    // Users Management
    Route::get('/users', function () {
        // TODO: Fetch users from Admin\UserController
        return view('pages.admin.users');
    })->name('admin.users');
    
    Route::get('/users/{id}', function ($id) {
        // TODO: Fetch user details
        return view('pages.admin.users-show', ['id' => $id]);
    })->name('admin.users.show');
    
    Route::get('/users/{id}/edit', function ($id) {
        // TODO: Fetch user for editing
        return view('pages.admin.users-edit', ['id' => $id]);
    })->name('admin.users.edit');
    
    Route::put('/users/{id}', function ($id) {
        // TODO: Update user
        return redirect()->route('admin.users')->with('success', 'User updated!');
    })->name('admin.users.update');
    
    Route::delete('/users/{id}', function ($id) {
        // TODO: Delete user
        return redirect()->route('admin.users')->with('success', 'User deleted!');
    })->name('admin.users.destroy');
    
    // Books Management
    Route::get('/books', function () {
        // TODO: Fetch books from Admin\BookController
        return view('pages.admin.books');
    })->name('admin.books');
    
    Route::get('/books/create', function () {
        return view('pages.admin.books-create');
    })->name('admin.books.create');
    
    Route::post('/books', function () {
        // TODO: Store book
        return redirect()->route('admin.books')->with('success', 'Book added!');
    })->name('admin.books.store');
    
    Route::get('/books/{id}/edit', function ($id) {
        // TODO: Fetch book for editing
        return view('pages.admin.books-edit', ['id' => $id]);
    })->name('admin.books.edit');
    
    Route::put('/books/{id}', function ($id) {
        // TODO: Update book
        return redirect()->route('admin.books')->with('success', 'Book updated!');
    })->name('admin.books.update');
    
    Route::delete('/books/{id}', function ($id) {
        // TODO: Delete book
        return redirect()->route('admin.books')->with('success', 'Book deleted!');
    })->name('admin.books.destroy');
    
    // Quizzes Management
    Route::get('/quizzes', function () {
        // TODO: Fetch quizzes from Admin\QuizController
        return view('pages.admin.quizzes');
    })->name('admin.quizzes');
    
    Route::get('/quizzes/create', function () {
        return view('pages.admin.quizzes-create');
    })->name('admin.quizzes.create');
    
    Route::post('/quizzes', function () {
        // TODO: Store quiz
        return redirect()->route('admin.quizzes')->with('success', 'Quiz added!');
    })->name('admin.quizzes.store');
    
    Route::get('/quizzes/{id}/edit', function ($id) {
        // TODO: Fetch quiz for editing
        return view('pages.admin.quizzes-edit', ['id' => $id]);
    })->name('admin.quizzes.edit');
    
    // Guidance Sessions Management
    Route::get('/guidance', function () {
        // TODO: Fetch sessions from Admin\GuidanceController
        return view('pages.admin.guidance');
    })->name('admin.guidance');
    
    // Reviews Management
    Route::get('/reviews', function () {
        // TODO: Fetch reviews from Admin\ReviewController
        return view('pages.admin.reviews');
    })->name('admin.reviews');
    
    Route::put('/reviews/{id}/approve', function ($id) {
        // TODO: Approve review
        return back()->with('success', 'Review approved!');
    })->name('admin.reviews.approve');
    
    Route::delete('/reviews/{id}', function ($id) {
        // TODO: Delete review
        return back()->with('success', 'Review deleted!');
    })->name('admin.reviews.destroy');
    
    // Queries Management
    Route::get('/queries', function () {
        // TODO: Fetch queries from Admin\QueryController
        return view('pages.admin.queries');
    })->name('admin.queries');
    
    Route::put('/queries/{id}/respond', function ($id) {
        // TODO: Respond to query
        return back()->with('success', 'Response sent!');
    })->name('admin.queries.respond');
    
    // Payments Management
    Route::get('/payments', function () {
        // TODO: Fetch payments from Admin\PaymentController
        return view('pages.admin.payments');
    })->name('admin.payments');
    
    // Reports
    Route::get('/reports', function () {
        // TODO: Generate reports
        return view('pages.admin.reports');
    })->name('admin.reports');
    
    // Settings
    Route::get('/settings', function () {
        return view('pages.admin.settings');
    })->name('admin.settings');
    
    Route::put('/settings', function () {
        // TODO: Update settings
        return back()->with('success', 'Settings updated!');
    })->name('admin.settings.update');
});

// ==================== API ROUTES (For AJAX Requests) ====================

Route::prefix('api')->middleware(['auth'])->group(function () {
    
    // User API
    Route::get('/user', function () {
        return response()->json(Auth::user());
    })->name('api.user');
    
    // Books API
    Route::get('/books', function () {
        // TODO: Return books JSON
        return response()->json([]);
    })->name('api.books');
    
    // Quizzes API
    Route::get('/quizzes', function () {
        // TODO: Return quizzes JSON
        return response()->json([]);
    })->name('api.quizzes');
    
    // Progress API
    Route::get('/progress', function () {
        // TODO: Return user progress
        return response()->json([]);
    })->name('api.progress');
    
    Route::post('/progress', function () {
        // TODO: Save progress
        return response()->json(['success' => true]);
    })->name('api.progress.store');
});
