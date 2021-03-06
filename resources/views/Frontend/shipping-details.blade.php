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
            <form action="{{ route('payment') }}" method="POST" class="mt-20">

                @csrf


                <div class="max-w-3xl mx-auto my-16">
                    @if (Auth::check())
                        @if ($addresses->count() > 0)
                            <div class="bg-white grid grid-cols-2 py-2 px-4">
                                <div class="">أختر عنوان من عناوينك المسجلة مسبقاُ</div>
                                <select name="address" id="address">
                                    <option selected="true" disabled="disabled" value="0">أختر عنوان <Address></Address>
                                    </option>
                                    @foreach ($addresses as $address)
                                        <option value="{{ $address->id }}">
                                            {{ $address->city }}</option>

                                    @endforeach

                                </select>
                                <div class="text-center"></div>
                            </div>
                        @endif

                        <div class=" pt-3 pb-2 px-4 font-bold text-ornage-start text-xl">
                            أو سجل عنوان جديد
                        </div>


                        <div class="mt-5 grid grid-cols-1 grid-rows-5 gap-5 w-full">
                            <div class="bg-white grid grid-cols-2 py-2 px-4">
                                <div class="">الدولة</div>
                                <div class="text-center">
                                    <x-jet-input placeholder="المملكة العربية السعودية" id="country"
                                        class="block mt-1 w-full" type="text" name="country" />
                                </div>
                                <div class="text-center"></div>
                            </div>
                            <div class="bg-white grid grid-cols-2 py-2 px-4">
                                <div class="">المنطقة</div>
                                <div class="text-center">
                                    <x-jet-input placeholder="منطقة عسير" id="state" class="block mt-1 w-full"
                                        type="text" name="state" :value="old('qty')" />
                                </div>
                                {{-- <select name="state" id="state">
                                        <option disabled="disabled" selected="true" value="">أختر </option>
                                        <option value="aseer">Aseer</option>

                                    </select> --}}
                                <div class="text-center"></div>
                            </div>
                            <div class="bg-white grid grid-cols-2 py-2 px-4">
                                <div class="">المدينة</div>
                                <x-jet-input placeholder="مدينة أبها" id="city" class="block mt-1 w-full" type="text"
                                    name="city" :value="old('qty')" />
                                <div class="text-center"></div>
                            </div>
                            <div class="bg-white grid grid-cols-2 py-2 px-4">
                                <div class="">عنوان الشارع</div>
                                <x-jet-input placeholder="8996 حي الوردتين شارع الجميمة" id="street_address"
                                    class="block mt-1 w-full" type="text" name="street_address" :value="old('qty')" />
                                <div class="text-center"></div>
                            </div>
                            {{-- <div class="bg-ornage-start grid grid-cols-2 py-2 px-4 text-white">
                                    <div class="">الإجمالي <span class="text-xs">شامل الضريبة</span></div>
                                    <div class="text-center">98.32 SR</div>
                                </div> --}}
                        </div>
                </div>
                <div class="mt-10 flex justify-end">
                    <button type="submit"
                        class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">اتمام
                        الشراء</button>
                </div>
            </form>
        @else
            <div class="mt-5 grid grid-cols-1 grid-rows-5 gap-5 w-full">
                <div class=" pt-3 pb-2 px-4 font-bold text-ornage-start text-xl">
                    يجب عليك تسجيل الدخول لإتمام العملية أو تسجيل حساب جديد
                </div>
                <div class="bg-white grid grid-cols-2 py-2 px-4">
                    <div class=""><a href="{{ route('user-login.show') }}"
                            class="bg-gradient-to-l from-ornage-start to-ornage-end text-white font-bold text-sm sm:text-lg z-20 pb-1 sm:pb-2 pt-2 sm:pt-3  px-4 sm:px-8 rounded-md sm:rounded-xl">
                            تسجيل الدخول

                        </a></div>
                    {{-- <div class=""><a href="{{ route('user-register.show') }}"
                            class="bg-gradient-to-l from-ornage-start to-ornage-end text-white font-bold text-sm sm:text-lg z-20 pb-1 sm:pb-2 pt-2 sm:pt-3  px-4 sm:px-8 rounded-md sm:rounded-xl">
                            تسجيل حساب جديد

                        </a></div> --}}
                    <div class="text-center">

                    </div>
                </div>



            </div>
            @endif


        </div>
    </div>

</x-theme-layout>
