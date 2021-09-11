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
                            @else
                                <div class="col-lg-12">
                                    <form class="form-wrapper" action="{{ route('reset-password') . "?token=" .request()->get('token') }}" method="post">
                                        @csrf
                                        <input type="text"  class="form-control" value="{{ $email }}" disabled>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <input type="password" name="confirm" class="form-control" placeholder="Confirm">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection
