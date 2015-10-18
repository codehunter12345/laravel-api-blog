<?php namespace App\Http\Controllers\Api\V1\Blog;

use App\Http\Controllers\Api\ApiController;
use App\Posts;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;

class blogController extends ApiController {

    public function index(){

        $posts = Posts::all();

        return response()->json([
            "data"=> $posts->toArray(),
            "massage"=>"data successfully retrieved from database!"
        ],200);

    }


    public function show(){

        if(array_key_exists("uuids",Input::all())){

            $uuids = Input::all()['uuids'];

        }else{

            return $this->respondBadRequest("Syntax error!");
        }

        $posts = Posts::find($uuids);

        if(!($posts->toArray())){
            return $this->respondNotFound("uuid Not Found!");
        }

        return response()->json([
            'data'=> $posts->toArray()
        ],200);

    }



    public function add()
    {

        $rules = [
            "title" => "required|unique:posts",
            "body"  => "required",
            "slug"  => "unique:posts",
        ];


        if(!array_key_exists("data",Input::all())){
            return $this->respondBadRequest("Syntax error! 'data' attribute not found.");
        }

        $datas = Input::all()['data'];

        if(!$datas){
            return $this->respondBadRequest("Syntax error! OR No data");
        }


        $notAdded_data=[];
        $i = 0;

        foreach ($datas as $data) {

            $i++;

            $validator = Validator::make($data, $rules);

            if (!$validator->passes()) {
                $notAdded_data['data'.$i]=$data;
                $notAdded_data["error".$i]=$validator->errors()->all();
            }else{
                Posts::create(clean($data));
            }

        }

        return $this->respondAdded($notAdded_data);
    }




    public function delete(){

        if(!array_key_exists("uuids",Input::all())) {
            return $this->respondBadRequest("Syntax error! OR 'uuid' attribute not found.");
        }

        $uuids = Input::all()['uuids'];
        $posts = Posts::find($uuids);
//        dd($posts);
        if(!($posts->toArray())){
            return $this->respondNotFound("Provided uuid Not found in database!");
        }

        $deleted_uuid=[];
        $notDeleted_uuid=[];

        foreach ($uuids as $uuid) {

            if(DB::table('posts')->where('id',$uuid)->delete()){
                $deleted_uuid[]=$uuid;
            }else{
                $notDeleted_uuid[]=$uuid;
            }
        }

        return $this->respondDeleted($deleted_uuid,$notDeleted_uuid);

    }


    public function update()
    {

        $rules = [
            'title' => 'required|unique:posts,id',
            "body"  => "required",
            "id"  => "required",
        ];

        $datas = Input::all();


        if(!array_key_exists("data",$datas)) {
            return $this->respondBadRequest("Syntax error! OR 'uuid' attribute not found.");
        }

        $datas = $datas['data'];

        if(!$datas){
            return $this->respondNotFound("No Data Recieved!");
        }

        $notUpdated_rows=[];
        $updated_rows=[];

        foreach ($datas as $data) {

            $validator = Validator::make($data, $rules);

            if (!$validator->passes()) {
                return $this->respondInvalid($validator->errors()->all());
            }


            if(!DB::table('posts')->where('id', $data['id'])->update($data)){
                $notUpdated_rows[]=$data['title'];
            }else{
                $updated_rows[]= $data['title'];
            }

            }
        return $this->respondUpdated($updated_rows,$notUpdated_rows);

        }

}