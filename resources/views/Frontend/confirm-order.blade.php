<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">
            <ul class="flex text text-white font-bold">
                <li class="bg-pp-blue h-10 w-10 pt-1  rounded-full flex justify-center items-center">1</li>
                <li class="flex items-center justify-center">
                    <div class="w-10 sm:w-32 bg-pp-blue h-px"></div>
                </li>
                <li class="bg-ornage-start h-10 w-10 pt-1  rounded-full flex justify-center items-center">2</li>
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

            @if (Session::has('success'))

                <div class="bg-green-900 text-center py-4 lg:px-4">
                    <div class="p-2 bg-green-800 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex"
                        role="alert">
                        <span
                            class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">Done</span>
                        <a href="{{ route('home') }}">
                            <span class="font-semibold mr-2 text-left flex-auto">{{ Session::get('success') }}</span>
                        </a>
                        <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                        </svg>


                    </div>
                </div>
            @endif
            @foreach ($cart as $item)

                <form action="{{ route('Cart-Remove', $item->rowId) }}" method="POST">
                    @csrf
                    <div class="max-w-4xl mx-auto my-16">
                        <div class="bg-white pt-3 pb-2 px-4 font-bold text-ornage-start text-xl">
                            {{ $item->name }}
                        </div>
                        <div class="mt-5 grid grid-cols-3 grid-rows-5 gap-5 w-full">
                            <div class="row-span-4 bg-white">
                                @foreach ($item->options as $img)

                                    <img src="{{ $img }}" alt="">
                                @endforeach

                            </div>


                            {{-- <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                                <div class="">

                                </div>
                                <div class="text-center"></div>
                            </div>
                            <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                                <div class=""> </div>
                                <div class="text-center"></div>
                            </div>
                            <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                                <div class=""> </div>
                                <div class="text-center"></div>
                            </div>
                            <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                                <div class=""></div>
                                <div class="text-center"></div>
                            </div> --}}

                            <button type="submit">

                                {{-- <div class="bg-red-800 flex items-center justify-center text-white font-bold">حذف من
                                    العربة
                                </div> --}}
                            </button>

                            <div class="col-span-2 bg-ornage-start grid grid-cols-2 py-2 px-4 text-white">
                                <div class="">السعر <span class="text-xs">شامل الضريبة</span></div>
                                <div class="text-center">

                                    ستصلك رسالة بتسعيرة القطعة
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            @endforeach


        </div>
        @if (Cart::content()->count() === 0)
            <div class="mt-10 flex justify-end">
                <a href="{{ route('home') }}">

                    <button type="submit" class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">لا
                        يوجد لديك منتجات في سلة المنتجات العودة للرئيسية


                    </button>
                </a>
        </div> @else

            <form action="{{ route('shipping-details') }}" class="mt-20">
                <div class="mt-10 flex justify-end">
                    <button type="submit"
                        class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">تأكيد
                        الطلب</button>
                </div>
            </form>
            <form action="{{ route('Cart-Clear') }}" method="POST" class="mt-20">
                @csrf
                <div class="mt-10 flex justify-end">
                    <button type="submit"
                        class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">حذف كافة المنتجات
                    </button>
                </div>
            </form>
        @endif

    </div>
    </div>
</x-theme-layout>
