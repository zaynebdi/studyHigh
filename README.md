# studyHigh.pk - Laravel Frontend MVP

A comprehensive Laravel Blade frontend MVP for an education platform. This project provides a complete frontend structure ready for backend integration.

## 📁 Folder Structure

```
studyhigh-laravel/
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── master.blade.php      # Main frontend layout
│       │   └── admin.blade.php       # Admin dashboard layout
│       ├── components/
│       │   ├── ui/                   # UI components
│       │   ├── forms/                # Form components
│       │   └── cards/                # Card components
│       ├── partials/
│       │   ├── navbar.blade.php      # Navigation bar
│       │   └── footer.blade.php      # Footer
│       ├── pages/
│       │   ├── landing.blade.php     # Homepage
│       │   ├── auth/                 # Authentication pages
│       │   │   ├── login.blade.php
│       │   │   ├── register.blade.php
│       │   │   ├── forgot-password.blade.php
│       │   │   └── reset-password.blade.php
│       │   ├── books/                # Book pages
│       │   │   ├── index.blade.php
│       │   │   └── show.blade.php
│       │   ├── dashboard/            # Dashboard pages
│       │   │   └── student.blade.php
│       │   ├── quiz/                 # Quiz pages
│       │   │   ├── index.blade.php
│       │   │   ├── take.blade.php
│       │   │   └── result.blade.php
│       │   ├── guidance/             # Guidance session pages
│       │   │   ├── index.blade.php
│       │   │   └── book.blade.php
│       │   ├── admin/                # Admin pages
│       │   │   ├── dashboard.blade.php
│       │   │   └── users.blade.php
│       │   ├── reviews.blade.php
│       │   └── contact.blade.php
│       └── emails/                   # Email templates
├── routes/
│   └── web.php                       # All route definitions
├── database/
│   └── data/                         # Dummy data files
└── public/
    ├── css/                          # Custom CSS
    ├── js/                           # Custom JS
    └── images/                       # Static images
```

## 🚀 Getting Started

### Prerequisites

- PHP 8.1+
- Composer
- Node.js & NPM
- MySQL or PostgreSQL

### Installation

1. **Create Laravel Project**
   ```bash
   composer create-project laravel/laravel studyhigh
   cd studyhigh
   ```

2. **Copy Frontend Files**
   Copy all files from this MVP to your Laravel project:
   ```bash
   # Copy views
   cp -r resources/views/* /path/to/your/laravel/resources/views/
   
   # Copy routes
   cp routes/web.php /path/to/your/laravel/routes/
   ```

3. **Install Tailwind CSS**
   ```bash
   npm install -D tailwindcss postcss autoprefixer
   npx tailwindcss init -p
   ```

4. **Configure Tailwind**
   Update `tailwind.config.js`:
   ```javascript
   module.exports = {
     content: [
       "./resources/**/*.blade.php",
       "./resources/**/*.js",
       "./resources/**/*.vue",
     ],
     theme: {
       extend: {
         colors: {
           primary: {
             50: '#eff6ff',
             100: '#dbeafe',
             200: '#bfdbfe',
             300: '#93c5fd',
             400: '#60a5fa',
             500: '#3b82f6',
             600: '#2563eb',
             700: '#1d4ed8',
             800: '#1e40af',
             900: '#1e3a8a',
           },
         },
       },
     },
     plugins: [],
   }
   ```

5. **Add Tailwind Directives**
   Create `resources/css/app.css`:
   ```css
   @tailwind base;
   @tailwind components;
   @tailwind utilities;
   ```

6. **Build Assets**
   ```bash
   npm run build
   ```

7. **Link CSS in Layout**
   In `resources/views/layouts/master.blade.php`, replace the CDN with:
   ```blade
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   ```

## 🔌 Backend Integration Guide

### 1. Controllers to Create

Create these controllers in `app/Http/Controllers/`:

