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
            <div class="max-w-4xl mx-auto my-16">
                <div class="bg-white pt-3 pb-2 px-4 font-bold text-ornage-start text-xl">قفيس رباط خرطوم الهواء رقم 1
                </div>
                <div class="mt-5 grid grid-cols-3 grid-rows-5 gap-5 w-full">
                    <div class="row-span-4 bg-white"><img src="imgs\item.png" alt=""></div>
                    <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">موديل السيارة</div>
                        <div class="text-center">ES240, ES250, ES300H, ES350</div>
                    </div>
                    <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">نوع السيارة</div>
                        <div class="text-center">SEDAN</div>
                    </div>
                    <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">نوع القطعة</div>
                        <div class="text-center">أصلي</div>
                    </div>
                    <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">المحرك</div>
                        <div class="text-center">2.5L</div>
                    </div>

                    <div class="bg-ornage-start flex items-center justify-center text-white font-bold">إضافة للعربة
                    </div>
                    <div class="col-span-2 bg-ornage-start grid grid-cols-2 py-2 px-4 text-white">
                        <div class="">السعر <span class="text-xs">شامل الضريبة</span></div>
                        <div class="text-center">98.32 SR</div>
                    </div>
                </div>
            </div>
            <form action="{{ route('item-details') }}" class="mt-20">
                <div class="mt-10 flex justify-end">
                    <button type="submit"
                        class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">اتمام
                        الشراء</button>
                </div>
            </form>
        </div>
    </div>
</x-theme-layout>
