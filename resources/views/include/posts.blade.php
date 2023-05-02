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
                        
                       @if(isset($post->user->profile->img))
                        <img src="{{ asset('storage/Image/profile/'.$post->user->name.'/'.$post->user->profile->img) }}" alt="" width="50px" height="50px" style="
                                border-radius: 50%;
                                border: 2px solid #46a5ff;
                            " />
                               @else 
                               <img src="{{ asset('storage/Image/profile/default.png') }}" alt="" width="50px" height="50px" style="
                               border-radius: 50%;
                               border: 2px solid #46a5ff;
                           " />
                            @endif
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
          
            @if(isset($post->img))
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
       <form action="{{route('comment.store')}}" method="post" >
       @csrf
        <div class="input-group mb-3">
            <input class="form-control" type="text" name="comment"/> 
            <input hidden class="form-control" type="text" name="pid" value="{{$post->id}}"/>
            <button type="submit" class="btn btn-outline-secondary">comment </button>
        </div>
    </form>
    <div>
    
      @foreach($post->comments as $comment)
      <div class="p-2">

    <div class="card" style="border-radius: 20px;">
        <div class="card-title">
            <div class="row p-2">
                <div class="col-1">
                    @if(isset($comment->user->profile->img))
                    <img src="{{ asset('storage/Image/profile/'.$comment->user->name.'/'.$comment->user->profile->img) }}" alt="" width="50px" height="50px" style="
                            border-radius: 50%;
                            border: 2px solid #46a5ff;
                        " />
                        @else 
                        <img src="{{ asset('storage/Image/profile/default.png') }}" alt="" width="50px" height="50px" style="
                        border-radius: 50%;
                        border: 2px solid #46a5ff;
                    " />
              @endif
                    
                </div>
                <div class="col-md" style="margin-left: 1rem;">
                    <strong class=""> {{$comment->user->name}} </strong>
                 
                    <p style="font-size: 10px">
                        {{$comment->created_at}}

                    </p>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            {{$comment->comment}}
        </div>
        </div>
    </div>
           
      
     
     
      @endforeach
    </div>
    </div>
</div>
@endforeach