<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>宿題連絡帳</h1>
        @foreach ($works as $work)
        <div class='works'>
            <div>
                <h2>今週の宿題</h2>
                <p class='works_content'>{{ $work->content }}</p>
            </div>
            <div>
                <h2>アドバイス・コメント</h2>
                <p　class='coment'>{{ $work->coment }}</p>
            </div>
        </div>
        @endforeach
        <button type=“button” onclick="location.href='/works/create'"><!-- onclick についてわかっていない -->
            先生ページへ    
        </button>
        <hr>
        <div>
            <h2>今週の計画</h2>
            <table border="1">
                <tr>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                </tr>
                <tr>
                    <td>何か</td>
                    <td>なんか</td>
                    <td>やらない</td>
                    <td>あそぶ</td>
                    <td>ねる</td>
                    <td>マッサージ</td>
                    <td>睡眠</td>
                </tr>
            </table>
        </div>
    </body>
</html>