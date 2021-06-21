<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++) 
        {
            $new_post = new Post();

            $new_post->title = 'Post title ' . ($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, est, dolores atque autem doloribus repudiandae nulla sit veritatis, sapiente ut numquam aspernatur minus sed. Pariatur cum ratione repellat ipsum totam.';

            $new_post->save();
        }
    }
}

