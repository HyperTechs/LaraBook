@extends('profile.master')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">sliderbar</div>
        </div>
    </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{ ucwords( Auth::user()->name )  }}</div>

                <div class="panel-body">
                    Wellcome To You Profile..!
                    <br><br>
                    <div class="row">
                      <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                        <h3 align="center">{{ucwords( Auth::user()->name )}}</h3>
                          <img src="{{ asset('img/'. Auth::user()->picture) }}" width="120px" height="120px" class="img-circle">
                          <div class="caption">
                            <p align="center">{{ $data->city }} - {{ $data->country }}</p>
                            <p align="center"><a href="{{ route('edit_profile_path') }}" class="btn btn-primary" role="button">Edit Profile</a></p>
                          </div>
                        </div>
                      </div>
                      <div  class="col-sm-6 col-md-4">
                          <h4><span class="label label-default"> About </span></h4>
                          <p> {{ $data->about }}</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
