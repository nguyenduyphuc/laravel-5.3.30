@extends('admin.templates.default', ['title'=>'Thêm sản phẩm',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select', 'ckeditor', 'jquery-slimscroll', 'check-file', 'colorpicker','validate'],
            'customs_css'=>[
                URL::asset('admin/css/error.css'),
                URL::asset('/admin/css/products/product.css'),
            ],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/script.js'),
                URL::asset('admin/js/pages/forms/editors.js'),
                URL::asset('admin/js/pages/forms/form-validation.js'),
            ]
            ])
@section('content')
        
    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Thêm sản phẩm</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="body">
                    <form id="form_advanced_validation" method="POST" action="{{url('admin/product/add')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Danh Mục</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="category" required  class="form-control show-tick" data-show-subtext="true">
                                            <option value="">-- Chọn Danh Mục --</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{old('category')==$category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                    @if ($errors->has('category'))
                                        <p class="error">{{ $errors->first('category') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>   

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Tên Sản Phẩm</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" maxlength="100" minlength="3" name="name" placeholder="Quần áo tập" value="{{old('name')}}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <p class="error">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Giá</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" required class="form-control" max="2147483647" name="price" min="1000" value="{{old('price')}}" placeholder="300000 VNĐ">
                                    </div>
                                    @if ($errors->has('price'))
                                        <p class="error">{{ $errors->first('price') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Số lượng</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" required class="form-control" name="quantity" min="1" max="2147483647" value="{{old('quantity')}}" placeholder="100">
                                    </div>
                                    @if ($errors->has('quantity'))
                                        <p class="error">{{ $errors->first('quantity') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Trọng lượng (g)</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" required class="form-control" name="weight" min="1" max="2147483647" value="{{old('weight')}}" placeholder="100g">
                                    </div>
                                    @if ($errors->has('weight'))
                                        <p class="error">{{ $errors->first('weight') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Tóm tắt</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="summary" id="" cols="102" rows="7"></textarea>
                                    </div>
                                    @if ($errors->has('summary'))
                                        <p class="error">{{ $errors->first('summary') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Mô Tả</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="ckeditor" name="description" minlength="100" required>
                                            <h3>Discover this product's features and enjoy the most enthusiastic support team </h3>
                                            {{old('description')}}
                                        </textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                        <p class="error">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Trạng Thái</label>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-8 col-xs-5">
                                <div class="form-group">
                                    <div>
                                        <select name="status" required  class="form-control show-tick" data-show-subtext="true">
                                            <option value="0">Un publish </option>
                                            <option value="1" selected>Live </option>
                                            <option value="2">Disable </option>
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
                                <label for="email_address_2">Hình Ảnh</label>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input multiple type="file" name="image[]" id="image-file" class="image form-control" accept="image/*" required>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('image'))
                                <p class="error">{{ $errors->first('image') }}</p>
                            @endif
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2"></label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="">
                                        <button class="btn btn-primary waves-effect" type="submit">Thêm Sản Phẩm</button>
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
