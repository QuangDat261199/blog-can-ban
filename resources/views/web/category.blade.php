@extends('web.layout.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="trend-videos">
                                <div class="blog-box">
                                    <div class="blog-meta">
                                        @foreach($categories as $category)
                                            <h4><a href="{{ route('web.category', $category->slug) }}" title="">{{ $category->name }}</a></h4>
                                        @endforeach
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end videos -->
                        </div><!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col -->

                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-grid-system">
                            <div class="row">
                                @foreach($posts as $post)
                                    <div class="col-md-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="{{ route('web.post', $post->slug) }}" title="">
                                                    <img src="{{ $post->imageUrl() }}" alt="" class="img-fluid">
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta big-meta">
                                                <span class="color-orange"><a class="bg-orange" href="{{ route('web.category', $post->category->slug) }}" title="">{{ $post->category->name }}</a></span>
                                                <h4><a href="{{ route('web.post', $post->slug) }}" title="">{{ $post->title }}</a></h4>
                                                <p>{{ $post->description }}</p>
                                                <small>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</small>
                                                <small>{{ $post->user->name }}</small>
                                                <small><i class="fa fa-eye"></i> {{ $post->view_counts }}</small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                @endforeach
                            </div><!-- end row -->
                        </div><!-- end blog-grid-system -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis3">

                    <div class="row">
                        <div class="col-md-12">
                            {!! $posts->links() !!}
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
