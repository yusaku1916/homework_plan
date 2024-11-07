<x-app-layout>
  <div class="flex flex-col justify-center items-center h-full">
    
    <h2 class="text-4xl my-4">今日の宿題の写真を提出しましょう！</h2>
    <form action='/submits' method='POST' enctype="multipart/form-data" class="w-full">
      @csrf
      <input type="hidden" name="student_id" value="1"/>
      
      <div class="flex flex-col justify-center items-center my-2">
        <h3 class="mt-4 mb-2 text-2xl">今日は何曜日？</h3>
        <select name="D_number">
          @foreach($days as $day)
            <option value="{{ $day->id }}">{{ $day->day }}</option>
          @endforeach
        </select>
      </div>
      
      <div class="flex flex-col justify-center items-center my-2">
        <h3 class="mt-4 mb-2 text-2xl">今日は何をした？</h3>
        <textarea name="content" placeholder="今週も頑張りましょう！" class="w-1/2 sm:w-1/3 min-h-[200px]">{{ old('content') }}</textarea>
        <p style="color:red">{{ $errors->first('content') }}</p>
      </div>
      
      <div class="flex flex-col justify-center items-center my-2">
        <h3 class="mt-4 mb-2 text-2xl">写真も送ろう！</h3>
        <input type="file" name="image">
        <p style="color:red">{{ $errors->first('image') }}</p>
      </div>
      
      <div class="flex justify-center items-center my-2">
        <button class="m-2 bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded"> 
          <input type="submit" value="完了" id="submit_input"/>
        </button>
        <button type=“button” onclick="location.href='/'"
        class="m-2  bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded">
          戻る
        </button>
      </div>
        
    </form>
  </div>
    
</x-app-layout>
