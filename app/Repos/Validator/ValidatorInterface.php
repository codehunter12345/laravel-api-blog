<?php namespace App\Repos\Validator;

interface ValidatorInterface {


    /**
     * @return mixed
     */
    public function validateUpdate($data);


    /**
     * @param $data
     * @return mixed
     */
    public function validateAdd($data);



}