<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <!-- Brand-->
        <div class="sidebar-brand">
            <a href="#">@lang('admin::admin.sidebar.admin-menu')</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <!-- User Header -->
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded"
                     src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                     alt="User picture">
            </div>
            <div class="user-info">
                <span class="user-name">
                    {{ Auth::guard('admin')->user()->name }}
                </span>
                <span class="user-role">Administrator</span>
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                </span>
            </div>
        </div>
        <!-- Menu  -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>@lang('admin::admin.sidebar.general')</span>
                </li>
                <li>
                    <a href="{{ route('admin-home') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>@lang('admin::admin.sidebar.menu.menu-dashboard')</span>
                        <span class="badge badge-pill badge-warning">New</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-file"></i>
                        <span>CMS</span>
                        <span class="badge badge-pill badge-warning">New</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">@lang('admin::admin.sidebar.menu.menu-cms-overview')</a>
                            </li>
                            <li>
                                <a href="#">@lang('admin::admin.sidebar.menu.menu-cms-create-page')</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="header-menu">
                    <span>@lang('admin::admin.sidebar.shop')</span>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>@lang('admin::admin.sidebar.menu.menu-orders')</span>
                        <span class="badge badge-pill badge-warning">Hot</span>
                    </a>
                </li>
                <li class="header-menu">
                    <span>@lang('admin::admin.sidebar.extras')</span>
                </li>
                <li>
                    <a href="/admin/docs">
                        <i class="fa fa-book"></i>
                        <span>@lang('admin::admin.sidebar.menu.menu-documentation')</span>
                        <span class="badge badge-pill badge-primary">Beta</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="#">
            <i class="fa fa-bell"></i>
            <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
            <i class="fa fa-envelope"></i>
            <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="#">
            <i class="fa fa-cog"></i>
            <span class="badge-sonar"></span>
        </a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>
