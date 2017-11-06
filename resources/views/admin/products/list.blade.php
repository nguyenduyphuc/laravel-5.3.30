@extends('admin.templates.default', ['title'=>'Danh sách sản phẩm',
            'libs_elements'=>['node-waves', 'animate','bootstrap-select','dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/products/product.js')
            ]
            ])
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Danh sách sản phẩm
                    </h2>
                    <div class="header-dropdown">
                        <a class="btn btn-primary waves-effect" href="{{url('admin/product/add')}}">Thêm sản phẩm</a>
                    </div>
     
                </div>

                <div class="body"  style="width: 100%; overflow-y: hidden;">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Giá (VNĐ)</th>
                            <th>Số lượng</th>
                            <th>Danh Mục</th>
                            <th>Trạng thái</th>
                            <th width="7%">Hành Động</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Danh Mục</th>
                            <th>Trạng thái</th>
                            <th width="7%">Hành Động</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $i= 0;?>
                            @foreach($products as $product)
                                <tr class="item{{$product->id}}">
                                    <td>{{$i+=1}}</td>
                                    @if(isset($product->getMedia('image')[0]))
                                    <td><img src="{{url('media', ['disk'=> $product->getMedia('image')[count($product->getMedia('image'))-1]->id,'filename'=>$product->getMedia('image')[count($product->getMedia('image'))-1]->file_name])}}" height="100" width="100"></td>
                                        @else
                                        <td><img src="" alt=""></td>
                                    @endif
                                    <td><a data-toggle="modal" class="show-modal" data-target="#largeModal" url="{{url('admin/product/detail', ['id'=>$product->id])}}">{{$product->name}}</a></td>
                                    <td>{{number_format($product->price,0,",",".")}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{\App\Category::find($product->category_id)->name}}</td>
                                    {{-- <td>{{$product->feature}}</td> --}}
                                    {{--<td>{!! $product->description !!}</td>--}}
                                    <td>
                                        <select name="status" class="form-control form-float show-tick edit-status" id="09">
                                            <option href="{{url('admin/product/edit-status', ['id'=>$product->id])}}" value="1" {{$product->status == 1? 'selected':''}}>Live</option>
                                            <option href="{{url('admin/product/edit-status', ['id'=>$product->id])}}" value="2" {{$product->status == 2? 'selected':''}}>Disable</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/product/edit', ['id'=>$product->id])}}"><span class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">edit</i> <span class="icon-name"></span></span></a>
                                        <a href="#" id="{{$product->id}}" class="delete-product" product-id="{{$product->id}}" data-token="{{ csrf_token() }}"><span class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">delete_forever</i> <span class="icon-name"></span></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="largeModal"  tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div class="row"><p id="category"></p></div>
                    <div class="row"><p id="price"></p></div>
                    <div class="row"><p id="quantity"></p></div>
                    <div class="row"><p id="weight"></p></div>
                    <div class="row"><p><b>Nội dung </b>: </p> <div id="content"></div></div>
                    <div class="row" id="image">
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @parent

@endsection
