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
                <li class="bg-ornage-start h-10 w-10 pt-1  rounded-full flex justify-center items-center">3</li>
                <li class="flex items-center justify-center">
                    <div class="w-10 sm:w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">4</li>
            </ul>
        </div>

        <div class="w-full">



            <form action="{{ route('shipping-store') }}" method="post">
                @csrf
                <div class="max-w-3xl mx-auto my-16">
                    @if (Auth::check())
                        @if ($addresses->count() > 0)
                            <div class="bg-white grid grid-cols-2 py-2 px-4">
                                <div class="">أختر عنوان من عناوينك المسجلة مسبقاُ</div>
                                <select name="city" id="city">
                                    <option disabled="disabled" value="">Select <Address></Address>
                                    </option>
                                    @foreach ($addresses as $address)
                                        <option value="{{ $address->id }}">{{ $address->city }}</option>

                                    @endforeach

                                </select>
                                <div class="text-center"></div>
                            </div>
                        @endif
                        <div class="bg-white grid grid-cols-2 py-2 px-4">

                            <div class="text-center">أو سجل عنوان جديد</div>
                        </div>
                    @endif


                    <div class="mt-5 grid grid-cols-1 grid-rows-5 gap-5 w-full">
                        <div class="bg-white grid grid-cols-2 py-2 px-4">
                            <div class="">الدولة</div>
                            <input type="text" name="country" id="country" class="text-grey-darkest">
                            <div class="text-center"></div>
                        </div>
                        <div class="bg-white grid grid-cols-2 py-2 px-4">
                            <div class="">المنطقة</div>
                            <select name="state" id="state">
                                <option disabled="disabled" value="">Select state</option>
                                <option value="">Aseer</option>
                            </select>
                            <div class="text-center"></div>
                        </div>
                        <div class="bg-white grid grid-cols-2 py-2 px-4">
                            <div class="">المدينة</div>
                            <select name="city" id="city">
                                <option disabled="disabled" value="">Select city</option>
                                <option value="">Abha</option>
                                <option value="">Khamis Mushait</option>
                                <option value="">Rijal Almaa</option>
                                <option value="">Ahad Rfida</option>

                            </select>
                            <div class="text-center"></div>
                        </div>
                        <div class="bg-white grid grid-cols-2 py-2 px-4">
                            <div class="">عنوان الشارع</div>
                            <input type="text" name="street_address" id="street_address" class="text-grey-darkest">

                            <div class="text-center"></div>
                        </div>

                        <div class="mt-10 flex justify-end">
                            <button type="submit"
                                class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">
                                حفظ العنوان</button>
                        </div>
            </form>
            <div class="bg-ornage-start grid grid-cols-2 py-2 px-4 text-white">
                <div class="">الإجمالي <span class="text-xs">شامل الضريبة</span></div>
                <div class="text-center">98.32 SR</div>
            </div>
        </div>
    </div>
    <form action="{{ route('payment') }}" class="mt-20">
        <div class="mt-10 flex justify-end">
            <button type="submit" class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">اتمام
                الشراء</button>
        </div>
    </form>
    </div>
    </div>

</x-theme-layout>
