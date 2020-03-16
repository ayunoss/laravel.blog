@extends('layout')

@section('content')
    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">Add post</h1>
            <p class="lead blog-description">An example blog template built with Bootstrap.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <form method="post" id="form" data-route="{{route('submitPost')}}"  enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title">
                        @error('title')
                        <div class = "alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" type="text" name="description">
                        @error('description')
                        <div class = "alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Text</label>
                        <textarea class="form-control" rows="3" name="text"></textarea>
                        @error('text')
                        <div class = "alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label>Categories</label>
                        <input class="form-control" type="text" name="tags" title="Categories must be separated with commas">
                        @error('tags')
                        <div class = "alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
    {{--<script src="{{ asset('js/post.js') }}" type="text/javascript"></script>--}}
    @endsection
