@extends('frontend.templates.master', [
    'title' => 'Trang '.$page->title,
    'include'=>[],

])
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{url('/')}}" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{$page->title}}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-12" id="center_column">
            {{--     <h2 class="page-heading">
                    <span class="page-heading-title2">Danh sachs </span>
                </h2> --}}

                <ul class="blog-posts">
                @if(!$page->post->isEmpty())
                @foreach($page->post as $post)
                    <li class="post-item">
                        <article class="entry">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="entry-thumb image-hover2">
                                        @if(isset($post->getMedia('image')[0]))
                                        <a href="#">
                                            <img src="{{url('media', ['disk'=> $post->getMedia('image')[count($post->getMedia('image'))-1]->id,'filename'=>$post->getMedia('image')[count($post->getMedia('image'))-1]->file_name])}}">
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="entry-ci">
                                        <h3 class="entry-title"><a href="#">{{$post->title}}</a></h3>
                                   {{--      <div class="entry-meta-data">
                                            <span class="author">
                                            <i class="fa fa-user"></i> 
                                            by: <a href="#">Admin</a></span>
                                            <span class="cat">
                                                <i class="fa fa-folder-o"></i>
                                                <a href="#">News, </a>
                                                <a href="#">Promotions</a>
                                            </span>
                                            <span class="comment-count">
                                                <i class="fa fa-comment-o"></i> 3
                                            </span>
                                            <span class="date"><i class="fa fa-calendar"></i> 2014-08-05 07:01:49</span>
                                        </div> --}}
                                     {{--    <div class="post-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <span>(7 votes)</span>
                                        </div> --}}
                                        <div class="entry-excerpt">
                                            {!! $post->summary !!}
                                        </div>
                                        <div class="entry-more">
                                            <a href="{{url('post', ['id'=>$post->id])}}">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                    @endforeach
                    @endif
                </ul>
{{--                 <div class="sortPagiBar clearfix">
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div> --}}
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
    
@endsection
