<?php namespace App\Http\Controllers\Api\V1\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Input;
use App\Repos\Post\PostInterface as Post;
use App\Repos\Response\ResponseInterface as Response;
use App\Repos\Validator\ValidatorInterface as Validator;


class blogController extends Controller
{

    protected $posts;

    protected $response;

    protected $request;

    protected $validator;


    public function __construct(
        Post $post,
        Response $response,
        Request $request,
        Validator $validator
    ){
        $this->posts = $post;
        $this->response = $response;
        $this->request = $request;
        $this->validator = $validator;
        $this->middleware('htmlPurify');
    }


    public function index()
    {
        $limit = Input::get('limit') ? : 3;

        $posts = $this->posts->paginate($limit);

        return $this->response->respondOk($posts->toArray());
    }


    public function show()
    {
        $input = $this->request->all();

        if(!array_key_exists("uuids", $input)) {
            return $this->response->respondBadRequest();
        }


        $uuids = $input['uuids'];

        $posts = $this->posts->find($uuids)->toArray();


        if(!$posts) {
            return $this->response->respondNotFound();
        }

        return $this->response->respondOk($posts);

    }



    public function add()
    {
        $datas = $this->request->all();


        if(!array_key_exists("data", $datas)) {
            return $this->response->respondBadRequest();
        }

        $datas = $datas['data'];

        if(!$datas) {
            return $this->response->respondNotFound();
        }


        $notAdded_data = [];
        $i = 0;

        foreach ($datas as $data) {

            $i++;

            $validator = $this->validator->validateAdd($data);

            if (!$validator->passes()) {
                $notAdded_data['data'.$i]=$data;
                $notAdded_data["error".$i]=$validator->errors()->all();
            } else {
                $this->posts->create($data);
            }

         }

        return $this->response->respondAdded($notAdded_data);
    }




    public function delete(){

        $input = $this->request->all();

        if(!array_key_exists("uuids", $input)) {
            return $this->response->respondBadRequest();
        }


        $uuids = $input['uuids'];


        if(!$this->posts->find($uuids)->toArray()) {
            return $this->response->respondNotFound();
        }


        $deleted_uuid = [];

        $notDeleted_uuid = [];


        foreach ($uuids as $uuid) {

            if(DB::table('posts')->where('id', $uuid)->delete()) {
                $deleted_uuid[] = $uuid;
            } else {
                $notDeleted_uuid[] = $uuid;
            }
        }

        return $this->response->respondDeleted($deleted_uuid, $notDeleted_uuid);

    }



    public function update()
    {
        $datas = $this->request->all();


        if(!array_key_exists("data", $datas)) {
            return $this->response->respondBadRequest();
        }

        $datas = $datas['data'];


        if(!$datas) {
            return $this->response->respondNotFound();
        }


        $notUpdated_rows = [];

        $updated_rows = [];


        foreach ($datas as $data)
        {
            $validator = $this->validator->validateUpdate($data);

            if (!$validator->passes()) {
                return $this->response->respondInvalid($validator->errors()->all());
            }


            if(DB::table('posts')->where('id', $data['id'])->update($data)) {
                $updated_rows[] = $data['title'];
            } else {
                $notUpdated_rows[] = $data['title'];
            }

        }

        return $this->response->respondUpdated($updated_rows, $notUpdated_rows);

    }

}