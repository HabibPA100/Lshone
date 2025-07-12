<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
  <div class="max-w-md w-full bg-white p-8 rounded shadow">
    <a href="{{ url('/') }}" class="p-2 bg-purple-400 rounder rounded-lg border-spacing-2 hover:bg-gray-600">Home</a>
    <h2 class="text-2xl font-bold mb-6 text-center">User Login</h2>

    @if(session()->has('success'))
      <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    @if(session()->has('error'))
      <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
        {{ session('error') }}
      </div>
    @endif

    <form wire:submit.prevent="login">
      <div class="mb-4">
        <label for="email" class="block text-gray-700 mb-1">Email Address</label>
        <input type="email" id="email" wire:model.defer="email" required
          autocomplete="email"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="mb-6">
        <label for="password" class="block text-gray-700 mb-1">Password</label>
        <input type="password" id="password" wire:model.defer="password" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-200">
        Login
      </button>
    </form>
    
    <p class="mt-4 text-center text-gray-600">
      Don't have an account? <a href="{{ route('buyer') }}" class="text-blue-600 hover:underline">ক্রেতা</a>
    </p>
    <p class="mt-4 text-center text-gray-600">
      Don't have an account? <a href="{{ route('seller') }}" class="text-blue-600 hover:underline">বিক্রেতা</a>
    </p>
  </div>
</div>
