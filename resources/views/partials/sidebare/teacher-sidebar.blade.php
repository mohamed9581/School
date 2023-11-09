 <div id="two-column-menu">
 </div>
 <ul class="navbar-nav" id="navbar-nav">
     <li class="menu-title"><span data-key="t-menu">Menu</span></li>
     <li class="nav-item">
         <a class="nav-link menu-link" target="_blank" href="#">
             <i class="fas fa-chalkboard text-warning"></i> <span
                 data-key="t-widgets">{{ trans('main_trans.sections') }}</span>
         </a>
     </li> <!-- end sections Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" target="_blank" href="{{ route('students') }}">
             <i class="fas fa-user-graduate text-warning"></i> <span
                 data-key="t-widgets">{{ trans('main_trans.students') }}</span>
         </a>
     </li> <!-- end Students Menu -->

     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarOnlineClasse" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarOnlineClasse">
             <i class="mdi mdi-cast-education"></i> <span
                 data-key="t-dashboards">{{ trans('main_trans.online') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarOnlineClasse">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('online_classesIndex') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.online') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Online Classe Menu -->

     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarExam" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarExam">
             <i class="bx bx-book-open"></i> <span data-key="t-dashboards">{{ trans('main_trans.exam') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarExam">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     {{-- {{ route('rapports.index') }} --}}
                     <a href="{{ route('quizzes') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.List_Quizzes') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Examin Menu -->

     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarRapport" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarRapport">
             <i class=" ri-file-list-3-line"></i> <span
                 data-key="t-dashboards">{{ trans('main_trans.rapports') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarRapport">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     {{-- {{ route('rapports.index') }} --}}
                     <a href="{{ route('attendance.report') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.rapport_absence') }}
                     </a>
                 </li>
                 <li class="nav-item">
                     {{-- {{ route('rapports.index') }} --}}
                     <a href="#" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.rapport_exam') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Rapport Menu -->

     <li class="nav-item">
         <a class="nav-link menu-link" href="{{ route('profile.show') }}">
             <i class="bx bxs-id-card text-success"></i> <span
                 data-key="t-widgets">{{ trans('main_trans.profile') }}</span>
         </a>
     </li> <!-- end Classe Menu -->


 </ul>
