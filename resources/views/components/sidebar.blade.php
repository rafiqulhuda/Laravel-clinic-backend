<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Klinik Ajaib</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            {{-- <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}"> --}}
            <li class="nav-item dropdown ">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    <ul class="dropdown-menu">
                        <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                            <a class="nav-link"
                                href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                        </li>
                        <li >
                            <a class="nav-link"
                                href="{{ route('users.index') }}">User</a>
                        </li>
                        <li >
                            <a class="nav-link"
                                href="{{ route('doctors.index') }}">Doctor</a>
                        </li>
                    
                    </ul>
            </li>
        </ul>
        </div>
    </aside>
</div>
