<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-5 sm:p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="ltr">
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

        @if ($tecDocCarId == 'empty')

        @else
            <div class="mt-5 carousel">
                <div class="carousel-inner">
                    {{-- <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true"
                        hidden="" checked="checked"> --}}
                    <div class="carousel-item">
                        <img src="{{ route('image', $tecDocCarId) }}">

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
        @endif
        @if ($vehicleDetails == 'empty')

        @else
            <div class="mt-20 grid grid-cols-1 grid-rows-2 gap-5 w-full sm:px-10">
                <div class="grid grid-cols-1 sm:grid-cols-2">
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <div
                            class="pt-2 pb-1 px-5 text-white font-bold rounded-xl bg-gradient-to-l from-ornage-start to-ornage-end">
                            Vehicle</div>
                        <div class="pt-2 pb-1 px-5 mt-3 sm:mt-0 sm:ml-2 bg-white rounded-xl">

                            @foreach ($vehicleDetails as $vehicleDetail)
                                {{ $vehicleDetail->manuName }} {{ $vehicleDetail->modelName }}
                                {{ substr($vehicleDetail->yearOfConstrFrom, 0, 4) }}
                                @if (isset($vehicleDetail->yearOfConstrTo))
                                    - {{ substr($vehicleDetail->yearOfConstrTo, 0, 4) }}
                                @else
                                    - {{ date('Y') }}
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-0 flex flex-col sm:flex-row sm:items-center">
                        <div
                            class="pt-2 pb-1 px-5 text-white font-bold rounded-xl bg-gradient-to-l from-ornage-start to-ornage-end">
                            Model</div>
                        <div class="pt-2 pb-1 px-5 mt-3 sm:mt-0 sm:ml-2 bg-white rounded-xl">
                            @foreach ($vehicleDetails as $vehicleDetail)
                                {{ $vehicleDetail->typeName }}
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2">
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <div
                            class="pt-2 pb-1 px-5 text-white font-bold rounded-xl bg-gradient-to-l from-ornage-start to-ornage-end">
                            Specification</div>
                        <div class="pt-2 pb-1 px-5 mt-3 sm:mt-0 sm:ml-2 bg-white rounded-xl">
                            @foreach ($vehicleDetails as $vehicleDetail)
                                {{ $vehicleDetail->constructionType }} - {{ $vehicleDetail->impulsionType }}
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-1 sm:mt-0 flex flex-col sm:flex-row sm:items-center">
                        <div
                            class="pt-2 pb-1 px-5 text-white font-bold rounded-xl bg-gradient-to-l from-ornage-start to-ornage-end">
                            Engine</div>
                        <div class="pt-2 pb-1 px-5 mt-3 sm:mt-0 sm:ml-2 bg-white rounded-xl">
                            @foreach ($vehicleDetails as $vehicleDetail)
                                {{ $vehicleDetail->cylinder }} cylinder -
                                {{ substr($vehicleDetail->cylinderCapacityLiter, 0, 1) . ',' . substr($vehicleDetail->cylinderCapacityLiter, 1, 1) }}
                                Liters
                                -
                                {{ $vehicleDetail->powerHpTo }} HP
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="w-full mt-10">
            {{-- <form action="{{ route('sub-parts') }}" class="mt-20"> --}}
            @if (!$parts)
                <div class="max-w-3xl mx-auto my-16">

                    <p class="text-center text-3xl font-light">
                        There Is No Parts For This ‏ Particular Vehicle
                    </p>

                </div>

            @else
                <div class="grid grid-cols-1 sm:grid-cols-5 gap-4 px-4 sm:px-10">


                    @foreach ($parts as $item)
                        <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">

                            <a href="{{ route('Articles', [$item->assemblyGroupNodeId, $carId]) }}">
                                <img src="
                                                  @if (file_exists('imgs/' . $item->assemblyGroupNodeId . '.png'))
                                ../imgs/{{ $item->assemblyGroupNodeId }}.png
                            @else
                                ../imgs/default.png @endif" class="mb-5" alt="">
                                <h2 class="text-lg sm:text-2xl text-center">
                                    {{ $item->assemblyGroupName }}
                                </h2>
                            </a>
                        </div>
                    @endforeach


                    @foreach ($localParts as $product)
                        <a href="{{ route('products.show', $product->id) }}">
                            <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                                <img src="/image/{{ $product->image }}" class="mb-5" alt="">
                                <h2 class="text-lg sm:text-2xl text-center">{{ $product->name }}</h2>
                            </div>
                        </a>
                    @endforeach
            @endif

        </div>
        <div class="mt-10 flex justify-end">

        </div>
        {{-- </form> --}}
    </div>
    </div>
</x-theme-layout>
