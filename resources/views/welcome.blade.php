@extends('layouts.main')

@section('page')
    @php
        $blogs = DB::table('blogs')
            ->orderBy('id', 'desc')
            ->get();
    @endphp
    <section class="position-relative pt-48 pb-40 bg-dark bg-cover bg-size--cover"
        style="background-image:url(https://images.unsplash.com/photo-1685076454366-f55d46f6c922?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDQ4fGJvOGpRS1RhRTBZfHxlbnwwfHx8fHw%3D&auto=format&fit=crop&w=1000&q=60)">
        <!-- Overlay -->
        <span class="position-absolute top-0 start-0 w-full h-full bg-dark opacity-80"></span>
        <!-- Content -->
        <div class="container-lg max-w-screen-xl position-relative overlap-10 text-center text-lg-start pt-5 pb-5 pt-lg-6">
            <div class="row row-grid align-items-center">
                <div class="col-lg-8 text-center text-lg-start">
                    <!-- Title -->
                    <h1 class="ls-tight font-bolder display-5 text-white mb-5">
                        We built incredible web products for designers & developers
                    </h1>
                    <!-- Text -->
                    <p class="lead text-white text-opacity-75 mb-10 w-lg-2/3">
                        For over 5 years, we pride ourselves on our commitment to excellence, as well as our ability
                        to deliver for our customers.
                    </p>
                    <!-- Buttons -->
                    <div class="mt-10 mx-n2">
                        <a href="#" class="btn btn-lg btn-primary shadow-sm mx-2 px-lg-8">
                            Get started
                        </a>
                        <a href="#" class="btn btn-lg btn-neutral mx-2 px-lg-8">
                            Learn more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (isset($blogs))
        <div class="featured my-5">
            <div class="py-5 service-14">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <span class="badge badge-info rounded-pill px-3 py-1 font-weight-light">Service 14</span>
                            <h3 class="my-3">Awesome with Extra Ordinary Flexibility</h3>
                            <p>You can relay on our amazing features list and also our customer services will be great
                                experience for our users</p>
                            <p>You will surely fall in love with ready touse bootstrap ui kit framework.</p>
                            <a href="{{ route('blog') }}" class="btn btn-primary border-0 text-grey btn-md my-3">read
                                more</a>
                        </div>
                        @for ($i = 0; $i < 2; $i++)
                            <div class="col-lg-4">
                                <div class="mb-4 mb-sm-0">
                                    <img class="rounded img-fluid" style="height: 200px;object-fit: cover;width:100%;"
                                        src="{{ $blogs[$i]->url }}" alt="wrappixel kit" />
                                    <div class="mt-3">
                                        <h6 class="font-weight-medium">{{ $blogs[$i]->title }}</h6>
                                        <p class="mt-3"
                                            style="display: -webkit-box;
                                    -webkit-line-clamp: 6;
                                    -webkit-box-orient: vertical;  
                                    overflow: hidden;">
                                            {{ $blogs[$i]->description }}</p>
                                        <a href="blog/{{ $blogs[$i]->title }}" class="linking">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        <!-- Column -->
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
