<x-app-layout>
  <div class="flex flex-col justify-center items-center h-full">
    <div class="flex flex-col sm:flex-row justify-center items-center w-full">
      <div class="flex flex-col justify-center items-center w-2/3 sm:w-1/3 mt-4 sm:mx-2">
        <h2 class="text-2xl mb-2">今週の宿題</h2>
        <div class="flex justify-center items-center border rounded bg-blue-50 w-full min-h-[200px] text-center">   
          <p class="text-xl">{{ $works->content }}</p>
        </div>
      </div>
      
      <div class="flex flex-col justify-center items-center w-2/3 sm:w-1/3 mt-4 sm:mx-2">
        <h2 class="text-2xl mb-2">コメント</h2>
        <div class="flex justify-center items-center border rounded bg-blue-50 w-full min-h-[200px] text-center">
          <p class="text-xl">{{ $works->coment }}</p>
        </div>
      </div>
    </div>
        
    <hr class="border border-blue-500 m-2">
        
    <div class="flex flex-col justify-center items-center w-full mb-4">
      <div class="flex flex-col justify-center items-center w-4/5">
        <h2 class="mt-4 mb-2 text-2xl">今週の計画</h2>
        <form action="/plans" method="POST" id="submit_table">
          <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-900 text-center divide-y">
              <thead class="bg-blue-200">
                <tr>
                  <th class="border border-gray-900 w-1/7">日</th>
                  <th class="border border-gray-900 w-1/7">月</th>
                  <th class="border border-gray-900 w-1/7">火</th>
                  <th class="border border-gray-900 w-1/7">水</th>
                  <th class="border border-gray-900 w-1/7">木</th>
                  <th class="border border-gray-900 w-1/7">金</th>
                  <th class="border border-gray-900 w-1/7">土</th>
                </tr>
              </thead>
              <tbody class="bg-blue-50 divide-y divide-gray-800 border border-gray-900">
                <tr>
                  @csrf
                  <input type="hidden" name="plan[work_id]" value="{{ $work_number }}">
                  <input type="hidden" name="plan[student_id]" value="1">
                  @for($i=1; $i<=7; $i++)
                  <input type="hidden" name="day_id[]" value="{{ $i }}">
                  <td class="border border-gray-900">
                    <textarea class="w-full h-24 p-2 border border-gray-400 rounded" name="content[]" placeholder="今週も頑張りましょう！"></textarea>
                  </td>
                  @endfor
                </tr>
              </tbody>
            </table>
          </div>
          <button
          class="mb-2 mt-2 bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded">
            <input id="submit" type="submit" value="完了"/>
          </button>
        </form>
      </div>
    </div>
    
    <button type="button" onclick="location.href='/'" class="mb-2 bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded">
      戻る
    </button>
  </div>
</x-app-layout>
