<?php namespace App\Repos;

use Illuminate\Support\ServiceProvider;


//  Service provider to register repositories.

class myServiceProvider extends  ServiceProvider {


    public function register()
    {
        $this->RegisterPostRepository();

        $this->RegisterResponseRepository();

        $this->RegisterValidatorRepository();
    }



    public function RegisterPostRepository()
    {
        $class = 'App\Repos\Post\EloquentPost';

        $interface = 'App\Repos\Post\PostInterface';

        $this->app->bind($interface, $class);
    }


    public function RegisterResponseRepository()
    {
        $class = 'App\Repos\Response\ResponseBlogApiV1';

        $interface = 'App\Repos\Response\ResponseInterface';

        $this->app->bind($interface, $class);
    }


    public function RegisterValidatorRepository()
    {
        $class = 'App\Repos\Validator\ValidatorBlogApiV1';

        $interface = 'App\Repos\Validator\ValidatorInterface';

        $this->app->bind($interface, $class);
    }

}