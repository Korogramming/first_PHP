<?php

namespace App\Http\Controllers;
//use宣言は外部にあるクラスをPostController内にインポートできる
//この場合、App/Models内のPostクラスをインポートしている
//PostController.php内でPost.phpを使用したいからuse宣言を行っている
use App\Models\Post;
use Illuminate\Http\Request;
//use PhpParser\Builder\FunctionLike;

//07-4解説２
//store関数の引数でPostRequest指定で、インスタンス化するタイミングでバリデーションが検証
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post){ //インポートしたPostをインスタンス化して$postとして使用
        //return $post->get(); //$postの中身を戻り値にする，＜＝＝全件取得するためのコード

        //posts.indexはviewsフォルダの中のpostsフォルダの中にあるindex.blade.phpのことを指しています。
        //return view('posts.index')->with(['posts' => $post->get()]);
        //blade内で使う'posts'と設定。'posts'の中身にgetを使いインスタンス化した$postを代入。

        /*$test = $post->orderBy('updated_at', 'DESC')->limit(2)->toSql(); //確認用に追加
        dd($test); //確認用に追加*/

        //ORM...Object-Relational Mappingの略

        //07-2課題３の初め
        //$post->get()で全件取得していたところを、$post->getByLimit()とPost.phpに追加した条件で制御した関数を呼び出す
        //return view('posts.index')->with(['posts' => $post->getByLimit()]);

        //07-2課題３のPaginationインスタンスで返却する方
        //$post->getByLimit()とこのコードで取得件数を制御した関数を呼び起こす↓
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);   
        //getPaginateByLimit()はPost.phpで定義したメゾット
    }

    //07-3ルーティングで呼び出される関数の引数に該当のModelクラスを追加
    //ここの$postとweb.phpの{post}の中身は一緒にしなければならない
    public function show(Post $post){
        return view('posts.show')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }

    public function create(){
        return view("posts.create");
    }

    //07-4解説２
    //ユーザからのリクエストに含まれるデータを扱う場合、Requestインスタンスを利用
    //ユーザの入力データをDBのpostsテーブルにアクセスし保存する必要があるため、空のPostインスタンスを利用
    public function store(Post $post, PostRequest $request){
        //postをキーにもつリクエストパラメータを取得する
        //今回は$inputは[ 'title' => 'タイトル', 'body' => '本文' ]のような配列型式
        $input = $request["post"];
        //$post->fill($input)で、空だったPostインスタンスのプロパティを、受け取ったキーごとに上書き
        $post->fill($input)->save();
        //今回保存したpostのIDを含んだURLにリダイレクト
        return redirect("/posts/" . $post->id);
    }

    //ブログ投稿編集画面表示用のコントローラー実装
    public function edit(Post $post){
        return view('posts.edit')->with(['post' => $post]);
    }

    //07-5ブログ投稿編集を実行する関数をコントローラーに追加
    public function update(PostRequest $request, Post $post){
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post){
        $post->delete();
        return redirect("/");
    }

    
}
?>