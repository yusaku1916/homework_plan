<x-guest-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <select name="identify_id">
            <option value="1">先生</option>
            <option value="2">生徒</option>
        </select>
        
        <x-primary-button class="ml-4" type="submit">
            {{ __('Register') }}
        </x-primary-button>
    </form>
</x-guest-layout>