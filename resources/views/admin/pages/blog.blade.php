@extends('admin.layout.main')
@section('page')
    <div class="stream-area p-5">
        <div class="video-stream">
            <img id="my_video_1" width="100%" height="267px" src="{{ $blogs->url }}" />
            <div class="video-detail">
                <div class="video-content">
                    <div class="video-p-wrapper anim" style="--delay: .1s">
                        <div class="author-img__wrapper video-author video-p">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                <path d="M20 6L9 17l-5-5" />
                            </svg>
                            <img class="author-img" src="https://img.icons8.com/?size=512&id=MjD9wmGLwhA2&format=png" />
                        </div>
                        <div class="video-p-detail">
                            <div class="video-p-name">{{ $blogs->author }}</div>
                            <div class="video-p-sub">{{ $blogs->created_at }}</div>
                        </div>
                        <div class="button-wrapper">
                            <button class="like">
                                <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.435 2.582a1.933 1.933 0 00-1.93-.503L3.408 6.759a1.92 1.92 0 00-1.384 1.522c-.142.75.355 1.704 1.003 2.102l5.033 3.094a1.304 1.304 0 001.61-.194l5.763-5.799a.734.734 0 011.06 0c.29.292.29.765 0 1.067l-5.773 5.8c-.428.43-.508 1.1-.193 1.62l3.075 5.083c.36.604.98.946 1.66.946.08 0 .17 0 .251-.01.78-.1 1.4-.634 1.63-1.39l4.773-16.075c.21-.685.02-1.43-.48-1.943z" />
                                </svg>
                                <a href="../../blog/{{ $blogs->title }}">
                                    See on Website
                                </a>
                            </button>
                            <button class="like red">
                                <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.85 2.5c.63 0 1.26.09 1.86.29 3.69 1.2 5.02 5.25 3.91 8.79a12.728 12.728 0 01-3.01 4.81 38.456 38.456 0 01-6.33 4.96l-.25.15-.26-.16a38.093 38.093 0 01-6.37-4.96 12.933 12.933 0 01-3.01-4.8c-1.13-3.54.2-7.59 3.93-8.81.29-.1.59-.17.89-.21h.12c.28-.04.56-.06.84-.06h.11c.63.02 1.24.13 1.83.33h.06c.04.02.07.04.09.06.22.07.43.15.63.26l.38.17c.092.05.195.125.284.19.056.04.107.077.146.1l.05.03c.085.05.175.102.25.16a6.263 6.263 0 013.85-1.3zm2.66 7.2c.41-.01.76-.34.79-.76v-.12a3.3 3.3 0 00-2.11-3.16.8.8 0 00-1.01.5c-.14.42.08.88.5 1.03.64.24 1.07.87 1.07 1.57v.03a.86.86 0 00.19.62c.14.17.35.27.57.29z" />
                                </svg>
                                <a href="../deleteblog?blog={{ $blogs->id }}">Delete</a>
                            </button>
                        </div>
                    </div>
                    <div class="video-p-title anim" style="--delay: .2s">{{ $blogs->title }}
                    </div>
                    <div class="video-p-subtitle anim" style="--delay: .3s">{{ $blogs->description }}</div>
                </div>
            </div>
        </div>
    </div>
    @if (count($moreBy) > 1)
        <div class="chat-stream" style="position: relative;left: -320px;min-width: 300px;">
            <div class="chat-vid__container">

                <div class="chat-vid__title anim" style="--delay: .3s">More by {{ $blogs->author }}</div>
                @foreach ($moreBy as $more)
                    <div class="chat-vid anim" style="--delay: .4s">
                        <a href="./{{ $more->title }}">
                            <div class="chat-vid__wrapper">
                                <img class="chat-vid__img" src="{{ $more->url }}" />
                                <div class="chat-vid__content">
                                    <div class="chat-vid__name">{{ $more->title }}</div>
                                    <div class="chat-vid__by">{{ $more->keyword }}</div>
                                    <div class="chat-vid__info">1{{ $more->created_at }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
