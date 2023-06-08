@extends('layouts.main')

@section('page')
    <!-- Carousel wrapper -->
    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" navigation="false" space-between="30"
        centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
        <swiper-slide>
            <img src="https://images.pexels.com/photos/167699/pexels-photo-167699.jpeg" width="100%"
                style="height: 100%;object-fit: cover" alt="" srcset="">
        </swiper-slide>
        <swiper-slide>
            <img src="https://images.pexels.com/photos/3293148/pexels-photo-3293148.jpeg" width="100%"
                style="height: 100%;object-fit: cover" alt="" srcset="">
        </swiper-slide>
        <swiper-slide>
            <img src="https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg" width="100%"
                style="height: 100%;object-fit: cover" alt="" srcset="">
        </swiper-slide>
        {{-- <div class="autoplay-progress" slot="container-end">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div> --}}
    </swiper-container>
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        swiper-container {
            width: 100%;
            height: 300px;
        }

        swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .autoplay-progress {
            position: absolute;
            right: 16px;
            bottom: 16px;
            z-index: 10;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--swiper-theme-color);
        }

        .autoplay-progress svg {
            --progress: 0;
            position: absolute;
            left: 0;
            top: 0px;
            z-index: 10;
            width: 100%;
            height: 100%;
            stroke-width: 4px;
            stroke: var(--swiper-theme-color);
            fill: none;
            stroke-dashoffset: calc(125.6 * (1 - var(--progress)));
            stroke-dasharray: 125.6;
            transform: rotate(-90deg);
        }
    </style>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    {{-- <script>
        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");

        const swiperEl = document.querySelector("swiper-container");
        swiperEl.addEventListener("autoplaytimeleft", (e) => {
            const [swiper, time, progress] = e.detail;
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        });
    </script> --}}
    <!-- Carousel wrapper -->

    <div class="container"
        style="width: 50px;height: 50px;border-radius: 50%;background: rgba(0, 153, 255, 0.575);display: flex;align-items: center;justify-content: center;position: fixed;right: 30px;margin-top: 20px;bottom:20px;z-index:2;">
        <a href="{{ route('write') }}">
            <img width="100%" src="https://img.icons8.com/?size=512&id=86957&format=png" alt="">
        </a>
    </div>


    @include('blog.cards')

    </div>
@endsection
