<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            $post = new Post();

            $post->title = $faker->sentence(3);
            $post->body = $faker->text(900);
            $post->author = $faker->name();

            $post->save();
        }

    }
}
