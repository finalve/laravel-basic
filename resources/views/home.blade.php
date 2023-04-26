@extends('layouts.app') @section('content')
<div class="container">
    <div class="row min-vh-100">
        <div class="col-md-2">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 position-fixed" style="width: 200px">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="bi bi-house"></i>
                        <strong class="p-2">HOME</strong>
                    </a>
                </li>
                <hr />
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="bi bi-file"></i>
                        <strong class="p-2">Pages</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="bi bi-people-fill"></i>
                        <strong class="p-2">Groups</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="bi bi-shop"></i>
                        <strong class="p-2">MarketPlace</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="bi bi-person"></i>
                        <strong class="p-2">Friend</strong>
                    </a>
                </li>
                <hr />
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="bi bi-gear"></i>
                        <strong class="p-2">Settings</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="bi bi-person-badge"></i>
                        <strong class="p-2">Profile</strong>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-7">
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
            <div class="card mb-3">
                <div class="card-body">
                    <label for="" class="form-label"><strong>CREATE POST</strong></label>

                    <form method="post" action="{{ route('posts.store') }}">
                        @csrf
                        <textarea name="message" class="form-control" style="height: 120px"></textarea>
                        <div class="d-grid mt-3">
                            <button class="btn btn-primary">POST</button>
                        </div>
                    </form>
                </div>
            </div>
            @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-2">
                                    <img src="" alt="" width="50px" height="50px" style="
                                            border-radius: 50%;
                                            border: 2px solid #46a5ff;
                                        " />
                                </div>
                                <div class="col text-end">
                                    <strong> {{$post->user->name}}</strong>
                                    <p style="font-size: 10px">
                                        {{$post->user->created_at}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col text-end">X</div>
                    </div>
                    <div>
                        {{$post->message}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-2">
            <div>
                <strong>Add Friend</strong>
                <hr />
                @foreach($users as $user)
                <div class="row mb-2">
                    <div class="col-2">
                        <img src="" alt="" width="25px" height="25px" style="
                                border-radius: 50%;
                                border: 2px solid #46a5ff;
                            " />
                    </div>
                    <div class="col">
                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span class="py-auto">{{$user->name}}</span>
                            <i class="bi bi-person-add px-2" style="font-size: 18px"></i>
                        </a>
                        <div class="modal" id="exampleModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
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
                                        <h5 class="modal-title">
                                            Add Friend ?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Would you like Add
                                            {{$user->name}} to Friend?
                                        </p>
                                    </div>
                                    <form id="friend-form" action="{{ route('friend.store') }}" method="POST">
                                        @csrf
                                        <input hidden type="text" name="id" value="{{$user->id}}" />
                                        <div class="modal-footer">
                                            <button type="submit" form="friend-form" class="btn btn-primary">
                                                Sure
                                            </button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-5">
                <strong>Friend</strong>
                <hr />

                @foreach($friendUsers as $friend)
                <div class="row mb-2">
                    <div class="col-2">
                        <img src="" alt="" width="25px" height="25px" style="
                                border-radius: 50%;
                                border: 2px solid #46a5ff;
                            " />
                    </div>
                    <div class="col">
                        <span class="py-auto">{{$friend->name}}</span>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>

    @endsection
</div>