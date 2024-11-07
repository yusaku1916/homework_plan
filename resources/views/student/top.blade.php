<x-app-layout>
  
  <div class="flex flex-col justify-center items-center h-full">
      <div class="flex flex-col sm:flex-row justify-center items-center w-full">
        <div class="flex flex-col justify-center items-center w-2/3 sm:w-1/3 mt-4 sm:mx-2">
            <h2 class="text-2xl mb-2">今週の宿題</h2>
            <div class="flex justify-center items-center border rounded bg-blue-50 w-full min-h-[200px] text-center">   
              @if(is_null($works))
                  <p class="text-xl">宿題が出るよ</p>
              @else
                  <p class="text-xl">{{ $works->content }}</p>
              @endif
            </div>
        </div>
        
        <div class="flex flex-col justify-center items-center w-2/3 sm:w-1/3 mt-4 sm:mx-2">
            <h2 class="text-2xl mb-2">コメント</h2>
            <div class="flex justify-center items-center border rounded bg-blue-50 w-full min-h-[200px] text-center">
              @if(is_null($works))
                  <p class="text-xl">adviceを待ちましょう</p>
              @else
                  <p class="text-xl">{{ $works->coment }}</p>
              @endif
            </div>
        </div>
      </div>
      
      <hr class="border border-blue-500 m-2">
      
      <div class="flex flex-col justify-center items-center w-full mb-4">
        <div class="flex flex-col justify-center items-center w-2/3">
          <h2 class="text-2xl mb-2">今週の計画</h2>
        
            <table class="divide-y min-w-full border border-gray-900 text-center">
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
            
            @if (is_null($plans1) && is_null($plans2) && is_null($plans3) && is_null($plans4) && is_null($plans5) && is_null($plans6) && is_null($plans7))
                
              <tbody class="bg-blue-50 divide-y divide-gray-800 min-w-full border border-gray-900">
                <tr>
                  <td colspan="7" class="p-2 text-center">
                    <p class="text-xl">学習予定を立てよう！</p>
                  </td>
                </tr>
              </tbody>
        
            @else
              <tbody>
                <tr>
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
                </tr>
              </tbody>
            </table>
        
            <button type=“button” onclick="location.href='/submits/create'"
            class="mb-2 mt-2 bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded">
              提出
            </button>
  
            @endif
          
          @if($works !== null && (is_null($plans1) && is_null($plans2) && is_null($plans3) && is_null($plans4) && is_null($plans5) && is_null($plans6) && is_null($plans7)))
            <button type=“button” onclick="location.href='/plans/create'"
            class="mb-2 bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded"><!-- onclick についてわかっていない -->
                計画を立てる
            </button>
          @endif
              
      </div>
    </div>
  </div>
</x-app-layout>