<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <div class="d-flex sidebar-profile">
                <div class="sidebar-profile-image">
                    <img src="{{ url('dashboard/images/faces/face29.png') }}" alt="image">
                    <span class="sidebar-status-indicator"></span>
                </div>
                <div class="sidebar-profile-name">
                    <p class="sidebar-name">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="sidebar-designation">
                        {{ auth()->user()->role }}
                    </p>
                </div>
            </div>

            <p class="sidebar-menu-title">HOME</p>
        </li>
        @if (auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="typcn typcn-device-desktop menu-icon"></i>
                    <span class="menu-title">Dashboard
                        {{-- <span class="badge badge-primary ml-3">New</span>
                --}}
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#class_ui" aria-expanded="false"
                    aria-controls="class_ui">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Classes</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="class_ui">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.classes.index') }}">Create
                                Classes</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.list.classes') }}">List
                                Classes</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#attendance" aria-expanded="false"
                    aria-controls="attendance">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Attendance</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="attendance">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.setting.attendance') }}">Settings</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.record') }}">Attendance Record</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#subject_ui" aria-expanded="false"
                    aria-controls="subject_ui">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Subjects</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="subject_ui">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.subjects.index') }}">Create
                                Subjects</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.list.subjects') }}">List
                                Subjects</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#teadcher_ui" aria-expanded="false"
                    aria-controls="teadcher_ui">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Teachers</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="teadcher_ui">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.teachers.index') }}">Create
                                Teachers</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.list.teachers') }}">List
                                Teachers</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#students_ui" aria-expanded="false"
                    aria-controls="students_ui">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Students</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="students_ui">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.students.index') }}">Create
                                Students</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.list.students') }}">List
                                Students</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#timeTable_ui" aria-expanded="false"
                    aria-controls="timeTable_ui">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Time Table</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="timeTable_ui">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.time.index') }}">Create Time
                                Table</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.list.times') }}">List
                                Table</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#portalUser_ui" aria-expanded="false"
                    aria-controls="portalUser_ui">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Users</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="portalUser_ui">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user.index') }}">Create
                                Users</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.list.users') }}">List
                                Users</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-salary" aria-expanded="false"
                    aria-controls="ui-salary">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Salery</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-salary">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.salery.index') }}">Create
                                Salery</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.list.salery') }}">List
                                Salery</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-expense" aria-expanded="false"
                    aria-controls="ui-expense">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Expense</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-expense">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.expense') }}">Add
                                Expense</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.expense.list') }}">List
                            Expense</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-result-card" aria-expanded="false"
                    aria-controls="ui-result-card">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Result Cards</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-result-card">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.result.card') }}">Create
                                Cards</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.result.card.list') }}">Result Cards List</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-sheet-card" aria-expanded="false"
                    aria-controls="ui-sheet-card">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Date Sheet</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-sheet-card">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.date.sheet') }}">Create
                                Date Sheet</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.date.sheet.list') }}">Date Sheet List</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#activity" aria-expanded="false"
                    aria-controls="ui-sheet-card">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Activity</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="activity">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.activity.create') }}">Create
                                activity</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.list.activity') }}">list Activity</a></li>
                    </ul>
                </div>
            </li>
        @elseif (auth()->user()->role == 'accountant')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('accountant.dashboard') }}">
                    <i class="typcn typcn-device-desktop menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-acc-fee" aria-expanded="false"
                    aria-controls="ui-acc-fee">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Fees</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-acc-fee">
                    <ul class="nav flex-column sub-menu">
                        {{-- <li class="nav-item"> <a class="nav-link" href="{{route('admin.fees.index')}}">Create Fee</a></li> --}}
                        <li class="nav-item"> <a class="nav-link"href="{{ route('accountant.list.check') }}">List
                                Fee</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-salary" aria-expanded="false"
                    aria-controls="ui-salary">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Salries</span>
                    <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-salary">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"href="{{ route('accountant.list.salries') }}">List
                                Salries</a></li>
                    </ul>
                </div>
            </li>
            @elseif (auth()->user()->role == 'student')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.dashboard') }}">
                    <i class="typcn typcn-device-desktop menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.profile.list') }}">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.date.sheet') }}">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Date Sheet</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.result.card') }}">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Result Card</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.activities.list') }}">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Activities List</span>
                </a>
            </li>
            @elseif (auth()->user()->role == 'teacher')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('teacher.dashboard') }}">
                    <i class="typcn typcn-device-desktop menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('teacher.student.list') }}">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Students List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('teacher.activities.list') }}">
                    <i class="typcn typcn-briefcase menu-icon"></i>
                    <span class="menu-title">Activities List</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
