@extends('admin.templates.default', ['title'=>'Danh sách bài viết',
            'libs_elements'=>['node-waves', 'animate','bootstrap-select','dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/posts/post.js')
            ]
            ])
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Danh sách bài viết
                    </h2>
                    <div class="header-dropdown">
                        <a class="btn btn-primary waves-effect" href="{{url('admin/post/add')}}">Thêm bài viết</a>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="body">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th width="40%">Tóm tắt</th>
                            <th >Status</th>
                            <th width="7%">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Tóm tắt</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $i= 0;?>
                            @foreach($posts as $post)
                                <tr class="item{{$post->id}}">
                                    <td>{{$i+=1}}</td>
                                    @if(isset($post->getMedia('image')[0]))
                                    <td><img src="{{asset($post->getMedia('image')[0]->getUrl())}}" height="100" width="100"></td>
                                        @else
                                        <td><img src="" alt=""></td>
                                    @endif
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->page->title}}</td>
                                    <td>{{$post->summary}}</td>
                                    <td> 
                                        <select name="status" class="form-control form-float show-tick" id="post-status" data-id="{{$post->id}}">
                                                
                                                <option value="1" @php if($post->status == 1) echo"selected" @endphp> 
                                                    <a href="#" id="{{$post->id}}"  product-id="{{$post->id}}" data-token="{{ csrf_token() }}">
                                                        Live
                                                    </a>

                                                </option>
                                                
                                                <option value="2" @php if($post->status == 2) echo"selected" @endphp > 
                                                    <a href="#" id="{{$post->id}}"  product-id="{{$post->id}}" data-token="{{ csrf_token() }}">
                                                        Disable
                                                    </a>
                                                </option>
                                                
                                            </select>
                                    </td>
                                    <td>
                                        {{-- <a data-toggle="modal" class="show-modal" data-target="#largeModal" url="{{url('admin/post/detail', ['id'=>$post->id])}}">Chi tiết</a> --}}

                                        <a href="{{url('admin/post/edit', ['id'=>$post->id])}}"><span class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">edit</i> <span class="icon-name"></span></span></a>
                                        <a href="#" id="{{$post->id}}" class="delete-product" product-id="{{$post->id}}" data-token="{{ csrf_token() }}"><span class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">delete_forever</i> <span class="icon-name"></span></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{-- <div class="modal fade" id="largeModal"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body">
                <p id="post"></p>
                <p>Tóm tăt: </p>
                <p id="summary"></p>
                <p>Nội dung : </p>
                <div id="content">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div> --}}
@stop

@section('footer')
    @parent

@endsection
