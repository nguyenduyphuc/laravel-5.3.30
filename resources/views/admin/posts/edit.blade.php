@extends('admin.templates.default', ['title'=>'Sửa bài viết',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select', 'sweetalert', 'bootstrap-notify','ckeditor', 'jquery-slimscroll'],
            'customs_css'=>[
                URL::asset('/admin/css/products/delete-image.css'),
            ],
            'custom_scripts'=>[
                URL::asset('admin/js/pages/products/delete_image.js'),
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/ui/dialogs.js'),
                URL::asset('admin/js/pages/forms/editors.js'),
            ]
            ])
@section('content')

    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Sửa bài viết : <b>{{$post->title}}</b></h2>
                </div>

                <div class="body">
                    <form id="form_validation" method="POST" action="{{url('admin/post/edit', ['id'=>$post->id])}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Chọn trang hiển thị</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="page" required  class="form-control show-tick" data-show-subtext="true">
                                        <option value="">-- Chọn trang hiển thị --</option>
                                       
                                        @foreach($pages as $page)
                                            <option value="{{$page->id}}" {{$page->id == $post->page_id?'selected':''}}  >{{$page->title}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    @if ($errors->has('page'))
                                        <p class="error">{{ $errors->first('page') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Tiêu đề bài viết</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="title"  value="{{old('title') ? old('title') : $post->title}}" required>
                                    </div>
                                    @if ($errors->has('title'))
                                        <p class="error">{{ $errors->first('title') }}</p>
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
                                    <textarea name="summary" id="" cols="100" rows="5">{{old('summary') ? old('summary') : $post->summary}}</textarea>
                                    </div>
                                    @if ($errors->has('summary'))
                                        <p class="error">{{ $errors->first('summary') }}</p>
                                    @endif
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Nội dung mô tả</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                    <textarea id="ckeditor" name="description">
                                        {{$post->description}}
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <p class="error">{{ $errors->first('description') }}</p>
                                    @endif
                                    </div>
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
                                            <option value="1" {{$post->status == 1 ? 'selected': ''}}>Live </option>
                                            <option value="2" {{$post->status == 2 ? 'selected': ''}}>Disable </option>
                                        </select>
                                    @if ($errors->has('description'))
                                        <p class="error">{{ $errors->first('description') }}</p>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                        @if(isset($post->getMedia('image')[0])==true)
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Hình ảnh</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <ul class="list-inline" >
                                        @foreach($post->getMedia('image') as $image)
                                            <li class="imgHover" >
                                                <img src="{{asset($image->getUrl())}}" alt="" height="100" width="100" >
                                                <a href="{{url('admin/post/delete-image', ['id'=>$image->id])}}" id="{{$image->id}}" data-id="{{$image->id}}" class="delete-image" token="{{ csrf_token() }}" title=""><span class="glyphicon glyphicon-remove" ></span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        @endif

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                <label for="email_address_2">Hình ảnh</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <input type="file" name="file"> 
                                </div>
                            </div>
                        </div> 
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <button class="btn btn-primary waves-effect" type="submit">Sửa bài viết</button>
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