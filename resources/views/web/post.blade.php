@extends('web.layout.master')

@section('content')
<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/category">Blog</a></li>
                            <li class="breadcrumb-item active">{{ $post->title }}</li>
                        </ol>

                        <span class="color-orange"><a href="{{ route('web.category', $post->category->slug) }}" title="">{{ $post->category->name }}</a></span>

                        <h3>{{ $post->title }}</h3>

                        <div class="blog-meta big-meta">
                            <small>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</small>
                            <small>{{ $post->user->name }}</small>
                            <small><i class="fa fa-eye"></i> {{ $post->view_counts }}</small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <div class="single-post-media">
                        <img src="{{ $post->imageUrl() }}" alt="" class="img-fluid">
                    </div><!-- end media -->

                    <div class="blog-content">
                        <div class="pp">
                            <p>{{ $post->description }}</p>

                            <p>{!! $post->content !!}</p>

                        </div><!-- end pp -->
                    </div><!-- end content -->

                    <div class="blog-title-area">
                        <div class="tag-cloud-single">
                            <span>Tags</span>
                            <small><a href="#" title="">lifestyle</a></small>
                            <small><a href="#" title="">colorful</a></small>
                            <small><a href="#" title="">trending</a></small>
                            <small><a href="#" title="">another tag</a></small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">You may also like</h4>
                        <div class="row">
                            @foreach($relate as $item)
                            <div class="col-lg-6">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="{{ route('web.post', $item->slug) }}" title="">
                                            <img src="{{ $item->imageUrl() }}" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span class=""></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="{{ route('web.post', $item->slug) }}" title="">{{ $item->title }}</a></h4>
                                        <small>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</small>
                                        <small>{{ $item->user->name }}</small>
                                        <small><i class="fa fa-eye"></i> {{ $item->view_counts }}</small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->
                            @endforeach
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">{{ $post->comments()->count() }} Comments</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="comments-list">
                                    @foreach($post->comments as $comment)
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="media-heading user_name">{{ $comment->user->name }} <small>{{ \Carbon\Carbon::parse($comment->created_at)->format('d-m-Y')  }}</small></h4>
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    @if(\Illuminate\Support\Facades\Auth::check())
                    <div class="custombox clearfix">
                        <h4 class="small-title">Leave a Reply</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper" method="post" action="{{ route('web.post.comment', $post->id) }}">
                                    @csrf
                                    <textarea class="form-control" name="content" placeholder="Your comment"></textarea>
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
{{--            <form class="form-wrapper" method="post" action="{{ route('web.post.comment', $post->id) }}">--}}
{{--                @csrf--}}
{{--                <input type="text" class="form-control" placeholder="Your name">--}}
{{--                <input type="text" class="form-control" placeholder="Email address">--}}
{{--                <input type="text" class="form-control" placeholder="Website">--}}
{{--                <textarea class="form-control" placeholder="Your comment"></textarea>--}}
{{--                <button type="submit" class="btn btn-primary">Submit Comment</button>--}}
{{--            </form>--}}
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">

                    <div class="widget">
                        <h2 class="widget-title">Trend Videos</h2>
                        <div class="trend-videos">
                            @foreach($highlight as $item)
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="{{ route('web.post', $item->slug) }}" title="">
                                            <img src="{{ $item->imageUrl() }}" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span class="videohover"></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="{{ route('web.post', $item->slug) }}" title="">{{ $item->title }}</a></h4>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">
                            @endforeach
                        </div><!-- end videos -->
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
