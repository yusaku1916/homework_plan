<x-app-layout>
		<div class="flex flex-col justify-center items-center h-full">
			<form class="flex flex-col justify-center items-center w-full"
			method="POST" action="{{ route('work.create') }}">
					@csrf
					<div class="flex flex-col sm:flex-row justify-center items-center w-full">
						<input type="hidden" name="student_id" value="{{ $student_id }}">
						<div class="flex flex-col justify-center items-center w-2/3 sm:w-1/3 mt-4 sm:mx-2">
								<h2 class="text-2xl mb-2">今週の宿題</h2>
								<div 
								class="flex justify-center items-center border rounded bg-blue-50 w-full min-h-[200px] text-center">
									@if(is_null($works))
											<p class="text-xl">宿題を出そう</p>
									@else
											<p class="text-xl">{{ $works->content }}</p>
									@endif
								</div>
						</div>
						
						<div class="flex flex-col justify-center items-center w-2/3 sm:w-1/3 mt-4 sm:mx-2">
								<h2 class="text-2xl mb-2">コメント</h2>
								<div 
								class="flex justify-center items-center border rounded bg-blue-50 w-full min-h-[200px] text-center">
									@if(is_null($works))
											<p class="text-xl">アドバイスやコメントを書こう</p>
									@else
											<p class="text-xl">{{ $works->coment }}</p>
									@endif
								</div>
						</div>
					</div>
					<button class="mt-2 bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded">
						<input id="teacher_buttun" type="submit" value="宿題を決める"/>
					</button>
					
					
			</form>
						<!--宿題＆コメント-->
				
			<hr class="border border-blue-200 m-2 w-full">
						<!--区切り線-->
				
        <div class="flex flex-col justify-center items-center w-2/3 mb-4">
          <h2 class="text-2xl mb-2">今週の計画</h2>
					<table class="divide-y min-w-full border border-gray-900 text-center">
						<thead class="bg-blue-200">
							<tr>
								<th class="border border-gray-900 w-auto"></th>
								<th class="border border-gray-900 w-1/7">日</th>
								<th class="border border-gray-900 w-1/7">月</th>
								<th class="border border-gray-900 w-1/7">火</th>
								<th class="border border-gray-900 w-1/7">水</th>
								<th class="border border-gray-900 w-1/7">木</th>
								<th class="border border-gray-900 w-1/7">金</th>
								<th class="border border-gray-900 w-1/7">土</th>
							</tr>
						</thead>
						<!--曜日-->
						<tbody class="bg-blue-50 divide-y divide-gray-800 min-w-full border border-gray-900">
							<tr>
								@if (is_null($plans1) && is_null($plans2) && is_null($plans3) && is_null($plans4) && is_null($plans5) && is_null($plans6) && is_null($plans7))
								<td class="border border-gray-900 w-auto">計画</td>            
								<td colspan="7"><p>計画を促そう！</p></td>
								@else
								<td class="border border-gray-900 w-auto">計画</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($plans1->content))
									<p>お休み</p>
									@else
									<p>{{ $plans1->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($plans2->content))
									<p>お休み</p>
									@else
									<p>{{ $plans2->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($plans3->content))
									<p>お休み</p>
									@else
									<p>{{ $plans3->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($plans4->content))
									<p>お休み</p>
									@else
									<p>{{ $plans4->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($plans5->content))
									<p>お休み</p>
									@else
									<p>{{ $plans5->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($plans6->content))
									<p>お休み</p>
									@else
									<p>{{ $plans6->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($plans7->content))
									<p>お休み</p>
									@else
									<p>{{ $plans7->content }}</p>
									@endif
								</td>
								@endif
							</tr>
							<!--計画-->
							<tr>
								<td class="border border-gray-900 w-auto">status</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits1))
									<p>なし</p>
									@else
									<p><a href='{{ $submits1->image_id }}'>済み</a></p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits2))
									<p>なし</p>
									@else
									<p><a href='{{ $submits2->image_id }}'>済み</a></p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits3))
									<p>なし</p>
									@else
									<p><a href='{{ $submits3->image_id }}'>済み</a></p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits4))
									<p>なし</p>
									@else
									<p><a href='{{ $submits4->image_id }}'>済み</a></p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits5))
									<p>なし</p>
									@else
									<p><a href='{{ $submits5->image_id }}'>済み</a></p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits6))
									<p>なし</p>
									@else
									<p><a href='{{ $submits6->image_id }}'>済み</a></p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits7))
									<p>なし</p>
									@else
									<p><a href='{{ $submits7->image_id }}'>済み</a></p>
									@endif
								</td>
							</tr>
							<!--提出状況-->
							<tr>
								<td class="border border-gray-900 w-auto">提出内容</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits1))
									<p>休</p>
									@else
									<p>{{ $submits1->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits2))
									<p>休</p>
									@else
									<p>{{ $submits2->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits3))
									<p>休</p>
									@else
									<p>{{ $submits3->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits4))
									<p>休</p>
									@else
									<p>{{ $submits4->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits5))
									<p>休</p>
									@else
									<p>{{ $submits5->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits6))
									<p>休</p>
									@else
									<p>{{ $submits6->content }}</p>
									@endif
								</td>
								<td class="border border-gray-900 w-1/7">
									@if(is_null($submits7))
									<p>休</p>
									@else
									<p>{{ $submits7->content }}</p>
									@endif
								</td>
							</tr>
						</tbody>
						
						<!--提出内容-->
							
					</table>
						<!--計画＆提出-->
						
				</div>
					
			</div>
						<!--生徒提出情報-->
						
		</div><!-- body1 -->
</x-app-layout>