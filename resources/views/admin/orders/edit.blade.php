@extends('admin.templates.default', ['title'=>'Cập nhật thông tin đơn hàng '.$order->name,
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select', 'sweetalert', 'bootstrap-notify','ckeditor','check-file', 'jquery-slimscroll','colorpicker'],
            'customs_css'=>[
                URL::asset('admin/css/error.css'),
            ],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/script.js'),
            ]
            ])
@section('content')
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Cập nhật thông tin đơn hàng {{$order->name}}</h2>
                </div>

                <div class="body">
                    <form id="form_validation" method="POST" action="{{url('admin/order/edit', ['id'=>$order->id])}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                         

                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 form-control-label" >
                                <label for="email_address_2">Địa chỉ giao hàng</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="address" value="{{old('address') ? old('address') : $order->address}}" required>
                                    </div>
                                    @if ($errors->has('address'))
                                        <p class="error">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 form-control-label">
                                <label for="email_address_2">Phương thức thanh toán</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-6">
                                <div class="form-group">
                                    <input type="radio" name="method_payment" id="cod" value="cod" class="with-gap" {{$order->method_payment == "cod" ? "checked" : ""}}>
                                    <label for="cod">COD</label>

                                    <input type="radio" name="method_payment" id="ctnh" value="ctnh" class="with-gap" {{$order->method_payment == "ctnh" ? "checked" : ""}}>
                                    <label for="ctnh" class="m-l-20">Chuyển tiền qua ngân hàng</label>
                                    @if ($errors->has('method_payment'))
                                        <p class="error">{{ $errors->first('method_payment') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 form-control-label">
                                <label for="email_address_2">Tình trạng thanh toán</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-6">
                                <div class="form-group">
                                   <input type="checkbox" id="ispay" name="ispay" {{$order->is_pay == 1 ? "checked" :""}}>
                                    <label for="ispay"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 form-control-label">
                                <label for="email_address_2">Tình trạng chuyển hàng</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-6">
                                <div class="form-group">
                                   <input type="checkbox" id="isship" name="isship" {{$order->is_ship == 1 ? "checked" :""}}>
                                    <label for="isship"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 form-control-label">
                                <label for="email_address_2"></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-6">
                                <div class="form-group">
                                    <div class="">
                                        <button class="btn btn-primary waves-effect" type="submit">Lưu lại</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section('foot')
    @parent
    <script src="{{asset('admin')}}/js/pages/forms/basic-form-elements.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- JQuery Steps Plugin Js -->
    <script src="{{asset('admin')}}/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="{{asset('admin')}}/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('admin')}}/plugins/node-waves/waves.js"></script>

    <!-- Ckeditor -->
    <script src="{{asset('admin')}}/plugins/ckeditor/ckeditor.js"></script>

    <script src="{{asset('admin')}}/js/pages/forms/editors.js"></script>


    <!-- Select Plugin Js -->
    <script src="{{asset('admin')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{asset('admin')}}/plugins/dropzone/dropzone.js"></script>


@endsection