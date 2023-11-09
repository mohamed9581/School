 <div id="two-column-menu">
 </div>
 <ul class="navbar-nav" id="navbar-nav">
     <li class="menu-title"><span data-key="t-menu">Menu</span></li>
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarExam" data-bs-toggle="collapse" role="button" aria-expanded="false"
             aria-controls="sidebarExam">
             <i class="bx bx-book-open"></i> <span data-key="t-dashboards">{{ trans('Parent_trans.children') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarExam">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     {{-- {{ route('rapports.index') }} --}}
                     <a href="{{ route('children') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('Parent_trans.children') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Examin Menu -->

     <li class="nav-item">
         <a class="nav-link menu-link" href="{{ route('studentProfile') }}">
             <i class="bx bxs-id-card text-success"></i> <span
                 data-key="t-widgets">{{ trans('Parent_trans.profile') }}</span>
         </a>
     </li> <!-- end Classe Menu -->


 </ul>
