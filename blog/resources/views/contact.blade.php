@extends('layout')

@section('content')
    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">Feedback form</h1>
            <p class="lead blog-description">We will get back to you asap!</p>
        </div>
    </div>
    <div class="container">

        <div class="row">

            <div class="col-sm-8 blog-main">
                <form action="/contact" method="post" id="form">
                    {{csrf_field()}}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <p><input type="text" class="form-control" name="username" id="name" placeholder="Your name"></p>
                            @error('username')
                            <div class = "alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <p><input type="text" class="form-control" name="email" id="email" placeholder="E-mail"></p>
                            @error('email')
                            <div class = "alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <p><textarea rows="5" class="form-control" name="message" id="message" placeholder="Leave a message"></textarea></p>
                            @error('message')
                            <div class = "alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" id="sendMessageButton">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
