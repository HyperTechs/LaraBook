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
                                    @foreach($_allUser as $ulist)
                                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                                            <div class="col-md-2 pull-left">
                                                <img src="{{ asset('img/'. $ulist->picture) }}" width="80px" height="80px" class="img-circle" /><br>
                                            </div>

                                            <div class="col-md-7 pull-left">
                                                <h3 style="margin:0px;"><a href="{{route('profile_path', Auth::user()->slug)}}">{{ucwords($ulist->name)}}</a></h3>
                                                <p> {{ $ulist->city }} - {{ $ulist->country }}</p>
                                                <p>{{$ulist->about}}</p>
                                            </div>
                                            <div class="col-md-3 pull-right">

                                                <?php
                                                $check = DB::table('friendships')
                                                    ->where('user_requested', '=', $ulist->id)
                                                    ->where('requester', '=', Auth::user()->id)
                                                    ->first();
                                                if($check ==''){
                                                ?>
                                                <p>
                                                    <a href="{{route('add_friends_path', $ulist->id)}}"
                                                       class="btn btn-info btn-sm">Add to Friend</a>
                                                </p>
                                                <?php } else {?>
                                                <p>Request Already Sent</p>
                                                <?php }?>
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
