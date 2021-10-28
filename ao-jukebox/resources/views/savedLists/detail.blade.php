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
                        @foreach($playlistsong as $key => $song)
                            @if($key == 0)
                            <li>{{ $song->Playlist()->id }}) {{ $song->Playlist()->saved_list }} | <a href="/saved-list/edit/{{$song->playlist_id}}">Edit name </a></li><br>
                            @endif
{{--                            {{ var_dump($song) }}--}}
                            <li>{{$song->Song()->song}} | <a href="/saved-list/delete/{{$song->id}}">Delete </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
