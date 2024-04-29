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
        
        <h1>宿題連絡帳</h1>
        
        <div class='works'>
            <div>
                <h2>今週の宿題</h2>
                @if(is_null($works))
                    <p>宿題決めよー</p>
                @else
                    <p class='works_content'>{{ $works->content }}</p>
                @endif
            </div>
            <div>
                <h2>アドバイス・コメント</h2>
                @if(is_null($works))
                    <p>advice書け</p>
                @else
                    <p　class='coment'>{{ $works->coment }}</p>
                @endif
            </div>
        </div>
        
        <button type=“button” onclick="location.href='/works/create'"><!-- onclick についてわかっていない -->
            先生ページへ
        </button>
        
        <hr>
        
        
        <div>
            <h2>今週の計画</h2>
            <button type=“button” onclick="location.href='/plans/create'"><!-- onclick についてわかっていない -->
                計画を立てる
            </button>
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

                        <td colspan="7"><p>学習予定を立てよう！</p></td>
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
        </div><!-- 予定を立てよう -->
        <div class="submits">
            <button type=“button” onclick="location.href='/submits/create'">
                提出
            </button>
        </div>
    </body>
    </x-app-layout>
</html>