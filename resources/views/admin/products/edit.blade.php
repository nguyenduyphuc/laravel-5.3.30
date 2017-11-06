@extends('admin.templates.default', ['title'=>'Sửa sản phẩm',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select', 'sweetalert', 'bootstrap-notify','ckeditor','check-file', 'jquery-slimscroll','colorpicker', 'validate'],
            'customs_css'=>[
                URL::asset('/admin/css/products/product.css'),
                URL::asset('admin/css/error.css'),
            ],
            'custom_scripts'=>[
                URL::asset('admin/js/pages/products/delete_image.js'),
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/script.js'),
                URL::asset('admin/js/pages/ui/dialogs.js'),
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
                    <h2>Sửa sản phẩm</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="body">
                    <form id="form_advanced_validation" method="POST" action="{{url('admin/product/edit', ['id'=>$product->id])}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="MAX_FILE_SIZE" value="50000000"/>
                        
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Danh Mục</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="category" required  class="form-control show-tick" data-show-subtext="true">
                                            <option value="">-- Chọn danh mục --</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $product->category->id?'selected':''}} >{{$category->name}}</option>
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
                                <label for="email_address_2">Tên sản phẩm</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" minlength="3" name="name" placeholder="AAAA" value="{{old('name') ? old('name') : $product->name}}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <p class="error">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Giá bán</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" min="100" required name="price" min="0" value="{{old('price') ? old('price') : $product->price}}" placeholder="10$">
                                    </div>
                                    @if ($errors->has('price'))
                                        <p class="error">{{ $errors->first('price') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Giá cũ</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="compare_price" min="0" value="{{old('compare_price') ? old('compare_price') : $product->compare_price}}" placeholder="1000 VNĐ">
                                    </div>
                                    @if ($errors->has('compare_price'))
                                        <p class="error">{{ $errors->first('compare_price') }}</p>
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
                                        <textarea id="ckeditor" name="description" required minlength="100">
                                            {{old('description') ? old('description') : $product->description}}
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
                                            <option value="1" {{$product->status == 1 ? 'selected': ''}}>Live </option>
                                            <option value="2" {{$product->status == 2 ? 'selected': ''}}>Disable </option>
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
                                <label for="email_address_2">Hình ảnh</label>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input multiple type="file" name="image[]" id="image-file" class="image form-control" accept="image/*">
                                    </div>
                                    <div>
                                        <table>
                                            <tbody class="preview-image">
                                                @if(isset($product->getMedia()[0])==true)
                                                    @foreach($product->getMedia('image') as $image)
                                                        <tr>
                                                            <td><img src='{{url('media', ['disk'=> $image->id,'filename'=>$image->file_name])}}' height='50' width='100'></td>
                                                            <td>{{$image->file_name}}</td>
                                                            <td><a id="{{$image->id}}" data-id="{{$image->id}}" class="delete-image btn btn-danger preview-delete" token="{{ csrf_token() }}" href="{{url('admin/product/delete-image', ['id'=>$image->id])}}">Delete</a></td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2"></label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="">
                                        <button class="btn btn-primary waves-effect" type="submit">SAVE</button>
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