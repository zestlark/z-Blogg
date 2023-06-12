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

        @if (isset($comments))
            <div class="container">
                <div class="row mt-5" style="margin-top: 200px">
                    <div class="col-md-8  mt-5">
                        <h2>Comments</h2>

                        @auth
                            <div class="card">
                                <div class="card-body" style="background: #e2e2e2ac;border-radius:10px;">
                                    <!-- Comment Form -->
                                    <form action="{{ route('AddComment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="title" value="{{ $blogs[0]->title }}">
                                        <div class="form-group mb-3">
                                            <label for="comment">Comment:</label>
                                            <textarea name="comment" class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        @endauth

                        <div class="mt-4">
                            <!-- Comment List -->
                            {{-- {{ $comment->created_at->format('M d, Y') }} --}}
                            @foreach ($comments as $comment)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><img width="35p" style="margin-right:10px"
                                                src="https://img.icons8.com/?size=512&id=7820&format=png"
                                                alt="">{{ $comment->Username }}</h5>
                                        <p class="card-text">{{ $comment->comment }}</p>
                                        <p class="card-text"><small
                                                class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="card mb-2 reply">
                                    <style>
                                        .reply {
                                            width: 80%;
                                            margin-left: 20%;
                                            border: 2px solid black
                                        }
                                    </style>
                                    <div class="card-body" style="background: #e2e2e2ac;border 2px solid black">
                                        <p class="card-text mb-4"><small class="text-muted">replied to</small>
                                        </p>
                                        <h5 class="card-title"><img width="35p" style="margin-right:10px"
                                                src="https://img.icons8.com/?size=512&id=7820&format=png"
                                                alt="">{{ $comment->Username }}</h5>
                                        <p class="card-text">{{ $comment->comment }}</p>
                                        <p class="card-text"><small
                                                class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- comment --}}
        @endif
    </div>
</section>
