<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    // looppare sull'array, creare un'istanza per ogni elemento e salvare nella tabella record
    {
        $categories = ['HTML', 'CSS', 'PHP', 'Java Script'];

        foreach ($categories as $category) 
        {
            //1 
            $new_category = new Category();

            //2 
            $new_category->name = $category;
            $new_category->slug = Str::slug($category, '-');

            //3
            $new_category->save();
        }
    }
}
