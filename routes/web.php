<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //外部にあるPostControllerクラスを使えるようにします。

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

/*
//Bladeファイルを直接表示するためのルーティング
Route::get('/', function () {
    return view('posts.index');
});*/

//
Route::get('/', [PostController::class, 'index']);

//07-4ブログ投稿作成画面表示用のルーティング追加
Route::get('/posts/create', [PostController::class, 'create']);
//07-3にて追加showメゾット実行用
Route::get('/posts/{post}', [PostController::class, 'show']);
//'/posts/{対象データのID}'にGetリクエストが来たら、PostControlerのshowメゾットを実行
//{}内はルートパラメータと呼ばれ、対象データのIDを取得できるようにするもの

//07-4解説2ブログ投稿作成処理実行
//ブログ投稿作成画面で保存ボタンが押下されたときのルーティング
Route::post("/posts", [PostController::class, 'store']);
