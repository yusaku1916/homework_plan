<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
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
                <p class="coment__error" style="color:red">{{ $errors->first('work.coment') }}</p>
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
                    @if (is_null($plans1) && is_null($plans2) && is_null($plans3) && is_null($plans4) && is_null($plans5) && is_null($plans6) && is_null($plans7))
                        <td colspan="7"><p>予定作成を促そう</p></td>
                    @else
                        <td>
                            @if(is_null($plans1->content))
                            <p>お休み</p>
                            @else
                            <p>{{ $plans1->content }}</p>
                            @endif
                        </td>
                        <td>
                            @if(is_null($plans2->content))
                            <p>お休み</p>
                            @else
                            <p>{{ $plans2->content }}</p>
                            @endif
                        </td>
                        <td>
                            @if(is_null($plans3->content))
                            <p>お休み</p>
                            @else
                            <p>{{ $plans3->content }}</p>
                            @endif
                        </td>
                        <td>
                            @if(is_null($plans4->content))
                            <p>お休み</p>
                            @else
                            <p>{{ $plans4->content }}</p>
                            @endif
                        </td>
                        <td>
                            @if(is_null($plans5->content))
                            <p>お休み</p>
                            @else
                            <p>{{ $plans5->content }}</p>
                            @endif
                        </td>
                        <td>
                            @if(is_null($plans6->content))
                            <p>お休み</p>
                            @else
                            <p>{{ $plans6->content }}</p>
                            @endif
                        </td>
                        <td>
                            @if(is_null($plans7->content))
                            <p>お休み</p>
                            @else
                            <p>{{ $plans7->content }}</p>
                            @endif
                        </td>
                    @endif
                </tr>
            </table>
        </div>
    </body>
    </x-app-layout>
</html>