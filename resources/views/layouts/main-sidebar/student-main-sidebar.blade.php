
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{url('student/dashboard')}}">
                            <i class="ti-home"></i>
                            <span class="right-nav-text">{{ trans('main_trans.Dashboard')}}</span>
                        </a>
                    </li>

                    <!-- exams -->
                    <li>
                        <a href="{{url('Student/dashboard/exams')}}">
                            <i class="fa fa-graduation-cap" ></i>
                            <span class="right-nav-text">الامتحانات</span>
                        </a>
                    </li>

                    <!-- profile -->
                    <li>
                        <a href="{{url('Student/dashboard/profile')}}">
                            <i class="fa fa-user-circle" ></i>
                            <span class="right-nav-text">الملف الشخصي</span>
                        </a>
                    </li>
                </ul>
            </div>

