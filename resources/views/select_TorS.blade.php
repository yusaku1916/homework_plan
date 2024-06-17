<x-guest-layout>
    
    <form action="{{ route('select.TorS.store') }}" method="POST">
        @csrf
        <select name="identify_id">
            <option value="1" {{ old('identify_id') == '1' ? 'selected' : '' }}>先生</option>
            <option value="2" {{ old('identify_id') == '2' ? 'selected' : '' }}>生徒</option>
        </select>
        
        <x-primary-button class="ml-4" type="submit">
            {{__('Register')}}
        </x-primary-button>
    </form>
    <style>
        background-image{
            font-family: 'Kiwi Maru', sans-serif;
        }
    </style>
    
</x-guest-layout>