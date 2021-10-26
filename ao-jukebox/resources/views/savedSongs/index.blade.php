<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Saved Songs') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach($savedSongs as $songs)
                            <li> {{$songs->id}}) {{$songs->song}} | <a href="/saved-song/delete/{{$songs->id}}">Delete </a> | <a href="/song/{{$songs->id}}">Detail</a></li>
                        @endforeach

                        <div class="flex items-center justify-end mt-4">
                            <a href="/Savedlists/add">Save as playlist</a>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
