@extends('admin.templates.default', ['title'=>'Danh sách liên hệ',
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
                    Danh sách liên hệ
                </h2>
            </div>
            <div class="body" style="width: 100%; overflow-y: hidden;">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                    <tr>
                        <th>Chủ đề</th>
                        <th>Email</th>
                        <th>Tên khách</th>
                        <th>Lời nhắn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>   
                            <td>{{$contact->subject}}</td>
                            <td><a data-toggle="modal" class="show-modal" data-target="#defaultModal1">{{$contact->email}}</a></td>  
                            <td>{{$contact->name}}</a></td> 
                            {{-- <td>{{$contact->email}}</td> --}}
                            <td>{{$contact->message}}</td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Trả lời khách hàng</h4>
            </div>
            <div class="modal-body">
                
                    <input type="email" value="" class="form-control" disabled>
                    <input type="text" value="" class="form-control">
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">Gửi</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->
@stop