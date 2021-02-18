<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();

        foreach ($posts as $post) {

            for($i = 0; $i < 4; $i++) {
                $comment = new Comment();

                $comment->post_id = $post->id;
                $comment->person = $faker->name();
                $comment->text = $faker->text(500);

                $comment->save();
            }
        }
    }
}
