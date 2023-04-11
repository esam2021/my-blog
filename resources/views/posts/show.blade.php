@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="wrapper">
        <div class="content">
            <!-- Blog Detail Start -->
            <div class="container py-5 px-2 bg-white">
                <div class="row px-4">
                    <div class="col-12">
                        <img class="w-100 img-fluid mb-4" src="{{ $post->photo }}" alt="Image">
                        {{-- <img class="w-100 img-fluid mb-4" src="{{ asset('uploads/' . $post->photo) }}" alt="Image"> --}}
                        <h2 class="mb-3 font-weight-bold"> {{ $post->title }} </h2>
                        <div class="d-flex">
                            <p class="mr-3 text-muted"><i class="fa fa-calendar-alt"></i> {{ date('d:m:Y') }} </p>
                            <p class="mr-3 text-muted"><i class="fa fa-folder"></i> Web Design</p>
                            <p class="mr-3 text-muted"><i class="fa fa-comments"></i> 15 Comments</p>
                        </div>
                        <p> {{ $post->content }} </p>
                    </div>
                    <div class="col-12 py-4">
                        @if ($comments->isNotEmpty())
                            <h3 class="mb-4 font-weight-bold">{{ count($comments) }} Comments</h3>
                            @foreach ($comments as $comment)
                                <div class="media mb-4">
                                    <img src="{{ $comment->user->avatar }}" alt="Image" class="mr-3 mt-1 rounded-circle"
                                        style="width:60px;">
                                    <div class="media-body">
                                        <h4>{{ $comment->user->name }} <small
                                                class="text-danger"><i>{{ date('d:m:Y') }}</i></small></h4>
                                        <p>
                                            {{ $comment->comment }}
                                        </p>
                                        <hr class="bg-dark">
                                    </div>
                                </div>
                            @endforeach
                    </div>
                @else
                    <div class="alert alert-danger"> No Comments </div>
                    @endif
                    <div class="col-12">
                        <h3 class="mb-4 font-weight-bold">Leave a comment</h3>
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" cols="30" rows="5"
                                    class="form-control @error('message') is-invalid @enderror"></textarea>
                                @error('message')
                                    <div class="alert alert-danger mt-2"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Leave Comment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Footer Start -->
            <div class="container py-4 bg-secondary text-center">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved.
                    Designed by <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <!-- Footer End -->
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection
