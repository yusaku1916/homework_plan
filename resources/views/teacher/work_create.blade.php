<x-app-layout>
	<div class="flex flex-col justify-center items-center h-full">
    <form action="/works" method="POST"
     class="flex flex-col justify-center items-center w-full">
      @csrf
      
      <div class="flex flex-col sm:flex-row justify-center items-center w-full">
      
        <input type="hidden" name="work[teacher_student_id]" value="{{ $teacher_student_id }}"/>
        <input type="hidden" name="student_id" value="{{ $student_id }}"/>
        
        <div class="flex flex-col justify-center items-center w-2/3 sm:w-1/3 mt-4 sm:mx-2">
          <h3 class="text-2xl mb-2">今週の宿題</h3>
          <textarea name="work[content]" placeholder="新たな宿題"
          	class="flex justify-center items-center border rounded bg-blue-50 w-full min-h-[200px] text-center"></textarea>
          <p class="" style="color:red">{{ $errors->first() }}</p>
        </div>
        
        <div class="flex flex-col justify-center items-center w-2/3 sm:w-1/3 mt-4 sm:mx-2">
          <h3 class="text-2xl mb-2">コメント</h3>
          <textarea name="work[coment]" placeholder="コメントやアドバイス"
          	class="flex justify-center items-center border rounded bg-blue-50 w-full min-h-[200px] text-center"></textarea>
          <p class="" style="color:red">{{ $errors->first() }}</p>
        </div>
      
      </div>
      
      <buttun class="mt-2 bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded">
        <input type="submit" value="完了"/>
      </buttun>
      
    </form>
    
    <button type=“button” onclick="location.href='/'"
     class="mt-2 bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded">
      戻る
    </button>
  </div>

</x-app-laout>