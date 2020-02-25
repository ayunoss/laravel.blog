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
            @foreach($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="{{route('showPost', ['post' => $post->id])}}">{{$post->title}}</a></h2>
                    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by {{$post->author}}</p>

                    <p>{{$post->description}}</p>
                    <hr>
                    <p>{{$post->body}}</p>
                </div><!-- /.blog-post -->
            @endforeach
                <nav class="blog-pagination">
                    @if(!empty($posts) && $posts->count())
                        {{$posts->links()}}
                    @else
                        <tr>
                            <td colspan="10">There are no data.</td>
                        </tr>
                    @endif
                </nav>

            </div><!-- /.blog-main -->

            <div class="col-sm-3 offset-sm-1 blog-sidebar">
                @include('layouts.sidebar')
                {{--<div class="sidebar-module sidebar-module-inset">
                    <h4>About</h4>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>
                <div class="sidebar-module">
                    <h4>Archives</h4>
                    <ol class="list-unstyled">
                        <ul>
                            @foreach ($archives as $item)
                                <li>
                                    <a href="/?month={{ $item->month }}&year={{ $item->year }}">
                                        {{ $item->month . ' ' . $item->year }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="https://github.com/ayunoss">GitHub</a></li>
                        <li><a href="">Telegram</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ol>
                </div>--}}
            </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </div><!-- /.container -->
@endsection
