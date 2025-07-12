@if(auth('admin')->check())
    @php
        $notifications = $notifications ?? auth('admin')->user()->notifications;
        $unread = $notifications->whereNull('read_at');
    @endphp

    <div class="relative inline-block text-left" x-data="{ open: false }" @click.away="open = false">
        {{-- Bell Icon --}}
        <button @click="open = !open" class="relative text-gray-600 hover:text-blue-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405C18.21 14.79 18 13.9 18 13V9a6 6 0 10-12 0v4c0 .9-.21 1.79-.595 2.595L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            @if($unread->count() > 0)
                <span class="absolute top-0 right-0 h-4 w-4 rounded-full bg-red-600 text-white text-xs flex items-center justify-center">
                    {{ $unread->count() }}
                </span>
            @endif
        </button>

        {{-- Notification Dropdown --}}
        <div x-show="open" x-transition class="absolute right-0 mt-2 w-96 bg-white shadow-xl rounded-md z-50">
            <div class="px-4 py-2 border-b">
                <h3 class="text-sm font-semibold text-gray-700">নোটিফিকেশন তালিকা</h3>
            </div>
            <div class="max-h-80 overflow-y-auto divide-y">
                @forelse ($notifications as $notification)
                    <a href="{{ route('admin.notification.details', $notification->id) }}"
                    class="block p-4 hover:bg-gray-50">
                        <div class="text-sm font-medium text-gray-800">
                            {{ $notification->data['message'] ?? 'নতুন নোটিফিকেশন' }}
                        </div>
                        <div class="text-xs text-gray-500">
                            মোট: {{ $notification->data['total'] ?? '-' }} টাকা •
                            {{ $notification->created_at->diffForHumans() }}
                        </div>
                    </a>
                @empty
                    <div class="p-4 text-center text-gray-400 text-sm">
                        কোনো নোটিফিকেশন নেই।
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endif
