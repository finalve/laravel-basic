@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="">
            <!-- xs responsive -->
            <div class="d-block d-sm-none">
                <h5 style="font-weight: 700;">Welcome To Laravel Basic Project by waleesin</h5>
            </div>
            <!-- sm->up responsive -->
            <div class="d-none d-sm-block">
                <h1 style="font-weight: 700;">Welcome To Laravel Basic Project by waleesin</h1>
            </div>
            @if (Route::has('login'))
            <div class="my-5">
                @auth
                <div class="d-flex justify-content-center">
                    <h2 class="d-none d-sm-block" style="font-weight: 700;"><a href="{{route('home')}}"> Hello {{Auth::user()->name }}</a></h2>
                    <h6 class="d-block d-sm-none" style="font-weight: 700;"><a href="{{route('home')}}"> Hello {{Auth::user()->name }}</a></h6>
                </div>
               
                @else
                <div class="d-flex justify-content-center">
                    <h2 class="d-none d-sm-block" style="font-weight: 700;">Please <a href="{{route('login')}}"> Login </a> for using systems</h2>
                    <h6 class="d-block d-sm-none" style="font-weight: 700;">Please <a href="{{route('login')}}"> Login </a> for using systems</h6>
                </div>
                    
                @endauth
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
