@extends('master')

@section('title')
    Profile
@endsection

@section('keywords')
   profile
@endsection

@section('description')
   profile
@endsection

<style type="text/css">
    .profile-img {
        max-width: 200px;
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 8px 12px;
        margin: 15px 5px;
        cursor: pointer;
    }   
</style>

@section('content')
<div class="container" style="margin-top: 120px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <div>
                        <img src="{{ url('images/uploads/avatars') }}/{{ $user->avatar }}" alt="{{ Auth::user()->name }}" class="profile-img" style="right: -150px;">
                    </div>
                    <i class="fa fa-cc-visa fa-2x" aria-hidden="true" style="padding: 5px;margin: 10px 0px;color: #5dc26a;" data-toggle="tooltip" data-placement="top" title="Hooray!"></i>
                    <i class="fa fa-envelope fa-2x" aria-hidden="true" style="padding: 5px;margin: 10px 0px;color: #5dc26a;" data-toggle="tooltip" data-placement="top" title="Hooray!"></i>
                    <i class="fa fa-phone fa-2x" aria-hidden="true" style="padding: 5px;margin: 10px 0px;" data-toggle="tooltip" data-placement="top" title="Hooray!"></i>
                    <i class="fa fa-user fa-2x" aria-hidden="true" style="padding: 5px;margin: 10px 0px;" data-toggle="tooltip" data-placement="top" title="Hooray!"></i>
                    <br>
                    <h2>{{ $user->name }}</h2><p>Member Since {{ $user->created_at->format('j F Y') }}</p>
                    <hr>
                    <h6><h4>Skills :</h4>
                        @foreach($skills as $skill)
                        {{ $skill->skills }}
                        @endforeach
                    </h6><hr>
                    <h6><h4>Intro : </h4>{{ $user->intro }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Reviews</h3>
                    <hr>
                    <h5>asz</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
