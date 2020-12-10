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

        // $api->get('schedules', 'ScheduleController@show');
        // $api->get('schedules/{id}', 'ScheduleController@view');

        $api->get('schedules', 'ScheduleController@index');
        $api->get('schedules_peserta', 'ScheduleController@indexByStatus');
        $api->get('schedules/{id}', 'ScheduleController@show');
        $api->post('schedules', 'ScheduleController@store');
        $api->put('schedules/{id}', 'ScheduleController@update');
        $api->delete('schedules/{id}', 'ScheduleController@destroy');
        $api->post('schedules_countsoal', 'ScheduleController@countSoal');
        

        $api->get('questionlevels', 'QuestionLevelController@index');
        $api->get('questionlevels/{id}', 'QuestionLevelController@show');
        $api->post('questionlevels', 'QuestionLevelController@store');
        $api->put('questionlevels/{id}', 'QuestionLevelController@update');
        $api->delete('questionlevels/{id}', 'QuestionLevelController@destroy');

        $api->get('questioncategories', 'QuestionCategoryController@index');
        $api->get('questioncategories/{id}', 'QuestionCategoryController@show');
        $api->post('questioncategories', 'QuestionCategoryController@store');
        $api->put('questioncategories/{id}', 'QuestionCategoryController@update');
        $api->delete('questioncategories/{id}', 'QuestionCategoryController@destroy');

        $api->get('questions', 'QuestionController@index');
        $api->get('questions_count', 'QuestionController@indexCount');
        $api->get('questions/{id}', 'QuestionController@show');
        $api->post('questions', 'QuestionController@store');
        $api->put('questions/{id}', 'QuestionController@update');
        $api->delete('questions/{id}', 'QuestionController@destroy');
        $api->get('/questions/avatar/{name}', 'QuestionController@get_avatar');

        $api->get('user_schedules', 'UserScheduleController@index');
        $api->get('user_schedules_all', 'UserScheduleController@indexAll');
        $api->get('user_schedules_all/{id}', 'UserScheduleController@indexAllId');
        $api->get('user_schedules/{id}', 'UserScheduleController@show');
        $api->get('user_schedules_schedule_id', 'UserScheduleController@showScheduleId');
        $api->get('user_schedules_details/{id}', 'UserScheduleController@detail');
        $api->post('user_schedules_cek_unique', 'UserScheduleController@cekUnique');
        $api->post('user_schedules', 'UserScheduleController@store');
        $api->put('user_schedules/{id}', 'UserScheduleController@update');
        $api->delete('user_schedules/{id}', 'UserScheduleController@destroy');

        $api->get('profiles', 'ProfileController@index');
        $api->post('profiles', 'ProfileController@store');
        $api->put('profiles/{id}', 'ProfileController@update');
        $api->get('profiles_logged', 'ProfileController@show');
        $api->get('profiles/avatar/{name}', 'ProfileController@get_avatar');

        $api->get('profile_educations', 'ProfileEducationController@index');
        $api->post('profile_educations', 'ProfileEducationController@store');
        $api->put('profile_educations/{id}', 'ProfileEducationController@update');
        $api->get('profile_educations/{id}', 'ProfileEducationController@show');
        $api->get('profile_educations_id/{id}', 'ProfileEducationController@showId');
        $api->delete('profile_educations/{id}', 'ProfileEducationController@destroy');
    });
});