# A simple Blog Api implemented with Laravel 5.0 
This Repo is Only For my Resume!! 

## Features
- using (webpatser/laravel-uuid) to create uuid for posts table
- using Html Purifier (mews/purifier) to sanitize and clean input data (security and xss)
- All input and output data are Json.

## Api Routes
- Route: api/v1/blog/ =>  Responses all posts as json 
- Route: api/v1/blog/show  => Outputs One or Array of posts for given uuid's
- Route: api/v1/blog/add  => Inserts One or Array of given Posts into database
- Route: api/v1/blog/update => Updates One or Array of Posts
- Route: api/v1/blog/delete => Deletes One or Array  of given uuids from database


## Installation

- Clone or Download Repo
- To install dependencies: composer install
- To create tables : php artisan migrate
- To seed tables : php artisan db:seed

## Usage

#### Route: api/v1/blog :
With GET request simply type the url in browser and all posts are returned as Json.

#### Route: Route: api/v1/blog/show
POST uuids in Json format to this route and it will return all the posts with the provided uuids.

the Json format should be like following: 
 {
     "uuids":
     [
          "2019aa37-1aae-40d3-9b7a-c8c77bc56bef",
          "3a1b86b6-aea9-44fe-9ffd-a9e9add0bf95",
          "3a1b86b6-aea9-44fe-9ffd-a9e9add0bf95"
    ]
}



