@extends('layouts.sidebar')
@section('body')
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

   <!-- FormCreatePost -->
   @include('include.posts',$posts)
   <!-- End FormCreatePost -->

@endsection
@section('rightbar')
<div>
    <strong>Add Friend</strong>
    <hr />
    @if($users)
    @foreach($users as $user)
    <div class="row mb-2">
        <div class="col-2">
            <img src="" alt="" width="25px" height="25px" style="
                    border-radius: 50%;
                    border: 2px solid #46a5ff;
                " />
        </div>
        <div class="col">
            <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-{{$user->id}}">
                <span class="py-auto">{{$user->name}}</span>
                <i class="bi bi-person-add px-2" style="font-size: 18px"></i>
            </a>
            <div class="modal" id="modal-{{$user->id}}" tabindex="-1">
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
                                Add Friend ?
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Would you like Add
                                {{$user->name}} to Friend?
                            </p>
                        </div>
                        <form id="friend-form{{$user->id}}" action="{{ route('friend.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-grid mt-3">
                                <input hidden type="text" name="id" value="{{$user->id}}">
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="submit" form="friend-form{{$user->id}}" class="btn btn-primary">
                                Sure
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
<div class="mt-5">
    <strong>Friend</strong>
    <hr />
    @foreach($friendUsers as $friend)
    <div class="row mb-2">
        <div class="col-2">
            <img src="" alt="" width="25px" height="25px" style="
                    border-radius: 50%;
                    border: 2px solid #46a5ff;
                " />
        </div>
        <div class="col">
            <span class="py-auto">{{$friend->name}}</span>
        </div>
    </div>

    @endforeach
</div>

<div class="mt-5">
    <strong>Pending</strong>
    <hr />
    @foreach($friendPending as $friend)
    <div class="row mb-2">
        <div class="col-2">
            <img src="" alt="" width="25px" height="25px" style="
                    border-radius: 50%;
                    border: 2px solid #46a5ff;
                " />
        </div>
        <div class="col">
            <span class="py-auto">{{$friend->name}}</span>
        </div>
    </div>

    @endforeach
</div>
@endsection

@section('script')
<script type="text/javascript">

    $(document).ready(function (e) {

        $('#image').change(function () {

            let reader = new FileReader();

            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);

            }

            reader.readAsDataURL(this.files[0]);

        });

    });

</script>
@endsection