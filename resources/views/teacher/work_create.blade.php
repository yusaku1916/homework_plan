<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/work_create.css') }}">
    </head>
    <body>
        
        <h1 class="HEAD">宿題連絡帳</h1>
        
        <h2>先生ページ</h2>
        
        <form id="teacher" action="/works" method="POST">
            @csrf
            
            <div id="work_input">
                <input type="hidden" name="work[teacher_student_id]" value="{{ $teacher_student_id }}"/>
                <input type="hidden" name="student_id" value="{{ $student_id }}"/>
                
                <div id="work">
                    <h3 class="headline">今週の宿題</h3>
                    <textarea class="work_content" name="work[content]" placeholder="新たな宿題"></textarea>
                    <p class="content_error" style="color:red">{{ $errors->first('work.content') }}</p>
                </div>
                
                <div id="advice">
                    <h3 class="headline">アドバイス・コメント</h3>
                    <textarea class="work_coment" name="work[coment]" placeholder="コメントやアドバイス"></textarea>
                    <p class="coment__error" style="color:red">{{ $errors->first('work.coment') }}</p>
                </div>
            </div>
            
            
            <input id="work_store" type="submit" value="完了"/>
            
        </form>
        
        <button type=“button” onclick="location.href='/'"><!-- onclick についてわかっていない -->
            戻る
        </button>
        
        
        <form id="logout" method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
        
    </body>
</html>