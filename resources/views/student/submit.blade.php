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
        <h1>今日の宿題の写真を提出しましょう！</h1>
        <!--select>
            foreach$plans as $plan)
                <option value="{ $plan->id }}">{ $teacher->name }}</option>
            endforeach
        </select-->
        <form action='/submits' method='POST' enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="student_id" value="1"/>
            
            <select name="D_number">
                @foreach($days as $day)
                    <option value="{{ $day->id }}">{{ $day->day }}</option>
                @endforeach
            </select>
            
            <div>
                <textarea name="content" placeholder="今週も頑張りましょう！">{{ old('content') }}</textarea>
                <p style="color:red">{{ $errors->first('content') }}</p>
            </div>
            
            <div>
                <h2>写真でも記録しよう！</h2>
                <input type="file" name="image">
                <p style="color:red">{{ $errors->first('image') }}</p>
            </div>
            
            <input type="submit" value="完了"/>
            
        </form>
        <button type=“button” onclick="location.href='/'"><!-- onclick についてわかっていない -->
            戻る
        </button>
        <hr>
        
    </body>
    </x-app-layout>
</html>