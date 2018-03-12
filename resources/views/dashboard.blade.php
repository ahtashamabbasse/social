@extends("layout.master")
@section("content")
    <section class="row newPost">
        <div class="col-md-6 col-md-offset-3">
            @if(Session::has("msg"))
                <div class="alert alert-{{Session::get("class")}}">
                    <button type="button" class="close" data-dismiss="alert">
                        x
                    </button>
                    {{Session::get("msg")}}
                </div>

            @endif
            <header><h3>Whay Do you Say?</h3></header>
            {!! Form::open(['route'=>"create","method"=>"post"]) !!}
            <div class="form-group {{$errors->has('status')?"has-error":""}}">
                <textarea name="status" id="newPost" class="form-control" rows="5" placeholder="Type what you want post"></textarea>
                <span class="help-block"><strong>{{$errors->first("status")}}</strong></span>
            </div>
            <button type="submit" name="post" class="btn btn-primary pull-right">Post</button>
        </div>
        {!! Form::close() !!}
    </section>
    <section class="row posts">
        <div class="col-md-5 col-md-offset-3">
            <header><h3>What others says</h3></header>
            @forelse($posts as $post)
            <article class="post" data-postId="{{$post->id}}">
                <p class="status{{$post->id}}">{{$post->status}}</p>
                <div class="info">
                    posted By {{$post->user->name}} {{$post->created_at->diffForHumans()}}
                    <div class="interaction">
                    <a href="#" class="like">{{Auth::user()->likes()->where("post_id",$post->id)->first()?Auth::user()->likes()->where("post_id",$post->id)->first()->like==1?"Liked":"Like":"Like"}}</a> |
                        <a href="#" class="like">{{Auth::user()->likes()->where("post_id",$post->id)->first()?Auth::user()->likes()->where("post_id",$post->id)->first()->like==0?"DisLiked":"Dislike":"Dislike"}}</a>

                    @if($post->user_id==Auth::user()->id)
                            |<a href="#" data-toggle="modal" data-PostId="{{$post->id}}" class="edit" >Edit</a>|
                            <a href="{{route("pDelete",['id'=>$post->id])}}">Delete</a>
                        @endif
                    </div>
                </div>
            </article>
                @empty
                No Post is posted Yet
            @endforelse
        </div>
    </section>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Status</h4>
                </div>
                <div class="modal-body">
                    <textarea name="status" id="edit_status_area" class="form-control" rows="5"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="update_btn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        _token='{{Session::token()}}';
        urledit='{{route("edit")}}';
        urlLike='{{route("like")}}';
    </script>
@endsection
