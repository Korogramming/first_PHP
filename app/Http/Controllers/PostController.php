<?php

namespace App\Http\Controllers;
//use宣言は外部にあるクラスをPostController内にインポートできる
//この場合、App/Models内のPostクラスをインポートしている
//PostController.php内でPost.phpを使用したいからuse宣言を行っている
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(Post $post){ //インポートしたPostをインスタンス化して$postとして使用
        return $post->get(); //$postの中身を戻り値にする
    }
}
