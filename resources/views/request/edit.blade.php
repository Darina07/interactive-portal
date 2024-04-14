<x-app-layout>
<div class="grid grid-cols-3">
    <div class="my-12 mx-12 col-span-2 p-10 rounded shadow dark:bg-gray-800 dark:border-gray-700">
        <header>
            <h2 class="text-lg font-medium text-white">
                {{ __('Request Information') }}
            </h2>
            <x-auth-session-status class="mb-4" :status="session('status')" />

        </header>

        <form class="mt-6 space-y-6" method="POST">
            @csrf
            @method('put')

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input value="{{$formrequest->name}}" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input value="{{$formrequest->email}}" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div>
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input value="{{$formrequest->phone}}" id="phone" name="phone" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>


            <div class="flex items-center gap-4">
                <x-primary-button class="bg-primary-700">{{ __('Update request') }}</x-primary-button>
                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 bg-primary-400" href="mailto:{{$formrequest->email}}">{{ __('Send email') }}</a>

            </div>
    </div>
    <div class="my-12 mx-12 p-10 rounded shadow  dark:bg-gray-800 dark:border-gray-700 mt-6 space-y-6">
        <header>
            <h2 class="text-lg font-medium text-white">
                {{ __('Additional Information ') }}
            </h2>
            <p class="text-white text-xs"><span class="bold">Created at: {{$formrequest->created_at}}</p>
            <p class="text-white text-xs"><span class="bold">Updated at: {{$formrequest->created_at}}</p>

        </header>

            <div>
                <x-input-label for="name" :value="__('Assigned to')" />
                <select name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="0">Select employee</option>

                    <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                    @can('admin')
                        @foreach($users as $user)
                            @if(auth()->user()->id != $user->id)
                                <option value="{{$user->id}}" {{$formrequest->user_id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                            @endif
                        @endforeach
                    @endcan
                </select>
            </div>
            <div>
                <x-input-label for="name" :value="__('Status')" />
                <select id="category" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="0" {{$formrequest->status == 0 ? 'selected' : ''}}>Pending</option>
                    <option value="1" {{$formrequest->status == 1 ? 'selected' : ''}}>Progress</option>
                    <option value="2" {{$formrequest->status == 2 ? 'selected' : ''}}>Completed</option>
                    <option value="3" {{$formrequest->status == 3 ? 'selected' : ''}}>Cancelled</option>
                </select>
            </div>
            <div>
                <x-input-label for="note" :value="__('Note')" />
                <textarea name="note" class="h-56 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1">
                {{$formrequest->note}}</textarea>
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button class="bg-primary-700">{{ __('Update note') }}</x-primary-button>

            </div>

        </form>
        @if (session('success'))
            <div class="alert alert-success text-green-700">{{ session('success') }}</div>
        @endif

    </div>
</div>
</x-app-layout>
