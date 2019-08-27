<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('dashboard') }}">
            <img src="{{ asset('spccweb/img/brand.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="/storage/profile_pictures/default-female.png">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
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
                    <a href="#" class="dropdown-item {{ $title == 'Settings' ? 'active' : '' }}">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('spccweb/img/brand.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item {{ $title == 'Dashboard' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </a>
                </li>
                @role('admin')
                <li class="nav-item {{ $title == 'Examination Period' ? 'active' : '' }}">
                    <a class="nav-link" href="/acad_terms">
                        <i class="ni ni-ruler-pencil"></i> Examination Period
                    </a>
                </li>
                <li class="nav-item {{ $title == 'Class Scheduling' ? 'active' : '' }}">
                    <a class="nav-link" href="#">
                        <i class="ni ni-calendar-grid-58"></i> Class Scheduling
                    </a>
                </li>

                <li class="nav-item {{ $title == 'Manage Grades' ? 'active' : '' }}">
                    <a class="nav-link" href="#navbar-grades" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-grades">
                        <i class="ni ni-chart-bar-32"></i>
                        <span class="nav-link-text">Manage Grades</span>
                    </a>

                    <div class="collapse" id="navbar-grades">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Encode Grades
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Grade Report
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ $title == 'Manage Students' ? 'active' : '' }}">
                    <a class="nav-link" href="#navbar-students" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-students">
                        <i class="ni ni-single-02"></i>
                        <span class="nav-link-text">Manage Students</span>
                    </a>

                    <div class="collapse" id="navbar-students">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Add Student
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Subject Creditation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    View Enlistment
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Student Masterlist
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ $title == 'Manage Faculty' ? 'active' : '' }}">
                    <a class="nav-link" href="#navbar-faculty" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-faculty">
                        <i class="ni ni-badge"></i>
                        <span class="nav-link-text">Manage Faculty</span>
                    </a>

                    <div class="collapse" id="navbar-faculty">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Add Faculty
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Faculty Reassignment
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Faculty Masterlist
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ $title == 'Manage Curriculum' ? 'active' : '' }}">
                    <a class="nav-link" href="#navbar-curriculum" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-curriculum">
                        <i class="ni ni-collection"></i>
                        <span class="nav-link-text">Manage Curriculum</span>
                    </a>

                    <div class="collapse" id="navbar-curriculum">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/curriculums/create">
                                    Add Curriculum
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/curriculums">
                                    Curriculum Masterlist
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Add Subject
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Subject Masterlist
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endrole
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">

                @role('admin')
                <li class="nav-item {{ $title == 'System Settings' ? 'active' : '' }}">
                    <a class="nav-link" href="#navbar-settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-settings">
                        <i class="ni ni-settings"></i>
                        <span class="nav-link-text">System Settings</span>
                    </a>

                    <div class="collapse" id="navbar-settings">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Backup Database
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ $title == 'User Management' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="ni ni-circle-08 text-pink"></i> User Management
                    </a>
                </li>
                @endrole

                @role('writer')
                <li class="nav-item {{ $title == 'Write Post' ? 'active' : '' }}">
                    <a href="/posts/create" class="nav-link">
                        <i class="ni ni-fat-add"></i> Write Post
                    </a>
                </li>
                <li class="nav-item {{ $title == 'View My Posts' ? 'active' : '' }}">
                    <a href="/posts" class="nav-link">
                        <i class="ni ni-single-copy-04"></i> View My Posts
                    </a>
                </li>
                @endrole

                @role('moderator')
                <li class="nav-item {{ $title == 'All Published Posts' ? 'active' : '' }}">
                    <a href="/posts/mod/published" class="nav-link">
                        <i class="ni ni-books"></i> All Published Posts
                    </a>
                </li>
                <li class="nav-item {{ $title == 'Approval of Posts' ? 'active' : '' }}">
                    <a href="/posts/mod/approval" class="nav-link">
                        <i class="ni ni-check-bold"></i> Approval of Posts
                    </a>
                </li>
                @endrole

                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="ni ni-user-run"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>