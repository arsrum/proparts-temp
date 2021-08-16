<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">
            <ul class="flex text text-white font-bold">
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">1</li>
                <li class="flex items-center justify-center">
                    <div class="w-10 sm:w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">2</li>
                <li class="flex items-center justify-center">
                    <div class="w-10 sm:w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">3</li>
                <li class="flex items-center justify-center">
                    <div class="w-10 sm:w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-ornage-start h-10 w-10 pt-1  rounded-full flex justify-center items-center">4</li>
            </ul>
        </div>

        <div class="w-full">
            <div class="max-w-3xl mx-auto my-16">

                <p class="text-center text-3xl font-light">
                    You Order Has been done successfully ... we hope you had a wonderful experience with ProParts</p>

            </div>
            <div class="mt-10 flex justify-end">

                <form action="{{ route('Cart-Clear') }}" method="POST" class="mt-20">
                    @csrf
                    <div class="mt-10 flex justify-end">
                        <button type="submit"
                            class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">
                            BackHome </button>
                    </div>
                </form>
                {{-- <a href="{{ route('home') }}" type="submit"
                    class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">العودة للرئيسية</a> --}}
            </div>
        </div>
    </div>
</x-theme-layout>
