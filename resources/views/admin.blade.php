@extends('admin.layout.main')
@section('page')
    <div class="wrapper">
        <div class="header">
            <div class="search-bar">
                <input type="text" placeholder="Search">
            </div>
            <div class="user-settings">
                <img class="user-img"
                    src="https://images.unsplash.com/photo-1587918842454-870dbd18261a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=943&q=80"
                    alt="">
                <div class="user-name" style="text-transform: capitalize">{{ Auth::User()->name }}</div>
                <svg viewBox="0 0 492 492" fill="currentColor">
                    <path
                        d="M484.13 124.99l-16.11-16.23a26.72 26.72 0 00-19.04-7.86c-7.2 0-13.96 2.79-19.03 7.86L246.1 292.6 62.06 108.55c-5.07-5.06-11.82-7.85-19.03-7.85s-13.97 2.79-19.04 7.85L7.87 124.68a26.94 26.94 0 000 38.06l219.14 219.93c5.06 5.06 11.81 8.63 19.08 8.63h.09c7.2 0 13.96-3.57 19.02-8.63l218.93-219.33A27.18 27.18 0 00492 144.1c0-7.2-2.8-14.06-7.87-19.12z">
                    </path>
                </svg>
                <div class="notify">
                    <div class="notification"></div>
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.707 8.796c0 1.256.332 1.997 1.063 2.85.553.628.73 1.435.73 2.31 0 .874-.287 1.704-.863 2.378a4.537 4.537 0 01-2.9 1.413c-1.571.134-3.143.247-4.736.247-1.595 0-3.166-.068-4.737-.247a4.532 4.532 0 01-2.9-1.413 3.616 3.616 0 01-.864-2.378c0-.875.178-1.682.73-2.31.754-.854 1.064-1.594 1.064-2.85V8.37c0-1.682.42-2.781 1.283-3.858C7.861 2.942 9.919 2 11.956 2h.09c2.08 0 4.204.987 5.466 2.625.82 1.054 1.195 2.108 1.195 3.745v.426zM9.074 20.061c0-.504.462-.734.89-.833.5-.106 3.545-.106 4.045 0 .428.099.89.33.89.833-.025.48-.306.904-.695 1.174a3.635 3.635 0 01-1.713.731 3.795 3.795 0 01-1.008 0 3.618 3.618 0 01-1.714-.732c-.39-.269-.67-.694-.695-1.173z" />
                    </svg>
                </div>
            </div>
        </div>

        @if (session('showMessage'))
            <div class="alert alert-success" id="message">
                {{ session('message') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('message').style.display = 'none';
                }, 5000);
            </script>
            <style>
                .alert {
                    position: relative;
                    padding: 0.75rem 1.25rem;
                    margin-bottom: 1rem;
                    border: 1px solid transparent;
                    border-radius: 0.25rem;
                }

                .alert-success {
                    color: #155724;
                    background-color: #d4edda;
                    border-color: #c3e6cb;
                }
            </style>
        @endif


        <div class="main-container">
            <div class="main-header anim" style="--delay: 0s">Latest</div>


            <div class="main-blogs">
                @for ($i = 0; $i < 2; $i++)
                    @php
                        $blog = $blogs[$i];
                    @endphp
                    <div class="main-blog anim"
                        style="--delay: .1s;  background-image: url({{ $blog->url }});
            background-size: cover; background-repeat: no-repeat;">
                        <a href="admin/blog/{{ $blog->title }}">
                            <div class="main-blog__title" style="text-shadow:0 0 5px rgb(1, 9, 96);">{{ $blog->title }}
                            </div>
                            <div class="main-blog__author">
                                <div class="author-img__wrapper">
                                    <img class="author-img"
                                        src="https://img.icons8.com/?size=512&id=MjD9wmGLwhA2&format=png" />
                                </div>
                                <div class="author-detail" style="text-shadow:0 0 5px rgb(1, 9, 96);">
                                    <div class="author-name">{{ $blog->author }}</div>
                                    <div class="author-info">{{ $blog->keyword }}</div>
                                </div>
                            </div>
                            <div class="main-blog__time">{{ $blog->created_at->diffForHumans() }}</div>
                        </a>
                    </div>
                @endfor
            </div>
            <div class="small-header anim" style="--delay: .3s">More Post</div>
            <div class="videos">

                @for ($i = 2; $i < count($blogs); $i++)
                    @php
                        $blog = $blogs[$i];
                    @endphp
                    <div class="video anim" style="--delay: .4s">
                        <a href="admin/blog/{{ $blog->title }}">
                            <div class="video-time">{{ $blog->created_at->diffForHumans() }}</div>
                            <div class="video-wrapper">
                                <img src="{{ $blog->url }}" alt="">
                                <div class="author-img__wrapper video-author">

                                    <img class="author-img"
                                        src="https://img.icons8.com/?size=512&id=MjD9wmGLwhA2&format=png" />
                                </div>
                            </div>
                            <div class="video-by">{{ $blog->author }}</div>
                            <div class="video-name">{{ $blog->title }}</div>
                            <div class="video-view">{{ $blog->keyword }}</div>
                        </a>
                    </div>
                @endfor

            </div>

        </div>
    </div>
@endsection
