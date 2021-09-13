<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- CSS Files -->


<div class="form-group">
    <label for="title">Manufacturer</label>
    <select id="country" name="manuId" class="form-control">
        <option value="" selected disabled>Manufacture </option>
        @foreach ($data as $key => $country)
            <option value="{{ $country->manuId }}">
                {{ $country->manuName }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="title">Model</label>
    <select name="modelId" id="state" class="form-control">
        <option value="">Choose Model </option>
    </select>
</div>


<div class="form-group">
    <label for="title">Type</label>
    <select name="typeId" id="city" class="form-control" name="" id="">
        <option value="">Choose Type </option>
    </select>
</div>


{{-- value="KMHCT41DXEU538925" --}}
{{-- <form method="post" action="{{ route('AssemblyGroups') }}">
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
                            <select id="country" name="manuId"
                                class="border-transparent bg-gray-100 rounded-full w-full sm:w-auto mb-5 sm:mb-0">
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
</form> --}}



<script type=text/javascript>
    $('#country').change(function() {
        var manufactureId = $(this).val();
        console.log(manufactureId);
        var variable2 = 2021;
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
                                '<option>أختر النوع</option>'
                            );
                        $.each(res,
                            function(
                                key,
                                value
                            ) {
                                if (value.yearOfConstrTo == undefined) {
                                    variable2 = "2021";
                                } else {
                                    variable2 = value.yearOfConstrTo.toString().substr(0, 4);

                                }
                                $("#state")
                                    .append(
                                        '<option value="' +
                                        value
                                        .modelId + '|' + manufactureId +
                                        '">' +
                                        value
                                        .modelname +
                                        ' ' +
                                        value
                                        .yearOfConstrFrom.toString().substr(0, 4) +
                                        ' - ' +
                                        variable2 +
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
                                '<option>أختر الموديل</option>'
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
</script>
