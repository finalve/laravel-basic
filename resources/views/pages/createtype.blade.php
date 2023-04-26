@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __("POST") }}
                </div>
                <div class="card-body">
                    <form action="{{ route('types.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id=""
                                placeholder="enter name"
                            />
                        </div>
                        <button type="submit" class="btn btn-success">POST</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
