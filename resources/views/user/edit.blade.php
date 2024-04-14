<x-app-layout>
    <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 mt-5 py-10 max-w-2xl">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Edit Employer
            </h3>

        </div>
        <!-- Modal body -->
        <form method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <x-input-label for="euser_name" :value="__('Name')" />
                    <x-text-input  value="{{$user->name}}" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input value="{{$user->email}}" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input  id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="euser_name" :value="__('Phone')" />
                    <x-text-input value="{{$user->phone}}"  id="euser_phone" class="block mt-1 w-full" type="text" name="phone" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

            </div>
            <div class="flex items-center space-x-4">
                <x-primary-button class="ms-3 bg-primary-700">
                    {{ __('Edit employer') }}
                </x-primary-button>
            </div>
            @if (session('success'))
                <div class="alert alert-success text-green-700">{{ session('success') }}</div>
            @endif
        </form>
    </div>
    </div>
</x-app-layout>
