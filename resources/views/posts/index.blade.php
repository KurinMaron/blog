<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- app()->getLocale() はconfig/app.phpのlocaleに指定されたlangに従う -->
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- rel:relation stylesheet:見栄え情報を記述したファイル -->
    </head>
    
    <body>
        <h1>Blog Name</h1>
        <a href='/posts/create'>create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                </div>
                <form action="/posts/{{ $post->id }} id="form_{{ $post->id }} method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form>
            @endforeach
            <script>
                function deletePost(id) {
                    'use strict'
                    
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>