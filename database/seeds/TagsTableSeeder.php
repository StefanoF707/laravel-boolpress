<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'HTML',
            'CSS',
            'Javascript',
            'Vue JS',
            'JQuery',
            'PHP',
            'Laravel',
            'mySQL'
        ];

        foreach($tags as $tag) {
            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag, '-');

            $newTag->save();
        }
    }
}
