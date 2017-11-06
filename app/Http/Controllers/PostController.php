<?php

namespace App\Http\Controllers;

use App\Media;
use App\Post;
use App\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function getAdd(){
    	$pages = Page::all();
        return view('admin.posts.add', compact('pages'));
    }

    public function postAdd(Request $request){
        $post =  new Post();
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->description = html_entity_decode($request->description);
        $post->page_id =$request->page;
        $post->status =$request->status;
        $post->save();
        if($request->hasFile('file')){
           	$post->addMedia($request->file)->toMediaLibrary('image');
        }
        return Redirect::to('admin/post/list');
    }

    public function getList(){
        $posts =  Post::orderBy('id', 'DESC')->get();
        
        return view('admin.posts.list', compact('posts'));
    }

    public function getDetail($id){
        $post = Post::findOrFail($id);
        $post->page;
        return $post;
        // return view('admin.posts.detail', compact('post'));
    }

    public function getEdit($id){
        $post = Post::findOrFail($id);
        $pages = Page::all();
        return view('admin.posts.edit', compact('post', 'pages'));
    }

    public function postEdit(Request $request, $id){
        $update_post = Post::where('id', $id)->update([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'description'=>$request->description,
            'status'=>$request->status,
            'page_id'=>$request->page,
        ]);
        if($update_post == 1){
            if($request->hasFile('file')){
                $add_post =  Post::findOrFail($id);
                $add_post->addMedia($request->file)->toMediaLibrary('image');
            }
        }
        return Redirect::to('admin/post/list')->with('success', 'Bài viết '.$request->title." được thay đổi thành công !");
    }

    public function delete(Request $request){
        $delete_post = Post::find($request->id);
        $delete_post->delete();
        return response()->json();
    }

    public function deleteImage(Request $request){
        Media::findOrFail($request->id)->delete();
        return response()->json();
    }

    public function getEditStt(Request $request){
    	$post         = Post::find($request->id);
        $post->status = $request->value;
        $post->save();

        // Post::where('id', $id)->update(['status'=>$request->status]);
        // return response()->json();
    }
}
