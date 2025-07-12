<footer class="bg-gray-900 text-white my-16">
    <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

            <!-- Logo & About -->
            <div>
                <h2 class="text-3xl font-bold text-white mb-4">Live Shope</h2>
                <p class="text-gray-400 text-sm">"মানুষের জীবনে ইতিবাচক পরিবর্তনের সহযাত্রী হয়ে, আমরা এগিয়ে যেতে চাই উন্নয়নের আলোকিত পথে।"</p>
            </div>

            <!-- Navigation Links -->
            <div>
                <h3 class="text-xl font-semibold mb-3">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-white transition-all duration-300">Home</a></li>
                    <li><a href="{{ route('about.us') }}" class="text-gray-400 hover:text-white transition-all duration-300">About Us</a></li>
                    <li><a href="{{ route('service') }}" class="text-gray-400 hover:text-white transition-all duration-300">Services</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-all duration-300">Contact</a></li>
                    <li><a href="{{ route('terms.condition') }}" class="text-gray-400 hover:text-white transition-all duration-300">Terms and condition</a></li>
                    <li><a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white transition-all duration-300">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-xl font-semibold mb-3">Contact Us</h3>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li>Email: info@onelife.com</li>
                    <li>Phone: +880 123 456 789</li>
                    <li>Address: Dhaka, Bangladesh</li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <p>Best Luck For You My Dear</p>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-700 mt-10 pt-6 text-center text-sm text-gray-500">
            &copy; 2025 Live Shope. All rights reserved.
        </div>
    </div>
</footer>
