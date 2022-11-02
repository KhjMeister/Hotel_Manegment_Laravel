<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            Hotel <b class="font-black">Management</b>
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
                    <li class="{{ Request::is('admin/room/view')?'active':'' }}">
                        <a href="{{ route('admin_room_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Rooms</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="dropdown">
                    <span class="icon"><i class="mdi mdi-home"></i></span>
                    <span class="menu-item-label">Home</span>
                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                </a>
                <ul>
                    <li class="{{ Request::is('admin/slide/view')?'active':'' }}">
                        <a href="{{ route('admin_slide_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Slide</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/feature/view')?'active':'' }}">
                        <a href="{{ route('admin_feature_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Feature</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/testimonial/view')?'active':'' }}">
                        <a href="{{ route('admin_testimonial_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Testimonial</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/faq/view')?'active':'' }}">
                        <a href="{{ route('admin_faq_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">FAQ</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="dropdown">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Pages</span>
                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                </a>
                <ul>
                    <li class="{{ Request::is('admin/room/page')?'active':'' }}">
                        <a href="{{ route('admin_page_room_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Rooms</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/about/view')?'active':'' }}">
                        <a href="{{ route('admin_about_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">About Us</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/contact/view')?'active':'' }}">
                        <a href="{{ route('admin_contact_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Contact Us</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/cart/view')?'active':'' }}">
                        <a href="{{ route('admin_cart_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Cart</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/checkout/view')?'active':'' }}">
                        <a href="{{ route('admin_checkout_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Checkout</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/signin/view')?'active':'' }}">
                        <a href="{{ route('admin_signin_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Sign In</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/signup/view')?'active':'' }}">
                        <a href="{{ route('admin_signup_view') }}">
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Sign Up</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/post/view')?'active':'' }}">
                <a href="{{ route('admin_post_view') }}">
                    <span class="icon"><i class="mdi mdi-post"></i></span>
                    <span class="menu-item-label">Posts</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/profile')?'active':'' }}">
                <a href="{{ route('admin_profile') }}">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Profile</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/customer')?'active':'' }}">
                <a href="{{ route('admin_customer') }}">
                    <span class="icon"><i class="mdi mdi-account"></i></span>
                    <span class="menu-item-label">Customers</span>
                </a>
            </li>
            <li class="{{ Request::is('/admin/order/view')?'active':'' }}">
                <a href="{{ route('admin_orders') }}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Orders</span>
                </a>
            </li>
            <li class="{{ Request::is('/admin/setting')?'active':'' }}">
                <a href="{{ route('admin_setting') }}">
                    <span class="icon"><i class="mdi mdi-settings"></i></span>
                    <span class="menu-item-label">Setting</span>
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