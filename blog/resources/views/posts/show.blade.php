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
                        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by {{$post->author}}</p>

                        <p>{{$post->description}}</p>
                        <hr>
                        <p>{{$post->body}}</p>
                        @foreach($tags as $tag)
                        <a href="/posts/tags/{{$tag}}">
                            #{{$tag}}
                        </a>
                        @endforeach
                        <hr>
                        <p>
                            <a href="{{ route('editPost', ['postId' => $post->id])}}" role="button">Edit</a>
                            <a href="#" role="button">Delete</a>
                        </p>
                    </div><!-- /.blog-post -->

                <hr>
                <div class="comments">
                    <ul class="list-group">
                        @foreach($post->comments as $comment)
                            <li class="list-group-item">
                                <div class="comment-{{$comment->id}}"><strong>by {{ $comment->user->name }}</strong> on {{ $comment->created_at }} : {{ $comment->body }}</div><a href="" role="button" class="reply-button" data-id="{{$comment->id}}">Reply</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <hr>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/posts/{{ $post->id }}/comments">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="body" id="textarea-body" placeholder="Your comment here" class="form-control" required></textarea>
                                @error('body')
                                <div class = "alert alert-danger"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add comment</button>
                            </div>
                        </form>
                    </div>

                </div>

                <nav class="blog-pagination">
                </nav>

            </div><!-- /.blog-main -->

            <div class="col-sm-3 offset-sm-1 blog-sidebar">
                @include('layouts.sidebar')
            </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </div><!-- /.container -->
    <script>
        $(document).ready(function () {
            $(".reply-button").on("click", function (event) {
                event.preventDefault();
                var target = $(event.target);
                var id = target.data("id");
                var text = $(".comment-" + id).text();
                $("#textarea-body").val('"' + text + '"');
            });
        });
    </script>
    @endsection
