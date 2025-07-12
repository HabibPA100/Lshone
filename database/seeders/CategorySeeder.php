<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // প্রধান ক্যাটাগরি
        $gift = Category::create(['name' => 'Gift']);

        $men = Category::create(['name' => 'পুরুষ']);
        $women = Category::create(['name' => 'নারী']);
        $kids = Category::create(['name' => 'শিশু']);
        $unisex = Category::create(['name' => 'সাধারণ']);

        // ♂️ পুরুষদের পোশাক
        $menItems = [
            'Panjabi' => 'পাঞ্জাবি',
            'Jubba' => 'জুব্বা',
            'Shirt' => 'শার্ট',
            'T-Shirt' => 'টি-শার্ট',
            'Pants' => 'প্যান্ট',
            'Jeans' => 'জিন্স',
            'Lungi' => 'লুঙ্গি',
            'Pajama' => 'পাজামা',
            'Suit' => 'সুট',
            'Waistcoat' => 'ওয়েস্টকোট',
            'Sweater' => 'সুইটার',
            'Jacket' => 'জ্যাকেট',
            'Blazer' => 'ব্লেজার',
            'Undershirt' => 'গেঞ্জি',
            'Underwear' => 'জাঙ্গিয়া',
        ];
        foreach ($menItems as $en => $bn) {
            Category::create(['name' => $bn, 'parent_id' => $men->id]);
        }

        // ♀️ নারীদের পোশাক
        $womenItems = [
            'Saree' => 'শাড়ি',
            'Salwar Kameez' => 'সালওয়ার কামিজ',
            'Kurti' => 'কুর্তি',
            'Leggings' => 'লেগিংস',
            'Blouse' => 'ব্লাউজ',
            'Dupatta' => 'দুপাত্তা',
            'Hijab' => 'হিজাব',
            'Abaya' => 'আবায়া',
            'Burkha' => 'বোরখা',
            'Gown' => 'গাউন',
            'Lehenga' => 'লেহেঙ্গা',
            'Skirt' => 'স্কার্ট',
            'Top' => 'টপ',
            'Nighty' => 'নাইটি',
            'Bra' => 'ব্রা',
            'Panty' => 'প্যান্টি',
            'Camisole' => 'ক্যামিসোল',
        ];
        foreach ($womenItems as $en => $bn) {
            Category::create(['name' => $bn, 'parent_id' => $women->id]);
        }

        // 🧥 সাধারণ ব্যবহার (unisex)
        $unisexItems = [
            'Cap' => 'টুপি',
            'Scarf' => 'স্কার্ফ',
            'Shoes' => 'জুতা',
            'Sandal' => 'স্যান্ডেল',
            'Slippers' => 'স্লিপার',
            'Socks' => 'মোজা',
            'Raincoat' => 'রেইনকোট',
            'Umbrella' => 'ছাতা (অ্যাকসেসরিজ)',
        ];
        foreach ($unisexItems as $en => $bn) {
            Category::create(['name' => $bn, 'parent_id' => $unisex->id]);
        }

        // 👶 শিশুদের পোশাক
        $kidsItems = [
            'Baby Frock' => 'শিশুদের ফ্রক',
            'Baby Pajama' => 'শিশুদের পায়জামা',
            'Baby Shirt' => 'শিশুদের শার্ট',
            'Baby Shoes' => 'শিশুদের জুতা',
        ];
        foreach ($kidsItems as $en => $bn) {
            Category::create(['name' => $bn, 'parent_id' => $kids->id]);
        }
    }
}
