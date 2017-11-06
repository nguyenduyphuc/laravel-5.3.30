@extends('admin.templates.default', ['title'=>'Thêm Trang',
    'libs_elements'=>['node-waves', 'animate', 'bootstrap-select',  'jquery-slimscroll', 'validate'],
    'customs_css'=>[],
    'custom_scripts'=>[
        URL::asset('/admin/js/admin.js'),
        URL::asset('admin/js/pages/forms/form-validation.js'),
    ]
])
@section('content')     
<!-- Basic Validation -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Thêm Trang</h2>
            </div>
            <div class="body">
                <form id="form_advanced_validation" method="POST" action="{{url('admin/page/add')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="title">Tên Trang</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="title" type="text" class="form-control" name="title" minlength="3" required>
                            {{-- <label class="form-label">Tên Trang</label> --}}
                        </div>
                    </div>

                    <label for="status">Trạng thái</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="status" id="status" class="form-control form-float show-tick" required>
                                <option value="1" selected>Live </option>
                                <option value="2">Disable </option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Thêm trang</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Validation -->
@stop