 <div id="two-column-menu">
 </div>
 <ul class="navbar-nav" id="navbar-nav">
     <li class="menu-title"><span data-key="t-menu">Menu</span></li>
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarExam" data-bs-toggle="collapse" role="button" aria-expanded="false"
             aria-controls="sidebarExam">
             <i class="bx bx-book-open"></i> <span data-key="t-dashboards">{{ trans('main_trans.exam') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarExam">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     {{-- {{ route('rapports.index') }} --}}
                     <a href="{{ route('studentExam') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.List_Quizzes') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Examin Menu -->

     <li class="nav-item">
         <a class="nav-link menu-link" href="{{ route('studentProfile') }}">
             <i class="bx bxs-id-card text-success"></i> <span
                 data-key="t-widgets">{{ trans('main_trans.profile') }}</span>
         </a>
     </li> <!-- end Classe Menu -->


 </ul>
