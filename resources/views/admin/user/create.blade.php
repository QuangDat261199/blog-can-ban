@extends('admin.layout.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Category Parent</label>
                            <select class="form-control">
                                <option value="0">Please Choose Category</option>
                                <option value="">Tin Tức</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                        </div>
                        <div class="form-group">
                            <label>Category Order</label>
                            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" />
                        </div>
                        <div class="form-group">
                            <label>Category Keywords</label>
                            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Keywords" />
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category Status</label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="1" checked="" type="radio">Visible
                            </label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="2" type="radio">Invisible
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Category Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection
