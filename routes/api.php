<?php

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/status', function () {
  return ['status' => 'OK'];
});

Route::get('/redirect', function () {
  return ['redirect_url' => Socialite::driver('qiita')->stateless()->redirect()->getTargetUrl()];
});

Route::get('/callback', function () {
  $user = Socialite::driver('qiita')->stateless()->user();

  return ['user' => $user];
});
