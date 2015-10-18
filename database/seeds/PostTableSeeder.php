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
            'title'    => 'post 1 title ',
            'body'  => 'post 1 body!',
            'active'     => true
        ));

        Posts::create(array(
            'author_id'         => 1,
            'slug'         => 'post2',
            'title'    => 'post 2 title',
            'body'  => 'post 2 body!',
            'active'     => true
        ));
        Posts::create(array(
            'author_id'         => 1,
            'slug'         => 'post3',
            'title'    => 'post 3 title ',
            'body'  => 'post 3 body!',
            'active'     => true
        ));

        Posts::create(array(
            'author_id'         => 1,
            'slug'         => 'post4',
            'title'    => 'post 4 title',
            'body'  => 'post 4 body!',
            'active'     => true
        ));
        Posts::create(array(
            'author_id'         => 1,
            'slug'         => 'post5',
            'title'    => 'post 5 title ',
            'body'  => 'post 5 body!',
            'active'     => true
        ));

        Posts::create(array(
            'author_id'         => 1,
            'slug'         => 'post6',
            'title'    => 'post 6 title',
            'body'  => 'post 6 body!',
            'active'     => true
        ));

    }
}
