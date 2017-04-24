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
                         <div class="col-sm-12 col-md-12">
                                <div class=" col-md-12" style="margin: 5px;">
                                    @if(session()->has('message'))
                                        <p class="alert alert-success">{{ session()->get('message') }}</p>
                                    @endif
                                    @foreach($friendrequests as $ulist)
                                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                                            <div class="col-md-2 pull-left">
                                                <img src="{{ asset('img/'. $ulist->picture) }}" width="80px" height="80px" class="img-circle" /><br>
                                            </div>

                                            <div class="col-md-7 pull-left">
                                                <h3 style="margin:0px;"><a href="{{route('profile_path', Auth::user()->slug)}}">{{ucwords($ulist->name)}}</a></h3>
                                                <p><b>Gender:</b> {{ucwords($ulist->gender)}} </p>
                                                <p><b>Email:</b> {{ $ulist->email }} </p>
                                            </div>
                                            <div class="col-md-3 pull-right">
                                                 <p>
                                                     <a href="{{route('accept_friends_path', $ulist->id)}}" class="btn btn-success btn-sm">Confirm</a>
                                                 </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                         </div>
                         <div class="col-sm-12 col-md-12">

                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
