<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">
            <ul class="flex text text-white font-bold">
                <li class="bg-ornage-start h-10 w-10 pt-1  rounded-full flex justify-center items-center">1</li>
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
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">4</li>
            </ul>
        </div>

        <div class="w-full">
            <form method="POST" action="{{ route('getVehicleByVin') }}" class="mt-20">
                @csrf
                <div class="flex flex-col sm:flex-row justify-center sm:space-x-8 sm:space-x-reverse">
                    <div class="">
                        <label class="block text-xl font-black mb-1" for="">الشركة</label>
                        <select id="country" name="manuId"
                            class="border-transparent bg-gray-100 rounded-full w-full sm:w-auto mb-5 sm:mb-0">
                            <option value="" selected disabled>الشركة المصنعة </option>
                            @foreach ($data as $key => $country)
                                <option value="{{ $country->manuId }}">
                                    {{ $country->manuName }}</option>
                            @endforeach
                        </select>


                    </div>
                    <div class="">
                        <label class="block text-xl font-black mb-1" for="">النوع</label>
                        <select name="modelId" id="state"
                            class="border-transparent bg-gray-100 rounded-full  w-full sm:w-auto mb-5 sm:mb-0""><option value="">أختر النوع</option></select>

                        
                    </div>
                    <div class="">
                        <label class=" block text-xl font-black mb-1" for="">الموديل</label>
                            <select
                                class="border-transparent bg-gray-100 rounded-full  w-full sm:w-auto mb-5 sm:mb-0"" name="" id="">
                            <option value="">أختر الموديل </option>
                        </select>
                    </div>
                    <div class="">
                        <label class=" block text-xl font-black mb-1" for="">الفئة</label>
                                <select
                                    class="border-transparent bg-gray-100 rounded-full  w-full sm:w-auto mb-5 sm:mb-0"" name="" id="">
                            <option value="">SOON</option>
                        </select>
                    </div>
                    <div class=" sm:mt-8 text-3xl font-bold text-ornage-start">أو
                    </div>
                    <div class="">
                        <label class="block text-xl font-black mb-1" for="">
                            رقم الهيكل</label>
                        <input type="text" name="vin" id="vin" value="KMHCT41DXEU538925" placeholder="أدخل رقم الهيكل"
                            class="border-transparent bg-gray-100 rounded-full  w-full sm:w-auto mb-8 sm:mb-0"">
                        <div class=" text-center">
                    </div>

                </div>
        </div>
        <div class=" mt-10 flex justify-end">
            <button type="submit"
                class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">البدء</button>
        </div>
        </form>
    </div>
    <div class="mt-5">
        <ul class="flex text text-white font-bold">
            <li class="flex items-center justify-center">
                <div class="w-10 sm:w-32 bg-pp-blue h-px"></div>
            </li>
            <li class="flex items-center justify-center">
                <div class="w-10 sm:w-32 bg-pp-blue h-px"></div>
            </li>
            <li class="flex items-center justify-center">
                <div class="w-10 sm:w-32 bg-pp-blue h-px"></div>
            </li>
        </ul>
    </div>
    <div class=" pt-3 pb-2 px-4 font-bold text-ornage-start text-xl">
        منتجات Pro Parts
    </div>

    <form action="" class="mt-20">
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 px-4 sm:px-10">
            @foreach ($Products as $product)
                <a href="{{ route('admin.products.show', $product->id) }}">
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        <img src="imgs/default.png" class="mb-5" alt="">
                        <h2 class="text-lg sm:text-2xl text-center">نظام الفرامل</h2>
                    </div>
                </a>
            @endforeach


        </div>

    </form>


</x-theme-layout>
