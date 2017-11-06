@extends('admin.templates.default', ['title'=>'Chi Tiết Sản Phẩm',
            'libs_elements'=>['node-waves', 'bootstrap-notify','animate', 'bootstrap-select','jquery-slimscroll'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/ui/modals.js'),
                URL::asset('admin/js/pages/addons/addon.js'),
            ]
            ])
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Product Dettail
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{url('admin/product/edit',['id'=>$product->id])}}">Edit Product</a></li>
                                <li><a href="{{url('admin/addon/add')}}">Add Addon</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div >
                                            <b>Name Product :</b> <span>{{$product->name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div >
                                            <b>Price Product :</b> <span>{{$product->price}}$</span>
                                        </div>
                                    </div>
                                </div>
                                @if($product->buy_type == 1)
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div >
                                            <b>Link site Product :</b> <a target="_blank" href="{{$product->link}}">{{$product->link}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div >
                                            <b>Name Category :</b> <span>{{$product->category->name}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <b>Feature :</b>
                                        <div >
                                            <div >
                                                <p class="text-justify">{{$product->feature}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <b>Description :</b>
                                        <div >
                                            <div >
                                                <p class="text-justify">{!! htmlspecialchars_decode($product->description) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div >
                                            <b>Status</b> : <span>
                                                @php
                                                $result = '';
                                                switch ($product->status) {
                                                case 0:
                                                $result = 'Un publish';
                                                break;
                                                case 1:
                                                $result = 'Live';
                                                break;
                                                case 2:
                                                $result = 'Disable';
                                                break;
                                                }
                                                @endphp
                                                {{$result}}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <b>Image :</b>
                                        <div class="input-group">
                                            @if(isset($product->getMedia('image')[0])==true)
                                            <ul class="list-inline">
                                                @foreach($product->getMedia('image') as $image)
                                                    <li><img src="{{url('media', ['disk'=> $image->id,'filename'=>$image->file_name])}}" alt="" height="100" width="100"></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="header">
                                <h2>
                                    Addons of Product
                                </h2>
                            </div>
                            @if(!$product->addon->isEmpty())
                                @foreach($product->addon as $item)
                                    <div class="body item{{$item->id}}">
                                        <div class="row clearfix">
                                            <div class="col-lg-3">
                                                <ul class="list-group">
                                                    <li class="list-group-item"><img src="{{isset($item->getMedia('image')[count($item->getMedia('image'))-1])==true?url('media', ['disk'=> $item->getMedia('image')[count($item->getMedia('image'))-1]->id,'filename'=>$item->getMedia('image')[0]->file_name]):asset('addon.jpg')}}" class="img-responsive" style="width: 100%;" alt=""></li>
                                                    <li class="list-group-item">{{$item->name}}</li>
                                                </ul>
                                            </div>

                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <b>Price :</b> <span>{{$item->price}}$</span>
                                                </div>
                                                <div>
                                                    <b>Feature :</b>
                                                    <p class="text-justify">{{$item->feature}}</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3"><b>Status :</b></div>
                                                    <div class="col-lg-9">
                                                        <select name="status" class="edit-status" id="09">
                                                            <option href="{{url('admin/addon/edit-status', ['id'=>$item->id])}}" value="0" {{$item->status == 0? 'selected':''}}>Un publish</option>
                                                            <option href="{{url('admin/addon/edit-status', ['id'=>$item->id])}}" value="1" {{$item->status == 1? 'selected':''}}>Live</option>
                                                            <option href="{{url('admin/addon/edit-status', ['id'=>$item->id])}}" value="2" {{$item->status == 2? 'selected':''}}>Disable</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div>
                                                    <a href="#" id="{{$item->id}}" class="delete-addon btn btn-danger waves-effect" addon-id="{{$item->id}}"
                                                       data-token="{{ csrf_token() }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            @endif
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
