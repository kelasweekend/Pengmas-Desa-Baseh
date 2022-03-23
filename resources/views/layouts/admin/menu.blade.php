<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the  -->
        @if (auth()->user()->role == 'admin')
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link {{ Route::is('admin') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Admin Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ (request()->segment(2) == 'user') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        User Management
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('rt.index') }}" class="nav-link {{ (request()->segment(2) == 'rt') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        RT Management
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('rw.index') }}" class="nav-link {{ (request()->segment(2) == 'rw') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        RW Management
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('keluarga') }}" class="nav-link {{ (request()->segment(2) == 'dawis') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Data Seluruh
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('wisata.index') }}"
                    class="nav-link {{ (request()->segment(2) == 'wisata') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-car-side"></i>
                    <p>
                        Wisata Desa
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('info.index') }}" class="nav-link {{ (request()->segment(2) == 'info') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>
                        Informasi Desa
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kontak.index') }}"
                    class="nav-link {{ (request()->segment(2) == 'kontak') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-mail-bulk"></i>
                    <p>
                        Kotak Masuk
                    </p>
                </a>
            </li>
        @elseif(auth()->user()->role == "dawis")
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link {{ Route::is('admin') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Dawis Dashboard
                    </p>
                </a>
            </li>
        @elseif(auth()->user()->role == "rw")
            <li class="nav-item">
                <a href="{{ route('role.rw') }}" class="nav-link {{ Route::is('role.rw') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        RW Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rekap.rw') }}" class="nav-link {{ Route::is('rekap.rw') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Rekap RW
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rw.keluarga') }}" class="nav-link {{ Route::is('rw.keluarga') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Data RW
                    </p>
                </a>
            </li>
        @elseif(auth()->user()->role == "rt")
            <li class="nav-item">
                <a href="{{ route('role.rt') }}" class="nav-link {{ Route::is('role.rt') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        RT Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rekap.rt') }}" class="nav-link {{ Route::is('rekap.rt') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Rekap RT
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rt.keluarga') }}" class="nav-link {{ Route::is('rt.keluarga') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Data RT
                    </p>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link {{ Route::is('admin') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Admin Dashboard
                    </p>
                </a>
            </li>
        @endif
    </ul>
</nav>
<!-- /.sidebar-menu -->
