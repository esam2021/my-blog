@extends('layouts.app')
@section('title', 'Alsamara Blog')
@section('content')
    <div class="wrapper">
        <div class="sidebar mt-4">
            <div class="sidebar-text d-flex flex-column h-100 text-center">
                <div class="w-75 circle-avatar bg-secondary rounded-circle mx-auto my-3">
                    <img class="w-100 img-fluid rounded-circle" src="{{ Auth::user()->avatar }}" alt="Image">
                </div>
                <h1 class="font-weight-bold"> {{ ucwords(Auth::user()->name) }} </h1>
                <p class="mb-4">
                    Justo stet no accusam stet invidunt sanctus magna clita vero eirmod, sit sit labore dolores lorem.
                    Lorem at sit dolor dolores sed diam justo
                </p>
                <a href="{{ route('posts.create') }}" class="btn btn-primary"> Create New Post </a>

                {{-- <div class="d-flex justify-content-center mb-5">
                    <a class="btn btn-outline-primary mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="#"><i class="fab fa-instagram"></i></a>
                </div> --}}
                {{-- <a href="" class="btn btn-lg btn-block btn-primary mt-auto">Hire Me</a> --}}
            </div>
            <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                <i class="fas fa-2x fa-angle-double-right text-primary"></i>
            </div>
        </div>
        <div class="content">
            {{-- @if (count($posts) > 0) --}}
            @if ($posts->isNotEmpty())
                <!-- Carousel Start -->
                <div class="container p-0">
                    <div id="blog-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="w-100" src="{{ asset('assets/img/carousel-1.jpg') }}" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <h2 class="mb-3 text-white font-weight-bold">Lorem ipsum dolor sit amet</h2>
                                    <div class="d-flex text-white">
                                        <small class="mr-2"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                        <small class="mr-2"><i class="fa fa-folder"></i> Web Design</small>
                                        <small class="mr-2"><i class="fa fa-comments"></i> 15 Comments</small>
                                    </div>
                                    <a href="" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="{{ asset('assets/img/carousel-2.jpg') }}" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <h2 class="text-white font-weight-bold">Lorem ipsum dolor sit amet</h2>
                                    <div class="d-flex">
                                        <small class="mr-2"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                        <small class="mr-2"><i class="fa fa-folder"></i> Web Design</small>
                                        <small class="mr-2"><i class="fa fa-comments"></i> 15 Comments</small>
                                    </div>
                                    <a href="" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="{{ asset('assets/img/carousel-3.jpg') }}" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <h2 class="text-white font-weight-bold">Lorem ipsum dolor sit amet</h2>
                                    <div class="d-flex">
                                        <small class="mr-2"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                        <small class="mr-2"><i class="fa fa-folder"></i> Web Design</small>
                                        <small class="mr-2"><i class="fa fa-comments"></i> 15 Comments</small>
                                    </div>
                                    <a href="" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <!-- Carousel End -->
                <div class="container bg-white pt-5">
                    @foreach ($posts as $post)
                        <div class="row blog-item px-3 pb-5">
                            <div class="col-md-6 mt-3">
                                {{-- <img class="w-100 img-fluid" src="{{ asset('uploads/' . $post->photo) }}" alt="Image"> --}}
                                <img class="w-100 img-fluid" src="{{ $post->photo }}" alt="Image">
                            </div>
                            {{-- mb-4 mb-md-0 --}}
                            <div class="col-md-6">
                                <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold"> {{ $post->title }} </h3>
                                <div class="d-flex mb-3">
                                    <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i>
                                        {{ date('d:m:Y') }}</small>
                                    {{-- {{ $post->updated_at }}</small> --}}
                                    <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                    <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                                </div>
                                <p> {{ $post->content }} </p>
                                <a class="btn btn-primary rounded" href="{{ route('posts.show', $post->slug) }}">Read More
                                    <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Blog List End -->



                <!-- Footer Start -->
                <div class="container py-4 bg-secondary text-center">
                    <p class="m-0 text-white">
                        Copy Right &copy; <a class="text-white font-weight-bold" href="{{ route('home') }}">
                            Esam </a>. All Rights Reserved. Designed by
                        <a class="text-white font-weight-bold" href="{{ route('home') }}"> Alsamara </a>
                    </p>
                </div>
                <!-- Footer End -->
        </div>
    @else
        <div class="alert alert-danger"> No Article </div>
        @endif
    </div>

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection
@include('layouts.footer')
