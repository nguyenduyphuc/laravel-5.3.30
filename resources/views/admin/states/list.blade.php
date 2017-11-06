@extends('admin.templates.default', ['title'=>'Danh sách tỉnh thành',
            'libs_elements'=>['node-waves', 'animate',  'dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/states/state.js'),
            ]
            ])
@section('content')
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Danh sách tỉnh thành
                            </h2>
                            <div class="header-dropdown">
                                <a class="btn btn-primary waves-effect" href="{{url('admin/state/add')}}">Thêm tỉnh thành</a>
                            </div>
          
                        </div>
                        @if (session('state'))
                            <div class="alert alert-success">
                                {{ session('state') }}
                            </div>
                        @endif
                        <div class="body" style="width: 100%; overflow-y: hidden;">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>Tên Tỉnh thành</th>
                                    <th>Khoảng cách đến cửa hàng (Km)</th>
                                    <th>Hành Động</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Tên Tỉnh thành</th>
                                    <th>Khoảng cách đến cửa hàng (Km)</th>
                                    <th>Hành Động</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($states as $state)
                                        <tr>
                                            <td>
                                                <a href="{{url('admin/state/detail', ['id'=>$state->id] )}}">{{$state->name}}</a>
                                            </td>
                                            <td>{{$state->distance}}</td>
                                            <td>
                                                <a href="edit/{{$state->id}}">
                                                    <button type="button" class="btn btn-primary btn-lg">Sửa</button>
                                                </a>
                                                <a class="btn btn-danger btn-lg" id="delete-state" href="{{url('admin/state/delete',['id'=>$state->id])}}">Xóa</a>
                                             
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