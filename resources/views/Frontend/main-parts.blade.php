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
        <div class="carousel">
            <div class="carousel-inner">
                <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                    checked="checked">
                <div class="carousel-item">
                    <img src="https://car-images.bauersecure.com/pagefiles/13007/toyotagt86aero1.jpg">
                </div>
                {{-- <label for="carousel-3" class="carousel-control prev control-1">‹</label>
                <label for="carousel-2" class="carousel-control next control-1">›</label> --}}
                {{-- <ol class="carousel-indicators">
                    <li>
                        <label for="carousel-1" class="carousel-bullet">•</label>
                    </li>
                </ol> --}}
            </div>
        </div>

        <div class="mt-5 grid grid-cols-1 grid-rows-5 gap-5 w-full">
            <div class=" pt-3 px-4 font-bold text-ornage-start text-xl">
                Vehicle :
            </div>
            <div class="bg-white grid grid-cols-2 py-2 px-4">
                <div class=""><a href="{{ route('user-login.show') }}"
                        class="bg-gradient-to-l from-ornage-start to-ornage-end text-white font-bold text-sm sm:text-lg z-20 pb-1 sm:pb-2 pt-2 sm:pt-3  px-4 sm:px-8 rounded-md sm:rounded-xl">
                        3.0L Twin Turbo

                    </a></div>
                <div class=""><a href="{{ route('user-register.show') }}"
                        class="bg-gradient-to-l from-ornage-start to-ornage-end text-white font-bold text-sm sm:text-lg z-20 pb-1 sm:pb-2 pt-2 sm:pt-3  px-4 sm:px-8 rounded-md sm:rounded-xl">
                        Toyota GT86 2013 TRD

                    </a></div>
                <div class="text-center">

                </div>
            </div>
        </div>
        <div class="w-full">
            {{-- <form action="{{ route('sub-parts') }}" class="mt-20"> --}}

            <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 px-4 sm:px-10">
                @foreach ($parts as $item)
                    <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">

                        <a href="{{ route('Articles', [$item->assemblyGroupNodeId, $carId]) }}">
                            <img src="@if (file_exists('imgs/' . $item->assemblyGroupNodeId .
                            '.png')) imgs/{{ $item->assemblyGroupNodeId }}.png
                        @else
                            imgs/default.png @endif" class="mb-5" alt="">
                            <h2 class="text-lg sm:text-2xl text-center">
                                {{ $item->assemblyGroupName }}
                            </h2>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="mt-10 flex justify-end">

            </div>
            {{-- </form> --}}
        </div>
    </div>
</x-theme-layout>
