<?php
/** @var \Laravel\Lumen\Routing\Router $router */
$router->group(['prefix' => 'api/v1'], function () use ($router) {
    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It is a breeze. Simply tell Lumen the URIs it should respond to
    | and give it the Closure to call when that URI is requested.
    |
    */
    $router->options('/{any:.*}', function () {
        return response(['status' => 'success'], 200);
    });
    $router->get('/api/documentation', function () {
        return response()->json(\OpenApi\scan(app()->basePath('app')));
    });
    $router->get('/docs', function () {
        return view('swagger-ui:index');
    });
$router->get('/posts', 'API\V1\PostController@index');
$router->get('/test/search/{query}' , 'API\V1\TestController@search');
});
/*
$router->group(['prefix' => 'posts'], function () use ($router) {
    $router->get('/', 'PostController@index');
    $router->get('/soft-deleted', 'PostController@getSoftDeleted');
    $router->get('/{id:\d+}', 'PostController@show');;
    $router->post('/', 'PostController@store');
    $router->put('/{id:\d+}', 'PostController@update');
    $router->delete('/{id:\d+}', 'PostController@destroy');
    $router->post('/{id:\d+}/restore', 'PostController@restore');
    $router->delete('/{id:\d+}/force', 'PostController@forceDelete');
    $router->get('/search', 'PostController@search');
});
$router->group(['prefix' => 'tags'], function () use ($router) {
    $router->get('/', 'TagController@index');
    $router->get('/{id}', 'TagController@show');
    $router->post('/{postId}', 'TagController@store');
    $router->put('/{id}', 'TagController@update');
    $router->delete('/{id}', 'TagController@destroy');
    $router->post('/{id}/restore', 'TagController@restore');
    $router->delete('/{id}/force', 'TagController@forceDelete');
});

$router->post('/redis/set', 'RedisController@setValue');
$router->get('/redis/get', 'RedisController@getValue');
*/

