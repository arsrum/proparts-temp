 <x-theme-layout>
     <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
         dir="rtl">
         {{-- <div class="carousel">
             <div class="carousel-inner">
                 <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                     checked="checked">
                 <div class="carousel-item">
                     <img src="https://car-images.bauersecure.com/pagefiles/13007/toyotagt86aero1.jpg">
                 </div>
                 <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                 <div class="carousel-item">
                     <img
                         src="https://www.bmw-me.com/content/dam/bmw/common/all-models/m-series/m8-coupe/2019/inspire/bmw-m8competition-coupe-inspire-mg-design-desktop-04.jpg">
                 </div>
                 <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                 <div class="carousel-item">
                     <img
                         src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/high-porsche-935-2018-porsche-ag-1538080321.jpg">
                 </div>
                 <label for="carousel-3" class="carousel-control prev control-1">‹</label>
                 <label for="carousel-2" class="carousel-control next control-1">›</label>
                 <label for="carousel-1" class="carousel-control prev control-2">‹</label>
                 <label for="carousel-3" class="carousel-control next control-2">›</label>
                 <label for="carousel-2" class="carousel-control prev control-3">‹</label>
                 <label for="carousel-1" class="carousel-control next control-3">›</label>
                 <ol class="carousel-indicators">
                     <li>
                         <label for="carousel-1" class="carousel-bullet">•</label>
                     </li>
                     <li>
                         <label for="carousel-2" class="carousel-bullet">•</label>
                     </li>
                     <li>
                         <label for="carousel-3" class="carousel-bullet">•</label>
                     </li>
                 </ol>
             </div>
         </div> --}}

         <div class="w-full">
             @if (Session::has('fail'))

                 <div class="bg-red-900 text-center py-4 lg:px-4">
                     <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex"
                         role="alert">
                         <span
                             class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Done</span>
                         <a href="{{ route('shipping-details') }}">
                             <span class="font-semibold mr-2 text-left flex-auto">{{ Session::get('fail') }}</span>
                         </a>


                     </div>
                 </div>

             @endif
             @include('layouts.saad')



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
             Pro Parts Products
         </div>

         <form action="" class="mt-20">
             <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 px-4 sm:px-10">
                 @foreach ($Products as $product)
                     <a href="{{ route('products.show', $product->id) }}">
                         <div class="shadow-xl bg-white rounded-3xl overflow-hidden flex flex-col items-center p-5">
                             <img src="/image/{{ $product->image }}" class="mb-5" alt="">
                             <h2 class="text-lg sm:text-2xl text-center">{{ $product->name }}</h2>
                         </div>
                     </a>
                 @endforeach
             </div>

         </form>
 </x-theme-layout>
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- CSS Files -->
<form method="post" action="{{ route('AssemblyGroups') }}">
    @csrf
    <div class="row">
        <div class="col-lg-4 col-md-6 ">
            <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="container">
                        <h3>ProParts your number one parts store in Saudi Arabia</h3>
                        <div class="form-group">
                            <label for="country">manufacture :</label>
                            <select id="country" name="manuId" class="form-control">
                                <option value="" selected disabled>Select
                                    manufacture :</option>
                                @foreach ($data as $key => $country)
                                    <option value="{{ $country->manuId }}">
                                        {{ $country->manuName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">Vehicle :</label>
                            <select name="modelId" id="state" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="state">Vehicle :</label>
                            <select name="typeId" id="city" class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<script type=text/javascript>
    $('#country').change(function() {
        var manufactureId = $(this).val();
        console.log(manufactureId);

        if (manufactureId) {
            $.ajax({
                type: "GET",
                url: "{{ url('getState') }}?manufactureId=" +
                    manufactureId,
                success: function(res) {
                    if (res) {
                        $("#state")
                            .empty();
                        $("#state")
                            .append(
                                '<option>Select Vehicle</option>'
                            );
                        $.each(res,
                            function(
                                key,
                                value
                            ) {
                                $("#state")
                                    .append(
                                        '<option value="' +
                                        value
                                        .modelId + '|' + manufactureId +
                                        '">' +
                                        value
                                        .modelname + '  ' +
                                        value
                                        .yearOfConstrFrom +
                                        '  -  ' +
                                        value
                                        .yearOfConstrTo +
                                        '</option>'
                                    );
                            });

                    } else {
                        $("#state")
                            .empty();
                    }
                }
            });
        } else {
            $("#state").empty();
            $("#city").empty();
        }
    });

    $('#state').change(function() {
        var manufactureId = $(this).val();
        console.log(manufactureId);

        if (manufactureId) {
            $.ajax({
                type: "GET",
                url: "{{ url('getType') }}?manufactureId=" + manufactureId,
                success: function(res) {
                    if (res) {
                        $("#city")
                            .empty();
                        $("#city")
                            .append(
                                '<option>Select Vehicle</option>'
                            );
                        $.each(res,
                            function(
                                key,
                                value
                            ) {
                                $("#city")
                                    .append(
                                        '<option value="' +
                                        value
                                        .carId +
                                        '">' +
                                        value
                                        .carName +
                                        '</option>'
                                    );
                            });
                    } else {
                        $("#city")
                            .empty();
                    }
                }
            });
        } else {
            $("#city").empty();
        }
    });
</script> --}}
