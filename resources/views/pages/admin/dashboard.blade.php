@extends('layouts.admin')

@section('title', 'Admin Dashboard - studyHigh.pk')

@section('admin-content')
    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-600">Welcome back! Here's what's happening today.</p>
    </div>
    
    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        @php
            $stats = [
                ['label' => 'Total Users', 'value' => '12,847', 'change' => '+12%', 'icon' => 'fa-users', 'color' => 'blue'],
                ['label' => 'Total Books', 'value' => '3,456', 'change' => '+5%', 'icon' => 'fa-book', 'color' => 'green'],
                ['label' => 'Quizzes Taken', 'value' => '45,231', 'change' => '+18%', 'icon' => 'fa-clipboard-check', 'color' => 'purple'],
                ['label' => 'Revenue', 'value' => 'Rs. 1.2M', 'change' => '+23%', 'icon' => 'fa-rupee-sign', 'color' => 'orange'],
            ];
        @endphp
        
        @foreach($stats as $stat)
            <div class="stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-{{ $stat['color'] }}-100 rounded-xl flex items-center justify-center">
                        <i class="fas {{ $stat['icon'] }} text-{{ $stat['color'] }}-600 text-xl"></i>
                    </div>
                    <span class="text-green-600 text-sm font-medium flex items-center gap-1">
                        <i class="fas fa-arrow-up text-xs"></i>
                        {{ $stat['change'] }}
                    </span>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $stat['value'] }}</p>
                <p class="text-gray-500 text-sm">{{ $stat['label'] }}</p>
            </div>
        @endforeach
    </div>
    
    {{-- Charts Row --}}
    <div class="grid lg:grid-cols-2 gap-6 mb-8">
        {{-- Revenue Chart --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-900">Revenue Overview</h3>
                <select class="text-sm border border-gray-300 rounded-lg px-3 py-1">
                    <option>This Month</option>
                    <option>Last Month</option>
                    <option>This Year</option>
                </select>
            </div>
            <canvas id="revenueChart" height="200"></canvas>
        </div>
        
        {{-- User Growth Chart --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-900">User Growth</h3>
                <select class="text-sm border border-gray-300 rounded-lg px-3 py-1">
                    <option>This Month</option>
                    <option>Last Month</option>
                    <option>This Year</option>
                </select>
            </div>
            <canvas id="userChart" height="200"></canvas>
        </div>
    </div>
    
    {{-- Second Row --}}
    <div class="grid lg:grid-cols-3 gap-6 mb-8">
        {{-- Popular Books --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-900">Popular Books</h3>
                <a href="{{ route('admin.books') }}" class="text-primary-600 text-sm">View All</a>
            </div>
            <div class="space-y-4">
                @php
                    $popularBooks = [
                        ['title' => 'Mathematics for Class 10', 'downloads' => 2340, 'trend' => 'up'],
                        ['title' => 'English Grammar Guide', 'downloads' => 1980, 'trend' => 'up'],
                        ['title' => 'Physics Fundamentals', 'downloads' => 1560, 'trend' => 'down'],
                        ['title' => 'Chemistry Made Easy', 'downloads' => 1230, 'trend' => 'up'],
                        ['title' => 'Past Papers Collection', 'downloads' => 3450, 'trend' => 'up'],
                    ];
                @endphp
                
                @foreach($popularBooks as $book)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-sm font-medium text-gray-600">
                                {{ $loop->iteration }}
                            </div>
                            <p class="text-sm text-gray-700 truncate max-w-[150px]">{{ $book['title'] }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-500">{{ number_format($book['downloads']) }}</span>
                            <i class="fas fa-arrow-{{ $book['trend'] }} text-{{ $book['trend'] == 'up' ? 'green' : 'red' }}-500 text-xs"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        {{-- Recent Users --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-900">Recent Users</h3>
                <a href="{{ route('admin.users') }}" class="text-primary-600 text-sm">View All</a>
            </div>
            <div class="space-y-4">
                @php
                    $recentUsers = [
                        ['name' => 'Ahmed Khan', 'email' => 'ahmed@email.com', 'joined' => '2 min ago'],
                        ['name' => 'Fatima Ali', 'email' => 'fatima@email.com', 'joined' => '15 min ago'],
                        ['name' => 'Usman Raza', 'email' => 'usman@email.com', 'joined' => '1 hour ago'],
                        ['name' => 'Sana Malik', 'email' => 'sana@email.com', 'joined' => '2 hours ago'],
                        ['name' => 'Bilal Ahmed', 'email' => 'bilal@email.com', 'joined' => '3 hours ago'],
                    ];
                @endphp
                
                @foreach($recentUsers as $user)
                    <div class="flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user['name']) }}&background=random" alt="{{ $user['name'] }}" class="w-10 h-10 rounded-full">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $user['name'] }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ $user['email'] }}</p>
                        </div>
                        <span class="text-xs text-gray-400">{{ $user['joined'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        
        {{-- Recent Queries --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-900">Recent Queries</h3>
                <a href="{{ route('admin.queries') }}" class="text-primary-600 text-sm">View All</a>
            </div>
            <div class="space-y-4">
                @php
                    $queries = [
                        ['subject' => 'Password Reset Issue', 'user' => 'Ahmed K.', 'status' => 'pending', 'time' => '10 min ago'],
                        ['subject' => 'Book Download Problem', 'user' => 'Fatima A.', 'status' => 'resolved', 'time' => '1 hour ago'],
                        ['subject' => 'Payment Failed', 'user' => 'Usman R.', 'status' => 'in-progress', 'time' => '2 hours ago'],
                        ['subject' => 'Quiz Score Not Saved', 'user' => 'Sana M.', 'status' => 'pending', 'time' => '3 hours ago'],
                        ['subject' => 'Account Verification', 'user' => 'Bilal A.', 'status' => 'resolved', 'time' => '5 hours ago'],
                    ];
                    
                    $statusColors = [
                        'pending' => 'yellow',
                        'in-progress' => 'blue',
                        'resolved' => 'green',
                    ];
                @endphp
                
                @foreach($queries as $query)
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-2 bg-{{ $statusColors[$query['status']] }}-500 rounded-full mt-2"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $query['subject'] }}</p>
                            <p class="text-xs text-gray-500">{{ $query['user'] }} • {{ $query['time'] }}</p>
                        </div>
                        <span class="text-xs px-2 py-1 bg-{{ $statusColors[$query['status']] }}-100 text-{{ $statusColors[$query['status']] }}-700 rounded">{{ ucfirst($query['status']) }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    {{-- Recent Orders Table --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b flex items-center justify-between">
            <h3 class="font-bold text-gray-900">Recent Transactions</h3>
            <a href="{{ route('admin.payments') }}" class="text-primary-600 text-sm">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @php
                        $transactions = [
                            ['id' => '#ORD-001', 'user' => 'Ahmed Khan', 'type' => 'Guidance Session', 'amount' => 1500, 'status' => 'completed', 'date' => 'Feb 22, 2024'],
                            ['id' => '#ORD-002', 'user' => 'Fatima Ali', 'type' => 'Premium Package', 'amount' => 6750, 'status' => 'completed', 'date' => 'Feb 22, 2024'],
                            ['id' => '#ORD-003', 'user' => 'Usman Raza', 'type' => 'Guidance Session', 'amount' => 1800, 'status' => 'pending', 'date' => 'Feb 21, 2024'],
                            ['id' => '#ORD-004', 'user' => 'Sana Malik', 'type' => 'Premium Package', 'amount' => 12000, 'status' => 'completed', 'date' => 'Feb 21, 2024'],
                            ['id' => '#ORD-005', 'user' => 'Bilal Ahmed', 'type' => 'Guidance Session', 'amount' => 1500, 'status' => 'failed', 'date' => 'Feb 20, 2024'],
                        ];
                    @endphp
                    
                    @foreach($transactions as $transaction)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $transaction['id'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $transaction['user'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $transaction['type'] }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">Rs. {{ number_format($transaction['amount']) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $transaction['status'] == 'completed' ? 'bg-green-100 text-green-700' : ($transaction['status'] == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($transaction['status']) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $transaction['date'] }}</td>
                            <td class="px-6 py-4">
                                <button class="text-primary-600 hover:text-primary-700 text-sm">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Revenue',
                data: [250000, 320000, 280000, 450000],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rs. ' + (value / 1000) + 'K';
                        }
                    }
                }
            }
        }
    });
    
    // User Growth Chart
    const userCtx = document.getElementById('userChart').getContext('2d');
    new Chart(userCtx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'New Users',
                data: [45, 52, 38, 65, 48, 72, 58],
                backgroundColor: '#7c3aed',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
