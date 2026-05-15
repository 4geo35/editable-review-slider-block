@push("scripts")
    <script type="application/javascript">
        (function () {
            document.addEventListener("DOMContentLoaded", function () {
                const sliderElement = document.getElementById("swiperBlockReviewSlider-{{ $block->id }}")
                if (sliderElement) { initBlockReviewSliderSliders{{ $block->id }}(sliderElement); }
            })
        })()

        function initBlockReviewSliderSliders{{ $block->id }}(sliderElement) {
            @if ($block->render_title)
                let navigationElement = document.getElementById("swiperBlockReviewSliderNavigation-{{ $block->id }}")
                let prevBtnElement = navigationElement.querySelector(".prev-btn")
                let nextBtnElement = navigationElement.querySelector(".next-btn")
            @endif

            let swiper = new Swiper(sliderElement, {
                loop: false,
                spaceBetween: 24,
                slidesPerView: 1,

                breakpoints: {
                    480: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3
                    }
                },

                @if ($block->render_title)
                    navigation: {
                        nextEl: nextBtnElement,
                        prevEl: prevBtnElement,
                    },
                @endif
            })
        }
    </script>
@endpush
