<section class="section swiper-container swiper-slider swiper-slider-1" data-loop="false" data-autoplay="5500" data-simulate-touch="false" data-slide-effect="fade">
    <div class="swiper-wrapper">
        @forelse($sliders as $slider)
            @php /** @var App\Models\Slide $slider **/ @endphp
        <div
            class="swiper-slide"
            data-slide-bg="{{ asset('storage/' . $slider->uri) }}"
        >
            <div class="swiper-slide-caption section-md">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-lg-8 col-xl-7">
                            <h1
                                class="heading-decorate"
                                data-caption-animate="fadeInUp"
                                data-caption-delay="100"
                            >
                                {{ $slider->title }}
                            </h1>
                            <p
                                class="lead"
                                data-caption-animate="fadeInUp"
                                data-caption-delay="250"
                            >
                                {{ $slider->body }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <hi>Not sliders</hi>
        @endforelse
    </div>
    <!-- Swiper Pagination -->
    <div class="swiper-pagination"></div>
    <div class="swiper-counter"></div>
    <!-- Swiper Navigation-->
    <div class="swiper-button-prev">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px" height="30px" viewbox="0 0 17 30" enable-background="new 0 0 17 30" xml:space="preserve">
            <g>
                <defs>
                    <rect id="SVGID_111_" width="17" height="30"></rect>
                </defs>
                <clippath id="SVGID_2222_">
                    <use xlink:href="#SVGID_111_" overflow="visible"></use>
                </clippath>
                <line clip-path="url(#SVGID_2222_)" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" y1="0.833" x2="8.5" y2="29.167"></line>
                <polyline clip-path="url(#SVGID_2222_)" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="									    16.15,20.833 8.5,29.167 0.85,20.833 	"></polyline>
            </g>
          </svg>
    </div>
    <div class="swiper-button-next">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px" height="30px" viewbox="0 0 17 30" enable-background="new 0 0 17 30" xml:space="preserve">
            <g>
                <defs>
                    <rect id="SVGID_1_" width="17" height="30"></rect>
                </defs>
                <clippath id="SVGID_2_">
                    <use xlink:href="#SVGID_1_" overflow="visible"></use>
                </clippath>
                <line clip-path="url(#SVGID_2_)" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" y1="29.167" x2="8.5" y2="0.833"></line>
                <polyline clip-path="url(#SVGID_2_)" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="									    0.85,9.167 8.5,0.833 16.15,9.167 	"></polyline>
            </g>
          </svg>
    </div>
</section>