```php
// Auth Controllers
- Auth/LoginController.php
- Auth/RegisterController.php
- Auth/ForgotPasswordController.php
- Auth/ResetPasswordController.php

// Main Controllers
- HomeController.php
- BookController.php
- QuizController.php
- GuidanceController.php
- ReviewController.php
- ContactController.php
- DashboardController.php
- ProfileController.php

// Admin Controllers
- Admin/DashboardController.php
- Admin/UserController.php
- Admin/BookController.php
- Admin/QuizController.php
- Admin/GuidanceController.php
- Admin/ReviewController.php
- Admin/QueryController.php
- Admin/PaymentController.php
- Admin/ReportController.php
- Admin/SettingController.php
```

### 2. Models to Create

Create these models in `app/Models/`:

```php
- User.php (extend default)
- Book.php
- Category.php
- Quiz.php
- Question.php
- Answer.php
- QuizResult.php
- Tutor.php
- GuidanceSession.php
- Review.php
- Query.php
- Payment.php
- Favorite.php
- Notification.php
```

### 3. Database Migrations

Create migrations for:

```php
// Existing: users table
// Create:
- books table
- categories table
- book_category pivot table
- quizzes table
- questions table
- answers table
- quiz_results table
- tutors table
- guidance_sessions table
- reviews table
- queries table
- payments table
- favorites table
- notifications table
```

### 4. Middleware to Create

```php
- AdminMiddleware.php  // Check if user is admin
- VerifiedMiddleware.php // Check if email is verified
```

### 5. Form Requests

Create form request classes for validation:

```php
- Auth/LoginRequest.php
- Auth/RegisterRequest.php
- Book/StoreBookRequest.php
- Quiz/SubmitQuizRequest.php
- Guidance/BookSessionRequest.php
- Review/StoreReviewRequest.php
- Contact/SendQueryRequest.php
```

## 📋 Page Checklist

### Public Pages
- [x] Landing Page (Hero, Features, Books, Testimonials, CTA)
- [x] Login Page
- [x] Register Page
- [x] Forgot Password Page
- [x] Reset Password Page
- [x] Books Listing Page
- [x] Book Detail Page
- [x] Quiz Listing Page
- [x] Quiz Take Page (with Timer)
- [x] Quiz Result Page
- [x] Guidance Sessions Page
- [x] Book Guidance Session Page
- [x] Reviews Page
- [x] Contact Page

### Protected Pages (Require Auth)
- [x] Student Dashboard
- [ ] Profile Page (to be created)
- [ ] Favorites Page (to be created)
- [ ] Notifications Page (to be created)

### Admin Pages
- [x] Admin Dashboard (with Charts)
- [x] Users Management
- [ ] Books Management (to be created)
- [ ] Quizzes Management (to be created)
- [ ] Guidance Sessions Management (to be created)
- [ ] Reviews Management (to be created)
- [ ] Queries Management (to be created)
- [ ] Payments Management (to be created)
- [ ] Reports Page (to be created)
- [ ] Settings Page (to be created)

## 🎨 Design System

### Colors
- Primary: `#2563eb` (blue-600)
- Secondary: `#c026d3` (purple-600)
- Accent: `#f97316` (orange-500)
- Success: `#10b981` (green-500)
- Warning: `#fbbf24` (yellow-400)
- Danger: `#ef4444` (red-500)

### Typography
- Headings: Poppins
- Body: Inter

### Components
- Buttons: Rounded-lg, with hover effects
- Cards: Rounded-xl, shadow-md, hover:shadow-lg
- Inputs: Rounded-lg, focus:ring-2
- Tables: Striped, hover effects

## 🔗 Named Routes Reference

### Public Routes
| Route Name | URL | Description |
|------------|-----|-------------|
| `home` | `/` | Landing page |
| `login` | `/login` | Login page |
| `register` | `/register` | Registration page |
| `books.index` | `/books` | Books listing |
| `books.show` | `/books/{id}` | Book detail |
| `quiz.index` | `/quiz` | Quiz listing |
| `quiz.take` | `/quiz/{id}/take` | Take quiz |
| `quiz.result` | `/quiz/{id}/result` | Quiz results |
| `guidance.index` | `/guidance` | Guidance sessions |
| `reviews` | `/reviews` | Student reviews |
| `contact` | `/contact` | Contact form |

