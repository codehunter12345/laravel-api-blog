<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends UuidModel {

    protected $primaryKey = "id";

	protected $table = 'posts';

    public $fillable = ['title','body','slug','active','author_id'];


}
