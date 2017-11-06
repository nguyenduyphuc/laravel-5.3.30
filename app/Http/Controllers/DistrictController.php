<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\District;
class DistrictController extends Controller
{
    public function getAdd()
    {
    	$states = State::all();
        return view('admin.districts.add', compact('states'));
    }

    public function postAdd(Request $request)
    {
    	 $this->validate($request, [
	        'name' => 'required|unique:districts|max:255',
	    ]);
    	$state =  State::find($request->state);
        $district = new District();
        $district->name   = $request->name;
        $district->value   = str_slug($request->name, '');
        $district->state_id   = $request->state;
        $district->save();
        return redirect()->back()->with('success', "Thêm Huyện trong tỉnh ".$state->name." thành công");
    }
    public function getList()
    {
    	$districts =  State::all();
    	return view('admin.districts.list', compact('districts'));
    }


    public function getEdit($id)
    {
        $district = District::find($id);
        return view('admin.districts.edit', compact('district'));
    }

    public function postEdit($id, Request $request)
    {
        $district = District::find($id);

        $district->name = $request->name;
        $district->value   = str_slug($request->name, '');
        $district->save();
        return redirect('admin/state/detail/'.$district->state_id);
    }

    public function getDelete($id)
    {
        $district = District::find($id);
        $district->delete();
        return 'ok';
    }
}
