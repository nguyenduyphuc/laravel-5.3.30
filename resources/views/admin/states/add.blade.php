@extends('admin.templates.default', ['title'=>'Thêm Tỉnh Thành',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select','colorpicker','validate'],
            'customs_css'=>[
                URL::asset('admin/css/error.css'),
            ],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/script.js'),
                URL::asset('admin/js/pages/forms/form-validation.js'),
            ]
            ])
@section('content')

            
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm Tỉnh</h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="{{url('admin/state/add')}}" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" maxlength="255" minlength="3" name="name" required>
                                        <label class="form-label">Tên Tỉnh</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="distance" required>
                                        <label class="form-label">Khoảng cách đến cửa hàng (nội tỉnh 0km / đến 100km / từ 100 đến 300km/ trên 300km)</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">Thêm Tỉnh</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->



@stop