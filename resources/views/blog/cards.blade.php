<section class="py-5">
    <div class="container">

        <div class="row mb-5 {{ $ispost == 'true' ? 'd-none' : 'd-block' }}">
            <div class="col-12 col-lg-8 col-xxl-7 text-center mx-auto">
                <h2 class="display-5 fw-bold mt-2 mb-3">Inspiring blogs</h2>
                <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
        <br><br><br>

        @if ($ispost == 'true')
            <style>
                .mySwiper {
                    display: none;
                }
            </style>
        @endif

        <div class="row p-5" style="background: #e2e2e2ac;border-radius:10px;">


            @php($count = 0)
            @foreach ($blogs as $blog)
                @php($count++)



                <div class="{{ $ispost == 'true' ? 'col-12' : ($count == 1 ? 'col-lg-8' : 'col-lg-4') }} mb-5">
                    <div class="d-flex mb-4">
                        <img class="img-fluid w-100" src="{{ $blog->url }}" alt=""
                            style="max-height: 350px;object-fit: cover;">
                    </div>
                    <span><small class="text-muted">{{ $blog->created_at }}</small></span>
                    <h2 class="fw-bold">{{ $blog->title }}</h2>
                    <p class="lead text-muted"
                        style="display: -webkit-box;
                    -webkit-line-clamp: {{ $ispost == 'true' ? '1000' : ($count == 1 ? '3' : '9') }};
                    -webkit-box-orient: vertical;  
                    overflow: hidden;">
                        {{ $blog->description }}</p>
                    <a class="d-flex align-items-center {{ $ispost == 'true' ? 'd-none' : 'd-block' }}"
                        href="blog/{{ $blog->title }}">
                        <span>Read more</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </span>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
