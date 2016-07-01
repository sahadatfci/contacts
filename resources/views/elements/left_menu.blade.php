<?php echo $currentRouteName =  \Request::route()->getName();?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('public/assets/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{!! (in_array($currentRouteName, array('users.index', 'users.create', 'users.edit', 'users.show')))?  'active' : ''!!} ">
                <a href="{{ url('users') }}">
                    <i class="fa fa-users"></i> <span>{{ trans('user.user_management') }}</span>
                </a>
            </li>
            <li class="{!! (in_array($currentRouteName, array('tags.index', 'tags.create', 'tags.edit', 'tags.show')))?  'active' : ''!!} ">
                <a href="{{ url('tags') }}">
                    <i class="fa fa-tags"></i> <span>{{ trans('tag.tag_management') }}</span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>