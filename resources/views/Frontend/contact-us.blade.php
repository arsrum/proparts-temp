<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">
            <div class="bg-white pt-3 pb-2 px-4 font-bold text-ornage-start text-xl">
                Contact Us
            </div>
        </div>
        @if (Session::has('success'))

            <div class="bg-green-900 text-center py-4 lg:px-4">
                <div class="p-2 bg-green-800 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex"
                    role="alert">
                    <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">Done</span>
                    <a href="{{ route('shipping-details') }}">
                        <span class="font-semibold mr-2 text-left flex-auto">{{ Session::get('success') }}</span>
                    </a>


                </div>
            </div>

        @endif
        <div class="w-full">

            <form action="{{ route('contact-us.store') }}" method="post" class="mt-20">
                @csrf
                <div class="max-w-3xl mx-auto my-16">
                    <div class="mt-5 grid grid-cols-1 grid-rows-3 gap-5 w-full">
                        <div class="bg-white grid grid-cols-2 py-2 px-4">
                            <div class="">Name</div>
                            <input type="text" name="name" id="name">
                            <div class="text-center"></div>
                        </div>

                        <div class="bg-white grid grid-cols-2 py-2 px-4">
                            <div class=""> Message</div>
                            <input type="text" name="message" id="message">

                            <div class="text-center"></div>
                        </div>
                        <div class="bg-white grid grid-cols-2 py-2 px-4">
                            <div class="">Mobile </div>
                            <input type="number" name="mobile" id="mobile">
                            <div class="text-center"></div>
                        </div>


                    </div>
                </div>
                <div class="mt-10 flex justify-end">
                    <button type="submit" class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">
                        Send</button>
                </div>
            </form>
        </div>
    </div>
</x-theme-layout>
