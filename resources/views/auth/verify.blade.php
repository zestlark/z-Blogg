@extends('layouts.app')

@section('content')
    @extends('layouts.main')

@section('page')
    <div class="container">
        <div class="px-5 py-5 p-lg-0 mx-auto" style="max-width: 400px">
            <div class="d-flex justify-content-center">
                <div
                    class="col-12 col-md-9 col-lg-7 min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
                    <div class="row">
                        <div class="col-lg-10 col-md-9 col-xl-7 mx-auto">
                            <div class="text-center mb-12">
                                <!-- <a class="d-inline-block" href="#">
                                                                                                  <img src="https://preview.webpixels.io/web/img/logos/clever-primary-sm.svg" class="h-12" alt="...">
                                                                      
                                                                                              </a> -->
                                <span class="d-inline-block d-lg-block h1 mb-lg-6 me-3">👋</span>
                                <h1 class="ls-tight font-bolder h2">
                                    Lets start!
                                </h1>
                                <p class="mt-2">Start reading someting great</p>
                            </div>
                            <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif

                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
