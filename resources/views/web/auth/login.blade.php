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
                            @if(session('success'))
                                <div class="col-lg-12">
                                    <div class="alert alert-success"> {{ session('success') }} </div>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <form class="form-wrapper" action="{{ route('web.auth.login') }}" method="post">
                                    @csrf
                                    <input type="text" name="email" class="form-control" placeholder="Email address">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection
