@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex bg-danger justify-content-center align-items-center min-vh-100">
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
                    <h2 class="d-none d-sm-block" style="font-weight: 700;">Hello {{    Auth::user()->name }}</h2>
                    <h6 class="d-block d-sm-none" style="font-weight: 700;">Hello {{    Auth::user()->name }}</h6>
                </div>
               
                @else
                <div class="d-flex justify-content-center">
                    <h2 class="d-none d-sm-block" style="font-weight: 700;">Please Login for using systems</h2>
                    <h6 class="d-block d-sm-none" style="font-weight: 700;">Please Login for using systems</h6>
                </div>
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
