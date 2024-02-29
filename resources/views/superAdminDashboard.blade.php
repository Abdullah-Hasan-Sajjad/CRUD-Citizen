<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex flex-row pb-8 justify-between">
                    
                        <h1 class="font-bold">Citizens !</h1>

                        <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="window.location.href='{{route('createUser')}}'">Create Citizen</button>
                    </div>

                    <!-- Table -->

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ID | User info
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Created at
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Updated at
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Edit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                            
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="text-base font-semibold">{{$user->id}}</div>
                                                <div class="ps-3">
                                                    <div class="text-base font-semibold">{{$user->name}}</div>
                                                    <div class="font-normal text-gray-500">{{$user->email}}</div>
                                                </div>  
                                            </th>
                                            <td class="px-6 py-4">
                                                {{$user->name}}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    {{$user->email}}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-300 me-2"></div>{{$user->created_at}}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-yellow-300 me-2"></div>{{$user->updated_at}}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-gray-500 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{route('updateUser', $user->id)}}" >Update</a>
                                            </td>
                                            <td class="px-6 py-4">
                                                <form action="{{route('deleteUser', $user->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                
                                                    <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-gray-500 rounded-md hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete user</button>

                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    <!--End Table-->


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

