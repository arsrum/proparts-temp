<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">

        </div>


        <div class="w-full">
            <div class="max-w-xl mx-auto my-16">




                <form method="POST" action="{{ route('register.custom') }}">
                    @csrf

                    <div class="mt-5 grid grid-cols-1 gap-5 w-full">

                        <div class="bg-white grid grid-cols-2 items-center py-2 px-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />

                        </div>
                        <div class="bg-white grid grid-cols-2 items-center py-2 px-4">
                            <x-jet-label for="name" value="{{ __('name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                required autofocus />

                        </div>
                        <div class="bg-white grid grid-cols-2 items-center py-2 px-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="current-password" />
                        </div>



                        <div class="bg-white-start grid grid-cols-2 items-center py-2 px-4 text-white">

                            <button type="submit"
                                class="col-start-2 text-xl text-white font-bold bg-ornage-start pb-1 pt-2 rounded-2xl">
                                Register
                            </button>
                        </div>
                    </div>

            </div>


        </div>
        </form>
    </div>
    </div>

</x-theme-layout>
