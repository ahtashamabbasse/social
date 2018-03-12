<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function dashboard()
    {
        $posts=Post::orderBy("created_at","desc")->get();
        return view("dashboard",compact('posts'));
    }
    public function create(Request $request)
    {
        $this->validate($request,[
           "status"=>"required|max:1000"
        ]);
        $post=new Post();
        $post->status=$request->status;
        $msg="Your Post is Not Posted due to Some Reason";
        $class="danger";
        if($request->user()->posts()->save($post))
        {
            $msg="Your Post is Posted Successfully";
            $class="success";
        }
        return redirect("dashboard")->with(compact('msg',"class"));

    }

    public function postDelete($id)
    {
        $user_id=Auth::user()->id;
        $post=Post::whereId($id)->first();
        if($user_id!=$post->user_id)
        {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->back()->with(["msg"=>"Your post is delete","class"=>"success"]);
    }

    public function postUpdate(Request $request)
    {
        if($request->ajax())
        {
            $this->validate($request,[
                "status"=>"required"
            ]);
            $post=Post::findOrFail($request->post_id);
            $post->status=$request->status;
            $post->update();
            return response()->json(['status'=>$post->status],200);
        }
    }

    public function postLike(Request $request)
    {
        $post_id=$request->post_id;
        $isLike=$request->isLike==="true";
        $update=false;
        $post=Post::find($post_id);
        $user=Auth::user();
        $like=$user->likes()->where("post_id",$post_id)->first();
        if($like) {
            $already_like=$like->like;
            $update=true;
            if($already_like==$isLike) {
                $like->delete();
                return null;
            }
        }
        else {
            $like=new Like();
        }
        $like->like=$isLike;
        $like->user_id=$user->id;
        $like->post_id=$post->id;
        if($update) {
            $like->update();
        }else {
            $like->save();
        }
        return null;

    }





}
