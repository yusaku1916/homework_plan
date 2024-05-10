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
        <div id="body">
            <div id="body1">
                @if($identify_id == 1)
                
                    @if(is_null($students))
                    
                        <p id="no_student">生徒の登録を待とう！</p>
                        
                    @else
                    
                        <h1 class="HEAD">誰の指導をしますか</h1>
                        
                        <form method="POST" action="{{ route("screen.teacher") }}">
                            @csrf
                            
                            <div id="student_select">
                                <select name="student_id">
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                                <input class="student_select_1" type="submit" value="次へ"/>
                            </div>
                            
                        </form>
                        
                    @endif
                    
                @elseif($identify_id == 2)
                
                    <h1 class="HEAD">宿題連絡帳</h1>
                    
                    <div id='teacher'>
                        
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
                    
                    <hr>
                    
                    
                    <div id='plans'>
                        <h2 class="headline">今週の計画</h2>
                        <button type=“button” onclick="location.href='/plans/create'"><!-- onclick についてわかっていない -->
                            計画を立てる
                        </button>
                        
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
                    <div class="submit">
                        <button type=“button” onclick="location.href='/submits/create'">
                            提出
                        </button>
                    </div>
                @endif
            </div>
            
            
            <!--button onclick="location.href='/logout'">
                ログアウト
            </button-->
            <form id="logout" method="POST" action="{{ route('logout') }}">
                @csrf
    
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
        

    </body>
    <!--/x-app-layout-->
</html>