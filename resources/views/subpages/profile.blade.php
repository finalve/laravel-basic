@extends('layouts.app')
@section('content')
<div class="container">
    <!-- Logo Banner -->
    <div style="height: 400px;">
        <a href="" data-bs-toggle="modal" data-bs-target="#uploadBanner">
            <img src="http://localhost:8000/public/Image/202304290804V_logo.png" alt="" width="100%" height="100%"
                style="margin-top: -25px;">
        </a>
    </div>
    <!-- Modal -->
    <div class="modal" id="uploadBanner" tabindex="-1">
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
                        Upload Banner
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Would you like Upload Your Banner ?
                    </p>
                </div>
                <form id="friend-form" action="{{ route('friend.store') }}" method="POST">
                    @csrf
                    <input type="text" name="id" value="" />
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
    <!-- End Modal -->
    <!-- End Logo Banner -->
    <!-- Header -->
    <div class="d-sm-block d-none mb-5 bg-light">
        <div class="row">
            <div class="col-3">
                <a href="" data-bs-toggle="modal" data-bs-target="#uploadProfile">
                    <img src="http://localhost:8000/public/Image/202304290804V_logo.png" alt=""
                        style="border: 5px solid #FFFFFF; border-radius: 50%; margin-top: -50px; margin-left: 50px;"
                        width="200px" height="200px">
                </a>
            </div>
            <div class="col">
                <h1>Waleesin</h1>
            </div>
            <!-- Modal -->
            <div class="modal" id="uploadProfile" tabindex="-1">
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
                                Upload
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Would you like Upload Your Profile ?
                            </p>
                        </div>
                        <form id="friend-form" action="{{ route('friend.store') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="" />
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
            <!-- End Modal -->
        </div>
        <!-- menubar -->
        <div>
            <hr style="margin-bottom: -0.5px;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-top: -7.5px;">
                    <li class="nav-item">
                        <strong><a class="nav-link" href="/home">Feed</a></strong> 
                    </li>
                    <li class="nav-item">
                        <strong> <a class="nav-link" href="/profile">Posts</a></strong> 
                    </li>
                    <li class="nav-item">
                       <strong> <a class="nav-link" href="#">About</a></strong> 
                    </li>
                    <li class="nav-item">
                        <strong> <a class="nav-link" href="#">Friend</a></strong> 
                    </li>
                    <li class="nav-item">
                        <strong> <a class="nav-link" href="#">Photo</a></strong> 
                    </li>
                </ul>
            </nav>
            <hr style="margin-top: -10px;">
        </div>
       
        <!-- end menubar -->
    </div>
    <!-- End Header -->
    <!-- Profile -->
    <div class="row">
        <div class="col">
            <h3>Profile</h3>
            <ul>
                <li>
                    A
                </li>
                <li>
                    B
                </li>
                <li>
                    C
                </li>
            </ul>
            <h3>Picture</h3>
            ....
            ....
            <h3>Friend</h3>
            ....
            ....
        </div>
        <!-- End Profile -->
        <!-- Content -->
        <div class="col">
            <!-- FormCreatePost -->
            @include('include.posts',$posts)
            <!-- End FormCreatePost -->

        </div>
    </div>
</div>
@endsection