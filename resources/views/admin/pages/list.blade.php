@extends('admin.templates.default', ['title'=>'Danh sách trang',
            'libs_elements'=>['node-waves', 'animate',  'dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/pages/edit_status.js'),
            ]
            ])
@section('content')

            
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Danh sách trang
                </h2>
                <div class="header-dropdown">
                    <a class="btn btn-primary waves-effect" href="{{url('admin/page/add')}}">Thêm trang</a>
                </div>
            </div>
            <div class="body" style="width: 100%; overflow-y: hidden;">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                    <tr>
                        <th>Tên trang</th>
                        <th>Trạng thái</th>
                        <th>Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                            <tr>
                                <td><a href="{{url('admin/page/detail', ['id'=>$page->id])}}">{{$page->title}}</a></td>
                                <td>
                                <select name="status" class="form-control form-float show-tick" id="page-status" data-id="{{$page->id}}">
                                    
                                    <option value="1" @php if($page->status == 1) echo"selected" @endphp> 
                                        <a href="#" id="{{$page->id}}"  product-id="{{$page->id}}" data-token="{{ csrf_token() }}">
                                            Live
                                        </a>

                                    </option>
                                    
                                    <option value="2" @php if($page->status == 2) echo"selected" @endphp > 
                                        <a href="#" id="{{$page->id}}"  product-id="{{$page->id}}" data-token="{{ csrf_token() }}">
                                            Disable
                                        </a>
                                    </option>
                                </select>
                                </td>
                                <td>
                                    <a href="edit/{{$page->id}}">
                                        <button type="button" class="btn btn-primary btn-lg">Sửa</button>
                                    </a>
                                    
                               {{--      <a href="#" id="{{$page->id}}" class="delete-category" category-id="{{$page->id}}" data-token="{{ csrf_token() }}">
                                        <button type="button" class="btn btn-danger btn-lg">Xóa</button>
                                    </a> --}}
                                    
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