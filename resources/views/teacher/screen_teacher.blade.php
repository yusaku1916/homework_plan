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
        <h1 class="HEAD">宿題連絡帳</h1>
        <form method="POST" action="{{ route('work.create') }}">
            
            @csrf
            
            <input type="hidden" name="student_id" value="{{ $student_id }}">
                
            <div id='teacher'>
                
                <div id="work">
                    <h2 class="headline">今週の宿題</h2>
                    @if(is_null($works))
                        <p class='work_content'>宿題決めよー</p>
                    @else
                        <p class='work_content'>{{ $works->content }}</p>
                    @endif
                </div>
                
                <div id="advice">
                    <h2 class="headline">アドバイス・コメント</h2>
                    @if(is_null($works))
                        <p class='work_coment'>advice書け</p>
                    @else
                        <p class='work_coment'>{{ $works->coment }}</p>
                    @endif
                </div>
            
                
            </div>
            
            <input type="submit" value="宿題を決める" id="teacher_buttun"/>
            
        </form>
        
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
                
                <tr>
                    <td>
                        @if(is_null($submits1))
                        <p>お休み</p>
                        @else
                        <p>{{ $submits1->content }}</p>
                        @endif
                    </td>
                    <td>
                        @if(is_null($submits2))
                        <p>お休み</p>
                        @else
                        <p>{{ $submits3->content }}</p>
                        @endif
                    <td>
                        @if(is_null($submits3))
                        <p>お休み</p>
                        @else
                        <p>{{ $submits3->content }}</p>
                        @endif
                    <td>
                        @if(is_null($submits4))
                        <p>お休み</p>
                        @else
                        <p>{{ $submits4->content }}</p>
                        @endif
                    <td>
                        @if(is_null($submits5))
                        <p>お休み</p>
                        @else
                        <p>{{ $submits5->content }}</p>
                        @endif
                    <td>
                        @if(is_null($submits6))
                        <p>お休み</p>
                        @else
                        <p>{{ $submits6->content }}</p>
                        @endif
                    <td>
                        @if(is_null($submits7))
                        <p>お休み</p>
                        @else
                        <p>{{ $submits7->content }}</p>
                        @endif
                </tr>
                
                <tr>
                    <td>
                        @if(is_null($submits1))
                        <p>提出なし</p>
                        @else
                        <p><a href='{{ $submits1->image_id }}'>提出済み</p>
                        @endif
                    </td>
                    <td>
                        @if(is_null($submits2))
                        <p>提出なし</p>
                        @else
                        <p><a href='{{ $submits2->image_id }}'>提出済み</p>
                        @endif
                    <td>
                        @if(is_null($submits3))
                        <p>提出なし</p>
                        @else
                        <p><a href='{{ $submits3->image_id }}'>提出済み</p>
                        @endif
                    <td>
                        @if(is_null($submits4))
                        <p>提出なし</p>
                        @else
                        <p><a href='{{ $submits4->image_id }}'>提出済み</p>
                        @endif
                    <td>
                        @if(is_null($submits5))
                        <p>提出なし</p>
                        @else
                        <p><a href='{{ $submits5->image_id }}'>提出済み</p>
                        @endif
                    <td>
                        @if(is_null($submits6))
                        <p>提出なし</p>
                        @else
                        <p><a href='{{ $submits6->image_id }}'>提出済み</p>
                        @endif
                    <td>
                        @if(is_null($submits7))
                        <p>提出なし</p>
                        @else
                        <p><a href='{{ $submits7->image_id }}'>提出済み</p>
                        @endif
                </tr>
                
            </table>
            
    </body>
    <!--/x-app-layout-->
</html>