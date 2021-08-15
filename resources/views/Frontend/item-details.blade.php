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
        @foreach ($data as $item)
            <div class="w-full">
                <div class="max-w-4xl mx-auto my-16">

                    @if (Session::has('success'))

                        <div class="bg-orange-500 lg:rounded-full  text-center py-4 lg:px-4">

                            {{-- <span
                                class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Done</span>
                            <a href="{{ route('shipping-details') }}">
                                <span
                                    class="font-semibold mr-2 text-left flex-auto">{{ Session::get('success') }}</span>
                            </a>
                            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                            </svg> --}}



                            <div class="p-2 bg-green-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                                role="alert">
                                <span
                                    class="flex rounded-full bg-green-900 uppercase px-2 py-1 text-xs font-bold mr-3">العودة</span>
                                @foreach ($item->genericArticles as $img)
                                    <a href="{{ route('Articles', [$assemblyGroupNodeId, $carId]) }}">
                                        <span class="font-semibold mr-2 text-left flex-auto">تمت إضافة المنتجات بنجاح هل
                                            تود
                                            العودة للخلف </span>
                                    </a>
                                @endforeach

                                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                                </svg>


                            </div>
                        </div>
                    @endif


                    <form action="{{ route('Cart-Add') }}" method="post">
                        @csrf
                        @foreach ($item->genericArticles as $name)

                            <div class="bg-white pt-3 pb-2 px-4 font-bold text-ornage-start text-xl">
                                {{ $name->genericArticleDescription }}
                                <input type="hidden" name="name" value="{{ $name->genericArticleDescription }}">

                            </div>
                        @endforeach


                        <div class="mt-5 grid grid-cols-3 grid-rows-5 gap-5 w-full">
                            <div class="row-span-4 bg-white">


                                @foreach ($item->images as $img)

                                    <img src="{{ $img->imageURL800 }}" alt="">
                                    <input type="hidden" name="img" value="{{ $img->imageURL800 }}">

                                    {{-- <input type="hidden" name="node" value="{{ $assemblyGroupNodeId }}">
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="hidden" name="carId" value="{{ $carId }}"> --}}
                                    <input type="hidden" name="dataSupplierId" value="{{ $item->dataSupplierId }}">
                                    <input type="hidden" name="manufacturer" value="{{ $item->mfrId }}">
                                    <input type="hidden" name="articleNumber" value="{{ $item->articleNumber }}">
                                    <input type="hidden" name="price" value="{{ rand(99, 299) }}">
                                    <input type="hidden" name="carId" value="{{ $carDetails->carId }}">

                                @endforeach
                            </div>
                            <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                                <div class="">موديل السيارة</div>
                                <div class="text-center">
                                    {{ $carDetails->manuName . ' - ' . $carDetails->modelName . ' ' . substr($carDetails->yearOfConstrFrom, 0, 4) }}
                                </div>
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
                                <div class="text-center">{{ $carDetails->typeName }}</div>
                            </div>


                            <button type="submit">
                                <div class="bg-ornage-start flex items-center justify-center text-white font-bold">إضافة
                                    للعربة
                                </div>
                            </button>

                            <div class="col-span-2 bg-ornage-start grid grid-cols-2 py-2 px-4 text-white">
                                <div class="">السعر <span class="text-xs">شامل الضريبة</span></div>
                                <div class="text-center">ستصلك رسالة بالتسعيرة </div>
                            </div>
                        </div>

        @endforeach
    </div>
    </form>

    <form action="{{ route('Cart-Buy') }}" method="post">
        @foreach ($item->images as $img)
            <input type="hidden" name="img" value="{{ $img->imageURL800 }}">
            <input type="hidden" name="dataSupplierId" value="{{ $item->dataSupplierId }}">
            <input type="hidden" name="manufacturer" value="{{ $item->mfrId }}">
            <input type="hidden" name="articleNumber" value="{{ $item->articleNumber }}">
            <input type="hidden" name="price" value="{{ rand(99, 299) }}">
            <input type="hidden" name="carId" value="{{ $carDetails->carId }}">

        @endforeach
        @foreach ($item->genericArticles as $img)
            <input type="hidden" name="genericArticleId" value={{ $img->genericArticleId }}>
            <input type="hidden" name="price" value={{ $carDetails->carId }}>

        @endforeach

        @csrf
        <div class="mt-10 flex justify-end">
            <button type="submit" class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">اتمام
                الشراء</button>
        </div>
    </form>
    </div>
    </div>
</x-theme-layout>
