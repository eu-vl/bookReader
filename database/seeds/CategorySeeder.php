<?php

use App\Models\BookReader\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Action',
            'Adventure',
            'Classics',
            'Fantasy',
            'Horror',
            'Literary Fiction',
        ];

        foreach ($categories as $category) {
            $category = new Category([
                'name' => $category,
            ]);
            $category->save();
        }
    }
}
