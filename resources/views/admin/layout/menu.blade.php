<ul class="nav" id="side-menu">
    <li class="sidebar-search">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
        </div>
        <!-- /input-group -->
    </li>
{{--    <li>--}}
{{--        <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>--}}
{{--    </li>--}}
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.category.index') }}">List Category</a>
            </li>
            <li>
                <a href="{{ route('admin.category.create') }}">Add Category</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-cube fa-fw"></i> Post<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.post.index') }}">List Post</a>
            </li>
            <li>
                <a href="{{ route('admin.post.create') }}">Add Post</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('admin.user.index') }}">List User</a>
            </li>
            <li>
                <a href="{{ route('admin.user.create') }}">Add User</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="{{ route('admin.contact.index') }}"><i class="fa fa-phone fa-fw"></i> Contact</a>
    </li>
</ul>
