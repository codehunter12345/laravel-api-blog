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

#### Route: api/v1/blog/show
POST uuids in Json format to this route and it will return all the posts with the provided uuids.

###### The Json format should be like following: 

<p>&nbsp;{<br />
&nbsp; &nbsp; &nbsp;&quot;uuids&quot;:<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;2019aa37-1aae-40d3-9b7a-c8c77bc56bef&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;3a1b86b6-aea9-44fe-9ffd-a9e9add0bf95&quot;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;]</p>
<p>}</p>


#### Route:  api/v1/blog/add
POST (Data that you want to save to database) to this route as Json and it will insert these data to database.

###### The Json format should be like following: 

<p>&nbsp;{<br />
&nbsp; &nbsp; &nbsp;&quot;data&quot;:<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;[<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; { &nbsp;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;title&quot;:&quot;title1&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;body&quot;: &quot;post 1 body!&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;slug&quot;: &quot;slug&quot;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {&nbsp; &nbsp;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;title&quot;:&quot;title2&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;body&quot;: &quot;post 2 body!&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;slug&quot;: &quot;slug2&quot;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; }<br />
&nbsp; &nbsp; &nbsp; &nbsp; ]<br />
&nbsp; &nbsp; }</p>


#### Route:  api/v1/blog/update
In order to update some posts you should POST a Json data that includes uuid and other attributes for posts table.

##### The Json format should be like this: 

<p>&nbsp;{<br />
&nbsp; &nbsp; &nbsp;&quot;data&quot;:<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;[<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; { &nbsp;</p>

<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;id&quot;:&quot;1050fee5-fc3c-4ec9-9e4f-69a3adf801bb&quot;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;title&quot;:&quot;title1&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;body&quot;: &quot;post 1 body!&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;slug&quot;: &quot;slug&quot;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {&nbsp;</p>

<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;id&quot;:&quot;255e7eeb-142e-4777-b54c-503be090820e&quot;&nbsp;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;title&quot;:&quot;title2&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;body&quot;: &quot;post 2 body!&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;slug&quot;: &quot;slug2&quot;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; }<br />
&nbsp; &nbsp; &nbsp; &nbsp; ]<br />
&nbsp; &nbsp; }</p>

#### Route:  api/v1/blog/delete 
POST uuids Json to this route and all the uuids provided will be deleted from database.

##### The Json File should be like following:

<p><br />
&nbsp;{<br />
&nbsp; &nbsp; &nbsp;&quot;uuids&quot;:<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;[<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;2011e883-3ac7-41c9-afdc-facd3fc879ba&quot;,<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;27bd977d-f3da-4fb6-b862-815d44233f48&quot;&nbsp;&nbsp;<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;]</p>

<p>}</p>


### License
<a href="https://github.com/ellipsesynergie/api-response/blob/master/LICENSE">MIT</a> License.


