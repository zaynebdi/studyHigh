@extends('layouts.admin')

@section('title', 'Users Management - studyHigh.pk')

@section('admin-content')
    {{-- Page Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Users</h1>
            <p class="text-gray-600">Manage registered users and their accounts</p>
        </div>
        <div class="flex gap-3">
            <button onclick="exportUsers()" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 transition-colors flex items-center gap-2">
                <i class="fas fa-download"></i>
                <span>Export</span>
            </button>
            <button onclick="openAddUserModal()" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors flex items-center gap-2">
                <i class="fas fa-plus"></i>
                <span>Add User</span>
            </button>
        </div>
    </div>
    
    {{-- Filters --}}
    <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" 
                       placeholder="Search users by name, email, or phone..."
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none">
            </div>
            <div class="flex gap-3">
                <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary-500">
                    <option>All Grades</option>
                    <option>Class 9</option>
                    <option>Class 10</option>
                    <option>Class 11</option>
                    <option>Class 12</option>
                    <option>University</option>
                </select>
                <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary-500">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                    <option>Suspended</option>
                </select>
                <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary-500">
                    <option>All Types</option>
                    <option>Free</option>
                    <option>Premium</option>
                </select>
            </div>
        </div>
    </div>
    
    {{-- Users Table --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-600">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Grade</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Joined</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Last Active</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @php
                        $users = [
                            ['id' => 1, 'name' => 'Ahmed Khan', 'email' => 'ahmed@email.com', 'phone' => '+92 300 1234567', 'grade' => 'Class 10', 'type' => 'premium', 'status' => 'active', 'joined' => 'Jan 15, 2024', 'last_active' => '2 hours ago'],
                            ['id' => 2, 'name' => 'Fatima Ali', 'email' => 'fatima@email.com', 'phone' => '+92 301 2345678', 'grade' => 'Class 12', 'type' => 'premium', 'status' => 'active', 'joined' => 'Jan 20, 2024', 'last_active' => '5 min ago'],
                            ['id' => 3, 'name' => 'Usman Raza', 'email' => 'usman@email.com', 'phone' => '+92 302 3456789', 'grade' => 'Class 11', 'type' => 'free', 'status' => 'active', 'joined' => 'Feb 01, 2024', 'last_active' => '1 day ago'],
                            ['id' => 4, 'name' => 'Sana Malik', 'email' => 'sana@email.com', 'phone' => '+92 303 4567890', 'grade' => 'University', 'type' => 'premium', 'status' => 'inactive', 'joined' => 'Feb 05, 2024', 'last_active' => '1 week ago'],
                            ['id' => 5, 'name' => 'Bilal Ahmed', 'email' => 'bilal@email.com', 'phone' => '+92 304 5678901', 'grade' => 'Class 9', 'type' => 'free', 'status' => 'suspended', 'joined' => 'Feb 10, 2024', 'last_active' => '3 days ago'],
                            ['id' => 6, 'name' => 'Ayesha Tariq', 'email' => 'ayesha@email.com', 'phone' => '+92 305 6789012', 'grade' => 'Class 10', 'type' => 'premium', 'status' => 'active', 'joined' => 'Feb 12, 2024', 'last_active' => '30 min ago'],
                            ['id' => 7, 'name' => 'Omar Farooq', 'email' => 'omar@email.com', 'phone' => '+92 306 7890123', 'grade' => 'Class 12', 'type' => 'free', 'status' => 'active', 'joined' => 'Feb 15, 2024', 'last_active' => '2 hours ago'],
                            ['id' => 8, 'name' => 'Zara Khan', 'email' => 'zara@email.com', 'phone' => '+92 307 8901234', 'grade' => 'University', 'type' => 'premium', 'status' => 'active', 'joined' => 'Feb 18, 2024', 'last_active' => 'Just now'],
                        ];
                    @endphp
                    
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user['name']) }}&background=random" alt="{{ $user['name'] }}" class="w-10 h-10 rounded-full">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $user['name'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $user['email'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $user['grade'] }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full {{ $user['type'] == 'premium' ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ ucfirst($user['type']) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $user['status'] == 'active' ? 'bg-green-100 text-green-700' : ($user['status'] == 'inactive' ? 'bg-gray-100 text-gray-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($user['status']) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $user['joined'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $user['last_active'] }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button onclick="viewUser({{ $user['id'] }})" class="text-blue-600 hover:text-blue-700" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editUser({{ $user['id'] }})" class="text-green-600 hover:text-green-700" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteUser({{ $user['id'] }})" class="text-red-600 hover:text-red-700" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        <div class="px-6 py-4 border-t flex items-center justify-between">
            <p class="text-sm text-gray-600">Showing 1-8 of 12,847 users</p>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-3 py-1 bg-primary-600 text-white rounded-lg">1</button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">2</button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">3</button>
                <span class="text-gray-500">...</span>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">1,606</button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function viewUser(userId) {
        showToast('View user: ' + userId, 'info');
    }
    
    function editUser(userId) {
        showToast('Edit user: ' + userId, 'info');
    }
    
    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            showToast('User deleted successfully', 'success');
        }
    }
    
    function exportUsers() {
        showToast('Exporting users...', 'info');
    }
    
    function openAddUserModal() {
        showToast('Add user modal coming soon!', 'info');
    }
</script>
@endpush
