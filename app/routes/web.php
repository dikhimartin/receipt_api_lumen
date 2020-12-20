<?php

use Illuminate\Support\Facades\Hash;

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


$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/hash_password/{password}', function ($password)  {
    return Hash::make($password);
});

$api= app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){
    $api->group(['prefix'=>'oauth'], function($api){
        $api->post('token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    });
    $api->group(['prefix'=>'v1','namespace'=>'App\Http\Controllers','middleware'=>['auth:api','cors']], function($api){
        // Controller route


        $api->get('sample_crud/get_data','SampleCrudController@index');

        $api->get('users','UserController@show');
        $api->get('users_pengguna','UserController@showPengguna');
        $api->get('users_peserta','UserController@showPeserta');
        $api->get('users_fullname','UserController@showFullname');
        $api->get('users/{id}', 'UserController@view');
        $api->put('users/{id}', 'UserController@update');
        $api->post('users_cek_email', 'UserController@cekEmail');

        $api->get('logininfo', 'UserController@logininfo');
        $api->post('register', 'UserController@register');
        $api->get('logout', 'UserController@logout');

    });
});