<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center" method="POST">
                            <label for="simple-search" class="sr-only">Search</label>
                            @csrf
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Employer name</th>
                            <th scope="col" class="px-4 py-3">E-mail</th>
                            <th scope="col" class="px-4 py-3">Phone</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Assigned to</th>
                            <th scope="col" class="px-8 py-3 text-right">
                                <span class="">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($formrequests as $request)

                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{$request->name}}</td>
                                <td class="px-4 py-3">{{$request->email}}</td>
                                <td  class="px-4 py-3">{{$request->phone}}</td>
                                <td class="px-4 py-3">
                                    {{$request->status == 0 ? 'Pending' : ''}}
                                    {{$request->status == 1 ? 'Progress' : ''}}
                                    {{$request->status == 2 ? 'Completed' : ''}}
                                    {{$request->status == 3 ? 'Cancelled' : ''}}</td>
                                <td  class="px-4 py-3">{{$request->user?->name}}</td>

                                <td class="px-4 py-3 flex items-center justify-end">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 flex" aria-labelledby="apple-imac-27-dropdown-button">
                                        <li>
                                            <a href="/request/{{$request->id}}"  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li class="flex">
                                            <form action="{{ route('request.destroy', $request->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    {{ $formrequests->links() }}
                </nav>
            </div>
        </div>
    </section>
</x-app-layout>
