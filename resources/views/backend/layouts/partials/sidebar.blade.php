 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif


                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>EXAM Packages</span></a>

                        <ul class="collapse">
                        <li class="{{ Route::is('Admin.packages.create') ? 'active' : '' }}"><a href="{{ route('Admin.packages.create') }}"> ADD EXAM packages</a></li>

                        <li class="{{ Route::is('Admin.packages.index') ? 'active' : '' }}"><a href="{{ route('Admin.packages.index') }}"> All EXAM</a></li>
                        </ul>
                       
                    </li>


                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>EXAM</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Exam.index') ? 'active' : '' }}"><a href="{{ route('Admin.Exam.index') }}"> All EXAM</a></li>
                        </ul>
                       
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Subject</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.subjects.index') ? 'active' : '' }}"><a href="{{ route('Admin.subjects.index') }}"> All Subject</a></li>
                        </ul>
                       
                    </li>


                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Examination Pattern </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Quiz.create') ? 'active' : '' }}"><a href="{{ route('Admin.Quiz.create') }}"> Add Quiz </a></li>
                            <!-- <li class="{{ Route::is('Admin.Q&A.index') ? 'active' : '' }}"><a href="{{ route('Admin.Q&A.index') }}">Add Quiz</a></li> -->
                            <li class="{{ Route::is('Admin.Quiz.index') ? 'active' : '' }}"><a href="{{ route('Admin.Quiz.index') }}"> All Quiz </a></li>
                        </ul>
                       
                    </li> 

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Question & Answer</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Q&A.index') ? 'active' : '' }}"><a href="{{ route('Admin.Q&A.index') }}">Add Quiz</a></li>


                        </ul>
                       
                    </li>
                   

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Annoucement</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Email.index') ? 'active' : '' }}"><a href="{{ route('Admin.Email.index') }}">Email</a></li>
                            <li class="{{ Route::is('Admin.Notification.index') ? 'active' : '' }}"><a href="{{ route('Admin.Notification.index') }}">Notification</a></li>
                            <li class="{{ Route::is('Admin.Notification.upload') ? 'active' : '' }}"><a href="{{ route('Admin.Notification.upload') }}">pdf_uplode</a></li>
                            <li class="{{ Route::is('Admin.solution_files.index') ? 'active' : '' }}"><a href="{{ route('Admin.solution_files.index') }}">solution Files</a></li>

                        </ul>
                       
                    </li> 
                  

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>student  Management</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.User.index') ? 'active' : '' }}"><a href="{{ route('Admin.User.index') }}">All User</a></li>
                            <li class="{{ Route::is('Admin.User.create') ? 'active' : '' }}"><a href="{{ route('Admin.User.create') }}">Add User</a></li>
                            <!-- <li class="{{ Route::is('Admin.User.exam-attend') ? 'active' : '' }}"><a href="{{ route('Admin.User.exam-attend') }}">student Attempt Exam Record</a></li>
                            <li class="{{ Route::is('Admin.User.result') ? 'active' : '' }}"><a href="{{ route('Admin.User.result') }}">student  Exam result </a></li> -->
                            <li class="{{ Route::is('Admin.Mark.index') ? 'active' : '' }}"><a href="{{ route('Admin.Mark.index') }}">Mark</a></li>
                            <!-- <li class="{{ Route::is('Admin.Examreview.index') ? 'active' : '' }}"><a href="{{ route('Admin.Examreview.index') }}">Exam review</a></li> -->
                        </ul>
                       
                    </li>


                 
                    <!-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Mark </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Mark.index') ? 'active' : '' }}"><a href="{{ route('Admin.Mark.index') }}">Mark</a></li>
                        </ul>
                       
                    </li> -->

                    <!-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Exam review</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Examreview.index') ? 'active' : '' }}"><a href="{{ route('Admin.Examreview.index') }}">Exam review</a></li>
                        </ul>
                       
                    </li> -->
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Monarch Frontend</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Payment.create') ? 'active' : '' }}"><a href="{{ route('Admin.Payment.create') }}">Test Series Package</a></li>
                        </ul>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.frontend.class11') ? 'active' : '' }}"><a href="{{ route('Admin.frontend.class11') }}">CLASS XII</a></li>
                        </ul>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.frontend.class12') ? 'active' : '' }}"><a href="{{ route('Admin.frontend.class12') }}">CLASS XII PASSED</a></li>
                        </ul>
                        <!-- <ul class="collapse">
                            <li class="{{ Route::is('Admin.Payment.index') ? 'active' : '' }}"><a href="{{ route('Admin.Payment.index') }}"> Class XI Full Solution
                            </a></li>
                        </ul>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Payment.index') ? 'active' : '' }}"><a href="{{ route('Admin.Payment.index') }}">Class XII Solution</a></li>
                        </ul> -->
                    </li>
    
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Payment Details</span></a>
                      
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Payment.index') ? 'active' : '' }}"><a href="{{ route('Admin.Payment.index') }}">Payment Detail</a></li>
                        </ul>
                       
                    </li>

                    <!-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span> study material</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Ranking.index') ? 'active' : '' }}"><a href="{{ route('Admin.Ranking.index') }}">Ranking</a></li>
                        </ul>
                       
                    </li> -->
                    <!-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Annoucement</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Email.index') ? 'active' : '' }}"><a href="{{ route('Admin.Email.index') }}">Email</a></li>
                            <li class="{{ Route::is('Admin.Notification.index') ? 'active' : '' }}"><a href="{{ route('Admin.Notification.index') }}">Notifivation</a></li>
                        </ul>
                       
                    </li>  -->
                  

                    <!-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>student  Management</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.User.index') ? 'active' : '' }}"><a href="{{ route('Admin.User.index') }}">All User</a></li>
                            <li class="{{ Route::is('Admin.User.create') ? 'active' : '' }}"><a href="{{ route('Admin.User.create') }}">Add User</a></li>
                            <li class="{{ Route::is('Admin.User.exam-attend') ? 'active' : '' }}"><a href="{{ route('Admin.User.exam-attend') }}">student Attempt Record</a></li>

                        </ul>
                       
                    </li> -->

                    <!-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Feedback </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Feedback.index') ? 'active' : '' }}"><a href="{{ route('Admin.Feedback.index') }}">Feedback</a></li>
                        </ul>
                       
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Ranking </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Ranking.index') ? 'active' : '' }}"><a href="{{ route('Admin.Ranking.index') }}">Ranking</a></li>
                        </ul>
                       
                    </li>
                     -->
                    
                    <!-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Payment Details</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Payment.index') ? 'active' : '' }}"><a href="{{ route('Admin.Payment.index') }}">Payment Detail</a></li>
                        </ul>
                       
                    </li> -->
                    <!-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Feedback </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Feedback.index') ? 'active' : '' }}"><a href="{{ route('Admin.Feedback.index') }}">Feedback</a></li>
                        </ul>
                       
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Ranking </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Ranking.index') ? 'active' : '' }}"><a href="{{ route('Admin.Ranking.index') }}">Ranking</a></li>
                        </ul>
                       
                    </li> -->

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>Logout </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('Admin.Ranking.index') ? 'active' : '' }}"><a href="{{ route('Admin.Ranking.index') }}">Logout</a></li>
                        </ul>
                       
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->