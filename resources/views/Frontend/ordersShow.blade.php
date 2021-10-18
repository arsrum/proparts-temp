<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">

        </div>


        <div class="w-full">
            <div class="max-w-4xl mx-auto my-16">

                @if ($orders->count() == 0)
                    <div class="max-w-3xl mx-auto my-16">

                        <p class="text-center text-3xl font-light">
                            You Don't have any orders
                        </p>

                </div> @else


                    @foreach ($orders as $order)

                        <div class="bg-white pt-3 pb-2 px-4 font-bold text-ornage-start text-xl">

                            {{-- <a href="">Order Products</a> --}}
                        </div>



                        <div class="mt-5 grid grid-cols-3 grid-rows-5 gap-5 w-full">
                            <div class="row-span-4 bg-white">
                                <img src="../../../imgs/default.png" alt="">
                            </div>
                            <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">

                                <div class="">generic article </div>
                                <div class=" text-center">
                                    {{ $order->generic_article }}

                                </div>
                            </div>
                            <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                                <div class="">Order Status </div>
                                <div class=" text-center">
                                 New </div>
                            </div>
                            <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                                <div class=""> Shipping Address </div>
                                <div class="
                                text-center">
                                    {{ $orderDetails->address->country ?? '' }} - {{ $orderDetails->address->state ?? '' }} -
                                    {{ $orderDetails->address->city ?? '' }} - {{ $orderDetails->address->street_address ?? '' }}
                                </div>
                            </div>

                            <button type="submit">


                            </button>

                            <div class="col-span-2 bg-white-start grid grid-cols-2 py-2 px-4 text-white">
                                {{-- <div class="">عرض الطلبات</div>
                        <div class="text-center">هنا</div> --}}
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>




        </div>
        </form>
    </div>
    </div>

</x-theme-layout>
