@extends('admin.templates.default', ['title'=>'Danh sách danh mục',
            'libs_elements'=>['node-waves', 'animate',  'dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/category/edit_status.js'),
                URL::asset('admin/js/pages/category/delete.js')
            ]
            ])
@section('content')

            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Danh sách danh mục
                            </h2>
                            <div class="header-dropdown">
                                <a class="btn btn-primary waves-effect" href="{{url('admin/category/add')}}">Thêm danh mục</a>
                            </div>
                        </div>
                        <div class="body" style="width: 100%; overflow-y: hidden;">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên Danh Mục</th>
                                    <th>Danh Mục Cha</th>
                                    {{-- <th>Ngày tạo</th> --}}
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên Danh Mục</th>
                                    <th>Danh Mục Cha</th>
                                    {{-- <th>Ngày tạo</th> --}}
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($categories as $category)
                                        <tr>
                                            @if(isset($category->getMedia('image')[0]))
                                            <td><img src="{{url('media', ['disk'=> $category->getMedia('image')[count($category->getMedia('image'))-1]->id,'filename'=>$category->getMedia('image')[count($category->getMedia('image'))-1]->file_name])}}" height="100" width="100"></td>
                                                @else
                                                <td><img src="" alt=""></td>
                                            @endif
                                            
                                            <td><a href="{{url('admin/category/detail', ['id'=>$category->id])}}">{{$category->name}}</a></td>
                                            @if($category->parent_id==0)
                                                <td></td>
                                                @else
                                                <td><a href="{{url('admin/category/detail', ['id'=>$category->getParent($category->parent_id)->id])}}">{{$category->getParent($category->parent_id)->name}}</a></td>
                                            @endif
                                            {{-- <td>{{$category->updated_at}}</td> --}}
                                            <td>
                                            
                                            <select name="status" class="form-control form-float show-tick" id="category-status" data-id="{{$category->id}}">
                                                
                                                <option value="1" @php if($category->status == 1) echo"selected" @endphp> 
                                                    <a href="#" id="{{$category->id}}"  product-id="{{$category->id}}" data-token="{{ csrf_token() }}">
                                                        Live
                                                    </a>

                                                </option>
                                                
                                                <option value="2" @php if($category->status == 2) echo"selected" @endphp > 
                                                    <a href="#" id="{{$category->id}}"  product-id="{{$category->id}}" data-token="{{ csrf_token() }}">
                                                        Disable
                                                    </a>
                                                </option>
                                                
                                            </select>
                                            
                                            </td>
                                            <td>
                                                <a href="edit/{{$category->id}}">
                                                    <button type="button" class="btn btn-primary btn-lg">Sửa</button>
                                                </a>
                                                
                                                <a href="#" id="{{$category->id}}" class="delete-category" category-id="{{$category->id}}" data-token="{{ csrf_token() }}">
                                                    <button type="button" class="btn btn-danger btn-lg">Xóa</button>
                                                </a>
                                                
                                            </td>
                                            
                                        </tr>
                                    
                                @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
@stop