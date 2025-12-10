@extends('layouts.app')

@section('content')
<div class="px-4 pt-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-4">User Management</h1>

    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col">
        <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="min-w-full divide-y divide-white">
                        <thead class="bg-white">
                            <tr>
                                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Username
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Date Registered
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap">
                                        <div class="font-semibold">{{ $user->username }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                    </td>
                                    <td class="p-4 text-sm font-normal whitespace-nowrap">
                                        @if ($user->is_verified)
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-md">
                                                Verified
                                            </span>
                                        @else
                                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-md">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        {{ $user->created_at->format('d M Y') }}
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center items-center space-x-2">
                                            @if (!$user->is_verified)
                                                <form action="{{ route('users.verify', $user) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-2 focus:outline-none">
                                                        Verify
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <button onclick="openModal('{{ $user->id }}', '{{ $user->username }}')" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 focus:outline-none">
                                                Change Password
                                            </button>

                                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 focus:outline-none">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-sm text-center text-gray-500">
                                        No users found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Password Modal -->
<div id="passwordModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
    <div class="relative w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-white hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeModal()">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900" id="modalTitle">Change Password</h3>
                <form id="passwordForm" class="space-y-6" method="POST" action="">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">New Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Backdrop -->
<div id="modalBackdrop" class="bg-gray-900 bg-opacity-50 fixed inset-0 z-40 hidden"></div>

@push('scripts')
<script>
    function openModal(id, username) {
        document.getElementById('passwordModal').classList.remove('hidden');
        document.getElementById('modalBackdrop').classList.remove('hidden');
        document.getElementById('modalTitle').innerText = 'Change Password: ' + username;
        document.getElementById('passwordForm').action = '/users/' + id + '/password';
    }

    function closeModal() {
        document.getElementById('passwordModal').classList.add('hidden');
        document.getElementById('modalBackdrop').classList.add('hidden');
    }
</script>
@endpush
@endsection
