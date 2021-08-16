<x-theme-layout>
    <div class="bg-gray-50 max-w-7xl sm:mx-auto mb-20 mt-40 sm:mt-80 mx-10 p-10 rounded-3xl flex flex-col items-center justify-center"
        dir="rtl">
        <div class="mt-5">

        </div>


        <div class="w-full">
            <div class="max-w-4xl mx-auto my-16">




                <div class="bg-white pt-3 pb-2 px-4 font-bold text-ornage-start text-xl">
                    حسابي

                </div>


                <div class="mt-5 grid grid-cols-3 grid-rows-5 gap-5 w-full">
                    <div class="row-span-4 bg-white">


                        <img src="../../../imgs/default.png" alt="">


                    </div>
                    <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">Name </div>
                        <div class="text-center">{{ $user->name }}</div>
                    </div>
                    <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">Email </div>
                        <div class="text-center">{{ $user->email }}</div>
                    </div>

                    <div class="col-start-2 col-span-2 bg-white grid grid-cols-2 py-2 px-4">
                        <div class="">My Orders</div>
                        <div class="text-center">5</div>
                    </div>


                    <button type="submit">
                        <a href="{{ route('orders') }}">
                            <div class="text-xl text-white font-bold bg-ornage-start px-16 py-2 rounded-2xl">
                                Show Orders
                            </div>
                        </a>
                    </button>

                    <div class="col-span-2 bg-white-start grid grid-cols-2 py-2 px-4 text-white">
                        {{-- <div class="">عرض الطلبات</div>
                        <div class="text-center">هنا</div> --}}
                    </div>
                </div>

            </div>


        </div>
        </form>
    </div>
    </div>

</x-theme-layout>
