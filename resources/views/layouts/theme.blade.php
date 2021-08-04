<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-pp-bg">
    <div class="relative font-ar text-gray-900 antialiased">
        <div class="sm:hidden absolute bg-white z-20 h-2 w-full top-0"></div>
        <img src="../../../imgs/top.svg" class="absolute z-10 top-2 -mt-px sm:top-0 w-full" alt="">
        <img src="../../../imgs/hero.png" class="absolute z-0 top-0 w-full" alt="">

        <div class="relative z-20 flex">
            <div class="w-1/4 sm:w-1/5 flex-shrink-0 pt-2 sm:pt-8 pl-1 sm:pl-6">
                <a href="{{ route('home') }}">
                    <img src="../../../imgs/logo.png" class="ah-28" alt="">
                </a>
            </div>
            <div class="w-3/4 sm:w-4/5 flex-shrink-0 flex justify-end p-5">
                <div class="-mt-2 sm:mt-1 sm:mr-10 flex flex-col items-end w-full">
                    <a href="{{ route('Cart-List') }}"
                        class="bg-gradient-to-l from-ornage-start to-ornage-end text-white font-bold text-sm sm:text-lg z-20 pb-1 sm:pb-2 pt-2 sm:pt-3  px-4 sm:px-8 rounded-md sm:rounded-xl">الذهاب
                        لعربة
                        التسوق

                        {{ Cart::content()->count() }}
                    </a>
                    <ul class="text-white text-xs sm:text-xl flex justify-between space-x-3 sm:space-x-8 space-x-reverse sm:space-x-reverse pt-4 sm:pt-14 pr-2 sm:pr-20 sm:w-9/12"
                        dir="rtl">
                        <a href="{{ route('home') }}">
                            <li>الرئيسية</li>
                        </a>

                        @if (Auth::check())
                            <a href="{{ route('profile') }}">
                                <li>حسابي</li>
                            </a>
                            <a href="{{ route('orders') }}">
                                <li>طلباتي</li>
                            </a>
                            <a href="{{ route('logout') }}">
                                <li>تسجيل خروج</li>
                            </a>

                        @else
                            <a href="{{ route('user-login.show') }}">
                                <li>تسجيل
                                    \
                                    تسجيل دخول
                                </li>
                            </a>
                        @endif
                        <li>
                            <a href="{{ route('contact-us.store') }}">تواصل معنا</a>
                        </li>
                        <li>
                            <a
                                href="https://api.whatsapp.com/send?phone=966561773303&text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20%2C%20%D8%AD%D8%A7%D8%A8%D8%A8%20%D8%A3%D8%B3%D8%AA%D9%81%D8%B3%D8%B1%20%D8%A8%D8%AE%D8%B5%D9%88%D8%B5%20%D9%85%D9%88%D9%82%D8%B9%20%D8%A8%D8%B1%D9%88%20%D8%A8%D8%A7%D8%B1%D8%AA">WhatsApp</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="relative z-30">{{ $slot }}</div>
    </div>
</body>

</html>
