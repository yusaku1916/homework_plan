<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>先生ページ</h1>
        <form action="/works" method="POST">
            @csrf
            <div class="content">
                <h2>今週の宿題</h2>
                <textarea name="work[content]" placeholder="今週も頑張りましょう！"></textarea>
                <p class="content_error" style="color:red">{{ $errors->first('work.content') }}</p>
            </div>
            <div class="coment">
                <h2>アドバイス・コメント</h2>
                <textarea name="work[coment]" placeholder="今週も頑張りましょう！"></textarea>
            </div>
            <div class="teacher_id">
                <h2>teacher_id</h2>
                <select name="work[teacher_id]">
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
    </select>
            </div>
            <input type="submit" value="完了"/>
        </form>
        <button type=“button” onclick="location.href='/'"><!-- onclick についてわかっていない -->
            戻る
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
                    <td><p>{{ $plans1->content }}</p></td>
                    <td><p>{{ $plans2->content }}</p></td>
                    <td><p>{{ $plans3->content }}</p></td>
                    <td><p>{{ $plans4->content }}</p></td>
                    <td><p>{{ $plans5->content }}</p></td>
                    <td><p>{{ $plans6->content }}</p></td>
                    <td><p>{{ $plans7->content }}</p></td>
                </tr>
            </table>
        </div>
    </body>
</html>