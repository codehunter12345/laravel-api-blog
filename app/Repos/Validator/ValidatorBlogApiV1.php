<?php namespace App\Repos\Validator;

//use Illuminate\Validation\Validator;
//use App\Http\Requests\Request;
use Illuminate\Support\Facades\Validator;


class ValidatorBlogApiV1 implements ValidatorInterface {



    public function validateUpdate($data)
    {
        $v = Validator::make($data,
            [
            "title" => "required",
            "body"  => "required",
            "id"  => "required",
            "slug"  => "unique:posts",
            ]);

        return $v;

    }



    public function validateAdd($data)
    {
        $v = Validator::make($data,
             [
               "title" => "required",
               "body"  => "required",
               "slug"  => "unique:posts",
             ]);

        return $v;
    }

}