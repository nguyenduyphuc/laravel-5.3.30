<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\District;
class StateController extends Controller
{
    public function getAdd()
    {
        return view('admin.states.add');
    }

    public function postAdd(Request $request)
    {
    	 $this->validate($request, [
	        'name' => 'required|unique:states|max:255',
            'distance' => 'required',
	    ]);

        $state = new State();
        $state->name   = $request->name;
        $state->value   = str_slug($request->name, '');
        $state->distance   = $request->distance;
        $state->save();
        return redirect()->to('admin/state/list');
    }

    public function getEdit($id)
    {
        $state =  State::find($id);
        return view('admin.states.edit', compact('state'));
    }

    public function postEdit(Request $request, $id)
    {
         $this->validate($request, [
            'name' => 'required|unique:states|max:255',
            'distance' => 'required',
        ], [
            'name.required'=>'Vui lòng nhập tên tỉnh',
            'name.unique'=>'Tên tỉnh phải là duy nhất',
            'name.max'=>'Tên tỉnh này có vẻ như không đúng',
            'distance.required' => 'Vui lòng nhập khoảng cách từ cửa hàng đến tỉnh thành thêm mới',
        ]);

        $state = State::find($id);
        $state->name   = $request->name;
        $state->value   = str_slug($request->name, '');
        $state->distance   = $request->distance;
        $state->save();
        return redirect()->to('admin/state/list');
    }
    public function getList()
    {
    	$states =  State::all();
    	return view('admin.states.list', compact('states'));
    }

    public function detail($id)
    {
    	$districts =  District::where('state_id', $id)->get();
    	$state =  State::find($id);
    	return view('admin.states.detail', compact('state', 'districts'));
    }


    public function getDelete($id)
    {
        $state =  State::find($id);
        $state->delete();
        return redirect()->back()->with('state', 'Xóa thành công tỉnh '.$state->name);
    }
}
