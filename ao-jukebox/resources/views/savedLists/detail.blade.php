<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Saved Lists') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        <li>{{ $playlist->id }}) {{ $playlist->saved_list }} | <a href="/saved-list/edit/{{$playlist->id}}">Edit name </a></li><br>
                        @foreach($playlist->songs() as $song)
                            <li>{{$song->song}} | <a href="/saved-list/delete/{{$song->id}}">Delete </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
