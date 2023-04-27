@extends('layouts.sidebar')
@section('body')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="text-end">
                <h1 class="card-title my-3">Friend Request</h1>
                <hr />
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session("success") }}
            </div>
            @endif @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                @foreach($friendReq as $friend)
                <div class="col-6">
                    <div class="row mb-3 col d-flex align-items-center">
                        <div class="col-2 justify-content-center">
                            <img src="" alt="" width="50px" height="50px" style="
                                    border-radius: 50%;
                                    border: 2px solid #46a5ff;
                                " />
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-12 text-end"><strong>{{$friend->name}}</strong></div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-end"> <span class="">{{$friend->pivot->created_at}}</span></div>
                            </div>
                           
                        </div>
                        <div class="col">
                            <form action="{{ route('friend.update', $friend->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-primary">Accept</button>
                            </form>
                         
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

