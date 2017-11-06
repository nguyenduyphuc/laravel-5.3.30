@extends('admin.templates.default', ['title'=>'Thêm Danh Mục',
    'libs_elements'=>['node-waves', 'animate', 'bootstrap-select',  'jquery-slimscroll'],
    'customs_css'=>[],
    'custom_scripts'=>[
        URL::asset('/admin/js/admin.js'),
    ]
])
@section('content')

            
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm Danh Mục</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{url('admin/category/add')}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <label for="email_address">Tên danh mục</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required>
                                        <label class="form-label">Tên danh mục</label>
                                    </div>
                                </div>
                                <label for="email_address">Chọn danh mục cha (nếu có)</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="parent" class="form-control form-float show-tick">
                                                <option value="">--- Chọn danh mục cha ---</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">@if($category->parent_id == 0){{$category->name}}@else--{{$category->name}}@endif</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <label for="email_address">Trạng thái</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="status" class="form-control form-float show-tick" required>
                                            <option value="1" selected>Live </option>
                                            <option value="2">Disable </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Danh mục tiêu biểu</label>
                                    </div> 
                                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-7">
                                        <div class="form-group">
                                            <input type="checkbox" id="md_checkbox_21" name="featured" class="filled-in chk-col-red"  /><label for="md_checkbox_21"></label>
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
                                                <input type="file" name="image" id="image-file" required class="image form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">Thêm Danh Mục</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->



@stop