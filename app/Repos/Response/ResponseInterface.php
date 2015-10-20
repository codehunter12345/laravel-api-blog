<?php namespace App\Repos\Response;

interface ResponseInterface {


    /**
     * @param $data
     * @param $massage
     * @param $headers
     * @return mixed
     */
    public function respondOk(
        $data = [],
        $massage = null,
        $headers = []);

    /**
     * @param $massage
     * @param $headers
     * @return mixed
     */
    public function respondNotFound($massage = null, $headers = []);

    /**
     * @param $massage
     * @param $headers
     * @return mixed
     */
    public function respondBadRequest($massage = null, $headers = []);

    /**
     * @param $validationErrors
     * @param $massage
     * @param $headers
     * @return mixed
     */
    public function respondInvalid(
        $validationErrors,
        $massage = null,
        $headers = []);

    /**
     * @param $updated
     * @param $notUpdated
     * @param $massage
     * @param $headers
     * @return mixed
     */
    public function respondUpdated(
        $updated,
        $notUpdated,
        $massage = null,
        $headers = []);

    /**
     * @param $notAdded
     * @param $massage
     * @param $headers
     * @return mixed
     */
    public function respondAdded($notAdded, $massage = null, $headers = []);

    /**
     * @param $deleted
     * @param $notDeleted
     * @param $massage
     * @param $headers
     * @return mixed
     */
    public function respondDeleted(
        $deleted,
        $notDeleted,
        $massage = null,
        $headers = []);


}