### Protected Routes
| Route Name | URL | Description |
|------------|-----|-------------|
| `dashboard` | `/dashboard` | Student dashboard |
| `profile` | `/profile` | User profile |
| `favorites` | `/favorites` | Saved books |

### Admin Routes
| Route Name | URL | Description |
|------------|-----|-------------|
| `admin.dashboard` | `/admin` | Admin dashboard |
| `admin.users` | `/admin/users` | Users management |
| `admin.books` | `/admin/books` | Books management |
| `admin.quizzes` | `/admin/quizzes` | Quizzes management |
| `admin.payments` | `/admin/payments` | Payments management |

## 📝 Notes for Backend Developers

### 1. Dummy Data Replacement
All dummy data in the views is marked with `@php` blocks or inline arrays. Replace these with actual database queries:

```php
// Before (Dummy)
@php
$books = [
    ['title' => 'Book 1', ...],
    ['title' => 'Book 2', ...],
];
@endphp

// After (Real Data)
@php
$books = Book::with('category')->paginate(12);
@endphp
```

### 2. Form Actions
All forms have `action` attributes pointing to named routes. Ensure these routes exist and handle the requests:

```blade
<form action="{{ route('login') }}" method="POST">
    @csrf
    <!-- form fields -->
</form>
```

### 3. Authentication Checks
The layouts use `@auth` and `@guest` directives:

```blade
@auth
    <!-- Show user menu -->
@endauth

@guest
    <!-- Show login/register buttons -->
@endguest
```

### 4. Flash Messages
Views expect flash messages for success/error notifications:

```php
return redirect()->route('dashboard')->with('success', 'Message here');
return redirect()->back()->with('error', 'Error message');
```

### 5. Pagination
Book listing and other tables support pagination:

```php
$books = Book::paginate(12);
```

```blade
{{ $books->links() }}
```

## 🧪 Testing Checklist

### Authentication
- [ ] User can register
- [ ] User can login
- [ ] User can logout
- [ ] User can reset password
- [ ] Form validation works
- [ ] CSRF protection works

### Books
- [ ] Books list displays correctly
- [ ] Search functionality works
- [ ] Filters work (subject, grade, type)
- [ ] Book detail page shows correct data
- [ ] Download/Read buttons work

### Quizzes
- [ ] Quiz list displays correctly
- [ ] Quiz timer works
- [ ] Questions display properly
- [ ] Answers are saved
- [ ] Results page shows correct score
- [ ] Progress tracking works

### Guidance Sessions
- [ ] Tutors list displays correctly
- [ ] Booking form works
- [ ] Date/time selection works
- [ ] Payment integration ready

### Admin
- [ ] Admin can login
- [ ] Dashboard shows correct stats
- [ ] Users CRUD works
- [ ] Books CRUD works
- [ ] Charts display correctly

## 📦 Additional Packages to Consider

```bash
# For better pagination views
composer require laravel/ui

# For Excel export
composer require maatwebsite/excel

# For PDF generation
composer require barryvdh/laravel-dompdf

# For image processing
composer require intervention/image

# For notifications
composer require laravel-notification-channels/

# For queue jobs
php artisan queue:table
php artisan migrate
```

## 🛡️ Security Considerations

1. **CSRF Protection**: All forms include `@csrf`
2. **XSS Protection**: Use `{{ }}` for output (escaped)
3. **SQL Injection**: Use Eloquent ORM or query bindings
4. **Authorization**: Use middleware for protected routes
5. **Validation**: Use Form Request classes

## 📞 Support

For questions or issues with the frontend integration, refer to:
- Laravel Documentation: https://laravel.com/docs
- Tailwind CSS Documentation: https://tailwindcss.com/docs
- Blade Templates: https://laravel.com/docs/blade

---

**Note**: This is a frontend-only MVP. All backend logic, database operations, and authentication need to be implemented separately.
