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
        <div class="posts">
            @foreach ($posts as $post)
                <div class="post">
                    <h2 class="title">
                        <!--07-3でタイトルをリンクに変更-->
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class="body">{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        <!--07-2課題３最後、ViewファイルにページネーションのHTMLの追加-->
        <div class="paginate">
            {{ $posts->links() }}
        </div>
    </body>
</html>