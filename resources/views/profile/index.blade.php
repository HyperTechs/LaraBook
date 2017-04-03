@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ ucwords( Auth::user()->name )  }}</div>

                <div class="panel-body">
                    Wellcome To You Profile..!
                    <br>
                    <img src="{{ asset('img/'. Auth::user()->picture) }}" width="80px" height="80px" /><br>
                    <a href="{{ route('change_photo_path') }}">Change Image</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
