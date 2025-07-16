@extends('frontend.layouts.master')

@section('title', 'About Us')

@section('content')
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-white mb-4">আমাদের সম্পর্কে</h1>
                <p class="text-lg text-gray-600 mb-8">Live Shope - একটি বিশ্বস্ত অনলাইন মার্কেটপ্লেস যেখানে আপনি নিরাপদে এবং সহজে যে কোনো প্রোডাক্ট বেচা কেনা করতে পারবেন।</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <img src="{{ asset('frontend/images/logo/logo.png') }}" alt="About Live Shope" class="rounded-lg shadow-md">
                </div>
                <div class="text-lg">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">আমাদের লক্ষ্য ও উদ্দেশ্য</h2>
                    <p class="text-gray-700 mb-4">
                        Live Shope একটি এমন প্ল্যাটফর্ম যেখানে বিক্রেতা ও ক্রেতারা সহজেই একে অপরের সঙ্গে যুক্ত হতে পারে। আমরা বিশ্বাস করি, ডিজিটাল মার্কেটপ্লেসের ভবিষ্যৎ আরও নিরাপদ, স্বচ্ছ এবং প্রযুক্তি নির্ভর হতে হবে। আমাদের উদ্দেশ্য হচ্ছে প্রত্যেকের জন্য একটি নিরাপদ ও স্বস্তিদায়ক কেনাকাটার অভিজ্ঞতা তৈরি করা।
                    </p>
                    <p class="text-gray-700">
                        আমাদের লক্ষ্য হচ্ছে সারা দেশে হাজারো ছোট-বড় ব্যবসায়ীকে একটি সহজ অনলাইন মার্কেটিং সলিউশন প্রদান করা, যাতে তারা তাদের প্রোডাক্টগুলো একটি বড় কাস্টমার বেসের কাছে উপস্থাপন করতে পারে।
                    </p>
                </div>
            </div>

            <div class="mt-16 text-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">আমাদের বিশেষত্ব</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">নিরাপদ ট্রান্সাকশন</h3>
                        <p class="text-gray-600">আমরা নিশ্চিত করি আপনার প্রতিটি লেনদেন হোক সম্পূর্ণ নিরাপদ ও ঝুঁকিমুক্ত।</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">সহজ ইন্টারফেস</h3>
                        <p class="text-gray-600">ব্যবহারকারী বান্ধব ইন্টারফেস যা সকল বয়সের মানুষ সহজে ব্যবহার করতে পারবেন।</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">দ্রুত সাপোর্ট</h3>
                        <p class="text-gray-600">২৪/৭ কাস্টমার সাপোর্ট আমাদের অন্যতম শক্তিশালী দিক।</p>
                    </div>
                </div>
            </div>

            <div class="mt-20 text-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">আমাদের গল্প</h2>
                <p class="text-gray-700 mb-4">
                    Live Shope এর যাত্রা শুরু হয় ২০২৫ সালে, একটি সম্পূর্ণ নতুন উদ্যোগ হিসেবে। এর আগে আমাদের কোন অনলাইন শপ বা ব্যবসায়িক কার্যক্রম ছিল না। এটি আমাদের প্রথম ও একমাত্র সেবা, যা আমরা গড়ে তুলেছি সাধারণ মানুষের দৈনন্দিন জীবনকে আরও সহজ, দ্রুত এবং আধুনিক করতে।
                </p>
                <p class="text-gray-700 mb-4">
                    এই স্বপ্নের শুরু হয়েছিল তিনজন বন্ধুর একসাথে বসে ভবিষ্যৎ নিয়ে ভাবার সময়। আমরা — <strong>আঃ আজিম</strong>, <strong>আমিনুল ইসলাম</strong>, এবং <strong>হাবিব পিএ</strong> — বিশ্বাস করি, প্রযুক্তি সবার জীবন পরিবর্তন করতে পারে যদি সেটা সহজভাবে সবার কাছে পৌঁছায়। এই বিশ্বাস থেকেই জন্ম নেয় Live Shope।
                </p>
                <p class="text-gray-700 mb-4">
                    আধুনিক প্রযুক্তির সর্বোচ্চ ব্যবহার করে আমরা একটি এমন অনলাইন মার্কেটপ্লেস তৈরি করেছি যেখানে যে কেউ, যে কোনো সময়, নিরাপদে প্রোডাক্ট বেচা কেনা করতে পারে। আমাদের প্ল্যাটফর্মের মাধ্যমে গ্রাম বা শহর, সব স্থান থেকেই সহজে প্রোডাক্ট আপলোড, অর্ডার ও লেনদেন সম্পন্ন করা যায়।
                </p>
                <p class="text-gray-700">
                    যদিও আমাদের যাত্রা খুব সাম্প্রতিক, আমরা প্রতিনিয়ত চেষ্টা করছি প্রতিটি ব্যবহারকারীর অভিজ্ঞতা উন্নত করতে এবং একটি বিশ্বাসযোগ্য ডিজিটাল কমিউনিটি গড়ে তুলতে। Live Shope শুধুই একটি অনলাইন দোকান নয়—এটি একটি নতুন সময়ের প্রতিশ্রুতি, যেখানে প্রযুক্তি সবার জন্য।
                </p>
            </div>

            <div class="mt-16 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">যোগাযোগ করুন</h2>
                <p class="text-gray-600">আপনার যেকোনো প্রশ্ন বা সহযোগিতার জন্য আমাদের সাথে যোগাযোগ করুন।</p>
                <p class="text-gray-600 mt-2">📧 ইমেইল: mslabdulazim2025@gmail.com</p>
                <p class="text-gray-600">📞 ফোন: +880 1403022986</p>
            </div>
        </div>
    </div>
@endsection
