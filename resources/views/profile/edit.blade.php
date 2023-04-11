@extends('layouts.app')
@section('title', 'Update Information')
@section('content')
    <div class="container">
        <form action="{{ route('posts.update', Auth()->user()->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-2 mx-auto">
                    <img src="{{ Auth()->user()->avatar }}" class="w-100 rounded-circle" alt="">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="form-group"> Name </label>
                        <input type="text" name="name" class="form-control" value="{{ Auth()->user()->name }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email" class="form-label"> Email </label>
                        <input type="text" class="form-control" name="email" value="{{ Auth()->user()->email }}"
                            disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password" class="form-label"> Password </label>
                        <input type="hidden" class="form-control" name="old_password"
                            value="{{ Auth()->user()->password }}">
                        <input type="password" class="form-control" name="password" placeholder="Enter New Password">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="upload" class="form-label"> Avatar Image </label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary rounded" value="update info">
        </form>
    </div>
@endsection
