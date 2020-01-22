@extends('layout')

@section('content')
    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">The Blog</h1>
            <p class="lead blog-description">An example blog template built with Bootstrap.</p>
        </div>
    </div>

    <div class="container">

        <div class="row">

            <div class="col-sm-8 blog-main">
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{$post->title}}</h2>
                        <p class="blog-post-meta">{{$post->created_at}} by {{$post->author}}</p>

                        <p>{{$post->description}}</p>
                        <hr>
                        <p>{{$post->body}}</p>
                    </div><!-- /.blog-post -->

                <nav class="blog-pagination">
                    <a href="{{route('editPost', ['postId' => $post->id])}}" role="button">Edit</a>
                    <a href="#" role="button">Delete</a>
                </nav>

            </div><!-- /.blog-main -->

            <div class="col-sm-3 offset-sm-1 blog-sidebar">
                @include('layouts.sidebar')
            </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </div><!-- /.container -->
    @endsection
