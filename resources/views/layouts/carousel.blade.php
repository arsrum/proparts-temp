<script>
    const da = () => {
        return {
            activeSlide: 1,
            slides: [{
                    id: 1,
                    src: "https://car-images.bauersecure.com/pagefiles/13007/toyotagt86aero1.jpg"
                },
                {
                    id: 2,
                    src: "https://www.bmw-me.com/content/dam/bmw/common/all-models/m-series/m8-coupe/2019/inspire/bmw-m8competition-coupe-inspire-mg-design-desktop-04.jpg"
                },
                {
                    id: 3,
                    src: "https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/high-porsche-935-2018-porsche-ag-1538080321.jpg"
                }
            ]
        }
    }
</script>
<div class="flex-1 mx-10 w-full relative" x-data="da()">
    <!-- Slides -->
    <template x-for="slide in slides" :key="slide.id">
        <div x-show="activeSlide === slide.id"
            class="font-bold text-5xl w-full h-[200px] sm:h-[500px] flex items-center text-white overflow-hidden rounded-2xl"
            style="">
            <img :src="slide.src" class="object-cover w-full h-full">
        </div>
    </template>

    <!-- Prev/Next Arrows -->
    <div class="absolute inset-0 flex">
        <div class="flex items-center justify-start w-1/2">
            <button
                class="bg-gray-50 pt-1 text-ornage-start hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-10 h-10 -mr-5"
                x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1">
                &#8594;
            </button>
        </div>
        <div class="flex items-center justify-end w-1/2">
            <button
                class="flex items-center justify-center bg-gray-50 pt-1 text-ornage-start hover:text-orange-500 font-bold hover:shadow rounded-full w-10 h-10 -ml-5"
                x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1">
                &#8592;
            </button>
        </div>
    </div>

    <!-- Buttons -->
    <div class="absolute w-full mt-2">
        <div class="flex items-center justify-center w-1/3 mx-auto">
            <template x-for="slide in slides" :key="slide.id">
                <button
                    class="flex-1 w-4 h-1 mx-1 sm:mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-ornage-start hover:shadow-lg"
                    :class="{
                'bg-ornage-start': activeSlide === slide.id,
                'bg-red-200': activeSlide !== slide.id
            }"
                    x-on:click="activeSlide = slide.id"></button>
            </template>
        </div>
    </div>
</div>
