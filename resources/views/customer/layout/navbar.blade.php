<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item">
            <div class="control"><input placeholder="Search everywhere..." class="input"></div>
        </div>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">

            <div class="navbar-item dropdown has-divider has-user-avatar">
                <a class="navbar-link">
                    <div class="user-avatar">
                        @if (Auth::guard('customer')->user())
                        <img src="{{ asset('uploads/'.Auth::guard('customer')->user()->photo) }}" alt="{{ Auth::guard('customer')->user()->name }}" class="rounded-full">
                        @endif
                    </div>
                    @if (Auth::guard('customer')->user())
                        
                    <div class="is-user-name"><span>{{ Auth::guard('customer')->user()->name }}</span></div>
                    @endif
                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="navbar-dropdown">
                    <a href="{{ route('customer_profile') }}" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>Profile</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-settings"></i></span>
                        <span>Settings</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-email"></i></span>
                        <span>Messages</span>
                    </a>
                    <a href="{{ route('home') }}" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-table"></i></span>
                        <span>Website</span>
                    </a>
                    
                    <hr class="navbar-divider">
                    <a href="{{ route('customer_logout') }}" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log Out</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</nav>