@extends('admin.templates.default', ['title'=>'Sửa thông tin quận huyện', 'libs_elements'=>['node-waves'],
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
                            <h2>Sửa thông tin quận huyện</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{url('admin/district/edit', ['id'=>$district->id])}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                        <label for="email_address_2">Tên Quận (Huyện)</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name"  value="{{old('name') ? old('name') : $district->name}}" required>
                                            </div>
                                            @if ($errors->has('name'))
                                                <p class="error">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">Sửa thông tin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
@stop