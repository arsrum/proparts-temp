<x-theme-layout>
    <div class="bg-gray-50 mb-32 max-w-7xl mx-auto mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">
            <ul class="flex text text-white font-bold">
                <li class="bg-ornage-start h-10 w-10 pt-1  rounded-full flex justify-center items-center">1</li>
                <li class="flex items-center justify-center">
                    <div class="w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">2</li>
                <li class="flex items-center justify-center">
                    <div class="w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">3</li>
                <li class="flex items-center justify-center">
                    <div class="w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">4</li>
            </ul>
        </div>

        <div class="w-full">
            <form action="{{ route('item-details') }}" class="mt-20">
                <div class="grid grid-cols-5 gap-4 px-10">
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/sub1.png" class="mb-5" alt="">
                        <h2 class="text-2xl">فلاتر الهواء</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/sub2.png" class="mb-5" alt="">
                        <h2 class="text-2xl">فلاتر الجيربوكس</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/sub3.png" class="mb-5" alt="">
                        <h2 class="text-2xl">فلاتر المكيف</h2>
                    </div>
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/sub4.png" class="mb-5" alt="">
                        <h2 class="text-2xl">فلاتر زيت</h2>
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
