@extends('admin.templates.default', ['title'=>'Thêm bài viết',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select', 'ckeditor', 'jquery-slimscroll', 'validate'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
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
                <h2>Thêm bài viết</h2>
            </div>


            <div class="body">
                <form id="form_advanced_validation" method="POST" action="{{url('admin/post/add')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Bài viết trong trang</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="page" required  class="form-control show-tick" data-show-subtext="true">
                                        <option value="">-- Vui lòng chọn trang hiển thị --</option>
                                        @foreach($pages as $page)
                                            <option value="{{$page->id}}">{{$page->title}}</option>
                                        @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>   

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                            <label for="email_address_2">Tiêu đề</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="title" placeholder="template" minlength="3" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Tóm tắt</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="summary" minlength="20" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Nội dung</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea id="ckeditor" minlength="100" name="description" required>
                                        <h2>WYSIWYG Editor</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper sapien non nisl facilisis bibendum in quis tellus. Duis in urna bibendum turpis pretium fringilla. Aenean neque velit, porta eget mattis ac, imperdiet quis nisi. Donec non dui et tortor vulputate luctus. Praesent consequat rhoncus velit, ut molestie arcu venenatis sodales.</p>
                                        <h3>Lacinia</h3>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Status</label>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-8 col-xs-5">
                            <div class="form-group">
                                <div>
                                    <select name="status" required  class="form-control show-tick" data-show-subtext="true">
                                        <option value="1" selected>Live </option>
                                        <option value="2">Disable </option>    
                                    </select>
                                </div>
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
                                    <input type="file" name="file">
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
                                    <button class="btn btn-primary waves-effect" type="submit">Thêm bài</button>
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
