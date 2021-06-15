<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">
            <ul class="flex text text-white font-bold">
                <li class="bg-ornage-start h-10 w-10 pt-1  rounded-full flex justify-center items-center">1</li>
                <li class="flex items-center justify-center">
                    <div class="w-16 sm:w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">2</li>
                <li class="flex items-center justify-center">
                    <div class="w-16 sm:w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">3</li>
                <li class="flex items-center justify-center">
                    <div class="w-16 sm:w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">4</li>
            </ul>
        </div>

        <div class="w-full">
            <form action="{{ route('sub-parts') }}" class="mt-20">
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 px-4 sm:px-10">
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/breaks.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">نظام الفرامل</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/body.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">البودي</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/filters.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">الفلاتر</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/ac.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">نظام التبريد</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/engine.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">المحرك</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/elec.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">الأجزاء الكهربائية</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/gear.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">الجيربوكس</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/shas.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">الشاصية</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/acc.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">الإكسسوارات</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/tools.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">أدوات ومعدات</h2>
                    </div>
                </div>
                <div class="mt-10 flex justify-end">
                    <button type="submit"
                        class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">التالي</button>
                </div>
            </form>
        </div>
    </div>
</x-theme-layout>
