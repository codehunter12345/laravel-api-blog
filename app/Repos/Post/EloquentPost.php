<?php namespace App\Repos\Post;

use App\Posts;
use Illuminate\Pagination\Paginator;

class EloquentPost implements PostInterface {

    protected $post;

    public function __construct(Posts $posts)
    {
        $this->post = $posts;
    }


    public function find($id)
    {
        return $this->post->find($id);
    }


    public function all()
    {
        return $this->post->all();
    }


    public function create($data)
    {
        return $this->post->create($data);
    }


    public function paginate($data)
    {
        return $this->post->paginate($data);
    }

}