<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
</p>

## About Project

The "Build-APIs-Using-Laravel" project is a learning project that aims to provide Laravel developers with a practical understanding of how APIs are built and how they work. The project provides a hands-on approach to learning by demonstrating the process of building APIs that can be integrated into their applications using Laravel, a popular PHP web application framework.

Through this project, Laravel developers can learn how to design and implement APIs, set up endpoints, handle requests and responses, and authenticate users. They can learn how to incorporate third-party libraries in testing and debugging APIs to enhance the functionality of their APIs. The project emphasizes real-world application of API development, including implementing features such as authentication, validation, and error handling.

By following the project, developers can improve their understanding of API development best practices and learn how to build secure, robust, scalable, and maintainable APIs for their applications. The project is a valuable resource for any Laravel developer looking to enhance their skills and gain practical experience in API development.

## What are APIs
APIs (Application Programming Interfaces) are software interfaces that allow different applications to communicate with each other. In simple terms, an API acts as a middleman between two software applications, allowing them to exchange information and perform specific tasks. APIs provide developers with a structured and consistent way to access a software application's functionality, data, or services enabling them to create new applications by integrating different APIs.

APIs can be thought of as a contract between the application and the developer. The contract defines how the application should be accessed, what data can be retrieved, and how the data should be returned. APIs can be designed to be consumed by different types of clients, such as web browsers, mobile apps, or other backend systems.

APIs are typically designed with a specific set of functions or services that are available to other applications. These functions or services are exposed through a set of standardized protocols, such as REST (Representational State Transfer) or SOAP (Simple Object Access Protocol), which allow other applications to interact with the API in a structured and standardized way.

There are different types of APIs, including RESTful APIs, SOAP APIs, and GraphQL APIs. RESTful APIs are the most commonly used type of API and follow a set of conventions for creating web services that can be accessed using HTTP methods such as GET, POST, PUT, and DELETE.

APIs are becoming increasingly popular in modern web application development due to their many advantages. For example, they enable developers to: 
* Reuse existing software components in new applications without having to start from scratch, making the development process more efficient and cost-effective. 
* Build applications that are modular and scalable where different components of an application can be easily replaced or upgraded without affecting the rest of the system, making it easier to add new features and functionality. 
* Create a consistent and reliable user experience across different platforms and devices.

In summary, APIs provide developers with a standardized way to access and consume the functionality, data, or services of an application, enabling the creation of new applications and functionality that can be integrated across different platforms and devices. Understanding APIs is essential for modern application development and can greatly enhance the productivity and efficiency of developers.

## Testing the Movie API

The "Build-APIs-Using-Laravel" project has a Movie API built. The following are the defined routes for the MovieController:

- `GET /api/v1/movies` - get all movies
- `POST /api/v1/movies` - create a new movie
- `GET /api/v1/movies/{id}` - get a specific movie
- `PUT /api/v1/movies/{id}` - update a specific movie
- `DELETE /api/v1/movies/{id}` - delete a specific movie

We can now test the API using Postman or any other tool alike. Open Postman and create a new request for each route:

- `GET <http://localhost:8000/api/v1/movies`>
- `POST <http://localhost:8000/api/v1/movies`>
    - Body: `{"title": "Bad Boys III", "storyline": "This is a great movie done by Will Smith and Martin.", "language": "English", "release_date": 2023, "box_office": 10000, "rating": 9, "runtime": 120}`
- `GET <http://localhost:8000/api/v1/movies/{id}`>
- `PUT <http://localhost:8000/api/v1/movies/1`>
    - Body: `{"title": "Kanai Technologies, Inc","storyline": "This movie tells a story about Kanai Technologies, a software and internet company.","language": "English", "release_date": 2023, "box_office": 10000, "rating": 9,"runtime": 120}`
- `DELETE <http://localhost:8000/api/v1/movies/{id}`>


## API Building Process

#### Step 1 - Create new Laravel Project

#### Step 2 - Define User Model and Migration

#### Step 3 - Create the UserController
Create the UserController, which will handle all the requests related to the User model. Run the following command in your terminal:

```
php artisan make:controller API/v1/UserController --api
```

This will create a new UserController in the `app/Http/Controllers/API/v1` directory with the `--api` flag, which means that it will generate boilerplate code for building a RESTful API.

#### Step 4 - Define the User routes
Open the `routes/api.php` file and define the routes for the UserController:

```
Route::prefix('v1')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::post('/users', 'store');
        Route::get('/users/{user}', 'show');
        Route::put('/users/{user}', 'update');
        Route::delete('/users/{user}', 'destroy');
    });
});
```

