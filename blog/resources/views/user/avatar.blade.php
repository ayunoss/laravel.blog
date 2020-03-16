@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload avatar photo</div>
                    <div class="card-body">
                        <form action="{{ route('addAvatar') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <img src="{{ $avatar }}"
                                 width="200" height="200" title="User photo" alt="User photo" align=""/>
                            <a href="{{ route('deleteAvatar') }}"> Delete avatar </a>
                            <div class="form-group"><label>Please choose your image file</label>
                            <input class="btn-block" type="file" name="avatar">
                                @error('avatar')
                                <div class = "alert alert-danger"> {{$message}} </div>
                                @enderror
                            </div>
                            <hr/>
                            <button class="btn btn-dark" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
