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
                <div class="mt-5 grid grid-cols-1 grid-rows-3 gap-5 w-full">
                    <div class="bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">رقم البطاقة الائتمانية</div>
                        <div class="text-center"></div>
                    </div>
                    <div class="bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">تاريخ الانتهاء</div>
                        <div class="text-center"></div>
                    </div>
                    <div class="bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">CVV</div>
                        <div class="text-center"></div>
                    </div>

                </div>
            </div>
            <form action="{{ route('done') }}" class="mt-20">
                <div class="mt-10 flex justify-end">
                    <button type="submit"
                        class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">اتمام
                        الشراء</button>
                </div>
            </form>
        </div>
    </div>
</x-theme-layout>
