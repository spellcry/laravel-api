<?php

use App\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoryIds = Category::all()->pluck('id');
        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->title = $faker->words( rand(5, 10), true);
            $post->content = $faker->paragraphs( rand(10, 20), true);
            $post->slug = str_replace(' ', '-', $post->title);
            $post->category_id = $faker->optional()->randomElement($categoryIds);

            $post->save();
        }
    }
}
