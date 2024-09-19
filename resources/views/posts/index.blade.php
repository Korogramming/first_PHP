<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
    <body>
        <h1>Blog Name</h1>
        <a href="/posts/create">create</a>
        <div class="posts">
            @foreach ($posts as $post)
                <div class="post">
                    <h2 class="title">
                        <!--07-3でタイトルをリンクに変更-->
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class="body">{{ $post->body }}</p>
                    <!-- 07-6ブログ投稿一覧画面へのブログ投稿削除実行用導線追加-->
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method("delete")
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                        <!--赤い波線はスルーでよい-->
                    </form>
                </div>
            @endforeach
        </div>
        <!--07-2課題３最後、ViewファイルにページネーションのHTMLの追加-->
        <div class="paginate">
            {{ $posts->links() }}
        </div>
        <script>
            //07-6削除確認を行うためのダイアログ
            function deletePost(id){
                'use strict'
                //ここの`form_${id}`はシングルクォーテーションでなく、バッククオート
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>