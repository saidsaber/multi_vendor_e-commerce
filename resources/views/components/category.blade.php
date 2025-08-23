@props(['categories'])
<style>
    .swiper {
        padding: 20px 0;
    }

    .swiper-slide {
        text-align: center;
    }

    .cat-block img {
        max-width: 124px;
        height: 124px;
        display: block;
        margin: 0 auto;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #000;
    }
</style>

<div class="container">
    <h2 class="title text-center mb-4">Explore Popular Categories</h2>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            @if (!empty($categories))
                @foreach ($categories as $category)
                    <div class="swiper-slide">
                        <a href="{{ route('category.products' , $category->id) }}" class="cat-block text-center">
                            <figure>
                                <span>
                                    <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid" alt="">
                                </span>
                            </figure>
                            <h3 class="cat-block-title">{{ $category->name }}</h3>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- أزرار التنقل -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.mySwiper', {
            loop: true,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                576: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 3
                },
                992: {
                    slidesPerView: 4
                }
            }
        });
    });
</script>
