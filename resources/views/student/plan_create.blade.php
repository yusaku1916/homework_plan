<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>計画を立てよう！</h1>
        <div class='works'>
            <div>
                <h2>今週の宿題</h2>
                <p class='works_content'>{{ $works->content }}</p>
            </div>
            <div>
                <h2>アドバイス・コメント</h2>
                <p　class='coment'>{{ $works->coment }}</p>
            </div>
        </div>
        <hr>
        <form action="/plans" method="POST">
            @csrf
            <!--<textarea name="plan[day_id]" placeholder="今週も頑張りましょう！">-->
            <input type="hidden" name="plan[work_id]" value="1">
            <input type="hidden" name="plan[student_id]" value="1">
            <div>
            <h2>今週の計画</h2>
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
                    <td>
                        <input type="hidden" name="plan[day_id]" value="1">
                        <textarea name="plan[content]" placeholder="今週も頑張りましょう！"></textarea>
                        </textarea></td>
                    <td>
                        <input type="hidden" name="plan[day_id]" value="2">
                        <textarea name="plan[content]" placeholder="今週も頑張りましょう！"></textarea>
                        </textarea></td>
                    <td>
                        <input type="hidden" name="plan[day_id]" value="3">
                        <textarea name="plan[content]" placeholder="今週も頑張りましょう！"></textarea>
                        </textarea></td>
                    <td>
                        <input type="hidden" name="plan[day_id]" value="4">
                        <textarea name="plan[content]" placeholder="今週も頑張りましょう！"></textarea>
                        </textarea></td>
                    <td>
                        <input type="hidden" name="plan[day_id]" value="5">
                        <textarea name="plan[content]" placeholder="今週も頑張りましょう！"></textarea>
                        </textarea></td>
                    <td>
                        <input type="hidden" name="plan[day_id]" value="6">
                        <textarea name="plan[content]" placeholder="今週も頑張りましょう！"></textarea>
                        </textarea></td>
                    <td>
                        <input type="hidden" name="plan[day_id]" value="7">
                        <textarea name="plan[content]" placeholder="今週も頑張りましょう！"></textarea>
                        </textarea></td>
                </tr>
            </table>
        </div>
            <input type="submit" value="完了"/>
        </form>
        <button type=“button” onclick="location.href='/'"><!-- onclick についてわかっていない -->
            戻る
        </button>
        <hr>
        
    </body>
</html>