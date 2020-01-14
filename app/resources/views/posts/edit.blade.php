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
                <form action="/add" id="form" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" type="text" name="description">
                    </div>
                    <div class="form-group">
                        <label>Text</label>
                        <textarea class="form-control" rows="3" name="text"></textarea>
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
