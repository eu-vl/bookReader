<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 10)->create()
            ->each(function ($user) {
                factory(App\Models\BookReader\Book::class, rand(1, 6))->create(
                    [
                        'user_id' => $user->id
                    ]
                )
                    ->each(function ($book) {
                        $category_ids = range(1, 6);
                        shuffle($category_ids);
                        $assignments = array_slice($category_ids, 0, rand(0, 6));
                        foreach ($assignments as $category_id) {
                            DB::table('book_category')
                                ->insert([
                                    'book_id' => $book->id,
                                    'category_id' => $category_id,
                                    'created_at' => Now(),
                                    'updated_at' => Now(),
                                ]);
                        }
                    });
            });
    }
}
