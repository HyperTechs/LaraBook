@extends('profile.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ ucwords( Auth::user()->name )  }}</div>

                <div class="panel-body">
                    Wellcome To You Profile..!
                    <br>
                    <img src="{{ asset('img/'. Auth::user()->picture) }}" width="100px" height="100px" class="img-circle" /><br>

                    <form action="{{ route('photo_path') }}" method="POST" enctype="multipart/form-data" files="true" >

                        {{ csrf_field() }}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br>
                        <input type="file" name="picture" class="form-control">
                        <br>
                        <div class="form-group">
                            <button type="submit" class='btn btn-primary'>Save Photo</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
