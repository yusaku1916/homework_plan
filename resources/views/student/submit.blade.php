<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/css/submit.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1 id="HEAD">宿題連絡帳</h1>
        <h2>今日の宿題の写真を提出しましょう！</h2>
        <!--select>
            foreach$plans as $plan)
                <option value="{ $plan->id }}">{ $teacher->name }}</option>
            endforeach
        </select-->
        <form action='/submits' method='POST' enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="student_id" value="1"/>
            
            <div>
                <h3 class="headline">今日は何曜日？</h3>
                <select name="D_number">
                    @foreach($days as $day)
                        <option value="{{ $day->id }}">{{ $day->day }}</option>
                    @endforeach
                </select>
            </div>
            
            
            <div>
                <h3 class="headline">今日は何をした？</h3>
                <textarea name="content" placeholder="今週も頑張りましょう！">{{ old('content') }}</textarea>
                <p style="color:red">{{ $errors->first('content') }}</p>
            </div>
            
            <div>
                <h3>写真でも記録しよう！</h3>
                <input type="file" name="image">
                <p style="color:red">{{ $errors->first('image') }}</p>
            </div>
            
            <input type="submit" value="完了"/>
            
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