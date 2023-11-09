 <div id="two-column-menu">
 </div>
 <ul class="navbar-nav" id="navbar-nav">
     <li class="menu-title"><span data-key="t-menu">Menu</span></li>
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarGrades" data-bs-toggle="collapse" role="button" aria-expanded="false"
             aria-controls="sidebarGrades">
             <i class=" bx bxs-institution"></i> <span
                 data-key="t-dashboards">{{ trans('Grades_trans.title_page') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarGrades">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('grades.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('Grades_trans.List_Grade') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Stade Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarClasses" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarClasses">
             <i class="  bx bxs-school"></i> <span
                 data-key="t-dashboards">{{ trans('Classes_trans.title_page') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarClasses">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('classes.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('Classes_trans.List_classes') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Classe Menu -->

     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarSections" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarSections">
             <i class=" bx bxs-chalkboard"></i> <span
                 data-key="t-dashboards">{{ trans('Sections_trans.title_page') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarSections">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('sections.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.List_sections') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Section Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarParent" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarParent">
             <i class=" ri-parent-fill"></i> <span data-key="t-dashboards">{{ trans('main_trans.Parents') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarParent">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     {{-- href="{{ route('parents.index') }}" --}}
                     <a href="{{ url('add_parent') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.List_Parents') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Parent Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarTeacher" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarTeacher">
             <i class="las la-user-tie"></i> <span data-key="t-dashboards">{{ trans('main_trans.Teachers') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarTeacher">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('teachers.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.List_Teachers') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Teacher Menu -->

     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarStudentlevel" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarStudentlevel">
             <i class="mdi mdi-school"></i> <span data-key="t-multi-level">{{ trans('main_trans.students') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarStudentlevel">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="#sidebarStudent" class="nav-link" data-bs-toggle="collapse" role="button"
                         aria-expanded="false" aria-controls="sidebarStudent" data-key="t-level-1.2">
                         {{ trans('main_trans.Student_information') }}
                     </a>
                     <div class="collapse menu-dropdown" id="sidebarStudent">
                         <ul class="nav nav-sm flex-column">
                             <li class="nav-item">
                                 <a href="{{ route('students.index') }}" class="nav-link"
                                     data-key="t-level-2.1">{{ trans('main_trans.List_students') }}
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('students.create') }}" class="nav-link"
                                     data-key="t-level-2.1">{{ trans('main_trans.add_student') }}
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li class="nav-item">
                     <a href="#sidebarPromotion" class="nav-link" data-bs-toggle="collapse" role="button"
                         aria-expanded="false" aria-controls="sidebarPromotion" data-key="t-level-1.2">
                         {{ trans('main_trans.Students_Promotions') }}
                     </a>
                     <div class="collapse menu-dropdown" id="sidebarPromotion">
                         <ul class="nav nav-sm flex-column">
                             <li class="nav-item">
                                 <a href="{{ route('promotions.create') }}" class="nav-link"
                                     data-key="t-level-2.1">{{ trans('main_trans.list_Promotions') }}
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('promotions.index') }}" class="nav-link"
                                     data-key="t-level-2.1">{{ trans('main_trans.add_promotion') }}
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li><!-- end promotions Menu -->

                 <li class="nav-item">
                     <a href="#sidebarGraduated" class="nav-link" data-bs-toggle="collapse" role="button"
                         aria-expanded="false" aria-controls="sidebarGraduated" data-key="t-level-1.2">
                         {{ trans('main_trans.Students_Graduateds') }}
                     </a>
                     <div class="collapse menu-dropdown" id="sidebarGraduated">
                         <ul class="nav nav-sm flex-column">
                             <li class="nav-item">
                                 <a href="{{ route('graduateds.create') }}" class="nav-link"
                                     data-key="t-level-2.1">{{ trans('main_trans.Students_upgrade') }}
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('graduateds.index') }}" class="nav-link"
                                     data-key="t-level-2.1">{{ trans('main_trans.list_Graduateds') }}
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li><!-- end graduateds Menu -->
             </ul>
         </div>
     </li><!-- end student Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarFees" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarFees">
             <i class="las la-money-bill-wave"></i> <span
                 data-key="t-dashboards">{{ trans('Fees_trans.title_page') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarFees">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('fees.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('Fees_trans.List_Fee') }}
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('fees_invoices.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('Students_trans.facture') }}
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('receipt_students.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('Receipts_trans.title_page') }}
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('processingFees.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('ProcessingFees_trans.title_page') }}
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('payment_students.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.payments') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Fee Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarAttendances" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarAttendances">
             <i class=" bx bx-calendar"></i> <span
                 data-key="t-dashboards">{{ trans('main_trans.List_Attendances') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarAttendances">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('attendances.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.List_students') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Attendance Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarSubjects" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarSubjects">
             <i class=" ri-book-mark-fill"></i> <span
                 data-key="t-dashboards">{{ trans('main_trans.List_Subjects') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarSubjects">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('subjects.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.List_Subjects') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Subject Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarQuizzes" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarQuizzes">
             <i class="ri-file-edit-fill"></i> <span
                 data-key="t-dashboards">{{ trans('main_trans.List_Quizzes') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarQuizzes">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('quizzes.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.List_Quizzes') }}
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('questions.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.List_Questions') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Quizze Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarOnlineClasse" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarOnlineClasse">
             <i class="mdi mdi-cast-education"></i> <span
                 data-key="t-dashboards">{{ trans('main_trans.online') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarOnlineClasse">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('online_classes.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.online') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Online Classe Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarLibrary" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarLibrary">
             <i class="bx bx-library"></i> <span data-key="t-dashboards">{{ trans('main_trans.library') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarLibrary">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('libraries.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.listeBook') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Librairie Menu -->
     <li class="nav-item">
         <a class="nav-link menu-link" href="#sidebarSetting" data-bs-toggle="collapse" role="button"
             aria-expanded="false" aria-controls="sidebarSetting">
             <i class="ri-settings-5-line"></i> <span
                 data-key="t-dashboards">{{ trans('main_trans.setting') }}</span>
         </a>
         <div class="collapse menu-dropdown" id="sidebarSetting">
             <ul class="nav nav-sm flex-column">
                 <li class="nav-item">
                     <a href="{{ route('settings.index') }}" class="nav-link" data-key="t-analytics">
                         {{ trans('main_trans.setting') }}
                     </a>
                 </li>
             </ul>
         </div>
     </li> <!-- end Setting Menu -->
 </ul>
