@extends('layouts.app')
@section('content')
<div class="container">
    <!-- Logo Banner -->
    <div style="height: 400px;">
        <a href="" data-bs-toggle="modal" data-bs-target="#uploadBanner">
            @if(isset($branner->img))
            <img src="{{ asset('storage/Image/branner/'.$name.'/'.$branner->img) }}" alt="" width="100%" height="100%"
                style="margin-top: -25px;">
              
                @else
                <img src="{{ asset('storage/Image/branner/default.png') }}" alt="" width="100%" height="100%"
                style="margin-top: -25px;">
                @endif
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
                <form id="branner-form" action="{{ route('branner.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="d-grid mt-3">
                        <textarea name="message" class="form-control" style="height: 120px"></textarea>
                    </div>
                        <div class="d-grid mt-3">
                        <input type="file" class="form-control" name="img" value="" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="branner-form" class="btn btn-primary">
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
                    @if(isset($profile->img))
                    <img src="{{ asset('storage/Image/profile/'.$name.'/'.$profile->img) }}" alt=""
                        style="border: 5px solid #FFFFFF; border-radius: 50%; margin-top: -50px; margin-left: 50px;"
                        width="200px" height="200px">
                        @else
                        
                        <img src="{{ asset('storage/Image/profile/default.png') }}" alt=""
                        style="border: 5px solid #FFFFFF; border-radius: 50%; margin-top: -50px; margin-left: 50px;"
                        width="200px" height="200px">
                        @endif
                </a>
            </div>
            <div class="col">
                <h1>{{$name}}</h1>
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
                        <form id="profile-form" action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-grid mt-3">
                            <textarea name="message" class="form-control" style="height: 120px"></textarea>
                        </div>
                            <div class="d-grid mt-3">
                            <input type="file" class="form-control" name="img" value="" />
                        </div>
                           
                            <div class="modal-footer">
                                <button type="submit" form="profile-form" class="btn btn-primary">
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
        <div class="col" style="font-size: 18px;">
           
            <h3>Profile</h3>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 p-2">
                <li class="name item">
                 <i class="bi bi-mortarboard me-3"></i><span>{{isset($personal) ? $personal->school:''}}</span> 
                </li>
                <li0>
                    <i class="bi bi-house-door me-3"></i><span>{{isset($personal) ? $personal->location:''}}</span> 
                </li0>
                <li>
                    <i class="bi bi-heart me-3"></i><span>{{isset($personal) ? $personal->relationship:''}}</span> 
                </li>
            </ul>
            <div class="d-grid gap-2">
                <a class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#editpersonal">Add Personal Profile</a>
            </div>
            <hr>
            <h3>Picture</h3>
            ....
            ....
            <hr>
            <h3>Friend</h3>
            ....
            ....
        </div>
          <!-- Modal -->
    <div class="modal" id="editpersonal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Edit Personal Profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="personal-form" action="{{ route('personal.store') }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping"> <i class="bi bi-mortarboard"></i></span>
                            <input type="text" class="form-control" placeholder="School" name="school" aria-label="School" aria-describedby="addon-wrapping">
                          </div>
                          <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping"> <i class="bi bi-house-door"></i></span>
                            <input type="text" class="form-control" placeholder="Location" name="location" aria-label="Location" aria-describedby="addon-wrapping">
                          </div>

                          <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping"> <i class="bi bi-heart"></i></span>
                            <input type="text" class="form-control" placeholder="Relationship" name="relationship" aria-label="Relationship" aria-describedby="addon-wrapping">
                          </div>
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="submit" form="personal-form" class="btn btn-primary">
                            Sure
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                
            </div>
        </div>
    </div>
    <!-- End Modal -->

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