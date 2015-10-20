<?php namespace App\Repos\Post;


interface PostInterface {


    public function find($id);

    public function all();

    public function create($data);

    public function paginate($data);


}