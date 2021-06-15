<x-theme-layout>
    <div class="bg-white max-w-7xl mx-auto mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
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
            <form action="{{ route('main-parts') }}" class="mt-20">
                <div class="flex justify-center space-x-8 space-x-reverse">
                    <div class="">
                        <label class="block text-xl font-black mb-1" for="">الشركة</label>
                        <select class="border-transparent bg-gray-100 rounded-full" name="" id="">
                            <option value="">اختر الشركة المصنعة</option>
                        </select>
                    </div>
                    <div class="">
                        <label class="block text-xl font-black mb-1" for="">النوع</label>
                        <select class="border-transparent bg-gray-100 rounded-full" name="" id="">
                            <option value="">نوع السيارة</option>
                        </select>
                    </div>
                    <div class="">
                        <label class="block text-xl font-black mb-1" for="">الموديل</label>
                        <select class="border-transparent bg-gray-100 rounded-full" name="" id="">
                            <option value="">موديل السيارة</option>
                        </select>
                    </div>
                    <div class="mt-8 text-3xl font-bold text-ornage-start">أو</div>
                    <div class="">
                        <label class="block text-xl font-black mb-1" for="">رقم الهيكل</label>
                        <select class="border-transparent bg-gray-100 rounded-full" name="" id="">
                            <option value="">ابحث برقم الهيكل</option>
                        </select>
                    </div>
                </div>
                <div class="mt-10 flex justify-end">
                    <button type="submit"
                        class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">البدء</button>
                </div>
            </form>
        </div>
    </div>
</x-theme-layout>
