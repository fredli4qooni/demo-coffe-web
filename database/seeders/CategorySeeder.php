<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Coffee Hot',
            'Coffee Iced',
            'Non Coffee',
            'Tea',
            'Milk Based',
            'Snack',
            'Dessert',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
