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
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/class " aria-expanded="false">
                            <span>
                                <i class="ti ti-building"></i>
                            </span>
                            <span class="hide-menu">Class</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/archive " aria-expanded="false">
                            <span>
                                <i class="ti ti-archive"></i>
                            </span>
                            <span class="hide-menu">Archive</span>
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
                        <span class="hide-menu">Master Data</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/topics " aria-expanded="false">
                            <span>
                                <i class="ti ti-category"></i>
                            </span>
                            <span class="hide-menu">Topics</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/archive " aria-expanded="false">
                            <span>
                                <i class="ti ti-archive"></i>
                            </span>
                            <span class="hide-menu">Archive</span>
                        </a>
                    </li>
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
                    @php
                        $studentId = auth()->user()->id;
                        $registrationCount = \App\Models\Registration::where('student_id', $studentId)->count();
                    @endphp

                    <!-- Jika mahasiswa sudah mendaftar topik -->
                    @if ($registrationCount > 0)
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Question</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/your-questions" aria-expanded="false">
                                <span>
                                    <i class="ti ti-messages"></i>
                                </span>
                                <span class="hide-menu">Your Questions</span>
                            </a>
                        </li>
                        <!-- Jika mahasiswa belum mendaftar topik -->
                    @else
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Registration</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/registration" aria-expanded="false">
                                <span>
                                    <i class="ti ti-select"></i>
                                </span>
                                <span class="hide-menu">Select Topics</span>
                            </a>
                        </li>
                    @endif

                    <!-- Bagian sidebar untuk pesan -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/message" aria-expanded="false">
                            <span>
                                <i class="ti ti-message-share"></i>
                            </span>
                            <span class="hide-menu">Message</span>
                            @php
                                $messageUnread = \App\Models\Message::where('student_id', auth()->user()->id)
                                    ->where('is_read', false)
                                    ->count();
                            @endphp
                            @if ($messageUnread > 0)
                                <span id="notification-badge"
                                    class="badge text-bg-warning">{{ $messageUnread }}</span>
                            @endif
                        </a>
                    </li>

                    <!-- Bagian sidebar untuk pengaturan -->
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
