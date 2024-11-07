<x-app-layout>
    
    <div class="flex flex-col justify-center items-center h-full">

        @if(is_null($students))
            <div>
                <p class="text-3xl">生徒の登録を待とう！</p>
            </div>
            
        @else
                
            <h1 class="text-3xl m-2">誰の指導をしますか</h1>
        
            <form method="POST" action="{{ route("screen.teacher") }}"
            class="flex flex-col m-2">
                @csrf
                
                <select name="student_id">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
                <button class="mt-2 bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded">
                    <input type="submit" value="次へ" />
                </button>
            </form>
            
        @endif
            
    </div>
</x-app-layout>
