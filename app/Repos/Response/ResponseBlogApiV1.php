<?php namespace App\Repos\Response;


class ResponseBlogApiV1 implements ResponseInterface {



    public function respondOk(
        $data = [],
        $massage = "Successful!",
        $headers  = []
    ){
        return response()->json(
            [
            "massage" => $massage,
            "data" => $data,
            ], 200, $headers);
    }



    public function respondNotFound($massage = "Not Found!", $headers = [])
    {
        return response()->json(
            [
            "error"=>$massage,
            ], 404, $headers);
    }


    public function respondBadRequest($massage = "Syntax error!", $headers = [])
    {
        return response()->json(
            [
            "error"=>$massage,
            ], 400, $headers);
    }


    public function respondInvalid(
        $validationErrors=[],
        $massage = "Invalid Data!",
        $headers=[]
    ){
        return response()->json(
            [
            "error"=>$massage,
            "massage"=>$validationErrors
            ], 422, $headers);
    }



    public function respondUpdated(
        $updated=[],
        $notUpdated=[],
        $massage = "Updated Successfuly! | if not updated: repetitive OR Exists OR id not found",
        $headers=[]
    ){
        return response()->json(
            [
            "massage"=>$massage,
            "updated_titles: "=>$updated,
            "notUpdated_titles: "=>$notUpdated
            ], 200, $headers);
    }



    public function respondAdded(
        $notAdded=[],
        $massage = "Added Successfuly! | if not Added: repetitive OR Exists",
        $headers=[]
    ){
        return response()->json(
            [
            "massage"=>$massage,
            "notAdded_data: "=>$notAdded
            ], 200, $headers);
    }



    public function respondDeleted(
        $deleted=[],
        $notDeleted=[],
        $massage = "Deleted Successfuly! | if not: uuid not found",
        $headers=[]
    ){
        return response()->json(
            [
            "massage"=>$massage,
            "deleted_data: "=>$deleted,
            "notDeleted_data: "=>$notDeleted
            ], 200, $headers);
    }


}