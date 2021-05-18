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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

use App\Domains\Test1\Http\Controllers\Api\Test1\Test1Controller;

Route::group([
    'prefix' => 'test1',
    'as' => 'test1.',
], function () {

    Route::get('/', [Test1Controller::class, 'index'])->name('index');
    Route::post('/', [Test1Controller::class, 'store'])->name('store');
    Route::group(['prefix' => '{project}'], function () {
        Route::get('/', [Test1Controller::class, 'show'])->name('show');
        Route::put('/', [Test1Controller::class, 'update'])->name('update');
        Route::delete('/', [Test1Controller::class, 'delete'])->name('destroy');
    });
});
