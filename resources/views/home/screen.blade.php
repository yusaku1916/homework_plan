<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/screen.css') }}">
    </head>
    
    <body>
        <div id="body1">
            
            <header>
                <h1>宿題連絡帳</h1>
            </header>
            
            @if($identify_id == 1)
            <!--先生ビュー-->
            
                @if(is_null($students))
                    <div id="no_student">
                        <p>生徒の登録を待とう！</p>
                    </div>
                    
                @else
                        
                    <h1 class="HEAD">誰の指導をしますか</h1>
                
                    <form method="POST" action="{{ route("screen.teacher") }}" id="student_select">
                        @csrf
                        
                        <select name="student_id" id="student_id">
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="次へ" id="student_select_1"/>
                        
                    </form>
                    
                @endif
                
            @elseif($identify_id == 2)
            <!--生徒ビュー-->
                
                <div id='teacher'>
                    <div id="content-coment">
                        <div id='work'>
                            <h2 class="headline">今週の宿題</h2>
                            @if(is_null($works))
                                <p class='work_content'>宿題が出るよ</p>
                            @else
                                <p class='work_content'>{{ $works->content }}</p>
                            @endif
                        </div>
                        
                        <div id='advice'>
                            <h2 class="headline">アドバイス・コメント</h2>
                            @if(is_null($works))
                                <p class='work_coment'>adviceを待ちましょう</p>
                            @else
                                <p class='work_coment'>{{ $works->coment }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div id="student">
                    <div id='plans'>
                        <h2 class="headline">今週の計画</h2>
                        <button id="plan_button" type=“button” onclick="location.href='/plans/create'"><!-- onclick についてわかっていない -->
                            計画を立てる
                        </button>
                        
                        @if (is_null($plans1) && is_null($plans2) && is_null($plans3) && is_null($plans4) && is_null($plans5) && is_null($plans6) && is_null($plans7))
                                
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
                                        <td colspan="7"><p>学習予定を立てよう！</p></td>
                                </tr>
                            </table>
                        
                        @else
                            <table>
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
                                    </tr>
                            </table>
                        
                            <div class="submit">
                                <button type=“button” onclick="location.href='/submits/create'">
                                    提出
                                </button>
                            </div>
                        @endif
                        
                    </div>
                </div>
                
            @endif
        </div>
        
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
    
</html>