@extends('admin.templates.default', ['title'=>'Danh sách khách hàng',
            'libs_elements'=>['node-waves', 'animate-css',  'dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
            ]
            ])
@section('content')

            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Danh sách khách hàng
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>

                                <tbody>
                                
                                   
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td><a href="{{url('admin/customer/edit', ['id'=>$customer->id])}}" class="btn btn-danger">Chỉnh sửa</a></td>
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