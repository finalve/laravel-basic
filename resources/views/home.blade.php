@extends('layouts.app') @section('content')
<div class="container">
    <div class="row min-vh-100">
        <div class="col-md-2">
            <ul
                class="navbar-nav me-auto mb-2 mb-lg-0 position-fixed"
                style="width: 200px"
            >
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
        <div class="col-md-6">
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
                    <label for="" class="form-label"
                        ><strong>CREATE POST</strong></label
                    >

                    <form method="post" action="{{ route('posts.store') }}">
                        @csrf
                        <textarea
                            name="message"
                            class="form-control"
                            style="height: 120px"
                        ></textarea>
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
                                    <img
                                        src=""
                                        alt=""
                                        width="50px"
                                        height="50px"
                                        style="
                                            border-radius: 50%;
                                            border: 2px solid #46a5ff;
                                        "
                                    />
                                </div>
                                <div class="col text-end">
                                    <strong> {{$post->user->name}}</strong>
                                    <p style="font-size: 10px">
                                        {{$post->user->created_at}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div>
                        {{$post->message}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-4">

            <div>
                <strong>Add Friend</strong>
                <hr />
                
                <div class="row mb-2">
                    <div class="col-2">
                        <img
                            src=""
                            alt=""
                            width="25px"
                            height="25px"
                            style="border-radius: 50%; border: 2px solid #46a5ff"
                        />
                    </div>
                    <div class="col">
                        <span>Friend1</span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <img
                            src=""
                            alt=""
                            width="25px"
                            height="25px"
                            style="border-radius: 50%; border: 2px solid #46a5ff"
                        />
                    </div>
                    <div class="col">
                        <span>Friend1</span>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <strong>Friend</strong>
                <hr />
                <div class="row mb-2">
                    <div class="col-2">
                        <img
                            src=""
                            alt=""
                            width="25px"
                            height="25px"
                            style="border-radius: 50%; border: 2px solid #46a5ff"
                        />
                    </div>
                    <div class="col">
                        <span>Friend1</span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <img
                            src=""
                            alt=""
                            width="25px"
                            height="25px"
                            style="border-radius: 50%; border: 2px solid #46a5ff"
                        />
                    </div>
                    <div class="col">
                        <span>Friend1</span>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    @endsection
</div>
