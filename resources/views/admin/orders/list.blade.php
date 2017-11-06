@extends('admin.templates.default', ['title'=>'Danh sách đơn hàng',
            'libs_elements'=>['node-waves', 'animate', 'dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/products/delete.js')
            ]
            ])
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                <div class="header">
                    <h2>
                        Danh sách đơn hàng
                    </h2>
                </div>
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="active"><a href="#home" data-toggle="tab">ĐƠN HÀNG ĐỢI XỬ LÝ</a></li>
                        <li role="presentation"><a href="#processing" data-toggle="tab">ĐƠN HÀNG ĐANG XỬ LÝ</a></li>
                        <li role="presentation"><a href="#processed" data-toggle="tab">ĐƠN HÀNG ĐÃ XỬ LÝ</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                            <div class="body" style="width: 100%; overflow-y: hidden;">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đơn hàng</th>
                                        <th>Khách Hàng</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Giá (VNĐ)</th>
                                        <th>Phí vận chuyển (VNĐ)</th>
                                        <th>Trạng thái thanh toán</th>
                                        <th>Trạng thái vận chuyển</th>
                                        <th>Xử lý đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $i= 0;?>
                                    @foreach($preProcess as $order)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{url('admin/order/detail', ['id'=>$order->id])}}">{{$order->name}}</a></td>
                                        <td>{{$order->getCustomer($order->customer_id)->name}}</td>
                                         <td>{{$order->address}}</td>
                                        <td>
                                            @if($order->method_payment == 'cod')
                                                Dich Vu Thanh Toan Ship Hang COD
                                            @else
                                                Khách hàng chuyển tiền vào tài khoản ngân hàng trước
                                            @endif
                                        </td>
                                        <td>{{number_format($order->total,0,",",".")}}</td>
                                        <td>{{number_format($order->feeship,0,",",".")}}</td>
                                        <td>
                                          @if($order->is_pay == 0)
                                            Chưa thanh toán
                                            @else
                                            Đã thanh toán
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->is_ship == 0)
                                                Chưa giao hàng
                                            @else
                                                Đã giao hàng
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="{{url('admin/order/accpet',['id'=>$order->id, 'type'=>'accpet'])}}">Chấp thuận</a><br>
                                            <br>
                                            <a class="btn btn-default" href="{{url('admin/order/edit', ['id'=>$order->id])}}">Chỉnh sửa</a>
                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="processing">
                            <div class="body" style="width: 100%; overflow-y: hidden;">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đơn hàng</th>
                                        <th>Khách Hàng</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Giá (VNĐ)</th>
                                        <th>Phí vận chuyển (VNĐ)</th>
                                        <th>Trạng thái thanh toán</th>
                                        <th>Trạng thái vận chuyển</th>
                                        <th>Xử lý đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $i= 0;?>
                                    @if($processing->isEmpty() == false)
                                    @foreach($processing as $order_processing)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{url('admin/order/detail', ['id'=>$order_processing->id])}}">{{$order_processing->name}}</a></td>
                                        <td>{{$order_processing->getCustomer($order_processing->customer_id)->name}}</td>
                                         <td>{{$order_processing->address}}</td>
                                        <td>
                                            @if($order_processing->method_payment == 'cod')
                                                Dich Vu Thanh Toan Ship Hang COD
                                            @else
                                                Khách hàng chuyển tiền vào tài khoản ngân hàng trước
                                            @endif
                                        </td>
                                        <td>{{number_format($order_processing->total,0,",",".")}}</td>
                                        <td>{{number_format($order_processing->feeship,0,",",".")}}</td>
                                        <td>
                                          @if($order_processing->is_pay == 0)
                                            Chưa thanh toán
                                            @else
                                            Đã thanh toán
                                            @endif
                                        </td>
                                        <td>
                                            @if($order_processing->is_ship == 0)
                                                Chưa giao hàng
                                            @else
                                                Đã giao hàng
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="{{url('admin/order/accpet',['id'=>$order_processing->id, 'type'=>'accpet'])}}">Chấp thuận</a>
                                            <br><br>
                                            <a class="btn btn-danger" href="{{url('admin/order/accpet',['id'=>$order_processing->id, 'type'=>'back'])}}">Hoàn tác</a>
                                        </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="processed">
                            
                            <div class="body" style="width: 100%; overflow-y: hidden;">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đơn hàng</th>
                                        <th>Khách Hàng</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Giá (VNĐ)</th>
                                        <th>Phí vận chuyển (VNĐ)</th>
                                        <th>Trạng thái thanh toán</th>
                                        <th>Trạng thái vận chuyển</th>
                                        <th>Xử lý đơn hàng</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $i= 0;?>
                                    @if($processed->isEmpty() == false)
                                    @foreach($processed as $order_processed)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{url('admin/order/detail', ['id'=>$order_processed->id])}}">{{$order_processed->name}}</a></td>
                                        <td>{{$order_processed->getCustomer($order_processed->customer_id)->name}}</td>
                                         <td>{{$order_processed->address}}</td>
                                        <td>
                                            @if($order_processed->method_payment == 'cod')
                                                Dich Vu Thanh Toan Ship Hang COD
                                            @else
                                                Khách hàng chuyển tiền vào tài khoản ngân hàng trước
                                            @endif
                                        </td>
                                        <td>{{number_format($order_processed->total,0,",",".")}}</td>
                                        <td>{{number_format($order_processed->feeship,0,",",".")}}</td>
                                        <td>
                                          @if($order_processed->is_pay == 0)
                                            Chưa thanh toán
                                            @else
                                            Đã thanh toán
                                            @endif
                                        </td>
                                        <td>
                                            @if($order_processed->is_ship == 0)
                                                Chưa giao hàng
                                            @else
                                                Đã giao hàng
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="{{url('admin/order/accpet',['id'=>$order_processed->id, 'type'=>'back'])}}">Hoàn tác</a>
                                        </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



                </div>
                
               
                
            </div>
        </div>
    </div>


@stop

@section('footer')
    @parent

@endsection
