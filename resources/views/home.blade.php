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
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-body">
                    <label for="" class="form-label"
                        ><strong>CREATE POST</strong></label
                    >
                    <textarea
                        class="form-control"
                        style="height: 120px"
                    ></textarea>
                    <div class="d-grid mt-3">
                        <button class="btn btn-primary">POST</button>
                    </div>
                </div>
            </div>
            <div class="card mb-2">
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
                                        style="border-radius: 50%"
                                    />
                                </div>
                                <div class="col text-end">
                                    <strong>CREATE POST</strong>
                                    <p style="font-size: 10px">CREATE POST</p>
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Commodi consequuntur necessitatibus blanditiis eum
                        laudantium quo ipsum. Earum commodi saepe architecto,
                        quaerat, molestias asperiores quod exercitationem quis a
                        eligendi reiciendis eveniet!
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 bg-success">rightbar</div>
    </div>
</div>

@endsection
