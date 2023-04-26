@extends('layouts.app')

@section('content')

@foreach($friendReq as $friend)
<div class="row mb-2">
    <div class="col-2">
        <img src="" alt="" width="25px" height="25px" style="
                border-radius: 50%;
                border: 2px solid #46a5ff;
            " />
    </div>
    <div class="col">
        <span class="py-auto">{{$friend->user}}</span>
    </div>
</div>

@endforeach
@endsection