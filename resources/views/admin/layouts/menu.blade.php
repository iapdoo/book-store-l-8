<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview" {{request()->routeIs('users.*') ? 'menu-open' : ''}}>
            <a href="{{route('users')}}" class="nav-link active"  {{request()->routeIs('users.*') ? 'active' : ''}} >
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{trans('admin.users')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('users')}}" class="nav-link" {{request()->routeIs('users') ? 'active' : ''}}>
                        <i class="fas fa-users nav-icon"></i>
                        {{trans('admin.users')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.create')}}" class="nav-link" {{request()->routeIs('users.create') ? 'active' : ''}}>
                        <i class="fas fa-plus nav-icon"></i>
                        {{trans('admin.user_add')}}
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview ">
            <a href="{{url('')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{trans('admin.dashboard')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" >
                <li class="nav-item">
                    <a href="{{url('settings')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{trans('admin.settings')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{request()->routeIs('category.*') ? 'menu-open' : ''}}">
            <a href="{{url('')}}" class="nav-link {{request()->routeIs('category.*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{trans('admin.category')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link {{request()->routeIs('category.index') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>

                        <p>{{trans('admin.categories')}}</p>

                        <p>{{trans('admin.category')}}</p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('category/create')}}" class="nav-link {{request()->routeIs('category.create') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{trans('admin.category_add')}}</p>
                    </a>
                </li>

            </ul>

        </li>
        <li class="nav-item has-treeview  {{request()->routeIs('product.*') ? 'menu-open' : ''}}">
            <a href="{{url('')}}" class="nav-link {{request()->routeIs('product.*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>



                    {{trans('admin.product')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('product.index')}}" class="nav-link  {{request()->routeIs('product.index') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>

                        <p>{{trans('admin.products')}}</p>

                        <p>{{trans('admin.product')}}</p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.create')}}" class="nav-link  {{request()->routeIs('product.create') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{trans('admin.product_add')}}</p>
                    </a>
                </li>

            </ul>

        </li>
        <li class="nav-item has-treeview  {{request()->routeIs('contact.*') ? 'menu-open' : ''}}">
            <a href="{{url('')}}" class="nav-link {{request()->routeIs('contact.*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{trans('admin.massage')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('contact.showindex')}}" class="nav-link  {{request()->routeIs('contact.showindex') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{trans('admin.Massage')}}</p>
                    </a>
                </li>
            </ul>

        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
