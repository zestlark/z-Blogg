@extends('admin.layout.main')


@section('page')
    <div class="message-container">
        <div class="chat-header anim">Authors<span><svg viewBox="0 0 24 24" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.212 7.762c0 2.644-2.163 4.763-4.863 4.763-2.698 0-4.863-2.119-4.863-4.763C4.486 5.12 6.651 3 9.35 3c2.7 0 4.863 2.119 4.863 4.762zM2 17.917c0-2.447 3.386-3.06 7.35-3.06 3.985 0 7.349.634 7.349 3.083 0 2.448-3.386 3.06-7.35 3.06C5.364 21 2 20.367 2 17.917zM16.173 7.85a6.368 6.368 0 01-1.137 3.646c-.075.107-.008.252.123.275.182.03.369.048.56.052 1.898.048 3.601-1.148 4.072-2.95.697-2.675-1.35-5.077-3.957-5.077a4.16 4.16 0 00-.818.082c-.036.008-.075.025-.095.055-.025.04-.007.09.019.124a6.414 6.414 0 011.233 3.793zm3.144 5.853c1.276.245 2.115.742 2.462 1.467a2.107 2.107 0 010 1.878c-.531 1.123-2.245 1.485-2.912 1.578a.207.207 0 01-.234-.232c.34-3.113-2.367-4.588-3.067-4.927-.03-.017-.036-.04-.034-.055.002-.01.015-.025.038-.028 1.515-.028 3.145.176 3.747.32z" />
                </svg>
                {{ count($author) }} people
            </span>
        </div>
        @for ($i = 0; $i < count($author); $i++)
            <div class="message anim" style="--delay: .1s">
                <div class="author-img__wrapper video-author video-p">

                    <img class="author-img" src="https://img.icons8.com/?size=512&id=MjD9wmGLwhA2&format=png" />
                </div>
                <div class="msg-wrapper">
                    <div class="msg__name video-p-name"><a
                            href="blog/author?author={{ $author[$i]->author }}">{{ $author[$i]->author }}</a></div>
                    <div class="msg__content video-p-sub">
                        @if (Auth::User()->name == $author[$i]->author)
                            <span>by you </span>
                        @endif
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
