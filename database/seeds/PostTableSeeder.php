<?php

use Illuminate\Database\Seeder;
use App\Posts;

class PostTableSeeder extends Seeder
{


    public function run()
    {
        DB::table('posts')->delete();

        Posts::create(array(
            'author_id'         => 1,
            'slug'         => 'post1',
            'title'    => 'title of post 1',
            'body'  => 'post 1 body!',
            'active'     => true
        ));
    }
}
