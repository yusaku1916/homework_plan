<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>宿題連絡帳</title>
        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/plan_create.css') }}">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    
    <body>
        
        <header>
            <h1>宿題連絡帳</h1>
        </header>
        
        <div id="teacher">
            <div id="content-coment">
                <div id='work'>
                    <h2 class='headline'>今週の宿題</h2>
                    <p id='work_content'>{{ $works->content }}</p>
                </div>
                    
                <div id="advice">
                    <h2 class="headline">コメント</h2>
                    <p id="work_coment">{{ $works->coment }}</p>
                </div>
            </div>
        </div>
        
        <hr>
        
        <div id="student">
            <div id="plans">
                <h2 class="headline">今週の計画</h2>
                <form action="/plans" method="POST" id="submit_table">
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
                            @csrf
                            <input type="hidden" name="plan[work_id]" value="{{ $work_number }}" >
                            <input type="hidden" name="plan[student_id]" value="1">
                            @for($i=1; $i<=7; $i++)
                                <input type="hidden" name="day_id[]" value="{{ $i }}">
                                <td>
                                    <textarea class="test" name="content[]" placeholder="今週も頑張りましょう！"></textarea>
                                </td>
                            @endfor
                        </tr>
                    </table>
                    <input id="submit" type="submit" value="完了"/>
        　　　　　　</form>
            </div>
        </div>
            
        <button type=“button” onclick="location.href='/'"><!-- onclick についてわかっていない -->
            戻る
        </button>
        
        
        <footer>
            <form id="logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    Log Out
                </a>
            </form>
        </footer>
        
    </body>
    <!--/x-app-layout-->
</html>