<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Front End', 'Back End', 'Design', 'UX', 'Laravel'];

        foreach ($tags as $tag) {
            // 1 istanza
            $new_tag = new Tag();

            // 2 popolazione colonne
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($tag, '-');

            $new_tag->save();

        }
    }
}
