@extends('layouts.app') @section('content')
<div class="container">
    <div class="row min-vh-100">
        <div class="col-md-3">
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
        <div class="col-md-6 bg-info">content
            <div class="card">
              
                    <div class="card-body">
                       <label for="" class="form-label">CREATE POST</label>
                       <textarea class="form-control"></textarea>
                       <div class="d-flex justify-content-center p-2"><button class="btn btn-primary">POST</button></div>
                    
                    </div>
                
            </div>

        </div>
        <div class="col-md-3 bg-success">rightbar</div>
    </div>
</div>

@endsection
