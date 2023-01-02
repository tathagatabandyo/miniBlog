<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        @if(session()->has('status'))
        <div class="mb-5 bg-purple-500 text-white text-sm py-2 px-4" style="background-color: #9c27b0; margin: 8px 0px;">
            {{ session('status') }}
        </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800">
                    <div class="flex flex-col">
                        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="align-middle inline-block min-w-full">
                                <div class="" style="max-height: 68vh;overflow-y: auto;">
                                    <table class="min-w-full divide-y divide-gray-400 text-center border" style="width: 100%;position: relative;">
                                        <thead class="border-b bg-gray-800" style="position: sticky; background-color: #000; top: 0; left: 0;">
                                            <tr>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                    Name
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                    Title
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                    Body
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-gray-600 text-white divide-y divide-gray-500">
                                            @if (count($posts)>0)
                                                @foreach ($posts as $post)
                                                <tr class="border">
                                                    <td class="px-6 py-4 whitespace-nowrap">{{$post->user->name}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{$post->title}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{$post->body}}</td>
                                                    {{-- @can('isAdmin') --}}
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">     
                                                        <a href="{{ url('/post/edit', $post->id) }}" class="bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white text-sm py-1 px-2 rounded" style="background-color: #9c27b0;margin-right: 4px;">Edit</a>
                                                        <a href="{{ url('/post/delete', $post->id) }}" class="bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white text-sm py-1 px-2 rounded ml-5" style="background-color: #f44336;margin-left: 4px;">Delete</a>
                                                    </td>
                                                    {{-- @endcan --}}
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr class="border">
                                                    <td class="px-6 py-4 whitespace-nowrap" colspan="4">No Data Found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>