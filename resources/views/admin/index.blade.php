@extends('admin.templates.default', ['title'=>'Bảng điều khiển trung tâm',
            'libs_elements'=>['node-waves', 'animate-css', 'morrisjs', 'themes', 'bootstrap-select', 'flot-charts','countTo', 'bundle'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/index.js'),
                URL::asset('admin/js/pages/charts/chartjs.js'),
            ]
            ])
@section('content')
    <div class="block-header">
        <h2>Bảng điều khiển</h2>
    </div>
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">Danh mục</div>
                    <div class="number count-to" data-from="0" data-to="{{$count_category}}" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">help</i>
                </div>
                <div class="content">
                    <div class="text">Sản phẩm</div>
                    <div class="number count-to" data-from="0" data-to="{{$count_product}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-red">
                    <i class="material-icons">shopping_cart</i>
                </div>
                <div class="content">
                    <div class="text">Đơn hàng</div>
                    <div class="number count-to" data-from="0" data-to="{{$count_order}}" data-speed="1000" data-fresh-interval="20">{{$count_order}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">Khách hàng</div>
                    <div class="number count-to" data-from="0" data-to="{{$count_customer}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->


    <div class="row clearfix">
        <!-- Visitors -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-pink">
                    <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                         data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                         data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                         data-fill-Color="rgba(0, 188, 212, 0)">
                        Số lượng người truy cập
                    </div>
                    <ul class="dashboard-stat-list">
                    <p class="text-center">{{Visitor::count()}} Người truy cập</p>
                     {{--    <li>
                            Hôm nay
                            <span class="pull-right"><b>{{Visitor::count()}}</b> <small>Người truy cập</small></span>
                        </li>
                        <li>
                            Hôm qua
                            <span class="pull-right"><b>3 872</b> <small>Người truy cập</small></span>
                        </li> --}}
                        {{-- <li>
                            Tất cả các ngày
                            <span class="pull-right"><b>{{Visitor::count()}}</b> <small>Người truy cập</small></span>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Visitors -->
        <!-- Latest Social Trends -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-cyan">
                    <div class="m-b--35 font-bold">Từ khóa tìm kiếm gần đây</div>
                    <ul class="dashboard-stat-list">
                    @foreach($key_searchs  as $key_search)
                        <li>
                            {{$key_search->name}}
                            <span class="pull-right">
                                {{$key_search->count}} lần
                                <i class="material-icons">trending_up</i>
                            </span>
                        </li>
                    @endforeach    
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Latest Social Trends -->
        <!-- Answered Tickets -->
        {{-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-teal">
                    <div class="font-bold m-b--35">ANSWERED TICKETS</div>
                    <ul class="dashboard-stat-list">
                        <li>
                            TODAY
                            <span class="pull-right"><b>12</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            YESTERDAY
                            <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            LAST WEEK
                            <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            LAST MONTH
                            <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            LAST YEAR
                            <span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            ALL
                            <span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <!-- #END# Answered Tickets -->
    </div>

    <div class="row clearfix">
        <!-- New Order -->
        @if($new_order != null)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Đơn hàng mới nhất</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                            <tr>
                                
                                <th>Tên đơn hàng</th>
                                <th>Ngày mua</th>
                                <th>Giá Trị Đơn hàng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($new_order as $item)
                                <tr>
                                    <td><a href="{{url('admin/order/detail', ['id'=>$item->id])}}">{{$item->name}}</a></td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>{{number_format($item->total,0,",",".")}} VNĐ</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($customer_contacts->isEmpty() != true)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Khách hàng hỏi đáp</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                            <tr>
                                
                                <th>Tên chủ đề</th>
                                <th>Email</th>
                                <th>Ngày Giờ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer_contacts as $customer_contact)
                            <tr>
                                <td>{{$customer_contact->subject}}</td>
                                <td>{{$customer_contact->email}}</td>
                                <td>{{$customer_contact->updated_at}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($search_mosts->isEmpty() != true)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Khách truy cập của bạn đang sử dụng các cụm từ tìm kiếm hàng đầu này</h2>
                </div>
                <div style="padding:2px 20px;"><span>Đây là các cụm từ được tìm kiếm nhiều nhất trên Cửa hàng trực tuyến của bạn. Đảm bảo mô tả sản phẩm của bạn bao gồm chúng để khách hàng của bạn luôn có thể tìm thấy những gì họ đang tìm kiếm.</span></div>
                
    
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                            <tr>
                                
                                <th>Từ khóa</th>
                                <th>số lần</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($search_mosts as $search_most)
                            <tr>
                                <td>{{$search_most->name}}</td>
                                <td>{{$search_most->count}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- #END# New Order -->
        <!-- Browser Usage -->
       {{--  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="header">
                    <h2>BROWSER USAGE</h2>
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
                <div class="body">
                    <div id="donut_chart" class="dashboard-donut-chart"></div>
                </div>
            </div>
        </div> --}}
        <!-- #END# Browser Usage -->
    </div>
@endsection