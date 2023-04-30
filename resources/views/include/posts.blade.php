 <!-- FormCreatePost -->
 <div class="card mb-3">
    <div class="card-body">
        <label for="" class="form-label"><strong>CREATE POST</strong></label>
        <div class="row">
            <img id="preview-image" src="" alt="preview image" style="max-height: 250px;">
        </div>
        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <textarea name="message" class="form-control" style="height: 120px"></textarea>
            <div class="d-grid mt-3">
                <input type="file" name="img" id="image" class="form-control">
            </div>
            <div class="d-grid mt-3">
                <button class="btn btn-primary">POST</button>
            </div>

        </form>
    </div>
</div>
<!-- End FormCreatePost -->
@foreach($posts as $post)
<div class="card mb-3 ">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-4">
                <div class="row">
                    <div class="col-md-2">
                        <img src="" alt="" width="50px" height="50px" style="
                                border-radius: 50%;
                                border: 2px solid #46a5ff;
                            " />
                    </div>
                    <div class="col-md" style="margin-left: 1rem;">
                        <strong class=""> {{$post->user->name}} </strong>
                        <p style="font-size: 10px">
                            {{$post->user->created_at}}

                        </p>
                    </div>
                </div>
            </div>
            <div class="col text-end">
             <h1>...</h1> 
            </div>
        </div>
        <div>
            <div class="row mb-3 mx-3">
                {{$post->message}}
            </div>
          
            @if($post->img!==null)
            <div class="row mb-3">
                <img src="{{ url('public/Image/'.$post->img) }}" alt="">
            </div>
            @endif
           
        </div>
        <div class="text-center">
            <hr>
            <strong>COMMENTS</strong>
            <hr>
        </div>
       
        <div class="input-group mb-3">
            <input class="form-control" type="text"/> 
            <button class="btn btn-outline-secondary">comment </button>
        </div>
    </div>
</div>
@endforeach