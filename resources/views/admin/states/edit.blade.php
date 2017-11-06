@extends('admin.templates.default', ['title'=>'Sửa tỉnh', 'libs_elements'=>['node-waves'],
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
                            <h2>Sửa tỉnh {{$state->name}}</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{url('admin/state/edit', ['id'=>$state->id])}}" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                        <label for="email_address_2">Tên Tỉnh thành</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name" value="{{old('name') ? old('name') : $state->name}}" required>
                                            </div>
                                            @if ($errors->has('name'))
                                                <p class="error">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                        <label for="email_address_2">Khoảng cách đến cửa hàng (Km)</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="distance" value="{{old('distance') ? old('distance') : $state->distance}}" required>
                                            </div>
                                            @if ($errors->has('distance'))
                                                <p class="error">{{ $errors->first('distance') }}</p>
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