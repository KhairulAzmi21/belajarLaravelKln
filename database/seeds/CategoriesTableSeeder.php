<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'World',
            'Malaysia',
            'Technology',
            'Design',
            'Culture',
            'Business',
            'Politics',
            'Opinion',
            'Science',
            'Health',
            'Style',
            'Travel',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name'  => $category
            ]);
        }
    }
}
