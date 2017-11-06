@extends('frontend.templates.master', [
    'title' => 'Bài viết '.$post->title,
    'include'=>[],

])
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{url('/')}}" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a class="home" href="{{url('page', ['id'=>$post->page->id])}}" title="Blog">{{$post->page->title}}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span> {{$post->title}}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-12" id="center_column">
                <h1 class="page-heading">
                    <span class="page-heading-title2">{{$post->title}}</span>
                </h1>
                <article class="entry-detail">
                    <div class="entry-photo">
                    @if(isset($post->getMedia('image')[0]))
                        <img src="{{url('media', ['disk'=> $post->getMedia('image')[count($post->getMedia('image'))-1]->id,'filename'=>$post->getMedia('image')[count($post->getMedia('image'))-1]->file_name])}}">
                    @endif
                    </div>
                    <div class="content-text clearfix">
                        <b>{!! $post->summary !!}</b>
                    </div>
                    <div class="content-text clearfix">
                        {!! html_entity_decode($post->description, ENT_QUOTES, 'UTF-8') !!}
                    </div>
                </article>
                <!-- Related Posts -->
                @if(!$related_posts->isEmpty())
                <div class="single-box">
                    <h2>Bài viết liên quan</h2>
                    <ul class="related-posts owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>
                        @foreach($related_posts as $related_post)
                        <li class="post-item">
                            <article class="entry">
                                <div class="entry-thumb image-hover2">
                                @if(isset($post->getMedia('image')[0]))
                                    <a href="{{url('post', ['id'=>$related_post->id])}}">
                                    <img src="{{url('media', ['disk'=> $post->getMedia('image')[count($post->getMedia('image'))-1]->id,'filename'=>$post->getMedia('image')[count($post->getMedia('image'))-1]->file_name])}}">
                                    </a>
                                @endif
                                </div>
                                <div class="entry-ci">
                                    <h3 class="entry-title"><a href="{{url('post', ['id'=>$related_post->id])}}">{{$related_post->title}}</a></h3>
                                  
                                    <div class="entry-more">
                                        <a href="{{url('post', ['id'=>$related_post->id])}}">Xem thêm</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                        @endforeach
                   
                    </ul>
                </div>
                @endif
                <!-- ./Related Posts -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@endsection
