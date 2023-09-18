<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">

        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.product.list')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Products

                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.employees.employees')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Employees

                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.members.members')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Members

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.post.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Posts

                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.logout')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Logout

                </p>
            </a>
        </li>




</nav>