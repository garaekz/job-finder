<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', 'Auth\UserController@current');
    Route::get('/estados', 'ResourcesController@estados');
    Route::get('/municipios/{id}', 'ResourcesController@municipios');
    Route::get('/area-especialidad', 'ResourcesController@areaEspecialidad');
    Route::get('/estados-civiles', 'ResourcesController@estadosCiviles');
    Route::get('/prestaciones', 'ResourcesController@prestaciones');

    Route::post('/perfil/update-image', 'PerfilController@updateImage');
    Route::post('/perfil/update', 'PerfilController@update');
    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

    Route::post('/vacantes', 'VacanteController@store');
    Route::post('/vacantes/{id}/aplicar', 'VacanteController@aplicar');
    Route::put('/vacantes/{id}', 'VacanteController@update');
    Route::delete('/vacantes/{id}', 'VacanteController@destroy');

    Route::apiResource('/experiencia', 'ExperienciaController');
    Route::apiResource('/formacion', 'FormacionController');

    Route::post('/perfil/portafolio', 'PerfilController@uploadPortafolio');
    Route::delete('/perfil/portafolio/{id}', 'PerfilController@deletePortafolio');

    Route::post('/perfil/cv', 'PerfilController@updateCV');

    Route::get('/aspirantes', 'AspiranteController@index');
    Route::get('/aspirantes/{id}', 'AspiranteController@show');

    Route::group(['prefix' => 'aspirante', 'middleware' => ['role:aspirante']], function() {
      Route::get('/vacantes', 'Aspirante\VacanteController@index');
    });
    Route::group(['prefix' => 'empresa', 'middleware' => ['role:empresa']], function() {
      Route::get('/vacantes', 'Empresa\VacanteController@index');
    });
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');

    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});

Route::get('/vacantes', 'VacanteController@index');
Route::get('/vacantes/{id}', 'VacanteController@show');