or define the routes using short-hand with less lines of code:

```
// /api/v1/users
Route::prefix('v1')->group(function () {
    Route::apiResource('/users', UserController::class);
});
```

This will define the following routes for the UserController:
- `GET /api/v1/users` - get all users
- `POST /api/v1/users` - create a new user
- `GET /api/v1/users/{user}` - get a specific user
- `PUT /api/v1/users/{user}` - update a specific user
- `DELETE /api/v1/users/{user}` - delete a specific user

#### Step 5 - Implement the UserController methods
Open the `app/Http/Controllers/API/v1/UserController.php` file and implement the methods for each route:

```
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
```

This will implement the methods for each route:

- `index` - get all users
- `store` - create a new user
- `show` - get a specific user
- `update` - update a specific user
- `destroy` - delete a specific user

#### Step 6 - Test the API

We can now test the API using a tool like Postman. Open Postman and create a new request for each route:

- `GET <http://localhost:8000/api/v1/users`>
- `POST <http://localhost:8000/apiv1//users`>
    - Body: `{"name": "Kanai Wamulwange", "email": "support@kanaitech.com", "password": "secret"}`
- `GET <http://localhost:8000/api/v1/users/{id}`>
- `PUT <http://localhost:8000/api/v1/users/{id}`>
    - Body: `{"name": "Peter Makasa", "email": "epsyzambia@gmail.com"}`
- `DELETE <http://localhost:8000/api/v1/users/{id}`>

This will test the API and ensure that it is working correctly.

### Conclusion

In this section, we have shown you how to build a REST API for a User using Laravel. We started by creating a new Laravel project and defining the User model and migration. We then created the UserController and defined the routes for each CRUD operation. Finally, we implemented the methods for each route and tested the API using Postman. With this knowledge, you can now build your own REST APIs using Laravel.


## Creating Form Requests

In Laravel, Form Requests are a type of validation that allow developers to define validation rules for incoming requests. Form Requests are used to validate user input before it is processed by the application. They are a key feature of Laravel's built-in form validation system and help developers to keep their code clean and maintainable.

Form Requests can be created using the make:request Artisan command, which generates a new Form Request class. In this class, developers can define validation rules using the rules method, which returns an array of validation rules. For example, a simple Form Request class that validates the name field could look like this:

```
php artisan make:request MovieRequest
```

The generated form request class will be placed in the **`app/Http/Requests`** directory. Each form request generated by Laravel has two methods: **`authorize`** and **`rules`.**

the **`authorize`** method is responsible for determining if the currently authenticated user can perform the action represented by the request, while the **`rules`** method returns the validation rules that should apply to the request's data:

```
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:movies',
            'language' => 'required',
            'box_office' => 'required',
            'rating' => 'required|integer|between:1,10',
            'runtime' => 'required|max:3'
        ];
    }
}
```

Once a Form Request class has been created, it can be used in a controller method to validate incoming requests. Developers can inject the Form Request class into the controller method as a parameter, and Laravel will automatically handle the validation. For example:


## API Resources

Resources are a way to transform a given model into an array. Each resource contains a `toArray` method which translates your model's attributes into an API friendly array that can be returned from your application's routes or controllers:

Resources extends the `Illuminate\Http\Resources\Json\JsonResource`

```
php artisan make:resource UserResource
```

This will crate a new User Resource in the `app/Http/Resources` directory.

```
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
        // return parent::toArray($request);
    }
}
```


```
<?php

namespace App\Http\Controllers\API\v1\UserController;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\API\v2\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     *  Get all movies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return User::all();
        return UserResource::collection(User::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }
}
```

## Resource Collections

While resources transform a single model into an array, resource collections transform a collection of models into an array. However, it is not absolutely necessary to define a resource collection class for each one of your models since all resources provide a `collection` method to generate an "ad-hoc" resource collection on the fly:

```
use App\Http\Resources\UserResource;
use App\Models\User;
 
Route::get('/users', function () {
    return UserResource::collection(User::all());
});
```

However, if you need to customize the meta data returned with the collection, it is necessary to define your own resource collection:

```
<?php
 
namespace App\Http\Resources;
 
use Illuminate\Http\Resources\Json\ResourceCollection;
 
class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
```

Like singular resources, resource collections may be returned directly from routes or controllers:

```
use App\Http\Resources\UserCollection;
use App\Models\User;
 
Route::get('/users', function () {
    return new UserCollection(User::all());
});
```

