<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $hot = Category::where('name', 'Coffee Hot')->first();
        $iced = Category::where('name', 'Coffee Iced')->first();
        $non = Category::where('name', 'Non Coffee')->first();
        $tea = Category::where('name', 'Tea')->first();
        $milk = Category::where('name', 'Milk Based')->first();
        $snack = Category::where('name', 'Snack')->first();
        $dessert = Category::where('name', 'Dessert')->first();

        // Coffee Hot
        Product::insert([
            [
                'category_id' => $hot->id,
                'name' => 'Caffè Latte',
                'description' => 'Espresso dengan steamed milk creamy.',
                'price' => 20000,
                'image' => 'images/menu/latte.jpg'
            ],
            [
                'category_id' => $hot->id,
                'name' => 'Cappuccino',
                'description' => 'Espresso, steamed milk, dan foam lembut.',
                'price' => 22000,
                'image' => 'images/menu/cappuccino.jpg'
            ],
            [
                'category_id' => $hot->id,
                'name' => 'Americano Hot',
                'description' => 'Espresso dengan air panas, rasa kuat.',
                'price' => 18000,
                'image' => 'images/menu/americano-hot.jpg'
            ],
            [
                'category_id' => $hot->id,
                'name' => 'Caramel Macchiato',
                'description' => 'Espresso, susu, dan sirup caramel premium.',
                'price' => 26000,
                'image' => 'images/menu/caramel-macchiato.jpg'
            ],
        ]);

        // Coffee Iced
        Product::insert([
            [
                'category_id' => $iced->id,
                'name' => 'Iced Americano',
                'description' => 'Espresso dengan es batu, segar & strong.',
                'price' => 18000,
                'image' => 'images/menu/iced-americano.jpg'
            ],
            [
                'category_id' => $iced->id,
                'name' => 'Iced Latte',
                'description' => 'Milk base dengan espresso, creamy dingin.',
                'price' => 22000,
                'image' => 'images/menu/iced-latte.jpg'
            ],
            [
                'category_id' => $iced->id,
                'name' => 'Kopi Susu Gula Aren',
                'description' => 'Signature coffee dengan gula aren asli.',
                'price' => 23000,
                'image' => 'images/menu/gula-aren.jpg'
            ],
            [
                'category_id' => $iced->id,
                'name' => 'Iced Caramel Latte',
                'description' => 'Caramel creamy dengan espresso.',
                'price' => 26000,
                'image' => 'images/menu/iced-caramel.jpg'
            ],
        ]);

        // Non Coffee
        Product::insert([
            [
                'category_id' => $non->id,
                'name' => 'Red Velvet Latte',
                'description' => 'Minuman creamy dengan rasa red velvet.',
                'price' => 22000,
                'image' => 'images/menu/red-velvet.jpg'
            ],
            [
                'category_id' => $non->id,
                'name' => 'Matcha Latte',
                'description' => 'Premium matcha Jepang dengan susu.',
                'price' => 24000,
                'image' => 'images/menu/matcha.jpg'
            ],
            [
                'category_id' => $non->id,
                'name' => 'Chocolate Classic',
                'description' => 'Coklat premium manis & creamy.',
                'price' => 23000,
                'image' => 'images/menu/chocolate.jpg'
            ],
        ]);

        // Tea
        Product::insert([
            [
                'category_id' => $tea->id,
                'name' => 'Lemon Tea',
                'description' => 'Teh dengan lemon segar.',
                'price' => 15000,
                'image' => 'images/menu/lemon-tea.jpg'
            ],
            [
                'category_id' => $tea->id,
                'name' => 'Lychee Tea',
                'description' => 'Teh manis dengan buah leci.',
                'price' => 17000,
                'image' => 'images/menu/lychee-tea.jpg'
            ],
            [
                'category_id' => $tea->id,
                'name' => 'Peach Tea',
                'description' => 'Teh buah peach dengan aroma segar.',
                'price' => 17000,
                'image' => 'images/menu/peach-tea.jpg'
            ],
        ]);

        // Milk Based
        Product::insert([
            [
                'category_id' => $milk->id,
                'name' => 'Strawberry Milk',
                'description' => 'Susu segar dengan strawberry asli.',
                'price' => 21000,
                'image' => 'images/menu/strawberry-milk.jpg'
            ],
            [
                'category_id' => $milk->id,
                'name' => 'Brown Sugar Milk',
                'description' => 'Susu segar dengan brown sugar premium.',
                'price' => 23000,
                'image' => 'images/menu/brown-sugar-milk.jpg'
            ],
        ]);

        // Snack
        Product::insert([
            [
                'category_id' => $snack->id,
                'name' => 'French Fries',
                'description' => 'Kentang goreng renyah.',
                'price' => 15000,
                'image' => 'images/menu/fries.jpg'
            ],
            [
                'category_id' => $snack->id,
                'name' => 'Chicken Popcorn',
                'description' => 'Ayam crispy potongan kecil.',
                'price' => 18000,
                'image' => 'images/menu/chicken-popcorn.jpg'
            ],
            [
                'category_id' => $snack->id,
                'name' => 'Cireng Crispy',
                'description' => 'Cireng isi bumbu pedas.',
                'price' => 12000,
                'image' => 'images/menu/cireng.jpg'
            ],
        ]);

        // Dessert
        Product::insert([
            [
                'category_id' => $dessert->id,
                'name' => 'Brownies',
                'description' => 'Brownies coklat premium homemade.',
                'price' => 10000,
                'image' => 'images/menu/brownies.jpg'
            ],
            [
                'category_id' => $dessert->id,
                'name' => 'Cheesecake',
                'description' => 'Cheesecake lembut dan creamy.',
                'price' => 18000,
                'image' => 'images/menu/cheesecake.jpg'
            ],
        ]);
    }
}
