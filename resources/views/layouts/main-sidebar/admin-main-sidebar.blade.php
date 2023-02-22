
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{url('dashboard')}}">
                            <i class="ti-home"></i>
                            <span class="right-nav-text">{{ trans('main_trans.Dashboard')}}</span>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{trans('main_trans.Programname')}}
                     </li>
                    <!--  Grades -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fa fa-university"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Grades') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ url('grades')}}">{{ trans('main_trans.Grades_list') }}</a></li>
                        </ul>
                    </li>
                    <!-- Classrooms-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Classrooms') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('classrooms')}}">{{ trans('main_trans.Classrooms_list') }} </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>
                     <!-- Sections -->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Sections') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('sections')}}">{{ trans('main_trans.Sections_list') }} </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>
                    <!-- Teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fa fa-user-circle"></i><span
                                    class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('teachers') }}">{{trans('main_trans.List_Teachers')}}</a> </li>

                        </ul>
                    </li>
                    <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fa fa-user-circle"></i><span
                                    class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('my-parents') }}">{{trans('main_trans.List_Parents')}}</a> </li>

                        </ul>
                    </li>
                     <!-- students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fa fa-graduation-cap" ></i>{{trans('main_trans.students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('main_trans.Student_information')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Student_information" class="collapse">
                                    <li> <a href="{{url('students/create')}}">{{trans('main_trans.add_student')}}</a></li>
                                    <li> <a href="{{url('students')}}">{{trans('main_trans.list_students')}}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main_trans.Students_Promotions')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li> <a href="{{url('promotions')}}">{{trans('main_trans.add_Promotion')}}</a></li>
                                    <li> <a href="{{url('promotions/create')}}">{{trans('main_trans.list_Promotions')}}</a> </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('main_trans.Graduate_students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                                <ul id="Graduate students" class="collapse">
                                    <li> <a href="{{url('graduated/create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                                    <li> <a href="{{url('graduated')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#accounts-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text">الحسابات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('fees') }}">{{trans('main_trans.fees')}}</a> </li>
                            <li> <a href="{{ url('feeInvoice') }}">{{trans('main_trans.invoices')}}</a> </li>
                            <li> <a href="{{ url('receipt') }}">سندات القبض</a> </li>
                            <li> <a href="{{ url('processing') }}"> استبعاد رسوم</a> </li>
                            <li> <a href="{{ url('payment') }}">  سندات الصرف</a> </li>
                        </ul>
                    </li>
                    <!-- attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text">الحضور والغياب</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('attendance') }}">الحضور والغياب</a> </li>
                        </ul>
                    </li>
                    <!-- subject-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text">المواد الدراسية </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subject-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('subject') }}">قائمة المواد الدراسية </a> </li>
                        </ul>
                    </li>
                    <!-- exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text"> الامتحانات </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('exams') }}">الامتحانات   </a> </li>
                            <li> <a href="{{ url('quiz') }}">الاختبارات   </a> </li>
                            <li> <a href="{{ url('questions') }}">الاسئلة   </a> </li>
                        </ul>
                    </li>
                    <!-- online-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#online-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text"> حصص الاونلاين </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="online-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('online') }}">قائمة حصص الاونلاين       </a> </li>
                            <li> <a href="{{ url('online/indirectCreate') }}">    اضافة حصص اوفلاين جديدة    </a> </li>
                        </ul>
                    </li>
                    <!-- library-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-menu">
                            <div class="pull-left"><i class="fa fa-money"></i><span
                                    class="right-nav-text"> المكتبة  </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('library') }}">قائمة الكتب   </a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        اعدادات النظام
                    </li>
                    <!-- settings -->
                    <li>
                        <a href="{{url('settings')}}"><i class="ti-location-pin"></i><span class="right-nav-text">الاعدادات</span></a>
                    </li>
                </ul>
            </div>

