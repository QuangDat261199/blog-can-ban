@extends('web.layout.master')

@section('content')
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            @foreach($highlight as $key => $post)
                @if($key == 0)
                    <div class="first-slot">
                @elseif($key == 1)
                    <div class="second-slot">
                @elseif($key == 2)
                    <div class="last-slot">
                @endif
                    <div class="masonry-box post-media">
                        <img src="{{ $post->imageUrl() }}" alt="" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange"><a href="{{ route('web.category', $post->category->slug) }}" title="">{{ $post->category->name }}</a></span>
                                    <h4><a href="{{ route('web.post', $post->slug) }}" title="">{{ $post->title }}</a></h4>
                                    <small>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</small>
                                    <small>{{ $post->user->name }}</small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end first-side -->
            @endforeach
        </div><!-- end masonry -->
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->
                    @foreach($new as $post)
                        <div class="blog-list clearfix">
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="{{ route('web.post', $post->slug) }}" title="">
                                            <img src="{{ $post->imageUrl() }}" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="{{ route('web.post', $post->slug) }}" title="">{{ $post->title }}</a></h4>
                                    <p>{{ $post->description }}</p>
                                    <small class="firstsmall"><a class="bg-orange" href="{{ route('web.category', $post->category->slug) }}" title="">{{ $post->category->name }}</a></small>
                                    <small>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</small>
                                    <small>{{ $post->user->name }}</small>
                                    <small><i class="fa fa-eye"></i> {{ $post->view_counts }}</small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div>

                        <hr class="invis">
                    @endforeach
                </div><!-- end page-wrapper -->

{{--                <hr class="invis">--}}

{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <nav aria-label="Page navigation">--}}
{{--                            <ul class="pagination justify-content-start">--}}
{{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#">Next</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </div><!-- end col -->--}}
{{--                </div><!-- end row -->--}}
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
