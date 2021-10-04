<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">

        </div>


        <div class="w-full">
            <div class="max-w-4xl mx-auto my-16">


                @if (session()->has('message'))
                    <div class="bg-red-900 text-center py-4 lg:px-4">
                        <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex"
                            role="alert">

                            <span class="font-semibold mr-2 text-left flex-auto">
                                {{ session()->get('message') }}</span>

                            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                            </svg>


                        </div>
                    </div>


                @endif

                <form method="POST" action="{{ route('login.custom') }}">
                    @csrf

                    <div class="mt-5 grid grid-cols-3 grid-rows-5 gap-5 w-full">

                        <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />

                        </div>
                        <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="current-password" />
                        </div>



                        <div class="col-span-2 bg-white-start grid grid-cols-2 py-2 px-4 text-white">

                            <button type="submit">

                                <div class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">
                                    Login
                                </div>

                            </button>
                        </div>
                    </div>

            </div>


        </div>
        </form>
    </div>
    </div>

</x-theme-layout>
