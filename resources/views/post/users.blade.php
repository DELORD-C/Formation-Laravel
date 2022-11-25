<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>
    <div class="flex-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mx-auto mb-4 mt-4 sm:max-w-xl text-center">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto w-full block" href="{{ url('/post/create') }}">Create a new post</a>
            <table class="table-auto w-full mt-4 text-left">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Posts</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @foreach($user->posts as $post)
                                <span>{{ $post->id }}</span>
                            @endforeach
                        </td>
                        <td>
                            <form method="POST" action="{{ url('/post/' . $post->id) }}">
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ url('/post/' . $post->id) }}">Show</a>
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ url('/post/' . $post->id . "/edit") }}">Edit</a>
                                @method('DELETE')
                                @csrf
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

