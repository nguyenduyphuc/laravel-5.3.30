@extends('admin.templates.default', ['title'=>'Sửa Thông tin khách hàng', 'libs_elements'=>['node-waves'],
    'customs_css'=>[],
    'custom_scripts'=>[
        URL::asset('/admin/js/admin.js'),
        URL::asset('/admin/js/pages/customers/customer.js')
    ]
])
@section('content')

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Sửa Thông tin khách hàng: {{$customer->name}}</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{url('admin/customer/edit', ['id'=>$customer->id])}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="name">Tên khách hàng</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" value="{{$customer->name}}" required>
                                            </div>
                                        </div>
                                        @if ($errors->has('name'))
                                            <p class="error">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="phone">Số điện thoại</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="phone" name="phone" class="form-control" value="{{$customer->phone}}" required>
                                            </div>
                                        </div>
                                        @if ($errors->has('phone'))
                                            <p class="error">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" id="email" name="email" class="form-control" value="{{$customer->email}}" required>
                                            </div>
                                        </div>
                                        @if ($errors->has('email'))
                                            <p class="error">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="address">Địa chỉ</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="address" name="address" class="form-control" value="{{$customer->address}}" required>
                                            </div>
                                        </div>
                                        @if ($errors->has('address'))
                                            <p class="error">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="company">Công ty</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="company" name="company" class="form-control" value="{{$customer->company}}">
                                            </div>
                                        </div>
                                        @if ($errors->has('company'))
                                            <p class="error">{{ $errors->first('company') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="state">Tỉnh thành</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select name="state" id="state" class="form-control state">
                                            <option value="">--- Vui lòng chọn tỉnh ---</option>
                                                @foreach($states as $state)
                                                    <option value="{{$state->value}}" {{$customer->state == $state->value ?"selected" :""}}>{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('state'))
                                            <p class="error">{{ $errors->first('state') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="district">Quận Huyện</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select name="district" id="district" class="form-control">
                                            <option value="">--- Vui lòng Huyện ---</option>
                                            @foreach($districts as $district)   
                                                <option value="{{$district->value}}" {{$customer->district == $district->value ?"selected" :""}}>{{$district->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('district'))
                                            <p class="error">{{ $errors->first('district') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">Lưu lại</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->



@stop