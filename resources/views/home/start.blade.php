<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/screen_teacher.css') }}">
    </head>
    <!--x-app-layout-->
    <body>
        
        <button onclick="loction.href='/login'">
            ログイン
        </button>
        
        <button onclick="loction.href='/register'">
            新規登録
        </button>
        
    </body>
    <!--/x-app-layout-->
</html>