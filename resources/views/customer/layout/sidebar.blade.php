<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            Hotel <b class="font-black">Manage</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="{{ Request::is('admin/home')?'active':'' }}">
                <a href="{{ route('admin_home') }}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Pages</p>
        <ul class="menu-list">
            <li>
                <a class="dropdown">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Hotel Section</span>
                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                </a>
                <ul>
                    <li class="{{ Request::is('admin/amenity/view')?'active':'' }}">
                        <a href="{{ route('admin_amenity_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Amenities</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="{{ Request::is('admin/profile')?'active':'' }}">
                <a href="{{ route('admin_profile') }}">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Profile</span>
                </a>
            </li>
        </ul>
        {{-- <p class="menu-label">About</p>
        <ul class="menu-list">
            <li>
                <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank"
                    class="has-icon">
                    <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                    <span class="menu-item-label">Premium Demo</span>
                </a>
            </li>
            <li>
                <a href="https://justboil.me/tailwind-admin-templates" class="has-icon">
                    <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                    <span class="menu-item-label">About</span>
                </a>
            </li>
            <li>
                <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span class="menu-item-label">GitHub</span>
                </a>
            </li>
        </ul> --}}
    </div>
</aside>