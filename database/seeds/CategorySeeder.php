<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Film','Serie TV','Food', 'Moda', 'Digitale', 'Sport'];
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category);

            $newCategory->save();
        }
    }
}
