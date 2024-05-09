<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/plan_create.css') }}">
    </head>
    <!--x-app-layout-->
    <body>
        <h1 id='HEAD'>計画を立てよう！</h1>
        
        <div id="teacher">
            
            <div id='work'>
                <h2 class='headline'>今週の宿題</h2>
                <p id='work_content'>{{ $works->content }}</p>
            </div>
                
            <div id="advice">
                <h2 class="headline">アドバイス・コメント</h2>
                <p id="work_coment">{{ $works->coment }}</p>
            </div>
            
        </div>
        
        <hr>
            <div id="plans">
                <h2 class="headline">今週の計画</h2>
                <table border="2">
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
                        <form action="/plans" method="POST">
                            @csrf
                            <input type="hidden" name="plan[work_id]" value="{{ $work_number }}" >
                            <input type="hidden" name="plan[student_id]" value="1">
                            @for($i=1; $i<=7; $i++)
                                <input type="hidden" name="day_id[]" value="{{ $i }}">
                                <td class="test">
                                    <textarea class="test" name="content[]" placeholder="今週も頑張りましょう！"></textarea>
                                </td>
                            @endfor
                            <input type="submit" value="完了"/>
        　　　　　　　　　　　　</form>
                    </tr>
                </table>
            </div>
            
        <button type=“button” onclick="location.href='/'"><!-- onclick についてわかっていない -->
            戻る
        </button>
        
    </body>
    <!--/x-app-layout-->
</html>