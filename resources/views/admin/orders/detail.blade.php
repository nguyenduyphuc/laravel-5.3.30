@extends('admin.templates.default', ['title'=>'Chi tiết đơn hàng '.$order->name,
            'libs_elements'=>['node-waves', 'animate', 'dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/products/delete.js')
            ]
            ])
@section('content')

    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Chi tiết đơn hàng {{$order->name}}
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body table-responsive">
                    <table class="table table-condensed">
                        <tbody>
                        @foreach($order->detail as $detail)
                            <tr>
                                <td><img src="{{$detail->getProduct($detail->product_id)->getMedia('image')[0]->getUrl()}}" height="100px" width="100px" alt=""></td>
                                <th>{{$detail->getProduct($detail->product_id)->name}}</th>
                                <td>{{$detail->quantity}} x {{number_format($detail->getProduct($detail->product_id)->price,0,",",".")}} VNĐ</td>
                                <td>{{number_format($detail->quantity*$detail->getProduct($detail->product_id)->price,0,",",".")}} VNĐ</td>
                            </tr>
                        @endforeach    
                            <tr>
                                <td></td><td></td>
                                <td>Tổng cộng :</td>
                                <td>
                                <?php $total=0;
                                    foreach ($order->detail as $item) {
                                        $total += $item->getProduct($item->product_id)->price*$item->quantity;
                                    }
                                ?>
                                {{number_format($total,0,",",".")}} VNĐ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $customer = $order->getCustomer($order->customer_id);?>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Khách hàng: {{$customer->name}}
                    </h2>
                </div>
                <div class="body table-responsive">
                    <div>
                        <b> Liên lạc đơn hàng</b> : {{$customer->email}}
                    </div>
                    <hr>
                    <div>
                        <b>Địa chỉ giao hàng</b> : {{$order->address}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop

@section('footer')
    @parent

@endsection
