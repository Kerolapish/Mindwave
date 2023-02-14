<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                
                <a href="#" class="d-block nav-link">
                    <i class="nav-icon fa-solid fa-user"></i>
                    &nbsp;&nbsp;&nbsp;
                     {{ Auth::user()->name }}
                    </a>
            </div>
        </div>

        @if ($siteData->hasSetup == false)
            <!-- Sidebar menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column"data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        @if (Auth::user() -> hasUpdate == true)
                            <a href="#" class="nav-link">
                                <p>Profile</p><i class="right fa-solid fa-check"></i>
                            </a>
                        @else
                            <a href="#" class="nav-link">
                                <p>Profile</p><i class="right fa-solid fa-warning"></i>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($siteData->setupBrand == true)
                            <a href="#" class="nav-link">
                                <p>Branding</p><i class="right fa-solid fa-check"></i>
                            </a>
                        @else
                            <a href="#" class="nav-link">
                                <p>Branding</p><i class="right fa-solid fa-exclamation"></i>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($siteData->setupBackground == true)
                            <a href="#" class="nav-link">
                                <p>Background</p><i class="right fa-solid fa-check"></i>
                            </a>
                        @else
                            <a href="#" class="nav-link">
                                <p>Background</p><i class="right fa-solid fa-exclamation"></i>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($siteData->setupTitle == true)
                            <a href="#" class="nav-link">
                                <p>Content</p><i class="right fa-solid fa-check"></i>
                            </a>
                        @else
                            <a href="#" class="nav-link">
                                <p>Content</p><i class="right fa-solid fa-exclamation"></i>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($siteData->setupInfo == true)
                            <a href="#" class="nav-link">
                                <p>Information</p><i class="right fa-solid fa-check"></i>
                            </a>
                        @else
                            <a href="#" class="nav-link">
                                <p>Information</p><i class="right fa-solid fa-exclamation"></i>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($siteData->setupService == true)
                            <a href="#" class="nav-link">
                                <p>Service</p><i class="right fa-solid fa-check"></i>
                            </a>
                        @else
                            <a href="#" class="nav-link">
                                <p>Service</p><i class="right fa-solid fa-exclamation"></i>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($siteData->setupTeam == true)
                            <a href="#" class="nav-link">
                                <p>Team</p><i class="right fa-solid fa-check"></i>
                            </a>
                        @else
                            <a href="#" class="nav-link">
                                <p>Team</p><i class="right fa-solid fa-exclamation"></i>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($siteData->setupFooter == true)
                            <a href="#" class="nav-link">
                                <p>Footer</p><i class="right fa-solid fa-check"></i>
                            </a>
                        @else
                            <a href="#" class="nav-link">
                                <p>Footer</p><i class="right fa-solid fa-exclamation"></i>
                            </a>
                        @endif
                    </li>
                </ul>
            </nav>
        @else
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-header">APPEARANCE</li>
                    <li class="nav-item">
                        <a href="{{ route('branding')}}" class="nav-link {{ Request::is('admin/branding') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-copyright"></i>
                            <p>Branding</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('background')}}" class="nav-link {{ Request::is('admin/background') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-image"></i>
                            <p>Background</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('content')}}" class="nav-link {{ Request::is('admin/content') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-paragraph"></i>
                            <p>Content</p>
                        </a>
                    </li>
                    <li class="nav-header">PAGE CONTENT</li>
                    <li class="nav-item">
                        <a href="{{ route('information')}}" class="nav-link {{ Request::is('admin/information') ? 'active' : '' }}">
                            <i class="nav-icon fa-regular fa-rectangle-list"></i>
                            <p> Information</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('service')}}" class="nav-link {{ Request::is('admin/service') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-book"></i>
                            <p>Service</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('footer')}}" class="nav-link {{ Request::is('admin/footer') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-highlighter"></i>
                            <p>Footer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('team')}}" class="nav-link {{ Request::is('admin/team') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-people-group"></i>
                            <p>Teams</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        @endif
    </div>
    <!-- /.sidebar -->
</aside>
