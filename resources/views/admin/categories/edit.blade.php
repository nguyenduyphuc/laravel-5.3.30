@extends('admin.templates.default', ['title'=>'Sửa Danh Mục', 'libs_elements'=>['node-waves'],
    'customs_css'=>[],
    'custom_scripts'=>[
        URL::asset('/admin/js/admin.js'),
        URL::asset('/admin/js/pages/index.js')
    ]
])
@section('content')
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Sửa Danh Mục</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{url('admin/category/edit', ['id'=>$category->id])}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                        <label for="email_address_2">Tên danh mục</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name" placeholder="AAAA" value="{{old('name') ? old('name') : $category->name}}" required>
                                            </div>
                                            @if ($errors->has('name'))
                                                <p class="error">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                        <label for="email_address_2">Danh mục cha</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="parent" class="form-control form-float show-tick" id="">
                                                    <option value="">--- Chọn danh mục cha ---</option>
                                                    @foreach($categories as $item)
                                                        <option value="{{$item->id}}" {{$category->parent_id == $item->id ? "selected" : ""}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('name'))
                                                <p class="error">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                        <label for="email_address_2">Trạng thái</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="status" class="form-control form-float show-tick" id="">
                                                    <option value="1" {{$category->status ==1 ? 'selected' : ''}}>Live </option>
                                                    <option value="2" {{$category->status ==2 ? 'selected' : ''}}>Disable </option>
                                                </select>
                                            </div>
                                            @if ($errors->has('status'))
                                                <p class="error">{{ $errors->first('status') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Danh mục tiêu biểu</label>
                                    </div> 
                                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-7">
                                        <div class="form-group">
                                            <input type="checkbox" id="md_checkbox_21" name="featured" class="filled-in chk-col-red" {{$category->status ==1 ? "checked" : ""}}  /><label for="md_checkbox_21"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Hình Ảnh</label>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="image" id="image-file" class="image form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">Sửa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->



@stop