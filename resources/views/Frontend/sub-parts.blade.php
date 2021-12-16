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
            {{-- <form action="{{ route('item-details') }}" class="mt-20"> --}}

            <div class="mt-10 grid grid-cols-1 sm:grid-cols-5 gap-4 px-4 sm:px-10">
                @foreach ($data as $item)
                    @foreach ($item->genericArticles as $items)
                        <a
                            href="{{ route('SingleArticles', [$assemblyGroupNodeId, $items->genericArticleId, $carId]) }}">

                    @endforeach

                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                        @if (count($item->images)<1)
                        <img src="../../imgs/default.png " style="height:40px" class="mb-5" alt=""> 
                        @else
                        @foreach ($item->images as $img)
                        <img src="{{ $img->imageURL800 }}" style="height:40px" class="mb-5" alt="">
                        <?php break; ?>
                    @endforeach
                        @endif
                       
                        @foreach ($item->genericArticles as $name)
                            <h2 class="text-lg sm:text-2xl text-center">{{ $name->genericArticleDescription }}
                            </h2>
                        @endforeach
                    </div>
                    </a>

                @endforeach

            </div>
            <div class="mt-10 flex justify-end">
                {{-- <button type="submit"
                    class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">التالي</button> --}}
            </div>
            {{-- </form> --}}
        </div>
    </div>
</x-theme-layout>
