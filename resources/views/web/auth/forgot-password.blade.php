@extends('web.layout.master')

@section('content')
    <section class="section wb mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-wrapper">
                        <div class="row">
                            @if(session('error'))
                                <div class="col-lg-12">
                                    <div class="alert alert-danger"> {{ session('error') }} </div>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <form class="form-wrapper" action="{{ route('send-mail') }}" method="post">
                                    @csrf
                                    <input type="text" name="email" class="form-control" placeholder="Email address">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection
