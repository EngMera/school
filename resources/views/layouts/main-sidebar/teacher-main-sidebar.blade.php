
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{url('teacher/dashboard')}}">
                            <i class="ti-home"></i>
                            <span class="right-nav-text">{{ trans('main_trans.Dashboard')}}</span>
                        </a>
                    </li>
                    
                    <!-- students -->
                    <li>
                        <a href="{{url('Teacher/dashboard/students')}}">
                            <i class="fa fa-graduation-cap" ></i>
                            {{trans('main_trans.list_students')}}</a>
                    </li>

                    <!-- sections -->
                    <li>
                        <a href="{{url('Teacher/dashboard/sections')}}">
                            <i class="fa fa-graduation-cap" ></i>
                            {{trans('main_trans.Sections')}}</a>
                    </li>
                    
                     <!-- attendance-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text"> الحضور والغياب </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{url('Teacher/dashboard/attendance_report')}}">
                                    <i class="fa fa-graduation-cap" ></i>
                                    تقارير الحضور والغياب</a>
                            </li>
                        </ul>
                    </li>
                  
                     <!-- onlineClass-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#onlineClass-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text"> حصص الاونلاين </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="onlineClass-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('Teacher/dashboard/onlineClass') }}">حصص اونلاين مع زوم</a> </li>
                            <li> <a href="{{ url('Teacher/dashboard/onlineClass/indirectCreate') }}">حصص اوفلاين مع زوم</a> </li>

                        </ul>
                    </li>

                    <!-- exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text"> الاختبارات </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('Teacher/dashboard/quiz') }}">قائمة الاختبارات   </a> </li>
                        </ul>
                    </li>

                    <!-- settings -->
                    <li>
                        <a href="{{url('Teacher/dashboard/profile')}}"><i class="ti-location-pin"></i><span class="right-nav-text">الملف الشخصي</span></a>
                    </li>
                </ul>
            </div>

