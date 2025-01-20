<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><img src="{{ asset('/uploads/logo/logo.png') }}" class="img-responsive" width="100" /></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->routeIs('admin.home') ? 'active' : '' }}">
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">General Settings</li>
            <li class="dropdown {{ request()->routeIs('companies.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-building"></i><span>Company</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('companies.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('companies.index') }}">All Companies</a>
                    </li>
                    <li class="{{ request()->routeIs('companies.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('companies.create') }}">Add Company</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('countries.*') || request()->routeIs('states.*') || request()->routeIs('cities.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-globe"></i><span>Globe</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('countries.index') ? 'active' : '' }}">
                        <a href="{{ route('countries.index') }}" class="nav-link">
                            Countries
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('states.index') ? 'active' : '' }}">
                        <a href="{{ route('states.index') }}" class="nav-link">
                            States
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('cities.index') ? 'active' : '' }}">
                        <a href="{{ route('cities.index') }}" class="nav-link">
                            Cities
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ request()->routeIs('dietary-attributes.*') || request()->routeIs('uoms.*') || request()->routeIs('tables.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-bars"></i><span>Menu</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('dietary-attributes.index') ? 'active' : '' }}">
                        <a href="{{ route('dietary-attributes.index') }}" class="nav-link">
                            Dietary Attributes
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('uoms.index') ? 'active' : '' }}">
                        <a href="{{ route('uoms.index') }}" class="nav-link">
                            UOM Management
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('tables.index') ? 'active' : '' }}">
                        <a href="{{ route('tables.index') }}" class="nav-link">
                            Table Management
                        </a>
                    </li>
                </ul>
            </li>


            <li class="dropdown {{ request()->routeIs('gallery.*') || request()->routeIs('slider.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-image"></i><span>Media</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('slider.*') ? 'active' : '' }}">
                        <a href="{{ route('slider.index') }}" class="nav-link">
                            Slider Management
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('gallery.*') ? 'active' : '' }}">
                        <a href="{{ route('gallery.index') }}" class="nav-link">
                            Gallery Management
                        </a>
                    </li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-users"></i><span>Roles</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="#">
                        <a href="#" class="nav-link">
                            Roles
                        </a>
                    </li>
                    <li class="#">
                        <a href="#" class="nav-link">
                            Permission
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-square"></i><span>Tax</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="#">
                        <a href="#" class="nav-link">Add Tax</a>
                    </li>
                    <li class="#">
                        <a href="#" class="nav-link"> Assign Tax</a>
                    </li>
                </ul>
            </li>
        
       
        <li class="menu-header">Menu Management</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-utensils"></i><span>Menu</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="#">Menu Category List</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Menu List</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Menu Item List</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-suitcase"></i><span>Package Management</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="#">All Packages</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Add Packages</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Amenities Management</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-home"></i><span>Party Hall</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="#">Booking List</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-suitcase"></i><span>Offer Management</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="#">All Offers</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Add Offer</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Sales & Orders</li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-calendar-alt"></i><span>Reservations</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-shopping-cart"></i><span>Orders</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-calendar-alt"></i><span>Inventory</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="#">Stocks</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Stock Purchase</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Stock Purchase Return</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-square"></i><span>Report</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="#">Menu Item Sales Report</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Ingredient Sales Report</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Reservation Booking Report</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-comment"></i><span>Feedback & Comment</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="#">Comment List</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">User Management</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user"></i><span>Users</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="#">
                        <a href="#" class="nav-link">
                            All Users
                        </a>
                    </li>
                    <li class="#">
                        <a href="#" class="nav-link">
                            Customers
                        </a>
                    </li>
                    <li class="#">
                        <a href="#" class="nav-link">
                            Employees
                        </a>
                    </li>
                    <li class="#">
                        <a href="#" class="nav-link">
                            Vendors
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </aside>
</div>
