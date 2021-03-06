<x-theme-layout>

    <div class="bg-gray-50 max-w-7xl sm:mx-auto mt-40 sm:mt-24 mx-10 p-5 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        @include('layouts.carousel')
    </div>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-5 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
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
            ???????????? Pro Parts
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
    </div>

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
