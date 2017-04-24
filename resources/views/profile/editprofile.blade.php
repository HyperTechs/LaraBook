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
                        <br>

                        <div class="row">
                            <form action="{{ route('update_profile_path') }}" method="POST" >

                                {{ csrf_field() }}

                              <div class="col-sm-12 col-md-12">
                                <div class="thumbnail">
                                <h3 align="center">{{ucwords( Auth::user()->name )}}</h3>
                                  <img src="{{ asset('img/'. Auth::user()->picture) }}" width="120px" height="120px" class="img-circle">
                                  <div class="caption">
                                    <p align="center">{{ $data->city }} - {{ $data->country }}</p>
                                    <p align="center"><a href="{{ route('change_photo_path') }}" class="btn btn-primary" role="button">Change Image</a></p>
                                  </div>
                                </div>
                              </div>
                              <div  class="col-sm-12 col-md-12">
                                  <span  class="label label-default" > Update Profile </span>
                                  <br>

                                <br>
                                <div class="col-md-6">
                                  <div class="input-group">
                                      <span  id="basic-addon1">City Name</span>
                                      <input type="text" class="form-control" placeholder="City name" name="city" value="{{ $data->city  }}">
                                    </div><br>
                                    <div class="input-group">
                                          <span  id="basic-addon1">Country Name</span>
                                          <input type="text" class="form-control" placeholder="Country name" name="country" value="{{ $data->country  }}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                          <span  id="basic-addon1">About</span><br>
                                          <textarea type="text" class="form-control" name="about">{{ $data->about  }}</textarea>
                                    </div>
                                    <br><br>
                                    <div class="input-group">
                                          <button type="submit" class="btn btn-success pull-rigth">Success</button>
                                    </div>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
