<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">

        </div>


        <div class="w-full">
            <div class="max-w-4xl mx-auto my-16">




                <form method="POST" action="{{ route('register.seller') }}">
                    @csrf
                    <div class="mt-5 grid grid-cols-3 grid-rows-5 gap-5 w-full">

                        <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />

                        </div>
                        <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                            <x-jet-label for="name" value="Owner Name" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                required autofocus />

                        </div>
                        <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                            <x-jet-label for="name" value="Store Name" />
                            <x-jet-input id="store_name" class="block mt-1 w-full" type="text" name="store_name"
                                :value="old('store_name')" required autofocus />

                        </div>
                        <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                            <x-jet-label for="name" value="Cr" />
                            <x-jet-input id="cr" class="block mt-1 w-full" type="text" name="cr" :value="old('cr')"
                                required autofocus />

                        </div>
                        <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                            <x-jet-label for="name" value="Store Location" />
                            <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address"
                                :value="old('name')" required autofocus />

                        </div>
                        <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-jet-input id="vendor" class="block mt-1 w-full" type="hidden" name="vendor" required
                                value="1" />
                        </div>



                        <div class="col-span-2 bg-white-start grid grid-cols-2 py-2 px-4 text-white">

                            <button type="submit">

                                <div class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">
                                    تسجيل دخول
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
