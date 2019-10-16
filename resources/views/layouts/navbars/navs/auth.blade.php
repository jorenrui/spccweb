<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">{{ $title }}</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Profile Picture placeholder"
                                    src="/storage/profile_pictures/{{ auth()->user()->profile_picture}}">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->getName() }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ auth()->user()->getRole() }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item {{ $title == 'Profile' ? 'active' : '' }}">
                        <i class="ni ni-single-02"></i>
                        <span>Profile</span>
                    </a>
                    @role('writer|admin')
                    <a href="/posts/create" class="dropdown-item {{ $title == 'Write Post' ? 'active' : '' }}">
                        <i class="ni ni-fat-add"></i>
                        <span>Write Post</span>
                    </a>
                    <a href="/posts" class="dropdown-item {{ $title == 'View My Posts' ? 'active' : '' }}">
                        <i class="ni ni-single-copy-04"></i>
                        <span>View My Posts</span>
                    </a>
                    @endrole
                    @role('admin|moderator')
                    <a href="/posts/mod/published" class="dropdown-item {{ $title == 'All Published Posts' ? 'active' : '' }}">
                        <i class="ni ni-books"></i>
                        <span>All Published Posts</span>
                    </a>
                    <a href="/posts/mod/approval" class="dropdown-item {{ $title == 'Approval of Posts' ? 'active' : '' }}">
                        <i class="ni ni-check-bold"></i>
                        <span>Approval of Posts</span>
                    </a>
                    @endrole
                    @role('admin')
                    <a href="/events" class="dropdown-item {{ $title == 'Events' ? 'active' : '' }}">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Events</span>
                    </a>
                    @endrole
                    <a href="#" class="dropdown-item {{ $title == 'About' ? 'active' : '' }}">
                        <i class="ni ni-app"></i>
                        <span>About</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>