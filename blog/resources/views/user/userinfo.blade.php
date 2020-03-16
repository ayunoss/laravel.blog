@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Personal information</div>
                    <div class="card-body">
                        <form action="{{ route('addInfo') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Your name</label>
                                <input class="form-control" type="text" name="name">
                                @error('name')
                                <div class = "alert alert-danger"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Birthdate</label>
                                <input class="form-control" type="date" name="birthdate">
                                @error('birthdate')
                                <div class = "alert alert-danger"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>About yourself</label>
                                <textarea class="form-control" rows="3" name="info"></textarea>
                                @error('about')
                                <div class = "alert alert-danger"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Links</label>
                                <input class="form-control" type="url" name="links" title="Links must be separated with commas">
                                @error('links')
                                <div class = "alert alert-danger"> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-block">Save</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
