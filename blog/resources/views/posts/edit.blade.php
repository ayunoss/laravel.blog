@extends('layout')

@section('content')
    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">Edit post</h1>
            <p class="lead blog-description">An example blog template built with Bootstrap.</p>
        </div>
    </div>
    <div class="container">

        <div class="row">

            <div class="col-sm-8 blog-main">
                <form action="{{route('editData', ['postId' => $postData->id])}}" id="form" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title" value="{{$postData->title}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" type="text" name="description" value="{{$postData->description}}">
                    </div>
                    <div class="form-group">
                        <label>Text</label>
                        <textarea class="form-control" rows="3" name="body">{{$postData->body}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
