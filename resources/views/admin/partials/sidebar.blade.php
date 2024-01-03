<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/">
                <h5><b>Graduation Graduance</b></h5>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/home" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul id="sidebarnav">
                @if (auth()->user()->role->role == 'admin')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Master Data</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/students " aria-expanded="false">
                            <span>
                                <i class="ti ti-school"></i>
                            </span>
                            <span class="hide-menu">Students</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/teachers " aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Teachers</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Questions </span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/questions" aria-expanded="false">
                            <span>
                                <i class="ti ti-messages"></i>
                            </span>
                            <span class="hide-menu">View All Questions</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Notification</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/notification " aria-expanded="false">
                            <span>
                                <i class="ti ti-bell"></i>
                            </span>
                            <span class="hide-menu">Send Notification</span>
                        </a>
                    </li>
                @elseif (auth()->user()->role->role == 'teacher')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Questions </span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/questions-to-answer" aria-expanded="false">
                            <span>
                                <i class="ti ti-messages"></i>
                            </span>
                            <span class="hide-menu">Questions To Answer</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Students </span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/mentored-students" aria-expanded="false">
                            <span>
                                <i class="ti ti-school"></i>
                            </span>
                            <span class="hide-menu">Mentored Students</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/mass-messaging" aria-expanded="false">
                            <span>
                                <i class="ti ti-message-share"></i>
                            </span>
                            <span class="hide-menu">Mass Messaging</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Settings</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/profile" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                @elseif (auth()->user()->role->role == 'student')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Questions</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/your-questions" aria-expanded="false">
                            <span>
                                <i class="ti ti-messages"></i>
                            </span>
                            <span class="hide-menu">Your Question</span>
                        </a>
                    </li>

                    @php
                        $messageUnread = \App\Models\Message::where('student_id', auth()->user()->id)
                            ->where('is_read', false)
                            ->count();
                    @endphp

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/message" aria-expanded="false">
                            <span>
                                <i class="ti ti-message-share"></i>
                            </span>
                            <span class="hide-menu">Message</span>
                            @if (\App\Models\Message::where('student_id', auth()->user()->id)->where('is_read', false)->count() > 0)
                                <span id="notification-badge"
                                    class="badge text-bg-warning">{{ $messageUnread }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Settings</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/profile" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
