<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('test_short');
});

Route::get('/json', function () {
    return [
        ['id' => '11', 'name' => '鈴木ichiro'],
        ['id' => '12', 'name' => '鈴木jiro'],
    ];
    // 削除機能を使う場合は、以下の実装を利用
    // return App\Models\User::all();
});

Route::get('/del/{id}', function ($id) {
    App\Models\User::find($id)->delete();
    return App\Models\User::all();
});
