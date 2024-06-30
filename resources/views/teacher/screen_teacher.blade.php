<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>宿題連絡帳</title>
        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/screen_teacher.css') }}">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    
    <body>
        <div id="body1">
            
            <header>
                <h1>宿題連絡帳</h1>
            </header>
        
            <form id="teacher" method="POST" action="{{ route('work.create') }}">
                @csrf
                
                <input type="hidden" name="student_id" value="{{ $student_id }}">
                    
                <div id='content-coment'>
                    
                    <div id="work">
                        <h2 class="headline">今週の宿題</h2>
                        @if(is_null($works))
                            <p class='work_content'>宿題を出そう</p>
                        @else
                            <p class='work_content'>{{ $works->content }}</p>
                        @endif
                    </div>
                    
                    <div id="advice">
                        <h2 class="headline">コメント</h2>
                        @if(is_null($works))
                            <p class='work_coment'>アドバイスやコメントを書こう</p>
                        @else
                            <p class='work_coment'>{{ $works->coment }}</p>
                        @endif
                    </div>
                
                    
                </div>
                
                <input id="teacher_buttun" type="submit" value="宿題を決める"/>
                
            </form>
            <!--宿題＆コメント-->
        
            <hr>
            <!--区切り線-->
        
            <div id="student">
                
                <div id="plans">
                    
                    <h2 class="headline">今週の計画</h2>
                    <table border="1">
                        
                        <tr>
                            <th class="column1"></th>
                            <th>日</th>
                            <th>月</th>
                            <th>火</th>
                            <th>水</th>
                            <th>木</th>
                            <th>金</th>
                            <th>土</th>
                        </tr>
                        <!--曜日-->
                        
                        <tr>
                            @if (is_null($plans1) && is_null($plans2) && is_null($plans3) && is_null($plans4) && is_null($plans5) && is_null($plans6) && is_null($plans7))
        
                                <td class="column1">計画</td>            
                                <td colspan="7"><p>計画を促そう！</p></td>
                            @else
                                <td class="column1">計画</td>
                                <td>
                                    @if(is_null($plans1->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans1->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans2->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans2->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans3->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans3->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans4->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans4->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans5->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans5->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans6->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans6->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans7->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans7->content }}</p>
                                    @endif
                                </td>
                            @endif
                        </tr>
                        <!--計画-->
                        
                        <tr id="submit_status">
                            <td class="column1">status</td>
                            <td>
                                @if(is_null($submits1))
                                <p class='table_item'>提出なし</p>
                                @else
                                <p class='table_item'><a href='{{ $submits1->image_id }}'>提出済み</p>
                                @endif
                            </td>
                            <td>
                                @if(is_null($submits2))
                                <p class='table_item'>提出なし</p>
                                @else
                                <p class='table_item'><a href='{{ $submits2->image_id }}'>提出済み</p>
                                @endif
                            <td>
                                @if(is_null($submits3))
                                <p class='table_item'>提出なし</p>
                                @else
                                <p class='table_item'><a href='{{ $submits3->image_id }}'>提出済み</p>
                                @endif
                            <td>
                                @if(is_null($submits4))
                                <p class='table_item'>提出なし</p>
                                @else
                                <p class='table_item'><a href='{{ $submits4->image_id }}'>提出済み</p>
                                @endif
                            <td>
                                @if(is_null($submits5))
                                <p class='table_item'>提出なし</p>
                                @else
                                <p class='table_item'><a href='{{ $submits5->image_id }}'>提出済み</p>
                                @endif
                            <td>
                                @if(is_null($submits6))
                                <p class='table_item'>提出なし</p>
                                @else
                                <p class='table_item'><a href='{{ $submits6->image_id }}'>提出済み</p>
                                @endif
                            <td>
                                @if(is_null($submits7))
                                <p class='table_item'>提出なし</p>
                                @else
                                <p class='table_item'><a href='{{ $submits7->image_id }}'>提出済み</p>
                                @endif
                        </tr>
                        <!--提出状況-->
                        
                        <tr>
                            <td class="column1">提出内容</td>
                            <td>
                                @if(is_null($submits1))
                                <p class='table_item'>お休み</p>
                                @else
                                <p class='table_item'>{{ $submits1->content }}</p>
                                @endif
                            </td>
                            <td>
                                @if(is_null($submits2))
                                <p class='table_item'>お休み</p>
                                @else
                                <p class='table_item'>{{ $submits3->content }}</p>
                                @endif
                            <td>
                                @if(is_null($submits3))
                                <p class='table_item'>お休み</p>
                                @else
                                <p class='table_item'>{{ $submits3->content }}</p>
                                @endif
                            <td>
                                @if(is_null($submits4))
                                <p class='table_item'>お休み</p>
                                @else
                                <p class='table_item'>{{ $submits4->content }}</p>
                                @endif
                            <td>
                                @if(is_null($submits5))
                                <p class='table_item'>お休み</p>
                                @else
                                <p class='table_item'>{{ $submits5->content }}</p>
                                @endif
                            <td>
                                @if(is_null($submits6))
                                <p class='table_item'>お休み</p>
                                @else
                                <p class='table_item'>{{ $submits6->content }}</p>
                                @endif
                            <td>
                                @if(is_null($submits7))
                                <p class='table_item'>お休み</p>
                                @else
                                <p class='table_item'>{{ $submits7->content }}</p>
                                @endif
                        </tr>
                        <!--提出内容-->
                        
                    </table>
                    <!--計画＆提出-->
                    
                </div>
                
            </div>
            <!--生徒提出情報-->
            
        </div><!-- body1 -->
        
        
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