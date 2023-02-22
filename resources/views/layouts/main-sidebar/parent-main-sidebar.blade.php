
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{url('parent/dashboard')}}">
                            <i class="ti-home"></i>
                            <span class="right-nav-text">{{ trans('main_trans.Dashboard')}}</span>
                        </a>
                    </li>

                    <!-- children-->
                    <li>
                        <a href="{{url('Parent/dashboard/children')}}">
                            <i class="ti-home"></i>
                            <span class="right-nav-text">قائمة الابناء</span>
                        </a>
                    </li>

                    <!-- attendances -->
                    <li>
                        <a href="{{url('Parent/dashboard/attendances')}}">
                            <i class="ti-home"></i>
                            <span class="right-nav-text"> الحضور والغياب</span>
                        </a>
                    </li>

                    <!-- fees -->
                    <li>
                        <a href="{{url('Parent/dashboard/fees')}}">
                            <i class="ti-home"></i>
                            <span class="right-nav-text"> الفواتير الدراسية </span>
                        </a>
                    </li>

                    <!-- profile -->
                    <li>
                        <a href="{{url('Parent/dashboard/profile')}}">
                            <i class="ti-home"></i>
                            <span class="right-nav-text"> الملف الشخصي </span>
                        </a>
                    </li>
                    
                </ul>
            </div>

