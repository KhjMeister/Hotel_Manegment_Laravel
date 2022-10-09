<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            Hotel <b class="font-black">Manage</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="{{ Request::is('customer/home')?'active':'' }}">
                <a href="{{ route('customer_home') }}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Pages</p>
        <ul class="menu-list">
            

            <li class="{{ Request::is('customer/profile')?'active':'' }}">
                <a href="{{ route('customer_profile') }}">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Profile</span>
                </a>
            </li>
            <li class="{{ Request::is('customer/order/view')?'active':'' }}">
                <a href="{{ route('customer_order_view') }}">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Orders</span>
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
                <a href="https://justboil.me/tailwind-customer-templates" class="has-icon">
                    <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                    <span class="menu-item-label">About</span>
                </a>
            </li>
            <li>
                <a href="https://github.com/justboil/customer-one-tailwind" class="has-icon">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span class="menu-item-label">GitHub</span>
                </a>
            </li>
        </ul> --}}
    </div>
</aside>