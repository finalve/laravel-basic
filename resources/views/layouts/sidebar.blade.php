@extends('layouts.app') @section('content')
<div class="container">
    <div class="row min-vh-100">
        <div class="col-md-2 d-none d-sm-block">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 position-fixed" style="width: 200px">
                <li class="nav-item">
                    <a href="/home" class="nav-link">
                        <i class="bi bi-house"></i>
                        <strong class="p-2">HOME</strong>
                    </a>
                </li>
                <hr />
                <li class="nav-item">
                    <a href="/profile" class="nav-link">
                        <i class="bi bi-file"></i>
                        <strong class="p-2">Profile</strong>
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
                    <a href="{{route('friend.index')}}" class="nav-link d-flex align-items-center">
                        <i class="bi bi-person" style="font-size: 1.25rem;"></i>
                        <strong class="p-2">Friend </strong>
                        <span class="badge rounded-pill bg-danger">99+</span>
                    </a>
                </li>
                <hr />
                <li class="nav-item">
                    <a href="{{ route('pwd.edit') }}" class="nav-link">
                        <i class="bi bi-gear"></i>
                        <strong class="p-2">Settings</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="bi bi-person-badge"></i>
                        <strong class="p-2">Logout</strong>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col">
            @yield('body')
        </div>
        <div class="col-md-2 d-none d-sm-inline-block">
            @yield('rightbar')
        </div>
    </div>
</div>

@endsection