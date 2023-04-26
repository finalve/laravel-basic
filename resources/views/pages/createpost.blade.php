@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __("POST") }}
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                id=""
                                aria-describedby="helpId"
                                placeholder="enter title"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea
                                class="form-control"
                                name="description"
                                id=""
                                cols="30"
                                rows="5"
                                placeholder="enter description"
                            ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Types</label>
                            <select
                                id="types"
                                name="types[]"
                                class="form-control"
                                multiple
                            >
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">
                                    {{ $type->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">
                            POST
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
