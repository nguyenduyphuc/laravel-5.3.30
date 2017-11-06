@extends('admin.templates.default', ['title'=>'Thông tin về tỉnh ',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select','colorpicker','validate'],
            'customs_css'=>[
                URL::asset('admin/css/error.css'),
            ],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/script.js'),
                URL::asset('admin/js/pages/forms/form-validation.js'),
                URL::asset('admin/js/pages/districts/district.js'),
            ]
            ])
@section('content')

            
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>{{$state->name}}</h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="{{url('admin/district/add')}}" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="state" value="{{$state->id}}">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" maxlength="255" minlength="3" name="name" required>
                                        <label class="form-label">Tên Huyện</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">Thêm Huyện</button>
                            </form>
                            <hr>
                            <div class="header">
                                <h5>Danh sách các huyện</h5>
                            </div>
                            @foreach($districts as $district)
                                <p><i class="material-icons delete-district" url="{{url('admin/district/delete', ['id'=>$district->id])}}" style="cursor:pointer; color: #F44336;">delete_forever</i> <a href="{{url('admin/district/edit', ['id'=>$district->id])}}">{{$district->name}}</a></p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->



@stop