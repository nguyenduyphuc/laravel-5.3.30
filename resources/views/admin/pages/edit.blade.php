@extends('admin.templates.default', ['title'=>'Sửa trang '.$page->title, 
    'libs_elements'=>['node-waves', 'validate'],
    'customs_css'=>[
       URL::asset('admin/css/error.css'),

    ],
    'custom_scripts'=>[
        URL::asset('admin/js/admin.js'),
        URL::asset('admin/js/pages/forms/form-validation.js'),
    ]
])
@section('content')
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Sửa trang {{$page->title}}</h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="{{url('admin/page/edit', ['id'=>$page->id])}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                        <label for="email_address_2">Tên trang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" minlength="3" name="title"  value="{{old('title') ? old('title') : $page->title}}" required>
                                            </div>
                                            @if ($errors->has('title'))
                                                <p class="error">{{ $errors->first('title') }}</p>
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
                                                    <option value="1" {{$page->status ==1 ? 'selected' : ''}}>Live </option>
                                                    <option value="2" {{$page->status ==2 ? 'selected' : ''}}>Disable </option>
                                                </select>
                                            </div>
                                            @if ($errors->has('status'))
                                                <p class="error">{{ $errors->first('status') }}</p>
                                            @endif
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