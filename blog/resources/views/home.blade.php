@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong> Personal information </strong></div>
                <div class="card-body">
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <a href="{{ route('avatarForm') }}">
                        <img src="{{ $avatar }}" width="200px"
                             height="200px" title="Tap to change user photo" alt="User photo" align="right"/>
                    </a>
                    @if($info !== null)
                    @foreach($info as $section)
                        <p class="blog-post-meta" ><strong style="color: #e3701d">Your name: </strong>{{ $section->name }}</p>
                        <p class="blog-post-meta"><strong style="color: #e3701d">Your email: </strong>{{$userInfo->email}} </p>
                        <p class="blog-post-meta"><strong style="color: #e3701d">Your birthdate: </strong>{{$section->birthdate}} </p>
                        <p class="blog-post-meta"><strong style="color: #e3701d">About yourself: </strong>{{$section->info}} </p>
                        <p class="blog-post-meta"><strong style="color: #e3701d">Links: </strong>{{$section->links}} </p>
                        <hr>
                        <a href="{{ route('infoForm') }}"> Upload info </a>
                        <a href="{{ route('infoFormEdit') }}"> Edit info </a>
                    @endforeach
                    @endif
                    @if($info == null)
                        <p class="blog-post-meta" ><strong style="color: #e3701d"> Your name: </strong> Please fill in your presonal information </p>
                        <p class="blog-post-meta"><strong style="color: #e3701d">Your email: </strong>{{$userInfo->email}} </p>
                        <p class="blog-post-meta"><strong style="color: #e3701d">Your birthdate: </strong> Please fill in your presonal information </p>
                        <p class="blog-post-meta"><strong style="color: #e3701d">About yourself: </strong> Please fill in your presonal information </p>
                        <p class="blog-post-meta"><strong style="color: #e3701d">Links: </strong> Please fill in your presonal information </p>
                        <hr>
                        <a href="{{ route('infoForm') }}"> Upload info </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
