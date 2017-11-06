<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Page;
class PageController extends Controller
{
    public function getAdd(){
        return view('admin.pages.add');
    }

    public function postAdd(Request $request){
        $page =  new Page();
        $page->title = $request->title;
        $page->status = $request->status;
        $page->save();
        return Redirect::to('admin/page/list');
    }

    public function getList(){
        $pages =  Page::all();
        return view('admin.pages.list', compact('pages'));
    }

    // sua

    public function getEdit($id){
        $page = Page::find($id);
        return view('admin.pages.edit',['page'=>$page]);
    }

    public function postEdit(Request $request,$id){
        $page = Page::find($id);

        $page->title = $request->title;
        $page->status = $request->status;
        $page->save();
        return Redirect::to('admin/page/list');

    }
    Public function getEditStt(Request $request){
        $category         = Page::find($request->id);
        $category->status = $request->value;
        $category->save();
    }

    public function detail($id)
    {
        $page =  Page::find($id);
        $posts =  $page->post;
        return view('admin.pages.detail', compact('posts'));
    }
}
