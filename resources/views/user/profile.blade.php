@extends('master')

@section('title')
    {{ Auth::user()->name }}'s Profile
@endsection

@section('keywords')
   profile
@endsection

@section('description')
   profile
@endsection

@section('style')
<style type="text/css">
    .profile-img {
        max-width: 200px;
        height: 200px;
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
@endsection

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
                    <br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Pro Pic</button>
                    <h2>{{ $user->name }}</h2><p>Member Since {{ $user->created_at->format('j F Y') }}</p>
                    <hr>
                    <h6><h4>Skills : (<small><a href="#" data-toggle="modal" data-target="#editskills">Edit Skills</a></small>)</h4>
                        @foreach($skills as $skill)
                        {{ $skill->skills }}
                        @endforeach
                    </h6><hr>
                    <h6><h4>Intro : (<small><a href="#" data-toggle="modal" data-target="#editintro">Edit</a></small>)</h4>{{ $user->intro }}</h6>
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

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center;">Edit Profile</h4>
            </div>
            <div class="modal-body text-center" style="display: inline;padding: 10px;">
                <form enctype="multipart/form-data" action="{{ url('/profilepic') }}" method="POST" style="display: inline-block;padding: 25px;width: 100%">
                    <label style="padding: 0px 25px;"><h5>Update Pro Pic : </h5></label>
                    <div style="padding: 10px;">
                    <img src="images/uploads/avatars/{{ $user->avatar }}" alt="{{ Auth::user()->name }}" class="profile-img"></div>
                    <label for="file-upload" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"></i> Image Upload
                    </label>
                    <input id="file-upload" type="file" name="avatar" style="display: none;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                    <input type="submit" class="btn btn-success"  style="margin: 20px 15px;">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editskills" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center;">Edit Skills</h4>
            </div>
            <div class="modal-body" style="display: inline;padding: 10px;">
                <form enctype="multipart/form-data" action="/profile" method="POST" style="display: inline-block;padding: 25px;width: 100%">
                
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                    <input type="submit" class="btn btn-success"  style="margin: 20px 15px;">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editintro" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center;">Edit Intro</h4>
            </div>
            <div class="modal-body" style="display: inline;padding: 10px;">
                <form enctype="multipart/form-data" action="/profile" method="POST" style="display: inline-block;padding: 25px;width: 100%">
                    <label for="profession">Intro:</label>
                    <textarea class="form-control" rows="3" id="profession" placeholder="" name="intro" required>{{ $user->intro }}</textarea>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                    <input type="submit" class="btn btn-success"  style="margin: 20px 15px;">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
