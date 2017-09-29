<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register-user', function (Request $request) {

    $name     = $request->input('name');
    $email    = $request->input('email');
    $password = $request->input('password');

    // save new user
    $user = \App\Models\User::create([
        'name'     => $name,
        'email'    => $email,
        'password' => bcrypt($password),
    ]);

    // create oauth client
    $oauth_client = \App\Models\OauthClient::create([
        'user_id'                => $user->id,
        'name'                   => $name,
        'secret'                 => base64_encode(hash_hmac('sha256',$password, 'secret', true)),
        'password_client'        => 1,
        'personal_access_client' => 0,
        'redirect'               => '',
        'revoked'                => 0
    ]);

    return [
        'success' => true, 'message' => 'user successfully created.'
    ];
});