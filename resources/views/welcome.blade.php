<x-guest-layout>
<section class="bg-white dark:bg-gray-900 min-h-screen items-center flex">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-20 xl:gap-30 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-6">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Lorem Ipsum</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo porta molestie. Suspendisse eu aliquam ipsum, eu varius velit. Donec quam nibh, tempor ut felis nec, lobortis porta magna. Nulla sed magna in eros maximus lacinia imperdiet non ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean sed dui suscipit, pulvinar elit at, hendrerit neque. Nam ut massa non tortor blandit auctor. Fusce ultricies ipsum venenatis, porttitor sem eget, euismod nisi. Nullam nec aliquam diam. Nam in tortor arcu. Aenean eget congue urna. </p>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Get started
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Speak to Sales
            </a>
        </div>
        <div class="place-self-center lg:col-span-6 w-full">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Request Form
                    </h1>
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form class="space-y-4 md:space-y-6" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input  id="email"  name="email" class="block mt-1 w-full" type="text" required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" required autofocus autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <x-primary-button class="bg-primary-700 ">
                            {{ __('Submit request') }}
                        </x-primary-button>
                        @if (session('success'))
                            <div class="alert alert-success text-green-700">{{ session('success') }}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</x-guest-layout>
