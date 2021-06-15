<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-pp-bg">
    <div class="relative font-ar text-gray-900 antialiased">
        <div class="sm:hidden absolute bg-white z-20 h-2 w-full top-0"></div>
        <img src="imgs/top.svg" class="absolute z-10 top-2 sm:top-0 w-full" alt="">
        <img src="imgs/hero.png" class="absolute z-0 top-0 w-full" alt="">

        <div class="relative z-20 flex">
            <div class="w-1/4 sm:w-1/5 flex-shrink-0 pt-2 sm:pt-8 pl-1 sm:pl-6">
                <img src="imgs/logo.png" class="ah-28" alt="">
            </div>
            <div class="w-3/4 sm:w-4/5 flex-shrink-0 flex justify-end p-5">
                <div class="-mt-2 sm:mt-1 sm:mr-10 flex flex-col items-end w-full">
                    <a href="#"
                        class="bg-gradient-to-l from-ornage-start to-ornage-end text-white font-bold text-sm sm:text-lg z-20 pb-1 sm:pb-2 pt-2 sm:pt-3  px-4 sm:px-8 rounded-md sm:rounded-xl">الذهاب
                        لعربة
                        التسوق</a>
                    <ul class="text-white text-xs sm:text-xl flex justify-between space-x-3 sm:space-x-8 space-x-reverse sm:space-x-reverse pt-4 sm:pt-14 pr-2 sm:pr-20 sm:w-9/12"
                        dir="rtl">
                        <li>نظرة عامة</li>
                        <li>تواصل معنا</li>
                        <li>الملف الشخصي</li>
                        <li>طلباتك</li>
                        <li>WhatsApp</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="relative z-30">{{ $slot }}</div>
    </div>
</body>

</html>
