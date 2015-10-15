<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends UuidModel {

	protected $table = 'posts';

    public $fillable = ['title','body','slug','active','author_id'];


}
